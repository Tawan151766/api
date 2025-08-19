-- phpMyAdmin SQL Dump
-- Database: `mydatabase` (renamed from api_mikrotik4)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

USE mydatabase;

-- Table structure for table `am`
CREATE TABLE `am` (
  `am_id` int(11) NOT NULL,
  `am_user` varchar(250) NOT NULL,
  `am_pass` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table `am`
INSERT INTO `am` (`am_id`, `am_user`, `am_pass`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- Table structure for table `mt_config`
CREATE TABLE `mt_config` (
  `mt_num` int(50) NOT NULL,
  `mt_user` varchar(50) NOT NULL,
  `mt_pass` varchar(50) NOT NULL,
  `mt_ip` varchar(50) NOT NULL,
  `port_api` int(5) NOT NULL,
  `port_web` int(5) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `admin_pin` varchar(200) NOT NULL,
  `customer_pin` varchar(200) NOT NULL,
  `user_pin` varchar(200) NOT NULL,
  `date_update` datetime NOT NULL,
  `mt_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;-- T
able structure for table `mt_edit`
CREATE TABLE `mt_edit` (
  `number` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `group_code` varchar(20) NOT NULL,
  `mt_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `mt_gen`
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
  `mt_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Table structure for table `mt_profile`
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
  `mt_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- PPPoE Tables
CREATE TABLE `pppoe_gen` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `profile` varchar(20) NOT NULL,
  `caller_id` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `comment` varchar(30) NOT NULL,
  `csv_code` varchar(50) NOT NULL,
  `money_code` varchar(50) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_code` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `mt_id` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `pppoe_pro` (
  `pro_name` varchar(20) NOT NULL,
  `pro_local` varchar(50) NOT NULL,
  `pro_remote` varchar(50) NOT NULL,
  `pro_session` varchar(50) NOT NULL,
  `pro_limit` varchar(50) NOT NULL,
  `pro_expire` varchar(50) NOT NULL,
  `pro_price` int(6) NOT NULL,
  `vat` int(4) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `card_name` varchar(30) NOT NULL,
  `data_limit` varchar(30) NOT NULL,
  `time_limit` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `server_ip` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `mt_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Indexes and AUTO_INCREMENT
ALTER TABLE `am` ADD PRIMARY KEY (`am_id`);
ALTER TABLE `mt_config` ADD PRIMARY KEY (`mt_num`);
ALTER TABLE `mt_edit` ADD PRIMARY KEY (`number`);
ALTER TABLE `mt_gen` ADD PRIMARY KEY (`user`);
ALTER TABLE `mt_profile` ADD PRIMARY KEY (`pro_name`);
ALTER TABLE `pppoe_gen` ADD PRIMARY KEY (`user`);
ALTER TABLE `pppoe_pro` ADD PRIMARY KEY (`pro_name`);

ALTER TABLE `am` MODIFY `am_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `mt_config` MODIFY `mt_num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `mt_edit` MODIFY `number` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3642;