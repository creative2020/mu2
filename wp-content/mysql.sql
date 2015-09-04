-- MySQL dump 10.13  Distrib 5.6.25-73.1, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: wp_musclemetrics
-- ------------------------------------------------------
-- Server version	5.6.25-73.1-log

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
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_commentmeta`
--

LOCK TABLES `wp_commentmeta` WRITE;
/*!40000 ALTER TABLE `wp_commentmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_comments`
--

LOCK TABLES `wp_comments` WRITE;
/*!40000 ALTER TABLE `wp_comments` DISABLE KEYS */;
INSERT INTO `wp_comments` VALUES (1,1,'Mr WordPress','','https://wordpress.org/','','2014-10-14 19:48:55','2014-10-14 19:48:55','Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.',0,'1','','',0,0);
/*!40000 ALTER TABLE `wp_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_links`
--

DROP TABLE IF EXISTS `wp_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_links`
--

LOCK TABLES `wp_links` WRITE;
/*!40000 ALTER TABLE `wp_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_options`
--

DROP TABLE IF EXISTS `wp_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`),
  KEY `wpe_autoload_options_index` (`autoload`)
) ENGINE=InnoDB AUTO_INCREMENT=3153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_options`
--

LOCK TABLES `wp_options` WRITE;
/*!40000 ALTER TABLE `wp_options` DISABLE KEYS */;
INSERT INTO `wp_options` VALUES (1,'siteurl','http://musclemetrics.zone','yes'),(2,'home','http://musclemetrics.zone','yes'),(3,'blogname','Muscle Metrics','yes'),(4,'blogdescription','','yes'),(5,'users_can_register','0','yes'),(6,'admin_email','jeff@2020creative.com','yes'),(7,'start_of_week','1','yes'),(8,'use_balanceTags','0','yes'),(9,'use_smilies','1','yes'),(10,'require_name_email','1','yes'),(11,'comments_notify','1','yes'),(12,'posts_per_rss','10','yes'),(13,'rss_use_excerpt','0','yes'),(14,'mailserver_url','mail.example.com','yes'),(15,'mailserver_login','login@example.com','yes'),(16,'mailserver_pass','password','yes'),(17,'mailserver_port','110','yes'),(18,'default_category','1','yes'),(19,'default_comment_status','open','yes'),(20,'default_ping_status','open','yes'),(21,'default_pingback_flag','0','yes'),(22,'posts_per_page','10','yes'),(23,'date_format','F j, Y','yes'),(24,'time_format','g:i a','yes'),(25,'links_updated_date_format','F j, Y g:i a','yes'),(26,'comment_moderation','0','yes'),(27,'moderation_notify','1','yes'),(28,'permalink_structure','/%postname%/','yes'),(29,'gzipcompression','0','yes'),(30,'hack_file','0','yes'),(31,'blog_charset','UTF-8','yes'),(32,'moderation_keys','','no'),(33,'active_plugins','a:1:{i:0;s:29:\"gravityforms/gravityforms.php\";}','yes'),(34,'category_base','','yes'),(35,'ping_sites','http://rpc.pingomatic.com/','yes'),(36,'advanced_edit','0','yes'),(37,'comment_max_links','2','yes'),(38,'gmt_offset','0','yes'),(39,'default_email_category','1','yes'),(40,'recently_edited','a:2:{i:0;s:70:\"/nas/wp/www/cluster-42342/musclemetrics/wp-content/themes/mu/style.css\";i:1;s:0:\"\";}','no'),(41,'template','mu','yes'),(42,'stylesheet','mu','yes'),(43,'comment_whitelist','1','yes'),(44,'blacklist_keys','','no'),(45,'comment_registration','0','yes'),(46,'html_type','text/html','yes'),(47,'use_trackback','0','yes'),(48,'default_role','subscriber','yes'),(49,'db_version','31536','yes'),(50,'uploads_use_yearmonth_folders','1','yes'),(51,'upload_path','','yes'),(52,'blog_public','0','yes'),(53,'default_link_category','2','yes'),(54,'show_on_front','posts','yes'),(55,'tag_base','','yes'),(56,'show_avatars','1','yes'),(57,'avatar_rating','G','yes'),(58,'upload_url_path','','yes'),(59,'thumbnail_size_w','150','yes'),(60,'thumbnail_size_h','150','yes'),(61,'thumbnail_crop','1','yes'),(62,'medium_size_w','300','yes'),(63,'medium_size_h','300','yes'),(64,'avatar_default','mystery','yes'),(65,'large_size_w','1024','yes'),(66,'large_size_h','1024','yes'),(67,'image_default_link_type','file','yes'),(68,'image_default_size','','yes'),(69,'image_default_align','','yes'),(70,'close_comments_for_old_posts','0','yes'),(71,'close_comments_days_old','14','yes'),(72,'thread_comments','1','yes'),(73,'thread_comments_depth','5','yes'),(74,'page_comments','0','yes'),(75,'comments_per_page','50','yes'),(76,'default_comments_page','newest','yes'),(77,'comment_order','asc','yes'),(78,'sticky_posts','a:0:{}','yes'),(79,'widget_categories','a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}','yes'),(80,'widget_text','a:0:{}','yes'),(81,'widget_rss','a:0:{}','yes'),(82,'uninstall_plugins','a:0:{}','no'),(83,'timezone_string','','yes'),(84,'page_for_posts','0','yes'),(85,'page_on_front','0','yes'),(86,'default_post_format','0','yes'),(87,'link_manager_enabled','0','yes'),(88,'initial_db_version','29630','yes'),(89,'wp_user_roles','a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:9:\"add_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}','yes'),(90,'widget_search','a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}','yes'),(91,'widget_recent-posts','a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}','yes'),(92,'widget_recent-comments','a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}','yes'),(93,'widget_archives','a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}','yes'),(94,'widget_meta','a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}','yes'),(95,'sidebars_widgets','a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:10:\"tt_sidebar\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:13:\"array_version\";i:3;}','yes'),(96,'cron','a:5:{i:1438455780;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1438466466;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1438466651;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1438476517;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}','yes'),(108,'limit_login_retries','a:1:{s:15:\"173.172.113.209\";i:2;}','no'),(109,'limit_login_retries_valid','a:1:{s:15:\"173.172.113.209\";i:1424340170;}','no'),(110,'_transient_random_seed','4bbdc26b1b0f7647435db1a5b81a7847','yes'),(131,'recently_activated','a:0:{}','yes'),(138,'seedprod_comingsoon_options','a:15:{s:16:\"comingsoon_image\";s:66:\"http://musclemetrics.zone/wp-content/uploads/2015/02/MM-logo-c.png\";s:19:\"comingsoon_headline\";s:21:\"What are you made of?\";s:22:\"comingsoon_description\";s:1306:\"<p style=\"text-align: center;\">Coming Soon to a fitness club, company or athletic event near you…</p>\r\n<p style=\"text-align: center;\">A mobile fitness testing unit using the world famous Bod Pod The Gold Standard in Body Composition Measurement</p>\r\n<p style=\"text-align: center;\">Test Results tell you…</p>\r\n\r\n<ul class=\"items\" style=\"text-align: center;\">\r\n	<li style=\"text-align: left;\">Your body fat percentage</li>\r\n	<li style=\"text-align: left;\">Your muscle mass percentage</li>\r\n	<li style=\"text-align: left;\">Your base metabolic rate to help you plan your daily caloric intake</li>\r\n</ul>\r\n<h3 style=\"text-align: center;\">Contact us for details, pricing and to schedule a day of testing. We come to you!</h3>\r\n<p style=\"text-align: center;\">Gyms • Fitness Clubs • Cross Training Clubs • Athletic Clubs • Athletic Events • Spas • Weight Loss Programs</p>\r\n<p style=\"text-align: center;\">Corporate Health and Wellness Programs • High School or College Athletic Programs • Physique, Fitness, Body Building Shows and Competitions • Government Employee Programs: Police, Fire and other professionals with physically demanding jobs</p>\r\n\r\n<h2 style=\"text-align: center;\">Brand New!\r\nCategory Exclusive Sponsorships are Available on a first come basis. Reserve today!!!</h2>\";s:22:\"comingsoon_mailinglist\";s:4:\"none\";s:29:\"comingsoon_feedburner_address\";s:0:\"\";s:21:\"comingsoon_customhtml\";s:16:\"Custom HTML area\";s:26:\"comingsoon_custom_bg_color\";s:7:\"#ffffff\";s:34:\"comingsoon_background_noise_effect\";s:3:\"off\";s:26:\"comingsoon_custom_bg_image\";s:0:\"\";s:21:\"comingsoon_font_color\";s:4:\"gray\";s:29:\"comingsoon_text_shadow_effect\";s:2:\"on\";s:24:\"comingsoon_headline_font\";s:15:\"_helvetica_neue\";s:20:\"comingsoon_body_font\";s:7:\"empty_0\";s:21:\"comingsoon_custom_css\";s:279:\"#teaser-description {\r\ntext-align: left;\r\nmax-width: 80%;\r\nmargin: 0 auto 30px;\r\n}\r\n.items {\r\ndisplay:inline-block;\r\ncolor:red;\r\nlist-style-type:none;\r\n}\r\n.items li {\r\nfont-weight:500;\r\nfont-size:1.4em;\r\ndisplay:inline-block;\r\nfloat:none;\r\nmargin-right:1.5em;\r\ncolor: #FFC125;\r\n}\";s:24:\"comingsoon_footer_credit\";s:1:\"0\";}','yes'),(142,'wpe_notices','a:2:{s:4:\"read\";s:0:\"\";s:8:\"messages\";a:0:{}}','yes'),(143,'wpe_notices_ttl','1438106574','yes'),(144,'WPLANG','','yes'),(148,'_transient_twentyfourteen_category_count','1','yes'),(157,'theme_mods_twentyfourteen','a:1:{s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1424299187;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}}}}','yes'),(158,'current_theme','MU','yes'),(159,'theme_mods_tt-tpl','a:2:{i:0;b:0;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1424301036;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:10:\"tt_sidebar\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}','yes'),(160,'theme_switched','','yes'),(169,'acf_version','4.3.8','yes'),(172,'category_children','a:0:{}','yes'),(243,'theme_mods_mu','a:1:{i:0;b:0;}','yes'),(336,'gravityformsaddon_gravityformswebapi_version','1.0','yes'),(337,'rg_form_version','1.9.12.1','yes'),(350,'rg_gforms_key','27c7f3160d5df03323dedc613171932b','yes'),(351,'rg_gforms_disable_css','1','yes'),(352,'rg_gforms_enable_html5','1','yes'),(353,'gform_enable_noconflict','1','yes'),(354,'rg_gforms_enable_akismet','','yes'),(355,'rg_gforms_captcha_public_key','6LcJTd8SAAAAANGifdluhpjbUJ8KAcEiKgsCtL3e','yes'),(356,'rg_gforms_captcha_private_key','6LcJTd8SAAAAAHHVyWDyk4CEBGtozns_u4buKge6','yes'),(357,'rg_gforms_currency','USD','yes'),(358,'rg_gforms_message','<!--GFM-->','yes'),(469,'gform_email_count','9','yes'),(634,'smtp_options','a:5:{s:4:\"host\";s:16:\"http://localhost\";s:4:\"port\";s:2:\"25\";s:11:\"smtp_secure\";s:0:\"\";s:8:\"username\";s:0:\"\";s:8:\"password\";s:0:\"\";}','yes'),(1170,'db_upgraded','','yes'),(2843,'gform_upload_page_slug','808c5d78ab826c8','yes'),(2864,'rewrite_rules','a:68:{s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:20:\"(.?.+?)(/[0-9]+)?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:20:\"([^/]+)(/[0-9]+)?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";}','yes'),(2869,'_site_transient_update_core','O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.2.3.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.2.3.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.2.3-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.2.3-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.2.3\";s:7:\"version\";s:5:\"4.2.3\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.1\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1438433005;s:15:\"version_checked\";s:5:\"4.2.3\";s:12:\"translations\";a:0:{}}','yes'),(2942,'_site_transient_timeout_browser_6beed9f3559f7a12a63a32bfd3db16c9','1438627135','yes'),(2943,'_site_transient_browser_6beed9f3559f7a12a63a32bfd3db16c9','a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"44.0.2403.89\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}','yes'),(2954,'can_compress_scripts','0','yes'),(3073,'_site_transient_update_themes','O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1438433005;s:7:\"checked\";a:2:{s:2:\"mu\";s:3:\"1.0\";s:6:\"tt-tpl\";s:3:\"1.1\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}','yes'),(3086,'_site_transient_update_plugins','O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1438433005;s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:4:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:2:\"15\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"3.1.3\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.3.1.3.zip\";}s:13:\"smtp/smtp.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"23469\";s:4:\"slug\";s:4:\"smtp\";s:6:\"plugin\";s:13:\"smtp/smtp.php\";s:11:\"new_version\";s:5:\"1.1.2\";s:3:\"url\";s:35:\"https://wordpress.org/plugins/smtp/\";s:7:\"package\";s:47:\"https://downloads.wordpress.org/plugin/smtp.zip\";}s:55:\"ultimate-coming-soon-page/ultimate-coming-soon-page.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"22747\";s:4:\"slug\";s:25:\"ultimate-coming-soon-page\";s:6:\"plugin\";s:55:\"ultimate-coming-soon-page/ultimate-coming-soon-page.php\";s:11:\"new_version\";s:6:\"1.14.4\";s:3:\"url\";s:56:\"https://wordpress.org/plugins/ultimate-coming-soon-page/\";s:7:\"package\";s:75:\"https://downloads.wordpress.org/plugin/ultimate-coming-soon-page.1.14.4.zip\";s:14:\"upgrade_notice\";s:24:\"Added Danish Translation\";}s:33:\"user-switching/user-switching.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:4:\"6923\";s:4:\"slug\";s:14:\"user-switching\";s:6:\"plugin\";s:33:\"user-switching/user-switching.php\";s:11:\"new_version\";s:5:\"1.0.6\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/user-switching/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/user-switching.1.0.6.zip\";s:14:\"upgrade_notice\";s:83:\"Correct the values passed to the switch_back_user action when a user switches back.\";}}}','yes'),(3145,'_transient_timeout_gform_update_info','1438479197','no'),(3146,'_transient_gform_update_info','a:5:{s:7:\"headers\";a:8:{s:4:\"date\";s:29:\"Sat, 01 Aug 2015 01:33:17 GMT\";s:6:\"server\";s:12:\"Apache/2.4.7\";s:12:\"x-powered-by\";s:21:\"PHP/5.5.9-1ubuntu4.11\";s:4:\"vary\";s:15:\"Accept-Encoding\";s:16:\"content-encoding\";s:4:\"gzip\";s:14:\"content-length\";s:4:\"1757\";s:10:\"connection\";s:5:\"close\";s:12:\"content-type\";s:9:\"text/html\";}s:4:\"body\";s:9093:\"{\"is_valid_key\":\"1\",\"version\":\"1.9.12\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/releases\\/gravityforms_1.9.12.1.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=OSkfSSmbtgsHPGb1bJO6kEbXQJU%3D\",\"expiration_time\":1454392800,\"offerings\":{\"gravityforms\":{\"is_available\":true,\"version\":\"1.9.12\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/releases\\/gravityforms_1.9.12.1.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=OSkfSSmbtgsHPGb1bJO6kEbXQJU%3D\"},\"gravityformsactivecampaign\":{\"is_available\":true,\"version\":\"1.2\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/activecampaign\\/gravityformsactivecampaign_1.2.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=S2jDlBkxE8ADG%2FyH1XVLNz4NfTA%3D\"},\"gravityformsagilecrm\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/agilecrm\\/gravityformsagilecrm_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=KmB8AKfPBpzPsOsIjtNZmlU3EtY%3D\"},\"gravityformsauthorizenet\":{\"is_available\":true,\"version\":\"2.1\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/authorizenet\\/gravityformsauthorizenet_2.1.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=1IofzPMi7VTmsO1PMGV5BWIEUmo%3D\"},\"gravityformsaweber\":{\"is_available\":true,\"version\":\"2.2\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/aweber\\/gravityformsaweber_2.2.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=aH8ww5%2F0xuJvWxjAIbt0X%2BqDEyQ%3D\"},\"gravityformsbatchbook\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/batchbook\\/gravityformsbatchbook_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=m5Ohseodd3irD15PDhNGkhij3D4%3D\"},\"gravityformscampaignmonitor\":{\"is_available\":true,\"version\":\"3.3\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/campaignmonitor\\/gravityformscampaignmonitor_3.3.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=gefvxJuCS1t6F2oHQCShMUVJRXk%3D\"},\"gravityformscampfire\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/zohocrm\\/gravityformscampfire_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=3Zbm%2FyW3pxLnzcwh3ZuzXfqmLkU%3D\"},\"gravityformscapsulecrm\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/capsule\\/gravityformscapsulecrm_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=tearZcOYueMsHvkmFfCUdF6489s%3D\"},\"gravityformscleverreach\":{\"is_available\":true,\"version\":\"1.1\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/cleverreach\\/gravityformscleverreach_1.1.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=X06%2Bx1X9alcpt5TYB8ioxlJ30b0%3D\"},\"gravityformscoupons\":{\"is_available\":true,\"version\":\"2.1\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/coupons\\/gravityformscoupons_2.1.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=ByIrXpbeJRCVVs%2FfnToQNimt2Dk%3D\"},\"gravityformsdropbox\":{\"is_available\":false,\"version\":\"\"},\"gravityformsemma\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/emma\\/gravityformsemma_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=%2B9IxGHnLn7F4QG9FGI0Z4QRMk%2F8%3D\"},\"gravityformsfreshbooks\":{\"is_available\":true,\"version\":\"2.2\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/freshbooks\\/gravityformsfreshbooks_2.2.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=2r9ujygzv9BudboSCCGlNrMsSb0%3D\"},\"gravityformsgetresponse\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/getresponse\\/gravityformsgetresponse_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=WNTpn2OrlzuKR9U1bvssvOfRBqY%3D\"},\"gravityformshelpscout\":{\"is_available\":true,\"version\":\"1.2\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/helpscout\\/gravityformshelpscout_1.2.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=T7czNg7EHBS3GIaX52Gl%2FNCIutw%3D\"},\"gravityformshighrise\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/highrise\\/gravityformshighrise_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=9h5GvwulDzjhgjK2yNH13U0A%2FxE%3D\"},\"gravityformshipchat\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/hipchat\\/gravityformshipchat_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=mdGEYD3ADGGXgEmbQvpbuENOwlk%3D\"},\"gravityformsicontact\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/icontact\\/gravityformsicontact_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=YnlF2TXStFO%2BhKZpW0HdBEjmLPU%3D\"},\"gravityformslogging\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/logging\\/gravityformslogging_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=H4QL3UgK3J%2B%2Bm6o7uCJm%2Bfub3zA%3D\"},\"gravityformsmadmimi\":{\"is_available\":true,\"version\":\"1.0\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/madmimi\\/gravityformsmadmimi_1.0.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=B5YF8U%2BwcxQ6%2B6dXzJfeGBdDJb8%3D\"},\"gravityformsmailchimp\":{\"is_available\":true,\"version\":\"3.6\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/mailchimp\\/gravityformsmailchimp_3.6.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=9qsfVNJ29ZzFtSNQeEOlfHownLE%3D\"},\"gravityformspaypal\":{\"is_available\":true,\"version\":\"2.4\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/paypal\\/gravityformspaypal_2.4.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=5joSKMJ4mLi0JiMcXWjdH12H0K8%3D\"},\"gravityformspaypalpaymentspro\":{\"is_available\":true,\"version\":\"1.8.1\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/paypalpaymentspro\\/gravityformspaypalpaymentspro_1.8.1.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=xA%2Fzv91q9Kkt5rELRgqOkGygPU0%3D\"},\"gravityformspaypalpro\":{\"is_available\":true,\"version\":\"1.6\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/paypalpro\\/gravityformspaypalpro_1.6.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=ANoOd3lRk8cQz%2BL81N2GMHyL%2FFo%3D\"},\"gravityformspicatcha\":{\"is_available\":false,\"version\":\"2.0\"},\"gravityformspolls\":{\"is_available\":true,\"version\":\"2.3\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/polls\\/gravityformspolls_2.3.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=oRqdluc2K%2B96J71tgFHC9DPkbE0%3D\"},\"gravityformsquiz\":{\"is_available\":true,\"version\":\"2.4\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/quiz\\/gravityformsquiz_2.4.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=EpguB%2BXivGS0tcx8LccDwqSPfWE%3D\"},\"gravityformssignature\":{\"is_available\":true,\"version\":\"2.3\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/signature\\/gravityformssignature_2.3.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=PnxrFwVZme2C6lhKmrHaqd6YB8s%3D\"},\"gravityformsslack\":{\"is_available\":true,\"version\":\"1.2\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/slack\\/gravityformsslack_1.2.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=5XijYEJRIQLovvO54BVu3Y%2BUvWw%3D\"},\"gravityformsstripe\":{\"is_available\":true,\"version\":\"1.7.1\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/stripe\\/gravityformsstripe_1.7.1.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=lp4k0s0e5v0mJFwdEjr78hcXKTE%3D\"},\"gravityformssurvey\":{\"is_available\":true,\"version\":\"2.5\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/survey\\/gravityformssurvey_2.5.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=0Sq6iA3lKoOpzS7ibefJndHrgls%3D\"},\"gravityformstwilio\":{\"is_available\":true,\"version\":\"2.1\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/twilio\\/gravityformstwilio_2.1.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=o721uPkCR6VfmfF8mKy2qE%2FdVsg%3D\"},\"gravityformsuserregistration\":{\"is_available\":true,\"version\":\"2.3\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/userregistration\\/gravityformsuserregistration_2.3.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=jMRKQHm8p%2BQjrzFFjAwPzniw5yw%3D\"},\"gravityformszapier\":{\"is_available\":true,\"version\":\"1.7\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/zapier\\/gravityformszapier_1.7.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=J%2BeeomEpMAREtYnHj0v3YUpELFY%3D\"},\"gravityformszohocrm\":{\"is_available\":true,\"version\":\"1.7\",\"url\":\"http:\\/\\/s3.amazonaws.com\\/gravityforms\\/addons\\/zapier\\/gravityformszapier_1.7.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1438565597&Signature=J%2BeeomEpMAREtYnHj0v3YUpELFY%3D\"}},\"is_active\":\"1\"}\";s:8:\"response\";a:2:{s:4:\"code\";i:200;s:7:\"message\";s:2:\"OK\";}s:7:\"cookies\";a:0:{}s:8:\"filename\";N;}','no');
/*!40000 ALTER TABLE `wp_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_postmeta`
--

DROP TABLE IF EXISTS `wp_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_postmeta`
--

LOCK TABLES `wp_postmeta` WRITE;
/*!40000 ALTER TABLE `wp_postmeta` DISABLE KEYS */;
INSERT INTO `wp_postmeta` VALUES (1,2,'_wp_page_template','default'),(2,4,'_wp_attached_file','2015/02/MM-logo-c.png'),(3,4,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:524;s:6:\"height\";i:241;s:4:\"file\";s:21:\"2015/02/MM-logo-c.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:21:\"MM-logo-c-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:21:\"MM-logo-c-300x137.png\";s:5:\"width\";i:300;s:6:\"height\";i:137;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(4,2,'_edit_lock','1424305302:2'),(5,2,'_edit_last','2'),(6,6,'_edit_lock','1424361831:2'),(7,6,'_edit_last','2'),(8,6,'_wp_page_template','default');
/*!40000 ALTER TABLE `wp_postmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_name` (`post_name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_posts`
--

LOCK TABLES `wp_posts` WRITE;
/*!40000 ALTER TABLE `wp_posts` DISABLE KEYS */;
INSERT INTO `wp_posts` VALUES (1,1,'2014-10-14 19:48:55','2014-10-14 19:48:55','Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!','Hello world!','','publish','open','open','','hello-world','','','2014-10-14 19:48:55','2014-10-14 19:48:55','',0,'http://musclemetrics.wpengine.com/?p=1',0,'post','',1),(2,1,'2014-10-14 19:48:55','2014-10-14 19:48:55','[gravityform id=\"1\" name=\"Contact\" title=\"false\" description=\"false\"]','Contact us','','publish','open','open','','sample-page','','','2015-02-19 00:23:49','2015-02-19 00:23:49','',0,'http://musclemetrics.wpengine.com/?page_id=2',0,'page','',0),(4,2,'2015-02-18 22:17:43','2015-02-18 22:17:43','','MM-logo-c','','inherit','open','open','','mm-logo-c','','','2015-02-18 22:17:43','2015-02-18 22:17:43','',0,'http://musclemetrics.zone/wp-content/uploads/2015/02/MM-logo-c.png',0,'attachment','image/png',0),(6,2,'2015-02-19 00:54:16','2015-02-19 00:54:16','Thank you for your interest. We will be in touch soon.','Thank you','','publish','open','open','','thank-you','','','2015-02-19 16:06:10','2015-02-19 16:06:10','',0,'http://musclemetrics.zone/?page_id=6',0,'page','',0),(7,2,'2015-07-27 18:38:56','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2015-07-27 18:38:56','0000-00-00 00:00:00','',0,'http://musclemetrics.zone/?p=7',0,'post','',0),(8,3,'2015-07-27 18:43:04','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2015-07-27 18:43:04','0000-00-00 00:00:00','',0,'http://musclemetrics.zone/?p=8',0,'post','',0);
/*!40000 ALTER TABLE `wp_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_form`
--

DROP TABLE IF EXISTS `wp_rg_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_form` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_form`
--

LOCK TABLES `wp_rg_form` WRITE;
/*!40000 ALTER TABLE `wp_rg_form` DISABLE KEYS */;
INSERT INTO `wp_rg_form` VALUES (1,'Contact','2015-02-19 00:03:26',1,0);
/*!40000 ALTER TABLE `wp_rg_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_form_meta`
--

DROP TABLE IF EXISTS `wp_rg_form_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_form_meta` (
  `form_id` mediumint(8) unsigned NOT NULL,
  `display_meta` longtext COLLATE utf8_unicode_ci,
  `entries_grid_meta` longtext COLLATE utf8_unicode_ci,
  `confirmations` longtext COLLATE utf8_unicode_ci,
  `notifications` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_form_meta`
--

LOCK TABLES `wp_rg_form_meta` WRITE;
/*!40000 ALTER TABLE `wp_rg_form_meta` DISABLE KEYS */;
INSERT INTO `wp_rg_form_meta` VALUES (1,'{\"title\":\"Contact\",\"description\":\"main\",\"labelPlacement\":\"top_label\",\"descriptionPlacement\":\"below\",\"button\":{\"type\":\"text\",\"text\":\"Submit\",\"imageUrl\":\"\"},\"fields\":[{\"id\":3,\"label\":\"Email\",\"adminLabel\":\"\",\"type\":\"email\",\"isRequired\":true,\"size\":\"large\",\"errorMessage\":\"\",\"inputs\":null,\"multipleFiles\":false,\"maxFiles\":\"\",\"calculationFormula\":\"\",\"calculationRounding\":\"\",\"enableCalculation\":\"\",\"disableQuantity\":false,\"displayAllCategories\":false,\"inputMask\":false,\"inputMaskValue\":\"\",\"allowsPrepopulate\":false},{\"id\":1,\"label\":\"Name\",\"adminLabel\":\"\",\"type\":\"name\",\"isRequired\":false,\"size\":\"medium\",\"errorMessage\":\"\",\"inputs\":[{\"id\":1.3,\"label\":\"First\",\"name\":\"\"},{\"id\":1.6,\"label\":\"Last\",\"name\":\"\"}]},{\"id\":2,\"label\":\"Company\",\"adminLabel\":\"\",\"type\":\"text\",\"isRequired\":false,\"size\":\"large\",\"errorMessage\":\"\",\"inputs\":null,\"multipleFiles\":false,\"maxFiles\":\"\",\"calculationFormula\":\"\",\"calculationRounding\":\"\",\"enableCalculation\":\"\",\"disableQuantity\":false,\"displayAllCategories\":false,\"inputMask\":false,\"inputMaskValue\":\"\",\"allowsPrepopulate\":false,\"conditionalLogic\":\"\"},{\"id\":4,\"label\":\"Phone\",\"adminLabel\":\"\",\"type\":\"phone\",\"isRequired\":false,\"size\":\"large\",\"errorMessage\":\"\",\"inputs\":null,\"phoneFormat\":\"standard\",\"multipleFiles\":false,\"maxFiles\":\"\",\"calculationFormula\":\"\",\"calculationRounding\":\"\",\"enableCalculation\":\"\",\"disableQuantity\":false,\"displayAllCategories\":false,\"inputMask\":false,\"inputMaskValue\":\"\",\"allowsPrepopulate\":false},{\"id\":5,\"label\":\"Type of business\",\"adminLabel\":\"\",\"type\":\"select\",\"isRequired\":false,\"size\":\"large\",\"errorMessage\":\"\",\"inputs\":null,\"choices\":[{\"text\":\"--Please Select One--\",\"value\":\"--Please Select One--\",\"isSelected\":true,\"price\":\"\"},{\"text\":\"Corporation\",\"value\":\"Corporation\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"Gym\",\"value\":\"Gym\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"Fitness Club\",\"value\":\"Fitness Club\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"Cross Training Club\",\"value\":\"Cross Training Club\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"Athletic Club\",\"value\":\"Athletic Club\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"Athletic Event\",\"value\":\"Athletic Event\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"Spa\",\"value\":\"Spa\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"Weight Loss Center\",\"value\":\"Weight Loss Center\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"School\",\"value\":\"School\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"Government Agency\",\"value\":\"Government Agency\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"OTHER\",\"value\":\"OTHER\",\"isSelected\":false,\"price\":\"\"}],\"multipleFiles\":false,\"maxFiles\":\"\",\"calculationFormula\":\"\",\"calculationRounding\":\"\",\"enableCalculation\":\"\",\"disableQuantity\":false,\"displayAllCategories\":false,\"inputMask\":false,\"inputMaskValue\":\"\",\"allowsPrepopulate\":false},{\"id\":6,\"label\":\"Tell us about your interest\",\"adminLabel\":\"\",\"type\":\"checkbox\",\"isRequired\":false,\"size\":\"medium\",\"errorMessage\":\"\",\"choices\":[{\"text\":\"I am interested in having you come and test\",\"value\":\"I am interested in having you come and test\",\"isSelected\":false,\"price\":\"\"},{\"text\":\"I am interested in your sponsorship opportunities\",\"value\":\"I am interested in your sponsorship opportunities\",\"isSelected\":false,\"price\":\"\"}],\"inputs\":[{\"id\":\"6.1\",\"label\":\"I am interested in having you come and test\",\"name\":\"\"},{\"id\":\"6.2\",\"label\":\"I am interested in your sponsorship opportunities\",\"name\":\"\"}],\"multipleFiles\":false,\"maxFiles\":\"\",\"calculationFormula\":\"\",\"calculationRounding\":\"\",\"enableCalculation\":\"\",\"disableQuantity\":false,\"displayAllCategories\":false,\"inputMask\":false,\"inputMaskValue\":\"\",\"allowsPrepopulate\":false}],\"id\":1,\"useCurrentUserAsAuthor\":true,\"postContentTemplateEnabled\":false,\"postTitleTemplateEnabled\":false,\"postTitleTemplate\":\"\",\"postContentTemplate\":\"\",\"lastPageButton\":null,\"pagination\":null,\"firstPageCssClass\":null}',NULL,'{\"54e5284e58f07\":{\"id\":\"54e5284e58f07\",\"name\":\"Default Confirmation\",\"isDefault\":\"1\",\"type\":\"page\",\"message\":\"\",\"url\":\"\",\"pageId\":\"6\",\"queryString\":\"\",\"disableAutoformat\":\"\",\"conditionalLogic\":[]}}','{\"54e5284e58a9b\":{\"isActive\":true,\"id\":\"54e5284e58a9b\",\"name\":\"Admin Notification\",\"event\":\"form_submission\",\"to\":\"Info@musclemetrics.com\",\"toType\":\"email\",\"bcc\":\"\",\"subject\":\"Muscle Metrics: New contact from {form_title} - {Name (First):1.3} {Name (Last):1.6}\",\"message\":\"{all_fields}\",\"from\":\"Info@musclemetrics.com\",\"fromName\":\"Muscle Metrics\",\"replyTo\":\"{Email:3}\",\"routing\":null,\"conditionalLogic\":null,\"disableAutoformat\":\"\"}}');
/*!40000 ALTER TABLE `wp_rg_form_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_form_view`
--

DROP TABLE IF EXISTS `wp_rg_form_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_form_view` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `ip` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` mediumint(8) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_form_view`
--

LOCK TABLES `wp_rg_form_view` WRITE;
/*!40000 ALTER TABLE `wp_rg_form_view` DISABLE KEYS */;
INSERT INTO `wp_rg_form_view` VALUES (1,1,'2015-02-19 16:33:51','173.172.113.209',4),(2,1,'2015-02-19 17:08:26','70.195.1.1',7),(3,1,'2015-02-19 18:18:31','98.156.92.89',1),(4,1,'2015-02-20 00:43:26','66.249.80.69',1),(5,1,'2015-02-20 03:15:39','74.62.124.44',1),(6,1,'2015-02-20 04:43:48','64.79.100.12',1),(7,1,'2015-02-20 12:35:17','75.87.87.75',1),(8,1,'2015-02-20 19:41:04','75.87.87.75',1),(9,1,'2015-02-20 22:09:40','107.77.89.28',1),(10,1,'2015-02-21 15:06:14','66.249.80.61',1),(11,1,'2015-02-21 19:25:44','38.127.167.46',1),(12,1,'2015-02-22 04:04:48','98.156.66.204',1),(13,1,'2015-02-22 15:26:17','98.156.66.204',1),(14,1,'2015-02-22 18:33:57','66.249.80.77',1),(15,1,'2015-02-24 02:37:52','66.249.80.69',1),(16,1,'2015-02-24 17:22:17','64.79.100.12',3),(17,1,'2015-02-25 16:52:41','66.249.80.61',1),(18,1,'2015-02-27 00:27:11','66.162.212.19',1),(19,1,'2015-02-27 15:14:20','66.162.212.19',1),(20,1,'2015-03-02 11:29:40','72.182.43.72',1),(21,1,'2015-03-02 12:28:33','72.182.43.72',1),(22,1,'2015-03-02 23:44:13','184.73.246.30',1),(23,1,'2015-03-06 00:02:34','107.170.92.70',1),(24,1,'2015-03-09 17:31:19','213.47.217.101',2),(25,1,'2015-03-09 18:39:07','74.6.254.140',1),(26,1,'2015-03-11 12:44:09','12.111.97.234',1),(27,1,'2015-03-12 23:13:21','173.172.113.209',2),(28,1,'2015-03-13 01:02:28','92.222.67.109',1),(29,1,'2015-03-16 15:19:10','67.213.175.42',1),(30,1,'2015-03-16 17:49:54','54.221.219.28',1),(31,1,'2015-03-19 13:10:41','104.152.125.2',1),(32,1,'2015-03-19 14:18:30','173.172.113.209',2),(33,1,'2015-03-21 02:04:40','64.79.100.2',1),(34,1,'2015-03-21 06:31:33','127.0.0.1',2),(35,1,'2015-03-21 18:04:50','173.172.113.209',1),(36,1,'2015-03-23 15:44:23','76.232.82.105',2),(37,1,'2015-03-23 23:23:19','148.251.77.34',1),(38,1,'2015-03-24 08:42:31','148.251.77.34',1),(39,1,'2015-03-25 15:30:44','95.130.15.97',1),(40,1,'2015-03-26 04:32:47','62.210.74.186',1),(41,1,'2015-03-27 09:35:31','197.231.221.211',1),(42,1,'2015-03-28 04:34:06','94.242.198.164',1),(43,1,'2015-03-28 09:34:56','18.239.0.155',1),(44,1,'2015-03-30 09:07:14','88.150.187.210',2),(45,1,'2015-03-30 17:13:56','197.231.221.211',1),(46,1,'2015-04-09 04:51:30','107.170.4.120',1),(47,1,'2015-04-10 08:52:50','195.154.97.160',1),(48,1,'2015-04-12 23:15:42','37.187.105.7',1),(49,1,'2015-04-14 11:27:43','213.47.217.101',1),(50,1,'2015-04-16 07:01:33','130.203.32.233',1),(51,1,'2015-04-20 19:58:56','108.212.170.178',1),(52,1,'2015-04-22 12:12:37','127.0.0.1',2),(53,1,'2015-04-22 16:11:34','78.47.155.198',1),(54,1,'2015-04-23 02:26:12','78.47.155.198',1),(55,1,'2015-04-29 13:55:53','64.151.16.212',1),(56,1,'2015-04-30 22:14:32','127.0.0.1',3),(57,1,'2015-04-30 23:11:40','107.77.89.84',1),(58,1,'2015-05-01 09:15:49','23.253.234.4',1),(59,1,'2015-05-01 11:06:13','23.253.234.4',1),(60,1,'2015-05-02 17:02:47','38.127.167.45',2),(61,1,'2015-05-05 16:57:58','178.62.225.172',1),(62,1,'2015-05-05 21:16:33','173.161.203.90',1),(63,1,'2015-05-06 12:01:40','173.161.203.90',1),(64,1,'2015-05-08 02:46:05','127.0.0.1',2),(65,1,'2015-05-14 14:52:36','38.127.167.46',1),(66,1,'2015-05-17 11:45:36','94.242.246.23',1),(67,1,'2015-05-19 10:03:00','64.202.161.41',1),(68,1,'2015-05-19 11:01:32','64.202.161.41',1),(69,1,'2015-05-21 03:31:25','127.0.0.1',2),(70,1,'2015-05-23 09:48:04','23.95.43.109',1),(71,1,'2015-05-25 21:15:09','76.92.220.215',1),(72,1,'2015-05-26 22:35:05','37.187.142.28',2),(73,1,'2015-06-03 05:31:06','213.47.217.101',1),(74,1,'2015-06-04 19:39:05','174.47.120.34',1),(75,1,'2015-06-05 17:23:03','64.136.193.41',1),(76,1,'2015-06-06 12:35:24','69.58.178.58',1),(77,1,'2015-06-08 15:03:30','76.232.81.105',1),(78,1,'2015-06-09 15:30:02','94.131.14.7',1),(79,1,'2015-06-11 02:53:12','76.92.220.215',2),(80,1,'2015-06-12 13:16:19','173.172.113.209',2),(81,1,'2015-06-12 18:52:03','69.171.227.112',1),(82,1,'2015-06-13 03:52:13','74.209.12.42',1),(83,1,'2015-06-13 19:38:52','74.209.12.42',1),(84,1,'2015-06-14 02:15:24','23.127.64.187',1),(85,1,'2015-06-15 02:31:25','72.128.37.155',1),(86,1,'2015-06-15 22:34:59','201.215.25.233',1),(87,1,'2015-06-16 11:31:39','62.141.45.12',1),(88,1,'2015-06-19 01:03:25','69.171.227.113',1),(89,1,'2015-06-20 14:52:26','172.8.181.104',1),(90,1,'2015-06-22 14:51:11','67.53.25.26',1),(91,1,'2015-06-22 19:03:27','66.76.162.17',1),(92,1,'2015-06-23 13:44:10','172.6.70.132',1),(93,1,'2015-06-23 20:01:45','64.79.100.48',1),(94,1,'2015-06-24 13:16:06','173.252.88.90',1),(95,1,'2015-06-25 13:58:30','70.195.3.124',1),(96,1,'2015-06-26 10:05:17','45.55.159.165',1),(97,1,'2015-06-28 23:35:39','98.156.91.144',1),(98,1,'2015-06-29 15:21:52','75.87.144.57',1),(99,1,'2015-06-29 16:46:19','46.165.221.166',1),(100,1,'2015-06-29 21:49:17','64.79.100.19',1),(101,1,'2015-06-30 02:35:41','23.228.134.112',2),(102,1,'2015-06-30 05:37:05','69.171.227.112',1),(103,1,'2015-06-30 23:33:10','23.253.234.4',1),(104,1,'2015-07-01 22:42:21','64.79.100.16',1),(105,1,'2015-07-01 23:31:27','173.252.88.88',1),(106,1,'2015-07-02 00:17:48','64.79.100.12',1),(107,1,'2015-07-02 20:57:02','166.137.10.59',1),(108,1,'2015-07-03 05:49:02','69.171.227.114',1),(109,1,'2015-07-03 17:16:15','64.79.100.35',1),(110,1,'2015-07-04 02:26:05','52.0.89.236',1),(111,1,'2015-07-06 11:31:31','67.53.25.26',1),(112,1,'2015-07-06 20:49:19','67.53.25.26',1),(113,1,'2015-07-07 15:21:20','23.253.234.4',1),(114,1,'2015-07-08 15:09:02','107.77.87.111',1),(115,1,'2015-07-08 17:56:14','67.53.25.26',1),(116,1,'2015-07-09 17:11:13','23.253.234.4',1),(117,1,'2015-07-11 01:32:09','45.55.158.127',1),(118,1,'2015-07-13 14:03:01','176.106.54.54',1),(119,1,'2015-07-14 18:48:36','23.253.234.4',1),(120,1,'2015-07-14 20:46:43','69.171.227.114',1),(121,1,'2015-07-15 11:13:11','107.77.87.49',1),(122,1,'2015-07-15 22:34:27','107.77.89.127',1),(123,1,'2015-07-16 23:40:21','199.59.148.211',1),(124,1,'2015-07-17 10:48:33','69.171.227.114',1),(125,1,'2015-07-19 02:40:41','213.47.217.101',1),(126,1,'2015-07-21 20:16:13','38.127.167.45',2),(127,1,'2015-07-22 02:24:55','192.99.44.154',2),(128,1,'2015-07-22 12:04:37','108.203.81.155',1),(129,1,'2015-07-22 14:23:41','173.252.90.116',2),(130,1,'2015-07-22 15:05:00','74.6.254.138',1),(131,1,'2015-07-22 16:33:59','172.8.181.251',1),(132,1,'2015-07-23 18:25:09','76.92.238.107',1),(133,1,'2015-07-23 20:37:16','69.243.128.131',1),(134,1,'2015-07-23 21:11:15','72.214.169.21',3),(135,1,'2015-07-24 02:07:20','70.194.106.113',1),(136,1,'2015-07-24 05:36:23','127.0.0.1',2),(137,1,'2015-07-24 17:27:32','54.175.5.1',1),(138,1,'2015-07-24 19:57:08','173.252.88.88',1),(139,1,'2015-07-24 20:08:50','74.6.254.138',1),(140,1,'2015-07-25 22:35:03','70.195.68.38',2),(141,1,'2015-07-27 18:08:44','69.243.128.131',4),(142,1,'2015-07-28 15:09:51','69.243.128.131',1),(143,1,'2015-07-28 17:05:44','69.243.128.131',2),(144,1,'2015-07-28 19:39:56','69.171.227.112',1),(145,1,'2015-07-29 15:27:49','155.70.23.45',1),(146,1,'2015-07-29 17:33:45','54.177.25.254',1),(147,1,'2015-07-30 20:11:26','64.79.100.46',1),(148,1,'2015-07-31 13:09:17','107.207.192.115',1),(149,1,'2015-07-31 18:35:15','192.161.181.44',1),(150,1,'2015-08-01 01:33:18','69.171.227.114',1),(151,1,'2015-08-01 03:40:56','107.77.85.36',1);
/*!40000 ALTER TABLE `wp_rg_form_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_incomplete_submissions`
--

DROP TABLE IF EXISTS `wp_rg_incomplete_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_incomplete_submissions` (
  `uuid` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_id` mediumint(8) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `ip` varchar(39) COLLATE utf8_unicode_ci NOT NULL,
  `source_url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `submission` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uuid`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_incomplete_submissions`
--

LOCK TABLES `wp_rg_incomplete_submissions` WRITE;
/*!40000 ALTER TABLE `wp_rg_incomplete_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_rg_incomplete_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_lead`
--

DROP TABLE IF EXISTS `wp_rg_lead`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_lead` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) unsigned NOT NULL,
  `post_id` bigint(20) unsigned DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `is_starred` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `ip` varchar(39) COLLATE utf8_unicode_ci NOT NULL,
  `source_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_agent` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `currency` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_amount` decimal(19,2) DEFAULT NULL,
  `payment_method` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_fulfilled` tinyint(1) DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `transaction_type` tinyint(1) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `form_id` (`form_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_lead`
--

LOCK TABLES `wp_rg_lead` WRITE;
/*!40000 ALTER TABLE `wp_rg_lead` DISABLE KEYS */;
INSERT INTO `wp_rg_lead` VALUES (7,1,NULL,'2015-02-19 18:19:23',0,0,'98.156.92.89','http://musclemetrics.zone/','Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko','USD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active'),(8,1,NULL,'2015-06-28 23:37:26',0,0,'98.156.91.144','http://musclemetrics.zone/','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.124 Safari/537.36','USD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active');
/*!40000 ALTER TABLE `wp_rg_lead` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_lead_detail`
--

DROP TABLE IF EXISTS `wp_rg_lead_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_lead_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lead_id` int(10) unsigned NOT NULL,
  `form_id` mediumint(8) unsigned NOT NULL,
  `field_number` float NOT NULL,
  `value` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form_id` (`form_id`),
  KEY `lead_id` (`lead_id`),
  KEY `lead_field_number` (`lead_id`,`field_number`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_lead_detail`
--

LOCK TABLES `wp_rg_lead_detail` WRITE;
/*!40000 ALTER TABLE `wp_rg_lead_detail` DISABLE KEYS */;
INSERT INTO `wp_rg_lead_detail` VALUES (43,7,1,3,'cameronbishop15@yahoo.com'),(44,7,1,1.3,'cameron'),(45,7,1,1.6,'bishop'),(46,7,1,2,'Capitus Group'),(47,7,1,4,'(816) 591-6610'),(48,7,1,5,'--Please Select One--'),(49,8,1,3,'kscantlin79@gmail.com'),(50,8,1,1.3,'Kathy'),(51,8,1,1.6,'Scantlin'),(52,8,1,2,'Olathe Junior Service League'),(53,8,1,4,'(913) 481-6604'),(54,8,1,5,'OTHER'),(55,8,1,6.1,'I am interested in having you come and test'),(56,8,1,6.2,'I am interested in your sponsorship opportunities');
/*!40000 ALTER TABLE `wp_rg_lead_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_lead_detail_long`
--

DROP TABLE IF EXISTS `wp_rg_lead_detail_long`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_lead_detail_long` (
  `lead_detail_id` bigint(20) unsigned NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`lead_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_lead_detail_long`
--

LOCK TABLES `wp_rg_lead_detail_long` WRITE;
/*!40000 ALTER TABLE `wp_rg_lead_detail_long` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_rg_lead_detail_long` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_lead_meta`
--

DROP TABLE IF EXISTS `wp_rg_lead_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_lead_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `lead_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `lead_id` (`lead_id`),
  KEY `meta_key` (`meta_key`(191)),
  KEY `form_id_meta_key` (`form_id`,`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_lead_meta`
--

LOCK TABLES `wp_rg_lead_meta` WRITE;
/*!40000 ALTER TABLE `wp_rg_lead_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_rg_lead_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_rg_lead_notes`
--

DROP TABLE IF EXISTS `wp_rg_lead_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rg_lead_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lead_id` int(10) unsigned NOT NULL,
  `user_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `note_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lead_id` (`lead_id`),
  KEY `lead_user_key` (`lead_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_rg_lead_notes`
--

LOCK TABLES `wp_rg_lead_notes` WRITE;
/*!40000 ALTER TABLE `wp_rg_lead_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_rg_lead_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_relationships`
--

LOCK TABLES `wp_term_relationships` WRITE;
/*!40000 ALTER TABLE `wp_term_relationships` DISABLE KEYS */;
INSERT INTO `wp_term_relationships` VALUES (1,1,0);
/*!40000 ALTER TABLE `wp_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_taxonomy`
--

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES (1,1,'category','',0,1);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (1,'Uncategorized','uncategorized',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','wpengine'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description','This is the \"wpengine\" admin user that our staff uses to gain access to your admin area to provide support and troubleshooting. It can only be accessed by a button in our secure log that auto generates a password and dumps that password after the staff member has logged in. We have taken extreme measures to ensure that our own user is not going to be misused to harm any of our clients sites.'),(5,1,'rich_editing','true'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(11,1,'wp_user_level','10'),(12,1,'dismissed_wp_pointers','wp350_media,wp360_revisions,wp360_locks,wp390_widgets'),(13,1,'show_welcome_panel','1'),(14,2,'nickname','musclemetrics'),(15,2,'first_name',''),(16,2,'last_name',''),(17,2,'description',''),(18,2,'rich_editing','true'),(19,2,'comment_shortcuts','false'),(20,2,'admin_color','fresh'),(21,2,'use_ssl','0'),(22,2,'show_admin_bar_front','true'),(23,2,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(24,2,'wp_user_level','10'),(25,2,'default_password_nag',''),(27,2,'wp_dashboard_quick_press_last_post_id','7'),(28,2,'wpe_notices_read','a:1:{i:0;s:24:\"deploy-notice-2015-02-18\";}'),(29,2,'wp_user-settings','imgsize=full&align=center&editor=tinymce&hidetb=1'),(30,2,'wp_user-settings-time','1424305425'),(31,2,'dismissed_wp_pointers','wp390_widgets,wp350_media'),(32,3,'nickname','derek'),(33,3,'first_name','Derek'),(34,3,'last_name','Potts'),(35,3,'description',''),(36,3,'rich_editing','true'),(37,3,'comment_shortcuts','false'),(38,3,'admin_color','fresh'),(39,3,'use_ssl','0'),(40,3,'show_admin_bar_front','true'),(41,3,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(42,3,'wp_user_level','10'),(43,3,'dismissed_wp_pointers','wp360_locks,wp390_widgets'),(45,3,'wp_dashboard_quick_press_last_post_id','8');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_users`
--

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;
INSERT INTO `wp_users` VALUES (1,'wpengine','$P$BkBt0u1Q7QUOZHqwdN8NlrZHFrhzf6.','wpengine','bitbucket@wpengine.com','http://wpengine.com','2014-10-14 19:48:55','',0,'wpengine'),(2,'musclemetrics','$P$BDWC8CQiXYR.rAKQhyH5A7ehEtkfh8/','musclemetrics','jeff@2020creative.com','http://musclemetrics.wpengine.com','2015-02-18 22:00:48','',0,'musclemetrics'),(3,'derek','$P$BzkcqiOocEBgoptrbBkyC3ZWxnPwHI1','derek','derek@2020creative.com','','2015-07-27 18:41:08','',0,'Derek Potts');
/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-02  1:35:11
