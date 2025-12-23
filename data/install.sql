/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 80019 (8.0.19)
 Source Host           : localhost:3306
 Source Schema         : yii2025_advanced

 Target Server Type    : MySQL
 Target Server Version : 80019 (8.0.19)
 File Encoding         : 65001

 Date: 23/12/2025 19:07:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for battle
-- ----------------------------
DROP TABLE IF EXISTS `battle`;
CREATE TABLE `battle`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `main_location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '主要地点文字',
  `main_latitude` decimal(10, 7) NULL DEFAULT NULL COMMENT '主要地点纬度',
  `main_longitude` decimal(10, 7) NULL DEFAULT NULL COMMENT '主要地点经度',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `result` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `casualties_china` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '中方伤亡',
  `casualties_japan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '日方伤亡',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-battle-name`(`name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of battle
-- ----------------------------
INSERT INTO `battle` VALUES (1, '淞沪会战', '1937-08-13', '1937-11-12', '上海', 31.2304000, 121.4737000, '淞沪会战是全面抗战爆发后中日双方在上海地区进行的大规模会战。中国军队投入大量精锐部队，试图通过正面会战粉碎日军速胜战略，是抗战初期规模最大、持续时间最长的战役之一。', '中国军队战略性撤退，日军占领上海，但未实现速战速决目标。', '约25万人', '约4万余人', 1736058730, 1736058730);
INSERT INTO `battle` VALUES (2, '南京保卫战', '1937-12-01', '1937-12-13', '南京', 32.0603000, 118.7969000, '南京保卫战是淞沪会战后中国军队为保卫首都南京而进行的防御战。由于兵力、装备及指挥等多重因素，中国军队未能守住南京，随后发生南京大屠杀。', '日军占领南京，中国军队撤离。', '约10万人以上', '约1万余人', 123, 123);
INSERT INTO `battle` VALUES (3, '台儿庄战役', '1938-03-16', '1938-04-06', '山东台儿庄', 34.5649000, 117.7343000, '台儿庄战役是抗日战争中中国军队取得的首次重大正面战场胜利，成功歼灭日军精锐部队，极大鼓舞了全国抗战士气。', '中国军队取得重大胜利，歼灭大量日军。', '约5万人', '约2万人', 124, 124);
INSERT INTO `battle` VALUES (4, '武汉会战', '1938-06-11', '1938-10-27', '武汉', 30.5928000, 114.3055000, '武汉会战是抗战初期规模最大的一次战略防御战，中国军队通过长期消耗战迟滞日军进攻，为全国持久抗战争取了时间。', '中国军队主动撤退，日军占领武汉，但战略目标未完全实现。', '约40万人', '约10万人', 125, 125);
INSERT INTO `battle` VALUES (5, '百团大战', '1940-08-20', '1941-01-24', '华北地区（山西、河北等）', 37.8734000, 112.5624000, '百团大战是八路军在华北地区发动的大规模进攻作战，重点破坏日军交通线与据点体系，是敌后战场最具影响力的战役之一。', '有效打击日军交通与据点体系，扩大敌后抗日影响。', '约1.7万人', '约2万余人', 126, 126);
INSERT INTO `battle` VALUES (6, '忻口会战', '1937-10-13', '1937-11-02', '山西忻口', 38.4177000, 112.7342000, '忻口会战是抗战初期华北地区规模最大的会战之一，中国军队依托山地地形对日军实施顽强防御，迟滞了日军向太原方向的推进。', '中国军队撤退，日军占领忻口一线，但付出较大代价。', '约10万人', '约2万人', 127, 127);
INSERT INTO `battle` VALUES (7, '太原会战', '1937-09-11', '1937-11-08', '山西太原', 37.8706000, 112.5489000, '太原会战是华北战场的重要战略会战，中国军队试图保卫山西工业基地和交通枢纽，最终因装备与空中劣势失利。', '日军占领太原，华北防线遭到严重破坏。', '约20万人', '约3万人', 128, 128);
INSERT INTO `battle` VALUES (8, '第一次长沙会战', '1939-09-17', '1939-10-06', '湖南长沙', 28.2282000, 112.9388000, '第一次长沙会战是中国军队在正面战场成功防御日军进攻的重要战役，粉碎了日军占领湖南的企图。', '中国军队取得防御胜利，日军撤退。', '约6万人', '约2万人', 129, 129);
INSERT INTO `battle` VALUES (9, '常德会战', '1943-11-02', '1943-12-20', '湖南常德', 29.0317000, 111.6985000, '常德会战是抗战后期的重要防御战役，中国军队在极端困难条件下坚守城市，对日军造成严重消耗。', '中国军队战略撤离，日军伤亡惨重。', '约4万人', '约4万余人', 129, 129);

-- ----------------------------
-- Table structure for figure
-- ----------------------------
DROP TABLE IF EXISTS `figure`;
CREATE TABLE `figure`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '姓名',
  `native_place` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '籍贯',
  `gender` tinyint NULL DEFAULT 0 COMMENT '0=未知,1=男,2=女',
  `biography` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL COMMENT '生平简介',
  `achievements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL COMMENT '主要成就',
  `cover_image_url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '封面图片URL',
  `created_at` int NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` int NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` int NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci COMMENT = '人物信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of figure
-- ----------------------------
INSERT INTO `figure` VALUES (1, '方志敏', NULL, 0, '方志敏（1899-1935） 男，汉族，江西省弋阳县人，中共党员。', '　方志敏1922年8月加入中国社会主义青年团。1924年3月转入中国共产党。中共第六届中央委员。1928年1月，参与领导弋横起义，创建赣东北苏区，领导组建中国工农红军第10军。先后任赣东北省、闽浙赣省苏维埃政府主席，红10军政治委员，中共闽浙赣省委书记。他把马克思主义普遍真理与赣东北实际相结合，创造了一整套建党、建军和建立红色政权的经验，毛泽东称之为“方志敏式”的根据地。1934年11月初，任红10军团军政委员会主席，奉命率红军北上抗日先遣队北上，在皖南遭国民党军重兵围追堵截，艰苦奋战两月余，终因寡不敌众，于1935年1月29日被俘。被俘时，国民党士兵搜遍他全身，除一块怀表和一支钢笔，没有一文钱。在狱中，面对敌人的严刑和诱降，他正气凛然，坚贞不屈。在极端艰苦的条件下，写下了《可爱的中国》、《清贫》等著名文稿。“清贫，洁白朴素的生活，正是我们革命者能够战胜许多困难的地方！”“敌人只能砍下我们的头颅，决不能动摇我们的信仰！”等激动人心、感人肺腑的语言，给我们留下了宝贵的精神财富。1935年8月6日，在江西南昌英勇就义。', 'https://p4.img.cctvpic.com/photoworkspace/contentimg/2013/08/05/2013080515344824504.jpg', 1765443499, 1765443499, NULL);
INSERT INTO `figure` VALUES (2, '于化虎', NULL, 0, '于化虎（1914-2004） 男，汉族，山东省海阳市人，中共党员。', '于化虎1942年组织基干民兵队伍，投身抗日行列。他带领民兵制造出踏雷、绊雷、连环雷、夹子雷、钉子雷、梅花雷等20多种地雷，有力地打击了日寇，威震胶东。1943年5月，他率领爆破组在村边埋下70多枚土制石头拉雷和石头拌雷，炸死炸伤前来袭击的日军17人。1945年夏的一天，日军聚集约400多人，对周围村庄进行“扫荡”。于化虎组织民兵，混入敌人内部，活捉敌人14个哨兵，穿上哨兵的衣服进村布雷，然后撤出村，放枪诱敌上钩。敌人慌乱互相射击，地雷遍地开花，死伤47人。他积极传授布雷技术，1944年10月，于化虎等5人受胶东军区委派，到烟潍线开展地雷战，历时4个多月。他教给1000多名民兵埋雷技术，在蓬莱附近一次就炸死炸伤日伪军28人。一直到抗战胜利为止，他亲手培养起来的爆炸模范仅3个地区就有20多名，会使用5种以上地雷的爆炸手达1400多人，他曾创造一枚地雷杀伤7名敌人的纪录。1945年被胶东军区授予“爆炸大王”称号，评为“胶东民兵英雄”。1950年出席在北京召开的全国英模代表会议，被评为“全国民兵英雄”。', 'https://p5.img.cctvpic.com/photoworkspace/contentimg/2013/08/05/2013080515403460811.jpg', 1765443825, 1765443825, NULL);
INSERT INTO `figure` VALUES (3, '白求恩', NULL, 0, '白求恩（1890-1939） 男，加拿大安大略州人，加共党员。', '诺尔曼·白求恩1916年毕业于多伦多大学医学院，1935年被选为美国胸外科学会会员、理事。同年加入加拿大共产党。中国抗日战争爆发后，受加拿大共产党和美国共产党的派遣，率领一个由加拿大人和美国人组成的医疗队支援中国人民的正义斗争，为抵抗日本侵略军的中国军民服务，于1938年3月到达延安，随即转赴晋察冀抗日根据地。他积极投入到组织战地流动医疗队、出入火线救死扶伤的工作中，为减少伤员的痛苦和残疾，他把手术台设在离火线最近的地方。他提议开办卫生材料厂，解决了药品不足的问题；创办卫生学校，培养了大批医务干部；编写了多种战地医疗教材并亲自讲课。他的牺牲精神、工作热忱、高度责任心，堪称模范。他虽年近五旬，但多次为伤员输血，一次竟连续为115名伤员做手术，持续时间达69个小时。1939年10月下旬，在抢救伤员时左手中指被手术刀割破，终因伤势恶化，感染败血症，医治无效，于11月12日在河北省唐县黄石口村逝世。12月1日，延安各界举行追悼大会，毛泽东题了挽词，并写了《纪念白求恩》一文，高度赞扬白求恩伟大的国际主义和共产主义精神。', 'https://p1.img.cctvpic.com/photoworkspace/contentimg/2013/08/05/2013080515115192135.jpg', 1765443859, 1765443859, NULL);
INSERT INTO `figure` VALUES (4, '刘胡兰', NULL, 0, '刘胡兰（1932-1947） 女，汉族，山西省文水县人，中共党员。', '全国抗战爆发后，中国共产党领导山西人民开展救亡运动，文水县成立了抗日民主政府。在党的领导下，云周西村涌现出一批抗日积极分子，一些贫苦农民相继入党，并成立了党支部。刘胡兰积极参加村里的抗日儿童团，为八路军站岗、放哨、送情报。后来，刘胡兰当上了云周西村妇救会秘书，参加了党领导的送公粮、做军鞋等群众活动，还动员青年报名参加八路军。抗战胜利后，阎锡山的部队占领了文水县城，解放区军民被迫拿起自卫武器，保卫抗战胜利成果。1945年11月，刘胡兰参加了党组织举办的妇女干部训练班，阶级觉悟有了进一步的提高。1946年2月，刘胡兰参加了我军反击阎锡山顽军作战的东庄战斗的支前工作，得到了进一步的锻炼成长。刘胡兰在斗争中经受了严峻考验，于1946年6月被批准为中共候补党员。1947年1月12日，阎锡山国民党军和地方武装“复仇自卫队”包围了云周西村，刘胡兰被国民党军和地主武装抓获。在敌人威胁面前，她坚贞不屈，大义凛然地说：“怕死不当共产党！”敌人将同时被捕的6位革命群众当场铡死。但她毫不畏惧，从容地躺在铡刀下，英勇牺牲。毛泽东为她题词：“生的伟大，死的光荣。”', 'https://p1.img.cctvpic.com/photoworkspace/contentimg/2013/08/05/2013080515062224781.jpg', 1765443899, 1765443899, NULL);
INSERT INTO `figure` VALUES (5, '戎冠秀', NULL, 0, '戎冠秀（1896-1989）女，汉族，河北省平山县人，1938年加入中国共产党。', '抗日战争时期，积极组织妇女发展生产，拥军支前。1944年2月，被晋察冀解放区政府和晋察冀军区授予“子弟兵的母亲”的光荣称号。', 'https://p3.img.cctvpic.com/photoAlbum/page/performance/img/2015/8/6/1438831635289_113.jpg', 1765443983, 1766423599, NULL);
INSERT INTO `figure` VALUES (6, '赵一曼', NULL, 0, '赵一曼（1905-1936） 女，汉族，四川省宜宾县人，中共党员。', '赵一曼1923年加入中国社会主义青年团，1926年夏加入中国共产党。同年11月，入武汉中央军事政治学校学习。1927年9月，去苏联莫斯科中山大学学习。次年回国，在宜昌、南昌和上海等地秘密开展党的工作。“九一八”事变后，被派往东北地区发动抗日斗争。先后任满洲总工会秘书、组织部长，中共滨江省珠河县中心县委特派员、铁北区委书记，领导工人进行罢工运动，组织青年农民反日游击队与敌人进行斗争。1935年秋，任东北抗日联军第3军第2团政治委员。11月间，第2团被日伪军围困于一座山间。赵一曼为掩护部队突围，身负重伤，养伤期间被日军发现，战斗中再度负伤，昏迷被俘。日军对她施以酷刑，用钢针刺伤口，用烧红的烙铁烙皮肉，逼其招供。她宁死不屈，严词痛斥日军侵略罪行。为了得到口供，日军将她送进医院监护治疗。在医院里，她积极宣传抗日救国的道理，教育争取看护和看守人员。1936年6月28日，在看护和看守帮助下逃出医院。6月30日晨，被追敌再度抓捕，受到更加残酷的刑讯。1936年8月2日，在珠河被敌杀害。临刑前，她高呼“打倒日本帝国主义！”“中国共产党万岁！”视死如归，从容就义，年仅31岁。', 'https://p1.img.cctvpic.com/photoworkspace/contentimg/2013/08/05/2013080511183064744.jpg', 1765444083, 1765444083, NULL);

-- ----------------------------
-- Table structure for guestbook_message
-- ----------------------------
DROP TABLE IF EXISTS `guestbook_message`;
CREATE TABLE `guestbook_message`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '匿名',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-guestbook-is_approved`(`is_approved` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guestbook_message
-- ----------------------------
INSERT INTO `guestbook_message` VALUES (2, '老王', '抗日战争胜利八十周年！', 1, 1765458577, 1766420917);
INSERT INTO `guestbook_message` VALUES (3, '老李', '你好中国！', 1, 1766301752, 1766303817);
INSERT INTO `guestbook_message` VALUES (4, '', '1', 0, 1766303357, 1766412174);
INSERT INTO `guestbook_message` VALUES (5, '123', '我爱中国！', 0, 1766414293, 1766414293);
INSERT INTO `guestbook_message` VALUES (6, '123', '我爱中国', 0, 1766477237, 1766477237);

-- ----------------------------
-- Table structure for homepage_feature
-- ----------------------------
DROP TABLE IF EXISTS `homepage_feature`;
CREATE TABLE `homepage_feature`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int NULL DEFAULT 0,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-homepage_feature-active-order`(`is_active` ASC, `display_order` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of homepage_feature
-- ----------------------------
INSERT INTO `homepage_feature` VALUES (1, '铭记历史 缅怀先烈 | 中国人民抗日战争伟大胜利的历史启示', '历史告诫我们，正义的信念不可动摇，和平的期盼不可阻遏，人民的力量不可战胜', '', '/img/1.png', 'https://news.cctv.com/2025/09/14/ARTIMmDv52vClgLiIZQA5oww250914.shtml', 0, 1, 1766025504, 1766033520);
INSERT INTO `homepage_feature` VALUES (2, '思想战线丨怎么看中国人民抗日战争的伟大胜利', '惊天地、泣鬼神的雄壮史诗', '', '/img/1.png', 'http://www.mod.gov.cn/gfbw/jmsd/16410128.html', NULL, 1, 1766028355, 1766033249);
INSERT INTO `homepage_feature` VALUES (3, '烈士纪念日向人民英雄敬献花篮仪式在京隆重举行 习近平等党和国家领导人出席', '烈士纪念日向人民英雄敬献花篮仪式在京隆重举行', '', '/img/2.png', 'http://www.news.cn/politics/leaders/20250930/9455ac5978034561a3519f180bc7bff1/c.html', NULL, 1, 1766028587, 1766028587);
INSERT INTO `homepage_feature` VALUES (4, '纪念中国人民抗日战争暨世界反法西斯战争胜利80周年大会在京隆重举行 习近平发表重要讲话并检阅受阅部队', '', '', '/img/3.png', 'http://www.news.cn/20250903/86e0a8bd188e437b8de3302fc9512390/c.html', NULL, 1, 1766028857, 1766420793);
INSERT INTO `homepage_feature` VALUES (5, '铸就不屈脊梁 激扬爱国情怀——中国人民抗日战争胜利80周年的时代启示之二', '硝烟已散，精神永存！', '', '/img/1.png', 'https://www.ccdi.gov.cn/yaowenn/202508/t20250827_443474.html', 9, 1, 1766032965, 1766033572);
INSERT INTO `homepage_feature` VALUES (6, '讲述抗战故事 弘扬抗战精神 | 抗战胜利80周年系列纪念活动梳理', '中国人民抗日战争暨世界反法西斯战争胜利80周年主题展览和推出优秀文艺作品、文艺活动有关情况', '', '/img/2.png', 'https://news.cctv.com/2025/07/03/ARTIRrcRv9695dTa2QbZfusu250703.shtml', 10, 1, 1766033080, 1766033646);

-- ----------------------------
-- Table structure for important_meeting
-- ----------------------------
DROP TABLE IF EXISTS `important_meeting`;
CREATE TABLE `important_meeting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '会议标题',
  `meeting_date` date NULL DEFAULT NULL COMMENT '会议日期',
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '地点',
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '封面图',
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '外链/详情地址',
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '摘要',
  `display_order` int NULL DEFAULT 0 COMMENT '显示顺序',
  `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否展示',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-important_meeting-meeting_date`(`meeting_date` ASC) USING BTREE,
  INDEX `idx-important_meeting-is_active`(`is_active` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of important_meeting
-- ----------------------------
INSERT INTO `important_meeting` VALUES (1, '纪念中国人民抗日战争暨世界反法西斯战争胜利 80 周年大会', '2025-09-03', '北京 天安门广场、长安街及人民大会堂', '/img/4.png', 'http://www.scio.gov.cn/live/2025/36604/fbyd/202506/t20250625_918721.html', '在天安门广场举行隆重的纪念大会\r\n\r\n国家领导人发表重要讲话\r\n\r\n检阅受阅部队\r\n\r\n海内外纪念代表出席\r\n习近平在大会上发表讲话，缅怀抗战先烈、铭记历史、珍爱和平，同时总结历史经验与现实意义。', 0, 1, 1766470622, 1766475493);
INSERT INTO `important_meeting` VALUES (2, '抗战胜利纪念日（地方与学界纪念会议）', '2025-08-15', '全国多地纪念会议、学术研讨会、座谈会', '/img/5.png', 'https://www.chinanews.com/gn/2025/08-15/10465420.shtml', '抗战史学术研讨会、地方纪念大会（南京、沈阳、重庆等地）\r\n说明：8·15 为日本宣布无条件投降日，历年都会举办纪念会议，80 周年规模更大。', 0, 1, 1766470816, 1766471180);
INSERT INTO `important_meeting` VALUES (3, '“七七事变”88 周年纪念活动（与 80 周年主题联动）', '2025-07-07', '北京卢沟桥、中国人民抗日战争纪念馆', '/img/6.png', 'https://news.cctv.com/2025/07/07/ARTIUCAkq1yfjTogSynIA1oD250707.shtml', '纪念性会议 + 主题展览 + 学术座谈\r\n说明：虽非“胜利日”，但80 周年纪念周期内的重要节点会议。', 0, 1, 1766470887, 1766471188);

-- ----------------------------
-- Table structure for important_meeting_highlight
-- ----------------------------
DROP TABLE IF EXISTS `important_meeting_highlight`;
CREATE TABLE `important_meeting_highlight`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `meeting_id` int NOT NULL COMMENT '所属会议',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '亮点/议题标题',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '补充说明',
  `display_order` int NULL DEFAULT 0 COMMENT '显示顺序',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-important_meeting_highlight-meeting_id`(`meeting_id` ASC) USING BTREE,
  INDEX `idx-important_meeting_highlight-order`(`meeting_id` ASC, `display_order` ASC) USING BTREE,
  CONSTRAINT `fk-important_meeting_highlight-meeting_id` FOREIGN KEY (`meeting_id`) REFERENCES `important_meeting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of important_meeting_highlight
-- ----------------------------
INSERT INTO `important_meeting_highlight` VALUES (1, 1, '“民族壮歌·胜利之声”纪念中国人民抗日战争暨世界反法西斯战争胜利80周年音乐作品征集活动成果展演隆重举行', '2025年12月21日上午，中国人民抗日战争纪念馆庄严而肃穆。由中国人民抗日战争纪念馆与中国少数民族声乐学会联合主办的“民族壮歌·胜利之声——纪念中国人民抗日战争暨世界反法西斯战争胜利80周年音乐作品征集活动成果展演”在这里隆重举行。\r\n\r\n“歌声虽已息，回响却绵延不绝；历史虽远去，精神却永驻心间。” 当《保卫黄河》的旋律在抗战纪念馆大厅最后一次回荡，许多观众眼中闪烁着泪光。这些来自各民族、各行业的参与者用音符编织成一座跨越时空的桥梁。', 0, 1766471389, 1766474945);

-- ----------------------------
-- Table structure for media_resource
-- ----------------------------
DROP TABLE IF EXISTS `media_resource`;
CREATE TABLE `media_resource`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` smallint NOT NULL COMMENT '1:Image, 2:Video, 3:Audio, 4:Movie',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '本地路径',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `linkable_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '关联模型名',
  `linkable_id` int NULL DEFAULT NULL COMMENT '关联模型ID',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-media-type`(`type` ASC) USING BTREE,
  INDEX `idx-media-linkable`(`linkable_type` ASC, `linkable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media_resource
-- ----------------------------
INSERT INTO `media_resource` VALUES (1, '“她没招供，已无法从医学生理上解释”赵一曼生命最后遭遇了什么？', 1, 'https://www.bilibili.com/video/BV1EG4y1x7qx/?share_source=copy_web&vd_source=e9f2eb37db7b3b4286ce578659043186', 'https://youke2.picui.cn/s1/2025/12/16/6940defee5927.png', '一世忠贞兴故国，满腔热血沃中华。\r\n白山黑水除敌寇，笑看旌旗红似花。', 'common\\models\\Figure', 6, 20220929, 1766412120);
INSERT INTO `media_resource` VALUES (2, '还记得白求恩吗？他远比课本记载的伟大，必将被中国人永远铭记！', 5, ' https://www.bilibili.com/video/BV15L411G7dC/?share_source=copy_web&vd_source=e9f2eb37db7b3b4286ce578659043186', 'https://youke2.picui.cn/s1/2025/12/16/6940deff43922.png', '什么是信仰？为了救人宁愿牺牲自己，他远比课本记载的伟大！', 'common\\models\\Figure', 3, 1765452707, 1765859211);
INSERT INTO `media_resource` VALUES (9, '白求恩大夫 ', 2, 'https://www.bilibili.com/bangumi/play/ep313058/?share_source=copy_web', 'https://youke2.picui.cn/s1/2025/12/16/6940deff2f97c.png', '1938年初，国际主义战士诺尔曼•白求恩远渡重洋来到中国，支援中国人民的抗日战争。毛主席在延安接见了他，军区卫生部安排他做医疗顾问，白求恩发现边区的医疗条件比他想象的还要差很多。他向司令员请示办一个后方示范医院，调各分区医生来参加培训，他还不顾个人安危，亲自到前线为重伤员做手术。由于缺少必要的医疗器械，好多重伤员得不到及时救治，白求恩心急如焚，他决定回加拿大一次。但突发而至的战斗阻挡了他回国的步伐，他对送他的方大夫和童秘书说：我不走了，这里更需要我。黄土岭战役后，在一次给战士做手术中，他不小心划破了手指，悲剧不可避免地发生了......', 'common\\models\\Figure', 3, 1765453151, 1765859167);
INSERT INTO `media_resource` VALUES (10, '南京照相馆', 4, 'https://www.mgtv.com/h/768696.html', 'https://youke2.picui.cn/s1/2025/12/16/6940df108decc.png', '影片故事取材于南京大屠杀期间日军真实罪证影像。一群生活在南京的百姓躲在吉祥照相馆中避难，为了尽可能的多活一日，他们被迫帮助日军摄影师冲洗底片，却意外冲印出了能证明日军屠城的罪证照片。他们原本只想在大屠杀中保命活下去，面对日军在南京城内的暴行，他们决定让这些底片留存下去……', '', NULL, 1765851166, 1765859235);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1762830054);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1762830060);
INSERT INTO `migration` VALUES ('m190124_110200_add_verification_token_column_to_user_table', 1762830060);
INSERT INTO `migration` VALUES ('m240318_000100_simplify_figure_table', 1766404452);
INSERT INTO `migration` VALUES ('m251109_124738_create_battle_table', 1762830060);
INSERT INTO `migration` VALUES ('m251109_124759_create_figure_table', 1762830060);
INSERT INTO `migration` VALUES ('m251109_124843_create_timeline_event_table', 1762830060);
INSERT INTO `migration` VALUES ('m251109_124849_create_role_table', 1762830060);
INSERT INTO `migration` VALUES ('m251109_124855_create_map_marker_table', 1762830060);
INSERT INTO `migration` VALUES ('m251109_124902_create_figure_role_junction_table', 1762830060);
INSERT INTO `migration` VALUES ('m251109_124914_create_media_resource_table', 1762830060);
INSERT INTO `migration` VALUES ('m251109_124921_create_guestbook_message_table', 1762830061);
INSERT INTO `migration` VALUES ('m251109_130530_create_statistic_category_table', 1762830061);
INSERT INTO `migration` VALUES ('m251109_130542_create_statistic_table', 1762830061);
INSERT INTO `migration` VALUES ('m251210_135000_add_fields_to_figure_table', 1766406373);
INSERT INTO `migration` VALUES ('m251210_135100_create_figure_battle_table', 1766406373);
INSERT INTO `migration` VALUES ('m251222_000001_create_war_dataset_and_record_tables', 1766406423);
INSERT INTO `migration` VALUES ('m260101_000001_create_homepage_feature_table', 1766406423);
INSERT INTO `migration` VALUES ('m260101_010000_add_deleted_at_to_figure_table', 1766406423);
INSERT INTO `migration` VALUES ('m260102_000000_create_map_marker_table', 1766413858);
INSERT INTO `migration` VALUES ('m260103_000000_create_relic_table', 1766415732);

-- ----------------------------
-- Table structure for timeline_event
-- ----------------------------
DROP TABLE IF EXISTS `timeline_event`;
CREATE TABLE `timeline_event`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_date` date NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `cover_image_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `importance` smallint NULL DEFAULT 1,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-timeline_event-date`(`event_date`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of timeline_event
-- ----------------------------
INSERT INTO `timeline_event` VALUES (3, '1931-09-18', '九一八事变', '日本关东军发动侵略，东北局势骤变，抗战序幕拉开。', '/images/timeline/1931-09-18.jpg', 3, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (4, '1932-01-28', '一·二八淞沪抗战', '日军在上海挑衅，十九路军奋起抵抗，震动全国。', '/images/timeline/1932-01-28.jpg', 2, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (5, '1932-03-09', '伪满洲国成立', '日本扶植伪政权，东北沦陷局势进一步固定化。', '/images/timeline/1932-03-09.jpg', 2, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (6, '1933-05-31', '塘沽协定', '国民政府与日方签订协定，华北局势恶化。', '/images/timeline/1933-05-31.jpg', 1, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (7, '1935-12-09', '一二·九运动', '北平学生发起抗日救亡运动，民族意识高涨。', '/images/timeline/1935-12-09.jpg', 2, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (8, '1936-12-12', '西安事变', '张学良、杨虎城扣押蒋介石，推动国共合作抗日。', '/images/timeline/1936-12-12.jpg', 3, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (9, '1937-07-07', '卢沟桥事变', '全民族抗战全面爆发的重要节点。', '/images/timeline/1937-07-07.jpg', 3, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (10, '1937-08-13', '淞沪会战爆发', '中国军队在上海与日军展开大规模会战。', '/images/timeline/1937-08-13.jpg', 3, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (11, '1937-12-13', '南京大屠杀', '南京陷落后日军实施大规模屠杀与暴行。', '/images/timeline/1937-12-13.jpg', 3, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (12, '1938-06-09', '花园口决堤', '黄河花园口决堤，阻滞日军推进但造成巨大灾难。', '/images/timeline/1938-06-09.gif', 2, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (13, '1938-10-25', '武汉会战结束', '武汉失守后，正面战场进入战略相持阶段。', '/images/timeline/1938-10.jpg', 2, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (14, '1939-09-01', '二战全面爆发', '欧洲战争爆发，国际格局变化影响中国抗战。', '/images/timeline/1939-09-01.jpg', 1, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (15, '1940-08-20', '百团大战', '八路军对华北日军交通线发动大规模破袭战。', '/images/timeline/1940-08-20.jpg', 3, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (16, '1941-01-17', '皖南事变', '国共关系严重受挫，但抗战仍在艰难推进。', '/images/timeline/1941-12-07.png', 2, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (17, '1941-12-07', '太平洋战争爆发', '珍珠港事件后，中日战争纳入世界反法西斯战争。', '/images/timeline/1941-12-07.png', 3, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (18, '1942-05-01', '滇缅战役与远征军', '中国远征军入缅作战，国际协同抗战加强。', '/images/timeline/1942-05-01.gif', 2, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (19, '1943-11-26', '开罗宣言', '中美英确认战后日本窃取中国领土应归还中国。', '/images/timeline/1943.jpg', 3, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (20, '1944-04-17', '豫湘桂会战', '日军发动大规模进攻，中国战局进入最艰难阶段之一。', '/images/timeline/1944-04-17.jpg', 2, 1765357721, 1766486535);
INSERT INTO `timeline_event` VALUES (22, '1945-09-02', '对日受降签字', '日本在密苏里号上签署投降书，抗战胜利完成。', '/images/timeline/1945.jpg', 3, 1765357721, 1766486535);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT 10,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE,
  UNIQUE INDEX `password_reset_token`(`password_reset_token` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '9bLeJZZ2dKB2yMNKY6J9JwbPIeYMbOxQ', '$2y$13$N3nF02/58g2dGNArlEYfzOW2637m.g2hUKvj18xuxB4NHCFWSY3zC', NULL, 'admin@example.com', 10, 1765457817, 1765457817, NULL);
INSERT INTO `user` VALUES (3, 'administrator', 'woCa7VVaUPZ_um7b-P5ozRU1e5T2R2uj', '$2y$13$xASNupzpu.btNAPWnky0NOG6j7dIB7rEZWPnjf6oocqCdX/Y3rz0a', NULL, 'admin@yii2025.com', 10, 1765457837, 1765457837, NULL);

-- ----------------------------
-- Table structure for war_dataset
-- ----------------------------
DROP TABLE IF EXISTS `war_dataset`;
CREATE TABLE `war_dataset`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `display_order` int NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` int NOT NULL DEFAULT 0,
  `updated_at` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `key`(`key` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of war_dataset
-- ----------------------------
INSERT INTO `war_dataset` VALUES (1, '01_china_casualties_estimates', '01_china_casualties_estimates', '01_china_casualties_estimates.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (2, '02_kmt_1947_casualties_components', '02_kmt_1947_casualties_components', '02_kmt_1947_casualties_components.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (3, '03_liberated_areas_losses', '03_liberated_areas_losses', '03_liberated_areas_losses.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (4, '04_ccp_forces_losses', '04_ccp_forces_losses', '04_ccp_forces_losses.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (5, '05_special_losses', '05_special_losses', '05_special_losses.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (6, '06_ww2_overview_and_soviet_losses', '06_ww2_overview_and_soviet_losses', '06_ww2_overview_and_soviet_losses.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (7, '07_displacement', '07_displacement', '07_displacement.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (8, '08_china_theater_military_numbers_2015', '08_china_theater_military_numbers_2015', '08_china_theater_military_numbers_2015.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (9, '09_kmt_major_campaigns_list', '09_kmt_major_campaigns_list', '09_kmt_major_campaigns_list.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (10, '10_battle_casualty_reports_comparison', '10_battle_casualty_reports_comparison', '10_battle_casualty_reports_comparison.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (11, '11_ccp_battle_reports_discrepancies', '11_ccp_battle_reports_discrepancies', '11_ccp_battle_reports_discrepancies.csv', NULL, 0, 1, 1766388071, 1766406452);
INSERT INTO `war_dataset` VALUES (12, '12_martyrs_generals_list', '12_martyrs_generals_list', '12_martyrs_generals_list.csv', NULL, 0, 1, 1766388071, 1766406452);

-- ----------------------------
-- Table structure for war_record
-- ----------------------------
DROP TABLE IF EXISTS `war_record`;
CREATE TABLE `war_record`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `dataset_id` int NOT NULL,
  `row_index` int NOT NULL DEFAULT 0,
  `data_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int NOT NULL DEFAULT 0,
  `updated_at` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_war_record_dataset_id`(`dataset_id` ASC) USING BTREE,
  CONSTRAINT `fk_war_record_dataset` FOREIGN KEY (`dataset_id`) REFERENCES `war_dataset` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 395 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of war_record
-- ----------------------------
INSERT INTO `war_record` VALUES (198, 1, 2, '{\"dataset\":\"中国伤亡与损失估计（多来源）\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中国（全国）\",\"metric\":\"直接经济损失\",\"value\":\"620\",\"unit\":\"十亿美元(USD)\",\"type\":\"估计\",\"source\":\"中华人民共和国国务院新闻办公室：《中国的人权状况》(1991)，引自用户文本\",\"note\":\"用户文本：直接损失620亿美元；间接损失>5000亿美元；930+城市被占领。\"}', 1766406452, 1766475289);
INSERT INTO `war_record` VALUES (199, 1, 3, '{\"dataset\":\"中国伤亡与损失估计（多来源）\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中国（全国）\",\"metric\":\"间接经济损失\",\"value\":\"5000\",\"unit\":\"十亿美元(USD)\",\"type\":\"估计\",\"source\":\"中华人民共和国国务院新闻办公室：《中国的人权状况》(1991)，引自用户文本\",\"note\":\"用户文本称间接损失“超过5000十亿美元”（文本可能口径有歧义，按原文保留）。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (200, 1, 4, '{\"dataset\":\"中国伤亡与损失估计（多来源）\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中国（全国）\",\"metric\":\"死伤总数（含死亡+受伤）\",\"value\":\"2100\",\"unit\":\"万人\",\"type\":\"估计\",\"source\":\"国务院新闻办公室(1991)，引自用户文本\",\"note\":\"2100余万人被打死打伤（死亡+受伤）。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (201, 1, 5, '{\"dataset\":\"中国伤亡与损失估计（多来源）\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中国（全国）\",\"metric\":\"暴行致死（部分口径）\",\"value\":\"1000\",\"unit\":\"万人\",\"type\":\"估计\",\"source\":\"国务院新闻办公室(1991)，引自用户文本\",\"note\":\"1000余万人被残害致死（暴行致死）。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (202, 1, 6, '{\"dataset\":\"中国伤亡与损失估计（多来源）\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中国（全国）\",\"metric\":\"直接经济损失\",\"value\":\"100\",\"unit\":\"十亿美元(USD)\",\"type\":\"估计\",\"source\":\"江泽民讲话(1995)，引自用户文本\",\"note\":\"1995讲话：用户文本称直接损失1000亿美元（此处按用户表述保留）。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (203, 1, 7, '{\"dataset\":\"中国伤亡与损失估计（多来源）\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中国（全国）\",\"metric\":\"间接经济损失\",\"value\":\"5000\",\"unit\":\"十亿美元(USD)\",\"type\":\"估计\",\"source\":\"江泽民讲话(1995)，引自用户文本\",\"note\":\"按用户文本原样保留。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (204, 1, 8, '{\"dataset\":\"中国伤亡与损失估计（多来源）\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中国（全国）\",\"metric\":\"死伤总数（含死亡+受伤）\",\"value\":\"3500\",\"unit\":\"万人\",\"type\":\"估计\",\"source\":\"江泽民讲话(1995)/胡锦涛讲话(2005)，引自用户文本\",\"note\":\"用户文本：“中国死伤3500万人/3500多万人”。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (205, 1, 9, '{\"dataset\":\"中国伤亡与损失估计（多来源）\",\"period_start\":\"1931\",\"period_end\":\"1945\",\"scope\":\"中国（全国，十四年）\",\"metric\":\"死亡人数（二战相关）\",\"value\":\"1800\",\"unit\":\"万人\",\"type\":\"估计\",\"source\":\"用户文本（二战分项小节）\",\"note\":\"用户文本：死亡约1800万；累计死伤约3500万。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (206, 2, 2, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"军队\",\"metric\":\"军队伤亡合计\",\"value\":\"3227926\",\"unit\":\"人\",\"source\":\"国民政府行政院报告(1947年2月)，引自用户文本\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (207, 2, 3, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"军队\",\"metric\":\"战斗阵亡\",\"value\":\"1328501\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (208, 2, 4, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"军队\",\"metric\":\"战斗负伤\",\"value\":\"1769299\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (209, 2, 5, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"军队\",\"metric\":\"战斗失踪\",\"value\":\"130126\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (210, 2, 6, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"军队\",\"metric\":\"病故\",\"value\":\"422479\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (211, 2, 7, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"平民\",\"metric\":\"平民伤亡合计\",\"value\":\"9134569\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (212, 2, 8, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"平民\",\"metric\":\"平民死亡\",\"value\":\"4397504\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (213, 2, 9, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"平民\",\"metric\":\"平民受伤\",\"value\":\"4739065\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (214, 2, 10, '{\"dataset\":\"中国伤亡构成(1947国民政府报告)\",\"year\":\"1947\",\"scope\":\"国民政府控制区（不含台湾/东北/解放区等）\",\"group\":\"合计\",\"metric\":\"总伤亡（军队+平民）\",\"value\":\"12784974\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"用户文本说明：不含台湾、东北与解放区等。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (215, 3, 2, '{\"dataset\":\"解放区人口损失（初步统计）\",\"year\":\"1946\",\"scope\":\"七个抗日根据地（晋察冀/晋绥/晋冀鲁豫/冀热辽/山东/苏皖/中原）\",\"metric\":\"被杀害或遭虐杀致死\",\"value\":\"3176123\",\"unit\":\"人\",\"source\":\"《中国解放区抗战8年中人口损失初步统计表》(1946年4月)，引自用户文本\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (216, 3, 3, '{\"dataset\":\"解放区人口损失（初步统计）\",\"year\":\"1946\",\"scope\":\"七个抗日根据地（晋察冀/晋绥/晋冀鲁豫/冀热辽/山东/苏皖/中原）\",\"metric\":\"被掳走壮丁（劳动力）\",\"value\":\"2760227\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (217, 3, 4, '{\"dataset\":\"解放区人口损失（初步统计）\",\"year\":\"1946\",\"scope\":\"七个抗日根据地（晋察冀/晋绥/晋冀鲁豫/冀热辽/山东/苏皖/中原）\",\"metric\":\"鳏寡孤独及肢体伤残（受影响人口）\",\"value\":\"2963582\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"注意：该项并非死亡人数，而是受影响人口类别统计。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (218, 4, 2, '{\"dataset\":\"中共领导武装损失统计\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中共领导的抗日武装\",\"metric\":\"负伤\",\"value\":\"290000\",\"unit\":\"人\",\"source\":\"《抗日战争8年敌我兵力损失统计》，引自用户文本\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (219, 4, 3, '{\"dataset\":\"中共领导武装损失统计\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中共领导的抗日武装\",\"metric\":\"阵亡\",\"value\":\"160000\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (220, 4, 4, '{\"dataset\":\"中共领导武装损失统计\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中共领导的抗日武装\",\"metric\":\"被俘\",\"value\":\"46000\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (221, 4, 5, '{\"dataset\":\"中共领导武装损失统计\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中共领导的抗日武装\",\"metric\":\"失踪\",\"value\":\"87000\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (222, 4, 6, '{\"dataset\":\"中共领导武装损失统计\",\"period_start\":\"1937\",\"period_end\":\"1945\",\"scope\":\"中共领导的抗日武装\",\"metric\":\"损失合计\",\"value\":\"583000\",\"unit\":\"人\",\"source\":\"同上\",\"note\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (223, 5, 2, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"1935\",\"结束年\":\"1945\",\"范围\":\"沦陷区\",\"指标\":\"“被强征/役使劳工总数（合计）”\",\"数值\":\"1500\",\"单位\":\"“万人”\",\"来源\":\"用户文本：“1935-1945…共强征、役使中国劳工总数为1500余万人”\",\"备注\":\"估计值；包含多种强征方式。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (224, 5, 3, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国（万人坑）\",\"指标\":\"“发现的万人坑地点数”\",\"数值\":\"80\",\"单位\":\"处\",\"来源\":\"用户文本（引用1991白皮书）\",\"备注\":\"“万人坑80+处；遗骨70万+具。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (225, 5, 4, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国（万人坑）\",\"指标\":\"“发现的劳工遗骸（遗骨）数量”\",\"数值\":\"70\",\"单位\":\"“万具”\",\"来源\":\"同上\",\"备注\":\"70万具。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (226, 5, 5, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"1940\",\"结束年\":\"1945\",\"范围\":\"中国（20省）\",\"指标\":\"“细菌战致死人数（不完全统计）”\",\"数值\":\"27\",\"单位\":\"“万人”\",\"来源\":\"用户文本（引用1989档案汇编）\",\"备注\":\"“27万+死亡，不完全；不含后续传播与饥荒等因素。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (227, 5, 6, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"1940\",\"结束年\":\"1948\",\"范围\":\"“浙江衢州”\",\"指标\":\"“细菌战疫情发病人数（累计）”\",\"数值\":\"30\",\"单位\":\"“万人”\",\"来源\":\"用户文本（衢州疫情）\",\"备注\":\"“发病30余万人。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (228, 5, 7, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"1940\",\"结束年\":\"1948\",\"范围\":\"“浙江衢州”\",\"指标\":\"“细菌战疫情死亡人数（累计）”\",\"数值\":\"5\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“死亡5万余人。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (229, 5, 8, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"1947\",\"结束年\":\"1947\",\"范围\":\"“平房地区（原731相关区域）”\",\"指标\":\"“鼠疫死亡（示例年份）”\",\"数值\":\"3\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“1947年鼠疫夺走3万+生命。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (230, 5, 9, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"“王爷庙/乌兰浩特一带”\",\"指标\":\"“鼠疫死亡（示例）”\",\"数值\":\"4\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“死亡4万+。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (231, 5, 10, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"1941\",\"结束年\":\"1945\",\"范围\":\"731部队\",\"指标\":\"“人体实验人数/年（下限）”\",\"数值\":\"400\",\"单位\":\"“人/年”\",\"来源\":\"用户文本（引用川岛清证词：哈巴罗夫斯克审判）\",\"备注\":\"“范围400–600/年。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (232, 5, 11, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"1941\",\"结束年\":\"1945\",\"范围\":\"731部队\",\"指标\":\"“人体实验人数/年（上限）”\",\"数值\":\"600\",\"单位\":\"“人/年”\",\"来源\":\"同上\",\"备注\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (233, 5, 12, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"731部队\",\"指标\":\"“活体解剖/实验致死估计（约）”\",\"数值\":\"3000\",\"单位\":\"人\",\"来源\":\"用户文本（推算）\",\"备注\":\"由400–600/年粗略推算的数量级估计。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (234, 5, 13, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国（化学战）\",\"指标\":\"“毒气攻击次数”\",\"数值\":\"2091\",\"单位\":\"次\",\"来源\":\"用户文本\",\"备注\":\"“涉及14省、77县（区）。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (235, 5, 14, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"华北游击队\",\"指标\":\"“毒气攻击次数（子集）”\",\"数值\":\"423\",\"单位\":\"次\",\"来源\":\"用户文本\",\"备注\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (236, 5, 15, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"华北游击队\",\"指标\":\"“化学战伤亡（子集）”\",\"数值\":\"3.3\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“3.3万余人伤亡。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (237, 5, 16, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国正规军\",\"指标\":\"“化学战死亡（子集）”\",\"数值\":\"6000\",\"单位\":\"人\",\"来源\":\"用户文本\",\"备注\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (238, 5, 17, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国正规军\",\"指标\":\"“化学战受伤（子集）”\",\"数值\":\"41000\",\"单位\":\"人\",\"来源\":\"用户文本\",\"备注\":\"“4.1万余人。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (239, 5, 18, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国（化学战）\",\"指标\":\"“化学战总伤亡（下限）”\",\"数值\":\"10\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“用户文本：受害>10万人。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (240, 5, 19, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国（遗弃化武）\",\"指标\":\"“发现遗弃化学炮弹（约）”\",\"数值\":\"200\",\"单位\":\"“万发”\",\"来源\":\"用户文本\",\"备注\":\"“约200万发。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (241, 5, 20, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国（遗弃化武）\",\"指标\":\"“遗弃化武致伤亡”\",\"数值\":\"2000\",\"单位\":\"人\",\"来源\":\"用户文本\",\"备注\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (242, 5, 21, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"1931\",\"结束年\":\"1945\",\"范围\":\"中国\",\"指标\":\"“慰安妇被强征（下限）”\",\"数值\":\"20\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“20万以上。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (243, 5, 22, '{\"数据集\":\"特殊伤亡与暴行\",\"起始年\":\"\",\"结束年\":\"\",\"范围\":\"中国\",\"指标\":\"“被强奸妇女估计（至少）”\",\"数值\":\"100\",\"单位\":\"“万人”\",\"来源\":\"用户文本（引用吴天伟估计）\",\"备注\":\"“至少100万人遭强奸。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (244, 6, 2, '{\"数据集\":\"二战概览\",\"起始年\":\"1939\",\"结束年\":\"1945\",\"范围\":\"世界\",\"指标\":\"“战争相关死亡（约）”\",\"数值\":\"7000\",\"单位\":\"“万人”\",\"来源\":\"用户文本（概览）\",\"备注\":\"“约7000万。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (245, 6, 3, '{\"数据集\":\"二战概览\",\"起始年\":\"1939\",\"结束年\":\"1945\",\"范围\":\"世界\",\"指标\":\"“军人死亡（约）”\",\"数值\":\"1800\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"不含战俘死亡（按用户文本说明）。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (246, 6, 4, '{\"数据集\":\"二战概览\",\"起始年\":\"1939\",\"结束年\":\"1945\",\"范围\":\"世界\",\"指标\":\"“平民+战俘被屠杀（约）”\",\"数值\":\"1800\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“用户文本称80%+由纳粹德国造成。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (247, 6, 5, '{\"数据集\":\"二战概览\",\"起始年\":\"1939\",\"结束年\":\"1945\",\"范围\":\"世界\",\"指标\":\"“战争相关死亡（区间下限）”\",\"数值\":\"1500\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“区间15–30百万（此处按‘万人’单位写为1500–3000）。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (248, 6, 6, '{\"数据集\":\"二战概览\",\"起始年\":\"1939\",\"结束年\":\"1945\",\"范围\":\"世界\",\"指标\":\"“战争相关死亡（区间上限）”\",\"数值\":\"3000\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (249, 6, 7, '{\"数据集\":\"二战概览\",\"起始年\":\"1941\",\"结束年\":\"1945\",\"范围\":\"苏联\",\"指标\":\"“总死亡（约）”\",\"数值\":\"2660\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“约2660万（26.6 million）。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (250, 6, 8, '{\"数据集\":\"二战概览\",\"起始年\":\"1937\",\"结束年\":\"1945\",\"范围\":\"中国\",\"指标\":\"“死亡（约）”\",\"数值\":\"1800\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“死亡约1800万；死伤约3500万。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (251, 6, 9, '{\"数据集\":\"苏军损失统计\",\"起始年\":\"1941\",\"结束年\":\"1945\",\"范围\":\"苏联（苏军）\",\"指标\":\"“总损失（死亡+受伤+被俘+失踪）”\",\"数值\":\"2959.3\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“2959.3万（29.593 million）。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (252, 6, 10, '{\"数据集\":\"苏军损失统计\",\"起始年\":\"1941\",\"结束年\":\"1945\",\"范围\":\"苏联（苏军）\",\"指标\":\"“死亡”\",\"数值\":\"681.7\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“681.7万（6.817 million）。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (253, 6, 11, '{\"数据集\":\"苏军损失统计\",\"起始年\":\"1941\",\"结束年\":\"1945\",\"范围\":\"苏联（苏军）\",\"指标\":\"“战俘或失踪”\",\"数值\":\"445.6\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“445.6万（4.456 million）。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (254, 6, 12, '{\"数据集\":\"苏军损失统计\",\"起始年\":\"1941\",\"结束年\":\"1945\",\"范围\":\"苏联（苏军）\",\"指标\":\"“受伤+患病（累计人次）”\",\"数值\":\"1832.0\",\"单位\":\"“万人次”\",\"来源\":\"用户文本\",\"备注\":\"“1832万人次（18.32 million person-times）。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (255, 7, 2, '{\"数据集\":\"难民与流亡\",\"起始年\":\"1937\",\"结束年\":\"1945\",\"范围\":\"中国（全国）\",\"指标\":\"“战争难民/流亡人口（流量）”\",\"数值\":\"95448771\",\"单位\":\"人\",\"来源\":\"用户文本（引战后全国表）\",\"备注\":\"接近一亿；可能为累计流量口径。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (256, 7, 3, '{\"数据集\":\"难民与流亡\",\"起始年\":\"1942\",\"结束年\":\"1942\",\"范围\":\"河南（旱灾/饥荒）\",\"指标\":\"“死亡（约）”\",\"数值\":\"300\",\"单位\":\"“万人”\",\"来源\":\"用户文本\",\"备注\":\"“约300万死亡（与洪涝/旱灾/饥荒背景相关）。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (257, 8, 2, '{\"数据集\":\"2015战场数据要点\",\"年份\":\"2015\",\"范围\":\"中国战场\",\"指标\":\"“日本在华兵力（投降前夕）”\",\"数值\":\"186\",\"单位\":\"“万名士兵”\",\"来源\":\"“2015年党史研究室通报（引自用户文本）”\",\"备注\":\"即186万。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (258, 8, 3, '{\"数据集\":\"2015战场数据要点\",\"年份\":\"2015\",\"范围\":\"日本海外总计\",\"指标\":\"“海外总兵力”\",\"数值\":\"358\",\"单位\":\"“万名士兵”\",\"来源\":\"同上\",\"备注\":\"即358万。\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (259, 8, 4, '{\"数据集\":\"2015战场数据要点\",\"年份\":\"2015\",\"范围\":\"中国战场\",\"指标\":\"“中国军民造成日军伤亡俘（毙伤俘合计）”\",\"数值\":\"150\",\"单位\":\"“万人”\",\"来源\":\"同上\",\"备注\":\"“毙伤俘日军150余万。”\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (260, 8, 5, '{\"数据集\":\"2015战场数据要点\",\"年份\":\"2015\",\"范围\":\"中国（暴行）\",\"指标\":\"“平民死亡≥800的大屠杀事件数”\",\"数值\":\"173\",\"单位\":\"起\",\"来源\":\"同上\",\"备注\":\"\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (261, 9, 2, '{\"id\":\"1\",\"name\":\"长城抗战\",\"start\":\"1933-01\",\"end\":\"1933-05\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (262, 9, 3, '{\"id\":\"2\",\"name\":\"热河抗战\",\"start\":\"1933-02\",\"end\":\"1933-02\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (263, 9, 4, '{\"id\":\"3\",\"name\":\"淞沪抗战（1932）\",\"start\":\"1932-01\",\"end\":\"1932-03\",\"note\":\"注意：与1937年淞沪会战不同\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (264, 9, 5, '{\"id\":\"4\",\"name\":\"绥远抗战\",\"start\":\"1936-11\",\"end\":\"1936-12\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (265, 9, 6, '{\"id\":\"5\",\"name\":\"卢沟桥事变\",\"start\":\"1937-07\",\"end\":\"1937-07\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (266, 9, 7, '{\"id\":\"6\",\"name\":\"平津作战\",\"start\":\"1937-07\",\"end\":\"1937-07\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (267, 9, 8, '{\"id\":\"7\",\"name\":\"淞沪会战\",\"start\":\"1937-08\",\"end\":\"1937-11\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (268, 9, 9, '{\"id\":\"8\",\"name\":\"南口战役\",\"start\":\"1937-09\",\"end\":\"1937-09\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (269, 9, 10, '{\"id\":\"9\",\"name\":\"平型关战役\",\"start\":\"1937-09\",\"end\":\"1937-09\",\"note\":\"注：原文强调“没有所谓平型关大捷”并指国军为主力\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (270, 9, 11, '{\"id\":\"10\",\"name\":\"忻口战役\",\"start\":\"1937-10\",\"end\":\"1937-10\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (271, 9, 12, '{\"id\":\"11\",\"name\":\"太原会战\",\"start\":\"1937-10\",\"end\":\"1937-11\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (272, 9, 13, '{\"id\":\"12\",\"name\":\"娘子关战役\",\"start\":\"1937-10\",\"end\":\"1937-11\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (273, 9, 14, '{\"id\":\"13\",\"name\":\"太原保卫战\",\"start\":\"1937-11\",\"end\":\"1937-11\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (274, 9, 15, '{\"id\":\"14\",\"name\":\"南京战役（南京保卫战）\",\"start\":\"1937-12\",\"end\":\"1937-12\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (275, 9, 16, '{\"id\":\"15\",\"name\":\"徐州会战\",\"start\":\"1938-02\",\"end\":\"1938-05\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (276, 9, 17, '{\"id\":\"16\",\"name\":\"台儿庄战役\",\"start\":\"1938-03\",\"end\":\"1938-04\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (277, 9, 18, '{\"id\":\"17\",\"name\":\"武汉会战\",\"start\":\"1938-08\",\"end\":\"1938-10\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (278, 9, 19, '{\"id\":\"18\",\"name\":\"广州战役\",\"start\":\"1938-10\",\"end\":\"1938-10\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (279, 9, 20, '{\"id\":\"19\",\"name\":\"南昌会战\",\"start\":\"1939-03\",\"end\":\"1939-04\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (280, 9, 21, '{\"id\":\"20\",\"name\":\"随枣会战\",\"start\":\"1939-05\",\"end\":\"1939-05\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (281, 9, 22, '{\"id\":\"21\",\"name\":\"第一次长沙会战\",\"start\":\"1939-09\",\"end\":\"1939-10\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (282, 9, 23, '{\"id\":\"22\",\"name\":\"桂南会战\",\"start\":\"1939-11\",\"end\":\"1940-02\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (283, 9, 24, '{\"id\":\"23\",\"name\":\"昆仑关战役\",\"start\":\"1939-12\",\"end\":\"1940-01\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (284, 9, 25, '{\"id\":\"24\",\"name\":\"枣宜会战\",\"start\":\"1940-05\",\"end\":\"1940-06\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (285, 9, 26, '{\"id\":\"25\",\"name\":\"上高会战\",\"start\":\"1941-03\",\"end\":\"1941-04\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (286, 9, 27, '{\"id\":\"26\",\"name\":\"晋南战役\",\"start\":\"1941-05\",\"end\":\"1941-06\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (287, 9, 28, '{\"id\":\"27\",\"name\":\"第二次长沙会战\",\"start\":\"1941-09\",\"end\":\"1941-10\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (288, 9, 29, '{\"id\":\"28\",\"name\":\"第三次长沙会战\",\"start\":\"1941-12\",\"end\":\"1942-01\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (289, 9, 30, '{\"id\":\"29\",\"name\":\"香港保卫战\",\"start\":\"1941-12\",\"end\":\"1941-12\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (290, 9, 31, '{\"id\":\"30\",\"name\":\"滇湎路战役\",\"start\":\"1942-03\",\"end\":\"1942-09\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (291, 9, 32, '{\"id\":\"31\",\"name\":\"鄂西会战\",\"start\":\"1943-05\",\"end\":\"1943-06\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (292, 9, 33, '{\"id\":\"32\",\"name\":\"常德会战\",\"start\":\"1943-11\",\"end\":\"1944-01\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (293, 9, 34, '{\"id\":\"33\",\"name\":\"豫湘桂会战\",\"start\":\"1944-04\",\"end\":\"1944-12\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (294, 9, 35, '{\"id\":\"34\",\"name\":\"豫中会战\",\"start\":\"1944-04\",\"end\":\"1944-04\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (295, 9, 36, '{\"id\":\"35\",\"name\":\"长沙会战（1944）\",\"start\":\"1944-05\",\"end\":\"1944-05\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (296, 9, 37, '{\"id\":\"36\",\"name\":\"衡阳保卫战\",\"start\":\"1944-06\",\"end\":\"1944-08\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (297, 9, 38, '{\"id\":\"37\",\"name\":\"桂柳会战\",\"start\":\"1944-08\",\"end\":\"1944-08\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (298, 9, 39, '{\"id\":\"38\",\"name\":\"缅北滇西战役\",\"start\":\"1943-10\",\"end\":\"1945-03\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (299, 9, 40, '{\"id\":\"39\",\"name\":\"密支那战役\",\"start\":\"1944-05\",\"end\":\"1944-08\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (300, 9, 41, '{\"id\":\"40\",\"name\":\"强渡怒江战役\",\"start\":\"1944-06\",\"end\":\"1944-07\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (301, 9, 42, '{\"id\":\"41\",\"name\":\"雪峰山会战\",\"start\":\"1945-04\",\"end\":\"1945-06\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (302, 9, 43, '{\"id\":\"42\",\"name\":\"桂柳反攻战役\",\"start\":\"1945-04\",\"end\":\"1945-08\",\"note\":\"\",\"start_precision\":\"month\",\"end_precision\":\"month\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (303, 10, 2, '{\"battle\":\"淞沪会战\",\"side\":\"国军战报\",\"metric\":\"日军伤亡\",\"value\":\"160000\",\"unit\":\"人\",\"source\":\"国军1937年战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (304, 10, 3, '{\"battle\":\"淞沪会战\",\"side\":\"孙元良估计\",\"metric\":\"日军伤亡\",\"value\":\"145000\",\"unit\":\"人\",\"source\":\"孙元良2005年估计14-15万（取中值）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (305, 10, 4, '{\"battle\":\"淞沪会战\",\"side\":\"日军战报\",\"metric\":\"日军死亡\",\"value\":\"160000\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战史》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (306, 10, 5, '{\"battle\":\"淞沪会战\",\"side\":\"日军战报\",\"metric\":\"日军负伤\",\"value\":\"31157\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战史》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (307, 10, 6, '{\"battle\":\"太原会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"70000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (308, 10, 7, '{\"battle\":\"太原会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"66000\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战史》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (309, 10, 8, '{\"battle\":\"南京保卫战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"113000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (310, 10, 9, '{\"battle\":\"南京保卫战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"106000\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战史》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (311, 10, 10, '{\"battle\":\"徐州会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"150000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (312, 10, 11, '{\"battle\":\"徐州会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"132000\",\"unit\":\"人\",\"source\":\"原文：1937年承认伤亡13.2万余人（转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (313, 10, 12, '{\"battle\":\"武汉会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"250000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (314, 10, 13, '{\"battle\":\"武汉会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"230000\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (315, 10, 14, '{\"battle\":\"武汉会战\",\"side\":\"日军战报\",\"metric\":\"因病减员\",\"value\":\"67000\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (316, 10, 15, '{\"battle\":\"随枣会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"140000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (317, 10, 16, '{\"battle\":\"随枣会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"130000\",\"unit\":\"人\",\"source\":\"日本《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (318, 10, 17, '{\"battle\":\"枣宜会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"73000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (319, 10, 18, '{\"battle\":\"枣宜会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"69000\",\"unit\":\"人\",\"source\":\"日本《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (320, 10, 19, '{\"battle\":\"南昌会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"64000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (321, 10, 20, '{\"battle\":\"南昌会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"59000\",\"unit\":\"人\",\"source\":\"《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (322, 10, 21, '{\"battle\":\"上高会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"44000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (323, 10, 22, '{\"battle\":\"上高会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"39000\",\"unit\":\"人\",\"source\":\"《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (324, 10, 23, '{\"battle\":\"上高会战\",\"side\":\"日军战报\",\"metric\":\"病减员\",\"value\":\"6000\",\"unit\":\"人\",\"source\":\"《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (325, 10, 24, '{\"battle\":\"晋南（中条山）会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"39900\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (326, 10, 25, '{\"battle\":\"晋南（中条山）会战\",\"side\":\"日军战报\",\"metric\":\"日军战死\",\"value\":\"33670\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (327, 10, 26, '{\"battle\":\"晋南（中条山）会战\",\"side\":\"日军战报\",\"metric\":\"日军负伤\",\"value\":\"2292\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (328, 10, 27, '{\"battle\":\"第二次长沙会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"60000\",\"unit\":\"人\",\"source\":\"国军战报：6万余人（原文转述，未取7.4万）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (329, 10, 28, '{\"battle\":\"第二次长沙会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"57000\",\"unit\":\"人\",\"source\":\"《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (330, 10, 29, '{\"battle\":\"第三次长沙会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"150000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (331, 10, 30, '{\"battle\":\"第三次长沙会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"146000\",\"unit\":\"人\",\"source\":\"《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (332, 10, 31, '{\"battle\":\"浙赣会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"80000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (333, 10, 32, '{\"battle\":\"浙赣会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"71714\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (334, 10, 33, '{\"battle\":\"鄂西会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"40000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (335, 10, 34, '{\"battle\":\"鄂西会战\",\"side\":\"日军战报\",\"metric\":\"日军损失\",\"value\":\"34000\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (336, 10, 35, '{\"battle\":\"常德会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"60000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (337, 10, 36, '{\"battle\":\"常德会战\",\"side\":\"日军战报\",\"metric\":\"日军损失\",\"value\":\"52800\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (338, 10, 37, '{\"battle\":\"豫中会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"14000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (339, 10, 38, '{\"battle\":\"豫中会战\",\"side\":\"日军战报\",\"metric\":\"日军损失\",\"value\":\"13350\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (340, 10, 39, '{\"battle\":\"长衡会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"160000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (341, 10, 40, '{\"battle\":\"长衡会战\",\"side\":\"日军战报\",\"metric\":\"日军损失\",\"value\":\"152000\",\"unit\":\"人\",\"source\":\"《中国事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (342, 10, 41, '{\"battle\":\"桂柳会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"63000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (343, 10, 42, '{\"battle\":\"桂柳会战\",\"side\":\"日军战报\",\"metric\":\"日军损失\",\"value\":\"56000\",\"unit\":\"人\",\"source\":\"日本《战史丛书—大本营陆军部》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (344, 10, 43, '{\"battle\":\"缅北会战\",\"side\":\"国军战报\",\"metric\":\"日军毙伤\",\"value\":\"90000\",\"unit\":\"人\",\"source\":\"国军战报（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (345, 10, 44, '{\"battle\":\"缅北会战\",\"side\":\"日军战报\",\"metric\":\"日军伤亡\",\"value\":\"84000\",\"unit\":\"人\",\"source\":\"《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (346, 11, 2, '{\"id\":\"1\",\"name\":\"平型关战斗\",\"year\":\"1937\",\"eighth_route_report\":\"歼灭日军1000余人\",\"japanese_report\":\"亡167、伤94\",\"japanese_detail\":\"日军亡167人，伤94人\",\"source\":\"儿岛襄《日中战争》1984（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (347, 11, 3, '{\"id\":\"2\",\"name\":\"广阳伏击战\",\"year\":\"1937?\",\"eighth_route_report\":\"歼日军千余人\",\"japanese_report\":\"伤亡63\",\"japanese_detail\":\"日军伤亡63人\",\"source\":\"臼井胜美《中日战争》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (348, 11, 4, '{\"id\":\"3\",\"name\":\"晋察冀区反八路围攻\",\"year\":\"1937?\",\"eighth_route_report\":\"歼灭日伪军2000余人\",\"japanese_report\":\"日军亡17、伤52；皇协军伤亡69\",\"japanese_detail\":\"日军亡17伤52；皇协军伤亡69\",\"source\":\"臼井胜美《中日战争》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (349, 11, 5, '{\"id\":\"4\",\"name\":\"三次破袭平汉路\",\"year\":\"1938?\",\"eighth_route_report\":\"歼灭日伪军1200余人\",\"japanese_report\":\"日军亡2、伤11\",\"japanese_detail\":\"无皇协军伤亡报告\",\"source\":\"《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (350, 11, 6, '{\"id\":\"5\",\"name\":\"冀中1938年春季反“扫荡”\",\"year\":\"1938\",\"eighth_route_report\":\"歼灭日伪军1000余人\",\"japanese_report\":\"日军亡6、伤26；皇协军伤亡71\",\"japanese_detail\":\"日军亡6伤26；皇协军伤亡71\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (351, 11, 7, '{\"id\":\"6\",\"name\":\"120师收复晋西北七城战役\",\"year\":\"1938\",\"eighth_route_report\":\"歼灭日伪军1500余人\",\"japanese_report\":\"日军亡22、伤51；皇协军伤亡101\",\"japanese_detail\":\"日军亡22伤51；皇协军伤亡101\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (352, 11, 8, '{\"id\":\"7\",\"name\":\"易（县）涞（源）战斗\",\"year\":\"1938\",\"eighth_route_report\":\"歼日伪军1400余人\",\"japanese_report\":\"日军亡9、伤22；皇协军伤亡40\",\"japanese_detail\":\"日军亡9伤22；皇协军伤亡40\",\"source\":\"《支那事变陆军作战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (353, 11, 9, '{\"id\":\"8\",\"name\":\"129师晋东南反日军九路围攻\",\"year\":\"1938\",\"eighth_route_report\":\"歼日伪军4000余人\",\"japanese_report\":\"日军亡11、伤10；皇协军伤亡79\",\"japanese_detail\":\"日军亡11伤10；皇协军伤亡79\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (354, 11, 10, '{\"id\":\"9\",\"name\":\"晋察冀区1938年秋反围攻\",\"year\":\"1938\",\"eighth_route_report\":\"毙伤日伪军5000余人\",\"japanese_report\":\"日军亡39、伤132；皇协军伤亡107\",\"japanese_detail\":\"日军亡39伤132；皇协军伤亡107\",\"source\":\"臼井胜美《中日战争》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (355, 11, 11, '{\"id\":\"10\",\"name\":\"冀中区五次反围攻\",\"year\":\"1938\",\"eighth_route_report\":\"歼日伪军5500余人\",\"japanese_report\":\"日军亡21、伤65；皇协军伤亡99\",\"japanese_detail\":\"日军亡21伤65；皇协军伤亡99\",\"source\":\"臼井胜美《中日战争》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (356, 11, 12, '{\"id\":\"11\",\"name\":\"冀南1938年反“扫荡”\",\"year\":\"1938\",\"eighth_route_report\":\"毙俘日伪军600余人\",\"japanese_report\":\"日军亡3、伤11；皇协军伤亡16\",\"japanese_detail\":\"日军亡3伤11；皇协军伤亡16\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (357, 11, 13, '{\"id\":\"12\",\"name\":\"1939年冀南春季反十一“扫荡”\",\"year\":\"1939\",\"eighth_route_report\":\"歼日伪军3000余人\",\"japanese_report\":\"日军亡37、伤70；皇协军伤亡81\",\"japanese_detail\":\"日军亡37伤70；皇协军伤亡81\",\"source\":\"臼井胜美《中日战争》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (358, 11, 14, '{\"id\":\"13\",\"name\":\"115师陆房突围\",\"year\":\"1939\",\"eighth_route_report\":\"毙伤日伪军1300余人\",\"japanese_report\":\"日军亡10、伤122；皇协军伤亡67\",\"japanese_detail\":\"日军亡10伤122；皇协军伤亡67\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (359, 11, 15, '{\"id\":\"14\",\"name\":\"五台山区1939年5月反围攻\",\"year\":\"1939\",\"eighth_route_report\":\"歼灭日军宫崎部队800余人\",\"japanese_report\":\"日军亡4、伤27\",\"japanese_detail\":\"日军亡4伤27\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (360, 11, 16, '{\"id\":\"15\",\"name\":\"太行区1939年夏季反“扫荡”\",\"year\":\"1939\",\"eighth_route_report\":\"歼日伪军2000余人\",\"japanese_report\":\"日军亡7、伤37；皇协军伤亡70\",\"japanese_detail\":\"日军亡7伤37；皇协军伤亡70\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (361, 11, 17, '{\"id\":\"16\",\"name\":\"冀中1939年冬季反“扫荡”\",\"year\":\"1939\",\"eighth_route_report\":\"歼日伪军2500余人\",\"japanese_report\":\"日军亡27、伤89；皇协军伤亡71\",\"japanese_detail\":\"日军亡27伤89；皇协军伤亡71\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (362, 11, 18, '{\"id\":\"17\",\"name\":\"北岳区1939年冬季反“扫荡”\",\"year\":\"1939\",\"eighth_route_report\":\"毙伤日伪军3600余人\",\"japanese_report\":\"日军亡9、伤34；皇协军伤亡95\",\"japanese_detail\":\"日军亡9伤34；皇协军伤亡95\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (363, 11, 19, '{\"id\":\"18\",\"name\":\"平西区1940年春季反“扫荡”\",\"year\":\"1940\",\"eighth_route_report\":\"歼灭日伪军800余人；击落飞机1架\",\"japanese_report\":\"日军亡8、伤40；皇协军伤亡22\",\"japanese_detail\":\"日军亡8伤40；皇协军伤亡22\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (364, 11, 20, '{\"id\":\"19\",\"name\":\"冀中1940年春季反全面“扫荡”作战\",\"year\":\"1940\",\"eighth_route_report\":\"毙伤日伪军3000余人\",\"japanese_report\":\"日军亡11、伤91；皇协军伤亡62\",\"japanese_detail\":\"日军亡11伤91；皇协军伤亡62\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (365, 11, 21, '{\"id\":\"20\",\"name\":\"抱犊崮山区反“扫荡”（鲁南区1940年反“扫荡”）\",\"year\":\"1940\",\"eighth_route_report\":\"毙伤日伪军2200余人\",\"japanese_report\":\"日军亡9、伤60；皇协军伤亡58\",\"japanese_detail\":\"日军亡9伤60；皇协军伤亡58\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (366, 11, 22, '{\"id\":\"21\",\"name\":\"129师白晋铁路破击战\",\"year\":\"1940\",\"eighth_route_report\":\"歼日伪军600余人\",\"japanese_report\":\"日军亡2、伤9；皇协军伤亡12\",\"japanese_detail\":\"日军亡2伤9；皇协军伤亡12\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (367, 11, 23, '{\"id\":\"22\",\"name\":\"晋西北1940年夏季反“扫荡”\",\"year\":\"1940\",\"eighth_route_report\":\"毙伤日伪军4490余人；俘53人（含日军11人）\",\"japanese_report\":\"日军亡37、伤107、失踪3；皇协军伤亡失踪201\",\"japanese_detail\":\"日军亡37伤107失踪3；皇协军伤亡失踪201\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (368, 11, 24, '{\"id\":\"23\",\"name\":\"冀中1940年夏季“青纱帐”战役\",\"year\":\"1940\",\"eighth_route_report\":\"毙伤日伪军2100余人；俘伪军500余人\",\"japanese_report\":\"日军亡19、伤22；皇协军伤亡39\",\"japanese_detail\":\"日军亡19伤22；皇协军伤亡39\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (369, 11, 25, '{\"id\":\"24\",\"name\":\"百团大战\",\"year\":\"1940\",\"eighth_route_report\":\"毙伤日军2万余人、伪军5000余人；俘日军280余人、伪军1.8万余人\",\"japanese_report\":\"日军亡302、伤1719；皇协军伤亡失踪1202\",\"japanese_detail\":\"日军亡302伤1719；皇协军伤亡失踪1202\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (370, 11, 26, '{\"id\":\"25\",\"name\":\"太行区1940年秋季反“扫荡”\",\"year\":\"1940\",\"eighth_route_report\":\"歼日伪军2800余人\",\"japanese_report\":\"日军亡29、伤60；皇协军伤亡44\",\"japanese_detail\":\"日军亡29伤60；皇协军伤亡44\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (371, 11, 27, '{\"id\":\"26\",\"name\":\"冀中1940年冬季攻势\",\"year\":\"1940\",\"eighth_route_report\":\"歼日伪军2300余人\",\"japanese_report\":\"日军亡10、伤27；皇协军伤亡59\",\"japanese_detail\":\"日军亡10伤27；皇协军伤亡59\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (372, 11, 28, '{\"id\":\"27\",\"name\":\"太岳1940年冬季反“扫荡”\",\"year\":\"1940\",\"eighth_route_report\":\"歼日伪军260余人\",\"japanese_report\":\"日军伤7；皇协军伤亡15\",\"japanese_detail\":\"日军伤7；皇协军伤亡15\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (373, 11, 29, '{\"id\":\"28\",\"name\":\"晋西北1940年冬季反“扫荡”\",\"year\":\"1940\",\"eighth_route_report\":\"毙伤日伪军2500余人\",\"japanese_report\":\"日军亡8、伤44；皇协军伤亡102\",\"japanese_detail\":\"日军亡8伤44；皇协军伤亡102\",\"source\":\"《华北治安战》（原文转述）\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (374, 12, 2, '{\"name\":\"佟麟阁\",\"birth_year\":\"1892\",\"death_year\":\"1937\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第29军中将副军长\",\"birthplace\":\"河北高阳县\",\"notes\":\"南苑、团河阻敌；二十八日晨腿部中弹头部炸伤殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (375, 12, 3, '{\"name\":\"赵登禹\",\"birth_year\":\"1898\",\"death_year\":\"1937\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第29军132师中将师长\",\"birthplace\":\"山东荷泽县\",\"notes\":\"大红门地区身中数弹殉国；喜峰口大刀队奇袭闻名\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (376, 12, 4, '{\"name\":\"秦霖\",\"birth_year\":\"1900\",\"death_year\":\"1937\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第7军171师511旅少将旅长\",\"birthplace\":\"广西桂林\",\"notes\":\"蕴藻浜南岸阻敌；与敌肉搏殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (377, 12, 5, '{\"name\":\"郝梦麟\",\"birth_year\":\"1898\",\"death_year\":\"1937\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第9军中将军长\",\"birthplace\":\"河北藁城县\",\"notes\":\"忻口车站至南怀化镇一线阻敌；十月十六日凌晨中弹殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (378, 12, 6, '{\"name\":\"饶国华\",\"birth_year\":\"1894\",\"death_year\":\"1937\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第2军145师中将师长\",\"birthplace\":\"四川资阳\",\"notes\":\"浙江长兴阻敌；阵陷自戕殉国；焚广德机场\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (379, 12, 7, '{\"name\":\"刘湘\",\"birth_year\":\"1890\",\"death_year\":\"1938\",\"posthumous_rank\":\"一级上将\",\"position\":\"第七战区司令长官兼第23集团军二级上将总司令\",\"birthplace\":\"四川大邑\",\"notes\":\"淞沪后奉令守卫南京；1938-01-23因病于汉口殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (380, 12, 8, '{\"name\":\"王铭章\",\"birth_year\":\"1893\",\"death_year\":\"1938\",\"posthumous_rank\":\"陆军上将\",\"position\":\"41军122师中将师长\",\"birthplace\":\"四川新都\",\"notes\":\"滕县巷战中腹部中弹自戕殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (381, 12, 9, '{\"name\":\"冯安邦\",\"birth_year\":\"1885\",\"death_year\":\"1938\",\"posthumous_rank\":\"陆军上将\",\"position\":\"42军中将军长\",\"birthplace\":\"山东无棣\",\"notes\":\"转战鄂北襄樊、襄阳；1938-11-03遇敌机轰炸中弹殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (382, 12, 10, '{\"name\":\"陈安宝\",\"birth_year\":\"1891\",\"death_year\":\"1939\",\"posthumous_rank\":\"陆军上将\",\"position\":\"29军中将军长\",\"birthplace\":\"浙江黄岩\",\"notes\":\"南昌阻敌；白刃格斗中机枪中弹殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (383, 12, 11, '{\"name\":\"张自忠\",\"birth_year\":\"1891\",\"death_year\":\"1940\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第33集团军中将加上将衔总司令\",\"birthplace\":\"山东临清\",\"notes\":\"湖北宜城阻敌；南瓜店肉搏殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (384, 12, 12, '{\"name\":\"唐淮源\",\"birth_year\":\"1884\",\"death_year\":\"1941\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第3军中将军长\",\"birthplace\":\"云南江川\",\"notes\":\"中条山背水苦战；弹尽援绝自戕殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (385, 12, 13, '{\"name\":\"李家钰\",\"birth_year\":\"1890\",\"death_year\":\"1944\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第36集团军中将总司令兼47军军长\",\"birthplace\":\"四川蒲江\",\"notes\":\"豫中会战后卫总指挥；陕县境内中伏头腹中弹殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (386, 12, 14, '{\"name\":\"张谞行\",\"birth_year\":\"1905\",\"death_year\":\"1939\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第一战区司令部中将副参谋长\",\"birthplace\":\"浙江杭州\",\"notes\":\"1939-03-07执行公务于西安遇敌轰炸窒息殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (387, 12, 15, '{\"name\":\"唐聚五\",\"birth_year\":\"1892\",\"death_year\":\"1939\",\"posthumous_rank\":\"陆军上将\",\"position\":\"东北中将游击总司令\",\"birthplace\":\"黑龙江双城\",\"notes\":\"迁安县平台山击敌；负重伤殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (388, 12, 16, '{\"name\":\"蒋百里\",\"birth_year\":\"1882\",\"death_year\":\"1938\",\"posthumous_rank\":\"陆军上将\",\"position\":\"代理陆军大学中将校长\",\"birthplace\":\"浙江海宁\",\"notes\":\"著名军事理论家；1938-11于广西宜山因病殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (389, 12, 17, '{\"name\":\"廖磊\",\"birth_year\":\"1890\",\"death_year\":\"1939\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第21集团军总司令兼安徽省主席\",\"birthplace\":\"广西陆川\",\"notes\":\"参加淞沪、徐州、武汉等；1939于安徽脑溢血殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (390, 12, 18, '{\"name\":\"陈季良\",\"birth_year\":\"1883\",\"death_year\":\"1945\",\"posthumous_rank\":\"海军上将\",\"position\":\"海军总司令部中将参谋长\",\"birthplace\":\"福建福州\",\"notes\":\"负伤指挥江阴海空战；1945旧伤复发殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (391, 12, 19, '{\"name\":\"方振武\",\"birth_year\":\"1887\",\"death_year\":\"1945\",\"posthumous_rank\":\"陆军上将\",\"position\":\"军事委员会中将参议\",\"birthplace\":\"浙江黄岩\",\"notes\":\"赴豫南鄂北战役前线督战；病重于西安殉国\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (392, 12, 20, '{\"name\":\"陈训泳\",\"birth_year\":\"1886\",\"death_year\":\"1944\",\"posthumous_rank\":\"海军上将\",\"position\":\"海军部中将常务次长\",\"birthplace\":\"福建闽县\",\"notes\":\"海军总司令部参谋长等；1944卒于任上\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (393, 12, 21, '{\"name\":\"宋哲元\",\"birth_year\":\"1885\",\"death_year\":\"1940\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第29军军长\",\"birthplace\":\"山东乐陵\",\"notes\":\"曾获喜峰口大捷；1940辞职回四川疗养病逝\"}', 1766406452, 1766406452);
INSERT INTO `war_record` VALUES (394, 12, 22, '{\"name\":\"鄒洪\",\"birth_year\":\"1897\",\"death_year\":\"1945\",\"posthumous_rank\":\"陆军上将\",\"position\":\"第35集团军中将副总司令\",\"birthplace\":\"台湾芎林（原籍广东五华）\",\"notes\":\"驰援长沙等；1945-04-16伤病殉国\"}', 1766406452, 1766406452);

SET FOREIGN_KEY_CHECKS = 1;
