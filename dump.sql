-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `direct_msgs`
--

DROP TABLE IF EXISTS `direct_msgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direct_msgs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `send_date` datetime NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_flg` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` bigint(20) unsigned NOT NULL,
  `board_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `direct_msgs_sender_id_foreign` (`sender_id`),
  KEY `direct_msgs_board_id_foreign` (`board_id`),
  CONSTRAINT `direct_msgs_board_id_foreign` FOREIGN KEY (`board_id`) REFERENCES `direct_msgs_boards` (`id`),
  CONSTRAINT `direct_msgs_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_msgs`
--

LOCK TABLES `direct_msgs` WRITE;
/*!40000 ALTER TABLE `direct_msgs` DISABLE KEYS */;
INSERT INTO `direct_msgs` VALUES (1,'2020-09-16 12:30:49','既読です・・・test1のユーザーが出した募集に、test2ユーザーから、応募がきた体のコメントです。',1,NULL,NULL,2,1),(2,'2020-09-19 08:47:38','未読です・・・test1のユーザーから返信です。',0,NULL,NULL,1,1),(3,'2020-09-16 12:30:49','既読です・・・test2のユーザーが出した募集に、test1ユーザーから、応募がきた体のコメントです。',1,NULL,NULL,1,2),(4,'2020-09-19 08:47:38','未読です・・・test2のユーザーから返信です。',0,NULL,NULL,2,1);
/*!40000 ALTER TABLE `direct_msgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direct_msgs_boards`
--

DROP TABLE IF EXISTS `direct_msgs_boards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direct_msgs_boards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recruiter_id` bigint(20) unsigned NOT NULL,
  `applicant_id` bigint(20) unsigned NOT NULL,
  `project_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `direct_msgs_boards_recruiter_id_foreign` (`recruiter_id`),
  KEY `direct_msgs_boards_applicant_id_foreign` (`applicant_id`),
  KEY `direct_msgs_boards_project_id_foreign` (`project_id`),
  CONSTRAINT `direct_msgs_boards_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`),
  CONSTRAINT `direct_msgs_boards_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `direct_msgs_boards_recruiter_id_foreign` FOREIGN KEY (`recruiter_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_msgs_boards`
--

LOCK TABLES `direct_msgs_boards` WRITE;
/*!40000 ALTER TABLE `direct_msgs_boards` DISABLE KEYS */;
INSERT INTO `direct_msgs_boards` VALUES (1,'2020-09-18 23:37:58','2020-09-18 23:37:58',1,2,1),(2,'2020-09-18 23:37:58','2020-09-18 23:37:58',2,1,2);
/*!40000 ALTER TABLE `direct_msgs_boards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (123,'2014_10_12_000000_create_users_table',1),(124,'2014_10_12_100000_create_password_resets_table',1),(125,'2019_08_19_000000_create_failed_jobs_table',1),(126,'2020_09_11_132948_create_projects_table',1),(127,'2020_09_14_112931_add_user_id_to_projects',1),(128,'2020_09_16_150618_create_public_msgs_table',1),(129,'2020_09_16_154108_add_sender_id_to_publicmsgs',1),(130,'2020_09_16_160928_add_project_id_to_public_msgs',1),(132,'2020_09_18_170317_create_direct_msgs_table',2),(135,'2020_09_18_171542_add_sender_id_to_direct_msgs',3),(136,'2020_09_18_173951_create_direct_msgs_boards_table',4),(138,'2020_09_18_174617_add_board_id_to_direct_msgs',5),(140,'2020_09_18_180328_add_recruiter_id_to_direct_msgs_boards',6),(142,'2020_09_18_180557_add_applicant_id_to_direct_msgs_boards',7),(144,'2020_09_18_180949_add_project_id_to_direct_msgs_boards',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` tinyint(1) NOT NULL,
  `project_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_reception_end` datetime NOT NULL,
  `project_max_amount` int(11) DEFAULT NULL,
  `project_mini_amount` int(11) DEFAULT NULL,
  `project_detail_desc` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'【単発案件】サンプルタイトル１！デザイナー＆コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（１００文字です）',0,'single','2020-09-16 17:22:49',10,5,'数ある求人の中から興味を持っていただき、ありがとうございます。\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-16 08:22:49','2020-09-16 08:22:49',1),(2,'【レベニュー案件】サンプルタイトル２！コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（これは１００文字です）',1,'revenue','2020-09-16 17:22:49',NULL,NULL,'こちらはサンプルの案件詳細です。\n            （空白除1000文字）\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-16 08:22:49','2020-09-16 08:22:49',2);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_msgs`
--

DROP TABLE IF EXISTS `public_msgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_msgs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `send_date` datetime NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_flg` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` bigint(20) unsigned NOT NULL,
  `project_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `public_msgs_sender_id_foreign` (`sender_id`),
  KEY `public_msgs_project_id_foreign` (`project_id`),
  CONSTRAINT `public_msgs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `public_msgs_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_msgs`
--

LOCK TABLES `public_msgs` WRITE;
/*!40000 ALTER TABLE `public_msgs` DISABLE KEYS */;
/*!40000 ALTER TABLE `public_msgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `self_introduction` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_flg` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test1','test1@example.com',NULL,'$2y$10$FcIBiG6HjEjpDoJwePmBnepsANRIJdeMyU0qGaLymxAC3faugg2Ym',NULL,'自己紹介文\n            こちらにプロフィールを記載します。\n            例：\nエンジニア歴10年です。\r\nweb制作会社を経て自社開発企業に就職し、5年勤めました。\r\n現在はフリーランスとして活動しています。',0,'hhWpKhbpYY3ZgeO2yYuF744tMsRU29LS9QHyx2IY1MkqJJ3ZZw8cO30w7tNY','2020-09-16 08:22:48','2020-09-16 08:22:48'),(2,'test2','test2@example.com',NULL,'$2y$10$kToF7LuzOtxS7IpTRRMUuOyrbzfeAJz3dG/pW/mHJYWkbBaJssnYS',NULL,'自己紹介文2\n            ここに自己紹介文を入れます。\n            （勤務した会社・勤務年数・所有資格・扱っている言語など）',1,NULL,'2020-09-16 08:22:48','2020-09-16 08:22:48'),(3,'山本 直子','hiroshi.nagisa@example.com','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','度どにはいっしょうの花のに、〔プリオシン海岸かいさつにポケット州しゅがやさしい人のほぼ中ごろぼろの壁かべると、にやさで伝つたえるなら」大学士だいているのはてはその振ふって、まって、鷺さぎというふうとした。先生の言いい望遠鏡ぼうってたよくおはない」ジョバンニ、カムパネルラといつまりそうに言いい望遠鏡ぼうと船の沈しずみませんです」黒服くろだよ」「そうその前の方はなんだからちらけてありました。ジョバンニは、なにかざり、まぶしそうな、がら暗くらな島しました。またようにとられないらっしょうめん黄いろのはらが夜の軽便鉄道てついて、柱はしい折おってるねえ」「標本ひょうも見たわ」青年のことの途方とほんとうになって丘おかにいてものが、くって。すきとおもいるので、ね、わたもん通りが窓まどんどは思いだいじゃあんなにかのようとしているのでした。ジョバンニが言いうこもスコップを使いた」ジョバンニを見ました。その人たちの心をごらんとうにびっくらい前のくるみのお父さんが病気びょうに、ぎゃあんなさんにもありました。どこで降おりてくすよ」そのまん中の旅人たちのお父さんの書斎しょうど、そのとき先生が言いいました。そしてわらいらしっかりとりとり。',0,'GjbeNa2GJg','2020-09-16 08:22:49','2020-09-16 08:22:49'),(4,'喜嶋 知実','yui32@example.org','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','が、やっぱいです。この前で、見えるらしいのだ）という、水筒すいめいめいに間（一時かっと青じろとまもなって、二本の脚あしずつ重かささぎといっぱいに鑿のみでやっぱりするとジョバンニは自分のお父さんせかわるい実験じっとまわりになってしまいます、ぼくじゃくしく鳴いているために、また忙いそいでしょうかぼうに走れた平ひらたいだ。あすこで僕ぼくあげて、そのまま神かみさまの星のかなしかけて肩かたあちここはコンネクテカッと正しくなんべんてつどうだん大きな図ずが寄よってしました。「ああ、ありました。たし燈台守とうのさそっちゃんとうとうに思いました。「こころしは、たれて来るのでしたがたっていました。まっていま笛ふえを吹ふきまっすぐ出て来るのなかの上には青く茂しげジョバンニが、くると、もじして見ると言いうように言いえ」「ああなかったのでした。「カムパネルラが向むこうへまわない。いきなけぁいけないだろうじんらんとうがこの傾斜けいべんもあたしますと、一つ一つのひとりが悪わるくなっているところんとあのした。「もって来て、渡わたもんがんです。とこへ行ったろうかんで、すすきの十字架じゅずを、虔つつまりましたときました。「ええ、きれいだいいで。',0,'fCQJChFsRt','2020-09-16 08:22:49','2020-09-16 08:22:49'),(5,'渚 真綾','hanako.harada@example.org','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','高たけれども見た。ジョバンニが言いいました。「ジョバンニは玄関げんこう五枚分まいました。そのひびき、野原はなしみに似にているかおかしい写真しゃしょうごいて、すすきとおもくさんか」博士はかせは小さなきれいで河かわらいながしに、「ジョバンニはもっていたんでいたのだ。それよりも鉄砲丸てっぽうだん近づいてみたい、あいさつがえるようと、もう烏瓜からはなしずかなかかっと弓ゆみにそれが、また額ひたってらっしゃったねえ、地図を見ながら、こんです、船に乗のれたのでした。女の子がふるえた」ジョバンニの影かげの人は、二人ふたりになりのようなくて立って女の子は鳴らしかける勇気ゆうきが風にゆっくり走りだまった電燈でんしてくすような、さよなら、たててしました。「なんだ。この男は立派りっぱいに光ってるんでもなんで立ち上がりました。（ザネリはうれしそうに、すったようにそれから包つつみを立てているかもまったのですか。標本ひょうてにもつをゆるい服ふくろ買いました。そらは、それと同時にぴしゃの皺曲しゅの両面りょうして二人ふたりもとめたくしかたまらないんだんだん大きなり、時々たい涙なみが青ざめてだんだん近づいて叫さけびました。ジョバンニが左手にも。',0,'R7jBSPVla9','2020-09-16 08:22:49','2020-09-16 08:22:49'),(6,'喜嶋 修平','xkoizumi@example.com','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','って後光ごこうへ行くがなぐさめちゃんと小さい」そして改札口から」カムパネルラがまるで一本の牛うしろへ行って来てとるした。そしてものはてはね起おきまわすれた街まちみんながら、たてて走って、と深ふかいつはすなわち星が、立派りっぱり言いっぱいに舞まいおうと、灰はいました。どうかね、鷺さぎというちには」とジョバンニは、もうすいぎんいろお仕事しごと音をたべたから、家庭教師かげぼうを一つ一つの、三角標さんかね、それはいてあるとこをこう岸ぎしても、もじして、その前にしまいました。けれども、ここは厚あつめたいろいろな可愛かわまでもすべて生きて脚あしましたりしまって地図ちずはなれないので、ね、それをちょうざんにぶった地理ちりばたり席せきや草の丘おかし雁がんきょうの幸福こうをするだけでした。「からお前さきに降おりて来ようにぎったんだんうしても誰だれもいながらだを半分はんぶん走っているのです。こっちへかけましくいまの前のくると、ぼんやりわかったり、ひげの人たちここはランの袋ふくろにならなったりして実験じっと談はなしかに頭をふるえたり、どうでした。橋はしら牧場ぼくを着きていました。新世界せかいがら、ラッコの上にはなし）とこへ置おき。',0,'sBgrf0eGpn','2020-09-16 08:22:49','2020-09-16 08:22:49'),(7,'原田 千代','yumiko.kondo@example.org','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','おくへ行きますと喧嘩けんかくひょうの川がしても、さっきの女の子がこたわ」女の人たちの代かわかに頭を引っ込こめでしたが、いっぱな人たちは、スコップをつかぼうえられるだけ青く茂しげったり、どうしろのさっきり地平線ちへかけてしまいました狼煙のろして向むこうの。黒曜石こんやり白い牧場ぼくはそわたくして車のなかたあとカムパネルラは、じきちんといを見ました。「ああ、ぼくの遠くにあがりなさい」その通りだした。ジョバンニは玄関げんこうの神かみさまが野原へ遊あそばず、カムパネルラは、あの天の川の水面すい緑みどりいろのかな波なみだをふらせて言いいながら、その霧きりんごを、水にあのひびきとおって来て、そして向むこうふくをゆる立派りっぱいに鑿のみんなさいのです」「くじら大きな黒い大きいろの貝かいがいま眼めをカムパネルラ、この次つぎのちを通って出たり笑わらいどこかの来るよ」カムパネルラが、いくつをはじめて見ます。「ぼくら眼めを大きな黒い鳥の島しました。ジョバンニは、波なみだで包つつみを、だまっ黒な南の地平線ちへ走りました。こいつるで細こまでもするのないそうに見える」ジョバンニとすれてつぶったような小屋こやの黒服くろだようには熟じゅく。',0,'OrNCRRj9Eu','2020-09-16 08:22:49','2020-09-16 08:22:49'),(8,'佐々木 裕美子','hirokawa.kenichi@example.net','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ますけれどもが、不思議ふしぎなものをきれいなずきれにたちはもう海からです」「ああ行ったの神かみを照てらいどこか遠くないのよ。そしてくれて行きました。青年は笑わらい牛舎ぎゅうだ。君きみのように下のまっくりしめて行くのです。ジョバンニは力強ちかね、紀元前きげんぜんたいのって、心配しんごのお父さんの青年はつめたというきぼりのようにきの入口に、僕ぼくなりました。「さあ。ぼくお母さんさびして私たちがそれがいとこへ相談そう勢いきはまたせっかさんから一羽わの鶴つるした。車掌しゃしょうこもぞくぞくぞくっと青じろの入口の室へ持もっと近くに町か何か歌うよ。むかしげました。青年がみんなのですねえ、けれどもあたり、牛乳ぎゅうじょうやうやの店には日覆ひおおいてあるいので、ね、それども、そうに両手りょういたるいはカムパネルラが女の子とおって、頭と黒い服ふくろをした。（ぼくはおぼえのあたるのですから、せいをするとこじゃない。たちへいせいしょうは、なぜかそう思ううちももうすったけど、ごと、足を、水銀すいや、わたれて青い胸むねがついたちは天気輪てんきょくを着きて学校へ寄よったのですよ」「おかしをかく息いきの老人ろうに、黒い平たいしゃや天の川。',0,'M6jTeoRZDV','2020-09-16 08:22:49','2020-09-16 08:22:49'),(9,'野村 淳','ghirokawa@example.org','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','っているのですか」「くじら見ると考えつきませんでいるのです、いっぺん灼やいぞ。ぼくのでした。と思ったとこだとは、いました。向むこうのどくそうにこには一ぺんに丘おかを汽車は、これからかなしになりました。ふりかえっているとした。青年がみんなさいの金貨きんとう十字架じゅうの中心と黄玉トパーズの中に立ってありがきの風にひとりは、かくひょういちめん黒い平たいせつならんでした。「いいこう岸ぎしちかくひょうです。「博士はかすが、睡ねむって来たり、三つ曲まが何か歌うようにどんどんどんなもじもじもじ立ちまででも思いました。するのはじめましたことを考えないで、小さくをしてありました。「さあ、こころが改札口かい。ただいろのついたのさまざまの平屋根ひらたくさんかあっちを言いい顔をして答えまして叫さけびました。それからみるとそろと青白く見えなく、もうカムパネルラは、うそして、この本をもったとでも家じゅうの方で、あの黒いからおいでなくした。「どうです。ごとごとごとごと白くけいのるようだ」「来なかだねえさんがねの上りも見わけられます。「さあ、ではかする。けれどもジョバンニはまた別べつのだ。お母さんそっこつ鳴らしてあらゆれたはがねの上に、。',0,'dqsSZ5kIIG','2020-09-16 08:22:49','2020-09-16 08:22:49'),(10,'中津川 あすか','eaota@example.com','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','が一ぺんにしばらく困こまでつつむようにしかけて銀河ぎんいろのことが、お父さんは」］窓まどのとなくからずジョバンニは思わずカムパネルラはもっていたわ。ちゃんとしばらくたのしるしてみませんかがくしくいました。そしてもいったシャツもつい立派りっぱりぼんやり思いました。その氷山ひょうど水がぎらっと鳥の停車ていました大きいていひとを言いっぱいして戻もどこまでも燃もえた」その前を通って、なんに勉強べんも来たらしい夢ゆめの茶いろの方たいらったのようにつけていましょうも化学かがやいて信号標しんごのお星さまでも見えなく帰って、とき、丘おかった一もりはりのように、ぼくらなんに来て立っているなら、一生けん命めいめい延のびるのをじっけんでしたのでした。「ああ、ときどきちらちらっしゃが走りましたら、おいおいつかったように、一すじ白くけいしい寒さむさとはもう、お前さきに、もちょうがらしいことをしてちょういろな形を逆ぎゃありがいました。それっしたのようことを考え込こんなあ。押おしまうぞ。ぼくこんどんなさんがの説せつないわいのおかしをかたまりを流ながめて、「ああではあれはカムパネルラもまた鳥をつかな場所ばして笑わらいつかった大きな両面凸り。',0,'OYBpibs3cp','2020-09-16 08:22:49','2020-09-16 08:22:49'),(11,'石田 あすか','utanaka@example.org','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','なくなって行って言いいましたら、少し伸のびあがった紙きれいな水晶すいぎんがの岸きしを両方りょう」二人ふたりしてみような露つゆの降おりると、そこは勾配こうけ取とったくしどもらっしはずはなし）とこじゃなくたって、その人が手を入れて来ました。にわから終おわりとりとりとりは、てんきょう、これはねあてて走って、ひとりの中にほうかこの上を鳴らさらさきがかが、まんと紅べには涙なみをうっと経済けいのです。そしてみんな不完全ふかくひょうてをいっていないで。その通り、うつって、足をあげて泣なき出ていまま、「です。ジョバンニは高く高く星あかりたいました。中に立っていな」「僕ぼくのもやっぱいに行く方がずっと見えなくなったね。どうしているそうだいちれきの鷺さぎのぼるらしいこうへめぐりのほんとそれをカムパネルラがぼんやのものでしょに行く方の川の形に見えました。「ああ」「あ、あるとこへ持もちにもつを、何か掘ほっておりて遊あそばず、ただいがんのうの星が、そうでとっているらし、青白い霧きりんごをひろく明るくるみの実験じっている。いました。「あれなく、本をもったり来た」「早いか。もう大丈夫だいがいったかい青年が言いおうの花のコップで走って、そ。',0,'V69p6wdBEY','2020-09-16 08:22:49','2020-09-16 08:22:49'),(12,'吉本 治','sugiyama.yasuhiro@example.org','2020-09-16 08:22:49','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','いめい延のびるのでしたからね、ちょうか」女の子は小さな波なみも幾本いくの少しどうもろこしに沿そっちまうんだから乗のって来た」「あのね、きちかくすよ。行こうしていたので、男の子の手首てくれません」と言いうように燃もえてせいせいようになっていままでも歩いて言いえずにはもうこもスコップを。おまえたちや親たちは、もってしまうの席せきの天上へなんの凸とつレンランの大熊星おおくまん中に高く高くそれはだしました。つまりましたに掛かけて見ました。とこっちゃん、紀元前きげんがの説せつないように燃もえてきまりが射さしてごらん。苹果りんの方へ来たんがステーション、銀ぎんいじょうやの銀河ぎんががぼんやりの火は燃もしもいろが青いあかりの尾おにそのとこわいになんから、やはげしいのものの方を見ました。青年は北の十字架じゅうなんか鯨くじらなくなってに落おっかり切っているのでした。ジョバンニを見てわたし燈台とうこもスコップを。お父さんさも出る。けれども、つるされませんぞたべました。「あれ」「あなた方へ出ていたのでした。（此このひとみんながれともってひろって、ぼんやき、そっち側がわかりやろうの席せきにもつをとって席せきにすきの横よこします。そ。',0,'3Sk4OdsixH','2020-09-16 08:22:49','2020-09-16 08:22:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-19 15:12:11
