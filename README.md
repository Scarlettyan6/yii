# “烽火尽处是家国”——抗战主题历史学习平台

## 1. 项目概述

本平台是一个基于 Yii2 框架开发的抗战主题历史学习网站，旨在通过现代 Web 技术，以多维度、交互式的形式，再现中国人民抗日战争的艰苦历程，向为保卫国家而英勇献身的先烈们致敬。

项目采用前后端分离的架构，前端负责内容展示与用户交互，后端提供数据管理与业务逻辑支持。

## 2. 技术栈

-   **后端框架**: [Yii2 Advanced Project Template](https://github.com/yiisoft/yii2-app-advanced)
-   **前端框架**: Bootstrap 3
-   **3D 渲染**: Three.js
-   **数据库**: MySQL
-   **开发环境**: XAMPP (PHP, MySQL, Apache)

## 3. 模块划分

项目遵循 Yii2 高级模板的目录结构，主要分为以下几个部分：

-   `frontend`: 前台应用，面向普通用户，包含专题首页、时间戳、抗战地标、数据统计、人物专栏、影视信息、留言板和团队介绍等模块。
-   `backend`: 后台管理系统，供管理员使用，用于管理网站的各类数据，如战役信息、英雄人物、历史事件等。
-   `common`: 公共模块，存放前后端共享的模型（Models）、配置文件（Config）和通用组件（Widgets）等。
-   `console`: 控制台应用，用于执行数据库迁移（Migrations）、定时任务等命令行操作。

## 4. 开发环境搭建

为了保证团队成员开发环境的一致性，请遵循以下步骤进行配置：

1.  **克隆代码库**

    ```bash
    git clone <your-repository-url>
    cd yii2025/advanced
    ```

2.  **安装依赖**

    请确保已安装 [Composer](https://getcomposer.org/)，然后在项目根目录下运行：

    ```bash
    composer install
    ```

3.  **初始化环境**

    执行以下命令，选择 `dev` (开发) 环境并允许覆盖所有文件：

    ```bash
    php init --env=Development --overwrite=All
    ```

4.  **配置数据库**

    -   在 MySQL 中创建一个新的数据库，例如 `yii2025_advanced`。
    -   将 `common/config/main-local.php.example` 复制为 `common/config/main-local.php`。
    -   修改 `common/config/main-local.php`，填入你的数据库连接信息：

        ```php
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2025_advanced',
            'username' => 'root', // 你的数据库用户名
            'password' => '', // 你的数据库密码
            'charset' => 'utf8',
        ],
        ```

5.  **执行数据库迁移**

    运行以下命令，创建项目所需的数据表：

    ```bash
    php yii migrate
    ```

## 5. 编码与协作规范

-   **代码风格**: 遵循 [PSR-12](https://www.php-fig.org/psr/psr-12/) 编码规范。
-   **分支管理**: 功能开发、bug 修复等请创建新的分支，完成后合并到 `main` 分支。
-   **代码提交**: 提交代码时，请撰写清晰、规范的 Commit Message。

## 6. 如何扩展

-   **新增功能模块**: 在 `frontend/controllers` 中创建新的控制器，并在 `frontend/views` 中创建对应的视图文件。
-   **扩展数据模型**: 在 `common/models` 中创建新的模型类，并创建对应的数据库迁移文件。
-   **后台管理**: 在 `backend` 应用中添加相应的增删改查（CRUD）功能。

---
