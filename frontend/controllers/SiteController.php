<?php
namespace frontend\controllers;

// 
// --- 所有的 USE 语句都必须在这里 ---
// 
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

// Yii 默认的模型
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

//
// --- 这是你为首页新加的 USE 语句 ---
//
use common\models\TimelineEvent;
use common\models\Battle;
use common\models\Statistic;
use common\models\StatisticCategory; // <-- 我帮你补上了这个
use common\models\Figure;
use common\models\MediaResource;
use common\models\GuestbookMessage;
// 
// --- USE 语句结束 ---
//

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     * (你的 behaviors() 函数从这里开始)
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class, // <-- 我帮你修正了这里
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class, // <-- 我帮你修正了这里
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'team' => [ // <-- 把这个添加进去 
                'class' => 'yii\web\ViewAction',
            ], 
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */

public function actionIndex() 
{ 
    // 1. 获取“时间戳”精华 (比如：最重要的3个事件) 
    $featuredEvents = TimelineEvent::find() 
        ->orderBy(['importance' => SORT_DESC, 'event_date' => SORT_DESC]) 
        ->limit(3) 
        ->all(); 

    // 2. 获取“战役地标” (用于地图) 
    // (我们获取所有战役的坐标和名称) 
    $battlesForMap = Battle::find() 
        ->select(['name', 'main_latitude', 'main_longitude']) 
        ->asArray() // 转换成数组，方便 ECharts/Three.js 使用 
        ->all(); 

    // 3. 获取“抗战数据” (比如：最重要的统计数据，如"伤亡") 
    $keyStats = Statistic::find() 
        ->where(['category_id' => 1]) // 假设 1 是“伤亡统计”类别 
        ->orderBy(['display_order' => SORT_ASC]) 
        ->all(); 

    // 4. 获取“人物专栏”精华 (比如：随机6位人物) 
    $featuredFigures = Figure::find() 
        ->orderBy('RAND()') // 随机获取 
        ->limit(6) 
        ->all(); 

    // 5. 获取“影视信息”精华 (比如：最新的4个) 
    $featuredMedia = MediaResource::find() 
        ->where(['type' => 4]) // 4 = Movie 
        ->orderBy(['id' => SORT_DESC]) // 假设按ID倒序 
        ->limit(4) 
        ->all(); 

    // 6. 获取“留言板”精华 (比如：最新的3条已审核留言) 
    $featuredMessages = GuestbookMessage::find() 
        ->where(['is_approved' => true]) 
        ->orderBy(['created_at' => SORT_DESC]) 
        ->limit(3) 
        ->all(); 

    // 7. 把所有数据打包，发送给视图 
    return $this->render('index', [ 
        'featuredEvents' => $featuredEvents, 
        'battlesForMap' => $battlesForMap, 
        'keyStats' => $keyStats, 
        'featuredFigures' => $featuredFigures, 
        'featuredMedia' => $featuredMedia, 
        'featuredMessages' => $featuredMessages, 
    ]); 
}


    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
