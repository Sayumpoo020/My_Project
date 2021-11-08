-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2021 at 03:50 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(5) NOT NULL,
  `a_name` varchar(100) COLLATE tis620_bin NOT NULL,
  `a_user` varchar(100) COLLATE tis620_bin NOT NULL,
  `a_pwd` varchar(100) COLLATE tis620_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_user`, `a_pwd`) VALUES
(1, 'สยุมภู', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Id_m` int(11) NOT NULL,
  `fname` varchar(100) COLLATE tis620_bin NOT NULL,
  `lname` varchar(100) COLLATE tis620_bin NOT NULL,
  `pass` varchar(100) COLLATE tis620_bin NOT NULL,
  `tel` varchar(20) COLLATE tis620_bin NOT NULL,
  `address` text COLLATE tis620_bin NOT NULL,
  `email` varchar(100) COLLATE tis620_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Id_m`, `fname`, `lname`, `pass`, `tel`, `address`, `email`) VALUES
(1, 'สมชาย', 'ถึงที่', '827ccb0eea8a706c4c34a16891f84e7b', '09999999', '258 Rot-ET', 'som@gmail.com'),
(3, 'SAYUMPOO', 'KUDHOM', '56ba1e5da64333fb03a82296a307785e', '0934428606', '273 หมู่4 บ้านรอบเมือง ตำบลรอบเมือง', 'sayumpoo004@gmail.com'),
(4, 'ประวิตร', 'หลับในสภา', '827ccb0eea8a706c4c34a16891f84e7b', '09999999', 'abcd 77/8', 'aaa@hotmail.com'),
(7, 'ประยุทธิ์', 'ไม่ออก', '56ba1e5da64333fb03a82296a307785e', '191', 'ในสภา', 'payut@hotmail.com'),
(8, 'กัลยา', 'อุปแก้ว', '25d55ad283aa400af464c76d713c07ad', '191', 'บ้าน', '63010974001@msu.ac.th');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(7) UNSIGNED ZEROFILL NOT NULL,
  `ototal` int(7) NOT NULL,
  `odate` datetime NOT NULL,
  `member_id` int(7) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `ototal`, `odate`, `member_id`, `status`) VALUES
(0000001, 3685, '2017-11-14 12:56:27', 0, 'จัดส่งสำเร็จ'),
(0000002, 5080, '2017-11-14 12:57:15', 0, 'จัดส่งสำเร็จ'),
(0000003, 0, '2021-10-09 00:06:33', 0, 'จัดส่งสำเร็จ'),
(0000004, 760, '2021-10-09 21:08:12', 0, 'กำลังจัดเตรียม'),
(0000019, 658, '2021-10-12 14:54:33', 1, 'จัดส่งสำเร็จ'),
(0000018, 630, '2021-10-11 17:15:28', 3, 'จัดส่งสำเร็จ'),
(0000017, 1750, '2021-10-11 16:52:00', 3, 'กำลังจัดเตรียม'),
(0000016, 1120, '2021-10-11 16:49:36', 3, 'กำลังจัดเตรียม'),
(0000015, 120, '2021-10-09 22:17:51', 3, 'กำลังจัดเตรียม'),
(0000014, 590, '2021-10-09 22:08:51', 0, 'กำลังจัดเตรียม'),
(0000020, 719, '2021-10-12 19:35:26', 3, 'กำลังจัดเตรียม'),
(0000021, 675, '2021-10-12 19:36:22', 1, 'กำลังจัดส่ง'),
(0000022, 690, '2021-10-12 23:26:51', 7, 'จัดส่งสำเร็จ'),
(0000023, 340, '2021-10-14 20:03:53', 8, 'กำลังจัดเตรียม'),
(0000024, 250, '2021-10-14 20:08:14', 8, 'กำลังจัดส่ง'),
(0000025, 370, '2021-10-14 22:03:09', 8, 'กำลังจัดส่ง'),
(0000026, 1917, '2021-10-15 08:32:27', 3, 'จัดส่งสำเร็จ');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `od_id` int(6) NOT NULL,
  `oid` int(7) UNSIGNED ZEROFILL NOT NULL,
  `pid` int(7) NOT NULL,
  `item` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`od_id`, `oid`, `pid`, `item`) VALUES
(1, 0000001, 7, 2),
(2, 0000001, 1, 1),
(3, 0000001, 9, 3),
(4, 0000002, 6, 2),
(5, 0000002, 4, 1),
(6, 0000004, 1, 1),
(7, 0000004, 6, 1),
(8, 0000004, 3, 1),
(9, 0000005, 1, 1),
(10, 0000006, 2, 1),
(33, 0000018, 1, 1),
(32, 0000017, 1, 3),
(31, 0000017, 3, 2),
(30, 0000017, 2, 4),
(29, 0000016, 1, 2),
(28, 0000016, 3, 1),
(27, 0000016, 2, 3),
(26, 0000015, 2, 1),
(25, 0000014, 5, 1),
(24, 0000014, 4, 1),
(23, 0000014, 6, 1),
(34, 0000018, 2, 1),
(35, 0000018, 3, 1),
(36, 0000019, 11, 1),
(37, 0000019, 7, 1),
(38, 0000019, 3, 1),
(39, 0000020, 8, 1),
(40, 0000020, 10, 1),
(41, 0000020, 4, 2),
(42, 0000021, 17, 1),
(43, 0000021, 16, 1),
(44, 0000021, 18, 1),
(45, 0000022, 17, 1),
(46, 0000022, 14, 1),
(47, 0000022, 3, 1),
(48, 0000023, 13, 1),
(49, 0000023, 2, 1),
(50, 0000024, 1, 1),
(51, 0000025, 1, 1),
(52, 0000025, 2, 1),
(53, 0000026, 3, 2),
(54, 0000026, 5, 4),
(55, 0000026, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(4) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_detail` text NOT NULL,
  `p_price` int(6) NOT NULL,
  `p_picture` varchar(200) NOT NULL,
  `p_type` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_picture`, `p_type`) VALUES
(1, 'แหวนดอกไม้ Happy', 'แหวนสำหรับใส่เพื่อความสวยงาม', 250, '512e2b3fe097ed6fe554ee92c32de459.jpg', 1),
(2, 'แหวนดอกไม้ - สีส้ม', 'แหวนสำหรับใส่เพื่อความสวยงาม', 120, '611086db08bef2167d56d6afc43e3e02.jpg', 1),
(3, 'แหวนไข่มุก มีใจ', 'แหวนสำหรับใส่เพื่อความสวยงาม', 260, 'a3c42486d091143d28e89bd397e0a46b.jpg', 1),
(4, 'แหวนดอกไม้พาสเทล', 'แหวนสำหรับใส่เพื่อความสวยงาม', 140, 'bdad1ecffc4753621dc69c84d1660630.jpg', 1),
(5, 'แหวนผีเสือ', 'แหวนสำหรับใส่เพื่อความสวยงาม', 200, 'cbca3c98e5ec2622a42810d961629da7.jpg', 1),
(6, 'แหวนไข่มุก', 'แหวนสำหรับใส่เพื่อความสวยงาม', 250, 'ed56592da405b32a67641585cf1589dd.jpg', 1),
(7, 'สร้อยหลากสี', 'สร้อยคอสำหรับใส่เพื่อความสวยงาม', 199, '4D55DC10-BFEB-4585-8AB8-09F4AED9233F.jpg', 2),
(8, 'สร้อยคอ ดาววิ๊บวับ ๆๆๆๆ', 'สร้อยคอสำหรับใส่เพื่อความสวยงาม', 199, '8f64cc005544eb374a98fd34b9676a84.jpg', 2),
(9, 'สร้อยคอแม่ใหญ่ ศรี', 'สร้อยคอสำหรับใส่เพื่อความสวยงาม', 200, '20BE00ED-55E4-4B69-8A05-5DF88A7688FC.jpg', 2),
(10, 'สร้อยคอ ผีเสื้อ', 'สร้อยคอสำหรับใส่เพื่อความสวยงาม', 240, '43ad25cc340d2b0153e73e27b285d90c.jpg', 2),
(11, 'สร้อยคอ ทูโทน', 'สร้อยคอสำหรับใส่เพื่อความสวยงาม', 199, '20BE.jpg', 2),
(12, 'สร้อยคอ ดอกไม้ Happy', 'สร้อยคอสำหรับใส่เพื่อความสวยงาม', 270, '32b9d76d78237cd43565c98fc7f59552.jpg', 2),
(13, 'สร้อยข้อมือ รวมมิตร', 'สร้อยข้อมือสำหรับใส่เพื่อความสวยงาม', 220, '0ef7b36e6f2d651f6a99886fbf0d9df7.jpg', 3),
(14, 'สร้อยข้อมือ Rainbow Happy', 'สร้อยข้อมือสำหรับใส่เพื่อความสวยงาม', 230, '5CEF965F-86D7-4923-B246-0ECAFA956EEA.jpg', 3),
(15, 'สร้อยข้อมือ น้องกระต่าย', 'สร้อยข้อมือสำหรับใส่เพื่อความสวยงาม', 260, '24df590c33cade826c2b8b10674a52c1.jpg', 3),
(16, 'สร้อยข้อมือ ไข่มุก กรวด', 'สร้อยข้อมือสำหรับใส่เพื่อความสวยงาม', 245, 'AOPWgSXV6e5G2m6oIkzx5cHGid1FehnOhN5CraLH.jpg', 3),
(17, 'สร้อยข้อมือ หัวใจ วิ๊งๆ', 'สร้อยข้อมือสำหรับใส่เพื่อความสวยงาม', 200, 'IMG_1962.jpg', 3),
(18, 'สร้อยข้อมือ ใส่ชื่อ', 'สร้อยข้อมือสำหรับใส่เพื่อความสวยงาม', 230, 'IMG_1964.PNG', 3),
(38, 'test', 'หหห  ', 20, 'unnamed.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `pt_id` int(3) NOT NULL,
  `pt_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pt_id`, `pt_name`) VALUES
(1, 'แหวน'),
(2, 'สร้อย'),
(3, 'สร้อยข้อมือ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id_m`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `od_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
