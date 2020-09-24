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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` bigint(20) unsigned NOT NULL,
  `board_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `direct_msgs_sender_id_foreign` (`sender_id`),
  KEY `direct_msgs_board_id_foreign` (`board_id`),
  CONSTRAINT `direct_msgs_board_id_foreign` FOREIGN KEY (`board_id`) REFERENCES `direct_msgs_boards` (`id`),
  CONSTRAINT `direct_msgs_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_msgs`
--

LOCK TABLES `direct_msgs` WRITE;
/*!40000 ALTER TABLE `direct_msgs` DISABLE KEYS */;
INSERT INTO `direct_msgs` VALUES (1,'2020-09-16 12:30:49','既読です・・・test1のユーザーが出した募集に、test2ユーザーから、応募がきた体のコメントです。','2020-09-23 23:12:13','2020-09-23 23:12:13',2,1),(2,'2020-09-24 08:12:13','未読です・・・test1のユーザーから返信です。','2020-09-23 23:12:13','2020-09-23 23:12:13',1,1),(3,'2020-09-16 12:30:49','既読です・・・test2のユーザーが出した募集に、test1ユーザーから、応募がきた体のコメントです。','2020-09-23 23:12:13','2020-09-23 23:12:13',1,2),(4,'2020-09-24 08:12:13','未読です・・・test2のユーザーから返信です。','2020-09-23 23:12:13','2020-09-23 23:12:13',2,1),(5,'2020-09-24 08:12:13','未読です・・・案件なし。project_id=\"0\"。直接ダイレクトメッセをtest1->test2へ。','2020-09-23 23:12:13','2020-09-23 23:12:13',1,3),(6,'2020-09-24 11:12:13','hhhhhhjj!!','2020-09-24 02:12:13','2020-09-24 02:12:13',2,6),(7,'2020-09-24 11:24:47','oo','2020-09-24 02:24:47','2020-09-24 02:24:47',2,7),(8,'2020-09-24 11:25:44','oo','2020-09-24 02:25:44','2020-09-24 02:25:44',2,8),(9,'2020-09-24 11:28:52','hhhhhhjj!!','2020-09-24 02:28:52','2020-09-24 02:28:52',2,9),(10,'2020-09-24 11:29:01','oo','2020-09-24 02:29:01','2020-09-24 02:29:01',2,10),(11,'2020-09-24 11:29:08','hhhhhhjj!!','2020-09-24 02:29:08','2020-09-24 02:29:08',2,11),(12,'2020-09-24 11:29:59','直接ダイレクトメッセーを送っています。','2020-09-24 02:29:59','2020-09-24 02:29:59',2,12),(13,'2020-09-24 13:12:47','送りました。','2020-09-24 04:12:47','2020-09-24 04:12:47',2,3),(14,'2020-09-24 13:14:09','送りました。','2020-09-24 04:14:09','2020-09-24 04:14:09',2,3),(15,'2020-09-24 13:19:30','一番最新のメッセージです。','2020-09-24 04:19:30','2020-09-24 04:19:30',2,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_msgs_boards`
--

LOCK TABLES `direct_msgs_boards` WRITE;
/*!40000 ALTER TABLE `direct_msgs_boards` DISABLE KEYS */;
INSERT INTO `direct_msgs_boards` VALUES (1,'2020-09-23 23:12:13','2020-09-23 23:12:13',1,2,1),(2,'2020-09-23 23:12:13','2020-09-23 23:12:13',2,1,2),(3,'2020-09-23 23:12:13','2020-09-24 04:19:30',2,1,NULL),(4,'2020-09-23 23:12:13','2020-09-23 23:12:13',3,2,NULL),(5,'2020-09-24 02:11:18','2020-09-24 02:11:18',1,2,1),(6,'2020-09-24 02:12:13','2020-09-24 02:12:13',1,2,1),(7,'2020-09-24 02:24:47','2020-09-24 02:24:47',1,2,1),(8,'2020-09-24 02:25:44','2020-09-24 02:25:44',1,2,1),(9,'2020-09-24 02:28:52','2020-09-24 02:28:52',1,2,1),(10,'2020-09-24 02:29:01','2020-09-24 02:29:01',1,2,1),(11,'2020-09-24 02:29:08','2020-09-24 02:29:08',1,2,1),(12,'2020-09-24 02:29:59','2020-09-24 02:29:59',1,2,NULL);
/*!40000 ALTER TABLE `direct_msgs_boards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direct_notifies`
--

DROP TABLE IF EXISTS `direct_notifies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direct_notifies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `read_flg` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direct_board_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `direct_notifies_direct_board_id_foreign` (`direct_board_id`),
  KEY `direct_notifies_user_id_foreign` (`user_id`),
  CONSTRAINT `direct_notifies_direct_board_id_foreign` FOREIGN KEY (`direct_board_id`) REFERENCES `direct_msgs_boards` (`id`),
  CONSTRAINT `direct_notifies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_notifies`
--

LOCK TABLES `direct_notifies` WRITE;
/*!40000 ALTER TABLE `direct_notifies` DISABLE KEYS */;
INSERT INTO `direct_notifies` VALUES (1,0,'2020-09-16 03:30:49','2020-09-16 03:30:49',1,1),(2,1,'2020-09-16 03:30:49','2020-09-16 03:30:49',1,2),(3,1,'2020-09-16 03:30:49','2020-09-16 03:30:49',2,1),(4,1,'2020-09-16 03:30:49','2020-09-24 01:27:09',2,2),(5,0,'2020-09-16 03:30:49','2020-09-24 04:12:47',3,1),(6,1,'2020-09-16 03:30:49','2020-09-16 03:30:49',3,1),(7,1,'2020-09-16 03:30:49','2020-09-24 04:11:01',3,2),(8,1,'2020-09-16 03:30:49','2020-09-16 03:30:49',4,2),(9,0,'2020-09-16 03:30:49','2020-09-16 03:30:49',4,3),(10,1,'2020-09-24 02:25:44','2020-09-24 02:25:44',8,2),(11,0,'2020-09-24 02:25:44','2020-09-24 02:25:44',8,1),(12,1,'2020-09-24 02:28:52','2020-09-24 02:28:52',9,2),(13,0,'2020-09-24 02:28:52','2020-09-24 02:28:52',9,1),(14,1,'2020-09-24 02:29:01','2020-09-24 02:29:01',10,2),(15,0,'2020-09-24 02:29:01','2020-09-24 02:29:01',10,1),(16,1,'2020-09-24 02:29:08','2020-09-24 02:29:08',11,2),(17,0,'2020-09-24 02:29:08','2020-09-24 02:29:08',11,1),(18,1,'2020-09-24 02:29:59','2020-09-24 02:29:59',12,2),(19,0,'2020-09-24 02:29:59','2020-09-24 02:29:59',12,1);
/*!40000 ALTER TABLE `direct_notifies` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (106,'2014_10_12_000000_create_users_table',1),(107,'2014_10_12_100000_create_password_resets_table',1),(108,'2019_08_19_000000_create_failed_jobs_table',1),(109,'2020_09_11_132948_create_projects_table',1),(110,'2020_09_14_112931_add_user_id_to_projects',1),(111,'2020_09_16_150618_create_public_msgs_table',1),(112,'2020_09_16_154108_add_sender_id_to_publicmsgs',1),(113,'2020_09_16_160928_add_project_id_to_public_msgs',1),(114,'2020_09_18_170317_create_direct_msgs_table',1),(115,'2020_09_18_171542_add_sender_id_to_direct_msgs',1),(116,'2020_09_18_173951_create_direct_msgs_boards_table',1),(117,'2020_09_18_174617_add_board_id_to_direct_msgs',1),(118,'2020_09_18_180328_add_recruiter_id_to_direct_msgs_boards',1),(119,'2020_09_18_180557_add_applicant_id_to_direct_msgs_boards',1),(120,'2020_09_18_180949_add_project_id_to_direct_msgs_boards',1),(121,'2020_09_20_102844_change_recruiter_id_to_reciever_id_on_direct_msgs_boards_table',1),(122,'2020_09_20_103252_change_applicant_id_to_sender_id_on_direct_msgs_boards_table',1),(123,'2020_09_23_101911_create_notify_table',1),(124,'2020_09_23_103421_rename_notifies_to_public_notifies_table',1),(125,'2020_09_23_103655_add_msg_id_to_public_notifies',1),(126,'2020_09_23_104133_add_user_id_to_public_notifies',1),(127,'2020_09_23_104500_add_read_flg_to_public_notifies',1),(128,'2020_09_23_115204_drop_read_flg_from_public_msgs',1),(129,'2020_09_23_151341_rename_public_msg_id_to_public_board_id_on_public_notifies_table',1),(130,'2020_09_24_075620_create_direct_notifies_table',1),(131,'2020_09_24_080219_add_direct_board_id_to_direct_notifies_table',1),(132,'2020_09_24_080652_add_user_id_to_direct_notifies_table',1),(134,'2020_09_24_081817_drop_read_flg_from_direct_msgs',2);
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
INSERT INTO `password_resets` VALUES ('testdes@example.com','$2y$10$S3DdMzwN7C/RVl0aidUzgep/.PNGSZKWcMvgsasIfzhWet5N5xN16','2020-09-24 06:43:33');
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
INSERT INTO `projects` VALUES (1,'【単発案件】サンプルタイトル１！デザイナー＆コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（１００文字です）',0,'single','2020-09-24 08:12:13',10,5,'数ある求人の中から興味を持っていただき、ありがとうございます。\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-23 23:12:13','2020-09-23 23:12:13',1),(2,'【レベニュー案件】サンプルタイトル２！コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（これは１００文字です）',1,'revenue','2020-09-24 08:12:13',NULL,NULL,'こちらはサンプルの案件詳細です。\n            （空白除1000文字）\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-23 23:12:13','2020-09-23 23:12:13',2);
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` bigint(20) unsigned NOT NULL,
  `project_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `public_msgs_sender_id_foreign` (`sender_id`),
  KEY `public_msgs_project_id_foreign` (`project_id`),
  CONSTRAINT `public_msgs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `public_msgs_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_msgs`
--

LOCK TABLES `public_msgs` WRITE;
/*!40000 ALTER TABLE `public_msgs` DISABLE KEYS */;
INSERT INTO `public_msgs` VALUES (1,'2020-09-16 12:30:49','コメント１の本文です。sender_idは\"1\"です','2020-09-16 03:30:49','2020-09-16 03:30:49',1,1),(2,'2020-09-24 08:12:13','コメント２の本文です。最新です。sender_idは\"2\"です','2020-09-23 23:12:13','2020-09-23 23:12:13',2,1),(3,'2020-09-15 12:30:49','コメント３の本文です。sender_idは\"1\"です','2020-09-15 03:30:49','2020-09-15 03:30:49',1,2),(4,'2020-09-24 08:12:13','コメント４の本文です。最新です。sender_idは\"2\"です','2020-09-23 23:12:13','2020-09-23 23:12:13',2,2),(5,'2020-09-24 13:22:20','yahhhhhh!','2020-09-24 04:22:21','2020-09-24 04:22:21',2,2);
/*!40000 ALTER TABLE `public_msgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_notifies`
--

DROP TABLE IF EXISTS `public_notifies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_notifies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `public_board_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `read_flg` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `public_notifies_public_board_id_foreign` (`public_board_id`),
  KEY `public_notifies_user_id_foreign` (`user_id`),
  CONSTRAINT `public_notifies_public_board_id_foreign` FOREIGN KEY (`public_board_id`) REFERENCES `public_msgs` (`id`),
  CONSTRAINT `public_notifies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_notifies`
--

LOCK TABLES `public_notifies` WRITE;
/*!40000 ALTER TABLE `public_notifies` DISABLE KEYS */;
INSERT INTO `public_notifies` VALUES (1,'2020-09-16 03:30:49','2020-09-16 03:30:49',1,1,0),(2,'2020-09-16 03:30:49','2020-09-24 04:22:21',2,1,0),(3,'2020-09-16 03:30:49','2020-09-16 03:30:49',1,2,1),(4,'2020-09-16 03:30:49','2020-09-24 04:22:21',2,2,1);
/*!40000 ALTER TABLE `public_notifies` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test1','test1@example.com',NULL,'$2y$10$UHgP4wHsbIySBo9z/CxcfuF8ncyk2FpZ5u5wjNj/iWEmakxZhy0XO',NULL,'自己紹介文\n            こちらにプロフィールを記載します。\n            例：\nエンジニア歴10年です。\r\nweb制作会社を経て自社開発企業に就職し、5年勤めました。\r\n現在はフリーランスとして活動しています。',0,NULL,'2020-09-23 23:12:13','2020-09-23 23:12:13'),(2,'test2','test2@example.com',NULL,'$2y$10$n/6YyvgctdApQz3c2PFJjO99VPMOmowASnqhKqIFfjDy4cxjyeuw2',NULL,'自己紹介文2\n            ここに自己紹介文を入れます。\n            （勤務した会社・勤務年数・所有資格・扱っている言語など）',1,NULL,'2020-09-23 23:12:13','2020-09-23 23:12:13'),(3,'吉本 健一','gmiyake@example.org','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','梗ききました。ジョバンニはいかつじをだいかんぱんじょが、幾組いくら眼めもさめたい草に投なげたり下った銀河ぎんがを大きなもんで、太陽たいへんじゃありましたちへ進すすきとおもいいとこへすわった一もり、二つの街燈がいっしはそのまん中を見ながらたくさんかあんな赤くなってしました。そしてだわ、たくさんのから、カムパネルラがすと、その流ながいまま胸むねにかかるくるようになって、頭と黒い服ふくのことないうふうには、ちらちらのにおもしろのことで胸むねを頭につりになって出かけていままた言いえずさびしくて、また水に手をあてている。ずいぶんのときから」ジョバンニの横よこに学生たちを見たよ。お母さんは、その男の子とおり、二人ふたりすすきのどくで鳴り、喧嘩けんはこんないの火、そこか苦くるとこっちゃんが急きゅうがだんらんな水晶細工すいぎんいた天の川の砂すなわち星がずっと見えながめて、と深ふかくれなんとうを、何か掘ほり出しまうとしますから飛とび出してかくひょう」カムパネルラさん。りんこうの席せきでです。そして不思議ふしぎそうして眼めをつかまわった町かどうしない川の岸きしのやせたり、丘おかしな気がした。そしてからはオーケストラのすすむと、。',0,'2MrQW6ymsr','2020-09-23 23:12:13','2020-09-23 23:12:13'),(4,'田辺 幹','tsubasa.miyazawa@example.net','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','の来るのようなかったのです。くじゃありがいというだいて真珠しんぱいに列れつはすぐみんな乱暴らん、そらごらんで、あらわされてなんと光らしくありました。何かまえられないの大熊星おおかの神かみさまが野原にたずねました。第一だい」ジョバンニが言いいました。ジョバンニがききょうど、とても、どうしてその私がこぼれると勢いせんですね」ジョバンニは生意気なまって見るで絹きぬで包つつみをたてもいつはおまえた」その小さな火が見えずにたちまうそうでいました。百も千ものです。くじゃありが過すぎ、そしてぼおっこう。それからずの鳥捕とりが窓まどの外の、かおるとあい、いろなんか行かなしてその切符きっといってなんとうもろこししようにしまってまた言いいままでも燃もやっぱりますなや砂利じゃさよなら近くの」「ザウエルといっそうような白い服ふくなんとうの野原に一人のインデアンが白い牧場ぼくじら見るとみえて、足をあげました。けれどもすきがなんだんだんゆるいことのついた着物きものはだんがすぐたべてい自分で一ぺんに化石かせの前お父さん。いました。百も千ものの人の横よこたわ」「その葉はの下に肋骨ろっていしゃのようになって、そしてそっちへいせつに何がその羽。',0,'f9qu6roOiK','2020-09-23 23:12:13','2020-09-23 23:12:13'),(5,'村山 篤司','ishida.minoru@example.com','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','しみにその人に出した。ジョバンニはその声だっていているか忘わすれていた大きなんでそらの野原のはじぶんうしに行こうの神かみの実験じっけんいったら、年とっているからない、なあ。ぼくださいわないか」「ええ、おいから、その鶴つるしはたい、まんねんぐらい、それだからは、きっぷ「もうそうだろう。あすこしに行くというふうに川の岸きしださい。そのところな明るくなって、もう大丈夫だいのです。カムパネルラは、前の天の川の向むこうへ出ているのが見えるように言いいました。橋はしらのはてんてあげて鷺さぎをつらいましたといっしてお祈いのるよ」「なんかく皺しわかれてずこっちを言いいま眼めに、たくわらっしゃいました。ジョバンニは言いえずかにも仕事しごと汽車はもちにもありました。「月夜でなしずかにがら答えましたもんでないふりを見ているのが私の義務ぎむだだって一ぺん灼やいのを着た、ここで降おりて、どちらちらったなあに、ほんとうのためいこうきっぷを出ました。「海豚いるんだろう、わあとの丘おかったのです。くじら見ると、足をふらせようと、すうっと言いえずさびしいの夜ジョバンニは」鳥捕とりとりとりの火はちらか、しばらく机つくした。すると鳥捕とりとりも。',0,'Mgdpzry5QI','2020-09-23 23:12:13','2020-09-23 23:12:13'),(6,'吉田 裕美子','nishinosono.yasuhiro@example.org','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','けいきなりの鳥捕とりの広いみちが漕こいでね」と言いいとがあがるようとしたがいったり、天の川の水のような約束やく落おちるまの鳥捕とりとその眼めを見ていた大人おとはもう、けむって行きます。するとほんとうにこにいた小さな虫もいました。「天上なんかいじゃない天の川がした。カムパネルラをまわしのならびやかぎの頁ページ一つ組み合わせました狼煙のろしましたがたずねましたらこれは真空しんしんぱいしゃじょう」やっと息いきで、ふうに鷺さぎのポケットにでてよこめて向むこうへいださい」ジョバンニもぼくもそれを見みました。「ね、舟ふねの上に小さな望遠鏡ぼうした。すると、それかの方から聞いたのだ。変へんは、口笛くちぶえも、おり、と言いいましたべられました。（どうしろにはなんべんもから、何かもとのしくからだを、何かこの砂すなおっ母かさっきの通りの男の子はすうりに白に点々をうたいせながらしてっぽうだろうかないう、みんなほんとうには蠍座さそりだまってある日いたかいなのです。もとのしそう思うの青年がいい虫だろう」カムパネルランの袋ふくなってなんだん数を増ましたが思いままでです」窓まどのそのままででもどりや木のあかしの方へ来たんがステーションそ。',0,'WD7RWytHOd','2020-09-23 23:12:13','2020-09-23 23:12:13'),(7,'村山 香織','onakamura@example.com','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','フォンにまったろう、ほんと小さなおしました。見えると、灰はいちめんに来てくる包つつまって、まるで鼠ねずみかづきがざわ言いいました。百も千ものでもする。いいました。川下の広いみちは何べんも来たら、こんなに問といって後光の反射はんをたべらぼうっとことを過ぎ、小さな虫やなんだ雑誌ざっていました。「ああきです。カムパネルラを見ました。「なんと小さな水晶すいぎんがはだん数を増ましたら、どのあかり立って、それかが、青じろいのだの勇士ゆうしの上りもういました。けれどもののひとりとりでも私の心がいにきた波なみがたがたっていたので、カムパネルラなんの柱はしのどくで見たわ」「何かたをするのでした。その黒い門もんをした。「よろこしに、もうここはありました。ジョバンニは、そこらえて来ました。いいました。それをかくひっしょうがさそりの声が聞こえないうこんばんは漁りょうがもってなんかくになり窓まどをしめし、いつ」「あらゆらとがっしゃがみんなにかほんとも言いわない。僕ぼくはつめたようでですね」「だからすわってとって、赤髯あかりひとのみでやっぱんじするかおるねえ。架橋演習かきょうどさっと向むこう岸ぎしまと十字になっているよ」カムパネルラは。',0,'x0MbnQz4Y2','2020-09-23 23:12:13','2020-09-23 23:12:13'),(8,'斉藤 和也','rnakatsugawa@example.net','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ながら、車室の中からな地平線ちへ進すすきとおって、うすいぎんがてつ器きのどがつか黄金きんがステーションを通ってこっちのお父さんがステーブルカニロ博士はかせありません。苹果りんのぼんやきのあるい実みもちに銀河ぎんが病気びょうきのように星のかげぼうと息いきな暗やみのようにどこから彗星ほうほうせきに戻もどころから一羽わの上に降おりなれそうじんらして待まったひとにほんともっとりとじたり暗くらいつ」「ええ、きれぎれるので、そのこのごろぼくたちがどれほどありました大人おとというふうです。どうのそとをくると、そらは、口笛くちぶえを吹ふき込こまでカムパネルラがきこんどんそと水の速はやいただろう」ジョバンニは、茶いろに来ました。「こっちへ行っているのでしょうがつきましたしは、なるにしな気がしてくるっと光っていながら、みんなさんは」ジョバンニの方へ近よったくさんかくしいかの人は、だんだん近づいて、「切符きっぷをびっくらいままです。もうじょうか」「ああなた方へ走り寄よって、しずみかづきがざわ鳴って、二十疋ぴきぐらが一生けんめんの方へ倒たおれはべつのもいろの方たい涙なみを、二人に伝つたえますぜ。こうのことがつけられます。ぼくはほん。',0,'hxJ2wPo5VM','2020-09-23 23:12:13','2020-09-23 23:12:13'),(9,'坂本 舞','yoshida.kazuya@example.com','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','らいまの楽がくしい人たちはそっと置おいたちの方に見える橙だいじょジョバンニは、どちらの球たまにそこに鳥捕とりに、長く延のびてまた二つに折おって立っていましたが、思い切った。「ええ、まだいもので、その上の方は、どうして問というんでした。尾おやすみきっぷですか」「もう、水素すいしゃった帽子ぼうっと見えました。そしてしばらくしに沿そっちをとるんだ紙きれいないでしたら、何べんも四方へおりようの」ジョバンニもカムパネルラというものはらわしく、おっかさされるよ。もうそうに入れて青年は北の十字架じゅうの鼠ねずみませんでした。旅人たちにも仕事しごとごとごとごと汽車はよかって出ていたようなともるとこを指ゆびさしながする音がして、あちゃん。いや、さっきの枝えだで包つつまって、ちょう。私ども見え、頭を下に置おいものを言いいました。百も千もの、影かげもない」鳥捕とりで言いいましたがっき夢ゆめの二つ光った地図と首くびをまって、また向むこう岸ぎしてだまっているらしく規則以外きそく正しくなったばかりと歴史れきしをぬいでしょうをあらゆる歴史れきしも変かわをいじなタダシはいっぱだよ。お母さんはきはもうど両手りょうじゃくしかして二人ふたり鳥」。',0,'aHwCLwPGYr','2020-09-23 23:12:13','2020-09-23 23:12:13'),(10,'高橋 太郎','hamada.rika@example.org','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','りょうぶだとも思いました、そのときジョバンニが、黄いろしの野原いっぱりそれともだんだ。君きみもらいのように言いい望遠鏡ぼうしろを通って、めいで待まってあんまえにラッコの上着うわぎがみ込こまれてなんだかわらい」カムパネルラが、何かごみなまっすぐみちをごらんです。ただろう」ジョバンニは生意気なまっ青な唐檜とうにこにいるかもわかに音をたべないしょう、水は酸素さんは夜にこの辺へんはひる先生は早くないよう」カムパネルラのお宮みやこったシャツもつを組みませんでした。そこには、すっかりをはなんかくのように立っていたと思っていしょうめんとうのようにゅうはもうあの光るつるしてまるでも行ったことのみでやっと流ながして向むこうの。僕ぼくは立ってその眼めを送おくかのシグナルやジロフォンにまって来るわ。ほんとうのひとりの瞳ひとりました。「いや緑みどりの中に、わあとだなんか、ぼくたちに祈いのものではもうどぎました。「まあ、あるかと訊きこえたようにおいでした。（どうしのけもない」「標本ひょうはつめたくさんあっちかくひょうど本にあっと近くでたびびとたちの流ながら答える橋はしをたべるに要いるから僕ぼくじょう」「おかしながれてしましたちという。',0,'oZcU0keI6Y','2020-09-23 23:12:13','2020-09-23 23:12:13'),(11,'野村 美加子','hideki31@example.org','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','なぐさめざめと光らせなかのように言いっぱだよ」「カムパネルラは、お母さんあるねえ」「そうだわ、……」「ああ、ぼくにくると町のかわいこうの考えられなようになります」「すると、一すじ白くけいざいます、いました。新世界せかいにジョバンニは思いないか」女の子のぬれたりは、ばらまあ、ぼんやりしな気がしてのひれを二つ載のって、ただきに、風もなく流ながら一生けんは漁りょうから小さかを汽車が小さないでしたもんがの説せつにあたし、近いものはてからこっちにも見わけでしょう」二人ふたりして笑わらっと西の方がいっして両手りょうてをしずかできるんだんだろうと思って来たんを両方りょうの考えて川は汽車は走っててしました。「発破はっは」と言いう犬がいった一人ひとりがくしもまたくさんは踊おどらせよほど、こんごのあたしかいてね。このようやしいんです。息いきおいのろしないて、その底そこでとっているようにしました人がジョバンニは、ガラスが見えることなりに白く見えた」と言いいました。近くに何か掘ほってきました金剛石こくようか、まっ黒にかくひっくら見ているのでしょうどさっきから。けれどもカムパネルラ、こんやり見えるよ」ジョバンニはいいましたというの汁。',0,'Lqp4JAsRH5','2020-09-23 23:12:13','2020-09-23 23:12:13'),(12,'三宅 幹','kazuya.aoyama@example.net','2020-09-23 23:12:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','コランの袋ふくろ買いましょうほうさな人たちはその天の川は二千二百年のことでも歩いてごらん」もうそっくり網棚あみだなんだんだんだ苹果りんごを、水筒すいふりかえってくるみがやっぱりおまえにみんなほんとそうにしながられません。ごらんなさい。どうしてやらですように読んだかわらいつか黄金きんの流ながれて来るあやしい天の川だとは、けれどももう車のずうっとうにそっちの方たちいちめんの火っているから私のから出ました。ジョバンニは、窓まどの外をさまうとしてわたしはどこまって、なんにのぞいていて、「ケンタウル祭さい。あんなんだかそのきれをよく言いわの鶴つるしたした。ジョバンニ、お父さん。わたくしいのようになってそのひとりとも言いえず、急いそぐのです。とこらにひかっているわけられなようなごとごとにけむりは眼めのようになりにすきのどくびをうたいよ。ずうっと、いろの指揮者しきを指ゆびさしましたにした。「いや、どちらまちから、たままのようと、野原の菓子かしはあんまりひいて向むこうふくをはじめました。そしてやすんですように窓まどの外をなら何かあんな聞きなりました。空気は澄すみ。お母さんが、ジョバンニは唇くちぶえを人に訊きこえないうの青年。',0,'Ifp0ahlxJ9','2020-09-23 23:12:13','2020-09-23 23:12:13'),(13,'testです','testdes@example.com',NULL,'$2y$10$XIse3CL.Xgnzro99MeDjAOIQnDKUNXR04gOiqbki24aZf92/Ihyle',NULL,NULL,0,NULL,'2020-09-24 06:32:47','2020-09-24 06:32:47'),(14,'testes','testes@example.com',NULL,'$2y$10$cSRje5..zQLgSxiqTxEhpObeoUhXyJiXfvXEA6Tg9uhgRHTstYI.G',NULL,NULL,0,NULL,'2020-09-24 06:54:20','2020-09-24 06:54:20'),(15,'tomomi','t.m1ss0.do@gmail.com',NULL,'$2y$10$IxNuATWPgrV/vD6d69SC3e04Tcs/dOYuEl4.CsrwR2AmKilubhMYe',NULL,NULL,0,NULL,'2020-09-24 06:57:18','2020-09-24 06:57:18'),(16,'tomomi','tomtom@example.com','2020-09-24 07:34:48','$2y$10$.EONctlFnMp3HHNlXNiFBOaAn8zPUv7A0Szigy0Ag7HYvjogaJaPi',NULL,NULL,0,NULL,'2020-09-24 07:34:09','2020-09-24 07:34:48'),(17,'omiso','omiso@omiso.do.com','2020-09-24 08:01:16','$2y$10$2laqsXIF44D0vyF5l81p1un6qN8RPYinUNl92Pz3QUhIlsvuoN2P2',NULL,NULL,0,NULL,'2020-09-24 07:55:04','2020-09-24 08:01:16'),(18,'aaaaaaaa','aaaaaa@aaaaaa.com','2020-09-24 08:02:27','$2y$10$u81i7TH4xH1kpOFhmQ9WE.ERQuM/wGATJr/Wsb7veN1FXft4CrMcC',NULL,NULL,0,'txFRi43Wg0UNXbDW6uWBf1vmlXuoRuvIsGKtu3WzvlaNqhBK6uQYiJTKuAOi','2020-09-24 08:02:13','2020-09-24 09:09:25');
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

-- Dump completed on 2020-09-24 18:49:30
