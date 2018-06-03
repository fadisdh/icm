-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2015 at 07:54 PM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `title`, `type`, `link`, `model_id`, `model_type`, `created_at`, `updated_at`) VALUES
(21, NULL, NULL, '55411333da60f.txt', 7, 'EquipmentOperation', '2015-04-29 22:21:55', '2015-04-29 22:21:55'),
(22, NULL, NULL, '554115249600e.txt', 3, 'ToolOperation', '2015-04-29 22:30:12', '2015-04-29 22:30:12'),
(23, 'Quotation', NULL, '5543c03e5874a.pdf', 20, 'Supplier', '2015-05-01 23:04:46', '2015-05-01 23:04:46'),
(24, 'عرض السعر', NULL, '5543d3c13c613.pdf', 21, 'Supplier', '2015-05-02 00:28:01', '2015-05-02 00:28:01'),
(25, 'Quotation', NULL, '5543d465bff87.pdf', 22, 'Supplier', '2015-05-02 00:30:45', '2015-05-02 00:30:45'),
(26, 'Quotation', NULL, '5543d5d23e39a.pdf', 23, 'Supplier', '2015-05-02 00:36:50', '2015-05-02 00:36:50'),
(27, 'Quotation', NULL, '5543d6823452c.pdf', 24, 'Supplier', '2015-05-02 00:39:46', '2015-05-02 00:39:46'),
(28, 'Quotation', NULL, '5543d7a5ec410.pdf', 25, 'Supplier', '2015-05-02 00:44:37', '2015-05-02 00:44:37'),
(29, 'Quotation', NULL, '5544b76e5903e.pdf', 9, 'Equipment', '2015-05-02 16:39:26', '2015-05-02 16:39:26'),
(30, 'Quotation', NULL, '5544b7de4852c.pdf', 10, 'Equipment', '2015-05-02 16:41:18', '2015-05-02 16:41:18'),
(31, 'Quotation', NULL, '5544b871d5518.pdf', 11, 'Equipment', '2015-05-02 16:43:45', '2015-05-02 16:43:45'),
(32, 'Quotation', NULL, '5544b9364729f.pdf', 12, 'Equipment', '2015-05-02 16:47:02', '2015-05-02 16:47:02'),
(33, 'Quotation', NULL, '5544bc2a2d7ba.pdf', 26, 'Supplier', '2015-05-02 16:59:38', '2015-05-02 16:59:38'),
(34, NULL, NULL, '5544bdbbdb72d.jpg', 5, 'Material', '2015-05-02 17:06:19', '2015-05-02 17:06:19'),
(35, NULL, NULL, '5545e4fda1e55.jpg', 9, 'labor', '2015-05-03 14:06:05', '2015-05-03 14:06:05'),
(39, NULL, NULL, '5545ee816fb53.jpg', 13, 'labor', '2015-05-03 14:46:41', '2015-05-03 14:46:41'),
(40, NULL, NULL, '5545ef92cc5f7.jpg', 10, 'labor', '2015-05-03 14:51:14', '2015-05-03 14:51:14'),
(41, NULL, NULL, '5545f01791377.jpg', 11, 'labor', '2015-05-03 14:53:27', '2015-05-03 14:53:27'),
(42, NULL, NULL, '5545f0f79874e.jpg', 12, 'labor', '2015-05-03 14:57:11', '2015-05-03 14:57:11'),
(43, NULL, NULL, '5545f42c25947.jpg', 14, 'labor', '2015-05-03 15:10:52', '2015-05-03 15:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `contact_person`
--

CREATE TABLE IF NOT EXISTS `contact_person` (
  `id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(18) DEFAULT '0',
  `fax` int(18) DEFAULT '0',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_person`
--

INSERT INTO `contact_person` (`id`, `supplier_id`, `name`, `phone`, `fax`, `email`, `address`, `created_at`, `updated_at`) VALUES
(36, 17, 'عع', 85, 0, '', NULL, '2015-04-15 03:08:49', '2015-04-15 03:08:49'),
(45, 14, 'مجدي', 66288293, 0, '', NULL, '2015-04-26 14:09:16', '2015-04-26 14:09:16'),
(46, 18, 'مدير المشتريات', 94444234, 94444543, '', NULL, '2015-05-01 00:13:41', '2015-05-01 00:13:41'),
(47, 19, 'Mohammad Nayef', 50226740, 22449046, 'pacs@pacsgroups.com', NULL, '2015-05-01 00:15:55', '2015-05-01 00:15:55'),
(48, 20, 'Ahmad Saiduddin', 55271330, 24914937, '', NULL, '2015-05-01 23:04:46', '2015-05-01 23:04:46'),
(49, 21, 'عبدالمنعم', 99419276, 0, '', NULL, '2015-05-02 00:28:01', '2015-05-02 00:28:01'),
(50, 22, 'Faran Ahmed Asghar Ali', 99021714, 24746160, '', NULL, '2015-05-02 00:30:45', '2015-05-02 00:30:45'),
(51, 23, 'مجدي فرج عامر', 60656661, 0, '', NULL, '2015-05-02 00:36:50', '2015-05-02 00:36:50'),
(52, 24, 'مجدي فرج عامر', 60656661, 0, '', NULL, '2015-05-02 00:39:46', '2015-05-02 00:39:46'),
(53, 25, 'عبدو علي الغريب', 99587132, 24918107, '', NULL, '2015-05-02 00:44:37', '2015-05-02 00:44:37'),
(54, 26, 'عبدالسميع', 99404147, 24915271, '', NULL, '2015-05-02 16:59:38', '2015-05-02 16:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `project_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Site Work', '02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'CONCRETE', '03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'MASONRY', '04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'METALS\r\n', '05', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'WOOD AND PLASTICS', '06', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'THERMAL & MOISTURE PROTECTION', '07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'DOORS AND WINDOWS', '08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'FINISHES', '09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 1, 'SPECIALTIES', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 1, 'EQUIPMENT', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 1, 'SPECIAL CONSTRUCTION', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `price_validity_from` date DEFAULT NULL,
  `price_validity_to` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `project_id`, `user_id`, `name`, `name_arabic`, `type`, `source`, `description`, `unit`, `rate`, `price_validity_from`, `price_validity_to`, `created_at`, `updated_at`) VALUES
(9, NULL, 1, 'Mobile Crane 45 Ton/ 50 Ton', 'موبايل كرين 45 -50 طن', 'equipment_rental', '', 'Crane 45- 50 TON', NULL, NULL, NULL, NULL, '2015-05-02 16:39:26', '2015-05-06 18:59:24'),
(10, NULL, 1, 'Mobile Crane 25 Ton/ 35 Ton', 'موبايل كرين 25-35  طن', 'equipment_rental', NULL, 'Crane 25- 35 TON', NULL, NULL, NULL, NULL, '2015-05-02 16:41:18', '2015-05-02 16:41:18'),
(11, NULL, 1, 'Mobile Crane 20 Ton', 'موبايل كرين 20 طن', 'equipment_rental', NULL, 'Mobile Crane 20 Ton', NULL, NULL, NULL, NULL, '2015-05-02 16:43:45', '2015-05-02 16:43:45'),
(12, NULL, 1, 'Trailer', 'تريلة مع سائق', 'equipment_rental', NULL, 'Trailer', NULL, NULL, NULL, NULL, '2015-05-02 16:47:02', '2015-05-02 16:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_operations`
--

CREATE TABLE IF NOT EXISTS `equipment_operations` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned DEFAULT '0',
  `equipment_id` int(10) unsigned DEFAULT NULL,
  `equipment_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_id` int(10) unsigned DEFAULT '0',
  `division_id` int(10) unsigned DEFAULT '0',
  `section_id` int(10) unsigned DEFAULT '0',
  `item_id` int(10) unsigned DEFAULT '0',
  `date_operation` date DEFAULT NULL,
  `working_hours` decimal(10,2) unsigned DEFAULT '0.00',
  `overtime` decimal(10,2) unsigned DEFAULT '0.00',
  `num_items` int(10) unsigned DEFAULT '0',
  `distribution` decimal(3,1) unsigned DEFAULT '0.0',
  `quantity` int(11) DEFAULT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportar_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `equipment_operations`
--

INSERT INTO `equipment_operations` (`id`, `project_id`, `user_id`, `equipment_id`, `equipment_name`, `type`, `operation`, `source`, `project_location`, `report_id`, `division_id`, `section_id`, `item_id`, `date_operation`, `working_hours`, `overtime`, `num_items`, `distribution`, `quantity`, `receiver`, `condition`, `transportar_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 9, NULL, 'company_equipment', 'in', 'project', '1', 0, NULL, NULL, NULL, '2015-04-29', '0.00', '0.00', 0, '0.0', 1, 'aaaaa', 'very_good', 'assdas', '2015-05-14 15:39:45', '2015-05-14 15:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `section_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'item1', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'item2', 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'item3', 'C', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'item4', 'D', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 'Dewatering', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 'Excavation to final excavation level', 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 'Termite control treatment all as specified', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 'Gray, heavy duty, l shape interlocking code PV-2 Basemet Roof', 'C', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 9, 'Kerbstone size 150 x 600 mm laid on concrete slab/Ground Level', 'F1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 10, 'Solid directional arrow right (Type E2R)/ Ground Level', 'E', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 11, '240 mm wide horizontal water stops in raft foundation at construction and control joints', 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 12, '80-100 mm Thick concrete topping (screed) to receive traffic deck system- Car park, driveway', 'A6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 13, '100 x 150 mm lintel', 'D6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 14, '100 mm Thick walls', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 15, '100 mm Thick walls', 'F', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 16, 'Built up section 420 x 410 x 10 mm  (Mark P1)', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 17, 'Panoramic elevator core closure decking (73.60 m level)', 'E3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 18, 'Elevator pit ladder 450 mm wide 2850 mm high', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 19, 'White plastic laminated, glossy finished wall paneling (code W-19)', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 20, '2 layer of waterproofing membrane to horizontal surfaces of blinding concrete', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 21, 'To Sump pits, ramp gutters, washout pit, elevator pit etc.', 'D', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 22, 'Non toxic waterproofing to floor, walls and soffits of water tanks', 'F', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 23, 'Concrete and blockwork surfaces behind ceramic & aluminum wall cladding', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 24, 'External rendering system Type R-1A over and including 50 mm thick rigid insulation with fiber mesh layer and', 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 25, 'External rendering system Type R-1B over concrete or blockwork walls with 20 mm x 20 mm deep reveal', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 26, 'Light weight foam concrete (750 kg/m3) laid in slope minimum thickness 40 mm ', 'E', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 27, 'Polyurethane floor coating (heavy duty) with anti skid aggregate over smooth trowelled concrete surfaces -', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 28, '125 mm girth profiled aluminum flashing including fixing to structure, sealant with back-up rod and all', 'D', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 29, 'Door panel size 900 x 2100 mm (Type A5)', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 30, 'Stainless steel access door for water tank size 800 x 600 mm side fixed, comprising 2 mm thick', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 31, 'Exterior unit roller shutter to suit opening size 4050 x 2400 mm overall 4050 x 2400 mm overall', 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 32, 'Set No.1\r\n', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 33, '20 mm Thick to concrete or blockwork to receive paint (code W-02)', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 33, '20 mm Thick to concrete or blockwork to receive paint (code W-03)', 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 34, '12 mm Thick Gypsum board suspended ceiling including bulkhead and GRG alcove (Code C-10)', 'C', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 35, 'Gypsum board lining comprising 16 mm thick gypsum wallboard linings, HDG metal stud & furring channels, ', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 36, '300 x 300 mm White fully vitrified ceramic floor tiles, matt finish (Code F-04)', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 37, 'Terrazzo floor tiles 200 x 200 x 25 mm thick (code F-10)', 'G', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 38, '600 x 600 mm tile ceiling (code C-11)', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 39, '2 mm Thick multi color Linoleum sheet flooring (Code F-52) (terrazzo below measured separately) ', 'C', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 40, '600 x 600 mm heavy duty carpet tiles laid over terrazzo tiles (code F-23)(terrazzo below, if any, measured separately) ', 'F', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 41, 'To cement plaster surfaces (Code W-03)', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 42, '100 x 100 x 1200 mm high non-marking natural rubber corner guards fixed 300 mm high from finished floor', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 43, 'Mirror (W=600 mm x H=1000 mm), custom made (Code-2b)', 'C', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 44, 'Two set of horizontal monorail tracks (monorail -1 & 2) façade maintenance system with one set of self', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 45, 'Pair of exit and entry gate parking control units with traffic lights at basement with 100 magnetic card for', 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 46, '75 mm Thick concrete slab with mesh reinforcement', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `labors`
--

CREATE TABLE IF NOT EXISTS `labors` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `occupation_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residency_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `labors`
--

INSERT INTO `labors` (`id`, `project_id`, `user_id`, `occupation_id`, `name`, `name_arabic`, `nationality`, `residency_type`, `civil_id`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(9, NULL, 1, 10, 'Ahmad Mostafa Ahmad', 'أحمد مصطفى أحمد', 'EG', 'type_18', '290071602904', 60421530, '', '2015-05-03 14:06:05', '2015-05-03 14:06:05'),
(10, NULL, 1, 10, 'Hamadah AlMasri Jaber', 'حماده المصري جابر محمد', 'EG', 'type_18', '290012503551', 50579172, '', '2015-05-03 14:31:13', '2015-05-03 14:31:13'),
(11, NULL, 1, 10, 'Tarek Mohamed Fathy', 'طارق محمد فتحي محمد', 'EG', 'type_20', 'ِ13425983', 66980971, '', '2015-05-03 14:39:50', '2015-05-03 14:39:50'),
(12, NULL, 1, 10, 'Abdelnaser Fathy Mohamed', 'عبدالناصر فتحي محمد عبدالناصر', 'EG', 'type_20', 'A05321600', 67008243, '', '2015-05-03 14:42:17', '2015-05-03 14:42:17'),
(13, NULL, 1, 10, 'Mohammad Ezzat Sabri', 'محمد عزت صبري محمد', 'EG', 'type_18', '294020102115', 67097128, '', '2015-05-03 14:46:41', '2015-05-03 14:46:41'),
(14, NULL, 1, 13, 'Rawlid abbas', 'ديلور عباس علم', 'PK', 'type_18', '283050802151', 99030894, '', '2015-05-03 15:10:52', '2015-05-03 15:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `unit_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `validity_from` date DEFAULT NULL,
  `validity_to` date DEFAULT NULL,
  `quotation_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `project_id`, `user_id`, `unit_id`, `supplier_id`, `name`, `name_arabic`, `country`, `price`, `validity_from`, `validity_to`, `quotation_reference`, `note`, `created_at`, `updated_at`) VALUES
(4, NULL, 1, 5, 17, 'Cement', 'اسمنت', 'KW', '1.25', '2010-06-01', '2015-06-17', 'xcd', 'Test', '2015-04-15 03:28:16', '2015-04-26 14:19:37'),
(5, NULL, 1, 4, 26, 'Helmet White 3M', 'خوذة ابيض نوع 3 ام', 'US', '4.75', '2015-01-01', '2015-12-31', 'N/A', 'High Quality', '2015-05-02 17:06:19', '2015-05-02 17:06:30'),
(6, NULL, 1, 4, 26, 'ترنكي طول 1 م لوير كهرباء 6 مم', 'ترنكي طول 1 م لوير كهرباء 6 مم', 'CN', '0.40', '2015-01-01', '2015-12-31', 'N/A', 'ترنكي طول 1 م لوير كهرباء 6 مم', '2015-05-02 17:09:38', '2015-05-02 17:09:38'),
(7, NULL, 1, 6, 26, 'واير كهرباء طول 10 م قياس 2.5 مم', 'واير كهرباء طول 10 م قياس 2.5 مم', 'AF', '0.35', '2015-01-01', '2015-12-31', 'N/A', 'واير كهرباء طول 10 م قياس 2.5 مم', '2015-05-02 21:14:04', '2015-05-02 21:14:04'),
(8, NULL, 1, 4, 26, 'لمبة كهرباء نيون طول 60 سم', 'لمبة كهرباء نيون طول 60 سم', 'AF', '0.40', '2015-01-01', '2015-10-31', 'N/A', 'لمبة كهرباء نيون طول 60 سم', '2015-05-02 21:15:26', '2015-05-02 21:15:26'),
(9, NULL, 1, 4, 26, 'محول نيون انجليزي', 'محول نيون انجليزي', 'AF', '1.10', '2015-01-01', '2015-12-31', 'N/A', 'محول نيون انجليزي', '2015-05-02 21:17:46', '2015-05-02 21:17:46'),
(10, NULL, 1, 4, 26, 'fluorescent starter', 'ستارتر كهرباء نيون', 'AF', '0.15', '2015-01-01', '2015-12-31', 'N/A', 'ستارتر كهرباء نيون', '2015-05-02 21:20:26', '2015-05-02 21:20:26'),
(11, NULL, 1, 7, 26, 'Connector 12 Ampere', 'كونكتر كهرباء 12 امبير', 'AF', '3.75', '2015-01-01', '2015-12-31', 'N/A', 'كونكتر كهرباء 12 امبير', '2015-05-02 21:23:03', '2015-05-02 21:23:03'),
(12, NULL, 1, 4, 26, 'شقاط كهرباء 6 انش', 'شقاط كهرباء 6 انش', 'CN', '2.25', '2015-01-01', '2015-12-31', 'N/A', 'شقاط كهرباء 6 انش', '2015-05-02 21:25:35', '2015-05-02 21:25:35'),
(13, NULL, 1, 4, 26, 'اتوماتيك 60 امبير سنجل فاز انجليزي', 'اتوماتيك 60 امبير سنجل فاز انجليزي', 'GB', '9.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:28:45', '2015-05-02 21:28:45'),
(14, NULL, 1, 4, 26, 'fluorescent 120 cm ', 'نيون ابيض 120 سم', 'AF', '0.60', '2015-01-01', '2015-12-31', 'N/A', 'نيون ابيض 120 سم', '2015-05-02 21:31:54', '2015-05-02 21:31:54'),
(15, NULL, 1, 8, 26, 'واير كهرباء 2.5 مم 3 كور', 'واير كهرباء 2.5 مم 3 كور', 'AF', '14.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:34:21', '2015-05-02 21:34:21'),
(16, NULL, 1, 4, 26, 'مشترك كهرباء 4 عيون طول 5 متر واير', 'مشترك كهرباء 4 عيون طول 5 متر واير', 'AF', '4.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:37:55', '2015-05-02 21:37:55'),
(17, NULL, 1, 4, 26, 'جاكيت فسفوري', 'جاكيت فسفوري', 'AF', '0.50', '2015-01-01', '2015-12-31', 'N/A', 'جاكيت فسفوري', '2015-05-02 21:39:04', '2015-05-02 21:39:04'),
(18, NULL, 1, 4, 26, 'First Aid Box', 'صيدلية اسعافات اولية شنطة كامل', 'AF', '18.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:40:40', '2015-05-02 21:40:40'),
(19, NULL, 1, 9, 26, 'سولتيكس 18 مم مقطرن', 'سولتيكس 18 مم مقطرن', 'AF', '4.10', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:42:05', '2015-05-02 21:42:05'),
(20, NULL, 1, 9, 26, 'شبك مساح  60 * 244 سم', 'شبك مساح  60 * 244 سم', 'AF', '0.33', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:45:10', '2015-05-02 21:45:10'),
(21, NULL, 1, 5, 26, 'وشر مساح حديد', 'وشر مساح حديد', 'AF', '2.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:47:17', '2015-05-02 21:47:17'),
(22, NULL, 1, 11, 26, 'مسمار خشب 6 سم ديموند', 'مسمار خشب 6 سم ديموند', 'AF', '4.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:52:11', '2015-05-02 21:52:11'),
(23, NULL, 1, 10, 26, 'اس بي ار مركز', 'اس بي ار مركز', 'AF', '9.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:54:45', '2015-05-02 21:54:45'),
(24, NULL, 1, 7, 26, 'برغي كيربي', 'برغي كيربي', 'AF', '0.75', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 21:57:38', '2015-05-02 21:57:38'),
(25, NULL, 1, 4, 26, 'مسدس سيلكون', 'مسدس سيلكون', 'AF', '1.25', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:02:09', '2015-05-02 22:02:09'),
(26, NULL, 1, 4, 26, 'سيلكون ابيض البحر', 'سيلكون ابيض البحر', 'AF', '0.60', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:04:18', '2015-05-02 22:04:18'),
(27, NULL, 1, 4, 26, 'دسك 14 انش ثص حديد', 'دسك 14 انش ثص حديد', 'AF', '1.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:05:05', '2015-05-02 22:05:05'),
(28, NULL, 1, 4, 26, 'انارة 60 سم * 60 سم كامل', 'انارة 60 سم * 60 سم كامل', 'AF', '8.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:06:01', '2015-05-02 22:06:01'),
(29, NULL, 1, 4, 26, 'علبة بلاك 13 امبير دبل حديد', 'علبة بلاك 13 امبير دبل حديد', 'AF', '0.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:07:37', '2015-05-02 22:07:37'),
(30, NULL, 1, 4, 26, 'بلاك 13 امبير مع بوكس مع الغطاء', 'بلاك 13 امبير مع بوكس مع الغطاء', 'AF', '1.25', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:09:36', '2015-05-02 22:09:36'),
(31, NULL, 1, 4, 26, 'تيب كهرباء', 'تيب كهرباء', 'AF', '0.10', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:30:45', '2015-05-02 22:30:45'),
(32, NULL, 1, 4, 26, 'راس بلاك 15 امبير', 'راس بلاك 15 امبير', 'AF', '1.10', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:31:53', '2015-05-02 22:31:53'),
(33, NULL, 1, 4, 26, 'بلاك 15 امبير مع بوكس مع الغطاء', 'بلاك 15 امبير مع بوكس مع الغطاء', 'AF', '1.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:33:10', '2015-05-02 22:33:10'),
(34, NULL, 1, 4, 26, 'مشترك كهرباء الماني 4 عيون طول 5 متر واير', 'مشترك كهرباء الماني 4 عيون طول 5 متر واير', 'AF', '6.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:34:18', '2015-05-02 22:34:18'),
(35, NULL, 1, 4, 26, 'بلاك 13 امبير دبل', 'بلاك 13 امبير دبل', 'AF', '1.25', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:36:13', '2015-05-02 22:36:13'),
(36, NULL, 1, 7, 26, 'برغي 6 مم * 6سم سن صاج', 'برغي 6 مم * 6سم سن صاج', 'AF', '1.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:37:47', '2015-05-02 22:37:47'),
(37, NULL, 1, 4, 26, 'طربال ازرق 8 م * 8 م', 'طربال ازرق 8 م * 8 م', 'AF', '3.25', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:38:42', '2015-05-02 22:38:42'),
(38, NULL, 1, 4, 26, 'طربال ازرق 6 م * 6 م', 'طربال ازرق 6 م * 6 م', 'AF', '2.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:39:29', '2015-05-02 22:39:29'),
(39, NULL, 1, 4, 26, 'سلك لحام 2.5 مم', 'سلك لحام 2.5 مم', 'AF', '1.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:40:59', '2015-05-02 22:40:59'),
(40, NULL, 1, 4, 26, 'متر كروم طول 10 م تايون', 'متر كروم طول 10 م تايون', 'AF', '1.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:42:18', '2015-05-02 22:42:18'),
(41, NULL, 1, 4, 26, 'فحمات صاروخ ماكيتا 153', 'فحمات صاروخ ماكيتا 153', 'AF', '0.75', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:43:24', '2015-05-02 22:43:24'),
(42, NULL, 1, 4, 26, 'كشاف كهرباء 400 واط ايطالي مع لمبة كامل', 'كشاف كهرباء 400 واط ايطالي مع لمبة كامل', 'AF', '11.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:44:16', '2015-05-02 22:44:16'),
(43, NULL, 1, 4, 26, 'متر كروم طول 5 م تايون', 'متر كروم طول 5 م تايون', 'AF', '1.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:45:24', '2015-05-02 22:45:24'),
(44, NULL, 1, 4, 26, 'تخشينة خرسانة كبير', 'تخشينة خرسانة كبير', 'AF', '1.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:47:26', '2015-05-02 22:47:26'),
(45, NULL, 1, 12, 26, 'كذلك عمال خرسانة', 'كذلك عمال خرسانة', 'AF', '1.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:49:11', '2015-05-02 22:49:11'),
(46, NULL, 1, 4, 26, 'مسطرة المونيوم 8*8*2مم طول 6 م', 'مسطرة المونيوم 8*8*2مم طول 6 م', 'AF', '13.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:50:22', '2015-05-02 22:50:22'),
(47, NULL, 1, 7, 26, 'كمامة طبي مستطيل', 'كمامة طبي مستطيل', 'AF', '1.25', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:51:48', '2015-05-02 22:51:48'),
(48, NULL, 1, 4, 26, 'دسك قص حديد 9 انش', 'دسك قص حديد 9 انش', 'AF', '0.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:52:39', '2015-05-02 22:52:39'),
(49, NULL, 1, 4, 26, 'سيقتي شوز نصف رقبة نوع ممتاز', 'سيقتي شوز نصف رقبة نوع ممتاز', 'AF', '7.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:54:35', '2015-05-02 22:54:35'),
(50, NULL, 1, 4, 26, 'بلت / حزام كرين طول 6 م حمولة 4 طن', 'بلت / حزام كرين طول 6 م حمولة 4 طن', 'AF', '9.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:55:49', '2015-05-02 22:55:49'),
(51, NULL, 1, 4, 26, 'خيط علام احمر نايلون', 'خيط علام احمر نايلون', 'AF', '0.15', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:56:44', '2015-05-02 22:56:44'),
(52, NULL, 1, 4, 26, 'عربانة فرنسي اخضر الاصلي', 'عربانة فرنسي اخضر الاصلي', 'AF', '12.00', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:57:50', '2015-05-02 22:57:50'),
(53, NULL, 1, 4, 26, 'تاير عربانة كامل', 'تاير عربانة كامل', 'AF', '1.75', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:58:48', '2015-05-02 22:58:48'),
(54, NULL, 1, 8, 26, 'رول امن وسلامة تحذيري', 'رول امن وسلامة تحذيري', 'AF', '1.15', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 22:59:51', '2015-05-02 22:59:51'),
(55, NULL, 1, 4, 26, 'طربال ازرق 6 م * 14 م', 'طربال ازرق 6 م * 14 م', 'AF', '4.25', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 23:00:47', '2015-05-02 23:00:47'),
(56, NULL, 1, 8, 26, 'رول نايلون 250 مايكرون', 'رول نايلون 250 مايكرون', 'AF', '1.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 23:01:45', '2015-05-02 23:01:45'),
(57, NULL, 1, 4, 26, 'بسكوت خرسانة قياس 5 سم', 'بسكوت خرسانة قياس 5 سم', 'AF', '0.04', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 23:04:44', '2015-05-02 23:04:44'),
(58, NULL, 1, 7, 26, 'برغي 6 مم * 4 سم سن صاج', 'برغي 6 مم * 4 سم سن صاج', 'AF', '1.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 23:06:25', '2015-05-02 23:06:25'),
(59, NULL, 1, 4, 26, 'جاروف خرسانة مع يده', 'جاروف خرسانة مع يده', 'AF', '1.75', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 23:07:35', '2015-05-02 23:07:35'),
(60, NULL, 1, 4, 26, 'مفصلات باب حديد 25 مم', 'مفصلات باب حديد 25 مم', 'AF', '0.30', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 23:08:42', '2015-05-02 23:08:42'),
(61, NULL, 1, 4, 26, 'شوكة مع عصاء سميك', 'شوكة مع عصاء سميك', 'AF', '1.50', '2015-01-01', '2015-12-31', 'N/A', '', '2015-05-02 23:11:03', '2015-05-02 23:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE IF NOT EXISTS `occupations` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `project_id`, `user_id`, `name`, `name_arabic`, `created_at`, `updated_at`) VALUES
(10, NULL, 1, 'Unskilled ', 'عامل عام', '2015-04-15 03:03:52', '2015-04-15 03:03:52'),
(12, NULL, 1, 'Carpenter', 'نجار', '2015-04-18 19:30:09', '2015-04-18 19:30:09'),
(13, NULL, 1, 'Steel Welder', 'حداد', '2015-05-03 15:01:16', '2015-05-03 15:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL DEFAULT '0',
  `model_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_validity_from` date DEFAULT NULL,
  `price_validity_to` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `model_id`, `model_type`, `unit`, `price`, `price_validity_from`, `price_validity_to`, `created_at`, `updated_at`) VALUES
(1, 1, 'Equipment', 'year', '166.00', '2015-10-02', '2015-11-30', '0000-00-00 00:00:00', '2015-04-26 14:36:49'),
(2, 1, 'Equipment', 'day', '133.00', '2015-12-16', '2015-12-07', '0000-00-00 00:00:00', '2015-04-26 14:36:49'),
(6, 1, 'Equipment', 'month', '112.00', '2015-12-12', '2015-12-29', '2015-03-31 04:05:10', '2015-04-26 14:36:49'),
(8, 7, 'Equipment', 'hour', '112.00', '2015-04-12', '2015-05-18', '2015-04-18 19:21:51', '2015-04-18 19:21:51'),
(9, 8, 'labor', 'hour', '112.00', '2015-04-12', '2016-04-11', '2015-04-18 21:02:53', '2015-04-21 13:49:05'),
(10, 8, 'labor', 'day', '1122222.00', '2011-04-10', '2012-04-19', '2015-04-18 21:03:08', '2015-04-21 13:49:05'),
(11, 8, 'Equipment', 'day', '100.00', '2015-01-01', '2015-12-31', '2015-04-30 16:53:50', '2015-04-30 16:53:50'),
(12, 9, 'Equipment', 'day', '120.00', '2015-01-01', '2015-06-30', '2015-05-02 16:39:26', '2015-05-06 18:59:24'),
(13, 10, 'Equipment', 'day', '80.00', '2015-01-01', '2015-06-30', '2015-05-02 16:41:18', '2015-05-02 16:41:18'),
(14, 11, 'Equipment', 'day', '60.00', '2015-01-01', '2015-06-30', '2015-05-02 16:43:45', '2015-05-02 16:43:45'),
(15, 12, 'Equipment', 'day', '45.00', '2015-01-01', '2015-06-30', '2015-05-02 16:47:02', '2015-05-02 16:47:02'),
(16, 9, 'labor', 'hour', '1.00', '2015-01-01', '2015-12-31', '2015-05-03 14:06:05', '2015-05-03 14:06:05'),
(17, 10, 'labor', 'hour', '1.00', '2015-01-01', '2015-12-31', '2015-05-03 14:31:13', '2015-05-03 14:51:14'),
(18, 11, 'labor', 'hour', '1.00', '2015-01-01', '2015-12-31', '2015-05-03 14:39:50', '2015-05-03 14:53:27'),
(19, 12, 'labor', 'hour', '1.00', '2015-01-01', '2015-12-31', '2015-05-03 14:42:17', '2015-05-03 14:57:11'),
(20, 13, 'labor', 'hour', '1.00', '2015-01-01', '2015-12-31', '2015-05-03 14:46:41', '2015-05-03 14:46:41'),
(21, 14, 'labor', 'hour', '1.20', '2015-01-01', '2015-12-31', '2015-05-03 15:10:52', '2015-05-03 15:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `name_arabic`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Project 1', 'مشروع رقم 1', 'Lorem Ipsum /......', '2015-03-15 05:20:16', '2015-03-15 05:20:16'),
(8, 1, 'Behbehani Clinics', 'انشاء وانجاز برج عيادات بهبهاني', 'قيمة المشروع 1,060,000 د.ك', '2015-04-15 03:44:42', '2015-04-15 03:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `project_equipment`
--

CREATE TABLE IF NOT EXISTS `project_equipment` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `equipment_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `project_labor`
--

CREATE TABLE IF NOT EXISTS `project_labor` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `labor_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `project_material`
--

CREATE TABLE IF NOT EXISTS `project_material` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `material_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `project_occupation`
--

CREATE TABLE IF NOT EXISTS `project_occupation` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `occupation_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_supplier`
--

CREATE TABLE IF NOT EXISTS `project_supplier` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `supplier_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `project_tool`
--

CREATE TABLE IF NOT EXISTS `project_tool` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `tool_id` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `project_unit`
--

CREATE TABLE IF NOT EXISTS `project_unit` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `unit_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `project_id`, `date`, `created_at`, `updated_at`) VALUES
(22, 8, '2015-04-01', '2015-04-15 03:44:59', '2015-04-15 03:44:59'),
(23, 1, '2015-04-29', '2015-04-29 22:39:35', '2015-04-29 22:39:35'),
(24, 8, '2015-04-30', '2015-04-30 16:55:07', '2015-04-30 16:55:07'),
(25, 8, '2015-05-22', '2015-05-03 13:12:41', '2015-05-03 13:12:41'),
(26, 1, '2015-05-14', '2015-05-14 15:47:24', '2015-05-14 15:47:24'),
(27, 8, '2015-05-21', '2015-05-18 21:59:32', '2015-05-18 21:59:32'),
(28, 1, '2015-05-05', '2015-05-18 22:00:54', '2015-05-18 22:00:54'),
(29, 8, '2015-05-26', '2015-05-26 12:47:36', '2015-05-26 12:47:36'),
(30, 1, '2015-06-01', '2015-06-01 13:33:54', '2015-06-01 13:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `reports_activities`
--

CREATE TABLE IF NOT EXISTS `reports_activities` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_id` int(10) unsigned NOT NULL DEFAULT '0',
  `section_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports_activities`
--

INSERT INTO `reports_activities` (`id`, `report_id`, `activity`, `division_id`, `section_id`, `item_id`, `created_at`, `updated_at`) VALUES
(4, 23, 'Activity 1', 1, 1, 1, '2015-04-30 00:29:15', '2015-04-30 00:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `reports_company_labors`
--

CREATE TABLE IF NOT EXISTS `reports_company_labors` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `labor_id` int(10) unsigned NOT NULL DEFAULT '0',
  `division_id` int(10) unsigned NOT NULL DEFAULT '0',
  `section_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `working_hours` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `overtime` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `num_items` int(10) unsigned NOT NULL DEFAULT '0',
  `distribution` decimal(3,1) unsigned NOT NULL DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports_company_materials`
--

CREATE TABLE IF NOT EXISTS `reports_company_materials` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `supplier_id` int(10) unsigned DEFAULT '0',
  `material_id` int(10) unsigned DEFAULT NULL,
  `unit_id` int(10) unsigned DEFAULT NULL,
  `receipt_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(10) unsigned DEFAULT '0',
  `unit_price` decimal(10,2) unsigned DEFAULT NULL,
  `receipt_ref` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_items` int(10) DEFAULT '0',
  `division_id` int(10) unsigned DEFAULT '0',
  `section_id` int(10) unsigned DEFAULT '0',
  `item_id` int(10) unsigned DEFAULT '0',
  `distribution` decimal(3,1) unsigned DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports_company_materials`
--

INSERT INTO `reports_company_materials` (`id`, `report_id`, `supplier_id`, `material_id`, `unit_id`, `receipt_type`, `material`, `quantity`, `unit_price`, `receipt_ref`, `num_items`, `division_id`, `section_id`, `item_id`, `distribution`, `created_at`, `updated_at`) VALUES
(1, 23, 17, 4, NULL, 'receipt', NULL, 32, NULL, 'HG23213', 1, 1, 1, 1, '1.0', '2015-04-30 00:27:03', '2015-04-30 00:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `reports_notes`
--

CREATE TABLE IF NOT EXISTS `reports_notes` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports_notes`
--

INSERT INTO `reports_notes` (`id`, `report_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 11, 'report 11 notes ', '2015-03-16 15:57:58', '2015-03-16 15:57:58'),
(2, 11, 'dsdasdasdaasd', '2015-03-19 03:51:21', '2015-03-19 03:51:21'),
(3, 23, 'Notes .2015-04-29', '2015-04-30 00:30:01', '2015-04-30 00:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `reports_site_staffs`
--

CREATE TABLE IF NOT EXISTS `reports_site_staffs` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `division_id` int(10) unsigned NOT NULL DEFAULT '0',
  `section_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `staff_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `working_hours` decimal(10,2) unsigned DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports_site_staffs`
--

INSERT INTO `reports_site_staffs` (`id`, `report_id`, `division_id`, `section_id`, `item_id`, `staff_id`, `working_hours`, `created_at`, `updated_at`) VALUES
(7, 23, 1, 1, 1, 'Ahmad', '8.00', '2015-04-30 00:28:38', '2015-04-30 00:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `reports_subcontractor_labors`
--

CREATE TABLE IF NOT EXISTS `reports_subcontractor_labors` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `supplier_id` int(10) unsigned NOT NULL DEFAULT '0',
  `division_id` int(10) unsigned NOT NULL DEFAULT '0',
  `section_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `num_labors` int(10) unsigned NOT NULL DEFAULT '0',
  `skill` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `distribution` decimal(3,1) unsigned NOT NULL DEFAULT '0.0',
  `num_items` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports_subcontractor_labors`
--

INSERT INTO `reports_subcontractor_labors` (`id`, `report_id`, `supplier_id`, `division_id`, `section_id`, `item_id`, `num_labors`, `skill`, `distribution`, `num_items`, `created_at`, `updated_at`) VALUES
(1, 23, 25, 7, 17, 18, 3, '12', '0.0', 2, '2015-05-10 21:58:35', '2015-05-10 21:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `reports_subcontractor_materials`
--

CREATE TABLE IF NOT EXISTS `reports_subcontractor_materials` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `supplier_id` int(10) unsigned NOT NULL DEFAULT '0',
  `material` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `unit_id` int(10) unsigned NOT NULL DEFAULT '0',
  `division_id` int(10) unsigned NOT NULL DEFAULT '0',
  `section_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `quantity` int(10) unsigned DEFAULT '0',
  `receipt_ref` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_items` int(10) DEFAULT '0',
  `distribution` decimal(3,1) unsigned NOT NULL DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports_tools`
--

CREATE TABLE IF NOT EXISTS `reports_tools` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `used` tinyint(4) NOT NULL,
  `division_id` int(10) unsigned NOT NULL DEFAULT '0',
  `section_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `working_hours` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `overtime` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `distribution` decimal(3,1) unsigned NOT NULL DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports_tools`
--

INSERT INTO `reports_tools` (`id`, `report_id`, `used`, `division_id`, `section_id`, `item_id`, `working_hours`, `overtime`, `distribution`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 1, 1, 2, '12.00', '22.00', '11.0', '2015-03-16 15:12:17', '2015-03-17 04:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `reports_violations`
--

CREATE TABLE IF NOT EXISTS `reports_violations` (
  `id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports_violations`
--

INSERT INTO `reports_violations` (`id`, `report_id`, `description`, `type`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 11, 'violation 1 description', 'type', 'ahmad', '12', '2015-03-16 15:47:58', '2015-03-16 15:47:58'),
(2, 11, 'dsadas', 'dsds', 'sdsd', '3232', '2015-03-19 03:51:44', '2015-03-19 03:51:44'),
(3, 21, 'sdgas', 'asdg', 'sdga', 'sdg', '2015-04-15 05:15:35', '2015-04-15 05:15:35'),
(4, 23, 'Violation Description', 'Type of Violation', 'Name of Violation', '22', '2015-04-30 00:29:49', '2015-04-30 00:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Role 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL,
  `division_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `division_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'section1', '001', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'section2', '002', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 4, 'section3', '003', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Dewatering', '140', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'EARTHWORK AND SHORING', '200', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'TERMITE CONTROL', '280', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'PAVING AND SURFACING', '515', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'ROAD MARKING AND SIGNS', '891', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 4, 'CAST IN PLACE CONCRETE', '300', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 4, 'CONCRETE TOPPINGS', '320', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 4, 'STRUCTURAL PRECAST CONCRETE', '410', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 6, 'CONCRETE MASONRY UNIT', '220', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 6, 'AERATED CONCRETE MASONRY UNIT', '221', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 7, 'STRUCTURAL STEEL', '120', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 7, 'STEEL CLADDING & DECKING', '300', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 7, 'ORNAMENTAL METAL', '700', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 8, 'ARCHITECTURAL WOOD WORKS', '400', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 9, 'MEMBRANE WATERPROOFING', '110', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 9, 'CAPILLARY WATERPROOFING', '135', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 9, 'LIQUID APPLIED WATERPROOFING', '140', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 9, 'BUILDING INSULATION', '200', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 9, 'EXTERNAL RENDERING ON INSULATION SYSTEM', '242', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 9, 'EXTERNAL RENDERING ', '244', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 9, 'BITUMINOUS ROOFING SYSTEM', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 9, 'TRAFFIC DECK SYSTEM', '570', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 9, 'FLASHING SHEET METAL AND', '625', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 10, 'HOLLOW METAL WORKS', '100', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 10, 'ACCESS DOORS AND FRAMES', '305', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 10, 'OVERHEAD SLIDING SHUTTER', '330', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 10, 'FINISH HARDWARE', '710', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 11, 'CEMENT PLASTER ', '220', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 11, 'GYPSUM BOARD CEILING SYSTEM', '250', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 11, 'DRYWALL SYSTEM', '251', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 11, 'TILE', '300', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 11, 'TERRAZZO TILES', '400', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 11, 'ACOUSTICAL CEILING', '510', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 11, 'LINOLEUM FLOOR COVERING', '654', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 11, 'CARPET TILE', '680', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 11, 'PAINTING', '900', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 28, 'BUMPERS AND CORNER GUARDS ', '260', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 28, 'TOILET ROOM ACCESSORIES', '800', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 29, 'FACADE MAINTENANCE SYSTEMS', '014', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 29, 'PARKING CONTROL EQUIPMENT', '150', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 30, 'VIBRATION ISOLATION SYSTEMS', '080', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `project_id`, `user_id`, `name`, `name_arabic`, `type`, `created_at`, `updated_at`) VALUES
(14, NULL, 1, 'Majde Farag', 'مجدي فرج', '["Workmanship","Supplier bill type"]', '2015-04-14 05:07:46', '2015-04-18 21:58:56'),
(17, NULL, 1, 'Al Mtwakel', 'المتوكل', '["Supply tools | materials | equipment"]', '2015-04-15 03:08:49', '2015-04-15 03:08:49'),
(18, NULL, 1, 'Al Madar for construction Materials', 'شركة المدار لمواد البناء', '["Supply tools | materials | equipment"]', '2015-05-01 00:13:40', '2015-05-01 00:13:40'),
(19, NULL, 1, 'PACS Engineering General Trading & Contracting Co.', 'مجموعة باكس الهندسية للتجارة العامة والمقاولات', '["Supply tools | materials | equipment"]', '2015-05-01 00:15:55', '2015-05-01 00:15:55'),
(20, NULL, 1, 'Hassan Kabbani Est for General Construction of Buildings', 'مؤسسة حسان قباني للمقاولات العامة للمباني', '["Supply tools | materials | equipment"]', '2015-05-01 23:04:46', '2015-05-01 23:04:46'),
(21, NULL, 1, 'Al Anadel General Trading', 'مؤسسة العنادل للمقاولات العامة', '["Equipment rental"]', '2015-05-02 00:28:01', '2015-05-02 00:28:01'),
(22, NULL, 1, 'Al Osaimi Heavy and Light Equipments', 'مؤسسة العصيمي للمعدات والأليات الخفبفة والثقيلة', '["Equipment rental"]', '2015-05-02 00:30:45', '2015-05-02 00:30:45'),
(23, NULL, 1, 'International City Heavy & Light Equipmnet', 'المدينة الدولية للمعدات الخفيفة والثقيلة', '["Equipment rental"]', '2015-05-02 00:36:50', '2015-05-02 00:36:50'),
(24, NULL, 1, 'International City Heavy & Light Equipmnet', 'المدينة الدولية للمعدات الخفيفة والثقيلة', '["Equipment rental"]', '2015-05-02 00:39:46', '2015-05-02 00:39:46'),
(25, NULL, 1, 'Abdo Al Ghareeb', 'عبدو الغريب', '["Equipment rental","Supply tools | materials | equipment","Supply and install"]', '2015-05-02 00:44:37', '2015-05-02 00:44:37'),
(26, NULL, 1, 'Al-Sanea & Al Adwani for Construction Materials Co.', 'شركة الصانع والعدواني لمواد البناء', '["Supply tools | materials | equipment"]', '2015-05-02 16:59:37', '2015-05-02 16:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_rate` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price_validity_from` date DEFAULT NULL,
  `price_validity_to` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `project_id`, `user_id`, `name`, `name_arabic`, `type`, `source`, `description`, `unit`, `unit_rate`, `quantity`, `price_validity_from`, `price_validity_to`, `created_at`, `updated_at`) VALUES
(3, NULL, 1, 'Jack 3m', 'قائم طول 3م', 'company_tool', 'storage_yard', 'حالة جيدة', 'day', '0.35', 500, '2013-06-04', '2015-04-30', '2015-04-15 03:43:16', '2015-04-30 00:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `tool_operations`
--

CREATE TABLE IF NOT EXISTS `tool_operations` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `tool_id` int(10) unsigned DEFAULT NULL,
  `division_id` int(10) unsigned DEFAULT '0',
  `section_id` int(10) unsigned DEFAULT '0',
  `item_id` int(10) unsigned DEFAULT '0',
  `tool_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used` tinyint(1) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_id` int(10) unsigned DEFAULT NULL,
  `date_operation` date DEFAULT NULL,
  `working_hours` decimal(10,2) unsigned DEFAULT '0.00',
  `overtime` decimal(10,2) unsigned DEFAULT '0.00',
  `num_items` int(10) unsigned DEFAULT '0',
  `distribution` decimal(3,1) unsigned DEFAULT '0.0',
  `quantity` int(11) DEFAULT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportar_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tool_operations`
--

INSERT INTO `tool_operations` (`id`, `project_id`, `user_id`, `tool_id`, `division_id`, `section_id`, `item_id`, `tool_name`, `used`, `type`, `operation`, `source`, `project_location`, `report_id`, `date_operation`, `working_hours`, `overtime`, `num_items`, `distribution`, `quantity`, `receiver`, `condition`, `transportar_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 3, NULL, NULL, NULL, NULL, 0, 'company_tool', 'in', 'project', '1', NULL, '2015-04-29', '0.00', '0.00', 0, '0.0', 1, 'Omar', 'very_good', 'Ahmad', '2015-04-29 16:44:39', '2015-05-06 18:15:11'),
(2, NULL, 1, 3, NULL, NULL, NULL, NULL, 0, 'company_tool', 'in', 'storage_yard', NULL, NULL, '2015-06-01', '0.00', '0.00', 0, '0.0', 1, 'Omar', 'very_good', 'Ahmad', '2015-04-29 16:46:01', '2015-04-29 22:33:50'),
(3, 1, 1, 3, 1, 1, 1, 'Tool 1', 1, 'subcontractors_tool', 'out', 'Source 1', '1', 23, '2015-04-29', '0.00', '0.00', 0, '0.0', 1, 'project', 'very_good', 'Omar', '2015-04-29 22:30:12', '2015-04-29 23:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_arabic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `project_id`, `user_id`, `name`, `name_arabic`, `created_at`, `updated_at`) VALUES
(4, NULL, 1, 'Piece', 'حبة', '2015-04-15 03:11:40', '2015-04-15 03:11:40'),
(5, NULL, 1, 'Bag', 'كيس', '2015-04-15 03:12:16', '2015-04-15 03:12:16'),
(6, NULL, 1, 'متر طولي', 'Meter run', '2015-05-02 17:22:41', '2015-05-02 17:22:41'),
(7, NULL, 1, 'Packet', 'باكيت', '2015-05-02 17:23:34', '2015-05-02 17:23:34'),
(8, NULL, 1, 'لقة', 'Rol', '2015-05-02 17:24:10', '2015-05-02 17:24:10'),
(9, NULL, 1, 'Sheet', 'لوح', '2015-05-02 17:24:34', '2015-05-02 17:24:34'),
(10, NULL, 1, 'Drum', 'درام', '2015-05-02 17:24:52', '2015-05-02 17:24:52'),
(11, NULL, 1, 'Box', 'صندوق', '2015-05-02 21:51:06', '2015-05-02 21:51:06'),
(12, NULL, 1, 'Twin', 'جوز', '2015-05-02 22:48:25', '2015-05-02 22:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL DEFAULT '0',
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `firstname`, `lastname`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rateb', 'AlArtah', '$2y$10$W7niEFWsvGzkroaGosRg1uJSJ0dV7GMEqGXu2FnXLh5DswGO.TZfe', 'admin@icm.com', 'LG2wiboSHWaAHx8jUdk8WrICxcPzzYOj48KEvTZmxYeIR4RC3S', '2015-03-08 09:37:26', '2015-05-27 10:36:46'),
(2, 1, 'User 1', 'User 11', '$2y$10$2eX9fwIHAgPQk9xdgK/FIOc0fFPV7iuMEO7I73qBZHmwULz2DV1eK', 'rrr@gmail.com', 'ZJTsJYHybEAf90RJIJdPVY4MJgW4oia9V8ksYboyLQEPm6c7gK', '2015-03-08 09:37:26', '2015-03-08 09:38:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_person`
--
ALTER TABLE `contact_person`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_contact_person_suppliers` (`supplier_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_divisions_projects` (`project_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_equipments_projects` (`project_id`), ADD KEY `FK_equipments_users` (`user_id`);

--
-- Indexes for table `equipment_operations`
--
ALTER TABLE `equipment_operations`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_equipment_operations_projects` (`project_id`), ADD KEY `FK_equipment_operations_users` (`user_id`), ADD KEY `FK_equipment_operations_equipments` (`equipment_id`), ADD KEY `FK_equipment_operations_divisions` (`division_id`), ADD KEY `FK_equipment_operations_sections` (`section_id`), ADD KEY `FK_equipment_operations_items` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_items_sections` (`section_id`);

--
-- Indexes for table `labors`
--
ALTER TABLE `labors`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_labors_projects` (`project_id`), ADD KEY `FK_labors_users` (`user_id`), ADD KEY `FK_labors_occupations` (`occupation_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_logs_users` (`user_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_materials_projects` (`project_id`), ADD KEY `FK_materials_users` (`user_id`), ADD KEY `FK_materials_units` (`unit_id`), ADD KEY `FK_materials_suppliers` (`supplier_id`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_occupations_projects` (`project_id`), ADD KEY `FK_occupations_users` (`user_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_projects_users` (`user_id`);

--
-- Indexes for table `project_equipment`
--
ALTER TABLE `project_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_labor`
--
ALTER TABLE `project_labor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_material`
--
ALTER TABLE `project_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_occupation`
--
ALTER TABLE `project_occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_supplier`
--
ALTER TABLE `project_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tool`
--
ALTER TABLE `project_tool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_unit`
--
ALTER TABLE `project_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_reports_projects` (`project_id`);

--
-- Indexes for table `reports_activities`
--
ALTER TABLE `reports_activities`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_reports_activities_reports` (`report_id`), ADD KEY `FK_reports_activities_divisions` (`division_id`), ADD KEY `FK_reports_activities_sections` (`section_id`), ADD KEY `FK_reports_activities_items` (`item_id`);

--
-- Indexes for table `reports_company_labors`
--
ALTER TABLE `reports_company_labors`
  ADD PRIMARY KEY (`id`), ADD KEY `report_id` (`report_id`), ADD KEY `FK_reports_company_labors_labors` (`labor_id`), ADD KEY `FK_reports_company_labors_divisions` (`division_id`), ADD KEY `FK_reports_company_labors_sections` (`section_id`), ADD KEY `FK_reports_company_labors_items` (`item_id`);

--
-- Indexes for table `reports_company_materials`
--
ALTER TABLE `reports_company_materials`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_reports_company_materials_reports` (`report_id`), ADD KEY `FK_reports_company_materials_materials` (`material_id`), ADD KEY `FK_reports_company_materials_suppliers` (`supplier_id`), ADD KEY `FK_reports_company_materials_units` (`unit_id`), ADD KEY `FK_reports_company_materials_divisions` (`division_id`), ADD KEY `FK_reports_company_materials_sections` (`section_id`), ADD KEY `FK_reports_company_materials_items` (`item_id`);

--
-- Indexes for table `reports_notes`
--
ALTER TABLE `reports_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports_site_staffs`
--
ALTER TABLE `reports_site_staffs`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_reports_site_staffs_reports` (`report_id`), ADD KEY `FK_reports_site_staffs_divisions` (`division_id`), ADD KEY `FK_reports_site_staffs_sections` (`section_id`), ADD KEY `FK_reports_site_staffs_items` (`item_id`);

--
-- Indexes for table `reports_subcontractor_labors`
--
ALTER TABLE `reports_subcontractor_labors`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_reports_subcontractor_labors_reports` (`report_id`), ADD KEY `FK_reports_subcontractor_labors_suppliers` (`supplier_id`), ADD KEY `FK_reports_subcontractor_labors_divisions` (`division_id`), ADD KEY `FK_reports_subcontractor_labors_sections` (`section_id`), ADD KEY `FK_reports_subcontractor_labors_items` (`item_id`);

--
-- Indexes for table `reports_subcontractor_materials`
--
ALTER TABLE `reports_subcontractor_materials`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_reports_subcontractor_materials_reports` (`report_id`), ADD KEY `FK_reports_subcontractor_materials_suppliers` (`supplier_id`), ADD KEY `FK_reports_subcontractor_materials_units` (`unit_id`), ADD KEY `FK_reports_subcontractor_materials_divisions` (`division_id`), ADD KEY `FK_reports_subcontractor_materials_sections` (`section_id`), ADD KEY `FK_reports_subcontractor_materials_items` (`item_id`);

--
-- Indexes for table `reports_tools`
--
ALTER TABLE `reports_tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports_violations`
--
ALTER TABLE `reports_violations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_sections_divisions` (`division_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_suppliers_projects` (`project_id`), ADD KEY `FK_suppliers_users` (`user_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_tools_projects` (`project_id`), ADD KEY `FK_tools_users` (`user_id`);

--
-- Indexes for table `tool_operations`
--
ALTER TABLE `tool_operations`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_tool_operations_projects` (`project_id`), ADD KEY `FK_tool_operations_users` (`user_id`), ADD KEY `tool_id` (`tool_id`), ADD KEY `FK_tool_operations_divisions` (`division_id`), ADD KEY `FK_tool_operations_sections` (`section_id`), ADD KEY `FK_tool_operations_items` (`item_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_units_projects` (`project_id`), ADD KEY `FK_units_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_users_roles` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `contact_person`
--
ALTER TABLE `contact_person`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `equipment_operations`
--
ALTER TABLE `equipment_operations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `labors`
--
ALTER TABLE `labors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `project_equipment`
--
ALTER TABLE `project_equipment`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_labor`
--
ALTER TABLE `project_labor`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_material`
--
ALTER TABLE `project_material`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_occupation`
--
ALTER TABLE `project_occupation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_supplier`
--
ALTER TABLE `project_supplier`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_tool`
--
ALTER TABLE `project_tool`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_unit`
--
ALTER TABLE `project_unit`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `reports_activities`
--
ALTER TABLE `reports_activities`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reports_company_labors`
--
ALTER TABLE `reports_company_labors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reports_company_materials`
--
ALTER TABLE `reports_company_materials`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reports_notes`
--
ALTER TABLE `reports_notes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reports_site_staffs`
--
ALTER TABLE `reports_site_staffs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reports_subcontractor_labors`
--
ALTER TABLE `reports_subcontractor_labors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reports_subcontractor_materials`
--
ALTER TABLE `reports_subcontractor_materials`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports_tools`
--
ALTER TABLE `reports_tools`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reports_violations`
--
ALTER TABLE `reports_violations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tool_operations`
--
ALTER TABLE `tool_operations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_person`
--
ALTER TABLE `contact_person`
ADD CONSTRAINT `FK_contact_person_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `divisions`
--
ALTER TABLE `divisions`
ADD CONSTRAINT `FK_divisions_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipments`
--
ALTER TABLE `equipments`
ADD CONSTRAINT `FK_equipments_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_equipments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment_operations`
--
ALTER TABLE `equipment_operations`
ADD CONSTRAINT `FK_equipment_operations_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_equipment_operations_equipments` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_equipment_operations_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_equipment_operations_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_equipment_operations_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_equipment_operations_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
ADD CONSTRAINT `FK_items_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `labors`
--
ALTER TABLE `labors`
ADD CONSTRAINT `FK_labors_occupations` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_labors_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_labors_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
ADD CONSTRAINT `FK_logs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
ADD CONSTRAINT `FK_materials_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_materials_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_materials_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_materials_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `occupations`
--
ALTER TABLE `occupations`
ADD CONSTRAINT `FK_occupations_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_occupations_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
ADD CONSTRAINT `FK_projects_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
ADD CONSTRAINT `FK_reports_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports_activities`
--
ALTER TABLE `reports_activities`
ADD CONSTRAINT `FK_reports_activities_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_activities_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_activities_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_activities_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports_company_labors`
--
ALTER TABLE `reports_company_labors`
ADD CONSTRAINT `FK_reports_company_labors_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_labors_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_labors_labors` FOREIGN KEY (`labor_id`) REFERENCES `labors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_labors_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_labors_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports_company_materials`
--
ALTER TABLE `reports_company_materials`
ADD CONSTRAINT `FK_reports_company_materials_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_materials_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_materials_materials` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `FK_reports_company_materials_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_materials_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_materials_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_company_materials_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reports_site_staffs`
--
ALTER TABLE `reports_site_staffs`
ADD CONSTRAINT `FK_reports_site_staffs_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_site_staffs_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_site_staffs_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_site_staffs_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports_subcontractor_labors`
--
ALTER TABLE `reports_subcontractor_labors`
ADD CONSTRAINT `FK_reports_subcontractor_labors_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_labors_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_labors_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_labors_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_labors_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports_subcontractor_materials`
--
ALTER TABLE `reports_subcontractor_materials`
ADD CONSTRAINT `FK_reports_subcontractor_materials_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_materials_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_materials_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_materials_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_materials_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_reports_subcontractor_materials_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
ADD CONSTRAINT `FK_sections_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
ADD CONSTRAINT `FK_suppliers_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_suppliers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tools`
--
ALTER TABLE `tools`
ADD CONSTRAINT `FK_tools_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tools_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tool_operations`
--
ALTER TABLE `tool_operations`
ADD CONSTRAINT `FK_tool_operations_divisions` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tool_operations_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tool_operations_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tool_operations_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tool_operations_tools` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tool_operations_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
ADD CONSTRAINT `FK_units_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_units_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
