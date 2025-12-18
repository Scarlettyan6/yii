# 人物专栏 + 影视信息模块实现规划

## 📋 目录
1. [项目分析](#项目分析)
2. [需求分析](#需求分析)
3. [系统设计](#系统设计)
4. [实现流程](#实现流程)
5. [工作清单](#工作清单)

---

## 项目分析

### 现有项目架构
- **框架**: Yii2 Advanced Project Template
- **三层架构**: Frontend（前台）+ Backend（后台）+ Common（共享）
- **数据库**: MySQL
- **已有模块**: Battle、Figure、Role、TimelineEvent、MapMarker、MediaResource、GuestbookMessage、StatisticCategory、Statistic

### 关键观察
✓ Figure 模型已存在，需扩展到"人物专栏"完整功能  
✓ MediaResource 模型可复用作"影视信息"基础  
✓ 已建立 Migration 文件规范（console/migrations）  
✓ 已建立 Controller + View 目录结构规范  

---

## 需求分析

### 1. 人物专栏模块

#### 前台功能
```
人物列表页面 (Frontend) ──┬─→ 人物卡片展示（分页）
                        ├─→ 按时代/角色筛选
                        └─→ 搜索功能

人物详情页面 (Frontend) ──┬─→ 人物基本信息（图文）
                        ├─→ 生平经历时间线
                        ├─→ 相关事件链接
                        └─→ 相关影视资源推荐
```

#### 后台功能
```
CRUD 管理 (Backend) ────┬─→ 列表：搜索、排序、分页
                       ├─→ 创建：表单验证、图片上传
                       ├─→ 编辑：字段修改、历史记录
                       └─→ 删除：逻辑删除、关联处理
```

#### 核心字段
- 基本信息：name, birth_date, death_date, biography, achievements
- 扩展字段：native_place(籍贯), rank(军衔), war_period(参战时期)
- 多媒体：cover_image_url, additional_images(多图)
- 关系：related_figures(相关人物), related_events(相关事件)
- 元数据：created_at, updated_at, is_featured(推荐)

---

### 2. 影视信息模块

#### 前台功能
```
影视列表页面 (Frontend) ──┬─→ 影视海报网格展示
                        ├─→ 按类型/年代筛选
                        ├─→ 评分排序
                        └─→ 搜索功能

影视详情页面 (Frontend) ──┬─→ 影视详细信息（标题、海报、简介）
                        ├─→ 演员/导演信息
                        ├─→ 推荐指数评分
                        ├─→ 观看链接/资源
                        └─→ 相关人物推荐
```

#### 后台功能
```
CRUD 管理 (Backend) ────┬─→ 列表：搜索、排序、分页
                       ├─→ 创建：表单验证、海报上传
                       ├─→ 编辑：字段修改
                       └─→ 删除：逻辑删除
```

#### 核心字段
- 基本信息：title, description, type(电影/电视剧/纪录片), release_year
- 多媒体：poster_url, cover_image_url
- 详细信息：director, main_cast, duration, rating
- 业务字段：related_figures(关联人物), recommended_index, watch_link
- 元数据：created_at, updated_at, is_featured

---

## 系统设计

### 数据库表设计

#### 表 1: `person` (人物扩展表)
基于现有 `figure` 表扩展或创建新表

```sql
person (或扩展 figure)
├── id (PK)
├── name (人物名字) [100]
├── birth_date (出生日期) [50]
├── death_date (逝世日期) [50]
├── native_place (籍贯) [100] ◆新增
├── rank (军衔) [50] ◆新增
├── war_period (参战时期) [100] ◆新增
├── biography (人物简介) [TEXT]
├── achievements (主要功绩) [TEXT]
├── cover_image_url (头像) [255]
├── additional_images (多图JSON) [TEXT] ◆新增
├── is_featured (是否推荐) [TINYINT]
├── created_at [INT]
├── updated_at [INT]
└── deleted_at [INT] (逻辑删除)
```

#### 表 2: `movie` (影视表)
```sql
movie
├── id (PK)
├── title (影视名称) [255]
├── type (类型: film/tv/documentary) [20]
├── description (影视简介) [TEXT]
├── release_year (发行年份) [10]
├── poster_url (海报) [255]
├── cover_image_url (封面) [255]
├── director (导演) [100]
├── main_cast (主要演员) [255]
├── duration (时长，单位分钟) [INT]
├── rating (评分) [DECIMAL(3,1)]
├── watch_link (观看链接) [255]
├── is_featured (是否推荐) [TINYINT]
├── created_at [INT]
├── updated_at [INT]
└── deleted_at [INT] (逻辑删除)
```

#### 表 3: `person_movie` (人物-影视关联表)
```sql
person_movie
├── id (PK)
├── person_id (FK → person/figure)
├── movie_id (FK → movie)
├── role (人物在影视中的角色) [100]
├── created_at [INT]
└── PRIMARY KEY(person_id, movie_id)
```

### 目录结构规划

```
advanced/
├── common/
│   └── models/
│       ├── Person.php (或扩展 Figure.php) ◆新增/修改
│       ├── Movie.php ◆新增
│       └── PersonMovie.php ◆新增
│
├── console/
│   └── migrations/
│       ├── m251210_000000_extend_figure_table.php ◆新增 (如果扩展figure)
│       ├── m251210_000001_create_movie_table.php ◆新增
│       └── m251210_000002_create_person_movie_table.php ◆新增
│
├── frontend/
│   ├── controllers/
│   │   ├── PersonController.php ◆新增 (人物列表/详情)
│   │   └── MovieController.php ◆新增 (影视列表/详情)
│   │
│   ├── views/
│   │   ├── person/
│   │   │   ├── index.php (列表页)
│   │   │   └── view.php (详情页)
│   │   │
│   │   └── movie/
│   │       ├── index.php (列表页)
│   │       └── view.php (详情页)
│   │
│   ├── assets/
│   │   └── PersonMovieAsset.php ◆新增 (样式/脚本)
│   │
│   └── web/
│       └── css/
│           └── person-movie.css ◆新增
│
├── backend/
│   ├── controllers/
│   │   ├── PersonController.php ◆新增 (CRUD)
│   │   └── MovieController.php ◆新增 (CRUD)
│   │
│   ├── models/ (可选，搜索模型)
│   │   ├── PersonSearch.php ◆新增
│   │   └── MovieSearch.php ◆新增
│   │
│   └── views/
│       ├── person/
│       │   ├── index.php (列表)
│       │   ├── view.php (查看)
│       │   ├── create.php (创建)
│       │   └── update.php (编辑)
│       │
│       └── movie/
│           ├── index.php (列表)
│           ├── view.php (查看)
│           ├── create.php (创建)
│           └── update.php (编辑)
│
└── docs/ (文档目录) ◆新增
    ├── 01_需求分析.md
    ├── 02_系统设计.md
    ├── 03_数据库设计.md
    └── 04_实现指南.md
```

---

## 实现流程

### 📌 第一阶段：数据层（2天）

#### Step 1.1: 创建 Migration 文件
**目标**: 定义数据库表结构

关键步骤：
```
1. 创建 m251210_extend_figure_table.php (扩展 figure 或创建 person)
   - 添加字段：native_place, rank, war_period, additional_images, is_featured, deleted_at
   - 添加索引：name, is_featured, created_at

2. 创建 m251210_create_movie_table.php
   - 字段：id, title, type, description, release_year, poster_url, cover_image_url, 
           director, main_cast, duration, rating, watch_link, is_featured, created_at, updated_at, deleted_at
   - 索引：title, type, is_featured

3. 创建 m251210_create_person_movie_table.php
   - 字段：id, person_id, movie_id, role, created_at
   - 外键：person_id → figure.id, movie_id → movie.id
   - 联合唯一：(person_id, movie_id)

执行：php yii migrate
```

#### Step 1.2: 创建 Model 类
**目标**: ORM 映射与业务逻辑

关键步骤：
```
1. common/models/Person.php (或修改 Figure.php)
   - 定义属性、规则、标签
   - 添加 behaviors：TimeStampBehavior, BlameableBehavior
   - 添加关系方法：getMovies(), getRelatedFigures()

2. common/models/Movie.php
   - 定义属性、规则、标签
   - 添加 behaviors：TimeStampBehavior
   - 添加关系方法：getPeople(), getRelatedPeople()

3. common/models/PersonMovie.php
   - 定义关联表映射
   - 添加关系方法：getPerson(), getMovie()
```

### 📌 第二阶段：后台管理（2天）

#### Step 2.1: 使用 Gii 生成 CRUD
**工具**: Yii2 Gii Code Generator

关键步骤：
```
1. 启动 Gii：http://localhost/yii2025/advanced/backend/web/index.php?r=gii
   
2. 使用 CRUD Generator：
   - Model Class: common\models\Person (或 Figure)
   - Search Model Class: backend\models\PersonSearch
   - Controller Class: backend\controllers\PersonController
   - View Path: @app/views/person
   - 勾选：enable_i18n, useTablePrefix
   - 生成！

3. 重复生成 Movie CRUD

4. 检查生成的代码：
   - 验证表单字段
   - 添加图片上传字段
   - 修改搜索模型（添加业务搜索条件）
```

#### Step 2.2: 定制后台表单
**目标**: 完善 CRUD 功能

关键修改：
```
1. PersonController.php / MovieController.php
   ├─ 修改 actionCreate/actionUpdate
   │  └─ 添加图片上传处理逻辑
   ├─ 修改 actionDelete
   │  └─ 改为逻辑删除（update deleted_at）
   └─ 添加权限检查（$this->access_control())

2. PersonSearch.php / MovieSearch.php
   ├─ 修改 search() 方法
   │  ├─ 添加 is_featured 筛选
   │  ├─ 添加日期范围搜索
   │  └─ 排除 deleted_at IS NOT NULL 的记录
   └─ 添加自定义排序

3. views/person/index.php 等视图
   ├─ 使用 GridView 展示列表
   ├─ 添加操作列：查看、编辑、删除
   ├─ 添加快速过滤按钮（推荐、全部、已删除）
   └─ 添加批量操作？

4. views/person/create.php 和 update.php
   ├─ 使用 ActiveForm
   ├─ 图片上传字段（FileInput）
   ├─ 字段分组显示（使用 Tab 或 Collapse）
   └─ 富文本编辑器（biography, achievements）
```

### 📌 第三阶段：前台展示（2天）

#### Step 3.1: 前端模板拆分
**来源**: 下载的前端模板

关键步骤：
```
1. 拆分模板文件
   - 抽取 HTML Layout（头部、导航、底部）
   - 提取 CSS 文件
   - 提取 JS 脚本和资源
   - 获取人物卡片、详情页的 HTML 片段

2. 创建 Yii2 Layout
   ├─ frontend/views/layouts/main.php (主 Layout)
   └─ 集成 Bootstrap 3 和自定义样式

3. 创建 Asset 类
   └─ frontend/assets/PersonMovieAsset.php
      └─ 注册 CSS、JS 文件
```

#### Step 3.2: 创建前台 Controller 和 View
**目标**: 实现列表和详情页展示

关键步骤：
```
1. PersonController.php (Frontend)
   └─ actionIndex(): 获取人物列表、分页、排序、过滤
   └─ actionView($id): 获取人物详情 + 关联影视

2. MovieController.php (Frontend)
   └─ actionIndex(): 获取影视列表、分页、过滤
   └─ actionView($id): 获取影视详情 + 关联人物

3. 前台视图文件
   ├─ views/person/index.php (人物列表)
   │  ├─ 卡片网格布局（Bootstrap 3 grid）
   │  ├─ 分页导航
   │  ├─ 搜索表单
   │  └─ 筛选面板
   │
   ├─ views/person/view.php (人物详情)
   │  ├─ 人物头部信息（头像、基本信息）
   │  ├─ 人物简介（富文本渲染）
   │  ├─ 相关影视推荐（电影/纪录片）
   │  └─ 返回列表按钮
   │
   ├─ views/movie/index.php (影视列表)
   │  ├─ 海报网格布局
   │  ├─ 评分排序
   │  └─ 分页导航
   │
   └─ views/movie/view.php (影视详情)
      ├─ 海报、标题、评分
      ├─ 导演、演员、年份
      ├─ 影视简介
      └─ 相关人物推荐
```

#### Step 3.3: 整合路由和菜单
**目标**: 前后台集成

关键步骤：
```
1. 前台路由配置
   - frontend/config/main.php 添加 URL Rules
   - person/index → /person
   - person/view → /person/<id:\d+>
   - movie/index → /movie
   - movie/view → /movie/<id:\d+>

2. 后台路由配置
   - backend/config/main.php 添加 URL Rules
   - 与 Gii 生成代码同步

3. 前台菜单整合
   - 在 Layout 中添加导航链接
   - 人物专栏 → /person
   - 影视资料 → /movie

4. 后台菜单整合 (如有导航菜单)
   - 在后台菜单中添加管理入口
   - 人物管理 → /person
   - 影视管理 → /movie
```

---

## 工作清单

### 📊 完整的任务分解

#### 第一阶段：数据库设计与 Model（完成度：0%）

- [ ] **1.1** 创建 Migration：扩展 figure 表或新建 person 表
  - 文件：`console/migrations/m251210_extend_figure_table.php`
  - 预期时间：30 min
  - 检查项：字段类型正确、索引完整、注释清晰

- [ ] **1.2** 创建 Migration：创建 movie 表
  - 文件：`console/migrations/m251210_create_movie_table.php`
  - 预期时间：30 min
  - 检查项：字段定义完整、外键设置

- [ ] **1.3** 创建 Migration：创建关联表 person_movie
  - 文件：`console/migrations/m251210_create_person_movie_table.php`
  - 预期时间：20 min
  - 检查项：唯一约束、外键约束

- [ ] **1.4** 执行数据库迁移
  - 命令：`php yii migrate`
  - 验证：数据库中出现三张新表

- [ ] **1.5** 创建 Person Model（或修改 Figure 模型）
  - 文件：`common/models/Person.php`
  - 预期时间：1 hour
  - 包含：规则验证、关系方法、Behaviors

- [ ] **1.6** 创建 Movie Model
  - 文件：`common/models/Movie.php`
  - 预期时间：1 hour
  - 包含：规则验证、关系方法

- [ ] **1.7** 创建 PersonMovie Model
  - 文件：`common/models/PersonMovie.php`
  - 预期时间：30 min
  - 包含：关联关系定义

---

#### 第二阶段：后台管理 CRUD（完成度：0%）

- [ ] **2.1** 使用 Gii 生成 PersonController + 视图
  - 方式：访问 Gii 生成器
  - 预期时间：15 min
  - 检查项：生成 index, create, update, view, delete

- [ ] **2.2** 使用 Gii 生成 MovieController + 视图
  - 方式：访问 Gii 生成器
  - 预期时间：15 min

- [ ] **2.3** 创建 PersonSearch Model
  - 文件：`backend/models/PersonSearch.php`
  - 预期时间：30 min
  - 功能：名字搜索、军衔过滤、推荐过滤

- [ ] **2.4** 创建 MovieSearch Model
  - 文件：`backend/models/MovieSearch.php`
  - 预期时间：30 min
  - 功能：标题搜索、类型过滤、年份范围

- [ ] **2.5** 修改 PersonController：添加图片上传
  - 文件：`backend/controllers/PersonController.php`
  - 预期时间：1 hour
  - 功能：处理 cover_image_url 的文件上传

- [ ] **2.6** 修改 MovieController：添加图片上传
  - 文件：`backend/controllers/MovieController.php`
  - 预期时间：1 hour

- [ ] **2.7** 修改两个 Controller：改为逻辑删除
  - 修改 actionDelete()
  - 修期时间：30 min
  - 原理：update deleted_at 字段而非真正删除

- [ ] **2.8** 优化后台表单视图
  - 文件：`backend/views/person/` 和 `backend/views/movie/`
  - 预期时间：2 hours
  - 改进：布局优化、字段分组、验证提示

---

#### 第三阶段：前台展示（完成度：0%）

- [ ] **3.1** 拆分前端模板
  - 来源：下载的前端模板文件
  - 预期时间：2 hours
  - 产出：HTML 片段、CSS 文件、JS 脚本

- [ ] **3.2** 创建 PersonMovieAsset 类
  - 文件：`frontend/assets/PersonMovieAsset.php`
  - 预期时间：30 min
  - 功能：注册 CSS、JS、图片资源

- [ ] **3.3** 创建前台 PersonController
  - 文件：`frontend/controllers/PersonController.php`
  - 预期时间：1 hour
  - 操作：actionIndex()、actionView()

- [ ] **3.4** 创建人物列表页面
  - 文件：`frontend/views/person/index.php`
  - 预期时间：1.5 hours
  - 设计：卡片网格、分页、搜索过滤

- [ ] **3.5** 创建人物详情页面
  - 文件：`frontend/views/person/view.php`
  - 预期时间：1 hour
  - 内容：头像、基本信息、简介、相关影视推荐

- [ ] **3.6** 创建前台 MovieController
  - 文件：`frontend/controllers/MovieController.php`
  - 预期时间：1 hour

- [ ] **3.7** 创建影视列表页面
  - 文件：`frontend/views/movie/index.php`
  - 预期时间：1.5 hours
  - 设计：海报网格、评分、过滤

- [ ] **3.8** 创建影视详情页面
  - 文件：`frontend/views/movie/view.php`
  - 预期时间：1 hour

- [ ] **3.9** 配置前台路由
  - 文件：`frontend/config/main.php`
  - 预期时间：20 min
  - 路由：person, movie, person/<id>, movie/<id>

- [ ] **3.10** 整合前台菜单/导航
  - 文件：`frontend/views/layouts/main.php`
  - 预期时间：30 min

---

#### 第四阶段：文档与测试（完成度：0%）

- [ ] **4.1** 编写需求分析文档
  - 文件：`docs/01_需求分析.md`
  - 内容：功能列表、用户故事、业务流程
  - 预期时间：1 hour

- [ ] **4.2** 编写系统设计文档
  - 文件：`docs/02_系统设计.md`
  - 内容：架构、数据流、模块关系
  - 预期时间：1 hour

- [ ] **4.3** 编写数据库设计文档
  - 文件：`docs/03_数据库设计.md`
  - 内容：ER 图、表结构说明、字段解释
  - 预期时间：1 hour

- [ ] **4.4** 编写实现指南文档
  - 文件：`docs/04_实现指南.md`
  - 内容：开发步骤、API 说明、常见问题
  - 预期时间：2 hours

- [ ] **4.5** 数据库功能测试
  - 验证：CRUD 操作正常
  - 预期时间：30 min

- [ ] **4.6** 前台功能测试
  - 验证：列表展示、详情显示、链接正常
  - 预期时间：1 hour

- [ ] **4.7** 后台功能测试
  - 验证：增删改查、上传、搜索、过滤
  - 预期时间：1 hour

---

## 🎯 关键设计原则

### 1. 遵循 Yii2 规范
- ✓ Model 继承 `yii\db\ActiveRecord`
- ✓ Controller 继承 `yii\web\Controller`
- ✓ 使用 behaviors（TimeStampBehavior 自动记录时间）
- ✓ 使用事件钩子（afterSave, beforeDelete）

### 2. 前后台分离
- 后台：完整 CRUD，管理员操作
- 前台：只读展示，用户浏览
- 共享：common/models 中的数据模型

### 3. 充分利用 Gii 代码生成
- 快速生成 CRUD 框架
- 减少重复代码
- 确保结构规范

### 4. 图片处理
- 上传保存到 `frontend/web/uploads/`
- 数据库存储相对路径
- 前台使用 `Yii::getAlias('@web')` 获取完整 URL

### 5. 关系管理
- Person-Movie 多对多关系
- 使用中间表 `person_movie`
- 通过 relation 方法快速查询

### 6. 数据完整性
- 逻辑删除：添加 `deleted_at` 字段
- 级联删除：删除人物时同步删除关联记录
- 事务保证：多表操作使用 transaction

---

## 📚 推荐学习资源

1. **Yii2 官方文档**
   - Models: https://www.yiiframework.com/doc/guide/2.0/en/structure-models
   - Controllers: https://www.yiiframework.com/doc/guide/2.0/en/structure-controllers
   - Views: https://www.yiiframework.com/doc/guide/2.0/en/structure-views

2. **Gii 代码生成**
   - https://www.yiiframework.com/doc/guide/2.0/en/start-gii

3. **数据库迁移**
   - https://www.yiiframework.com/doc/guide/2.0/en/db-migrations

4. **ActiveForm 表单**
   - https://www.yiiframework.com/doc/guide/2.0/en/input-forms

---

## ✅ 成功标准

项目完成标志：

1. **数据层** ✓
   - 三张表创建完成，字段齐全
   - 三个 Model 类可正常使用 CRUD 操作

2. **后台管理** ✓
   - PersonController + MovieController 完整 CRUD
   - 列表、创建、编辑、查看、删除功能正常
   - 图片上传功能正常
   - 搜索、筛选功能正常

3. **前台展示** ✓
   - 人物列表页面：美观、分页、搜索、筛选
   - 人物详情页面：完整信息、相关推荐
   - 影视列表页面：海报展示、评分、过滤
   - 影视详情页面：完整信息、相关推荐

4. **文档** ✓
   - 需求分析文档完整
   - 系统设计文档清晰
   - 数据库设计文档详细
   - 实现指南文档完善

5. **质量** ✓
   - 代码无 PHP Warning/Error
   - 数据库操作无错误
   - 前后台链接完整
   - 用户体验流畅

---

## 时间估算

| 阶段 | 任务数 | 预估时间 |
|-----|-------|--------|
| 第一阶段 | 7 个 | 5-6 小时 |
| 第二阶段 | 8 个 | 7-8 小时 |
| 第三阶段 | 10 个 | 10-12 小时 |
| 第四阶段 | 7 个 | 6-7 小时 |
| **总计** | **32 个** | **28-33 小时** |

**建议分配**: 5 天开发 + 2 天测试优化 = 1 周完成

---

**制定日期**: 2025年12月9日  
**项目名称**: 抗战主题历史学习平台 - 人物专栏 + 影视信息模块  
**维护者**: 开发团队
