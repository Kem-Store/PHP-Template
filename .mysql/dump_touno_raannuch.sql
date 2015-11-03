-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: custsql-ipg83.eigbox.net
-- เวลาในการสร้าง: 03 พ.ย. 2015  13:29น.
-- รุ่นของเซิร์ฟเวอร์: 5.5.43
-- รุ่นของ PHP: 4.4.9
-- 
-- ฐานข้อมูล: `touno_raannuch`
-- 
CREATE DATABASE `touno_raannuch` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `touno_raannuch`;

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `billing`
-- 

CREATE TABLE `billing` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `invoice_date` datetime NOT NULL,
  `invoice_no` varchar(45) NOT NULL,
  `payment_term` varchar(255) DEFAULT NULL,
  `delivery` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`billing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- dump ตาราง `billing`
-- 

INSERT INTO `billing` VALUES (14, 'wanapa', 'budworth', '6 deighton close', 'orrell', 'wn5 8rz', 'wigan', 'United kingdom', 'wanapa.j@gmail.com', '07834788143', '2015-03-28 21:21:39', 'N2015032814', '', 6.95, 0, 'PENDDING', '');
INSERT INTO `billing` VALUES (15, 'wanapa', 'budworth', '6 deighton close', 'orrell', 'wn5 8rz', 'wigan', 'United kingdom', 'wanapa.j@gmail.com', '07834788143', '2015-03-29 04:56:03', 'N2015032915', '', 6.95, 0, 'PENDDING', '');
INSERT INTO `billing` VALUES (16, '', '', '', '', '', '', '', '', '', '2015-07-23 19:22:00', 'N2015072316', '', 6.95, 0, 'PENNING', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `billing_detail`
-- 

CREATE TABLE `billing_detail` (
  `billing_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`billing_detail_id`),
  KEY `fk_billing_detail_billing1_idx` (`billing_id`),
  KEY `fk_billing_detail_product1_idx` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

-- 
-- dump ตาราง `billing_detail`
-- 

INSERT INTO `billing_detail` VALUES (109, 15, 49, 'Vietnamese coriander#ผักแพรว', 1.75, 3);
INSERT INTO `billing_detail` VALUES (110, 15, 68, 'Thai Eggplant#มะเขือลายกบ', 2.75, 4);
INSERT INTO `billing_detail` VALUES (111, 15, 26, 'Thai Choi#คะน้าไท', 2.85, 1);
INSERT INTO `billing_detail` VALUES (112, 15, 52, 'Thai morning glory #ผักบุ้งไทย', 2.25, 11);
INSERT INTO `billing_detail` VALUES (113, 15, 87, 'lotus stem#สายบัว', 2.85, 5);
INSERT INTO `billing_detail` VALUES (114, 15, 100, 'Moringa oleifera Lam#มะรุม', 2.65, 10);
INSERT INTO `billing_detail` VALUES (115, 15, 53, 'Morning glory #ผักบุ้งจีน', 1.95, 10);
INSERT INTO `billing_detail` VALUES (123, 14, 49, 'Vietnamese coriander#ผักแพรว', 1.75, 3);
INSERT INTO `billing_detail` VALUES (124, 14, 68, 'Thai Eggplant#มะเขือลายกบ', 2.75, 4);
INSERT INTO `billing_detail` VALUES (125, 14, 26, 'Thai Choi#คะน้าไท', 2.85, 1);
INSERT INTO `billing_detail` VALUES (126, 14, 52, 'Thai morning glory #ผักบุ้งไทย', 2.25, 11);
INSERT INTO `billing_detail` VALUES (127, 14, 87, 'lotus stem#สายบัว', 2.85, 5);
INSERT INTO `billing_detail` VALUES (128, 14, 100, 'Moringa oleifera Lam#มะรุม', 2.65, 10);
INSERT INTO `billing_detail` VALUES (129, 14, 53, 'Morning glory #ผักบุ้งจีน', 1.95, 10);
INSERT INTO `billing_detail` VALUES (130, 16, 123, '#แหนมเอ็นหมู', 5.45, 1);
INSERT INTO `billing_detail` VALUES (131, 16, 20, '#ก้านจอง ', 1.75, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `category`
-- 

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- dump ตาราง `category`
-- 

INSERT INTO `category` VALUES (1, 9, 'Fresh vegetables#ผักสด');
INSERT INTO `category` VALUES (2, 0, 'Preserved food#ของหมักดอง');
INSERT INTO `category` VALUES (3, 0, 'Curry paste/Sauce and seasoning#เครื่องแกง ซอส และ เครื่องปรุงต่างๆ ');
INSERT INTO `category` VALUES (4, 0, 'Frozen food#ของแช่แข็ง');
INSERT INTO `category` VALUES (5, 0, 'Desert/Snacks#ของหวาน ขนมกินเล่น ');
INSERT INTO `category` VALUES (6, 0, 'Household Essentials#เครื่องใช้ทั่วไป ');
INSERT INTO `category` VALUES (7, 2, 'Preserved fish and meat# ปลาร้า อาหารทะเล และเนื้อสัตว์หมัก ต่างๆ');
INSERT INTO `category` VALUES (8, 2, 'Preserved vegatable');
INSERT INTO `category` VALUES (9, 0, 'Fresh ingredient#อาหารสด');
INSERT INTO `category` VALUES (10, 0, 'Drink');
INSERT INTO `category` VALUES (11, 9, 'Fresh  Fruits#ผลไม้สด ');
INSERT INTO `category` VALUES (12, 9, 'Noodle#เส้นต่างๆ');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `contents`
-- 

CREATE TABLE `contents` (
  `contents_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` varchar(45) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`contents_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `contents`
-- 

INSERT INTO `contents` VALUES (1, 'home', '', '<h1>Fast, Friendly Delivery</h1><p>We deliver UK-wide and to most of mainland Europe. Click below to see delivery charges and important ordering &amp; delivery information. <br><br>บริการส่งทั่วราชอาณาจักรอังกฤษ และพื้นที่หลักๆของทวีปยุโรป โปรดกรุณากดด้านล่างเพื่อทราบข้อมูลค่าขนส่งและข้อมูลสำคัญต่างๆเกี่ยวกับการออเดอร์และรายละเอียดการส่ง<br><br><span style="color: #ff0000;"><br><u><span style="color: #ff0000;"><strong>Possible Delays</strong></span></u><br></span><br><span style="color: #ff0000;">Problems due to adverse weather conditions (flooding, heavy snow and ice, etc.) this winter may result in delays to deliveries. Please bear this in mind if ordering fresh/frozen goods.<br><br>แจ้งเพื่อทราบ  เนื่องจากปัญหาสภาพอากาศในฤดูหนาวนี้ ซึ่งหมายรวมถึง ( น้ำท่วม, พื้นถนนเกาะเป็นน้ำแข็ง หรือหิมะตกหนัก เป็นต้น) อาจสร้างปัญหาความล่าช้าในการขนส่ง ดังนั้นถ้าพื้นที่ของท่านกำลังประสบสภาวะอากาศข้างต้น ก่อนที่ท่านจะทำการออเดอร์สินค้าประเภทของสดหรือสินค้าแช่แข็ง กรุณาคำนึงถึงความล่าช้าของระบบขนส่งที่อาจจะเกิดขึ้นได้</span><br></p>');
INSERT INTO `contents` VALUES (2, 'about', 'About us', '<p>Thomson Reuters is the world&rsquo;s leading source of intelligent information for businesses and professionals</p>\n\n<p>We combine industry expertise with innovative technology to deliver critical information to leading decision makers in the financial and risk, legal, tax and accounting, intellectual property and science and media markets, powered by the world&#39;s most trusted news organization.</p>\n\n<p>&nbsp;</p>\n\n<p>Thomson Reuters shares are listed on the Toronto and New York Stock Exchanges (symbol: TRI).</p>\n\n<p>&nbsp;</p>\n');
INSERT INTO `contents` VALUES (3, 'contact', 'Contact us', '<h5>ที่อยู่</h5>\nเลขที่ 414 ถ.พหลโยธิน แขวงสามเสนใน <br>\nเขตพญาไท กรุงเทพฯ 10400 <br>\nโทร. 0-2299-5000 <br>\n\n<h5>เวลาทําการ</h5>\nจันทร์ - ศุกร์ ตั้งแต่เวลา 08:30 - 17:30 น. <br>\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `product`
-- 

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_th` varchar(100) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0',
  `size` varchar(100) DEFAULT NULL,
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_category_idx` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8 AUTO_INCREMENT=208 ;

-- 
-- dump ตาราง `product`
-- 

INSERT INTO `product` VALUES (11, 1, 'Thai Basil', 'กระเพรา ', 2.15, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (13, 1, 'Water Minosa', 'กระเฉดน้ำ', 2.75, '200 g', 0, 1, 'images/tmp/1427491772.jpg');
INSERT INTO `product` VALUES (14, 1, 'Kaempfer', 'กระชาย ', 1.35, '100 g', 0, 1, 'images/tmp/1427471817.jpg');
INSERT INTO `product` VALUES (15, 1, 'Thai Banana ', 'กล้วยน้ำว้า', 8.75, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (16, 1, 'Lady finger banana', 'กล้วยไข่', 8.5, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (17, 1, 'Wild banana (young)', 'กล้วยตานีดิบ', 8.5, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (18, 1, 'Pak Choi', 'กวางตุ้งใบ', 2.45, '200 g', 0, 1, 'images/tmp/1427491273.jpg');
INSERT INTO `product` VALUES (19, 1, '', 'ก้านคูน', 3.5, '250 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (20, 1, '', 'ก้านจอง ', 1.75, '100 g', 0, 1, 'images/tmp/1427474154.jpg');
INSERT INTO `product` VALUES (22, 1, 'Jackfruit', 'ขนุนอ่อน', 2.65, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (23, 1, 'Oriolus chinensis', 'ขมิ้นเหลือง ', 1.65, '100 g', 0, 1, 'images/tmp/1427491218.jpg');
INSERT INTO `product` VALUES (24, 1, 'Young Galangal ', 'ข่า', 2.4, '200 g', 0, 1, 'images/tmp/1427471064.jpg');
INSERT INTO `product` VALUES (25, 1, 'Boiled cassod leaf ', 'ขี้เหล็กต้ม', 2.85, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (26, 1, 'Thai Choi', 'คะน้าไท', 2.85, '200 g', 0, 1, 'images/tmp/1427471389.jpg');
INSERT INTO `product` VALUES (27, 1, 'Celery', 'คืนช่าย', 1.85, '200 g', 0, 1, 'images/tmp/1427469828.jpg');
INSERT INTO `product` VALUES (28, 1, 'Piper Samentosum', 'ชะพลู', 1.65, '100 g', 0, 1, 'images/tmp/1427471286.jpg');
INSERT INTO `product` VALUES (29, 1, 'Acacia', 'ชะอม', 1.35, '100 g', 0, 1, 'images/tmp/1427469356.jpg');
INSERT INTO `product` VALUES (30, 1, '', 'ดอกโสน', 1.75, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (31, 1, 'Agasta', 'ดอกแค', 3.15, '100 g', 0, 1, 'images/tmp/1427469452.jpg');
INSERT INTO `product` VALUES (32, 1, '', 'ดอกขจร', 1.75, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (33, 1, '', 'ดอกหอม ', 2.65, '200 g', 0, 1, 'images/tmp/1427473130.jpg');
INSERT INTO `product` VALUES (34, 1, 'Lamoncrass', 'ตะไคร้', 1.15, '100 g', 0, 1, 'images/tmp/1427470994.jpg');
INSERT INTO `product` VALUES (35, 1, 'Yard long bean ', 'ถั่วฝักยาว', 2.6, '200 g', 0, 1, 'images/tmp/1427491967.jpg');
INSERT INTO `product` VALUES (36, 1, 'Winged bean ', 'ถั่วพล', 1.65, '100 g', 0, 1, 'images/tmp/1427472768.jpg');
INSERT INTO `product` VALUES (37, 1, 'Snake gourd  ', 'บวบงู', 2.95, '250 g ', 0, 1, 'images/tmp/1427471664.jpg');
INSERT INTO `product` VALUES (38, 1, 'Gourd', 'บวบหอม', 4.85, '500 g', 0, 1, 'images/tmp/1427470931.jpg');
INSERT INTO `product` VALUES (39, 1, 'Sweet basil  ', 'ใบแมงลัก', 2.35, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (40, 1, 'Chinese leek leave ', 'ใบกุยช่าย', 1.5, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (41, 1, 'Banana leaf ', 'ใบตอง ', 3.15, '250 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (42, 1, 'Tamarind young leaves', 'ใบมะขามอ่อน', 2.15, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (43, 1, 'Tahitian noni leaves', 'ใบยอ', 1.65, '100 g ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (44, 1, 'Gotu kola', 'ใบบัวบก', 1.65, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (45, 1, 'Bamboo grass', 'ใบย่านางสด', 1.45, '', 0, 1, 'images/tmp/1427473764.jpg');
INSERT INTO `product` VALUES (46, 1, 'Tree Basil leaves', 'ใบยี่หร่า ', 2.15, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (47, 8, '', 'ผักเสี้ยนดอง', 2.25, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (48, 1, 'Limnophila', 'ผักแขยง', 1.75, '100 g', 0, 1, 'images/tmp/1427491083.jpg');
INSERT INTO `product` VALUES (49, 1, 'Vietnamese coriander', 'ผักแพรว', 1.75, '100 g', 0, 1, 'images/tmp/1427471550.jpg');
INSERT INTO `product` VALUES (50, 1, 'Culantro', 'ผักชีฝรั่ง ', 1.95, '100 g', 0, 1, 'images/tmp/1427470161.jpg');
INSERT INTO `product` VALUES (51, 1, 'Young morning glory (red) ', 'ผักบุ้งแดง (ส้มตำ) ', 2.25, '200 g ', 0, 1, 'images/tmp/1427471257.jpg');
INSERT INTO `product` VALUES (52, 1, 'Thai morning glory ', 'ผักบุ้งไทย', 2.25, '200 g', 0, 1, 'images/tmp/1427491693.jpg');
INSERT INTO `product` VALUES (53, 1, 'Morning glory ', 'ผักบุ้งจีน', 1.95, '200 g', 0, 1, 'images/tmp/1427471118.jpg');
INSERT INTO `product` VALUES (54, 1, 'Wild Star gooseberry', 'ผักหวานป่า ', 1.85, '100 g', 0, 1, 'images/tmp/1427472200.jpg');
INSERT INTO `product` VALUES (55, 1, '', 'ผักกาดสร้อย ', 2.65, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (56, 1, 'Red chilli ', 'พริกแดง ', 1.65, '100 g', 0, 1, 'images/tmp/1427471198.jpg');
INSERT INTO `product` VALUES (57, 1, 'Green pepper corn ', 'พริกไทยอ่อน', 2.15, '100 g', 0, 1, 'images/tmp/1427470860.jpg');
INSERT INTO `product` VALUES (58, 1, 'Bird eye chilli', 'พริกขี้หนูสวน ', 2.15, '100 g', 0, 1, 'images/tmp/1427469754.jpg');
INSERT INTO `product` VALUES (60, 1, 'Lao chilli', 'พริกลาว', 2.15, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (61, 1, 'white gourd', 'ฟักเขียว', 8.5, '1 kg', 0, 1, 'images/tmp/1427472135.jpg');
INSERT INTO `product` VALUES (62, 1, 'Pumpkin', 'ฟักทอง ', 8.5, '1 kg', 0, 1, 'images/tmp/1427472060.jpg');
INSERT INTO `product` VALUES (63, 1, 'Egg plant ', 'มะเขือเปราะ', 2.75, '200 g', 0, 1, 'images/tmp/1427474477.jpg');
INSERT INTO `product` VALUES (64, 1, 'Pea aubergine ', 'มะเขือพวง', 1.65, '100 g', 0, 1, 'images/tmp/1427471144.jpg');
INSERT INTO `product` VALUES (65, 1, 'Stripes egg plant ', 'มะเขือลาย หรือมะเขือเสวย ', 2.75, '200 g', 0, 1, 'images/tmp/1427493938.jpg');
INSERT INTO `product` VALUES (66, 1, 'Yellow egg plant', 'มะเขือเหลือง ', 2.75, '200 g', 0, 1, 'images/tmp/1427491998.jpg');
INSERT INTO `product` VALUES (67, 1, '', 'มะเขือตอแหล', 2.75, '200 g', 0, 1, 'images/tmp/1427473356.jpg');
INSERT INTO `product` VALUES (68, 1, 'Thai Eggplant', 'มะเขือลายกบ', 2.75, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (69, 1, 'Aubergine', 'มะเขือยาว ', 10.5, '1 kg', 0, 1, 'images/tmp/1427469696.jpg');
INSERT INTO `product` VALUES (71, 9, 'Yellow soybean curd ', 'เต้าหู้เหลืองใส่ผัดไทย', 1.5, '1 ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (72, 1, 'Young Tamarin', 'มะขามอ่อน ', 1.65, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (73, 1, 'Hog plum for cooking ', 'มะกอกส้มตำ', 1.65, '100 g', 0, 1, 'images/tmp/1427470571.jpg');
INSERT INTO `product` VALUES (74, 1, 'Wild Bitter Gourd', 'มะระขี้นก', 1.65, '100 g', 0, 1, 'images/tmp/1427491921.jpg');
INSERT INTO `product` VALUES (75, 1, 'Chinese Bitter Gourd', 'มะระจีน ', 12.5, '1 kg', 0, 1, 'images/tmp/1427473961.jpg');
INSERT INTO `product` VALUES (76, 1, '', 'มะรุมปอก', 2.45, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (77, 1, 'Green papaya', 'มะละกอดิบ', 7.25, '1 kg', 0, 1, 'images/tmp/1427470322.jpg');
INSERT INTO `product` VALUES (78, 1, '', 'ยอดฟักแม้ว ', 2.75, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (79, 1, 'bitter gourd leaves', 'ยอดมะระ ', 2.75, '200 g', 0, 1, 'images/tmp/1427470194.jpg');
INSERT INTO `product` VALUES (80, 1, 'Neem plant', 'ดอกสะเดา ', 1.85, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (81, 1, '', 'ยอดมะพร้าวหั่น', 2.95, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (82, 1, 'Star gooseberry', 'มะยมสด', 2.95, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (83, 1, 'Noni', 'ลูกยอ', 13.5, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (84, 1, 'Coriander roots', 'รากผักชี ', 1.95, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (85, 1, 'Nita pod peeled ', 'สะตอแกะ', 2.65, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (86, 1, 'Nita pod ', 'สะตอฝัก', 3.85, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (87, 1, 'lotus stem', 'สายบัว', 2.85, '200 g', 0, 1, 'images/tmp/1427471168.jpg');
INSERT INTO `product` VALUES (88, 1, 'Inoke mushroom ', 'เห็ดเข็มทอง', 1.5, '100 g', 0, 1, 'images/tmp/1427470895.jpg');
INSERT INTO `product` VALUES (89, 1, 'Lentinus squarrosulus ', 'เห็ดขอนขาว', 1.85, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (90, 1, 'Eryngii mushroom ', 'เห็ดออรินจิ', 3.15, '200 g ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (91, 1, 'Eryngii mushroom ', 'เห็ดชิเมจิ ', 3.15, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (92, 1, 'Sajor caju Mushroom  ', 'เห็ดนางฟ้า   ', 3.15, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (94, 1, 'Jew ear mushroom', 'เห็ดหูหนู', 3.15, '200 g', 0, 1, 'images/tmp/1427470971.jpg');
INSERT INTO `product` VALUES (95, 1, 'Holy basil', 'โหรพา ', 2.15, '100 g', 0, 1, 'images/tmp/1427471517.jpg');
INSERT INTO `product` VALUES (96, 1, 'Challot', 'หอมแดง', 2.6, '200 g', 0, 1, 'images/tmp/1427470037.jpg');
INSERT INTO `product` VALUES (98, 1, 'Hard mushroom', 'เห็ดกระด้าง', 1.65, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (100, 1, 'Moringa oleifera Lam', 'มะรุม', 2.65, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (101, 1, 'Agasta', 'ยอดแค', 1.65, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (102, 1, 'Ceylon Spinach ', 'ผักปลัง ', 2.75, '200 g ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (103, 1, 'White popinac ', 'ผักกะถินแก่', 1.5, '100 g', 0, 1, 'images/tmp/1427491836.jpg');
INSERT INTO `product` VALUES (104, 9, ' Bamboo shoots', 'หน่อไม้รวก สด ', 5.65, '500 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (105, 1, 'Bamboo shoots', 'หน่อไม้ไผ่ตงสด', 10, '1 kg', 0, 1, 'images/tmp/1427471589.jpg');
INSERT INTO `product` VALUES (106, 1, 'Banana blossom', 'หัวปลี', 8.75, '1 kg', 0, 1, 'images/tmp/1427469788.jpg');
INSERT INTO `product` VALUES (107, 1, 'Mimosaceae', 'ลูกเหรียง ', 5.65, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (108, 1, 'Djenkol bean fruit', 'ลูกเนียง', 2.85, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (109, 1, 'Hose radish tree', 'มะรุม', 2.65, '200 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (111, 1, '', 'พริกหยวก', 1.65, '100 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (112, 4, '', 'ลูกชิ้นเนื้อโกเด้ง', 7.5, '500 g  ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (113, 4, '', 'ลูกชิ้นหมูโกเด้ง', 9.5, '650 g  ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (114, 4, '', 'ไส้กรอกอีสาน ส ขอนแก่น  ', 6.5, '500 g ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (115, 4, '', 'ลูกชิ้นปลาระเบิด', 13, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (116, 4, '', 'แหนมดอนเมือง(ย่าง)  ', 10, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (117, 4, '', 'ปลาหมึกกรอบ', 15, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (119, 4, '', 'ปลาเนื้ออ่อนย่าง', 20, '500 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (120, 4, '', 'ปลากดย่าง ', 17.5, '500 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (121, 4, '', 'แหนมดอนเมือง(แท่ง/แหนมยำ กินสด)  ', 5.25, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (122, 4, '', 'แหนมเอ็นไก่', 5.45, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (123, 4, '', 'แหนมเอ็นหมู', 5.45, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (124, 4, '', 'แหนมปลากราย', 5.45, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (125, 4, '', 'แหนมจิ๋ว', 10, '100 pices ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (126, 4, '', 'กระเพาะวัว', 3.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (127, 4, '', 'ไส้หมู', 3.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (128, 4, '', 'ไส้หมูอ่อน', 3.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (129, 4, '', 'กระเพาะหมู', 3.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (130, 4, '', 'เอ็นเนื้อ', 3.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (131, 4, '', 'ปลาช่อนสดหั่นชิ้น แช่แข็ง ', 5.75, '500 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (132, 4, '', 'หมูยอ ส ขอนแก่น ', 4, '', 0, 1, 'images/tmp/1427494633.jpg');
INSERT INTO `product` VALUES (133, 4, '', 'ปลาทูสดแช่แข็ง', 6.5, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (134, 4, '', 'ปลาทูนึ่ง', 6.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (135, 4, '', 'ตีนไก่', 4.75, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (136, 4, '', 'กึ๋นไก่ ', 4.75, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (137, 4, '', 'ปลาดุกสดแช่แข็ง', 6.75, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (138, 4, '', 'ปลาตะเพียน', 8.75, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (139, 4, '', 'ลูกปูม้า', 4.75, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (140, 4, '', 'ปูนาตัวเล็ก', 4.75, '', 0, 1, 'images/tmp/1427494939.jpg');
INSERT INTO `product` VALUES (142, 4, '', 'ปูนาบด', 3.75, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (143, 4, '', 'กุ้งฝอย', 3.15, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (144, 4, '', 'เนื้อหอยโข่ง', 4.5, '', 0, 1, 'images/tmp/1427494473.jpg');
INSERT INTO `product` VALUES (145, 4, '', 'ปูม้าแช่แข็ง', 9.25, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (146, 4, '', 'ลูกชิ้นปลาเส้น', 2.25, '', 0, 1, 'images/tmp/1427494705.jpg');
INSERT INTO `product` VALUES (147, 4, '', 'ลูกชิ้นปลาเต้าหู้', 2.75, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (148, 4, '', 'ขากบ ', 7.25, '500 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (149, 4, '', 'ขากบ', 13.5, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (151, 4, '', 'ทอดมันปลาแต้จิ๋ว', 2.75, '', 0, 1, 'images/tmp/1427495020.jpg');
INSERT INTO `product` VALUES (152, 4, '', 'เลือดหมูสด', 5.5, '450 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (153, 4, '', 'หอยแครงสดแช่แข็ง', 8, '1 kg', 0, 1, 'images/tmp/1427494984.jpg');
INSERT INTO `product` VALUES (154, 4, '', 'ลูกปลาซิว', 4.75, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (155, 4, '', 'ใบมะกรูด', 2.25, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (156, 4, '', 'ขนมกุ่ยช่าย', 5.75, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (157, 4, '', 'S&P ข้าวเหนียวดำน้ำกะทิมะพร้าวอ่อน ', 3.25, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (158, 4, '', 'S&P สาคูเผือก เอสแอนด์พี ', 3.25, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (161, 4, '', 'S&P ข้าวเหนียวเปียกลำใยเผือก ', 3.25, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (162, 4, '', 'ข้าวต้มมัดไส้กล้วย', 4.25, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (163, 4, '', 'เป็ดอบพะโล้สำเร็จไม่มีกระดูก ', 9.5, '650 g', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (164, 4, '', 'หัวใจไก่ ', 5.5, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (165, 4, '', 'ลูกชิ้นปลากลมใหญ่ ', 2.25, '', 0, 1, 'images/tmp/1427494744.jpg');
INSERT INTO `product` VALUES (166, 4, '', 'ลูกชิ้นปลารักบี้', 2.25, '', 0, 1, 'images/tmp/1427494770.jpg');
INSERT INTO `product` VALUES (167, 2, '', 'ไข่แดงเค็ม', 4.85, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (168, 10, '', 'ผงโอเลี้ยง', 5.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (169, 10, '', 'ผงชาไทย', 5.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (170, 6, '', 'ถุงชงชา ', 2.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (171, 1, '', 'ลูกมะกรูดสด', 15, 'kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (172, 3, '', 'ผงกะหรี่', 0.95, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (173, 7, '', 'กุ้งหวาน', 8.5, 'gram', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (174, 3, '', 'ไตปลาแห้ง ตราจี้หมิก', 5.5, '250 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (175, 7, '', 'ปลาร้าปลาสร้อย', 7, '500 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (176, 7, '', 'ปลาร้าปลาสร้อย ', 13, '1 kgs', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (177, 7, '', 'ปลาร้าปลาจีน', 10, '1 ่pack', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (178, 7, '', 'ปลาร้าปลานิล', 6, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (179, 7, '', 'ปลาร้าปลาช่อน ตราพันท้่าย ', 4.75, '450 grams', 0, 0, 'images/no-image.jpg');
INSERT INTO `product` VALUES (180, 7, '', 'ปลาช่อนแดดเดียว', 9.5, '1 pack', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (181, 7, '', 'ปลาดุกแดดเดียว ', 6.95, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (182, 7, '', 'ปลาร้าปลาจีนทอด', 7, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (183, 7, '', 'ปลาร้าปลานิลทอด', 7, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (184, 7, '', 'ปลาส้มปลาตะเพียนทอด', 6.95, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (185, 3, '', 'ปลาหลดแดดเดียว', 6.95, '450 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (186, 7, '', 'น้ำปลาร้า', 6, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (187, 7, '', 'พุงปลาช่อนดอง (จากโคราช) ', 7.5, '500 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (188, 7, '', 'ปลาหลดแดดเดียว', 6.95, '450 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (189, 7, '', 'หอยดอง', 7.5, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (190, 7, '', 'น้ำปู', 3.15, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (191, 7, '', 'ปลาดุกร้า', 6.5, '500 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (192, 7, '', 'ปลากรายบด', 8.15, '500 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (193, 7, '', 'ปูเค็ม', 2.95, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (194, 7, '', 'หมูสวรรค์/เนื้อสวรรค์ ', 7, '1 pack', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (195, 7, '', 'หมูทุบ ', 7, '1 pack', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (196, 7, '', 'แหนมดอนเมือง(ย่าง)  ', 10, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (197, 7, '', 'ปลาหมึกกรอบ', 15, '1 kg', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (198, 7, '', 'ปลาเนื้ออ่อนย่าง ', 20, '500 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (199, 7, '', 'ปลากดย่าง', 17.5, '500 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (200, 7, '', 'แหนมเอ็นไก่', 5.45, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (201, 7, '', 'แหนมเอ็นหมู ', 5.45, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (202, 7, '', 'แหนมปลากราย', 5.45, '', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (203, 7, '', 'แหนมจิ๋ว', 10, '100 pcs', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (204, 4, '', 'เป็ดอบพะโล้สำเร็จไม่มีกระดูก', 9.5, '650 grams', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (205, 7, '', 'ปลาริวกิวแดดเดียว', 7.5, ' ', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (206, 7, '', 'ปลาวงคัดพิเศษ', 6.5, 'pack', 0, 1, 'images/no-image.jpg');
INSERT INTO `product` VALUES (207, 7, '', 'ปลาหวานโรยงา', 6.5, '', 0, 1, 'images/no-image.jpg');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `billing_detail`
-- 
ALTER TABLE `billing_detail`
  ADD CONSTRAINT `fk_billing_detail_billing1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`billing_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_billing_detail_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `product`
-- 
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
