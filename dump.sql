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
INSERT INTO `direct_msgs` VALUES (1,'2020-09-16 12:30:49','既読です・・・test1のユーザーが出した募集に、test2ユーザーから、応募がきた体のコメントです。',1,'2020-09-20 10:36:26','2020-09-20 10:36:26',2,1),(2,'2020-09-20 19:36:26','未読です・・・test1のユーザーから返信です。',0,'2020-09-20 10:36:26','2020-09-20 10:36:26',1,1),(3,'2020-09-16 12:30:49','既読です・・・test2のユーザーが出した募集に、test1ユーザーから、応募がきた体のコメントです。',1,'2020-09-20 10:36:26','2020-09-20 10:36:26',1,2),(4,'2020-09-20 19:36:26','未読です・・・test2のユーザーから返信です。',0,'2020-09-20 10:36:26','2020-09-20 10:36:26',2,1),(5,'2020-09-20 19:36:26','未読です・・・案件なし。project_id=\"0\"。直接ダイレクトメッセをtest1->test2へ。',0,'2020-09-20 10:36:26','2020-09-20 10:36:26',1,3);
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
INSERT INTO `direct_msgs_boards` VALUES (1,'2020-09-20 10:36:26','2020-09-20 10:36:26',1,2,1),(2,'2020-09-20 10:36:26','2020-09-20 10:36:26',2,1,2),(3,'2020-09-20 10:36:26','2020-09-20 10:36:26',2,1,NULL),(4,'2020-09-20 10:36:26','2020-09-20 10:36:26',3,2,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (239,'2014_10_12_000000_create_users_table',1),(240,'2014_10_12_100000_create_password_resets_table',1),(241,'2019_08_19_000000_create_failed_jobs_table',1),(242,'2020_09_11_132948_create_projects_table',1),(243,'2020_09_14_112931_add_user_id_to_projects',1),(244,'2020_09_16_150618_create_public_msgs_table',1),(245,'2020_09_16_154108_add_sender_id_to_publicmsgs',1),(246,'2020_09_16_160928_add_project_id_to_public_msgs',1),(247,'2020_09_18_170317_create_direct_msgs_table',1),(248,'2020_09_18_171542_add_sender_id_to_direct_msgs',1),(249,'2020_09_18_173951_create_direct_msgs_boards_table',1),(250,'2020_09_18_174617_add_board_id_to_direct_msgs',1),(251,'2020_09_18_180328_add_recruiter_id_to_direct_msgs_boards',1),(252,'2020_09_18_180557_add_applicant_id_to_direct_msgs_boards',1),(253,'2020_09_18_180949_add_project_id_to_direct_msgs_boards',1),(254,'2020_09_20_102844_change_recruiter_id_to_reciever_id_on_direct_msgs_boards_table',1),(255,'2020_09_20_103252_change_applicant_id_to_sender_id_on_direct_msgs_boards_table',1);
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
INSERT INTO `projects` VALUES (1,'【単発案件】サンプルタイトル１！デザイナー＆コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（１００文字です）',0,'single','2020-09-20 19:36:26',10,5,'数ある求人の中から興味を持っていただき、ありがとうございます。\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-20 10:36:26','2020-09-20 10:36:26',1),(2,'【レベニュー案件】サンプルタイトル２！コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（これは１００文字です）',1,'revenue','2020-09-20 19:36:26',NULL,NULL,'こちらはサンプルの案件詳細です。\n            （空白除1000文字）\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-20 10:36:26','2020-09-20 10:36:26',2);
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
INSERT INTO `public_msgs` VALUES (1,'2020-09-16 12:30:49','コメント１の本文です。sender_idは\"2\"です',0,'2020-09-16 03:30:49','2020-09-16 03:30:49',1,1),(2,'2020-09-20 19:36:26','コメント２の本文です。最新です。sender_idは\"1\"です',0,'2020-09-20 10:36:26','2020-09-20 10:36:26',2,1),(3,'2020-09-15 12:30:49','コメント３の本文です。sender_idは\"1\"です',0,'2020-09-15 03:30:49','2020-09-15 03:30:49',1,2),(4,'2020-09-20 19:36:26','コメント４の本文です。最新です。sender_idは\"1\"です',0,'2020-09-20 10:36:26','2020-09-20 10:36:26',2,2);
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
INSERT INTO `users` VALUES (1,'test1','test1@example.com',NULL,'$2y$10$RnkQKCbZSjoH4cjJ9yayXu9xC733Tju9DHLRmSdSApj3cRDiYsH9u','J4l7gyrIoyNgLkLNEZEDYYVanwkwkPJ4CUrSxM6k.jpeg','テスト１の自己紹介文です。更新テスト。',0,'A3Ihqe7xVVU31tNfou1bJy6g3OElG3w6CIvooeUumN1N451R2NjqUyV1Rxp9','2020-09-20 10:36:25','2020-09-21 05:30:38'),(2,'test2','test2@example.com',NULL,'$2y$10$p6HRGxE7Bc/aXuizwV6JWOawPWDI/Zti6dQU.QkyCZZzOu97hTZYW',NULL,'自己紹介文2\n            ここに自己紹介文を入れます。\n            （勤務した会社・勤務年数・所有資格・扱っている言語など）',1,NULL,'2020-09-20 10:36:25','2020-09-20 10:36:25'),(3,'渡辺 修平','hanako60@example.org','2020-09-20 10:36:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','たにちが七、八人ぐらが、くるみ、倍ばいけないのちぢれたあしですから硫黄いろの電燈でんとしました。橋はしらえているのです、今日はそれは三本の針はりそれから橋はしらべったのです。ごらんな雁がんだから終おわり、そって行ったようにしずかに棲すんでしょに行っていると解ときはまるでもなくなっていました。「月夜だろう。どうか。じきでできました。ごらんとうこもいいまの川の水をわたりは高く星あかりやきら燃もえる実験じっとともだん早くもわざわざわ言いいちも窓まどに叫さけんをしっかりは熱ほてったのでした。ジョバンニさんとそうだ、孔雀くじょう」ところに集あつまってきました。「天上へのぼんやりしながら、も少し顔いろの空かに流ながらパン屋やへ寄よって、もう駄目だめでんとうをすてずうっとジョバンニたちに、あの水の流ながれて、また頭から見たように、車室の天の川の向むこうごいていました。白い柔やわらっとでなけぁいけない水にかくに十ばかり小さな家でした。思わず窓まどの人はもちがすると言いいました。その下を通ってよこめでした。「そうに星のような声が起おこうになって来ました桔梗ききょうきょうか」「ええ、ええ、どころがそうなかに水晶すいふりました。。',0,'XQp9JNTCdk','2020-09-20 10:36:26','2020-09-20 10:36:26'),(4,'吉本 裕美子','xkudo@example.net','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ざしまいに鑿のみでやっぱりそのいちばんめんの柱はしの野原へ遊あそびに来てください」男の子に答えません。くじょうもろこした。魚をとってそれにさわって、カムパネルラなんべんきりしました。「ぼく、近くでそらをごらんとうに川に沿そっちの方、通りだして二人を抱だいてまった腰掛こしださいわいなあかりました大きなともはいっしでぴょんぴょんぴょんぼうしゃたべられた女の子がこらは、青いある。おまえ。架橋演習かきょう」やっとかすが少しおみずが寄よって行きまりがきの通りにボートでまたすか」「いいろい獣けものが見える橙だいちめんにある声がして、それども、燐光りんどんどうしろの雁がんがの河原かわるいかもみんながら言いうこの下を、二人ふたり手をひろげて狂気きょうてを組んでした。「なんとうものが鳴って、すっと続つづけなんのうしてちょうの汁しるのが見えますから汽車はきの風にひるならある。ぼくがながれて、そして美うつぶすなのだとは、さっきな活版所かったろうの神さま。私はたをふいて、その女の子がいくのお星さま。私はこんで立ってみませんで言いいました金いろの雁がんでした。「鳥が飛とんですっかりふりかえってしばらく蛍ほたるでちが、南へとたちが見え。',0,'zaJKqPx3Ho','2020-09-20 10:36:26','2020-09-20 10:36:26'),(5,'鈴木 加奈','gsuzuki@example.org','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','たんがの岸きしかけたりは、たく河原かわらなくみも幾組いくつかまえ。きっぷ持もちがったわ。ちょうてで片かたち二人ふたごのに気がつらく、青じろい環わの雲で鋳いたろう。すると、もうなししよりはりの子が顔を出ましたら、どん汽車の中にたくらないんだかどかった男が立ってはもうすでした。それとも言いいねいったそうにわかりの上ではこんごだった、と叫さけんです。もう沈しずかのシグナルの足をのぞいて行きますというとしてたくさんは、また青い鋼はがら、ただきにもこって過すぎ、ジョバンニのときの蠍さそりいろにはなして燈台看守とうは来なかったんだん大きなまったら、車のひだをふるえました。その黒いつる、三つな上着うわぎのぼんやり立ってるんですか」「あ、僕ぼくたっぱな地層ちそうですか」ジョバンニはたいどこまっ黒になってその白い巾きれいに入れてなんだんだもののような声が、カムパネルラのうぎょうは紙をジョバンニはなれそうな青じろいろ議論ぎろんするとほんとうがら言いいましたのです。その黒い測候所そっちをごらんな集あつまりが、そのひとみんなのために、だんだ苹果りんごのある。さがして天の川もまっすぐみんなさいわいにうつくしくなるにつるした。尾おにこ。',0,'cXrBi395IT','2020-09-20 10:36:26','2020-09-20 10:36:26'),(6,'坂本 さゆり','shuhei42@example.net','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','まったよ。ぐあいさつしんぱいにきた。ジョバンニさんの向むこう言いおりるんでした。「ぼく、もうそうだいか、いましたが、青宝玉サファイアモンド会社で、だまっていてそっちです。けれどもその立派りっぱいは四辺形しへ行ってちょうぶがつらいです」ジョバンニが学校の門を出しまわないんでいるのですよ」「あれ」睡ねむって白くなり、まるで毎日教室へやの店をはじめました。カムパネルラが言いいました。その私がこうな、雑作ぞうさな鼠ねずみますかにまるで夢中むちゅうでした。二人ふたりした。「眼めをあけて銀河ぎんがをよっているようにこころへ行ったのです。車掌しゃったくそのまったのだ。だからちらちらちらちらと南から掘ほってしまいながれと考えてありました。「ああ、孔雀くじょうの鉄道てつどうしろのもやせたりの火だなかに爆発ばくはその人たちは神かみさまがほんとうにゅうがたくさん。苹果りんの柱はしらのお宮みやっぱな機関車きかんぜんなのだの勇士ゆうしろの方へ移うつくしひらきませんかく首くびをたれ、それは証明書しょうほうの世界せかいがくしいとうのために、お仕事しごと、そのとこなんのは、じっさい」青年も眼めを挙あげて、と言いいこらえてるんだ雑誌ざっとう。',0,'ZDeaprUAco','2020-09-20 10:36:26','2020-09-20 10:36:26'),(7,'松本 直子','tanaka.hanako@example.net','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','の白いすすんでした。ほんじょうざんに化石かせのうちあげてまって、前の席せきのどくだ）ジョバンニは力強ちかけたかってよこした。ジョバンニ、おったときにすかにうつくつをはなく、燈台守とうに席せきに、少しわかにカムパネルラ、僕ぼくたので、ジョバンニはまた窓まどの外を見ながら言いいました。思われた頭をふりかえっておじぎをつけ、長くぼんやりとまって風が吹ふいていて、かたありませんでしたちもくせわしそう思うとそれからもうじかいが悪わるそら、向むこう岸ぎしまうんで行こうとそう思いましたり、三時ころがその人はもうじかい芝草しばらくなかったいどてにあれが投なげたり、「みんなで、黒い細長ほそなわち星しかる器械きから黒い鳥の停車場ていました。「ジョバンニが、睡ねむそうに高くその中へやらをとりが、もう行ってそうとした黒いくまん中には上から僕ぼくをゆるやかなかで、それからだが、どおまえ。汽車やその白い銀河ぎんが、口笛くちぶえを吹ふきなりました。「そこらでした。そらぜんな苹果りんこう側がわるそらを見ました。ジョバンニは思いな野原のは、あたってながらんな赤くしてザネリはどこまででも見えなく細ほそながら、向むかしく立っておりて行きますと、。',0,'0UT2eL7Mbz','2020-09-20 10:36:26','2020-09-20 10:36:26'),(8,'井高 学','osamu.hirokawa@example.com','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','きていたのさい」「ああ、どんの輪転機りんの旗はたいしゃの前お父さん見えずかに席せきた。ジョバンニ、ラッコの上に小さな列車れっしょうかべの隅すみました。それがみんなに問というの、水にあてたくらいちばんをまるで花火を一袋ふくらいあるように、すきのようか野ぎくからはねあがったというように赤く見え、二つ載のっていました。「ぼくはもう見えるように思い切ったみじかができるのでした。その一列いちばんは、いくまぼくを飛とんでした。ジョバンニはばひとは、うつってこうてできます。みんな聞きおいよ。行こうけ取とったいどてにあるい紫むらさき、ふうでしょう掘ほっとは思わずかしそうらして、柱はしを下流かりを取とって風が遠くからやねの二つのちょうほうきがかかっと小さな水晶すいしゃしょうどその大きなまっすぐみんなへつくしいみちが軽かるくるとなかっとたちに銀河ぎんがたっと姉弟きょうがく待まっ黒になんだ小さな銀貨ぎんがだんだんひろいました。ジョバンニは、もう少しおずしいかんぱんじょうど合うほど稼かせながらカムパネルラのために、黒い川がほんとう。僕ぼくはほんとうはつめたような天の川が明るいのだ。川上へ行って行きませんかく息いきなけぁいけむりには。',0,'taofVgs87a','2020-09-20 10:36:26','2020-09-20 10:36:26'),(9,'山本 智也','kimura.mai@example.net','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','しいようにその振ふったりのような白い鳥がおもいったかっとありました。「これくらく棚たない天の川の水のなかにいるのです。お前さきいたのだろうか」「ザネリ、烏瓜から飛とぶような音ねや草の丘おかしださるとまった奇麗きれいながら、早くなって、まだひざの図の立派りっぱりだしました。するのを見ていましたというの向むこうの方へ歩いて通ってしました。それは次つぎから元気なくなって、とき出そう、しずかしました。ジョバンニは、つめたいへんじをだい。実験じっと顔いろの三角点さんかがくしいんとうとうのだ」どこでなく二つの林を越こえたりが窓まどは一列れつにちが見ていたのでしたけれどこまでだっておまえ、もうそれにしました。ジョバンニはどうの花が、どこまでもやって来て、だまっ黒にすきの波なみだが。船ふねが冷つめたかわる教室でも行くなり両手りょうに、まん中には川下の方へおり、そのとこへ行って言いいました。それを答えましたら、その歌は歌い出される鳥よりがいちど手にもつれてカムパネルラのお宮みやっぱな川、ね、紀元前きげんこうをした。ジョバンニは青い鋼はがねえ。汽車はしらべったろうか」ジョバンニが、ピカットに入れた頭から、ラッコの上を通り、白鳥。',0,'XSYiJfyuS5','2020-09-20 10:36:26','2020-09-20 10:36:26'),(10,'田辺 香織','naoko20@example.net','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','きの姉あねはわくなったらにわかにくれた平ひらで鷺さぎを、ああ、あすこしたときジョバンニはもう、凍こおったのです。「ハレルヤ」前から野茨のいるよ。あのね、ずいぶん泳およいよ。それはだいろには青く灼やいてみるように思いました。「厭いや森が、「ではきまりひかると、もう少した。ジョバンニは、まるでけむって行ってぼおってそして、鷺さぎのかたあしの先生の言いいました。「も少しどもが立って行くのでした。ジョバンニの隣とならんだか、とこへ持もっているんでいる脂油あぶらの木のようにそろそろえて、これをまわすれてきて学校に出ていした。汽車はだんうしだったような青じろいの前お父さんの前お父さんおってひろいろの指輪ゆびでそら」カムパネルラが出ていましたら、どうして、岩いわが、少し遠くのお星さましたらしく、燈台看守とうも、ゆられてあるから光りまえは化学かができないうふうにして誰だれもいって船が沈しずかない。もとからでこらじゅうやうやうしろく明るく燃もえてる汽車に乗って、もうこんなおしそう思うとう。あのセロのように答えました。それをうったとき、鳥が一つと角砂糖かくひょうはちょうを受けていますと、そのひびき、そして一ぺんに載のって行きま。',0,'j8tJsHTkwF','2020-09-20 10:36:26','2020-09-20 10:36:26'),(11,'小林 裕美子','yamagishi.asuka@example.org','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','眼めに、それにしました。するときだした。「ああ、あすこはぼくはいけない。天の川の微光びこんばん幸福こうのほのおしました。あすこの窓まどから、「よろして、向むこうの木や何か用かと口をむいたわ」「そうに言いいと思った」その地図をどこで降おりて遊あそびに来て、網棚あみだれから聞いて行ってそんなすっかささぎの肩かたくを求もとのためにいたっと消きえるときました。「まあたりとり、さっきらめき、男の子供こどもやせばできしに下でたまを信しんくださいているのだろうの窓まどの外の、大将たい草に投なげて鷺さぎはおぼれはだん大きなりの口笛くちぶえを吹ふいておいてまです。こんなの声だった一つの本のあの図にもしろに光っておりつくしい音がしました。「僕ぼくたべて行ってドアを飛とび出して、兵隊へいだいて見ているんですねえ」ジョバンニは思ってね……」「あらゆるひとみんな顔いろや、うつくなって行ける通行券つうごうせきのりんごのお父さんの青や橙だいじゃないるとしました。突然とつるつぶぐらいながら、セロのよう。どうもんをたべて行くの青いマグネシヤの花が、ほんというようにそれはボスといっぱりおまた叫さけびました。まっ青な唐檜とうが来るのです」ジョバ。',0,'yosWv2IZRZ','2020-09-20 10:36:26','2020-09-20 10:36:26'),(12,'大垣 加奈','yamagishi.atsushi@example.com','2020-09-20 10:36:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','そくやいて、少し顔いろの方で、硝子ガラスの鎖くさんとう」ジョバンニのときどきさまのまっ赤かにめぐりの尾おにこにはもって、浮うか」「ああながれるのです。ごらんとしように窓まどの外を指さしまってわたし、私たちしっかりました。「ありましたものですか」とジョバンニは唇くちびるを噛かんです。つりに行く方がいきのように思いながくと同じ組の七、八人ぐらいま誰だれもほんとうに殻から」あの河原かわまですから、いました。そしてもかまわりに行くとちゅうに言いいましたが、ジョバンニまでがあっちを開いても気持きも切れが早くもうずん沈しずむのでもすると、うその考えとを言いっしょに行くなり、ひげの人はわたしどうの柵さく赤く光るまん中に立って見るというちにも四方になってくるよ」「だけどこっちを、それが惜おし葉ばにとなり合っているのです。どうしもまっすぐにすこがした、あっちを見あげて鷺さぎは、さっきから一羽わの中の窓まどの外をさしましたかいじなタダシはいったよ。銀河ぎんかしていまことを考えのある足跡あしをかけるように叫さけびました。誰だれがまた地図をどこまで言いって来ていたものが見えない」「鷺さぎを、窓まどから外を見ました。赤ひげの人たちの。',0,'zfaeBEvN0j','2020-09-20 10:36:26','2020-09-20 10:36:26');
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

-- Dump completed on 2020-09-21 14:54:17
