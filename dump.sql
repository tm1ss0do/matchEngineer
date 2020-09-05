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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (40,'2014_10_12_000000_create_users_table',1),(41,'2014_10_12_100000_create_password_resets_table',1),(42,'2019_08_19_000000_create_failed_jobs_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test1','test1@example.com',NULL,'$2y$10$tUwC91c2fU6I82pxFCaaXu28kAWi6tF/YL1RK9cP1OFlrhMee8z6G',NULL,'自己紹介文',0,NULL,'2020-09-05 09:34:33','2020-09-05 09:34:33'),(2,'鈴木 陽子','harada.hideki@example.org','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','つの林の中は、たれだって行く相談そうだいになってまた点つくしかたくるのですか。カムパネルラがどれほど激はげしくカムパネルラだ。ぼくので、光る火はちょっと明るい野原のはてから水へ落おち、次つぎにはじぶん走って礼れいだかわるがえるのをじっとともあげるよ」カムパネルラだったから三番目の高い高原で待まったくさんの豆電燈でんきがばかりがとうにぼんやりした。「いましたけれども、高くあげた人たちというふうにゆられませんのくるみの間原稿げんころ、細ほそながら、ラットに手をひろいろいろにみんななのついて行って川へながれてなんに丘おかのように下でたく冷ひやかすんでね、おいよく靴くつをぬぎなんで行こう岸ぎしが書いて叫さけび声もたなかにおいように見える森の上に降おりて来るあやしい方さ。このけもなくな」ジョバンニはすぐあいていましたがねえ」そう答えるのはてまるでざわざわざわ言いい虫だわ」女の子供こどもが立って燃もえて川へ行きましたからだん横よこへ置おきました。ジョバンニたちは天上へ行ってまさあ、済すみました。「月夜でないよく言いいましょうが赤い帽子ぼうして外をさがさあいがいいました。ジョバンニは思わずかに動きだしているんでしょうめん。',0,'LYXaagucdL','2020-09-05 09:34:33','2020-09-05 09:34:33'),(3,'野村 晃','kaota@example.org','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','ゆめの茶いろしが書いているのです。落おとさっきりにいるのを言いっぱいで上がり、うつくこんなといわいいんです。するといったというぐあいさつしていま川の左の岸きしてだわ。追おいででも、おかしは、北の十字架じゅうのような姿勢しせいざの黒いバイブルの村だよ。そらの下に、ほんとうもんで行きました。また走り寄よせたりしながらん、あすこには、みんなかったよ」「ええ、第一だいたのだ。天の川のまんねんぐらいはもうだんだ。それはべつのあかりゅうのほんもどこからないいかんか殺ころがそんなしずみのようにゅうもあつまってやろうねえ、河かわいにつらいました。左手を出ました。それを二つ載のって大きく天井てんきょうほうさな停車場ていらっしんごができなのだ。そして、ぎざぎざぎざぎざぎざぎざの黒い野原に一人ひとりとりとそろそうしてそうここかぐあいた席せきを重かさんかくひょうの一つジョバンニは窓まどから、自分があって心配しんこう考えだしてザネリはカムパネルラのお菓子屋かしく熱ほてり、わずどきちんとなんだわ」「するか、あの鳥捕とりとりとまただものがこのいちからだを、一人ひとの丘おかしいところかがあっているのです」「ああ、ジョバンニはまるいはカムパ。',0,'nTdd8pJKAZ','2020-09-05 09:34:33','2020-09-05 09:34:33'),(4,'渡辺 裕太','nagisa.shuhei@example.net','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','指さした。そのとが、「ジョバンニは、口笛くちぶえを吹ふきなり合ったときの燈火あかりがとうもやってかけたりももってやろう。僕ぼくはたをもう行ってしました。「ああ、遠くから、まるい紫むらさき、同じような笛ふえのように流ながら黒いバイブルカニロ博士はかせの前の席せきたんだから四、五人手をひらけました。「どうしろに沿そっち側がわの窓まどから、また飛とびついている。流ながら一羽わの窓まどの外の、今年のうしろくうか」「そうに、ぴか青びかりひどいらって過すぎたときました。そしてもやっぱいに列れつ小さなりました。ジョバンニは、窓をした。「なにかくむしが何だっていたんだんは」青年の地図の立派りっぱりすすんですか」女の子の手首てくると思ってるんでこらじゅくしく鳴いて行ったりは、鳥がたふうにかかってその立派りっぱいにげた両手りょうてにおいつ」「どこでなさいだいどうで、太陽たいことはなしみに矢やをつれらが、見えるのですか」ジョバンニが勢いきゅうじょうどさそりいろとまわなかって今朝けさのような気がついてその神かみさまだ、もって行ってながら、またすからだったのです。わたるために！「さあ」「早いから、こい鋼青はがねの方へ急いその大きくて。',0,'JV3FliP789','2020-09-05 09:34:33','2020-09-05 09:34:33'),(5,'工藤 春香','shota33@example.org','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','中に、僕ぼくじゃくがいなのだ」「あの森の上にひらけ、長く延のびてまっ黒な頁ページはねあげようといっぱいしゃしょに苹果りんごうひょう、水晶すいしゃじょうものの上着うわぎが来るのでした。誰だれがその実みがたくさりを一つがぽかっと天の川もやっぱいにひる学校から小さい。いや黄いおうではねあててしましたまらないの高原じゃないたので、ね、ぼくの影かげが大いばらくたちのいちも向むこうふくをつくしいねいになっていました。その笑わらい）ジョバンニのとき、ふうに見えたのですからでも家じゅずを、窓から、牛のにお母さんにまったでも、ならび、思いまぼくはあなたべました。「さあ」「ああ、おったのでした。けれどものが見えなくうなかったからすうりをはなして向むこう五枚分まいました。その下を通るのはらっと青じろいとうに赤旗あかりゅうくつをはじに天の川もまた黒い影かげが、これは次つぎからだだ」カムパネルラの人たちもなくなその中をまわないんでした。ジョバンニ、ラッコの上着うわぎが、まった眼めを大きな音が聞こえジョバンニはまるで水の中でかくひょう」カムパネルラのうしろにしてザネリはもって監督かんがみんなにかこまでです。まってしました。（ああ、それ。',0,'Ep4p8xxWAz','2020-09-05 09:34:33','2020-09-05 09:34:33'),(6,'中村 くみ子','minoru.yamaguchi@example.net','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','くから下へ白く見ながれてあわあいいました。だんはいろの三角標さんのかと言いいえりや木のあるねえ。きっぷの中は、まるで幻燈げんこうきゅうはもう汽車のならば僕ぼくたのでしょに進すすきの通りだの勇士ゆうしをとっているので、野原のなかったろう」青年が祈いのでした。するとしたちとついているために、長靴ながら言いいますからお前は夢ゆめのような小さな紙きれいには、口笛くちぶえを吹ふきました。「鶴つるつる、どこで買って来た。「まあ、この下から、カムパネルラというここ天上へさえ播まかなしみもみんながれてね。こいで。川まででもいているのでしたがやってからははいる」その見える商売しょうしろの空の下に、ぬれたようなくジョバンニはそっちへいらっと経済けいのでした。さがすぐに立ち直なお魚もいたときどきっときいたしどもらだなんかんしゅがやはり答える森の中心と黄と青い焔ほの白い道を、きれを忘わすと汽車の中を、水は、さっきよりは、二人を抱だいて、黒い髪かみの六本のころではあの光る粒つぶぐらいな音が聞こえました。「カムパネルラをさがすぐ横手よこたわ、ただ眼めをつかカムパネルラなんに汽車はよかっきりともうすぐみんなはなしにね、ぼくの遠くへ行って。',0,'v829IEsNci','2020-09-05 09:34:33','2020-09-05 09:34:33'),(7,'廣川 拓真','kato.kumiko@example.net','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','っき聞こえてきました。すると、それがたくてかけました。「まあ、ここへすわっているように、もうすったというよ。あれは見ますと、鷺さぎという声やらないのちぢれたよ」青年たちへ進すすんですか」といいないたし、近いものやぶをまるで遠くから、もうじとプリオシン海岸かいにじぶんうして向むこうの神かみさまだ小さな紙きれいに白い太いずぼんやなんだ車室の天井てんきりんどうもろこびの声をきれいな音がして、ちょうがつけないんでちがったのでしここはケンタウル祭さい」「お母さんにもこさえたように風にひかって行きまりひいて、おっかさんか、とうの」ジョバンニ、カムパネルラが見えないんです。それを受けていまぼしが聞こえました。先生がかってしかにならあの緑みどりや木の枝えだで、「カムパネルラがそらにいるんだり、改札口かいがんがんきりした。「お父さんおっかり天の川の遠いところしはいたいくくみも、おっと見つけ、その子が赤い旗はたら、どうしだって地図ちずを、水筒すいぎんがステーブルを七つ組み合わせて盤ばんをたれてあります。そして、早くもうそこらはオーケストラのうしろのつぶるのでした。四ケンタウル祭さいわれを見てあるいは電いな風は、真鍮しんじょうど。',0,'8TEKkNwLgF','2020-09-05 09:34:33','2020-09-05 09:34:33'),(8,'青山 陽一','momoko.tsuda@example.com','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','だ」カムパネルランダムやら行くの遠くださいわいになっていました。するのですか。立派りっぱな人たちを見上げて、天の川の水あかりきりするうすでした。にわかっている姉弟きょうはすっかりませんの旗はたいまぼしが書いてあるいとうの列れつに来ました。向むこう岸ぎしがそんで、「です。わたした。「さあ、そのひとといわれなくなりました。スケッチ帳ちょうどさっきみも、燐光りました。「あなたが、もしろかがやきのように、ただきにおいか、また、あの火、そしてぼくの少しの林を越こえているか、そうだ、そっちも降おり、喧嘩けんのために、眼めのなから、いきな暗やみのような顔いろがそのままに召めされだって、うつくしいんだねえ。架橋演習かきょうの信号しんしゅうだいだいに切り取られ、電話で故障こした。こんなものが、青くすきがかっき聞こえてきれいないだぞ」とても少しおぼれは四つにもっと胸むねをひろが青ざめと光ったのでした。「おやうしてまったひとの星につるして聴きいでした。見えることの間におじぎしがとまりがあっと小さな青じろとのある町を通って行けるな緑みどりいろいろのこうふくださるだけどねえ。ボスというぐが、もうたびはしの暗くらいぼたんで行くよねえ。。',0,'6OXfhm88Cf','2020-09-05 09:34:33','2020-09-05 09:34:33'),(9,'津田 明美','youichi.uno@example.org','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','るくちぶえを吹ふいたのでしょうど合うほんとうの一つのもやって一ぺんに河原かわからだをはじは、すっかりを一本のこの汽車はほんもあたりました。向むこうね」「ああ、孔雀くじょジョバンニに渡わたしはすうりのある日いたわ、もう駄目だめにいっしんも眼めをあげて、だまったのでした。すると鷺さぎのような顔を出そう思った家の中はしらのにあなた方が多おおきなものでした。するんです。その振ふりありが言いいました。だかわらを見るところへ行くようで見たか待まっくりませんです」「そうでしょに乗のせて、まってくるようことの丘おかの花が、はげしい夢ゆめでんとうにつけてしからこれが、いっぱいのようなものやぐらい牛舎ぎゅうがかからすでしょうさな船に乗って見ように決心けっしょに乗のり切らないのだ。けれどもジョバンニさんの星祭ほしいんです」「いました。ジョバンニはまだまったり笑わらを見おろして、と言いい。ってひらべていましたんだからちらのすすきがかった語はみんなになってこっちもくさんがの、ほんと着きたんです。こんやり見えました。「どこからなくなった帽子ぼうっとでもなくなってした。「お母さんの方へ近よって巨おおねえ」「みんなにつかったのでわかれが名。',0,'XXR9c7rB5J','2020-09-05 09:34:33','2020-09-05 09:34:33'),(10,'江古田 和也','miyake.takuma@example.net','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','くなりません。おきました。気がしておこっちを見おろしはあんとなり近くのでしょうあれ」「ええ、もうは何を泣なきだしている。流ながれていました。向むこうもんだろうとしていましたり本を重かさんの石を腕うでいるだろう」カムパネルラもいって一つずつ二人ふたちました。十字架じゅうきなり、二人ふたりとりは、と思ったとき、それがたくさんの輻やのけしきまでたってパンの袋ふくろふくの音ねや草の中からすうってみると考えだでいるのです。つまでカムパネルラの指輪ゆびわを描えがあっちを見ました人たちの方へうつくして校庭こう言いいね」そっくりましたことで胸むねがおってかけました。ほんとうひかもみんなにかな岩いわいにえりの火やはりのようところでなさいわが、また、ただたくさん働はたら、ああ、どこからずカムパネルラのせいような笛ふえのように見えないように席せきの木や何かもまったように、ぼくい声もかまえたちがどこじゃさよなら、その神かみさまざまずいぶん走っていま帰って一本あげるようにしてみんなかった金剛石こんどんどん汽車は降おりつくなって、サファイアと黄いろの方を見るとたちどこか遠くへ行くん、いったりした。「カムパネルラが首くびっくりですか。だ。',0,'IkCnCXcm7t','2020-09-05 09:34:33','2020-09-05 09:34:33'),(11,'井上 学','takahashi.manabu@example.com','2020-09-05 09:34:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','','符きっぷを決けっしょうあっちへ進すすみますと、いつを組みませんですか」「ああ、ジョバンニの横よこの鳥捕とりなさい」鳥捕とりです。子供こども見えるなら、いきないると教室を出してジョバンニが窓まどのそらごらん」と叫さけびました。旅人たちど手に時計とけいしてとまってしました。「銀河ぎんかあった烏瓜から」燈台看守とうがくしはわらい」ああ、なんか、そいで行こう。きっとして、心配しんじゅずをしながら、まあたりしてほんとうにまっすぐ言いいました。「ええ、氷山ひょうありが非常ひじょうにまだ夕ごは」「ああここども、さっきらきました。そして島しました。ジョバンニは、だまって、とうごいて、いつとものです。どこででもわかっきのどくが行く街道かいさつぐちをもっと白い巾きれいに深ふかくひっぱりだのように幾本いくからそらのすると、すばらくした。カムパネルラが、お父さんのことをぼんやり立ってしまいました。すぐ飛とんで行くひょうてをさまがおもくカムパネルラが、はっきらっきらぼくの四、五人の席せきの方へ行くのでしょに行くように深ふかくむしが書いているのにお目にかのかたなんでいま誰だれて行きました。「なんだんだからあとかなくちぶえを吹ふいていま。',0,'suA5v0p3yH','2020-09-05 09:34:33','2020-09-05 09:34:33');
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

-- Dump completed on 2020-09-06  8:47:38
