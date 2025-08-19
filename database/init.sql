-- Complete MikroTik API Database Schema
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

USE mydatabase;

-- Admin users table
CREATE TABLE `am` (
  `am_id` int(11) NOT NULL AUTO_INCREMENT,
  `am_user` varchar(250) NOT NULL,
  `am_pass` varchar(250) NOT NULL,
  PRIMARY KEY (`am_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Insert admin user (password: 12345)
INSERT INTO `am` (`am_id`, `am_user`, `am_pass`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- MikroTik configuration table
CREATE TABLE `mt_config` (
  `mt_num` int(50) NOT NULL AUTO_INCREMENT,
  `mt_user` varchar(50) NOT NULL,
  `mt_pass` varchar(50) NOT NULL,
  `mt_ip` varchar(50) NOT NULL,
  `port_api` int(5) NOT NULL DEFAULT 8728,
  `port_web` int(5) NOT NULL DEFAULT 80,
  `site_name` varchar(50) NOT NULL,
  `admin_pin` varchar(200) NOT NULL,
  `customer_pin` varchar(200) NOT NULL,
  `user_pin` varchar(200) NOT NULL,
  `date_update` datetime NOT NULL,
  `mt_id` int(50) NOT NULL,
  PRIMARY KEY (`mt_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Essential tables for the application
CREATE TABLE `mt_edit` (
  `number` int(50) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `group_code` varchar(20) NOT NULL,
  `mt_id` varchar(20) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `mt_gen` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `limit_uptime` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `server_pro` varchar(50) NOT NULL,
  `mac_address` varchar(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(30) NOT NULL,
  `csv_code` varchar(20) NOT NULL,
  `money_code` varchar(50) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_code` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `mt_id` varchar(20) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `mt_profile` (
  `pro_name` varchar(50) NOT NULL,
  `pro_session` varchar(20) NOT NULL,
  `pro_idle` varchar(20) NOT NULL,
  `pro_keepalive` varchar(20) NOT NULL,
  `pro_autorefresh` varchar(20) NOT NULL,
  `pro_expire` varchar(20) NOT NULL,
  `pro_users` varchar(5) NOT NULL,
  `pro_limit` varchar(20) NOT NULL,
  `pro_price` int(6) NOT NULL,
  `vat` int(4) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `card_name` varchar(30) NOT NULL,
  `home_page` varchar(30) NOT NULL,
  `time_limit` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `server_ip` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `mt_id` varchar(20) NOT NULL,
  PRIMARY KEY (`pro_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;