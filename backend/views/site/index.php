<?php

/* @var $this yii\web\View */

$this->title = '抗日战争胜利80周年纪念 - 后台管理';
?>
<div class="site-index">
    <!-- 英雄头部区域 -->
    <div class="hero-section" style="background: linear-gradient(135deg, #800000 0%, #C00 50%, #DC143C 100%); color: white; padding: 60px 0; margin-bottom: 50px; box-shadow: 0 10px 30px rgba(192,0,0,0.3); border-bottom: 3px solid #FFD700;">
        <div class="container text-center">
            <h1 style="color: #FFD700; text-shadow: 3px 3px 6px rgba(192,0,0,0.7); font-size: 3.5em; font-weight: bold; margin-bottom: 20px;">
                <i class="glyphicon glyphicon-tower"></i> 抗日战争胜利80周年纪念
            </h1>
            <p class="lead" style="font-size: 1.4em; color: #FFE4B5; margin-bottom: 30px;">
                后台管理系统 - 铭记历史，缅怀先烈，珍爱和平
            </p>
            <div class="victory-info" style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 15px; display: inline-block;">
                <h3 style="color: #FFD700; margin: 0;">胜利日：1945年9月2日</h3>
                <p style="color: #FFE4B5; margin: 10px 0 0 0; font-size: 1.1em;">距今已有 <strong style="color: #FFD700; font-size: 1.2em;"><?= date('Y') - 1945 ?></strong> 年</p>
            </div>
        </div>
    </div>

    <div class="body-content">
        <!-- 第一行：核心管理模块 -->
        <div class="row" style="margin-bottom: 40px;">
            <div class="col-lg-4">
                <div class="management-card" style="background: white; border-radius: 15px; padding: 30px; margin-bottom: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); border-left: 5px solid #C00; transition: all 0.3s ease; height: 280px; display: flex; flex-direction: column;">
                    <div style="flex-grow: 1;">
                        <h2 style="color: #C00; margin-bottom: 20px; font-size: 1.4em;">
                            <i class="glyphicon glyphicon-map-marker" style="font-size: 1.5em; margin-right: 10px;"></i> 抗战地标管理
                        </h2>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">管理抗日战争期间的重要战场、纪念馆、抗战遗址等地理信息，为后人留下历史见证。</p>
                    </div>
                    <a class="btn btn-danger btn-block" style="border-radius: 25px; padding: 12px; font-weight: bold; background: linear-gradient(45deg, #DC143C, #B22222);" href="?r=battle/index">
                        <i class="glyphicon glyphicon-arrow-right"></i> 管理地标
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="management-card" style="background: white; border-radius: 15px; padding: 30px; margin-bottom: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); border-left: 5px solid #8B4513; transition: all 0.3s ease; height: 280px; display: flex; flex-direction: column;">
                    <div style="flex-grow: 1;">
                        <h2 style="color: #8B4513; margin-bottom: 20px; font-size: 1.4em;">
                            <i class="glyphicon glyphicon-user" style="font-size: 1.5em; margin-right: 10px;"></i> 抗战人物管理
                        </h2>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">收录抗日英雄、将领、烈士等重要历史人物，生动展现他们的英勇事迹和爱国精神。</p>
                    </div>
                    <a class="btn" style="border-radius: 25px; padding: 12px; font-weight: bold; background: linear-gradient(45deg, #8B4513, #A0522D); color: white;" href="?r=figure/index">
                        <i class="glyphicon glyphicon-arrow-right"></i> 管理人物
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="management-card" style="background: white; border-radius: 15px; padding: 30px; margin-bottom: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); border-left: 5px solid rgb(225, 118, 65); transition: all 0.3s ease; height: 280px; display: flex; flex-direction: column;">
                    <div style="flex-grow: 1;">
                        <h2 style="color:rgb(225, 124, 65); margin-bottom: 20px; font-size: 1.4em;">
                            <i class="glyphicon glyphicon-time" style="font-size: 1.5em; margin-right: 10px;"></i> 历史时间线管理
                        </h2>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">记录抗日战争重要事件的时间脉络，让历史事件按时间顺序清晰呈现。</p>
                    </div>
                    <a class="btn" style="border-radius: 25px; padding: 12px; font-weight: bold; background: linear-gradient(45deg,rgb(225, 140, 65),rgb(255, 150, 30)); color: white;" href="?r=timeline-event/index">
                        <i class="glyphicon glyphicon-arrow-right"></i> 管理时间线
                    </a>
                </div>
            </div>
        </div>

        <!-- 第二行：内容管理模块 -->
        <div class="row" style="margin-bottom: 40px;">
            <div class="col-lg-6">
                <div class="management-card" style="background: white; border-radius: 15px; padding: 30px; margin-bottom: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); border-left: 5px solid #FF6347; transition: all 0.3s ease; height: 260px; display: flex; flex-direction: column;">
                    <div style="flex-grow: 1;">
                        <h2 style="color: #FF6347; margin-bottom: 20px; font-size: 1.4em;">
                            <i class="glyphicon glyphicon-film" style="font-size: 1.5em; margin-right: 10px;"></i> 影视资源管理
                        </h2>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">管理抗战题材的电影、电视剧、纪录片等影视作品，向公众传播抗战历史。</p>
                    </div>
                    <a class="btn" style="border-radius: 25px; padding: 12px; font-weight: bold; background: linear-gradient(45deg, #FF6347, #FF4500); color: white;" href="?r=media-resource/index">
                        <i class="glyphicon glyphicon-arrow-right"></i> 管理影视
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="management-card" style="background: white; border-radius: 15px; padding: 30px; margin-bottom: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); border-left: 5px solid rgb(240, 209, 69); transition: all 0.3s ease; height: 260px; display: flex; flex-direction: column;">
                    <div style="flex-grow: 1;">
                        <h2 style="color:rgb(205, 182, 50); margin-bottom: 20px; font-size: 1.4em;">
                            <i class="glyphicon glyphicon-comment" style="font-size: 1.5em; margin-right: 10px;"></i> 留言互动管理
                        </h2>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">管理公众留言和互动内容，促进历史学习和交流。</p>
                    </div>
                    <a class="btn" style="border-radius: 25px; padding: 12px; font-weight: bold; background: linear-gradient(45deg,rgb(246, 209, 76),rgb(255, 215, 83)); color: white;" href="?r=guestbook-message/index">
                        <i class="glyphicon glyphicon-arrow-right"></i> 管理留言
                    </a>
                </div>
            </div>
        </div>

        <!-- 第三行：首页特色内容 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="management-card" style="background: linear-gradient(135deg,rgb(255, 204, 0),rgb(255, 196, 0)); border-radius: 20px; padding: 40px; box-shadow: 0 15px 35px rgba(192,0,0,0.2); text-align: center; color: #C00; border: 2px solid #C00;">
                    <h2 style="color: #8B0000; margin-bottom: 25px; font-size: 2.2em; text-shadow: 2px 2px 4px rgba(255,255,255,0.5);">
                        <i class="glyphicon glyphicon-star" style="font-size: 1.8em; margin-right: 15px;"></i> 首页特色内容管理
                    </h2>
                    <p style="color: #654321; font-size: 1.2em; line-height: 1.6; margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
                        管理网站首页展示的特色内容和重要信息，让更多人了解抗日战争的历史真相，铭记那段峥嵘岁月。
                    </p>
                    <a class="btn btn-lg" style="border-radius: 30px; padding: 15px 40px; font-weight: bold; font-size: 1.2em; background: linear-gradient(45deg, #C00, #DC143C); color: white; border: none; box-shadow: 0 8px 20px rgba(192,0,0,0.4);" href="?r=homepage-feature/index">
                        <i class="glyphicon glyphicon-star-empty"></i> 管理首页内容 <i class="glyphicon glyphicon-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.management-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2) !important;
}

.hero-section {
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="0.5" fill="%23ffffff" opacity="0.03"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.1;
}
</style>
