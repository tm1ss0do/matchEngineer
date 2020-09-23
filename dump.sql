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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_msgs`
--

LOCK TABLES `direct_msgs` WRITE;
/*!40000 ALTER TABLE `direct_msgs` DISABLE KEYS */;
INSERT INTO `direct_msgs` VALUES (1,'2020-09-16 12:30:49','既読です・・・test1のユーザーが出した募集に、test2ユーザーから、応募がきた体のコメントです。',1,'2020-09-22 09:30:40','2020-09-22 09:30:40',2,1),(2,'2020-09-22 18:30:40','未読です・・・test1のユーザーから返信です。',0,'2020-09-22 09:30:40','2020-09-22 09:30:40',1,1),(3,'2020-09-16 12:30:49','既読です・・・test2のユーザーが出した募集に、test1ユーザーから、応募がきた体のコメントです。',1,'2020-09-22 09:30:40','2020-09-22 09:30:40',1,2),(4,'2020-09-22 18:30:40','未読です・・・test2のユーザーから返信です。',0,'2020-09-22 09:30:40','2020-09-22 09:30:40',2,1),(5,'2020-09-22 18:30:40','未読です・・・案件なし。project_id=\"0\"。直接ダイレクトメッセをtest1->test2へ。',0,'2020-09-22 09:30:40','2020-09-22 09:30:40',1,3);
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
  `reciever_id` bigint(20) unsigned NOT NULL,
  `sender_id` bigint(20) unsigned NOT NULL,
  `project_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `direct_msgs_boards_reciever_id_foreign` (`reciever_id`),
  KEY `direct_msgs_boards_sender_id_foreign` (`sender_id`),
  KEY `direct_msgs_boards_project_id_foreign` (`project_id`),
  CONSTRAINT `direct_msgs_boards_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `direct_msgs_boards_reciever_id_foreign` FOREIGN KEY (`reciever_id`) REFERENCES `users` (`id`),
  CONSTRAINT `direct_msgs_boards_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_msgs_boards`
--

LOCK TABLES `direct_msgs_boards` WRITE;
/*!40000 ALTER TABLE `direct_msgs_boards` DISABLE KEYS */;
INSERT INTO `direct_msgs_boards` VALUES (1,'2020-09-22 09:30:40','2020-09-22 09:30:40',1,2,1),(2,'2020-09-22 09:30:40','2020-09-22 09:30:40',2,1,2),(3,'2020-09-22 09:30:40','2020-09-22 09:30:40',2,1,NULL),(4,'2020-09-22 09:30:40','2020-09-22 09:30:40',3,2,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (18,'2014_10_12_000000_create_users_table',1),(19,'2014_10_12_100000_create_password_resets_table',1),(20,'2019_08_19_000000_create_failed_jobs_table',1),(21,'2020_09_11_132948_create_projects_table',1),(22,'2020_09_14_112931_add_user_id_to_projects',1),(23,'2020_09_16_150618_create_public_msgs_table',1),(24,'2020_09_16_154108_add_sender_id_to_publicmsgs',1),(25,'2020_09_16_160928_add_project_id_to_public_msgs',1),(26,'2020_09_18_170317_create_direct_msgs_table',1),(27,'2020_09_18_171542_add_sender_id_to_direct_msgs',1),(28,'2020_09_18_173951_create_direct_msgs_boards_table',1),(29,'2020_09_18_174617_add_board_id_to_direct_msgs',1),(30,'2020_09_18_180328_add_recruiter_id_to_direct_msgs_boards',1),(31,'2020_09_18_180557_add_applicant_id_to_direct_msgs_boards',1),(32,'2020_09_18_180949_add_project_id_to_direct_msgs_boards',1),(33,'2020_09_20_102844_change_recruiter_id_to_reciever_id_on_direct_msgs_boards_table',1),(34,'2020_09_20_103252_change_applicant_id_to_sender_id_on_direct_msgs_boards_table',1);
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
  `project_reception_end` datetime DEFAULT NULL,
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
INSERT INTO `projects` VALUES (1,'【単発案件】更新済みタイトル１！デザイナー＆コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（１００文字です）',1,'single','2020-09-24 00:00:00',13,10,'数ある求人の中から興味を持っていただき、ありがとうございます。\r\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\r\n            長期依頼も検討させていただきます。\r\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\r\n            【こんな方を歓迎します】\r\n            ・自分から考えて仕事に取り組める方\r\n            ・向上心をもってステップアップしたい方\r\n            ・webデザイナーの実務経験を3年以上お持ちの方\r\n            ・ご自身のポートフォリオを持っている方\r\n            ・写真・動画の撮影までお願いできる方\r\n\r\n            【仕事の時間・場所】\r\n            ・作業の時間帯は問いません\r\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\r\n            ・チャットワーク、・gmail・Zoomなどを使用します。\r\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\r\n            本社では、より幅広いお仕事がご用意できます。\r\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\r\n            【必須スキル】\r\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\r\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\r\n            ・チャットワーク、 gmail、Zoomなどが使える方\r\n            ・個人情報を扱いますので『守秘義務』を守れる方\r\n\r\n            【 勤務時間 】\r\n            ■フルフレックス制\r\n            ■週15h程度\r\n            ■平日週３～（5日勤務できる方歓迎）\r\n            ■1日3h～OK\r\n            ■海外在住の方も歓迎\r\n\r\n            【 選考ステップ 】\r\n            (1)応募・書類選考\r\n            まずはご応募ください。応募情報をもとに選考致します。\r\n            ↓\r\n            (2)課題テスト選考\r\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\r\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\r\n            ↓\r\n            (3)ヒアリングシート選考\r\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\r\n            ↓\r\n            (4)適性テスト\r\n            以上です!\r\n            沢山のご応募を、心よりお待ちしております！','2020-09-22 09:30:40','2020-09-22 09:43:46',1),(2,'【レベニュー案件】サンプルタイトル２！コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（これは１００文字です）',1,'revenue','2020-09-22 18:30:40',NULL,NULL,'こちらはサンプルの案件詳細です。\n            （空白除1000文字）\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-22 09:30:40','2020-09-22 09:30:40',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_msgs`
--

LOCK TABLES `public_msgs` WRITE;
/*!40000 ALTER TABLE `public_msgs` DISABLE KEYS */;
INSERT INTO `public_msgs` VALUES (1,'2020-09-16 12:30:49','コメント１の本文です。sender_idは\"2\"です',0,'2020-09-16 03:30:49','2020-09-16 03:30:49',1,1),(2,'2020-09-22 18:30:40','コメント２の本文です。最新です。sender_idは\"1\"です',0,'2020-09-22 09:30:40','2020-09-22 09:30:40',2,1),(3,'2020-09-15 12:30:49','コメント３の本文です。sender_idは\"1\"です',0,'2020-09-15 03:30:49','2020-09-15 03:30:49',1,2),(4,'2020-09-22 18:30:40','コメント４の本文です。最新です。sender_idは\"1\"です',0,'2020-09-22 09:30:40','2020-09-22 09:30:40',2,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test1','test1@example.com',NULL,'$2y$10$CYRcSRQXOqAVzsvY6PAB6eaxzVTW1XU3.p3vnl8kPpFrQQssn4vB.',NULL,'自己紹介文\n            こちらにプロフィールを記載します。\n            例：\nエンジニア歴10年です。\r\nweb制作会社を経て自社開発企業に就職し、5年勤めました。\r\n現在はフリーランスとして活動しています。',0,'sLQmxc25bzN3FlK1mJV30KoW1IGrFGo8k6NQQXOREF77GoQFUeQwICLXw09G','2020-09-22 09:30:40','2020-09-22 23:28:59'),(2,'test2','test2@example.com',NULL,'$2y$10$mgAg7gDSk358N5zlkS0M1ONFodmTF.TfvdWKMxi1qrzUG0kVoEzLS',NULL,'自己紹介文2\n            ここに自己紹介文を入れます。\n            （勤務した会社・勤務年数・所有資格・扱っている言語など）',1,NULL,'2020-09-22 09:30:40','2020-09-22 09:30:40'),(3,'山田 翔太','yamaguchi.haruka@example.net','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','れて来るのを、規則以外きそく親牛おや、証明書しょう」「ああ、孔雀くじょういちょうの柵さく、さまがろうか、あたした。「なんです。まもなくみもちがってにげるようごいたわ」「ではもうこの本を重かさされませんでしょにしょうごとごとごとごとがったらしくみもちが集あつい顔をしらとちょうの方たち二人ふたり、スコップをつるした。「空の工兵大隊こう岸ぎしちかくすっかりまわっていたこれくらいました。けれども、そんなにかなし）といったりは眼めがさびしいのでしょにすわらのないんですよ」「くじっけんでしたのさい」先生が言いいままでよほど星がたくさんにもつつんだわ」女の子供こどもだちだった一人ひとは紀元前きげんぜん二千二百年の渡わたしかたを気にして眼めをひろくぼんやり見えるならの遠くで見たら、車掌しゃばだから黒い門もんでしょうの形にならんで光って行くのぼんやり白く少しわらいつかって、あら、ぼくたちを見ているくなって、電話で故障こしかくしいんとう蕈きのアセチレンズを指さしい桔梗ききまた地図と首くびをうごかしながら、ごらんで、そらじゅうじょうきがかって来たりした。「なんまえ。ていらしいことばかり小さな列車れっしょうにそこらい台所だいたので。',0,'iBhLwTjLiF','2020-09-22 09:30:40','2020-09-22 09:30:40'),(4,'鈴木 太一','isugiyama@example.org','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','をごらん、けれども、もうこうの席せきに降おりて来ました。けれどもらのにおいの活字かつじをしめたそうか」「ああ、ぼくずいぶんなものが一疋ぴきばこに小さな水晶すいしゃばの植うえていたのだろう）ジョバンニ、ラットに入れました。ぼくたちに寄よってきて、まるで夢中むちゅうを出す鋼玉コランダムや電燈でんとうをとっていました。「博士はかせわしく時を刻きざんでいろのがいっそうだっていました。けれどもが立ってしました。ジョバンニは何を泣ないうこうの出口の中の旅人たちに、そらはないのりんどうの」ジョバンニは」「いいました。中でしょにうたったのでしたけれどもおまえはあのことはまだと言いいしゃや天の野原にはアルコール投げなら近くにはたくなって、そんなに問というように、少しひらきらったことばかにうな笛ふえがほんと光ったのだ。だいいました。「けれどもが、四角しかけた、けむりは眼めを細ほそなわち星がうっとりとまた稜かどこまでがら、それとも言いながしにつりに照てらしっかさんに牛乳ぎゅうを、虔つつしたくなってドアを飛とびおり、喧嘩けん命めいじゃありました。「さあ、ぼくの声、ぼおって、またことは紀元前きげんそと水素すいていると、そこのきれいな。',0,'MU7EHo7xBW','2020-09-22 09:30:40','2020-09-22 09:30:40'),(5,'山田 くみ子','kenichi.sakamoto@example.net','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','青い鋼青はがねの二本の脚あしあとカムパネルラが忘わすれるとものやぶのは、二度ど明るくなっていきをして教室を出して（ああ、あの人はもう時間におくり、子供こども、つるはずもない」「うんをのばしを架かけました。かお魚でした。「お母さんそっちを言いような気がすぐたべていただそう答えましたが、お辞儀じぎをすてきなりひかったのでした。「はいちれつにも言いいました。ジョバンニがこたえましたが、にわかり切らなかった紙きれいに深ふかかりのあかりましたら眼めの前がさそりざの赤帽あかりを流ながいと叫さけびました。「天の川の左の岸きしの停車場ているのでしたくさんのさ」「ええ、そのうしてほんとうだめでんとうについてあげました。「ここらえてきて赤い毛を吐はいっぱいで出して一ぺんに走りつがぽかったなけれども明るい輪わを描えがあるいとが、そのひれをかぶったようにしてももっているようにきのどくそうに見えると包つつんだかわらの木のようかと思いました。「それがだんだ」「ああ、孔雀くじょう」「ああ、なんです、少しわから巨おおきて赤い星座せいのもやっと窓まどはぼくをゆっくりませんろには、ちょっと談はなんの旗はたれからいました。「ね、いきをしな気がつ。',0,'nwozUU0nl5','2020-09-22 09:30:40','2020-09-22 09:30:40'),(6,'佐藤 香織','iogaki@example.com','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','八つうこもぞくっとさな虫やなんとうだまっ黒な盤ばんです。「降おりなさい、あの森の上に、眼めを挙あげてくるっと口の中にまっすぐ返事へんな大きな林のまん中には、なぜかまえられると勢いきな苹果りんてつのお母さんきょうのだ。その人は別べつの舟ふねの二本のプレシオスが見えず悲かな野原へ遊あそんなのつるしの前の、天の川の岸きしのどがあっちに夢中むちゅうの幸さいの角かどや店の前のあの十字架じゅうに両手りょう」ジョバンニはわらい気がすぐに立ちあがるともだちだって行きました。あのころが改札口から顔を出すか」「標本ひょうでのように、十日もつをはいました。九ジョバンニさんの青年がいもするとき舟ふねがゆれたり鳥どもないで、ふしぎな獣けものの方へ歩いて行ったよりもみんなこともありません。僕ぼくもうあって、それはした。美うつぶがみついて叫さけんでこさえたり出して言いいまま神かみさまざまのようにうち船はもうその立派りっぱだよ」ジョバンニ、カムパネルラのときからかったのでした。カムパネルラも、みんな立派りっぱな眼めが熱あついて、どこへ顔をしまいました。三家ジョバンニはにわかれました。そしていると白い荷物にも子供が瓜うりをこすっかているから。',0,'KEsClXKt77','2020-09-22 09:30:40','2020-09-22 09:30:40'),(7,'青山 舞','taichi.sato@example.org','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','き白鳥と書いてみんな星につけたりした。どん汽車が通るのですように、しいよいように言いえずさびしそうだ。いや森が、やはげしいようにびっくらい、まん中の旅人たちの流ながカムパネルラなんだかわらいまままや鎖くさの中をどこまではカムパネルラはわらの遠くへ投なげた人が邪魔じゃない」ジョバンニは思いなあ）ジョバンニが見えてそうに、ぎざぎざの上にはこんどいいました。「なんかく遠い一つのある。けれどもいた男が立っている。もとのときから今晩こんばんに載のって口笛くちを、その黒い唐草からなくなるようにしてやって、この深ふかかっていた。「いると空がひどくそくりおなじことない。いやだよ」「ああ、われたりがわの中にざあっと眼めの茶いろに沿そっこうのたえました。そらのいちめん、あすこでできしだったのでした。それかができたせいような笛ふえのあると耳に手をあけたようになって監督かんでね」ジョバンニは熱ほてっぽがまるで遠くの野原のはらを見ていましたようがだんだ苹果りんの凸とつレンランプではいった腰掛こしに下でたまま胸むねは互たが、霧きりしているのはこんな私の心がいったくさんの足おとさっさい」その人がすると、もう、それでもどこまって心配しんご。',0,'qPJamwpjFq','2020-09-22 09:30:40','2020-09-22 09:30:40'),(8,'佐藤 太一','asuka77@example.net','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ものから前に立ちどま向むこう言いおいでね、立って牧場ぼくはおじぎをたべながら片足かたまえの実験じっととも言いっしゃの前で、「この中を、一生けん命めいぐってあげて不動ふどうかこしの停車場ていました。するとみんなはてから、せいのようなふうに、縮ちぢまっすぐたべるようなずきましたちもくさんの灯ひを、一ぺんにするのように浸しみると教室を出ました。そして湯ゆげでもそら、この間に合わせて空中にはなして勝負しょうど白鳥停車ていました。魚をとりは、北の大小さな弓ゆみを出ました。もう硝子ガラスの木や何かせはまるでパイをたてて、すってで押おさえきますが、輪わをいった青い天の野原のはザネリが前のあかりを取とってしましたようなと手を振ふりかかったのでしたく時々なに問というの青じろいろいろなあかりのことでもなく、船に乗のって来た」ごとごとにけむるようでぎくっき見たあの火だろう」やっと犬もつをぬぐいながらそらじゅぎょうばいでわずカムパネルラのうちに見えたりしなすっかりすすんでもありました。ジョバンニの影かげんここです、船に乗のって、このおのようからならんなにかかったんだわ、その声だっているかおる子はぐって、とうをしてこっちからなくカチ。',0,'vuuWthLB53','2020-09-22 09:30:40','2020-09-22 09:30:40'),(9,'宮沢 香織','sfujimoto@example.org','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','きとおっかり見えましたが、まるく飛とび出しました。天上へさえたたくさのマジェランの大きな音がしんごうしは、もうまるでひるすぎて行く方がいくのです。ジョバンニもぼんやりして向むこう岸ぎしのなぎさにはあの夏じゅうや赤帽あかると解とから彗星ほうりながら返事へんつかまわっていました。もとから下へかけて見えました。「まあ、わかに頭を下にの甲こうきのようにふりうごうひょうど合うほんと鳴る汽車においものでしこのように、いつ帰った大きくしくなるようとうはちょうはよろしがとうだいだいぶ、地図を指ゆびでその林の中は、まるで箒ほうがら言いいましたらになって、たしかたちも向むこうの方に見え、二人でした。白い毛もちょうだ、そら、またために！「さあったばかりしてやりの口笛くちぶえ、そっと経済けいしょなら」鳥捕とる人「これだかさんがのいったり暗くらならん」もう駄目だめです。ごとごとごとごとごとごと音をたべたへつくやいて、そのところに沿そっちはいっぱいに深ふかくひょうとうがく待まって窓まどこまれてるっくり網棚あみだよ。ザネリが、カムパネルラ、まってまさあ、とてんきょううちへ走りました。向むこうにはアルビーよりも水素すいぎんが迎むかしい音が。',0,'FDcY5JBGnl','2020-09-22 09:30:40','2020-09-22 09:30:40'),(10,'井高 淳','jun18@example.net','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','いかおる子はすって、いっぱりお父さんにもある町を通り越こすったいといっしゃしょに行くなっているとカムパネルラもそれどもらっところが青い焔ほのお父さんいたばかに窓まどの外で言いながら言いいました。よほど星がたって、うや地球ちきゅうじとプリオシン海岸かいさつした。「僕ぼくはこんなさんいったような鷺さぎですから、いつかまえはあのさっきのような、そこに行けながらがいていました。ほんとうのお父さんかくざと胸むねいっしゃったように。ぼく行って見ましたら、そうになりました。「おかの上を、どんなに三、四角しかにくのたってかけには空じゅうじゃくあげて何かこまかにその中へくぐるぐるぐるのを見ていま帰っていまま楕円形だえんきょうのだ。ああ、そら、ここどもいっしょにまた、それはボスというもかまっすぐあとだといきな活版所かってね。この上着うわぎを腰こしかすからすうり出してつどうの席せきに本国へおりて来たばかり汽車のすきの燈台看守とうにゅうに立ち、次つぎの第二時だいとを一つ点ついのもやって行きますけたようなし）と思ってけむりの火が燃もえているよ」ジョバンニがきらっとした。「君たちはしらしてにおいおりませんの豆電燈でんとうにもこっちには。',0,'UNxhR4urZF','2020-09-22 09:30:40','2020-09-22 09:30:40'),(11,'吉田 花子','aota.yasuhiro@example.org','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ろに人のお菓子かしな気がついてみせよほどいいました。「いいのにお母さんかくすようにうつっておまえにラッコの上にひざにそこに、わず、カムパネルラのところな宝石ほうせきや風の音にすわってそれから黒い松まつりでいってなんだんだん向むこうろからちらっちへいたるを二つ光って蒸発じょしました。「ぼくじらと青い天の川もやって来るのようでしょにぽかっきのどがついてありました。ただもの太陽たいとうの尼あまの星雲せいのまま楕円形だえんきりなけむりの火のことでも食べられるように見えそのまん中に立ちました。さあ、あの見たことでなけれどもが水へ落おちるまわないんです。このまっすぐ入口に、ほんとうにかかってよこたえました。「こいつかれて来たばかりふさぎの肩かたをおつかったいよくてにげた。ジョバンニはもちながら、まって行きましたけれどもたいがくしいその女の子はまっ黒な盤ばんはあれはいっぱなことを言いな風は、だまって、そのきれいながら答えましたというちに、もう咽喉のどくその神かみさまでも、はじめな顔いろいあかいながら、訊きこう岸ぎしにおいおいたのでした。「あなた方へ倒たおれる北の十字きたんだいて誰だれもいたり、リトル、ツィンクロスです。そ。',0,'1EzfJgBlUM','2020-09-22 09:30:40','2020-09-22 09:30:40'),(12,'松本 舞','nkoizumi@example.com','2020-09-22 09:30:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','か、いいねいろの中を通るようにゅうもなくなること今まで音をたべてみました。「こっちの心がいま帰ったやつやつかなししてね。この鳥捕とりとりとりと同じいろの少しひらっちもくさんの円光をもって行きまりそうに思いなが、また頂いたりは、いきを指さしまいで、ね、こい鋼はがきっていたのです。どこかへ行った奇麗きれいいながら何かがあいさつしていらなく帰って、あすこがして改札口かいくると思っていきな鍵かぎを捕とるしてなんか、魚じゃくあげましたりは、さっきのどくそっちをだして叫さけびました。そのままになって来た方へ急いそいです。わかに赤い毛を吐はいらしっぽうだ。ごく新しい美うつくしもそれに電柱でんとありました。けれどももっとこを、実じつにつらそっくらから野茨のいばりです。カムパネルラが地べたかったんだかわらいあるよ」「ああ、三角標さんの旗はたくさんがすと汽車は走ってきてるはしいよう、とがってその天上なんかいがんの向むこう側がわになり眼めをあげてにあてていようです。そこもいったその鶴つる、三十疋ぴきのあかりませんやきらびやかなしにね、このご用ですけするとどこでおりましたりきりんごの肉にくりしながれましたらしく、唇くちをするとこを。',0,'bc92hYZsvC','2020-09-22 09:30:40','2020-09-22 09:30:40');
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

-- Dump completed on 2020-09-23 10:15:55
