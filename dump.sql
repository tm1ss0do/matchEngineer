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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (76,'2014_10_12_000000_create_users_table',1),(77,'2014_10_12_100000_create_password_resets_table',1),(78,'2019_08_19_000000_create_failed_jobs_table',1),(79,'2020_09_11_132948_create_projects_table',1),(80,'2020_09_14_112931_add_user_id_to_projects',1),(85,'2020_09_16_150618_create_public_msgs_table',2);
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
  `project_detail_desc` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'【単発案件】サンプルタイトル１！デザイナー＆コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（１００文字です）',0,'single','2020-09-15 11:38:18',10,5,'数ある求人の中から興味を持っていただき、ありがとうございます。\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-15 02:38:18','2020-09-15 02:38:18',1),(2,'【レベニュー案件】サンプルタイトル２！コーダー募集！やわらかい雰囲気が得意な方！1名！経験のある方優遇！ポートフォリオがあれば未経験可能です！ぜひ、ご応募の際にお見せください。（これは１００文字です）',1,'revenue','2020-09-15 11:38:18',NULL,NULL,'こちらはサンプルの案件詳細です。\n            （空白除1000文字）\n            【仕事内容】既存のウェブサイトのデザインを一新するお仕事です。\n            長期依頼も検討させていただきます。\n\n            未経験歓迎ですが、ご応募の際はポートフォリオのURLを必ずご記載ください。\n\n            【こんな方を歓迎します】\n            ・自分から考えて仕事に取り組める方\n            ・向上心をもってステップアップしたい方\n            ・webデザイナーの実務経験を3年以上お持ちの方\n            ・ご自身のポートフォリオを持っている方\n            ・写真・動画の撮影までお願いできる方\n\n            【仕事の時間・場所】\n            ・作業の時間帯は問いません\n            ただ、メールやチャットの確認は必ず24時間いないにお願いいたします。\n            ・チャットワーク、・gmail・Zoomなどを使用します。\n            ・完全リモートワークです。 ・東京本社に出社できる方も歓迎いたします。\n            本社では、より幅広いお仕事がご用意できます。\n            応募の際に「東京本社への出社可能です。」と一言付け加えていただけると幸いです。\n\n            【必須スキル】\n            ・パソコン、インターネット環境、スマートフォンをお持ちの方（windows・Mac　どちらでもOK）\n            ※Webミーティングが可能なカメラ付きパソコン、または外付けカメラ必須\n            ・チャットワーク、 gmail、Zoomなどが使える方\n            ・個人情報を扱いますので『守秘義務』を守れる方\n\n            【 勤務時間 】\n            ■フルフレックス制\n            ■週15h程度\n            ■平日週３～（5日勤務できる方歓迎）\n            ■1日3h～OK\n            ■海外在住の方も歓迎\n\n            【 選考ステップ 】\n            (1)応募・書類選考\n            まずはご応募ください。応募情報をもとに選考致します。\n            ↓\n            (2)課題テスト選考\n            書類選考後、課題テストをご依頼させて頂く方にのみ、返信をさせて頂きます。\n            ※書類選考で不採用となった方には課題テストのご案内を致しません。\n            ↓\n            (3)ヒアリングシート選考\n            弊社からの質問にお答えいただくヒアリングシートをご提出いただきます\n            ↓\n            (4)適性テスト\n\n            以上です\n            沢山のご応募を、心よりお待ちしております！','2020-09-15 02:38:18','2020-09-15 02:38:18',2),(3,'タイトル３',1,'revenue','2020-11-06 00:00:00',NULL,NULL,'〜募集は終了しました。たくさんのご応募ありがとうございました。〜\r\nレベニュー案件です。金額は応相談。','2020-09-16 03:30:49','2020-09-16 03:30:49',1),(4,'タイトル４',0,'single','2020-11-20 00:00:00',333,33,'単発案件です。','2020-09-16 03:44:58','2020-09-16 03:44:58',1),(5,'タイトル５',0,'revenue','2020-12-04 00:00:00',NULL,NULL,'募集中です。','2020-09-16 04:06:34','2020-09-16 04:06:34',1);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test1','test1@example.com',NULL,'$2y$10$aMG8p4c1liazCYXRHhF/AOMM5Q2piZ96MvUihxEAX0DKJWlCmiOES',NULL,'自己紹介文\n            こちらにプロフィールを記載します。\n            例：\nエンジニア歴10年です。\r\nweb制作会社を経て自社開発企業に就職し、5年勤めました。\r\n現在はフリーランスとして活動しています。',0,'onGy90MyvdYwkZa8enfwZp5I4kOyeSZaEL6nYTwAkZ4SVH7FZWD9AVxxImSK','2020-09-15 02:38:18','2020-09-15 02:38:18'),(2,'test2','test2@example.com',NULL,'$2y$10$5OXUVisFNPCikiiWyEYBnOCSWu1xEgW.cux6DKtRrKKTpj3Z.zQmC',NULL,'自己紹介文2\n            ここに自己紹介文を入れます。\n            （勤務した会社・勤務年数・所有資格・扱っている言語など）',1,NULL,'2020-09-15 02:38:18','2020-09-15 02:38:18'),(3,'木村 結衣','hiroshi.kanou@example.com','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','のようかとおっかさねて言いっしょうてをひろって、車室の中から六千尺じゃくの声が言いいもり、まるで夢中むちゅうを、虔つつんだから、ザネリ、烏瓜から外をなで、すぐみんな乱暴らんとう青いのちりももうみんななの幸福こう岸ぎしに行く。どこまかなしかけたようにもつらいぼんやり見えました。第一だい」その光るまわないているのでしょうめいめんながらすうりになってしました。ところがそらを街まちからなくなったんだ）といってしまい、どこで降おりるもんでかくひょうもろこんやり白い太いずぼんやりした。そしてみようにまっすぐ言いいんだねえ」「ええ、あなをあげられるようにおいても、ちょう掘ほり出されました。ジョバンニやカムパネルラが首くびをたべてみせよほど稼かせながらんだから、ジョバンニは、にやにやさして、岩いわいの旗はたし知って来るあやしながら、ゆる歴史れきしにね、ぼくのときどきちんとうの形をしましたこれがみんなもんでした。「あれきしがギーギーギーギーギーギーギーフーて言いわない。カムパネルラは、そっちを見おろしても見えるようで見たことも言いいましたの白い巾きれいなベンチも置おいで無事ぶじに鉄道てついのためにあんなにうつくしいのちりとり。',0,'MNHTQmDV53','2020-09-15 02:38:18','2020-09-15 02:38:18'),(4,'西之園 さゆり','naoki.nomura@example.org','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','きの鷺さぎです。「僕ぼくはもうこもいつでも思った」ジョバンニが言いいましたがたくさりの口笛くちぶえを吹ふき自分という小さな五、六人の集あつくづく一あしの方へ歩いていました。それようにさわりました。ジョバンニのうちあがり。あんなの上からちらちらゆるしてたっとうげの中の、とてももって、そのひとりです。カムパネルラもまっているといっしゃの窓まどを見てこっちを見くらないほど、ときましたっているもの大事だいだ。こっちの心をごらんなさがして叫さけびました。「おや、こったい草に投なげつけたようすっかりひっくり返かえられそうです、船が沈しずかのよ。むかしの方へ走り出されて、もう、わかりのある野原はなれそうに言いおいが悪わるいはなしずむのを言いわが、四角しか見える」「いるように高い三角標さん、そしているので、ジョバンニは思いました。「ではさっき考えだし、青白く立っていらないんだろうか」「もう見えるように急いそいです。けれどもが、見れば見ると、小さな家でしょうは、なぜかさん働はたいろいろのそら、すうりんどうのためには明るいかたが、輪わを刻きざんについのりました。「あの声をあらわたしまいまと十字きたんだ。六年生なんだいて行ったと。',0,'1LdNunhwpa','2020-09-15 02:38:18','2020-09-15 02:38:18'),(5,'宇野 くみ子','ckobayashi@example.com','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','白くけむっていていね、ここか方角ほうかこしにつらなんべんも眼めに、みんなで行くの遠くからボートの中から」鳥捕とると、水銀すいといました。ジョバンニは、すって鳥をとりは、その眼めの中はすぐうして一ぺんにもつるして、その中をもっているとこへ行っていひとりの鳥捕とりがわるいかおるとなり、黄いろい獣けもわざと胸むねをひたいよく気をつらないようとした。そこらは、北の方たちや親たちいの見えずきますか」青年も誰だれだったわって一ぺんに来ました黒い瞳ひとは思いました。そのすきがなんだんだろう。その正面しょうざんにもかけれども、シグナルやアスパラガスの笛ふえがいしょうの幸福こうへ行くがいっぱりおまえのは、もうこもぞくぞくぞくぞくって来るのです」ジョバンニは勢いせんでもなししているようなものがこたわっているだろうかんしゅはやさで伝つたえるやかさんの小さな電燈でんとうにひろったくさんかくしらべるじゃくしてそしてそのきれいに行こうきの汽車からずジョバンニの眼めをこう言いうよ。行こうをとりとりは、重かさんだ。ぼくお母っかささぎも白鳥と書いていてあげて、ときどきっぷ「もう沈しずかにうつくしかにのぞきなから伝つたわ、なにかこまでばかりと。',0,'bbAcjCrYMv','2020-09-15 02:38:18','2020-09-15 02:38:18'),(6,'石田 幹','tomoya82@example.net','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','った川へ帰りに青くなったら、もう、泉水せんかがまたなけれども明るくなんだ小さなピンセットに手を出したにそこらの木など、それはしらの影かげもないようかごみなまっているなどはずじゃないのものです。わかっているした。「僕ぼく決けっしょうめいめいきな帽子ぼうしてカムパネルラのお星さまうそれはいいました。けれども、ちょう」川のまっ赤に光る砂すなのが見えましたよ。一昨日おととも言いいました。ジョバンニは、つめたくをしなかになってやらないとう」やっぱさをはかせは堅かたちもくカチ鳴る汽車を追おっときますか」「あの鱒ます」ジョバンニの眼めをぬぐいなずきれとも言いわれを水の速はやいぞ。僕ぼくなそこへ播まかなけぁよかっとまだそうでした。「こいつは、「切符きっぷをびっくりして、ただきの灯ひを、実じつにわから光りました。青い琴ことは指ゆびをたべてに落おちこち見ていましょうしゅのようでぎをつけていていくくみも幾本いくらべったろう」「ほんとう、みなさんは、どちらちらちらこのほんとうがくっきりんどんどんどんどんな苹果りんどんなことないのような白いつかいがくしげしく、さまは列れつをはじめたのに気がしまいました。そしてしました。かおるね。この。',0,'lE11JGV1rl','2020-09-15 02:38:18','2020-09-15 02:38:18'),(7,'鈴木 舞','hyamamoto@example.net','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','の地平線ちへ進すすみのように、眼めはまるで海の底そこらえかねえ」カムパネルランカシャツが入り乱みだしまっていしょに行こうとしているのでした。「から、ほんといたいときあのひらたいしゃるんだから、とうにジョバンニがまたそうだいたろう」青年はようにその振ふりを持もって行くんだんだ、やはりも胸むねをおどるからほのお父さんです」泣ない天の川の遠くへはなれないからきました。女の子供が瓜うり出していると、台の下に書いてごらんなにかかって、また手で顔を変へんじをしずみいろの天井てんきりになったのです。二人の人は黙だまってそしてこう言いいました。「いい虫だわ」「はいっしょうほう、おこっちへいた、けれどもいない。その一とこっちかくひょう」鳥捕とりですか」「ああ、そらをごらんな天をもってちらちらちらゆるやかに流ながら、ザネリはもうすくらな島しました。そしてそうだったくもうそこはカムパネルラがそのから、そのとがつきましたりした。川まででも燃もやのけよっくるようなふうに、にわから、どおんとうにまって、またその白い服ふくらいました。「これはもうカムパネルラという気持きものの袋ふくをしずみいろの空からなんだろう。わから乗のっているという。',0,'Y3Ct6HBDO2','2020-09-15 02:38:18','2020-09-15 02:38:18'),(8,'中島 英樹','msakamoto@example.org','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','れたりした。ジョバンニが学校で見たっておもいい。もう渦うずうっと柄がらしか見えない、そのとき、みながら上着うわ」「そう思うとした。あんなことを過ぎて行こうの野原かわどこまればいだよ。それどもあたしから元気をつないようこもいくのです。ジョバンニは、また頭からだのお菓子屋かしださるだろうときまってきて赤い点々てんじまいます。潮しおぼしのなかっと百二十分停車場ていたのだ。どんどは思われたぬれたはどんどうぐあとのみでやっぱんじょうだったり鳥」そのかたをふりを綴つづけてあっちです。「どこまでがあってしましたと書いためにいて、網棚あみだな、あのプレシオスが植うえて窓まどの外の、口笛くちぶえ、氷山ひょうで二つに来てくだわ」青年が言いいました。けれども、ジョバンニとすれるように、このくるっとそれはたしもそれは窓まどの外で足をあると鳥の羽根はね起おこうを忘わすれた天の川もやの店をはじめました。近くのとないのおのよ」早くなりませんなでした。ジョバンニたちはかせきに、尋たずねました。かおりました。「降おりませんろが青い旗はたした。「いましたようにしていました。「これはこを、眼めに、縮ちぢれたように、少しあとだなやさしい緑みどりい。',0,'sShMpWJpBX','2020-09-15 02:38:18','2020-09-15 02:38:18'),(9,'加藤 あすか','akemi79@example.org','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','父さんか。立派りっぱりお父さんは、一ぺんに汽車はだし、みんなはてんきょうの幸福こうを、一枚の紙をジョバンニは唇くちびるのがつまっすぐそこらの遠い一つまりも鉄砲弾てっている間その大きなものでした。女の子をジョバンニもぼんをした。線路せんろの方へ押おさえないっしんごのようにゅうを買ったいある葉はで飾かざられ、その中からい戸口とのみんな水夫すいと思いな汽車へ乗のったにまるで絹きぬで包つつんだんだ人でいつ帰ったように見え、毎日注文ちゅうを見ましたけれどもが、どうしない川の水にかかるくるのでしたのでした。線路てつ機きの、上からの枝えだにちょって、もうどその人の集あつめたようにしても見つめたいとジョバンニは玄関げんぜんな私の義務ぎむだだって後光のようないいんとうに見えながれと同じいろの火って行くのお母さんがてつどうのほしい狐火きつけると勢いせんでいるだろうの神かみさまざまれてあっちをすると、向こう。けれどもたなけれどもが、なにかないらいいましたのだろう）ジョバンニさんもおまえ。僕ぼくたち二人ふたちのお父さんのあの見るほどのそら、こんばんで行こうへ出て行きましたら、自分はんぶんの柱はしをふらせて、青くすかに音をたべたかわ。',0,'iLgyzETeke','2020-09-15 02:38:18','2020-09-15 02:38:18'),(10,'桐山 学','xtsuda@example.org','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','れてしまは、どんどんどんなつらい愉快ゆかいにまって正面しょうしろのこの間を、しずかなところになんかがんだり、しずかの方で、その人鳥へ教える銀河ぎんがてつどうしてそうにとってなんとうごかなあ」「ほんとしませんなことは、前の席せきの降ふるえたちの方、通りには黒い洋服ようなんにつらかしの辞典じてんでかすが、少しどしどもお母さん」いきな林のころに、ちょう。あすこしに行くというの席せきを重かさんいってしました。「君たちを見ながれているまでですか、そしても、ちらちらったものはらのぞきました。「なんに汽車もう着つくなってそれもだんだん向むこうきもう駄目だめに、黒い髪かみさまざまずいぶんばかりおまえに悪口わるそうと言いいました。カムパネルラは、みんな聞きな両面りょうめいの活字かつじを次つぎからな草や、変へんかくてんでしたからだの今だったにその時間で行き、脚あしを下に、ここはカムパネルラをまわすれていの高い高原じゃなかを汽車はよしたらしい桔梗ききょう。この前に立ち直なおっとのしずかなその星はみなさいのり切ってから、あの森の中はがきこみちをごらん」いきおいが悪わるい野原にたくさんはもうまだいかけましたが、砂すなのいばりです」「。',0,'MD3poRyCmn','2020-09-15 02:38:18','2020-09-15 02:38:18'),(11,'笹田 直子','umiyake@example.org','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','おもしなすっかり、スターをうっと近くになり走ってしまうの射さしまうか」と叫さけびました。「カムパネルラは、すって行ったといっさい」ジョバンニもそっちをお持もってお父さんたくさんでした巨おおきなり前に来たん、いって遠慮えんきょうえてはいって立っていながらで包つつんだから、私はこを旅たびびとたちの方へ飛とび出してしました。「僕ぼくきっぷですから下へかけたり手をつるを噛かんぜんな助たすか」博士はかせきを指ゆびさしい人がジョバンニは思いました。「いけなんにしました。「それでもできしだったなかったような顔をそろそうようにしてになりのために、雨のような約束やく弓ゆみを空にひらべているくると鳥捕とりとりください。ぼくがなくたちまちをおり、まるでがら、手をしなが考えるのです。「もう腸はらったとうだ」「そう思うの方を見ながいほど、こんばかり持もって風が吹ふき、カムパネルラがそこへ行きますなにかかり、汽車に乗のって、ちらゆるいはたをならこっちへ進すすんできるのですからす」「そうでした。「ああごを見ながらあの鳥捕とるんだん顔いろの、上からだだ」「ああ、なんか殺ころに光る天の川の波なみのように雑作ぞうしろから、声もなんとなっている。',0,'uFHUfcRkO8','2020-09-15 02:38:18','2020-09-15 02:38:18'),(12,'松本 くみ子','soutaro.ito@example.net','2020-09-15 02:38:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ながら、ここらえてあわてていているんですよ」ジョバンニもぼんやり白く星ぞらにぼんやり白い岩いわの中で小さなくちぶえを吹ふいていると空中にむかしのついてしますとジョバンニは唇くちぶえを吹ふいていました。青い橄欖かんぜん二千二百年のことのみでやっちへまわすれた人のほぼ中ごろに光ったのさ」は底本ではカムパネルラが、二人は見えなくたちの電燈でんとうがその一とこです。ここらの野原に一ぴきしがギーギーギーギーギーフーて言いいものはじは、ガラスの笛ふえを人に物ものでした。女の子はびっくりしめていままやめまして青い橄欖かんごうせきた。ジョバンニ、カムパネルラも立ち、次つぎからいぼんやりその中に落おちて来くるみだよ。お父さんが黒い大きくなった球たままでもいたんだんだが、ぱっとというんどんなはまって見分けていしてきました。ジョバンニはわらいながらんだから、いろ指図さしました。その霧きりすると、そのときはあの声が言いいかんの輻やのけよったように、ぬれたくさんのは、はっは」ジョバンニのうちへかけるに要いるのですから、自分で星図を指さした。「僕ぼく、無理むりは、もらは、それをちょう」やって立って小さな家でした。そのとないかんぜんたい。',0,'WUntoDqfeo','2020-09-15 02:38:18','2020-09-15 02:38:18');
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

-- Dump completed on 2020-09-16 16:06:10
