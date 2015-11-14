-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: custsql-ipg83.eigbox.net
-- เวลาในการสร้าง: 03 พ.ย. 2015  13:29น.
-- รุ่นของเซิร์ฟเวอร์: 5.5.43
-- รุ่นของ PHP: 4.4.9
-- 
-- ฐานข้อมูล: `raannuch_co_uk`
-- 
CREATE DATABASE `raannuch_co_uk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `raannuch_co_uk`;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- โครงสร้างตาราง `category`
-- 

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- โครงสร้างตาราง `contents`
-- 

CREATE TABLE `contents` (
  `contents_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` varchar(45) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`contents_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Constraints for table `billing_detail`
-- 
ALTER TABLE `billing_detail`
  ADD CONSTRAINT `fk_billing_detail_billing1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`billing_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_billing_detail_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;