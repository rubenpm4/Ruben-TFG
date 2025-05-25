-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: kizuma_score
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentarios_user_id_foreign` (`user_id`),
  KEY `comentarios_post_id_foreign` (`post_id`),
  CONSTRAINT `comentarios_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,4,1,'F','2025-05-14 10:06:03','2025-05-14 10:06:03'),(2,5,2,'Imposible','2025-05-14 10:12:54','2025-05-14 10:12:54'),(3,10,3,'En la vida socio','2025-05-15 10:32:51','2025-05-15 10:32:51'),(4,5,4,'El Barcelona campeónnn','2025-05-20 04:39:36','2025-05-20 04:39:36'),(5,8,6,'Noo, se viene la primera Champions del Atletiii','2025-05-20 04:43:26','2025-05-20 04:43:26'),(6,10,7,'Lo siento brother','2025-05-20 04:46:38','2025-05-20 04:46:38'),(7,1,2,'Venga que ya queda menos chicos','2025-05-20 08:45:41','2025-05-20 08:45:41'),(8,12,5,'Depor mejor','2025-05-20 08:56:06','2025-05-20 08:56:06'),(9,13,8,'Animo','2025-05-20 08:57:10','2025-05-20 08:57:10'),(10,14,3,'Jajajajaja en la vida sereis el Sevilla','2025-05-20 09:01:55','2025-05-20 09:01:55'),(11,2,11,'Reportadlo','2025-05-20 09:07:01','2025-05-20 09:07:01'),(12,2,5,'En la vida amigo','2025-05-20 09:40:45','2025-05-20 09:40:45'),(13,18,7,'Ánimo amigo','2025-05-20 10:05:04','2025-05-20 10:05:04'),(14,19,10,'Lo dudo mucho amigo','2025-05-20 10:44:09','2025-05-20 10:44:09'),(15,1,12,'Noup','2025-05-21 09:18:39','2025-05-21 09:18:39'),(16,2,7,'Sorry','2025-05-21 09:19:16','2025-05-21 09:19:16');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `followers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seguidor_id` bigint unsigned NOT NULL,
  `seguido_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `followers_seguidor_id_seguido_id_unique` (`seguidor_id`,`seguido_id`),
  KEY `followers_seguido_id_foreign` (`seguido_id`),
  CONSTRAINT `followers_seguido_id_foreign` FOREIGN KEY (`seguido_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `followers_seguidor_id_foreign` FOREIGN KEY (`seguidor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (1,2,1,'2025-05-14 09:59:19','2025-05-14 09:59:19'),(2,4,1,'2025-05-14 10:06:24','2025-05-14 10:06:24'),(3,5,4,'2025-05-14 10:12:59','2025-05-14 10:12:59'),(4,4,5,'2025-05-14 10:13:32','2025-05-14 10:13:32'),(7,6,1,'2025-05-15 10:13:53','2025-05-15 10:13:53'),(8,1,6,'2025-05-15 10:14:54','2025-05-15 10:14:54'),(9,10,6,'2025-05-15 10:32:57','2025-05-15 10:32:57'),(10,2,6,'2025-05-20 04:12:40','2025-05-20 04:12:40'),(11,4,2,'2025-05-20 04:37:55','2025-05-20 04:37:55'),(12,7,1,'2025-05-20 04:41:36','2025-05-20 04:41:36'),(13,8,7,'2025-05-20 04:43:33','2025-05-20 04:43:33'),(14,10,9,'2025-05-20 04:47:01','2025-05-20 04:47:01'),(15,2,10,'2025-05-20 08:46:11','2025-05-20 08:46:11'),(16,2,12,'2025-05-20 08:58:20','2025-05-20 08:58:20'),(17,2,15,'2025-05-20 09:03:56','2025-05-20 09:03:56'),(18,2,4,'2025-05-20 09:45:22','2025-05-20 09:45:22'),(19,1,13,'2025-05-20 09:47:22','2025-05-20 09:47:22'),(20,1,2,'2025-05-20 09:47:39','2025-05-20 09:47:39'),(21,1,7,'2025-05-20 10:02:50','2025-05-20 10:02:50'),(22,18,1,'2025-05-20 10:05:13','2025-05-20 10:05:13'),(23,18,2,'2025-05-20 10:05:15','2025-05-20 10:05:15'),(24,1,18,'2025-05-21 10:32:37','2025-05-21 10:32:37'),(25,21,1,'2025-05-21 10:34:33','2025-05-21 10:34:33');
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `follows` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seguidor_id` bigint unsigned NOT NULL,
  `seguido_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `follows_seguidor_id_foreign` (`seguidor_id`),
  KEY `follows_seguido_id_foreign` (`seguido_id`),
  CONSTRAINT `follows_seguido_id_foreign` FOREIGN KEY (`seguido_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `follows_seguidor_id_foreign` FOREIGN KEY (`seguidor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_id_foreign` (`user_id`),
  KEY `likes_post_id_foreign` (`post_id`),
  CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (2,2,1,'2025-05-14 09:59:16','2025-05-14 09:59:16'),(3,4,1,'2025-05-14 10:06:28','2025-05-14 10:06:28'),(4,2,2,'2025-05-14 10:19:44','2025-05-14 10:19:44'),(5,1,3,'2025-05-15 10:14:30','2025-05-15 10:14:30'),(6,10,4,'2025-05-15 10:32:33','2025-05-15 10:32:33'),(8,2,4,'2025-05-16 08:56:54','2025-05-16 08:56:54'),(9,1,5,'2025-05-19 10:55:45','2025-05-19 10:55:45'),(10,4,5,'2025-05-20 04:37:01','2025-05-20 04:37:01'),(11,8,6,'2025-05-20 04:43:28','2025-05-20 04:43:28'),(12,10,7,'2025-05-20 04:46:30','2025-05-20 04:46:30'),(13,1,6,'2025-05-20 08:39:06','2025-05-20 08:39:06'),(14,1,7,'2025-05-20 08:45:19','2025-05-20 08:45:19'),(15,1,2,'2025-05-20 08:45:24','2025-05-20 08:45:24'),(16,12,5,'2025-05-20 08:56:09','2025-05-20 08:56:09'),(17,12,8,'2025-05-20 08:56:21','2025-05-20 08:56:21'),(18,13,8,'2025-05-20 08:57:44','2025-05-20 08:57:44'),(19,15,9,'2025-05-20 09:02:33','2025-05-20 09:02:33'),(20,16,10,'2025-05-20 09:05:51','2025-05-20 09:05:51'),(21,2,8,'2025-05-20 09:38:06','2025-05-20 09:38:06'),(22,2,11,'2025-05-20 09:40:26','2025-05-20 09:40:26'),(23,2,3,'2025-05-20 09:45:44','2025-05-20 09:45:44'),(24,19,10,'2025-05-20 10:44:01','2025-05-20 10:44:01'),(25,20,11,'2025-05-20 10:46:33','2025-05-20 10:46:33'),(26,21,11,'2025-05-21 10:34:22','2025-05-21 10:34:22'),(27,21,1,'2025-05-21 10:34:29','2025-05-21 10:34:29'),(28,1,8,'2025-05-22 10:38:47','2025-05-22 10:38:47');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_04_22_122007_add_bio_and_foto_perfil_to_users_table',1),(5,'2025_04_23_064019_create_posts_table',1),(6,'2025_04_23_064553_create_followers_table',1),(7,'2025_04_23_094106_create_comentarios_table',1),(8,'2025_04_23_094416_create_likes_table',1),(9,'2025_04_24_111009_create_follows_table',1),(10,'2025_04_25_084143_add_equipo_favorito_to_users_table',1),(11,'2025_05_05_114901_create_notifications_table',1),(12,'2025_05_12_110901_add_banned_to_users_table',1),(13,'2025_05_21_121720_create_password_resets_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,1,'like','{\"liker_id\":2,\"liker_name\":\"paraditas\",\"post_id\":1}',1,'2025-05-14 09:59:16','2025-05-14 10:00:27'),(2,1,'follow','{\"follower_id\":2,\"follower_name\":\"paraditas\"}',1,'2025-05-14 09:59:19','2025-05-14 10:00:27'),(3,1,'comment','{\"commenter_id\":4,\"commenter_name\":\"pepilloPERICO\",\"post_id\":1,\"comment_id\":1}',1,'2025-05-14 10:06:03','2025-05-15 10:14:19'),(4,1,'follow','{\"follower_id\":4,\"follower_name\":\"pepilloPERICO\"}',1,'2025-05-14 10:06:24','2025-05-15 10:14:19'),(5,1,'like','{\"liker_id\":4,\"liker_name\":\"pepilloPERICO\",\"post_id\":1}',1,'2025-05-14 10:06:28','2025-05-15 10:14:19'),(6,4,'comment','{\"commenter_id\":5,\"commenter_name\":\"AnitaFCB\",\"post_id\":2,\"comment_id\":2}',1,'2025-05-14 10:12:54','2025-05-14 10:13:28'),(7,4,'follow','{\"follower_id\":5,\"follower_name\":\"AnitaFCB\"}',1,'2025-05-14 10:12:59','2025-05-14 10:13:28'),(8,5,'follow','{\"follower_id\":4,\"follower_name\":\"pepilloPERICO\"}',1,'2025-05-14 10:13:32','2025-05-20 04:38:33'),(9,4,'like','{\"liker_id\":2,\"liker_name\":\"paraditas\",\"post_id\":2}',1,'2025-05-14 10:19:44','2025-05-20 04:37:51'),(10,5,'follow','{\"follower_id\":2,\"follower_name\":\"paraditas\"}',1,'2025-05-14 10:20:11','2025-05-20 04:38:33'),(11,4,'follow','{\"follower_id\":2,\"follower_name\":\"paraditas\"}',1,'2025-05-14 10:20:22','2025-05-20 04:37:51'),(12,1,'follow','{\"follower_id\":6,\"follower_name\":\"luisBetico\"}',1,'2025-05-15 10:13:53','2025-05-15 10:14:19'),(13,6,'like','{\"liker_id\":1,\"liker_name\":\"rubenpm4\",\"post_id\":3}',1,'2025-05-15 10:14:30','2025-05-20 04:40:14'),(14,6,'follow','{\"follower_id\":1,\"follower_name\":\"rubenpm4\"}',1,'2025-05-15 10:14:54','2025-05-20 04:40:14'),(15,1,'like','{\"liker_id\":10,\"liker_name\":\"Joselete\",\"post_id\":4}',1,'2025-05-15 10:32:33','2025-05-15 10:33:18'),(16,6,'comment','{\"commenter_id\":10,\"commenter_name\":\"Joselete\",\"post_id\":3,\"comment_id\":3}',1,'2025-05-15 10:32:51','2025-05-20 04:40:14'),(17,6,'follow','{\"follower_id\":10,\"follower_name\":\"Joselete\"}',1,'2025-05-15 10:32:57','2025-05-20 04:40:14'),(18,1,'like','{\"liker_id\":2,\"liker_name\":\"paraditas\",\"post_id\":4}',1,'2025-05-16 08:56:54','2025-05-16 08:57:00'),(19,2,'like','{\"liker_id\":1,\"liker_name\":\"rubenpm4\",\"post_id\":5}',1,'2025-05-19 10:55:45','2025-05-19 10:55:53'),(20,6,'follow','{\"follower_id\":2,\"follower_name\":\"paraditas\"}',1,'2025-05-20 04:12:40','2025-05-20 04:40:14'),(21,2,'like','{\"liker_id\":4,\"liker_name\":\"pepilloPERICO\",\"post_id\":5}',1,'2025-05-20 04:37:01','2025-05-20 04:38:02'),(22,2,'follow','{\"follower_id\":4,\"follower_name\":\"pepilloPERICO\"}',1,'2025-05-20 04:37:55','2025-05-20 04:38:02'),(23,1,'comment','{\"commenter_id\":5,\"commenter_name\":\"AnitaFCB\",\"post_id\":4,\"comment_id\":4}',1,'2025-05-20 04:39:36','2025-05-20 04:47:09'),(24,1,'follow','{\"follower_id\":7,\"follower_name\":\"CarlosromRMA\"}',1,'2025-05-20 04:41:36','2025-05-20 04:47:09'),(25,7,'comment','{\"commenter_id\":8,\"commenter_name\":\"MartaATM\",\"post_id\":6,\"comment_id\":5}',0,'2025-05-20 04:43:26','2025-05-20 04:43:26'),(26,7,'like','{\"liker_id\":8,\"liker_name\":\"MartaATM\",\"post_id\":6}',0,'2025-05-20 04:43:28','2025-05-20 04:43:28'),(27,7,'follow','{\"follower_id\":8,\"follower_name\":\"MartaATM\"}',0,'2025-05-20 04:43:33','2025-05-20 04:43:33'),(28,9,'like','{\"liker_id\":10,\"liker_name\":\"Joselete\",\"post_id\":7}',0,'2025-05-20 04:46:30','2025-05-20 04:46:30'),(29,9,'comment','{\"commenter_id\":10,\"commenter_name\":\"Joselete\",\"post_id\":7,\"comment_id\":6}',0,'2025-05-20 04:46:38','2025-05-20 04:46:38'),(30,9,'follow','{\"follower_id\":10,\"follower_name\":\"Joselete\"}',0,'2025-05-20 04:47:01','2025-05-20 04:47:01'),(31,7,'like','{\"liker_id\":1,\"liker_name\":\"rubenpm4\",\"post_id\":6}',0,'2025-05-20 08:39:06','2025-05-20 08:39:06'),(32,9,'like','{\"liker_id\":1,\"liker_name\":\"rubenpm4\",\"post_id\":7}',0,'2025-05-20 08:45:19','2025-05-20 08:45:19'),(33,4,'like','{\"liker_id\":1,\"liker_name\":\"rubenpm4\",\"post_id\":2}',0,'2025-05-20 08:45:24','2025-05-20 08:45:24'),(34,4,'comment','{\"commenter_id\":1,\"commenter_name\":\"rubenpm4\",\"post_id\":2,\"comment_id\":7}',0,'2025-05-20 08:45:41','2025-05-20 08:45:41'),(35,10,'follow','{\"follower_id\":2,\"follower_name\":\"paraditas\"}',0,'2025-05-20 08:46:11','2025-05-20 08:46:11'),(36,2,'comment','{\"commenter_id\":12,\"commenter_name\":\"JulianPI\\u00d1A\",\"post_id\":5,\"comment_id\":8}',1,'2025-05-20 08:56:06','2025-05-20 08:58:18'),(37,2,'like','{\"liker_id\":12,\"liker_name\":\"JulianPI\\u00d1A\",\"post_id\":5}',1,'2025-05-20 08:56:09','2025-05-20 08:58:18'),(38,11,'like','{\"liker_id\":12,\"liker_name\":\"JulianPI\\u00d1A\",\"post_id\":8}',0,'2025-05-20 08:56:21','2025-05-20 08:56:21'),(39,11,'comment','{\"commenter_id\":13,\"commenter_name\":\"AlexxFCB\",\"post_id\":8,\"comment_id\":9}',0,'2025-05-20 08:57:10','2025-05-20 08:57:10'),(40,11,'like','{\"liker_id\":13,\"liker_name\":\"AlexxFCB\",\"post_id\":8}',0,'2025-05-20 08:57:44','2025-05-20 08:57:44'),(41,12,'follow','{\"follower_id\":2,\"follower_name\":\"paraditas\"}',0,'2025-05-20 08:58:20','2025-05-20 08:58:20'),(42,6,'comment','{\"commenter_id\":14,\"commenter_name\":\"juanilloSFC\",\"post_id\":3,\"comment_id\":10}',0,'2025-05-20 09:01:55','2025-05-20 09:01:55'),(43,14,'like','{\"liker_id\":15,\"liker_name\":\"UnaiATH\",\"post_id\":9}',0,'2025-05-20 09:02:33','2025-05-20 09:02:33'),(44,15,'follow','{\"follower_id\":2,\"follower_name\":\"paraditas\"}',0,'2025-05-20 09:03:56','2025-05-20 09:03:56'),(45,15,'like','{\"liker_id\":16,\"liker_name\":\"FabriFauna\",\"post_id\":10}',0,'2025-05-20 09:05:51','2025-05-20 09:05:51'),(46,16,'comment','{\"commenter_id\":2,\"commenter_name\":\"paraditas\",\"post_id\":11,\"comment_id\":11}',0,'2025-05-20 09:07:01','2025-05-20 09:07:01'),(47,11,'like','{\"liker_id\":2,\"liker_name\":\"paraditas\",\"post_id\":8}',0,'2025-05-20 09:38:06','2025-05-20 09:38:06'),(48,16,'like','{\"liker_id\":2,\"liker_name\":\"paraditas\",\"post_id\":11}',0,'2025-05-20 09:40:26','2025-05-20 09:40:26'),(49,4,'follow','{\"follower_id\":2,\"follower_name\":\"paraditas\"}',0,'2025-05-20 09:45:22','2025-05-20 09:45:22'),(50,6,'like','{\"liker_id\":2,\"liker_name\":\"paraditas\",\"post_id\":3}',0,'2025-05-20 09:45:44','2025-05-20 09:45:44'),(51,13,'follow','{\"follower_id\":1,\"follower_name\":\"rubenpm4\"}',0,'2025-05-20 09:47:22','2025-05-20 09:47:22'),(52,2,'follow','{\"follower_id\":1,\"follower_name\":\"rubenpm4\"}',1,'2025-05-20 09:47:39','2025-05-20 10:03:03'),(53,7,'follow','{\"follower_id\":1,\"follower_name\":\"rubenpm4\"}',0,'2025-05-20 10:02:50','2025-05-20 10:02:50'),(54,9,'comment','{\"commenter_id\":18,\"commenter_name\":\"Bordalismo\",\"post_id\":7,\"comment_id\":13}',0,'2025-05-20 10:05:04','2025-05-20 10:05:04'),(55,1,'follow','{\"follower_id\":18,\"follower_name\":\"Bordalismo\"}',1,'2025-05-20 10:05:13','2025-05-20 10:16:50'),(56,2,'follow','{\"follower_id\":18,\"follower_name\":\"Bordalismo\"}',1,'2025-05-20 10:05:15','2025-05-21 10:26:18'),(57,15,'like','{\"liker_id\":19,\"liker_name\":\"mauricioRMA\",\"post_id\":10}',0,'2025-05-20 10:44:01','2025-05-20 10:44:01'),(58,15,'comment','{\"commenter_id\":19,\"commenter_name\":\"mauricioRMA\",\"post_id\":10,\"comment_id\":14}',0,'2025-05-20 10:44:09','2025-05-20 10:44:09'),(59,16,'like','{\"liker_id\":20,\"liker_name\":\"MariaMagdalena\",\"post_id\":11}',0,'2025-05-20 10:46:33','2025-05-20 10:46:33'),(60,20,'comment','{\"commenter_id\":1,\"commenter_name\":\"rubenpm4\",\"post_id\":12,\"comment_id\":15}',0,'2025-05-21 09:18:39','2025-05-21 09:18:39'),(61,9,'comment','{\"commenter_id\":2,\"commenter_name\":\"paraditas\",\"post_id\":7,\"comment_id\":16}',0,'2025-05-21 09:19:16','2025-05-21 09:19:16'),(62,18,'follow','{\"follower_id\":1,\"follower_name\":\"rubenpm4\"}',0,'2025-05-21 10:32:37','2025-05-21 10:32:37'),(63,16,'like','{\"liker_id\":21,\"liker_name\":\"ImanolRSO\",\"post_id\":11}',0,'2025-05-21 10:34:22','2025-05-21 10:34:22'),(64,1,'like','{\"liker_id\":21,\"liker_name\":\"ImanolRSO\",\"post_id\":1}',1,'2025-05-21 10:34:29','2025-05-21 10:34:41'),(65,1,'follow','{\"follower_id\":21,\"follower_name\":\"ImanolRSO\"}',1,'2025-05-21 10:34:33','2025-05-21 10:34:41'),(66,11,'like','{\"liker_id\":1,\"liker_name\":\"rubenpm4\",\"post_id\":8}',0,'2025-05-22 10:38:47','2025-05-22 10:38:47');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('159paradas@gmail.com','$2y$12$PXo7uoz3B11lUk6FIgiPEe24BXDVAlOpcbayc4yjPi4QITq0Q0sga','2025-05-21 09:59:31'),('rubenparadas4@gmail.com','$2y$12$C6Nm9wL0HXLO5yvMGpbIB.ATzXVpYjQf03Ifoas5mCbrK8KwUtCyS','2025-05-21 10:10:43');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
INSERT INTO `password_resets` VALUES ('rubenparadas4@gmail.com','ZJhWXcsTZECfktzVCbz1SiA3J0wPkqN1CQzArBEzpXEPydhiTa77iFMGYDvL','2025-05-21 10:24:55');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Perdio el Madrid','2025-05-14 09:54:48','2025-05-14 09:54:48'),(2,4,'Vamos Espanyol a sentenciar la permanencia','2025-05-14 10:06:19','2025-05-14 10:06:19'),(3,6,'Vamoooh betihh a por la Championss','2025-05-15 08:59:29','2025-05-15 08:59:29'),(4,1,'Jacobazo gordoo','2025-05-15 10:14:49','2025-05-15 10:14:49'),(5,2,'Vamos Málagaa','2025-05-19 08:15:04','2025-05-19 08:15:04'),(6,7,'Hala Madrid!!! La temporada que viene será todo nuestro!!!!!','2025-05-20 04:42:07','2025-05-20 04:42:07'),(7,9,'El año que viene confío 0 en este equipo','2025-05-20 04:45:55','2025-05-20 04:45:55'),(8,11,'El año que viene Europa Valencia!!!','2025-05-20 08:54:22','2025-05-20 08:54:22'),(9,14,'Caparros vete ya','2025-05-20 09:01:21','2025-05-20 09:01:21'),(10,15,'El año que viene ganamos la Champions!!','2025-05-20 09:03:35','2025-05-20 09:03:35'),(11,16,'Vinii hijo de putaa','2025-05-20 09:06:11','2025-05-20 09:06:11'),(12,20,'EL AÑO QUE VIENE LA SEXTAA','2025-05-20 10:46:50','2025-05-20 10:46:50');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baneado` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `foto_perfil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipo_favorito` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rubenpm4','rubenparadas4@gmail.com',NULL,'$2y$12$uucaoEDOLGF9Qu5AauRzHe1DNfsaV.7EX5AgEj5F1RvguQ.XcxLX6',0,NULL,'2025-05-14 09:53:36','2025-05-14 09:54:27','Hala Madrid!!!','fotos_perfil/7EKrBbza4K99YsVPFtf1FU0tc5bGvwxM8aKqxRte.png','Real Madrid'),(2,'paraditas','159paradas@gmail.com',NULL,'$2y$12$9J6sOCJh9Rxy1C7MI.5LAOlOrT5CBKUeAscHmqk91KlsouHtCPoRe',0,NULL,'2025-05-14 09:58:24','2025-05-20 04:33:08','Soy Admin','fotos_perfil/kPCzYfJDs4Q0IQ9c5iZgOxCHTLXcpKkTmsr8Sht7.png','Málaga'),(3,'ban','pruebaban@gmail.com',NULL,'$2y$12$iYeshuMxYxwtQP52kglIOekK71BrHVO.DQgHkKYUKZRmbACJvqiSi',1,NULL,'2025-05-14 10:04:08','2025-05-15 08:40:13',NULL,NULL,NULL),(4,'pepilloPERICO','pepillo12@gmail.com',NULL,'$2y$12$vCNRCgS0WZzrr0apW2221u25nqGobpS5sRxO66FGqWymfu6ZQZ2Ai',0,NULL,'2025-05-14 10:05:21','2025-05-20 04:37:25','Perico hasta la medula!!!','fotos_perfil/T3Pn54hDLDpYwZ8c2ID0jH4rPdjYfTXCHrqaw2Bk.png','Espanyol'),(5,'AnitaFCB','anitafcb@gmail.com',NULL,'$2y$12$NSrzL5ZfAojWUX2M5g4c7OOC5EkXXcsVlXLLXc3.mzW8Z5u9y6.4m',0,NULL,'2025-05-14 10:12:04','2025-05-20 04:39:06','Del Negreira FC desde chica','fotos_perfil/etiCk9AhZaXwwTR8sweV037hMyP4mwszPxaZ9d9Z.png','Barcelona'),(6,'luisBetico','luisarahid@gmail.com',NULL,'$2y$12$jZxUqpdN2yUkh1ncu3HHouA75qT76dn0fHTIZA0I2rruU/ERLxU.C',0,NULL,'2025-05-15 08:58:51','2025-05-20 04:40:29','Betico desde chiquetito','fotos_perfil/SunWGNEbxcDPam8gJkCxanaAh76NUMEo09jJ9Bfj.png','Betis'),(7,'CarlosromRMA','carlosrom@gmail.com',NULL,'$2y$12$IOH.x929402AHVCDyHaV..pZfmzz2XddJk2lff6zZ1VK4i1csUk8y',0,NULL,'2025-05-15 10:27:20','2025-05-20 04:41:25','Hala Madrid!!!','fotos_perfil/h0PwrOJ0N0hzDgo6v1IhQxplwXq5B0pvDIHIqSuR.png','Real Madrid'),(8,'MartaATM','martaarahid@gmail.com',NULL,'$2y$12$fe0YqLvmJyI2OimB7/UDN.vOYr9YhVwYZcSuphfztiz.kjMogkWK2',0,NULL,'2025-05-15 10:28:20','2025-05-20 04:42:53','Atletiii!!!','fotos_perfil/lB7o9KOM2xhT5MuW3khXCHZwJCLD8GEsd4Sw1yY4.png','Atlético'),(9,'JaviPucela','javipucela@gmail.com',NULL,'$2y$12$jv7aIyqXk4dUcSTG7opD/ewCLWsrLPlSi.yXrDDZ8vvoEt/s8TaZS',0,NULL,'2025-05-15 10:29:16','2025-05-20 04:45:30','Somos malisimos','fotos_perfil/XjNk9N0XCLZFm5vkhkZVitjuumKaN9MuVnDXKjt2.png','Valladolid'),(10,'Joselete','joselete45@gmail.com',NULL,'$2y$12$vU/tIbvIKyk7619SQfD8ceCgedbojv8lyA7WOId.8Sb7IAtR.s4YK',0,NULL,'2025-05-15 10:30:19','2025-05-20 04:46:48','Socio del Villarreal desde los 10 años','fotos_perfil/VLr75Z02TPmmH7HJUem45QcCSELILZQnc8UcrrP0.png','Villarreal'),(11,'FerValencia','nandito46@gmail.com',NULL,'$2y$12$SSAewR5yX88lY3TbHzAjeutmj1Fyq5wiX4PSAZJ8K4aZwoKUVXy06',0,NULL,'2025-05-20 08:53:11','2025-05-20 08:53:45','Ché desde la cuna','fotos_perfil/G3l3o5VNBnYwWHgDautAWSmljhMRfaoOA4Bbl959.png','Valencia'),(12,'JulianPIÑA','lapina37@gmail.com',NULL,'$2y$12$GnN.X.4415BKX.ETdTlEN.kmkQ/8x.A/QvsjEa4qaPk06r5082Ose',0,NULL,'2025-05-20 08:55:24','2025-05-20 08:55:52','El Depor volverá','fotos_perfil/pfDeMect0tW73M0kidPqknOMhwaztePq4yhmrVLk.png','Deportivo'),(13,'AlexxFCB','alejandrofcb@gmail.com',NULL,'$2y$12$TubsVgvkZX8pnWeSj7zQM.4N4dGBZRjhHg22Qum4/.au7B5jSJWse',0,NULL,'2025-05-20 08:57:02','2025-05-20 08:57:39','Ansafatismo','fotos_perfil/ZKk4zARE8iROpeyuIaTOn6iNdTgViffPRC9WRQk1.png','Barcelona'),(14,'juanilloSFC','juanillo@gmail.com',NULL,'$2y$12$SaOwRQowfQSG56OYe33fuOAF.bBk9h11ju24e.IKt2rkO6XsFs7tC',0,NULL,'2025-05-20 09:00:33','2025-05-20 09:01:04','Socio del Sevilla desde los 3 años','fotos_perfil/FFTOVoqPWMo7JTJF6vg8TaTMKvwgETCJCr519HGi.png','Sevilla'),(15,'UnaiATH','unaigomez27@gmail.com',NULL,'$2y$12$jUWvx6NoLnqhsX40Z6E5nuSTC0ynGvVMt0rK8SDCAsbjGoTf8KLje',0,NULL,'2025-05-20 09:02:29','2025-05-20 09:02:59','El Athletic es mi religión','fotos_perfil/mzbjYzLlhtYnjWTpr8TOOa5W8OvGfLNpcLslQDMS.png','Athletic'),(16,'FabriFauna','fabrifauna@gmail.com',NULL,'$2y$12$WywCxh01O3HfkvCLtgKiPeIQz5QJuwx8QHWd.gnlS6y0I8tWprZyu',1,NULL,'2025-05-20 09:05:04','2025-05-20 09:06:31','Periodismo de calidad','fotos_perfil/irYhsj7gBATIFeVDfykeuqBXIuVQoUXLEQ9lXlOB.png',NULL),(17,'pruebaban2','pruebaban2@gmail.com',NULL,'$2y$12$.W/oPx6I4nxgp3gaua7FxObRju752ZfkZpuw/l4e2NbZO/tCxGuFG',1,NULL,'2025-05-20 09:46:34','2025-05-20 09:46:46',NULL,NULL,NULL),(18,'Bordalismo','joegomez44@gmail.com',NULL,'$2y$12$yuIAb3MnXXck8fFX/wLE7eMcVm4Ap39OWO68VSORzudLQ9EnX6vXu',0,NULL,'2025-05-20 10:04:13','2025-05-20 10:04:41','Subete a la Bordaleta','fotos_perfil/HO1OZylkscPot4WvhtIxxa8WYLJn6oReiHsgBW3W.png','Getafe'),(19,'mauricioRMA','mauritrent12@gmail.com',NULL,'$2y$12$T43iK1yoM.0CcQMlq1ndbO5P6zDEbPRz7xc/WYj1yDXWnQ5Mwrhpm',0,NULL,'2025-05-20 10:43:19','2025-05-20 10:43:51','Halaaaaa Madridd','fotos_perfil/Eq0jJq2CwXghj4BGlDKLHa2AX5Ue19bllfoH8B4r.png','Real Madrid'),(20,'MariaMagdalena','mariamagdalena24@gmail.com',NULL,'$2y$12$Bkn1XdAFglFaMyeSRNcTPufewLVoVXhP/YH.EO6fBz0DzOZ.5WA0W',0,NULL,'2025-05-20 10:45:31','2025-05-20 10:46:25','Visca Barcaaa','fotos_perfil/oNoYLPX27ktmHUl5li8eL103Rw3bTiRUDU48tEn3.png','Barcelona'),(21,'ImanolRSO','imanol2024@gmail.com',NULL,'$2y$12$EuvQ9qE4cWuf2K07cm4yr.epyEpLAR4WqvVo3IPTIAkUI0WGrHUWy',0,NULL,'2025-05-21 10:33:35','2025-05-21 10:34:13','Anoeta mi casa','fotos_perfil/wCK6PpbNLC2Ls6FGpR8h3HMLGRCTZEporchwoRSZ.png','Real Sociedad');
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

-- Dump completed on 2025-05-25 17:39:07
