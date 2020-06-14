-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 08:32 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orc`
--

-- --------------------------------------------------------

--
-- Table structure for table `offer_data`
--

CREATE TABLE `offer_data` (
  `uid` varchar(100) NOT NULL,
  `of_uid` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_data`
--

INSERT INTO `offer_data` (`uid`, `of_uid`, `name`, `value`) VALUES
('ofrow-5e7636203e723', 'of-5e7636203e71d', 'default_name', 'Offer 2'),
('ofrow-5e76362071a91', 'of-5e7636203e71d', 'offer_name', 'offer0002'),
('ofrow-5e763620995a1', 'of-5e7636203e71d', 'ofsglval', 'l002'),
('ofrow-5e763620bef48', 'of-5e7636203e71d', 'ofmltval', 'l003|l004'),
('ofrow-5e7645299dc6e', 'of-5e7641bfa60dd', 'default_name', 'Offer 4'),
('ofrow-5e764529c3566', 'of-5e7641bfa60dd', 'offer_name', 'offer0003'),
('ofrow-5e764529dbaba', 'of-5e7641bfa60dd', 'ofsglval', 'l001'),
('ofrow-5e764529f0f91', 'of-5e7641bfa60dd', 'ofmltval', 'l003'),
('ofrow-5e77288d2d1c2', 'of-5e772876473e3', 'default_name', 'Babeh Offer 1x'),
('ofrow-5e77288d676b7', 'of-5e772876473e3', 'of_id', 'of0001x'),
('ofrow-5e77288d7a5e9', 'of-5e772876473e3', 'sel_id', 'babeh02'),
('ofrow-5e77288d8d098', 'of-5e772876473e3', 'multi_id', 'l001|l002|l004'),
('ofrow-5e86f0fa36672', 'of-5e75df6817ad0', 'default_name', 'Offer X'),
('ofrow-5e86f0fa6d550', 'of-5e75df6817ad0', 'offer_name', 'offer010101'),
('ofrow-5e86f0fa801e9', 'of-5e75df6817ad0', 'ofsglval', 'l001'),
('ofrow-5e86f0fa92f90', 'of-5e75df6817ad0', 'ofmltval', 'l003|l004'),
('ofrow-5e8c885f16c11', 'of-5e75cee3c0bd3', 'default_name', 'Prototype 1 '),
('ofrow-5e8c885f5f042', 'of-5e75cee3c0bd3', 'offer_name', 'offer0001'),
('ofrow-5e8c885f6c690', 'of-5e75cee3c0bd3', 'ofsglval', 'l002'),
('ofrow-5e8c885f81809', 'of-5e75cee3c0bd3', 'ofmltval', 'l003|l004'),
('ofrow-5e8c88c6076aa', 'of-5e8c88c6076a6', 'default_name', 'Test'),
('ofrow-5e8c88c642e0d', 'of-5e8c88c6076a6', 'offer_name', 'Test'),
('ofrow-5e8c88c6647b4', 'of-5e8c88c6076a6', 'ofsglval', 'l001'),
('ofrow-5e8c88c6ae3fa', 'of-5e8c88c6076a6', 'ofmltval', 'l004');

-- --------------------------------------------------------

--
-- Table structure for table `offer_meta`
--

CREATE TABLE `offer_meta` (
  `uid` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `template` text NOT NULL,
  `status` enum('draft','approved','sync') NOT NULL,
  `version` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_meta`
--

INSERT INTO `offer_meta` (`uid`, `name`, `template`, `status`, `version`) VALUES
('of-5e75cee3c0bd3', 'Prototype 1 ', 'tct-5e747c31c0dca', 'approved', 1),
('of-5e75df6817ad0', 'Offer X', 'tct-5e747c31c0dca', 'draft', 1),
('of-5e7636203e71d', 'Offer 2', 'tct-5e747c31c0dca', 'approved', 1),
('of-5e7641bfa60dd', 'Offer 4', 'tct-5e747c31c0dca', 'approved', 1),
('of-5e772876473e3', 'Babeh Offer 1x', 'tct-5e7727830c377', 'approved', 1),
('of-5e8c88c6076a6', 'Test', 'tct-5e747c31c0dca', 'draft', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tc_fgroup`
--

CREATE TABLE `tc_fgroup` (
  `uid` varchar(100) NOT NULL,
  `generic` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `note` text NOT NULL,
  `gen_opt` tinyint(1) NOT NULL,
  `gen_lookup` varchar(50) NOT NULL,
  `option_c2lrtb` tinyint(1) NOT NULL,
  `template_c2trtb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_fgroup`
--

INSERT INTO `tc_fgroup` (`uid`, `generic`, `type`, `title`, `name`, `value`, `note`, `gen_opt`, `gen_lookup`, `option_c2lrtb`, `template_c2trtb`) VALUES
('tcfg-5e747c048d59d', '', 'singleselect', 'Offer Seingle Value', 'ofsglval', '', '', 0, '', 1, 0),
('tcfg-5e747c19a5163', '', 'multiselect', 'Offer Multi Value', 'ofmltval', '', '', 0, '', 1, 0),
('tcfg-5e77279ee1df1', '', 'input', 'Offer ID', 'of_id', '', '', 0, '', 0, 0),
('tcfg-5e7727b505d38', '', 'singleselect', 'Select ID', 'sel_id', '', '', 0, '', 1, 0),
('tcfg-5e7727c4bd1a9', '', 'multiselect', 'Multi ID', 'multi_id', '', '', 0, '', 1, 0),
('tcfg-5e8dd1b602a52', '', 'input', 'Offer ID', 'Offer_ID', '', '', 0, '', 0, 0),
('tcfg-5e8dd1f28d74b', '', 'multiselect', 'Sales Channel', 'Sales_Channel', '', '', 0, '', 1, 0),
('tcfg-5e9ee92a51b3f', '', 'association', 'TestAssoc', 'TestAssoc', '', '', 0, '', 0, 1),
('tcfg-5e9f37df9e869', '', 'association', 'LagiAssoc', 'LagiAssoc', '', '', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tc_lookup`
--

CREATE TABLE `tc_lookup` (
  `uid` varchar(100) NOT NULL,
  `generic` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_lookup`
--

INSERT INTO `tc_lookup` (`uid`, `generic`, `title`, `value`) VALUES
('tcl-5e747b91925ec', '', 'lookup 001', 'l001'),
('tcl-5e747b9fcaf49', '', 'lookup 002', 'l002'),
('tcl-5e747bb0dea35', '', 'lookup 003', 'l003'),
('tcl-5e747bc5cfecd', '', 'lookup 004', 'l004'),
('tcl-5e7727e12c446', '', 'babeh 1', 'babeh01'),
('tcl-5e7727edd020a', '', 'babeh 2', 'babeh02'),
('tcl-5e7727f9d8a34', '', 'babeh 3', 'babeh03'),
('tcl-5e8dd2021c3cc', '', 'Walk In', 'WI'),
('tcl-5e8dd21a43e66', '', 'Call Center', 'CC'),
('tcl-5e8dd22ab868d', '', 'Mass', 'MS');

-- --------------------------------------------------------

--
-- Table structure for table `tc_rtb_c2l`
--

CREATE TABLE `tc_rtb_c2l` (
  `uid` varchar(100) NOT NULL,
  `c_uid` varchar(100) NOT NULL,
  `l_uid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_rtb_c2l`
--

INSERT INTO `tc_rtb_c2l` (`uid`, `c_uid`, `l_uid`) VALUES
('tcc2l-5e747c04c910f', 'tcfg-5e747c048d59d', 'tcl-5e747b91925ec'),
('tcc2l-5e747c04e44fc', 'tcfg-5e747c048d59d', 'tcl-5e747b9fcaf49'),
('tcc2l-5e747c19d1759', 'tcfg-5e747c19a5163', 'tcl-5e747bb0dea35'),
('tcc2l-5e747c19ef412', 'tcfg-5e747c19a5163', 'tcl-5e747bc5cfecd'),
('tcc2l-5e77281ec0aea', 'tcfg-5e7727b505d38', 'tcl-5e7727e12c446'),
('tcc2l-5e77281ed8b6f', 'tcfg-5e7727b505d38', 'tcl-5e7727edd020a'),
('tcc2l-5e77281f01637', 'tcfg-5e7727b505d38', 'tcl-5e7727f9d8a34'),
('tcc2l-5e7728286e205', 'tcfg-5e7727c4bd1a9', 'tcl-5e747b91925ec'),
('tcc2l-5e77282883caf', 'tcfg-5e7727c4bd1a9', 'tcl-5e747b9fcaf49'),
('tcc2l-5e7728289f21d', 'tcfg-5e7727c4bd1a9', 'tcl-5e747bb0dea35'),
('tcc2l-5e772828b7494', 'tcfg-5e7727c4bd1a9', 'tcl-5e747bc5cfecd'),
('tcc2l-5e8dd2491c193', 'tcfg-5e8dd1f28d74b', 'tcl-5e8dd2021c3cc'),
('tcc2l-5e8dd249367d2', 'tcfg-5e8dd1f28d74b', 'tcl-5e8dd21a43e66'),
('tcc2l-5e8dd24962093', 'tcfg-5e8dd1f28d74b', 'tcl-5e8dd22ab868d');

-- --------------------------------------------------------

--
-- Table structure for table `tc_rtb_c2t`
--

CREATE TABLE `tc_rtb_c2t` (
  `uid` varchar(100) NOT NULL,
  `c_uid` varchar(100) NOT NULL,
  `t_uid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_rtb_c2t`
--

INSERT INTO `tc_rtb_c2t` (`uid`, `c_uid`, `t_uid`) VALUES
('tcc2t-5e9ee92a91a78', 'tcfg-5e9ee92a51b3f', 'tct-5e747c31c0dca'),
('tcc2t-5e9f37dfc491a', 'tcfg-5e9f37df9e869', 'tct-5e7727830c377');

-- --------------------------------------------------------

--
-- Table structure for table `tc_rtb_t2c`
--

CREATE TABLE `tc_rtb_t2c` (
  `uid` varchar(100) NOT NULL,
  `t_uid` varchar(100) NOT NULL,
  `c_uid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_rtb_t2c`
--

INSERT INTO `tc_rtb_t2c` (`uid`, `t_uid`, `c_uid`) VALUES
('tct2c-5e747c31cfddb', 'tct-5e747c31c0dca', 'tcfg-5e747be5189be'),
('tct2c-5e747c31dfcb0', 'tct-5e747c31c0dca', 'tcfg-5e747c048d59d'),
('tct2c-5e747c3203fe2', 'tct-5e747c31c0dca', 'tcfg-5e747c19a5163'),
('tct2c-5e8c889d4fdda', 'tct-5e7727830c377', 'tcfg-5e77279ee1df1'),
('tct2c-5e8c889dabf67', 'tct-5e7727830c377', 'tcfg-5e7727b505d38'),
('tct2c-5e8c889dc60d8', 'tct-5e7727830c377', 'tcfg-5e7727c4bd1a9'),
('tct2c-5ea0536e15aeb', 'tct-5e8dd2b524902', 'tcfg-5e747c19a5163'),
('tct2c-5ea0536e3e324', 'tct-5e8dd2b524902', 'tcfg-5e8dd1b602a52'),
('tct2c-5ea0536e4e11b', 'tct-5e8dd2b524902', 'tcfg-5e8dd1ca9db5f'),
('tct2c-5ea0536e5e22d', 'tct-5e8dd2b524902', 'tcfg-5e8dd1f28d74b'),
('tct2c-5ea0536e6e423', 'tct-5e8dd2b524902', 'tcfg-5e9f37df9e869');

-- --------------------------------------------------------

--
-- Table structure for table `tc_template`
--

CREATE TABLE `tc_template` (
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `component_t2crtb` varchar(100) NOT NULL,
  `gen_component` varchar(50) NOT NULL,
  `gen_opt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_template`
--

INSERT INTO `tc_template` (`uid`, `name`, `component_t2crtb`, `gen_component`, `gen_opt`) VALUES
('tct-5e747c31c0dca', 'Offer Template 1', '1', '', 1),
('tct-5e7727830c377', 'Template Prototype', '1', '', 0),
('tct-5e8dd2b524902', 'PP1', '1', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offer_data`
--
ALTER TABLE `offer_data`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `offer_meta`
--
ALTER TABLE `offer_meta`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tc_fgroup`
--
ALTER TABLE `tc_fgroup`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tc_lookup`
--
ALTER TABLE `tc_lookup`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tc_rtb_c2l`
--
ALTER TABLE `tc_rtb_c2l`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tc_rtb_c2t`
--
ALTER TABLE `tc_rtb_c2t`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tc_rtb_t2c`
--
ALTER TABLE `tc_rtb_t2c`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tc_template`
--
ALTER TABLE `tc_template`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
