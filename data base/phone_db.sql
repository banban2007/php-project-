-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 08:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` bigint(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(47, 9, 24, 'iPhone 14 Plus (Single Sim)', 3524000, 1, 'iPhone-14-Plus-Purple-Image.webp');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(5, 9, 'Thu ta', 'thuta@gmail.com', '0996570944', 'hello my name is thuta. this is good website for me. This Phone webiste create by thu ta .\r\nhtml,css and js  backend is php mysqli ');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` bigint(100) NOT NULL,
  `placed_on` date NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(10000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` bigint(100) NOT NULL,
  `image_1` varchar(500) NOT NULL,
  `image_2` varchar(500) NOT NULL,
  `image_3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `category`, `price`, `image_1`, `image_2`, `image_3`) VALUES
(15, 'samsung galaxy tap s6 lite', '10.4 Inches မျက်နှာပြင်အကျယ်ရှိတဲ့ Samsung Galaxy Tab S6 Lite (2024) လေးက TFT LCD Display ကို အသုံးပြုပေးထားပြီး Performance အတွက် Exynos 1280 နဲ့ဆိုတော့ဂိမ်းပဲ ဆော့ဆော့ Online Learning အတွက်ပဲသုံးသုံး အဆင်ပြေတဲ့ Android Tablet လေးပါပဲ။\r\nLi-Po 7040 mAh Battery ပါဝင်ပြီးတော့ 15W နဲ့ အားပြန်သွင်းနိုင်မှာပါ။Daily Use အတွက် Performance ကောင်းကောင်းနဲ့ ပေါ့ပေါ့ပါးပါးသုံးမယ့်သူတွေ ရွေးချယ်သင့်တဲ့ Model လေးပါပဲ။', 'tablets', 2025000, 'Samsung_Galaxy_ Tab_S6_Lite_(2024).webp', 'BE0A2810-1200x1200.jpg', 'BE0A2813-1200x1200.jpg'),
(16, 'Samsung S24 Ultra (5G)', 'S24 Ultraလေးကတော့ 6.8″ flat displayလေးဖြစ်ပြီးတော့ S Penလေးပါပါတယ်နော်။ Main camera ပိုင်းကိုတော့ 200MP, 50MP, 12MP, 10MPအစရှိတဲ့ ကင်မရာ 4လုံးနဲ့ဆိုတော့ ရှယ်ကြည်တဲ့ပုံတွေရိုက်ရုံပဲပေါ့။ Selfie Camerကလည်း 12MPနဲ့ 4K, 1080p videoလေးတွေကိုအေးဆေးရိုက်လိုက်တော့။ သူကလည်း Galaxy AIပါတော့ real-time language translationနဲ့ ဖုန်းခေါ်ဆိုမှုတွေ စာတိုလေးတွေပို့နိုင်တော့ ခရီးသွားဖို့ ဟိုတယ်ဘိုကင်တင်တာမျိုးပဲဖြစ်ဖြစ် business meetingလုပ်တာမျိုးပဲဖြစ်ဖြစ် အေးဆေးလုပ်နိုင်မှာနော်။ Chat Assistလည်းပါလာတာမလို့ အရေးအသားကိုလည်းပိုပြီးprofessionalကျစေမှာပါနော်။ Circle to Search featureမှာလည်း S Penလေးနဲ့ ရှာချင်တဲ့အရာလေးကိုဝိုင်းလိုက်တာနဲ့ သူနဲ့တူတာတွေကိုရှာပေးမှာဖြစ်ပါတယ်။ Chipsetကတော့ Qualcomm SM8650-AC Snapdragon 8 Gen 3 (4 nm)ကိုသုံးထားပါတယ်။ Batteryကလည်း Li-Ion 5000 mAh ဆိုတော့ တစ်ရက်တာကို အေးအေးဆေးဆေး ဖြတ်သန်းရုံပဲနော်။', 'android_phone', 6065000, 'samsung.png', 'Samsung-S24-Ultra-Titanium-Grey-Image-3.webp', 'Samsung-S24-Ultra-Spec-Photo-2.png'),
(17, 'iPhone 16 Pro Max (Single Sim)', 'ခမ်းနားလှပတဲ့ Titanium Design, ကိုင်ဆောင်ထားချိန်တိုင်းမှာ Premium Vibe အပြည့်နဲ့ Apple ရဲ့ 16 Pro Max မှာတော့ Productive အဖြစ်ဆုံး Apple A18 Pro (3 nm) Chipset နဲ့အတူ ပွဲထွက်လာခဲ့ပါတယ်။LTPO Super Retina XDR OLED Display ကိုသုံးပေးထားတာကြောင့် ကြည်လင်တောက်ပနေမယ့် ရုပ်ထွက်တွေကိုလည်း Full View နဲ့ ကြည့်နိုင်ဦးမှာပါ။ပုံရိပ်တိုင်းကို Detail ကျကျနဲ့ သဘာဝကျကျ ဖန်တီးပေးမယ့် 48MP Pro Camera System နဲ့အတူ အသစ်ပါဝင်လာတဲ့ Apple Intelligence Features တွေကြောင့် ထင်မှတ်ထားတာထက်ပိုပြီးအသုံးဝင်နေဦးမှာပါ။တစ်နေ့တာအတွက် လုံလောက်စေမယ့် Li-Ion 4685 mAh Battery ကိုသုံးပေးထားပြီး နာရီဝက်ဝန်းကျင်အတွင်း 50% ထိအားပြည့်နိုင်မယ့် 25W Fast Charging လည်း Support ပေးထားပါသေးတယ်။', 'ios_phone', 6390000, 'iPhone-16-Pro-Desert-Titanium-Image.webp', 'iPhone-16-Pro-Desert-Titanium-Image-2-1.webp', '16ProProMax.webp'),
(18, 'Amazfit GTS 4 Smart Watch', 'Classic ဆန်ဆန် Smartwatch လေးရှာနေတယ်ဆိုရင် Amazfit GTS 4 Smartwatch လေးရှိတယ်နော်။Amazfit Logo လေးပါတဲ့ Navigation Crown လေးကအရမ်းကို Classic ဆန်စေပါတယ်။HD AMOLED နဲ့ 1.75″ မျက်နှာပြင်ကို Tempered Glass Coating ဖုံးအုပ်ပေးထားလို့ တော်ရုံ လက်ရာ ချွေးရာ ထင်မှာမဟုတ်ပါဘူး။သုံးမယ်ဆိုရင်လည်း Zepp App လေးနဲ့တွဲသုံးလို့ရပါတယ်။\r\nATM Water Resistance ဖြစ်လို့ ရေအနက် မီတာ (၅၀) အထိခံနိုင်ပြီး Sport Mode (150) ကျော်ပါတဲ့အပြင် ဂြိုလ်တုနဲ့ ချိတ်ဆက်ထားတဲ့ Dual- Band Positioning က လက်ရှိရောက်နေတဲ့နေရာကိုအတိအကျဖော်ပြပေးမှာပါ။Watch Face ပေါင်း (၁၅၀) ကျော် ပါတဲ့အပြင် Customize ပါထည့်လို့ ရတာလေးက အရမ်းကို Premium ဖြစ်စေတယ်။သုံးမယ်ဆိုရင်လည်း Zepp App လေးနဲ့တွဲသုံးလို့ရပါတယ်။', 'smart products', 543400, 'Amazfit-GTS-4-Smart-Watch-Autumn-Brown-Image.webp', 'Amazfit-GTS-4-Smart-Watch-Brown.webp', 'Amazfit-GTS-4-Smart-Watch-Autumn-Brown-Image-5.webp'),
(19, 'JBL C150Si Wired Earphone', 'နားကြပ်ဆိုရင် ပေါ့ပေါ့ပါးပါးနဲ့ ပါမှန်းတောင်မသိအောင်ဖြစ်နေမှဆိုတဲ့သူတွေအတွက်ကတော့ JBL C150Si Wired Earphone လေးရှိပါတယ်နော်။\r\nBuilt-In Microphone လေးလည်းပါတော့ ဖုန်းပြောရင်လည်းအဆင်ပြေရောပဲနော်။Color အနေနဲ့ကလည်း ရွေးချယ်စရာတွေအများကြီးရှိတော့ အကြိုက်တွေအလိုက်ရွေးချယ်နိုင်တာပေါ့။', 'smart products', 42200, 'JBL-C150Si-Red-2.jpg', 'JBL-C150Si-Red-1.jpg', 'JBL-C150Si-Red-4.jpg'),
(20, 'Macbook Air 13″ (M3)', 'Macbook Air 13 လေးကတော့ Liquid retina display လေးနဲ့လာပါတယ်။ Chipset အနေနဲ့ Apple M3 chip ကိုသုံးထားတာမလို့ creation လုပ်တဲ့သူတွေသုံးမယ်ဆိုရင်လည်း အဆင်ပြေစေမှာပါ။ ကင်မရာကိုလည်း 1080p သုံးထားတာမလို့ online meeting လုပ်တာတွေ online class joinမယ့်သူတွေအတွက်လည်း အဆင်ပြေစေမှာပါ။ Battery life ကတော့ 15 နာရီလောက်ထိ အသုံးခံပါတယ်။', 'computer', 4450000, 'Macbook-Air-13-M3-Midnight-Image.webp', 'Macbook-Air-13-M3-Midnight-Image-1.webp', 'Macbook-Air-13-M3-Spec-Photo-1.webp'),
(21, 'Xiaomi Pad 6 (Wifi) (Official)', '11 inches ရှိတဲ့ Screen Size နဲ့ Xiaomi Pad 6 က IPS LCD Display နဲ့ဖြစ်ပါတယ်။ ရုပ်ရှင်တွေပဲကြည့်ကြည့်၊ Social Media ပဲသုံးသုံး၊ Online Learning Class ပဲတက်တက် Full View ကိုရရှိနိုင်မှာဖြစ်ပါတယ်။\r\nMain Camera က 13 MP ပါတဲ့အပြင် Performance အနေနဲ့ကလည်း Snapdragon 870 5G (7 nm) ဆိုတော့ tablet နဲ့ဂိမ်းဆော့မယ်ဆိုရင်လည်း အချိန်ကြာကြာ စိတ်ကြိုက်သုံးရုံပါပဲနော်။\r\nBattery Life ကလည်း Li-Po 8840 mAh တောင်ပါတာဆိုတော့ တစ်နေကုန် အေးအေးဆေးဆေးသုံးနိုင်ပြီး 33W fast charging စနစ်ပါဝင်တာမို့ အသုံးပြုသင့်တဲ့ tablet အမျိုးအစားတစ်ခုဖြစ်ပါတယ်။\r\n\r\n', 'tablets', 1369000, 'Xiaomi-Pad-6-Mist-GreenImage.webp', 'Xiaomi-Pad-6-Mist-Blue-Image-1.webp', 'Xiaomi-Pad-6-Mist-Blue-Image-3.webp'),
(22, 'Honor 200 (5G)', 'Studio Level Portrait Camera နဲ့ အကြမ်းစားပုံရိပ်တွေကြောင့် Portrait လို့တင်စားခံထားရတဲ့ Honor 200(5G) မှာ 50 MP Main Camera ကို Honor AI Portrait Engine နဲ့ တွဲသုံးထားလို့ ပုံထွက် Quality က Amazing  ပါပဲ။ Chipset ကိုလည်း Qualcomm SM7550-AB Snapdragon 7 Gen 3 (4 nm) ကို သုံးထားပြီး OLED, 1B colors, 120Hz, HDR, 4000 nits (peak) နဲ့မို့ Gaming ရော Social Media ပိုင်းအတွက်ပါလုံလောက်တဲ့ Performance နဲ့ Display Panel ဖြစ်နေမှာပါ။ 5200 mAh Battery ကိုလည်း 100W Fast Charging နဲ့အားပြန်ဖြည့်ပြီးသုံးနိုင်မှာပါ။', 'android_phone', 1869000, 'Honor-200-Main-Photo-1.webp', 'Honor-200-5G-Black-Image-3.webp', 'Honor-200-5G-Black-Image-2.webp'),
(23, 'Samsung Galaxy Z Fold 6 (5G)', 'Samsung ရဲ့  Foldable ဖုန်းတွေထဲမှာ နောက်ဆုံးထွက်ရှိထားတဲ့ Samsung Galaxy Z Fold 6 (5G) မှာ Chipset အနေနဲ့ Qualcomm SM8650-AC Snapdragon 8 Gen 3 (4 nm) ကို သုံးထားလို့ Powerful ဖြစ်နေမယ့်အပြင် Foldable Dynamic LTPO AMOLED 2X, 120Hz, HDR10+, 2600 nits (peak) Display ကလည်း နေရောင်အောက်မှာပါ စိုတောက်နေတဲ့ အရောင်ထွက်နဲ့ အသုံးပြုနိုင်မှာပါ။ 4400 mAh Battery ကို 25W Fast Charging နဲ့ အားပြန်ဖြည့်သုံးနိုင်ပြီး Camera ကိုလည် 4 MP, f/1.8, 26mm (wide), 2.0µm, under display Selfie Camera ကိုသုံးထားလို့ ပုံထွက်တွေက ကြည်တောက်နေမှာပါ။', 'android_phone', 8415000, 'Samsung-Galaxy-Z-Fold-6-Image.webp', 'Samsung-Galaxy-Z-Fold-6-Pink-Image4-1.webp', 'Samsung-Galaxy-Z-Fold-6-Pink-Image5.webp'),
(24, 'iPhone 14 Plus (Single Sim)', 'iPhone 14 Plus လေးမှာတော့ အကြမ်းခံမယ့် crash detection ရော emergency SOS via satellite ရော Roadside assistance via satellite feature လေးရောပါလာပါတယ်။ သူကတော့ 6.7″ Super Retina XDR display ဆိုတော့ ကြည်လင်ပြတ်သားတဲ့ display လေးကိုခံစားရစေမှာပါ။ Chipset ကတော့fast performance အတွက် A15 Bionic chipset ကို သုံးထားပါတယ်။ လှပတဲ့ပုံလေးတွေကိုရိုက်ဖို့လည်း 12MP dual main camera ကိုသုံးထားပေးပါတယ်။ Battery က Li-Ion 4323 mAh ဆိုတော့ တစ်နေကုန်အေးဆေးသုံးရုံပါပဲ။', 'ios_phone', 3524000, 'iPhone-14-Plus-Purple-Image.webp', 'iPhone-14-Plus-Purple-Image-3.webp', 'iPhone-14-Plus-Purple-Image-2.webp'),
(25, 'Gadget Max GB60 (iMex Series) 60000mAh Power Bank', '60000mAh Powerbank လေးကို သွားလေရာသယ်သွားချင်တယ်ဆို လက်ကိုင်လေးပါပါတဲ့ Gadget Max ရဲ့ iMex Series ထဲက GB-60လေးရှိပါတယ်။ USB Port 2 Port နဲ့ Type-C Port 1 Port ပါတာမလို့ Device 3 ခုကိုတစ်ပြိုင်တည်းအားသွင်းလို့ရစေမှာပါ။ Battery လက်ကျန်ကိုလည်း Digital Display လေးနဲ့ပြပြီးတော့ LED Flashlight လေးလည်းပါတော့ မီးလေးပါထွန်းလို့ရစေဦးမှာပါ။', 'smart products', 175500, 'Gadget-Max-GB-60-iMex-Series60000mAh-Powerbank-Titanium-Grey-Image.webp', 'BE0A8357-1200x1200.jpg', 'BE0A8354-1200x1200.jpg'),
(26, 'Huawei GT5 Smart Watch (46mm)', 'Smart Watch တွေထဲ ရှားရှားပါးပါး Luxury Watch Vibe မျိုးပေးမယ့် Huawei Watch GT 5 လေးမှာတော့ Smart Watch Industry မှာ နန်းသိမ်းဘုရင်တစ်ပါး မွေးဖွားလာပြီလို ပြောရလောက်အောင် ကြီးကျယ်ခမ်းနားတဲ့ Traditional Watch အသွင်သဏ္ဍန်နဲ့ ခေတ်မီဆန်းသစ်တဲ့ နည်းပညာပေါင်းစပ်ထားပါတယ်။GT 5 လေးမှာ ကျန်းမာရေးနဲ့ Pro Level Sport Activities တွေကို တိုင်းတာပေးမယ့် Mode & App တွေပါဝင်တဲ့အပြင်၊ စိတ်ကျန်းမာရေးကိုပါ စောင့်ကြည့်ပေးမယ့် Emotional Well Being Assistant Feature သစ်တွေလည်း အပြည့်အစုံပါဝင်လာမှာဖြစ်ပါတယ်။', 'smart products', 580400, 'GTS5-Watch-Blue-Product-Photo.webp', 'GTS5-Watch-Spe-Photo.webp', 'T4U07628-Recovered-copy-1200x1200.jpg'),
(27, 'Beats Solo 4 Wireless Headphone (Original)', 'အရောင်ငြိမ်ငြိမ် Classic Design လေးနဲ့ Solo 4 လေးကတော့ Music Lover လေးတွေ အကြိုက်တွေ့စေမှာပါ။ Upgraded လုပ်ထားတဲ့ Custom-Built Acoustic Architecture ကြောင့် ဇာတ်ကားကြည့်မလား ဂိမ်းပဲဆော့မလား သီချင်းနားထောင်ရုံပဲလား အလိုရှိသလိုသုံးရုံပါပဲ။ Ultra Plush Ear Cushion လေးကြောင့် တပ်ထားရင်လည်း သက်တောင့်သက်သာဖြစ်ပြီးတော့ တစ်ခါအားသွင်းထားလိုက်ရုံနဲ့ အကြာကြီးသုံးလို့ရစေမှာပါ။ iOS ရော Android ရော 2မျိုးလုံးနဲ့ အလွယ်တကူချိတ်ဆက်လို့ရတာမလို့ စိတ်တိုင်းကျသုံးလို့ရစေမယ့် Headphone လေးဖြစ်ပါတယ်။\r\n\r\n', 'smart products', 790700, 'Beats-Solo-4-Wireless-Headphone-Original_Slate-Blue_Image.webp', 'Beats-Solo-4-Wireless-Headphone-Original_Slate-Blue_Image-2.webp', 'Beats-Solo-4-Wireless-Headphone-Original_Slate-Blue_Image-3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(4, 'admin', 'admin@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin'),
(5, 'user1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'user'),
(8, 'user2', 'user2@gmail.com', '7e58d63b60197ceb55a1c487989a3720', 'user'),
(9, 'Thu ta', 'thuta@gmail.com', '0e62d51e51e56c0e64e452fd7d753a02', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` bigint(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(23, 9, 22, 'Honor 200 (5G)', 1869000, 'Honor-200-Main-Photo-1.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
