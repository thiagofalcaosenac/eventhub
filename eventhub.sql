-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: eventhub
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `classificacao` int(255) NOT NULL,
  `comentario` longtext NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `id_espaco` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espacos`
--

DROP TABLE IF EXISTS `espacos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espacos` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `capacidade` int(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `preco` double NOT NULL,
  `comodidades` int(255) NOT NULL,
  `avaliacaoMedia` float NOT NULL,
  `foto` longblob NOT NULL,
  `nome_imagem` varchar(255) NOT NULL,
  `tamanho_imagem` varchar(255) NOT NULL,
  `tipo_imagem` varchar(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacos`
--

LOCK TABLES `espacos` WRITE;
/*!40000 ALTER TABLE `espacos` DISABLE KEYS */;
INSERT INTO `espacos` VALUES (2,'Embraco','Embraco',1000,'R. Rui Barbosa, 925 - Costa e Silva, Joinville - SC, 89219-520',200,2,0,'‰PNG\r\n\Z\n\\0\\0\\0\rIHDR\\0\\05\\0\\0\\0£\\0\\0\\0Ü‰yÜ\\0\\0\\0PLTEÿÿÿê,é\\0é\\0é\\0üãåê&ó•šê)é\\0ùÊÍé\\0é\\0\\0é\\0\Zê\\\'ê#şôõñv}ë%4íLUö²´ğhpÿúúıíîúÓÕé\\0	øÂÅîU^ïckûÜŞüåæô¢õ¨¬ó”ë,9õ¤©÷¸»ò‚ˆì<Gñ{ùÆÉíDNòˆî\\\\dë0=ğpwîQZì?J B{\\0\\0OIDATxœí]iwª:­€‰S´u¨SûÿÿİPk`L\\0[¹¯ûË]w-L!œœ}f^^ÊD{<ktz‡E·Ö]>ó÷I»Ô?ğ¼ö!†÷~ç7z5Ûàœ±Zær®ézwßhz?qÛÀòØAØ€K»ºà3×÷w<ĞÌx¿0S³ƒ·e5Ent‚4Œ·ô•-ıè\\\'³ŒÕ—kƒ»‚;Y¿~^¸ğ¡´iúÊ>¸î“k×¶›±e!ú×OŒº·â#}iËšF±úgpoÏN’ZIÕ6´ğÃÒ—¾qt%;+O-x½wûĞ§{æP€Øˆ\\05Şë¶Gø<ËıúÙˆïÓWøÜ˜ê	A;¡õşàç{¼ZQ2€ê|ÌM©M«éÍ‡?â0Á¤Ë• ÈÀ7²¬[X@>?–˜°ø,#u>Î4ÑnÁØãñ È`‘¾Ò;À­\\0ê|À3&¬Â1]|BıÃ“4°á.\\02ØDÀ\rûäZ±Ó?¶¥ÅâˆôçóÃëJ“Á“\\\"ƒ\r¶›¹sœùõÁ`0©ıeãØu,Îş|~P`¶)&\\\'iØ\r	~9&õş`yÚ¹‰8x˜=ö’\Z°M\n•7«¤?EyàR¼)2èÀ­JD\nòdPÇ4iÛûPûi»ŸyœÖğÈIú°BÒ3øDç˜ñJD\nã\\0îZšOÛ…5`RÖø¡çùd€\\\"f^C¼\nS†Qÿ™Çù!¬¤$9`­æ®Ë¼çßA¹c^ø-hó2ïù×AØV™é“L`rù·ÌŠ2Ò\\\'Ù Ôd0)õ®}ìOÙy×;b÷¡[Í”\\\'¬†X^åMÄ…£Aƒº¿|o4\ZÓ÷şÇxRÄĞk¯4ô‹¬ÔÔÇãk…Å\ZÆÁø\nü°‰™õófD°ãè\\\'~Ei\\0¯9İ˜e[-í„–¡Û|1šæ)kğšï¯ëšq³’ÖíÍ‡9V\Zô;ë0Æ¥óÚaû¶™ö?pÌèƒß¶\\\'ÎNü¿\\\\î´mÉ_Á‡útß²5.F-Ã²† ¶QK.úoÚi%7µ’®½.•6®ŞØÖe!Õ§Xw×ìqúç>IZÑ¥8ÈK¼–öûÁÒ¨¬ãzm*«½áŞ0Èü·øJš›š#]»Ÿ?ß#RŞ8¸ÆÜğRÔh¤¶ÁÊ4²o5©¨o{º°³SŠL³:Ro`Ø³%ól!ÌO°fÇØ‰hb9¤áˆkO:Dv†Y‹»ç´İp4	¹çÁìîù½@aÏ2ÀòøR‚HˆV{NÌäïì;A€w—Ò¬Iè£ì²·S‘³Ö2½J›H»G\n\nË!\ráµ,]·ƒĞAEÀşZ—×¯ÜÊûŠæBvû¯@€¢I¤İ£?ı%«1Ï¸qØ¼W[‰I´-õK7p9½mŠKEhu2`¡Z(Êò\rGû]E1­¨„ó„ñZQMÔ\\\\—àoDØY0Ñë|…O_J%$Xír»SGÑd9!€Õ4KGõÕ)‡M”ßdÖÉr\\\"Şu€Ù;/ÚQåŞ60·\Z¹V²¹H—õ$Öd0À_ÚQ%ƒó!Ûç85èÕvpèæ.€Zêâ¢…È\\0¿ËXA¹çúgb=–¬“\\\"âõ>¸üÕ¼©ª´ÒÑ×¡\rß‚uØ¾ã\\\'¢Çß¿Æ ÖûzM`=u/ï¦¥Ò¯y7ídÉ$¬¶¦\Z£’L\rÖ\\0ÇÍ¿i§%¼“ï G0Dj‘¯ºK&áˆ¸™\Z&L:šEüò‘x\r©ê_WbŠ0‘ñÆ0P‘Ï\\0?£%„.p%%«¡M›çâ¼n}‹¾jä@¼;÷æˆ¶¹Ø3B\\04BŒt7ğ)†¡\\0¢êHæ·_å‘Ùô›“€S¹R€u1„‰%Ô)…­¿‰tı)q‹‹bóp_<n\\\"}ú‘¿‚]Ëò®[åYT)¥44/óÆTVºíp©…ì2ˆˆ‚\\\\ˆÔk<Uß¥ÖıBê1ÄµÖ©Ca’@E’lz‹bDUE§ÂôãbJ-ÄùUZÏç\r±`­,Ô>EäŠşÈ×>¤İXª¥†³¬©Æõ\\0.²¶Ìé“Å€†Q«İ^ã-$É`YøT|ªH€ıâB{QHDM·, `J6…¸êoFº_ÌJ`,Úµm~óêŠVÌ¸*V~½Âd ŠQá‘\në¼à÷Ü¯p%Bo¨!¶éÇåßd@ômK‘O¬Uğ(ÄˆÄA=JFœÏí”Z\rÑª\\\':˜ø§È`V‚¨Å&Ï°ş>#ö¨Š.‹$)Ï@°)pØ2Õ\\\"ƒ9C‘”ãzEEÄ9F¨–ª˜§<ÁÁİB‰Oˆ­\\\"Âcå—!jqX¹0«Ã\\\"I¢íV†’¾°\\\"jÜ”±Rµ)*j°bèÛÉ€¨ŠNÂ]ŠˆâÖùCa·<ÍÂR›(Àˆ@y‚M1Âd°şTK0ô%éõ*\\\"Ò2Å|©\ZQ$)C%­¿R4xTÇ¤šÃmÜzaUëb°g ÚT‹ŒH¼·ª7y$KYU¡O(CSˆˆ¾m±Œ¨ŠN´–bÍ×‚fY\Ze\rŠï?*’œ`\r\\\"¦0£%ãÂ»R4Œ/¨¦û1ì%ÜWº!P/Bˆ%„‰pUQ2I»-ÃŠ’q…5xˆH5còW‚g †‰ÚLŠJñ¢2¦R\\\\#t\\\\TKŠÓ€d€m\n1g€{Î’-2e¨Áb“RDM+çPÅ<aNŠél‡	ÉÆ—rÈ nÏ-\ZÙ‰`MÉ;WB€È€¨˜— ƒ¤g@­¬èĞş›â)Åd*	¾A]ğˆê¶·Œjn<Ğ¡\nµ#°¸Zƒu12ÓÙˆ~ƒä/NW‘­öB2”\nÌˆùJPÍA™ÎFT·%|ñ0…v®$Ò?*ˆ-\\\'ÕâX´H“K¥•ª%R¡…eµ¼Ì?¨\\0=f³T-ª™šm·È„-_JĞköå¯f~¾·âGNB£¦³	d@xIë¯¨„XW\rRÔ\rb—\\\\yqÖLa\\\"m‰\\\"É”õWĞ^ãßdEŒ¤’Æ5Sœ `]1ƒAd`%|½P®Ü¼©)˜®9 â»h‰élÂŒ–n‘ÁŞª˜v.Àn$ôoÕQü„¢\\\"É±ÌÜfL PÀôHŒCê ëÆø.LPp¬0áhàzE`ıåWâÉ‘€Ò6Öm.CŞÉ Î	„ 3ªSªº-FŞ\Z’E6¹ÅV2¾ÒıÀ|M®ˆˆ¢4Á3 2Ã6h‘ÉY%fòTÂ‘*Ü…-¶üÉzT§\\\'Æù4cş—‹uR¥Îgäªøã]ğæyŒæ$EC®µ•ñˆFc1	[AT2DÅ<ì\ZähÑ÷p–ÄZFM#¥5¤<Zfù/¨á™	îŒòn7X*‡uE_õŒ²€˜§UWîÓi—Qê¤‡írØD‡E’»d@ŒÁj¨™ºZ\r)ŠbÌ]Ì÷ÓÑ,ê1ÄzÎH–©C Œ‡\Z5¢Ò\\0ëÚY“7|Má\Zü\ZñÉ»}Ú˜Šp}*’¤ÂD‚J%Â¨y>ÆL¶Ùšé‡ìõƒ¬¹Å5hgšı­uüú1/¢±Â\\\"õ$<á©fŒ¨oe¬]f-f™{b#5ëŒéo„À³„øP$ãáˆÃ×Qİ–9¯djİ+¤âúBjj³¿ÖïH.Óìcæ,PoMm·ß.¿ÄQ.X$)Ó»XÇ‡Zßh7XÆÓš†q”‚µÜfŒëaÜîÎï\rsòöHö™¼~×˜4`‘äÈÒ\\0Äù-R*ºÕşH³ÀãºÜÒ>gJ³ıMWGTp5½Û‘šhÙHÎĞ:	è¡qûm…ƒæÈ5 æ‚)ÌObÒ?2G?¼fº®ir®Y¶³^-Õ‡PzÍİÖ	ôÖi¥ÓRn´TàlçÒãîêGnãô[Í°Ã\\\\”uo·\\\"ïø@éö)ŒÁÇlwÜn·½Ñ[§1,ò´ñÇûêmÔÛ~mG¯«é0k€7\\\\íO¿ı\ZçıÇ2QÆSıCu\\\"‡•MÿwPrÿ­Q¯eŞ¥Èà¢}*û3¬ÿwİâd	¢ü®šßÎû1Õ%¨_òWsÄÁçæşğ\r¢Hò2ÃÙ­Ùoß×Sƒ(5Dı’¸‚\\\"ƒ?Ï 8VWÑ¯jÿzRóĞÖL{öÛ7öÔ¯{ëd@püÀ(Ÿ7®+áqwR2ÚÎ#?éŞp`vÃªP0¦×}dH¹éÊ*Á®Ä\\\'EÇyh¤ı)]•»Ÿ}Ë|lşb\\\';»>U—şÄ¨;ÚƒOÆPnP<lQZp†æ”‰É—LùY)û{Ã¿2ÓúaWâÓb¨×Œ‡ã·ç‹V5\\\\—ş¼¸¬k\\\"JÅøî§CÈRÄçÄ+ÿ‰Ïaz¯Ù…qì¡vcùÚÙ…€eašY««øEÎßGØ5dı€.ö³d­rŸg\n%¾nWÃ,ÄªZõÉ$rzĞ\\\'JEvi²U-2x¹Ììv›^^eÚl°Eı¹bÚíö/½U^.½·ìqù«fí¹VÅê“óô)f<H%ÏïöU¡F”§Ç¹Ñ›éˆq·÷cl•¬>™\\\\:œÒí6o\\\'ñ5ŞŠ&¯°îøÌáA&˜[Õê“ël}Ş-QÅŒ÷r_–…(À÷ŒW/+¸;ØĞßvQÙê“Õ÷I2¾Êˆî¶w²ßïÆÓº«›fuÓÙ\rMVºü“ä¼Æ\nAªug…ÖÚh*“_ª”\nMbvë^3«›×vóú=GmÊE•R¡)ù`úZªy6S³TSèJ…¦±EÄµØN-€ãÏ×}´~ \\0ÿH´	)aZ°ïK:;ƒáÊÕ5éiGü[°Å¯ÒVãtÏ»iñıìn÷rsºçºŠ”éoıë¶U+\n0Ÿbd¦áÔ6³1”9oâÏv[ÇÖ”¾*\r%ºN9«V*ÁÇ7tóğÙ™ö—M<öıæ°ÿ¾{Û.¸m ÆöLp3·_ÛH*–\nE[ä°°ñÜÒm;l[·Œç¹¾â«÷\\\"±½|tÔºb¸Ÿ&/ÓºÄmÏİ7UŒ~§18<rÛ¬ïÒàóˆÊ¥B	ÀÑ#¥€ë7	‚ó÷„ÿ™FüyPÊ×‘’`ú§PèO¨º;•¥2X¶Ê?¥Ì¨%LŒhšß?AgöÊóúî@ã©2¹húõ¿AÌô2ÅMvÀJ\ZT1šö«\\\\Ğÿ>˜¦­ ƒ«d*4ÃƒUÂ1u­Zƒˆ\\0„ƒ/[UL…fcææ˜+ˆ²Ât{³¢©ĞlxÓƒÿœš–{ÌL?õ­ª¦BïÀ[®õHc¸e-ç³\\\'ŞØÖªš\n½ñªk«mãº1z—ĞXo¯?ÿ=xÃ#³$#BŒÆb3”SòËê¦B¥à}¬¾]Ë\n1—‡#3ùÙv…ºBó¢ıÑxûªÙ¶ÕÒÂ9‘Ñç‹†E\Zºm.¶ÇYS1sòèràgA{â/gÓùæ¸ï­µÅº·İÌ§ıædğìÿŒ-.àq¦ë{\\0\\0\\0\\0IEND®B`‚','ifood.png','4388','image/png',0);
/*!40000 ALTER TABLE `espacos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data_hora_inicial` datetime NOT NULL,
  `data_hora_final` datetime NOT NULL,
  `tipo` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `preco_total` double NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `id_espaco` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` char(1) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (14,'Thiago','thiago@hotmail.com','12345','L','4798834843','rua xanxeare');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-19 21:01:19
