<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use common\models\WarDataset;
use common\models\WarRecord;

class WarController extends Controller
{
    public $truncate = 1;

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), ['truncate']);
    }

    /**
     * 导入 war csv 到数据库
     * 用法：
     *   php yii war/import
     *   php yii war/import --truncate=1
     *   php yii war/import --truncate=0
     */
    public function actionImport()
    {
        $truncate = (int)$this->truncate;

        $dir = Yii::getAlias('@frontend/web/data/war');
        if (!is_dir($dir)) {
            $this->stderr("Directory not found: $dir\n");
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $files = glob($dir . DIRECTORY_SEPARATOR . '*.csv');
        if (!$files) {
            $this->stdout("No csv files in $dir\n");
            return ExitCode::OK;
        }

        $now = time();

        foreach ($files as $file) {
            $base = basename($file);
            $key = pathinfo($base, PATHINFO_FILENAME);

            $dataset = WarDataset::findOne(['key' => $key]);
            if ($dataset === null) {
                $dataset = new WarDataset();
                $dataset->key = $key;
                $dataset->name = $key;
                $dataset->created_at = $now;
            }
            $dataset->source_file = $base;
            $dataset->updated_at = $now;

            if (!$dataset->save()) {
                $this->stderr("Failed to save dataset $key: " . json_encode($dataset->errors, JSON_UNESCAPED_UNICODE) . "\n");
                continue;
            }

            if ($truncate === 1) {
                WarRecord::deleteAll(['dataset_id' => $dataset->id]);
            }

            [$header, $rows] = $this->readCsv($file);
            if (!$header) {
                $this->stderr("Empty header: $base\n");
                continue;
            }

            $count = 0;
            foreach ($rows as $i => $row) {
                $row = array_values($row);
                if (count($row) < count($header)) {
                    $row = array_pad($row, count($header), '');
                } elseif (count($row) > count($header)) {
                    $row = array_slice($row, 0, count($header));
                }

                $data = array_combine($header, $row);

                $record = new WarRecord();
                $record->dataset_id = $dataset->id;
                $record->row_index = $i + 2;
                $record->data_json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                $record->created_at = $now;
                $record->updated_at = $now;

                if (!$record->save()) {
                    $this->stderr("Failed record in $base row " . ($i + 2) . ": " . json_encode($record->errors, JSON_UNESCAPED_UNICODE) . "\n");
                    continue;
                }
                $count++;
            }

            $this->stdout("Imported $count rows from $base (dataset_id={$dataset->id})\n");
        }

        return ExitCode::OK;
    }

    private function readCsv(string $file): array
    {
        $fp = fopen($file, 'r');
        if (!$fp) return [[], []];

        $header = fgetcsv($fp);
        if (!$header) {
            fclose($fp);
            return [[], []];
        }

        $header[0] = preg_replace('/^\xEF\xBB\xBF/', '', (string)$header[0]);
        $header = array_map(fn($h) => trim((string)$h), $header);

        $rows = [];
        while (($row = fgetcsv($fp)) !== false) {
            if (count($row) === 1 && trim((string)$row[0]) === '') continue;
            $rows[] = $row;
        }
        fclose($fp);

        return [$header, $rows];
    }
}
