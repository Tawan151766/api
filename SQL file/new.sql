-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2017 at 02:34 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_mikrotik4`
--

-- --------------------------------------------------------

--
-- Table structure for table `am`
--

CREATE TABLE `am` (
  `am_id` int(11) NOT NULL,
  `am_user` varchar(250) NOT NULL,
  `am_pass` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `am`
--

INSERT INTO `am` (`am_id`, `am_user`, `am_pass`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `mt_config`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- Dumping data for table `mt_config`
INSERT INTO `mt_config` (`mt_num`, `mt_user`, `mt_pass`, `mt_ip`, `port_api`, `port_web`, `site_name`, `admin_pin`, `customer_pin`, `user_pin`, `date_update`, `mt_id`) VALUES
(1, 'apiuser', 'apipass', '192.168.1.1', 8728, 80, 'Test Site', 'admin123', 'cust123', 'user123', '2023-01-01 00:00:00', 1);

--
-- Table structure for table `mt_edit`
--

CREATE TABLE `mt_edit` (
  `number` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `group_code` varchar(20) NOT NULL,
  `mt_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- Dumping data for table `mt_edit`
INSERT INTO `mt_edit` (`number`, `user`, `group_code`, `mt_id`) VALUES
(1, 'testuser', 'G1', '1');

--
-- Table structure for table `mt_gen`
--

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

-- --------------------------------------------------------

-- Dumping data for table `mt_gen`
INSERT INTO `mt_gen` (`user`, `pass`, `limit_uptime`, `profile`, `server_pro`, `mac_address`, `ip_address`, `email`, `comment`, `csv_code`, `money_code`, `group_name`, `group_code`, `date`, `mt_id`) VALUES
('user1', 'password', '1h', 'default', 'server1', '00:11:22:33:44:55', '10.0.0.1', 'user1@example.com', 'test account', 'csv1', 'money1', 'groupA', 'G1', '2023-01-01 00:00:00', '1');

--
-- Table structure for table `mt_money`
--

CREATE TABLE `mt_money` (
  `utc_time_for_chart` varchar(20) NOT NULL,
  `money_code` varchar(50) NOT NULL,
  `date` varchar(11) NOT NULL,
  `month_code` varchar(50) NOT NULL,
  `month` varchar(8) NOT NULL,
  `tickets` varchar(50) NOT NULL,
  `money` varchar(50) NOT NULL,
  `mt_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table `mt_money`
INSERT INTO `mt_money` (`utc_time_for_chart`, `money_code`, `date`, `month_code`, `month`, `tickets`, `money`, `mt_id`) VALUES
('1672531200', 'money1', '2023-01-01', '2023-01', 'Jan', '5', '100', '1');
-- --------------------------------------------------------

--
-- Table structure for table `mt_money_month`
--

CREATE TABLE `mt_money_month` (
  `month_code` varchar(20) NOT NULL,
  `day_01` varchar(20) NOT NULL,
  `day_02` varchar(20) NOT NULL,
  `day_03` varchar(20) NOT NULL,
  `day_04` varchar(20) NOT NULL,
  `day_05` varchar(20) NOT NULL,
  `day_06` varchar(20) NOT NULL,
  `day_07` varchar(20) NOT NULL,
  `day_08` varchar(20) NOT NULL,
  `day_09` varchar(20) NOT NULL,
  `day_10` varchar(20) NOT NULL,
  `day_11` varchar(20) NOT NULL,
  `day_12` varchar(20) NOT NULL,
  `day_13` varchar(20) NOT NULL,
  `day_14` varchar(20) NOT NULL,
  `day_15` varchar(20) NOT NULL,
  `day_16` varchar(20) NOT NULL,
  `day_17` varchar(20) NOT NULL,
  `day_18` varchar(20) NOT NULL,
  `day_19` varchar(20) NOT NULL,
  `day_20` varchar(20) NOT NULL,
  `day_21` varchar(20) NOT NULL,
  `day_22` varchar(20) NOT NULL,
  `day_23` varchar(20) NOT NULL,
  `day_24` varchar(20) NOT NULL,
  `day_25` varchar(20) NOT NULL,
  `day_26` varchar(20) NOT NULL,
  `day_27` varchar(20) NOT NULL,
  `day_28` varchar(20) NOT NULL,
  `day_29` varchar(20) NOT NULL,
  `day_30` varchar(20) NOT NULL,
  `day_31` varchar(20) NOT NULL,
  `mt_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- Dumping data for table `mt_money_month`
INSERT INTO `mt_money_month` (`month_code`, `day_01`, `day_02`, `day_03`, `day_04`, `day_05`, `day_06`, `day_07`, `day_08`, `day_09`, `day_10`, `day_11`, `day_12`, `day_13`, `day_14`, `day_15`, `day_16`, `day_17`, `day_18`, `day_19`, `day_20`, `day_21`, `day_22`, `day_23`, `day_24`, `day_25`, `day_26`, `day_27`, `day_28`, `day_29`, `day_30`, `day_31`, `mt_id`) VALUES
('2023-01', '10', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');

--
-- Table structure for table `mt_money_year`
--

CREATE TABLE `mt_money_year` (
  `year` varchar(20) NOT NULL,
  `jan` varchar(20) NOT NULL,
  `feb` varchar(20) NOT NULL,
  `mar` varchar(20) NOT NULL,
  `apr` varchar(20) NOT NULL,
  `may` varchar(20) NOT NULL,
  `jun` varchar(20) NOT NULL,
  `jul` varchar(20) NOT NULL,
  `aug` varchar(20) NOT NULL,
  `sep` varchar(20) NOT NULL,
  `oct` varchar(20) NOT NULL,
  `nov` varchar(20) NOT NULL,
  `december` varchar(20) NOT NULL,
  `mt_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- Dumping data for table `mt_money_year`
INSERT INTO `mt_money_year` (`year`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `december`, `mt_id`) VALUES
('2023', '100', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');

--
-- Table structure for table `mt_profile`
--

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

-- --------------------------------------------------------

-- Dumping data for table `mt_profile`
INSERT INTO `mt_profile` (`pro_name`, `pro_session`, `pro_idle`, `pro_keepalive`, `pro_autorefresh`, `pro_expire`, `pro_users`, `pro_limit`, `pro_price`, `vat`, `package_name`, `card_name`, `home_page`, `time_limit`, `phone`, `server_ip`, `color`, `mt_id`) VALUES
('basic', '1h', '5m', '30s', '1m', '1d', '1', 'none', 100, 7, 'Basic Package', 'Card Basic', 'home.html', '1h', '123456789', '192.168.1.1', '#FFFFFF', '1');

--
-- Table structure for table `pppoe_gen`
--

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

-- --------------------------------------------------------

-- Dumping data for table `pppoe_gen`
INSERT INTO `pppoe_gen` (`user`, `pass`, `profile`, `caller_id`, `address`, `comment`, `csv_code`, `money_code`, `group_name`, `group_code`, `date`, `mt_id`) VALUES
('ppuser', 'pppass', 'default', '00:11:22:33:44:55', '10.0.0.2', 'pppoe test', 'csv2', 'money2', 'ppgroup', 'PG1', '2023-01-01 00:00:00', '1');

--
-- Table structure for table `pppoe_money`
--

CREATE TABLE `pppoe_money` (
  `utc_time_for_chart` varchar(20) NOT NULL,
  `money_code` varchar(50) NOT NULL,
  `date` varchar(11) NOT NULL,
  `month_code` varchar(50) NOT NULL,
  `month` varchar(8) NOT NULL,
  `tickets` varchar(50) NOT NULL,
  `money` varchar(50) NOT NULL,
  `mt_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pppoe_money_month`
--

CREATE TABLE `pppoe_money_month` (
  `month_code` varchar(20) NOT NULL,
  `day_01` varchar(20) NOT NULL,
  `day_02` varchar(20) NOT NULL,
  `day_03` varchar(20) NOT NULL,
  `day_04` varchar(20) NOT NULL,
  `day_05` varchar(20) NOT NULL,
  `day_06` varchar(20) NOT NULL,
  `day_07` varchar(20) NOT NULL,
  `day_08` varchar(20) NOT NULL,
  `day_09` varchar(20) NOT NULL,
  `day_10` varchar(20) NOT NULL,
  `day_11` varchar(20) NOT NULL,
  `day_12` varchar(20) NOT NULL,
  `day_13` varchar(20) NOT NULL,
  `day_14` varchar(20) NOT NULL,
  `day_15` varchar(20) NOT NULL,
  `day_16` varchar(20) NOT NULL,
  `day_17` varchar(20) NOT NULL,
  `day_18` varchar(20) NOT NULL,
  `day_19` varchar(20) NOT NULL,
  `day_20` varchar(20) NOT NULL,
  `day_21` varchar(20) NOT NULL,
  `day_22` varchar(20) NOT NULL,
  `day_23` varchar(20) NOT NULL,
  `day_24` varchar(20) NOT NULL,
  `day_25` varchar(20) NOT NULL,
  `day_26` varchar(20) NOT NULL,
  `day_27` varchar(20) NOT NULL,
  `day_28` varchar(20) NOT NULL,
  `day_29` varchar(20) NOT NULL,
  `day_30` varchar(20) NOT NULL,
  `day_31` varchar(20) NOT NULL,
  `mt_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pppoe_money_year`
--

CREATE TABLE `pppoe_money_year` (
  `year` varchar(11) NOT NULL,
  `jan` varchar(11) NOT NULL,
  `feb` varchar(11) NOT NULL,
  `mar` varchar(11) NOT NULL,
  `apr` varchar(11) NOT NULL,
  `may` varchar(11) NOT NULL,
  `jun` varchar(11) NOT NULL,
  `jul` varchar(11) NOT NULL,
  `aug` varchar(11) NOT NULL,
  `sep` varchar(11) NOT NULL,
  `oct` varchar(11) NOT NULL,
  `nov` varchar(11) NOT NULL,
  `december` varchar(11) NOT NULL,
  `mt_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pppoe_pro`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `am`
--
ALTER TABLE `am`
  ADD PRIMARY KEY (`am_id`);

--
-- Indexes for table `mt_config`
--
ALTER TABLE `mt_config`
  ADD PRIMARY KEY (`mt_num`);

--
-- Indexes for table `mt_edit`
--
ALTER TABLE `mt_edit`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `mt_gen`
--
ALTER TABLE `mt_gen`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `mt_money`
--
ALTER TABLE `mt_money`
  ADD PRIMARY KEY (`utc_time_for_chart`);

--
-- Indexes for table `mt_money_month`
--
ALTER TABLE `mt_money_month`
  ADD PRIMARY KEY (`month_code`);

--
-- Indexes for table `mt_money_year`
--
ALTER TABLE `mt_money_year`
  ADD PRIMARY KEY (`year`);

--
-- Indexes for table `mt_profile`
--
ALTER TABLE `mt_profile`
  ADD PRIMARY KEY (`pro_name`);

--
-- Indexes for table `pppoe_gen`
--
ALTER TABLE `pppoe_gen`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `pppoe_money`
--
ALTER TABLE `pppoe_money`
  ADD PRIMARY KEY (`utc_time_for_chart`);

--
-- Indexes for table `pppoe_money_month`
--
ALTER TABLE `pppoe_money_month`
  ADD PRIMARY KEY (`month_code`);

--
-- Indexes for table `pppoe_money_year`
--
ALTER TABLE `pppoe_money_year`
  ADD PRIMARY KEY (`year`);

--
-- Indexes for table `pppoe_pro`
--
ALTER TABLE `pppoe_pro`
  ADD PRIMARY KEY (`pro_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `am`
--
ALTER TABLE `am`
  MODIFY `am_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mt_config`
--
ALTER TABLE `mt_config`
  MODIFY `mt_num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mt_edit`
--
ALTER TABLE `mt_edit`
  MODIFY `number` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3642;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
