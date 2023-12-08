-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 08, 2023 at 01:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sa_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reset_code` varchar(50) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `delivery_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `username`, `name`, `email`, `password`, `phone`, `status`, `reset_code`, `created_date`, `updated_date`, `delivery_address`) VALUES
(1, 'BU436limex', 'En Xi', 'limex-pm20@student.tarc.edu.my', '$2y$10$Fa.yWmIWzfC7PgHGV9YILedOlImF67H2qXOn9/V3SJsHV8Cx1aCgK', '0124356798', 'Activate', NULL, '2023-12-08 06:41:12', NULL, 'ArteS, Jalan Bukit Gambir, Gelugor, Penang'),
(2, 'BU496chloe', 'Chloe', 'chloe@gmail.com', '$2y$10$W2BCth5.8X2X7SppK0Dfee3T3XjO0jMH0okArtFI1Ch.W0IvEUDCW', '0124566789', 'Activate', NULL, '2023-12-08 07:10:10', NULL, 'Blok-100, Taman Selatan, Jelutong, Pulau Pinang'),
(3, 'BU350shio@', 'Shio', 'shio@gmail.com', '$2y$10$Nk.K4iBYzp7A73GZfmSpZe4AEEzl84H/VqBugXzVDLPj2wpVtQCuO', '0134636655', 'Activate', NULL, '2023-12-08 07:24:55', NULL, 'Hangout Gym, The Plazzia, Gelugor, Penang'),
(4, 'BU160mk5@g', 'M K', 'Deleted User4', '$2y$10$tUJp00dsCqfGEhKiY7f6b.a6va23ONCIHovVIBUmEwHCC4bCgytKi', '0147775678', 'Deactivate', NULL, '2023-12-08 07:52:48', '2023-12-08 08:02:45', 'Blok bunga, Jalan Perak, Jelutong, Pulau Pinang'),
(5, 'BU947mk5@g', 'M K', 'mk5@gmail.com', '$2y$10$X3O2cBuG13SZKLdJGAArSewuJS6P2GyOWfPCZr1hYU/fjWH6CPinK', '0147775678', 'Activate', NULL, '2023-12-08 08:03:52', NULL, 'Blok bunga, Jalan Perak, Jelutong, Pulau Pinang');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_detail_id` int(11) NOT NULL,
  `product_detail_no` varchar(255) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `material` varchar(50) NOT NULL,
  `delivery_address` text NOT NULL,
  `delivery_fee` float NOT NULL,
  `total_price` float NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_no`, `product_id`, `product_detail_id`, `product_detail_no`, `buyer_id`, `status`, `product_name`, `price`, `quantity`, `size`, `color`, `material`, `delivery_address`, `delivery_fee`, `total_price`, `payment_method`, `created_date`, `updated_date`) VALUES
(1, 'BKG148474OCT', 1, 1, 'SKU194184OCT', 1, 'Closed', 'Plain Satin Blouse Long Sleeve Shirt Women Blouse New Loose Retro Shirt Top', 19.49, 100, 'M', 'Black', 'Silk', 'ArteS, Jalan Bukit Gambir, Gelugor, Penang', 5, 1954, 'Cash on Delivery', '2023-10-31 06:46:22', '2023-12-08 06:49:10'),
(2, 'BKG787111OCT', 1, 3, 'SKU194200OCT', 1, 'Closed', 'Plain Satin Blouse Long Sleeve Shirt Women Blouse New Loose Retro Shirt Top', 19.49, 1, 'M', 'Pink', 'Silk', 'ArteS, Jalan Bukit Gambir, Gelugor, Penang', 5, 24.49, 'Cash on Delivery', '2023-10-31 16:52:06', '2023-12-08 06:57:03'),
(3, 'BKG536564NOV', 1, 3, 'SKU194200OCT', 1, 'Closed', 'Plain Satin Blouse Long Sleeve Shirt Women Blouse New Loose Retro Shirt Top', 19.49, 1, 'M', 'Pink', 'Silk', 'U Garden, Jalan Bukit Gambir, Gelugor, Penang', 5, 24.49, 'Cash on Delivery', '2023-11-08 06:57:41', '2023-12-08 07:00:10'),
(4, 'BKG760377NOV', 2, 5, 'SKU764805NOV', 1, 'Closed', 'Women Blouse Turtleneck High Neck Long Sleeve', 16, 1, 'Free', 'White', 'Comfortable', 'ArteS, Jalan Bukit Gambir, Gelugor, Penang', 5, 21, 'Cash on Delivery', '2023-11-08 07:09:17', '2023-12-08 07:42:01'),
(5, 'BKG537630NOV', 1, 1, 'SKU194184OCT', 2, 'Closed', 'Plain Satin Blouse Long Sleeve Shirt Women Blouse New Loose Retro Shirt Top', 19.49, 1, 'M', 'Black', 'Silk', 'Blok-100, Taman Selatan, Jelutong, Pulau Pinang', 5, 24.49, 'Cash on Delivery', '2023-11-08 07:10:28', '2023-12-08 07:23:09'),
(6, 'BKG945522NOV', 1, 3, 'SKU194200OCT', 2, 'Closed', 'Plain Satin Blouse Long Sleeve Shirt Women Blouse New Loose Retro Shirt Top', 19.49, 3, 'M', 'Pink', 'Silk', 'Blok-100, Taman Selatan, Jelutong, Pulau Pinang', 5, 63.47, 'Cash on Delivery', '2023-11-08 07:10:42', '2023-12-08 07:20:49'),
(7, 'BKG868478NOV', 2, 4, 'SKU764795NOV', 2, 'Closed', 'Women Blouse Turtleneck High Neck Long Sleeve', 16, 2, 'Free', 'Black', 'Comfortable', 'Blok-100, Taman Selatan, Jelutong, Pulau Pinang', 5, 37, 'E-Wallet', '2023-11-08 07:10:52', '2023-12-08 07:23:59'),
(8, 'BKG645561NOV', 1, 1, 'SKU194184OCT', 2, 'Closed', 'Plain Satin Blouse Long Sleeve Shirt Women Blouse New Loose Retro Shirt Top', 19.49, 100, 'M', 'Black', 'Silk', 'Blok-100, Taman Selatan, Jelutong, Pulau Pinang', 5, 1954, 'E-Wallet', '2023-11-08 07:15:47', '2023-12-08 07:21:56'),
(9, 'BKG847090DEC', 2, 5, 'SKU764805NOV', 3, 'Closed', 'Women Blouse Turtleneck High Neck Long Sleeve', 16, 5, 'Free', 'White', 'Comfortable', 'Hangout Gym, The Plazzia, Gelugor, Penang', 5, 85, 'E-Wallet', '2023-12-08 07:25:37', '2023-12-08 07:26:33'),
(10, 'BKG83292DEC', 3, 8, 'SKU144297DEC', 3, 'Closed', 'Suit Pants High Waist Elastic Waist Straight Leg Pants Women Casual Pants Seluar Slack Wanita Slimming Wide Leg', 26.9, 1, 'M', 'Mint Green', 'Cotton', 'Hangout Gym, The Plazzia, Gelugor, Penang', 5, 31.9, 'E-Wallet', '2023-12-08 07:33:37', '2023-12-08 07:35:08'),
(11, 'BKG482450DEC', 3, 7, 'SKU144287DEC', 3, 'Closed', 'Suit Pants High Waist Elastic Waist Straight Leg Pants Women Casual Pants Seluar Slack Wanita Slimming Wide Leg', 26.9, 4, 'S', 'Navy Blue', 'Cotton', 'Hangout Gym, The Plazzia, Gelugor, Penang', 5, 112.6, 'E-Wallet', '2023-12-08 07:33:47', '2023-12-08 07:36:00'),
(12, 'BKG424052DEC', 3, 7, 'SKU144287DEC', 3, 'To confirm', 'Suit Pants High Waist Elastic Waist Straight Leg Pants Women Casual Pants Seluar Slack Wanita Slimming Wide Leg', 26.9, 3, 'S', 'Navy Blue', 'Cotton', 'Hangout Gym, The Plazzia, Gelugor, Penang', 5, 85.7, 'Cash on Delivery', '2023-12-08 07:37:20', NULL),
(13, 'BKG618441DEC', 3, 7, 'SKU144287DEC', 2, 'Closed', 'Suit Pants High Waist Elastic Waist Straight Leg Pants Women Casual Pants Seluar Slack Wanita Slimming Wide Leg', 26.9, 2, 'S', 'Navy Blue', 'Cotton', 'Blok-100, Taman Selatan, Jelutong, Pulau Pinang', 5, 58.8, 'E-Wallet', '2023-12-08 07:38:24', '2023-12-08 07:39:24'),
(14, 'BKG101967DEC', 3, 8, 'SKU144297DEC', 1, 'Closed', 'Suit Pants High Waist Elastic Waist Straight Leg Pants Women Casual Pants Seluar Slack Wanita Slimming Wide Leg', 26.9, 5, 'M', 'Mint Green', 'Cotton', 'ArteS, Jalan Bukit Gambir, Gelugor, Penang', 5, 139.5, 'E-Wallet', '2023-12-08 07:40:02', '2023-12-08 07:40:57'),
(15, 'BKG939371DEC', 4, 9, 'SKU1033109DEC', 1, 'Closed', 'Korean Style Jumpsuit Set Wear', 30.99, 1, 'M', 'Blue Black', 'CHIFFON', 'ArteS, Jalan Bukit Gambir, Gelugor, Penang', 5, 35.99, 'Card', '2023-12-08 07:48:30', '2023-12-08 07:51:01'),
(16, 'BKG448183DEC', 4, 9, 'SKU1033109DEC', 4, 'To confirm', 'Korean Style Jumpsuit Set Wear', 30.99, 27, 'M', 'Blue Black', 'CHIFFON', 'Blok bunga, Jalan Perak, Jelutong, Pulau Pinang', 5, 841.73, 'E-Wallet', '2023-12-08 07:53:50', NULL),
(17, 'BKG563380DEC', 5, 12, 'SKU1010707DEC', 4, 'Closed', 'Red Beans Tie Hair Rubber Band Round Beans Knotted Hair Tie Hair Rope Small Red Bean Base Black Hair Rope', 1.55, 3, 'Free', 'Red', 'rubber band', 'Blok bunga, Jalan Perak, Jelutong, Pulau Pinang', 5, 9.65, 'E-Wallet', '2023-12-08 07:57:22', '2023-12-08 07:59:57'),
(18, 'BKG166802DEC', 5, 13, 'SKU211292DEC', 4, 'Closed', 'Red Beans Tie Hair Rubber Band Round Beans Knotted Hair Tie Hair Rope Small Red Bean Base Black Hair Rope', 1.55, 3, 'Free', 'Colorful', 'rubber band', 'Blok bunga, Jalan Perak, Jelutong, Pulau Pinang', 5, 9.65, 'E-Wallet', '2023-12-08 07:57:30', '2023-12-08 07:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_no` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_no`, `seller_id`, `name`, `price`, `status`, `description`, `created_date`, `updated_date`) VALUES
(1, 'P194162OCT', 1, 'Plain Satin Blouse Long Sleeve Shirt Women Blouse New Loose Retro Shirt Top', 19.49, 'Activate', '[Detailed description]\nStyle: Simple Commute/Korean-Style\nClothing Style Details: Button, Solid Color\nClothing Version Type: Loose-Fit\nManufacture Material: Polyester Polyester Fiber\nNon-Kline: POLO Collar\n\n[What\'s in the box]\n1 x Pants\n\n[Purchase Note]\n\n- Kindly refer the size chart before buying. If not sure the size can contact us for size suggestion.\n\n- There is 3-5cm+- difference according to manual measurement.\n\n- Due to different light and screen, a subtle color difference and real error is normal.', '2023-10-28 06:38:16', NULL),
(2, 'P764764NOV', 1, 'Women Blouse Turtleneck High Neck Long Sleeve', 16, 'Activate', 'Condition: New\nStock: Ready stock\n\nSoft and comfortable as a result of materials that not only look beautiful but also feel good. High moisture absorption to maintain a comfortable and comfortable fit. Cool Comfort crafted from soft material that not only looks good but also feels good. Wicks away moisture to keep you cool made from soft fabric that\'s fitted for a close fit. Soft and breathable, which makes them perfect for warm climates and hot weather.\n\nLong sleeves-Long sleeves\nLight Weight\nSoft-Soft', '2023-11-08 07:06:15', '2023-12-08 07:08:32'),
(3, 'P144254DEC', 1, 'Suit Pants High Waist Elastic Waist Straight Leg Pants Women Casual Pants Seluar Slack Wanita Slimming Wide Leg', 26.9, 'Activate', '[Ready Stock]\n- Shipping from Malaysia (WM:1-3 Days; EM:2-5 Days)\n\n[What\'s in the box]\n1 x Pants\n\n[Purchase Note]\n- Kindly refer the size chart before buying. If not sure the size can contact us for size suggestion.\n- There is 3-5cm+- difference according to manual measurement.\n- Due to different light and screen, a subtle color difference and real error is normal.\n\n IF YOU HAVE ANY QUESTIONS, PLEASE CHAT US!', '2023-12-08 07:32:14', NULL),
(4, 'P1033081DEC', 1, 'Korean Style Jumpsuit Set Wear', 30.99, 'Activate', 'Welcome To Our Shop Of Vogue\nWe promised all product we sell are 100% NEW & HIGH QUALITY . \n\nJumpsuit Pant : \nM : Waist 62.5, Hip 88.5, Length 77.5cm\nL : Waist 66.5, Hip 92.5, Length 78.5cm\nXL : Waist 70.5, Hip 96.5, Length 82.5cm\n\nTop : \nM : Bust 90.5, Length 55.5, Sleeve34.5, Shoulder 34.5cm\nL : Bust 94.5, Length 56.5, Sleeve 35.5, Shoulder 35.5cm\nXL : Bust 98.5, Length 57.5, Sleeve 36.5, Shoulder 36.5cm', '2023-12-08 07:46:51', NULL),
(5, 'P1010662DEC', 1, 'Red Beans Tie Hair Rubber Band Round Beans Knotted Hair Tie Hair Rope Small Red Bean Base Black Hair Rope', 1.55, 'Activate', 'Material: rubber band\nStyle: Fashion OL\nStyle: women\'s\nModeling: geometric\nProcessing technology: manual\nApplicable gift-giving occasions: birthday\nPacking: bulk\nColor: red beans, colored beans\n\nFrequently asked questions:\n1. Is the product available?\n-All products are available\n\n2. Is the product packaging carefully?\n-We will wrap the product with bubble film and put it in a carton made of special hard materials for safe packaging of the product.', '2023-12-08 07:56:11', '2023-12-08 07:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `product_detail_id` int(11) NOT NULL,
  `product_detail_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `material` varchar(50) NOT NULL,
  `min_stock_qty` int(11) NOT NULL,
  `available_qty` int(11) NOT NULL,
  `sales_out_qty` int(11) DEFAULT 0,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_detail_id`, `product_detail_no`, `product_id`, `size`, `status`, `color`, `material`, `min_stock_qty`, `available_qty`, `sales_out_qty`, `created_date`, `updated_date`, `updated_by`) VALUES
(1, 'SKU194184OCT', 1, 'M', 'Available', 'Black', 'Silk', 20, 49, 201, '2023-10-28 06:38:16', '2023-12-08 07:15:47', 'System'),
(2, 'SKU194193OCT', 1, 'M', 'Available', 'Green', 'Silk', 20, 20, 0, '2023-10-28 06:38:16', NULL, NULL),
(3, 'SKU194200OCT', 1, 'M', 'Available', 'Pink', 'Silk', 20, 15, 5, '2023-10-28 06:38:16', '2023-12-08 07:10:42', 'System'),
(4, 'SKU764795NOV', 2, 'Free', 'Available', 'Black', 'Comfortable', 20, 18, 2, '2023-11-08 07:06:15', '2023-12-08 07:10:52', 'System'),
(5, 'SKU764805NOV', 2, 'Free', 'Available', 'White', 'Comfortable', 20, 14, 6, '2023-11-08 07:06:15', '2023-12-08 07:25:37', 'System'),
(6, 'SKU510394NOV', 2, 'Free', 'Out of Stock', 'Light Pink', 'Comfortable', 20, 0, 0, '2023-11-08 07:08:32', NULL, NULL),
(7, 'SKU144287DEC', 3, 'S', 'Available', 'Navy Blue', 'Cotton', 25, 17, 9, '2023-12-08 07:32:14', '2023-12-08 07:38:24', 'System'),
(8, 'SKU144297DEC', 3, 'M', 'Available', 'Mint Green', 'Cotton', 10, 5, 6, '2023-12-08 07:32:14', '2023-12-08 07:40:02', 'System'),
(9, 'SKU1033109DEC', 4, 'M', 'Available', 'Blue Black', 'CHIFFON', 50, 72, 28, '2023-12-08 07:46:51', '2023-12-08 07:53:50', 'System'),
(10, 'SKU1033118DEC', 4, 'L', 'Available', 'Blue Black', 'CHIFFON', 50, 100, 0, '2023-12-08 07:46:51', NULL, NULL),
(11, 'SKU1033125DEC', 4, 'XL', 'Available', 'Blue Black', 'CHIFFON', 50, 100, 0, '2023-12-08 07:46:51', NULL, NULL),
(12, 'SKU1010707DEC', 5, 'Free', 'Available', 'Red', 'rubber band', 100, 197, 3, '2023-12-08 07:56:11', '2023-12-08 07:57:22', 'System'),
(13, 'SKU211292DEC', 5, 'Free', 'Available', 'Colorful', 'rubber band', 100, 197, 3, '2023-12-08 07:56:33', '2023-12-08 07:57:30', 'System');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `image_name`) VALUES
(1, 1, '657249581fd56_Image_20231207225503.jpg'),
(3, 1, '65724ff59ab7c_Image_20231207232252.jpg'),
(4, 1, '65724ff98bd84_Image_20231207232258.jpg'),
(5, 1, '6572500168104_Image_20231207225509.jpg'),
(9, 2, '65725044736ff_Image_20231208020029.jpg'),
(10, 2, '6572504b45088_Image_20231208020034.jpg'),
(11, 2, '6572504f1b26d_Image_20231208020040.jpg'),
(12, 3, '657255fe115b3_Image_20231208000436.jpg'),
(13, 3, '6572589e968f7_Image_20231208000448.jpg'),
(14, 3, '657258a28dffb_Image_20231208000443.jpg'),
(15, 3, '657258a76d385_Image_20231208000452.jpg'),
(16, 4, '6572596bea011_women_jumpsuit_korean_high_wai_1670684147_982629d0_progressive.jpg'),
(17, 5, '65725b9be44cb_2e6a6eaef48bfe7923f85957079fc913.jpg'),
(18, 5, '65725ce589e3a_c944e4a5281a4cec0d0f61031548ce8c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `buyer_email` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `sentiment` float NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `product_id`, `order_id`, `buyer_email`, `review_text`, `status`, `sentiment`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 'limex-pm20@student.tarc.edu.my', 'material is really bad, in picture different and when receive order already different color..', 'Posted', -2, '2023-10-31 06:49:10', NULL),
(2, 1, 2, 'limex-pm20@student.tarc.edu.my', 'It\'s ok...no other comments...thanks seller..i have bought 1 pink.. nice color, thanks', 'Posted', 2, '2023-10-31 16:57:03', NULL),
(3, 1, 3, 'limex-pm20@student.tarc.edu.my', 'Very beautiful pink!! this is my second purchase. the silk material is soft and smooth, very fresh to touch the cool surface, i like it!', 'Updated', 3, '2023-11-20 07:00:10', '2023-12-08 07:01:03'),
(4, 1, 6, 'chloe@gmail.com', 'Good quality, not rare! Well worth the price!\nFast delivery: parcel up to 3 days after order!\nKeep up the good work seller! XD', 'Posted', 3, '2023-12-08 07:20:49', NULL),
(5, 1, 8, 'chloe@gmail.com', 'Shiny satin material. it\'s good to use. Weight 55kg, height 157cm, size L is just right. It\'s just that I like to wear loose so XL is comfortable for me.', 'Posted', 3, '2023-12-08 07:21:56', NULL),
(6, 1, 5, 'chloe@gmail.com', 'Nice to wear', 'Posted', 1, '2023-12-08 07:23:09', NULL),
(7, 2, 7, 'chloe@gmail.com', 'Material like what I want.. Good seller.. Tq', 'Posted', 2, '2023-12-08 07:23:59', NULL),
(8, 2, 9, 'shio@gmail.com', 'Beautiful and comfortable shirt to wear if you weigh 50kg or less... if it\'s more, it\'s tight', 'Posted', 3, '2023-12-08 07:26:33', NULL),
(9, 3, 10, 'shio@gmail.com', 'Guys and girls, these pants will definitely be my favourite from now on! Brought these for my internship. \nMy waist is 76 and hip 100. I’m 169cm height and it’s still fit.\nIt’s suit me very well. The pockets are also deep enough!', 'Posted', 3, '2023-12-08 07:35:08', NULL),
(10, 3, 11, 'shio@gmail.com', 'i have both color. Love the mint green tho, material so soft, zara alikeee', 'Posted', 2, '2023-12-08 07:36:00', NULL),
(11, 3, 13, 'chloe@gmail.com', 'Thin and cool fabric. Like the flowiness of the fabric', 'Posted', 2, '2023-12-08 07:39:24', NULL),
(12, 3, 14, 'limex-pm20@student.tarc.edu.my', 'Fast delivery..great quality..good service by seller..my H is 150cm and 48kg..really suits my length, not too long for my height..waist size match with my weight..', 'Posted', 1, '2023-12-08 07:40:57', NULL),
(13, 2, 4, 'limex-pm20@student.tarc.edu.my', 'Send wrong color to me..... speechless', 'Posted', -1, '2023-12-08 07:42:01', NULL),
(14, 4, 15, 'limex-pm20@student.tarc.edu.my', 'The material is thick and the product is exactly different in the picture. Dont buy', 'Posted', -1, '2023-12-08 07:51:01', NULL),
(15, 5, 18, 'mk5@gmail.com', 'Very beautiful rubber band', 'Posted', 2, '2023-12-08 07:59:31', NULL),
(16, 5, 17, 'mk5@gmail.com', 'Very beautiful rubber band yayy', 'Posted', 2, '2023-12-08 07:59:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reset_code` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `business_address` text NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_desc` text NOT NULL,
  `last_login_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `username`, `name`, `email`, `password`, `phone`, `status`, `reset_code`, `created_date`, `created_by`, `updated_date`, `updated_by`, `business_address`, `store_name`, `store_desc`, `last_login_date`) VALUES
(1, 'SE993enxil', 'En Xi', 'enxilim024@gmail.com', '$2y$10$.JSyoT0jeVDfm9OPSEEDNu8SDnKyvW5BQRD9moyiba1qDZ8gtNaZa', '0145675678', 'Activate', NULL, '2023-12-08 06:32:04', NULL, '2023-12-08 07:47:06', NULL, 'Georgetown, Penang', 'Of Vogue', 'Welcome to Of Vogue, where style meets comfort in a curated collection of shirts, skirts, dresses, high heels, and more. Our fashion-forward pieces blend the latest trends with timeless classics, ensuring you stand out on any occasion. Explore our range for a seamless fusion of aesthetics and quality craftsmanship. Step into a world of individuality at Of Vogue and elevate your style effortlessly.', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_no_UNIQUE` (`order_no`),
  ADD KEY `product_detail_id` (`product_detail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_no_UNIQUE` (`product_no`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`product_detail_id`),
  ADD UNIQUE KEY `product_detail_no_UNIQUE` (`product_detail_no`),
  ADD UNIQUE KEY `composite_key` (`product_id`,`size`,`color`,`material`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `store_name_UNIQUE` (`store_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `product_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`product_detail_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
