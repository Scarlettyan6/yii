<?php
use yii\helpers\Html;

$this->title = '我们的团队';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="memorial-team-page">
    <!-- 主题标题 -->
    <div class="page-header">
        <div class="header-decoration">
            <div class="star-line"></div>
        </div>
        <h1><?= Html::encode($this->title) ?></h1>
        <p class="subtitle">纪念抗日战争胜利80周年专题项目</p>
        <div class="header-decoration">
            <div class="star-line"></div>
        </div>
    </div>

    <!-- 团队成员 -->
    <div class="team-container">
        <div class="section-title">
            <i class="fas fa-users"></i>
            <h2>团队成员</h2>
        </div>
        
        <div class="team-grid">
            <!-- 成员1 -->
            <div class="member-card">
                <div class="card-header member-1">
                    <div class="member-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="member-info">
                        <h3>杜子妍</h3>
                        <p class="member-id">学号：2313312</p>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="info-block">
                        <h4><i class="fas fa-briefcase"></i> 负责工作</h4>
                        <ul class="work-list">
                            <li><i class="fas fa-check-circle"></i> 专题首页</li>
                            <li><i class="fas fa-check-circle"></i> 抗战地标</li>
                        </ul>
                    </div>
                    
                    <div class="info-block assignment-block">
                        <h4><i class="fas fa-folder-open"></i> 作业展示</h4>
                        <div class="assignment-content">
                            <div class="assignment-links">
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业一</span>
                                </a>
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业二</span>
                                </a>
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业三</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 成员2 -->
            <div class="member-card">
                <div class="card-header member-2">
                    <div class="member-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="member-info">
                        <h3>姚智博</h3>
                        <p class="member-id">学号：2313557</p>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="info-block">
                        <h4><i class="fas fa-briefcase"></i> 负责工作</h4>
                        <ul class="work-list">
                            <li><i class="fas fa-check-circle"></i> 抗战时间轴</li>
                            <li><i class="fas fa-check-circle"></i> 抗战数据</li>
                        </ul>
                    </div>
                    
                    <div class="info-block assignment-block">
                        <h4><i class="fas fa-folder-open"></i> 作业展示</h4>
                        <div class="assignment-content">
                            <div class="assignment-links">
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-word"></i>
                                    <span>作业一</span>
                                </a>
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业二</span>
                                </a>
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业三</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 成员3 -->
            <div class="member-card">
                <div class="card-header member-3">
                    <div class="member-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="member-info">
                        <h3>谢闻星</h3>
                        <p class="member-id">学号：2310500</p>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="info-block">
                        <h4><i class="fas fa-briefcase"></i> 负责工作</h4>
                        <ul class="work-list">
                            <li><i class="fas fa-check-circle"></i>人物专栏</li>
                            <li><i class="fas fa-check-circle"></i> 影视信息</li>
                        </ul>
                    </div>
                    
                    <div class="info-block assignment-block">
                        <h4><i class="fas fa-folder-open"></i> 作业展示</h4>
                        <div class="assignment-content">
                           <div class="assignment-links">
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业一</span>
                                </a>
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业二</span>
                                </a>
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业三</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 成员4 -->
            <div class="member-card">
                <div class="card-header member-4">
                    <div class="member-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="member-info">
                        <h3>谭诗洋</h3>
                        <p class="member-id">学号：2314003</p>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="info-block">
                        <h4><i class="fas fa-briefcase"></i> 负责工作</h4>
                        <ul class="work-list">
                            <li><i class="fas fa-check-circle"></i> 留言板</li>
                            <li><i class="fas fa-check-circle"></i> 团队介绍</li>
                        </ul>
                    </div>
                    
                    <div class="info-block assignment-block">
                        <h4><i class="fas fa-folder-open"></i> 作业展示</h4>
                        <div class="assignment-content">
                            <div class="assignment-links">
                                <a href="/yii2025/frontend/web/documents/2314003-谭诗洋/实验二.docx" target="_blank" class="assignment-link">
                                    <i class="fas fa-file-word"></i>
                                    <span>作业一</span>
                                </a>
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业二</span>
                                </a>
                                <a href="#" class="assignment-link">
                                    <i class="fas fa-file-alt"></i>
                                    <span>作业三</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 项目成果展示 -->
    <div class="project-showcase">
        <div class="section-title">
            <i class="fas fa-award"></i>
            <h2>项目成果展示</h2>
        </div>
        
        <div class="project-card">
            <div class="project-banner">
                <div class="banner-content">
                    <h2>抗日战争胜利80周年纪念专题网站</h2>
                    <p class="project-subtitle">铭记历史 · 缅怀先烈 · 珍爱和平</p>
                </div>
            </div>
            
            <div class="project-body">
                <div class="project-intro">
                    <h3>项目简介</h3>
                    <p>基于Yii2框架开发的抗日战争胜利80周年纪念专题网站，通过现代化的技术手段，展现抗战历史、英雄人物、重要事件等内容，让更多人了解那段波澜壮阔的历史，传承红色基因，弘扬爱国主义精神。</p>
                </div>
                
                <div class="project-details-grid">
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="detail-content">
                            <h4>技术栈</h4>
                            <p>PHP 7.4+, Yii2 Framework, MySQL 8.0, Bootstrap 5, RESTful API, jQuery</p>
                        </div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="detail-content">
                            <h4>项目进度</h4>
                            <div class="progress-wrapper">
                                <div class="progress-bar-container">
                                    <div class="progress-fill" style="width: 100%"></div>
                                </div>
                                <span class="progress-text">100%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="detail-content">
                            <h4>开发周期</h4>
                            <p>2025年10月 - 2025年12月</p>
                        </div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <div class="detail-content">
                            <h4>项目状态</h4>
                            <span class="status-badge">已完成</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-features">
                    <h3>核心功能模块</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-history"></i>
                            <span>历史事件时间轴</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-medal"></i>
                            <span>英雄人物展示</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-images"></i>
                            <span>珍贵史料图库</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-map-marked-alt"></i>
                            <span>战役地图互动</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-video"></i>
                            <span>影像资料库</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-book-open"></i>
                            <span>留言板</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-links-section">
                    <h3>项目相关资料</h3>
                    <div class="links-grid">
                        <a href="#" class="project-link link-1">
                         
                            <div class="link-text">
                                <span class="link-title">1 需求文档</span>
                            </div>
                        </a>
                        
                        <a href="#" class="project-link link-2">
                         
                            <div class="link-text">
                                <span class="link-title">2 设计文档</span>
                  
                            </div>
                        </a>
                        
                        <a href="#" class="project-link link-3">
                     
                            <div class="link-text">
                                <span class="link-title">3 实现文档</span>
                            </div>
                        </a>
                        
                        <a href="#" class="project-link link-4">
                    
                            <div class="link-text">
                                <span class="link-title">4 用户手册</span>
                            </div>
                        </a>
                        
                        <a href="#" class="project-link link-5">
                          
                            <div class="link-text">
                                <span class="link-title">5 部署文档</span>
                            </div>
                        </a>
                        
                        <a href="#" class="project-link link-6">
                   
                            <div class="link-text">
                                <span class="link-title">6 项目展示PPT</span>
                            </div>
                        </a>
                        
                        <a href="#" class="project-link link-7">
                       
                            <div class="link-text">
                                <span class="link-title">7 录屏讲解</span>
                            </div>
                        </a>
                        
                        <a href="#" class="project-link link-8">
                    
                            <div class="link-text">
                                <span class="link-title">8 源码仓库</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* 全局样式 */
.memorial-team-page {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Microsoft YaHei', 'PingFang SC', sans-serif;
    background: linear-gradient(to bottom, #f5f1ed 0%, #faf8f6 100%);
    min-height: 100vh;
    padding: 40px 20px 60px;
}

/* 页面头部 - 庄重的纪念主题 */
.page-header {
    text-align: center;
    margin-bottom: 60px;
    padding: 40px 20px;
}

.header-decoration {
    margin: 20px auto;
}

.star-line {
    height: 2px;
    width: 200px;
    background: linear-gradient(to right, transparent, #8b4513, transparent);
    margin: 0 auto;
    position: relative;
}

.star-line::before,
.star-line::after {
    content: '★';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #8b4513;
    font-size: 16px;
}

.star-line::before {
    left: -10px;
}

.star-line::after {
    right: -10px;
}

.page-header h1 {
    font-size: 3rem;
    font-weight: 700;
    color: #2c1810;
    margin: 20px 0 15px;
    letter-spacing: 2px;
}

.subtitle {
    font-size: 1.2rem;
    color: #8b4513;
    font-weight: 500;
    letter-spacing: 1px;
}

/* 区块标题 */
.section-title {
    text-align: center;
    margin-bottom: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.section-title i {
    font-size: 1.8rem;
    color: #8b4513;
}

.section-title h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #2c1810;
    margin: 0;
}

/* 团队容器 */
.team-container {
    max-width: 1400px;
    margin: 0 auto 80px;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

/* 成员卡片 - 统一优雅的配色 */
.member-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(44, 24, 16, 0.08);
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid rgba(139, 69, 19, 0.1);
}

.member-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 35px rgba(44, 24, 16, 0.15);
}

/* 卡片头部 - 使用纪念主题的庄重配色 */
.card-header {
    padding: 30px 25px;
    background: linear-gradient(135deg, #8b6f47 0%, #6d5d3b 100%);
    color: white;
    display: flex;
    align-items: center;
    gap: 20px;
}

.member-card:nth-child(1) .card-header {
    background: linear-gradient(135deg, #8b6f47 0%, #6d5d3b 100%);
}

.member-card:nth-child(2) .card-header {
    background: linear-gradient(135deg, #9b7e58 0%, #7d6b4a 100%);
}

.member-card:nth-child(3) .card-header {
    background: linear-gradient(135deg, #a58d68 0%, #8a7856 100%);
}

.member-card:nth-child(4) .card-header {
    background: linear-gradient(135deg, #b09c7a 0%, #978562 100%);
}

.member-avatar {
    flex-shrink: 0;
}

.member-avatar i {
    font-size: 3.5rem;
    color: rgba(255, 255, 255, 0.95);
}

.member-info h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0 0 8px 0;
}

.member-id {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0;
}

/* 卡片主体 */
.card-body {
    padding: 25px;
}

.info-block {
    margin-bottom: 25px;
}

.info-block:last-child {
    margin-bottom: 0;
}

.info-block h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c1810;
    margin: 0 0 15px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    padding-bottom: 10px;
    border-bottom: 2px solid #f0e6dc;
}

.info-block h4 i {
    color: #8b4513;
    font-size: 1rem;
}

/* 工作列表 */
.work-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.work-list li {
    padding: 8px 0 8px 28px;
    position: relative;
    color: #4a4a4a;
    font-size: 0.95rem;
    line-height: 1.6;
}

.work-list li i {
    position: absolute;
    left: 0;
    top: 11px;
    color: #8b4513;
    font-size: 0.85rem;
}

/* 作业展示区域 */
.assignment-block {
    background: #faf8f6;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 0 !important;
}

.assignment-block h4 {
    border-bottom-color: #e8dfd5;
}

.work-description {
    color: #4a4a4a;
    font-size: 0.95rem;
    line-height: 1.7;
    margin: 0 0 20px 0;
    text-align: justify;
}

.assignment-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.assignment-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    background: white;
    border: 1px solid #e8dfd5;
    border-radius: 8px;
    text-decoration: none;
    color: #2c1810;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.assignment-link:hover {
    background: #8b4513;
    color: white;
    border-color: #8b4513;
    transform: translateX(5px);
}

.assignment-link i {
    font-size: 1.1rem;
    color: #8b4513;
    transition: color 0.3s ease;
}

.assignment-link:hover i {
    color: white;
}

/* 项目展示区域 */
.project-showcase {
    max-width: 1400px;
    margin: 0 auto;
}

.project-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 6px 30px rgba(44, 24, 16, 0.1);
    overflow: hidden;
    border: 1px solid rgba(139, 69, 19, 0.1);
}

/* 项目横幅 */
.project-banner {
    background: linear-gradient(135deg, #2c1810 0%, #4a3426 50%, #6d5d3b 100%);
    padding: 60px 40px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.project-banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text y="50" font-size="80" opacity="0.03" fill="%23fff">★</text></svg>') repeat;
    opacity: 0.3;
}

.banner-content {
    position: relative;
    z-index: 1;
}

.project-banner h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    margin: 0 0 15px 0;
    letter-spacing: 2px;
}

.project-subtitle {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    letter-spacing: 3px;
}

/* 项目主体 */
.project-body {
    padding: 50px 40px;
}

.project-intro {
    margin-bottom: 45px;
    text-align: center;
}

.project-intro h3 {
    font-size: 1.8rem;
    font-weight: 600;
    color: #2c1810;
    margin: 0 0 20px 0;
}

.project-intro p {
    font-size: 1.1rem;
    color: #4a4a4a;
    line-height: 1.9;
    max-width: 1000px;
    margin: 0 auto;
    text-align: justify;
}

/* 项目详情网格 */
.project-details-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
    margin-bottom: 50px;
}

.detail-card {
    background: #faf8f6;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #e8dfd5;
    transition: all 0.3s ease;
}

.detail-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(139, 69, 19, 0.1);
}

.detail-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8b4513 0%, #6d5d3b 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}

.detail-icon i {
    font-size: 1.5rem;
    color: white;
}

.detail-content h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #2c1810;
    margin: 0 0 10px 0;
}

.detail-content p {
    font-size: 0.95rem;
    color: #4a4a4a;
    line-height: 1.6;
    margin: 0;
}

/* 进度条 */
.progress-wrapper {
    display: flex;
    align-items: center;
    gap: 15px;
}

.progress-bar-container {
    flex: 1;
    height: 8px;
    background: #e8dfd5;
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #8b4513 0%, #a0612c 100%);
    border-radius: 4px;
    transition: width 1s ease;
}

.progress-text {
    font-size: 1rem;
    font-weight: 600;
    color: #8b4513;
}

.status-badge {
    display: inline-block;
    padding: 8px 20px;
    background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
    color: white;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
}

/* 功能模块 */
.project-features {
    margin-bottom: 50px;
}

.project-features h3 {
    font-size: 1.6rem;
    font-weight: 600;
    color: #2c1810;
    margin: 0 0 25px 0;
    text-align: center;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.feature-item {
    background: #faf8f6;
    padding: 20px 25px;
    border-radius: 12px;
    border: 1px solid #e8dfd5;
    display: flex;
    align-items: center;
    gap: 15px;
    transition: all 0.3s ease;
}

.feature-item:hover {
    background: #8b4513;
    color: white;
    border-color: #8b4513;
    transform: translateY(-3px);
}

.feature-item i {
    font-size: 1.5rem;
    color: #8b4513;
    transition: color 0.3s ease;
}

.feature-item:hover i {
    color: white;
}

.feature-item span {
    font-size: 1rem;
    font-weight: 500;
}

/* 项目链接区域 */
.project-links-section h3 {
    font-size: 1.6rem;
    font-weight: 600;
    color: #2c1810;
    margin: 0 0 30px 0;
    text-align: center;
}

.links-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.project-link {
    background: white;
    border: 2px solid #e8dfd5;
    border-radius: 12px;
    padding: 25px 20px;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    transition: all 0.3s ease;
}

.project-link i {
    font-size: 2.5rem;
    color: #8b4513;
    transition: all 0.3s ease;
}

.link-text {
    text-align: center;
}

.link-title {
    display: block;
    font-size: 1.4rem;
    font-weight: 600;
    color: #2c1810;
    margin-bottom: 5px;
    transition: color 0.3s ease;
}

.link-desc {
    display: block;
    font-size: 0.85rem;
    color: #666;
}

/* 每个链接不同的悬停颜色 */
.project-link.link-1:hover { border-color: #3498db; background: #3498db; }
.project-link.link-1:hover i { color: white; }
.project-link.link-1:hover .link-title { color: white; }

.project-link.link-2:hover { border-color: #9b59b6; background: #9b59b6; }
.project-link.link-2:hover i { color: white; }
.project-link.link-2:hover .link-title { color: white; }

.project-link.link-3:hover { border-color: #e74c3c; background: #e74c3c; }
.project-link.link-3:hover i { color: white; }
.project-link.link-3:hover .link-title { color: white; }

.project-link.link-4:hover { border-color: #f39c12; background: #f39c12; }
.project-link.link-4:hover i { color: white; }
.project-link.link-4:hover .link-title { color: white; }

.project-link.link-5:hover { border-color: #1abc9c; background: #1abc9c; }
.project-link.link-5:hover i { color: white; }
.project-link.link-5:hover .link-title { color: white; }

.project-link.link-6:hover { border-color: #34495e; background: #34495e; }
.project-link.link-6:hover i { color: white; }
.project-link.link-6:hover .link-title { color: white; }

.project-link.link-7:hover { border-color: #e67e22; background: #e67e22; }
.project-link.link-7:hover i { color: white; }
.project-link.link-7:hover .link-title { color: white; }

.project-link.link-8:hover { border-color: #16a085; background: #16a085; }
.project-link.link-8:hover i { color: white; }
.project-link.link-8:hover .link-title { color: white; }

.project-link:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.project-link:hover .link-desc {
    color: rgba(255, 255, 255, 0.9);
}

/* 响应式设计 */
@media (max-width: 1400px) {
    .team-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .links-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 1024px) {
    .page-header h1 {
        font-size: 2.5rem;
    }
    
    .project-details-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .links-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .page-header h1 {
        font-size: 2rem;
    }
    
    .subtitle {
        font-size: 1rem;
    }
    
    .team-grid {
        grid-template-columns: 1fr;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .project-details-grid,
    .features-grid,
    .links-grid {
        grid-template-columns: 1fr;
    }
    
    .project-banner {
        padding: 40px 20px;
    }
    
    .project-banner h2 {
        font-size: 1.8rem;
    }
    
    .project-body {
        padding: 30px 20px;
    }
}

@media (max-width: 480px) {
    .memorial-team-page {
        padding: 30px 15px;
    }
    
    .page-header h1 {
        font-size: 1.8rem;
    }
    
    .project-banner h2 {
        font-size: 1.5rem;
    }
    
    .project-subtitle {
        font-size: 1rem;
    }
}

/* 动画效果 */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.member-card,
.project-card {
    animation: fadeInUp 0.6s ease-out;
}

.member-card:nth-child(1) { animation-delay: 0.1s; }
.member-card:nth-child(2) { animation-delay: 0.2s; }
.member-card:nth-child(3) { animation-delay: 0.3s; }
.member-card:nth-child(4) { animation-delay: 0.4s; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 进度条动画
    const progressFill = document.querySelector('.progress-fill');
    if (progressFill) {
        setTimeout(() => {
            progressFill.style.width = '100%';
        }, 500);
    }
    
    // 卡片悬停效果增强
    const cards = document.querySelectorAll('.member-card, .detail-card, .feature-item, .project-link');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });
});
</script>