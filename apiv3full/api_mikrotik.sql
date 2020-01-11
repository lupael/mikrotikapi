-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `api_mikrotik`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `am`
-- 

CREATE TABLE `am` (
  `am_id` int(11) NOT NULL auto_increment,
  `am_user` varchar(250) NOT NULL,
  `am_pass` varchar(250) NOT NULL,
  PRIMARY KEY  (`am_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `am`
-- 

INSERT INTO `am` VALUES (1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `em`
-- 

CREATE TABLE `em` (
  `em_id` int(11) NOT NULL auto_increment,
  `em_name` varchar(100) NOT NULL,
  `em_user` varchar(50) NOT NULL,
  `em_pass` varchar(50) NOT NULL,
  `mt_id` varchar(11) NOT NULL,
  PRIMARY KEY  (`em_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `em`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `mt_config`
-- 

CREATE TABLE `mt_config` (
  `mt_id` int(11) NOT NULL auto_increment,
  `mt_user` varchar(250) NOT NULL,
  `mt_pass` varchar(250) NOT NULL,
  `mt_ip` varchar(250) NOT NULL,
  `mt_name` varchar(100) NOT NULL,
  `mt_location` varchar(255) NOT NULL,
  `mt_mail` varchar(100) NOT NULL,
  `mt_tel` varchar(20) NOT NULL,
  `mt_gps` varchar(30) NOT NULL,
  PRIMARY KEY  (`mt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `mt_config`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `mt_gen`
-- 

CREATE TABLE `mt_gen` (
  `user` varchar(11) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `qrcode` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `mt_id` varchar(100) NOT NULL,
  PRIMARY KEY  (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `mt_gen`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `mt_hotspot_profile`
-- 

CREATE TABLE `mt_hotspot_profile` (
  `profile_id` int(11) NOT NULL auto_increment,
  `profile_name` varchar(300) NOT NULL,
  `tx` varchar(20) NOT NULL,
  `rx` varchar(20) NOT NULL,
  PRIMARY KEY  (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `mt_hotspot_profile`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `mt_profile`
-- 

CREATE TABLE `mt_profile` (
  `pro_name` varchar(50) NOT NULL,
  `pro_session` varchar(20) NOT NULL,
  `pro_idle` varchar(20) NOT NULL,
  `pro_keepalive` varchar(20) NOT NULL,
  `pro_autorefresh` varchar(20) NOT NULL,
  `pro_uptime` varchar(20) NOT NULL,
  `pro_users` varchar(5) NOT NULL,
  `pro_limit` varchar(20) NOT NULL,
  `pro_addlist` varchar(20) NOT NULL,
  `pro_date` date NOT NULL,
  PRIMARY KEY  (`pro_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `mt_profile`
-- 

