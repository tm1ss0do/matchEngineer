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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (46,'2014_10_12_000000_create_users_table',1),(47,'2014_10_12_100000_create_password_resets_table',1),(48,'2019_08_19_000000_create_failed_jobs_table',1);
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
INSERT INTO `users` VALUES (1,'test1','test1@example.com',NULL,'$2y$10$0Dw9kjX0EGPV/OHJYeSoV.E.oH3bv2172wM5JJ5Wm2762k2a7s/Xa',NULL,'自己紹介文',0,NULL,'2020-09-11 04:20:28','2020-09-11 04:20:28'),(2,'test2','test2@example.com',NULL,'$2y$10$vXtvrJyhcfx1r0WzwcO57elGrljL60.yPnQ63Bs.IPyRTRQwEy4Ka',NULL,'自己紹介文2',1,NULL,'2020-09-11 04:20:28','2020-09-11 04:20:28'),(3,'青田 千代','taro51@example.net','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','いがくをしばらく線路てつの地歴ちれつに来て、どうしをこす。車室の中から顔をそらが夜の軽便鉄道ぎんがだからすうなんとうすってみていました。「ああ、おかのかげもなくちぶえを吹ふき自分がありました黒い細長ほそいでね」その手帳てちらけていのでしたちや親たち二人ふたり、時々、やっと光ってからない天の川だっておいよ。行こうの一つ一つずつ重かさんがとうも空すいぎんが直なおっしょうはつめたいているよ。そのうしたのようにまるで熟じゅうまるくる。いや、まるでどきしさせて言いおいですか。立派りっぱいにまるいたしどもありましたらも見えるようだ。そした。そして言いっぱですか」「ええ、ボートへ乗のっけんでにいらっしゃの窓まどかったのでした大きなた方の雑貨店ざっと遠くの青い旗はたしな気がして島しました。ジョバンニも手を大きなまっすぐに答えるきれいな音が川下の銀河ぎんがの、まって棒ぼうの方たちはもう少しぼろぼく行きましたがたく河原かわらいのなかった水は、夜のそらのにお祭まつの欄干らん、お父さんの書斎しょうきなりますと、もうして読みなさいているとも言いえずきました。「もうその一列いちも降おりなさい」ジョバンニは、さっきのまったシャツが入り乱。',0,'3h8n46l1PW','2020-09-11 04:20:28','2020-09-11 04:20:28'),(4,'桐山 充','hirokawa.kazuya@example.org','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','た大きなど、とても、顔を出しているのです。農業のうちに、ぼくたって口をむいたとこの方へ倒たおれて睡ねむってしまいました。「天の川の水を、じぶんもお父さんは銀河ぎんがきこんなたく冷ひやかに浮うか」カムパネルラ、きれを二人の、ちらっしんじをしっかさあ」「あのはじめている、どうしもこっちをしずかになってしました。「どうして台所だいがよく言いう光をもって言いいまはもうずん沈しずかにうかなあかりした。そして私たちこち見ている。ければなら農業のうしはずもなかにがしてるはずれにたくなっていますとして問といっぱな人たちは参観さんはもった小さな豆いろのそと水素すいところがよく靴くつをはいっぱいに光った北極ほっき聞こえるのはてからぼんやり立ってした。それはしへ行って行くがなかって、もうまだ夕ごはんぶんの牛乳ぎゅうにぽかったよ。ぐあとは、ばらの林の中の旅人たちは何も言いっしょうのての海で、そうにびっくるとそれはまださい。こんなすっと向むけて、しばらくたちとわらっしゃばの前を通るといっぱい、そっちを見ると思ったのでした。その天上の方はどんどは、茶いろの霧きり第二時だい」あの図に見えるよ」「蠍さそりだのところな宝石ほうきゅうじきサウ。',0,'jAyUbY7iFr','2020-09-11 04:20:28','2020-09-11 04:20:28'),(5,'津田 香織','haruka.wakamatsu@example.net','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','からね、わらにいたジョバンニもカムパネルラが、幾組いくら眼めをみていると、すてきれいに深ふかんらしてごらんとうごきだ。わたしまいた天の川のまま楕円形だえんきの前の方へ向むこう岸ぎして気をつけて置おいで、ふしぎそうだめでした。「あなた方へ近よっておもいってかくひょうがつらかのろしはゆっくりしたした。町のかがまるでたびカムパネルラが、おっかり小さく小さいていていました。ジョバンニはにわかにして見えました。けどねえ、ぼくになるなられて、サファイアモンド会社で、黒い星座せいざの上にはなんかを一つ点ついていました。ジョバンニが窓まどの下に肋骨ろってるんでした狼煙のろした。「あれなく音も、どおまえはさっきのような青じろとの星祭ほしまいそいでね、立ってその星につか白い柱はしは、こんごをひろいろいろの方へ出して、ジョバンニは、ぼんやりの青じろいあるけると解とけい、まぶしそうとうちにもついてある。けれどもが立ったのだ。あっ、あるい野原のはだんだかあったりは、すすきとおった烏瓜からす」青年は男の子のぬれた街まちの電信でんとうちももって来るの間においおうとジョバンニはなしく振ふりました。ところがかから霧きりました。ジョバンニは、。',0,'pfjQcWzPUm','2020-09-11 04:20:28','2020-09-11 04:20:28'),(6,'江古田 春香','kyoshida@example.net','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','がやっと顔いろにはたを気に手をひたいだろう。このけもわから私のかどかまわりになっていねえ。ここで降おりて行くようと、そのひらけ、そこに行って来て、いくくみんなにし、街燈がいましたはがねを頭についているだろうじきサウザンクル、リチウムよりもそこらえてそれからすうっと弓ゆみの間からずジョバンニが町を通っているかおるといたのですよ。こんなのです。雁がんがあるね。どんながらんとも言いおりて行きました。けれども、てんてんきりんの柱はしの大きなりました。突然とついたんであるけやきらったりした。それが少しきのまっ黒にすこしか上着うわぎが来ました。「天の川の左の岸きしだねて立ってドアを飛とんでなんとうの花のに、すぐに進すすきとおりだして（ああほんとうの幸福こうへ行きました。ふりかかっと消きえ、まぶしそうよ。銀河ぎんか鯨くじゃくがはねおりてください。双子ふたごのおのよ。牛乳ぎゅうは、蛍ほたるわ」青年の腕うでに口笛くちぶえを吹ふいてくるというん。ぼく、あの遠いもの太陽たい箱はこち咲さい」「いい。いいました。「天の川の微光びこんどんないとが、何かだなんとうとうおじさんかくれない水にあてをひらたいへんてつ器きのびてまった一つずつ集。',0,'8si0ptyEFi','2020-09-11 04:20:28','2020-09-11 04:20:28'),(7,'廣川 美加子','ynakajima@example.net','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ッコの上を走っていました。それをかぶり、大きいんでした。「ジョバンニがおりて、どこで降おりのないよいような実みだを半分はんぶん泳およいようにぽかったように見えるだけでした。ジョバンニは、よし」と言いいました。それは、蛍ほたるわ、あすこししゃの前を通って、（ああ、おっしりいろの中には上から、ジョバンニに渡わたした。「からほのお父さんか、魚じゃくが、もひとりもそっちへ進すすんで男の子はいたりはこんな立派りっぱだよ」青年も立ちあげてに赤い腕木うでした。ところ、ジョバンニの眼めの鉄道ぎんがすぞ」とジョバンニの影かげの人は赤い腕木うでのときどきして子供が瓜うり出して、しきものの人たちの流ながらたいしょに苹果りんの前がさがしてまた夢ゆめをカムパネルラもいつでも僕ぼくたちは参観さんの柱はしらしい天の川の砂すなおにそうに、もういじょうてをあげていると、ジョバンニは川が、眼めをみて、さっとそれでもわかになっているとあのころから」二人は、にやに白く見えない。ではもう少し汽車だって、その神かみさまの前にして私たちど手に時計屋とけいきをした。「もうきぼしの方へじっとした。ただそうにしました。その林を越こえたたたから」カムパネルラが。',0,'25iAJGMiVO','2020-09-11 04:20:28','2020-09-11 04:20:28'),(8,'大垣 春香','nishinosono.kumiko@example.net','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ン屋やへ寄贈きぞうさないのですかしながら、「ザネリ、烏瓜からここだとジョバンニもそれと引き合わせてかくけいや緑みどりの眼めを避さけ、あるかしやだ。ザネリはもう駄目だめだ。見るだろう。みんなさい」「おまえるかね」そうだいようになって、すっかくすっかりたくさんは銀河ぎんがただの今だっていました。二人ふたごのにおいたの」ジョバンニの眼めがね、ほんとうに立って眼めをつな上着うわぎの肩かたちは参観さんに来たりをしました。「こっちを見ますと証拠しょうめんにもいつです。そしてごらん、ぼくらない。僕ぼくたのでしばらくはどうらして実験じって立って、おっているのですぜ。この人は、ジョバンニは、にやにやとわらっしゃるというだ、そんな私の義務ぎむだだって、赤髯あかしげったりラムプシェードをかすか」車掌しゃを見ているわ。けれどもだん高くそうときだしい女の子は、口笛くちぶえを吹ふいて行きました。黄いろあがり。あったろうか小さなくせわしく振ふりかがくしてやっぱりそう考えながらんなさいわいの角つの窓まどを、じきちっと口を結むすんです。私は大きくなって、あのセロのような帯おびにぶったよ」「そう、ときです」ジョバンニはもう、あちこち咲さいわよ。',0,'PQKFKyqI1G','2020-09-11 04:20:28','2020-09-11 04:20:28'),(9,'杉山 直子','soutaro91@example.net','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','カムパネルラというふうに言いいましたからないで、「ケンタウル祭さい、そのきれいに深ふかれてしまいたのよういろの火は音なく、みなまいました。する。ければなら、向こう岸ぎしの大きながめいに言いいろのこまでだってあるとほんとうすっかり、ひどいことはげしく行って、そしてジョバンニは思わずカムパネルラさんはまた点ついたんを二人ふたりは、また手で顔を引っ込こんばんは、黒いつるやかせの前を通りになって一つのはいました。「ああ、おおまたき、「切符きっとした。「どこまるい黒い丘おかのかたを高く星あかりが川の水面すい込こんばんは、みんなしに考える橙だいよく似にていました。「あながら通って船が沈しずむのです、ぼんやり立って、あるかと思いました。みんなことでなんとうの天の川のなかった測量旗そくりかかっぱいに行って見ていまのよ。みんなもの、鍵かぎを腰こしたら、私はこをこす。きっと胸むねいにわかり注文ちゅうくつなら何かいつも窓まどの外套がいに吹ふき込こめて見えないいちばんの方を見ていたのでした。するとそうだ。いや黄いおいだぞ」ジョバンニも全まってたようなごとごとごとごとごとごとごとごとごとごと、さっさんのぼんやりわかり光っていたのでし。',0,'52l6PGR3JF','2020-09-11 04:20:28','2020-09-11 04:20:28'),(10,'宇野 浩','maaya68@example.org','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','飛とび出して答えないで、だまっすぐたべてごらん、ぼくは立っていしいとうの花が咲さい。きっぷの中からすうなのですようになんでないう鳥の停車場ていました。「なんだり数えた、たくさんの書斎しょうめいめいことでも、さっきカムパネルラもいつかぼうしました。「ここらえているらしく立ちあがりました。あの河原かわらへ来た方を見ているなら近くで見たことを言いいえずに博士はかせありました。「あすこが、ほんという苹果りんどんどんどうかんでした。カムパネルラ、僕ぼくじょうどその大きな両面凸りょうか」「ああ、りんころに来ました。「じゃないでしたらいに切り取られましたというと息いきおいものですか」ジョバンニはその時向むこう岸ぎしの辞典じてんてきて、うつくりしているのですか」青年は一斉いったように思いなずまの牛乳屋ぎゅうが、なになりジョバンニがまるでひるがふくを求もとめているとまりは、あの光る粒つぶぐらいどがついので、ジョバンニは胸むねにあんなよろこんな私わたくさりを取とりの中にたずねました。たいこうかと考えのようになりました。「おまえがあい、どうしても考えつきまっくりです」にわらいある足跡あしを進すすけてあいさつの電燈でんと紅べには、。',0,'oY2D4xkJjR','2020-09-11 04:20:28','2020-09-11 04:20:28'),(11,'三宅 加奈','haruka.tanabe@example.org','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','のあるいはたしました。ジョバンニは」すすんです、ぼくはありましたことばかりあげてしまのようにぎらったときなり、いませんりょうどその小さな林や牧場ぼく※［＃「大きなど、その人たちはもう、なんだん早くなりませんかくむしゃしょうか」車掌しゃしょうきがざわざわ鳴って、それが投なげました。「ほんとして叫さけんでいっているのでしここはカムパネルラが少しひとは、思いながら、ただいた席せきに戻もどりども、もういじりなけむるように燃もえて来た）と思うとうちあがったのでした。ジョバンニは思われたのでした。そのときはまっての海で、見えない。どうしてみていました。「おかのちょうどさそりは、ひらったとこをはかせありました。誰だれがむずかにめぐりの腕うですわねえさんがはれから外を見なが、うつくしいんでした。「さあ、済すみません。あのひとの間原稿げんとしてのぞいてあんなことない。おまえに悪口わるい野原のはらか、それが少した。「ザウエルというふうでした」ごとごとがって出ていました。すると、その天気輪てんだもうあのプラタナスのようにかのような気がすっかりも水素すいしゃ〕と時間になっておいおうの。あったんだものの人馬がゆれた平ひらにいていると。',0,'W4eA1ztp43','2020-09-11 04:20:28','2020-09-11 04:20:28'),(12,'青山 春香','hiroshi.yoshimoto@example.org','2020-09-11 04:20:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','具どうか」いきな一冊さつのすきとおもてへ飛とびこんなぼんやり見える商売しょうがくしながら見ているのですか」車掌しゃばだねて言いいながれていました。汽車はしずかにまるくるという小さな家でした。それをたいへんながらもなくなっていくほんと硫黄いろ指図さしい波なみをたてるんです」青年がいとこをはかせわしましたがいいましていたのでした。「ぼくはもうすいぎんがの水面すいし十倍ばいもとの間、川下の広い河原かわらい）ジョバンニたちがそながら、ジョバンニは、ぼくはそのひばの広いみちが、くっきから」燈台守とうに赤と青い天の川は二つ光っていました黒い瞳ひとりは、すばらの枝えだには青いあるい輪わを刻きざんでした。隣となのでした。ジョバンニは眼めをふったように、指ゆびをかすかにカムパネルラが答えましたはがね、立って行くのお母さんはまるで熟じゅうでは、なあに、こうの方へ飛とびこうの坊ぼっちを見るとした。するにしてくだというんだ」「それはだんだ」「ああ、ぼくは知ってそれからか敷物しきのいちもなく、頬ほおを吹ふきますと、うつぶるのだ。みんなにせよほどいただろう。ね、ずいぶんいたので、その街燈がいさつしてこっちかけるのは橙だいいました。「僕。',0,'Xd8H5OWlYu','2020-09-11 04:20:28','2020-09-11 04:20:28');
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

-- Dump completed on 2020-09-11 13:25:08
