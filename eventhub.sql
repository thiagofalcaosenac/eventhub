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
INSERT INTO `espacos` VALUES (2,'Embraco','Embraco',1000,'R. Rui Barbosa, 925 - Costa e Silva, Joinville - SC, 89219-520',200,2,0,'�PNG\r\n\Z\n\\0\\0\\0\rIHDR\\0\\05\\0\\0\\0�\\0\\0\\0܉y�\\0\\0\\0�PLTE����,�\\0�\\0�\\0����&��)�\\0����\\0�\\0\\0�\\0\Z�\\\'�#����v}�%4�LU����hp����������\\0	����U^�ck��������������,9��������<G�{�����DN��\\\\d�0=�pw�QZ�?J�B{\\0\\0OIDATx��]iw�:���S��u�S����Pk`L\\0[����]w-L!��}f^^�D{<ktz�E��]>����I��?��!��~�7z5����Z�r��zw�hz?qۏ���A؀K���3��w<��x�0S���e5Ent�4����-��\\\'��՗k����;Y�~^��i��>��k׶��e!��O�����#}i˚F���gpo�N�ZI�6���җ�qt%;+O-x�w�Ч{�P���\\05ށ�G�<���ف���W�ܘ�	A;�����{�ZQ2��|�M�M��͇?�0��˕ ��7���[X@>?����,#u>�4�n���� �`���;��\\0�|�3&�1]|B�Á�4��.\\02�D�\r��Z��?���������J�����\\\"�\r���s����`0���e��u,ΐ�|~P�`�)&\\\'i�\r	~9&��`yڹ�8x�=��\Z��M\n�7��?Ey�R�)2���J�D\n�dP�4i��P�i��y����I��B�3�D��JD\n�\\0�Z�O��ۅ5`R������d�\\\"f^C�\nS�Q����!���$9`��˼��A�c^�-h�2���A�V��L`r����2�\\\'� �d0)��}�O�y�;b��[͔\\\'��X^�Mą�A���|o4\Z����xR��k�4�Ԟ���k��\Z���\n������fD���\\\'~Ei\\0�9��e[-턖��|1��)k���q����͇9V\Z�;�0ƥ��a����?p����\\\'ΏN��\\\\�m�_���t߲5.F-ò���QK.�o�i%7����.�6����e!էXw��q��>IZѥ8�K�����Ҩ��zm*����0����J���#]��?�#R�8����R�h����4�o�5��o{���S�L�:Ro`س%�l!�O�f�؉hb9��kO:�Dv�Y����p4	�������@a�2����R�H�V{N�����;A�w�ҬI����S���2�J�H�G\n\n�!\r�,]���AE��Z�ׯ�����Bv��@��I�ݣ?�%�1ϸqؼW[�I�-�K7p9�m�KEh�u2`�Z(��\rG�]E1�����ZQM�\\\\��oD�Y0��|�O_J%$X�r�SG�d9!��4KG�՝)��M��d��r\\\"�u��;/�Q��60�\Z�V��H��$�d0�_�Q%��!��85��vp��.�Z�����\\0��XA���gb=���\\\"��>���������ס\r߂u�ؾ�\\\'��߿� ��zM`=u/殮Ҏ�y7�d�$���\Z���L\r�\\0�Ϳi�%���G0Dj���K&ሸ��\Z&L:�E���x\r��_Wb�0���0P��\\0?�%�.p%%��M���n}��j�@�;�戶��3B\\04B�t�7�)��\\0��H�_�������S�R�u1��%�)����t�)q���b�p_�<n\\\"}�����]���[��YT)�44/��TV��p���2���\\\\����k<Uߥ��B�1ĵ֩�Ca�@E�lz�bDUE����bJ-��UZ��\r�`�,�>E����>��X��������\\0.����ŀ�Q���^�-$�`Y�T�|�H���B{QHDM�, `J6���oF�_�J`,ڵm~��V��*V~��d �Q�\n���ܯp%Bo�!�����d@�mK�O�U�(Ĉ�A=J�F����Z\r�Ѫ\\\':����`V���&ϰ��>#���.�$)�@�)p�2�\\\"�9C���zEE�9F�����<���B�O��\\\"�c�!jqX�0��\\\"I��V����\\\"j�ܔ�R�)*j�b���ɀ��N�]�����Ca�<��R�(��@y�M1�d���TK0�%��*\\\"�2�|�\ZQ$)C%��R4xTǤ��m�zaU�b�g �T��H���7y$KYU�O(CS���m�����N���b�ׂfY\Ze\r��?*��`\r\\\"��0�%�»R4�/���1�%�W�!P/B�%��pUQ2I�-���q�5x�H5c�W��g ���L�J�2�R\\\\#t\\\\TK�Ӏd�m\n1g�{Β-2e��b�RDM+�P�<aN��l�	�Ɨr� n�-\Zى`M�;WB�Ȁ��� ��g@�������)�d*	�A]�����jn<С\n�#���Z�u12�و~��/NW���B2�\n̈�JP��A���FT�%|�0�v�$�?*�-\\\'��X�H�K����%R��e����?�\\0=f�T-���m�Ȅ-_J�k��f~���GNB���	d@xI믨�XW\rR�\rb�\\\\yq�La\\\"�m�\\\"ɔ�W�^��dE����5S��`]1�Ad`%|�P�ܼ�)��9��h��l���n��ު�v.�n�$�o�Q���\\\"ɱ��fL P��H�C�����.LPp�0�h�zE`��W�ɑ��6�m.C�� �	� 3�S��-F�\Z�E6��V2����|M����4�3 2�6h��Y%f�T*܅-���zT�\\\'��4c���uR��g���]��y��$EC�����Fc1	[AT2D�<�\Z�h��p��Z�FM#�5�<Zf�/��	��n7X*�uE_������UW��i�Q꤇�r�D�E��d@��j���Z\r)���b́]����,�1�z�H��C ��\Z5��\\0��Y�7|M�\Z�\Z�ɻ}ژ�p}*���D�J%��y>�L�ٚ������ŝ5hg���u��1/���\\\"�$<�f���oe�]f-f�{b#5�띌�o������P$�����Qݖ9�dj�+���Bjj����H.��c�,PoMm��.��Q.X$)ӻXǇZ�h7X�Ӛ�q����f��a����\rs��H���~ט4`����\\0��-R�*���H�����>gJ��MWGTp5�ۑ�h�H��:	�q�m����5 �)�Ob�?2G?�f��ir�Y��^-ՇPz���	��i��Rn�T�l�����G�n��[Ͱ��\\\\�uo��\\\"��@��)���lw�n���[�1,������m��~mG���0k�7\\\\�O��\Z���2Q�S�Cu\\\"��M�wPr��Q�eޥ���}*�3��w��d�	�������1�%�_�Ws������\r�H�2��٭�o��S�(5D����\\\"�?� 8VWѯj�zR���L{��7���{�d@p��(�7�+�qwR2��#?��p`vêP0��}dH���*���\\\'E�yh��)]���}�|l�b\\\';�>U��Ĩ;ڃO�PnP<lQZp����ɗL��Y)�{��2��aW��b�׌���V5\\\\�����k\\\"J���C�R���+���az�مq�vc��م�ea�Y���E��G�5d��.��d�r�g�\n%�nW�,ĪZ��$rz�\\\'JEvi�U-2x���v�^^e�l�E��b����/�U�^.���q��f펹V����)f<H%���U�F��ǹћ鏈q���cl��>�\\\\:���6o\\\'�5ފ&�����̍�A&�[���l}�-QŌ�r_���(���W/+�;���vQ����I2�ʈ�w����Ӻ���fu��\rMV�����\nA�ug���h*�_��\nMbv�^3���v��=Gm�E�R�)�`�Z�y6S�TS�J���Eĵ�N-����}�~ \\0�H�	)aZ��K:;����5�iG�[�ů�V�tϻi���n�rs�纊��o��U+\n0�bd���6�1�9o��v[�֔�*\r%�N9�V*��7t��ٙ��M<�����{�.�m���Lp3�_�H*�\nE[������m;l[��繾��\\\"��|tԺb��&/Ӻ�m��7U�~�18<r۬�����ʥB	��#���7	������F�yP�ב�`��P�O��;��2X��?�̨%L�h��?Ag�����@�2�h���A��2�Mv�J\ZT1����\\\\��>������d*4ÃU�1u�Z��\\0��/[UL�fc��+���t{����lxӃ�����{�L?����B��[��Hc�e-�\\\'��֪�\n���k�m�1z��Xo��?�=x�#�$#B��b3�S���B��}��]�\n1��#�3��v��B���x��ٶ���9�����E\Z�m.��YS1s��r�gA{�/g�����ź��̧��d����-.�q��{\\0\\0\\0\\0IEND�B`�','ifood.png','4388','image/png',0);
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
