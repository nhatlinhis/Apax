-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2021 at 06:16 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlks`
--

-- --------------------------------------------------------

--
-- Table structure for table `baocaodt`
--

DROP TABLE IF EXISTS `baocaodt`;
CREATE TABLE IF NOT EXISTS `baocaodt` (
  `MaBaoCaoDT` char(7) NOT NULL,
  `Ngay` date DEFAULT NULL,
  `Thang` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaBaoCaoDT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baocaodt`
--

INSERT INTO `baocaodt` (`MaBaoCaoDT`, `Ngay`, `Thang`) VALUES
('102020', '2021-06-08', 10),
('112020', '2021-06-08', 11),
('12016', '2021-06-08', 1),
('12021', '2021-06-16', 1),
('122020', '2021-01-01', 12),
('22016', '2021-06-08', 2),
('22021', '2021-06-16', 2),
('32021', '2021-06-27', 3),
('42021', '2021-06-27', 4),
('52016', '2021-06-08', 5),
('52021', '2021-06-16', 5),
('62021', '2021-06-27', 6),
('72020', '2021-06-08', 7),
('82020', '2021-06-08', 8),
('92020', '2021-06-08', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ct_baocaodt`
--

DROP TABLE IF EXISTS `ct_baocaodt`;
CREATE TABLE IF NOT EXISTS `ct_baocaodt` (
  `MaCT_BaoCaoDT` char(10) NOT NULL,
  `DoanhThu` bigint(20) DEFAULT NULL,
  `TiLe` double DEFAULT NULL,
  `MaBaoCaoDT` char(7) DEFAULT NULL,
  `MaLoaiPhong` char(5) DEFAULT NULL,
  PRIMARY KEY (`MaCT_BaoCaoDT`),
  KEY `FK_CTBCDT_LP` (`MaLoaiPhong`),
  KEY `FK_CTBCDT_BCDT` (`MaBaoCaoDT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_baocaodt`
--

INSERT INTO `ct_baocaodt` (`MaCT_BaoCaoDT`, `DoanhThu`, `TiLe`, `MaBaoCaoDT`, `MaLoaiPhong`) VALUES
('102020A', 0, NULL, '102020', 'A'),
('102020B', 1700000, 54.84, '102020', 'B'),
('102020C', 1400000, 45.16, '102020', 'C'),
('112020B', 1700000, 80.95, '112020', 'B'),
('112020C', 400000, 19.05, '112020', 'C'),
('12021A', 3300000, 31.7, '12021', 'A'),
('12021B', 1500000, 14.41, '12021', 'B'),
('12021C', 5610000, 53.89, '12021', 'C'),
('22021A', 1500000, 30.61, '22021', 'A'),
('22021B', 3400000, 69.39, '22021', 'B'),
('22021C', 3400000, 69.39, '22021', 'C'),
('52021B', 1200000, 41.38, '52021', 'B'),
('52021C', 1700000, 58.62, '52021', 'C'),
('62021A', 150000, 100, '62021', 'A'),
('72020A', 150000, 21.28, '72020', 'A'),
('72020B', 255000, 36.17, '72020', 'B'),
('72020C', 300000, 42.55, '72020', 'C'),
('82020A', 1500000, 40.65, '82020', 'A'),
('82020B', 1190000, 32.25, '82020', 'B'),
('82020C', 1000000, 27.1, '82020', 'C'),
('92020A', 2475000, 40.61, '92020', 'A'),
('92020B', 1020000, 16.74, '92020', 'B'),
('92020C', 2600000, 42.66, '92020', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `ct_hoadon`
--

DROP TABLE IF EXISTS `ct_hoadon`;
CREATE TABLE IF NOT EXISTS `ct_hoadon` (
  `MaPhieuThue` int(11) DEFAULT NULL,
  `SoNgayThue` int(11) DEFAULT NULL,
  `ThanhTien` mediumint(9) DEFAULT NULL,
  `DonGiaDuocTinh` mediumint(9) DEFAULT NULL,
  `MaHD` int(11) DEFAULT NULL,
  KEY `FK_CTHD_HD` (`MaHD`),
  KEY `FK_CTHD_PT` (`MaPhieuThue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_hoadon`
--

INSERT INTO `ct_hoadon` (`MaPhieuThue`, `SoNgayThue`, `ThanhTien`, `DonGiaDuocTinh`, `MaHD`) VALUES
(1, 1, 150000, 150000, 1),
(2, 1, 255000, 255000, 2),
(3, 1, 300000, 300000, 3),
(4, 7, 1190000, 170000, 4),
(5, 10, 1500000, 150000, 5),
(6, 5, 1000000, 200000, 6),
(8, 6, 1020000, 170000, 7),
(9, 13, 2600000, 200000, 8),
(7, 11, 2475000, 225000, 9),
(10, 7, 1400000, 200000, 10),
(11, 10, 1700000, 170000, 11),
(12, 2, 400000, 200000, 12),
(13, 10, 1700000, 170000, 13),
(14, 10, 1500000, 150000, 14),
(15, 22, 5610000, 255000, 15),
(16, 11, 3300000, 300000, 16),
(17, 10, 1500000, 150000, 17),
(18, 20, 3400000, 170000, 18),
(19, 4, 1200000, 300000, 19),
(20, 10, 1700000, 170000, 20),
(21, 1, 150000, 150000, 21);

-- --------------------------------------------------------

--
-- Table structure for table `ct_phieuthue`
--

DROP TABLE IF EXISTS `ct_phieuthue`;
CREATE TABLE IF NOT EXISTS `ct_phieuthue` (
  `MaCT_PTP` char(10) NOT NULL,
  `MaPhieuThue` int(11) DEFAULT NULL,
  `MaKhachHang` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaCT_PTP`),
  KEY `FK_CTPT_PT` (`MaPhieuThue`),
  KEY `FK_CTPT_KH` (`MaKhachHang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_phieuthue`
--

INSERT INTO `ct_phieuthue` (`MaCT_PTP`, `MaPhieuThue`, `MaKhachHang`) VALUES
('P10K12', 10, 12),
('P11K13', 11, 13),
('P12K14', 12, 14),
('P13K15', 13, 15),
('P14K16', 14, 16),
('P15K17', 15, 17),
('P15K18', 15, 18),
('P16K19', 16, 19),
('P16K20', 16, 20),
('P17K21', 17, 21),
('P17K22', 17, 22),
('P18K23', 18, 23),
('P19K24', 19, 24),
('P1K1', 1, 1),
('P20K25', 20, 25),
('P20K26', 20, 26),
('P21K28', 21, 28),
('P22K29', 22, 29),
('P23K30', 23, 30),
('P23K31', 23, 31),
('P24K32', 24, 32),
('P24K33', 24, 33),
('P24K34', 24, 34),
('P2K2', 2, 2),
('P3K3', 3, 3),
('P3K4', 3, 4),
('P4K5', 4, 5),
('P4K6', 4, 6),
('P5K7', 5, 7),
('P6K8', 6, 8),
('P8K9', 8, 9),
('P9K10', 9, 10),
('P9K11', 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucphong`
--

DROP TABLE IF EXISTS `danhmucphong`;
CREATE TABLE IF NOT EXISTS `danhmucphong` (
  `MaPhong` char(5) NOT NULL,
  `TenPhong` varchar(255) DEFAULT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `TinhTrangPhong` int(11) DEFAULT NULL,
  `MaLoaiPhong` char(5) DEFAULT NULL,
  PRIMARY KEY (`MaPhong`),
  KEY `FK_DMP_LP` (`MaLoaiPhong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmucphong`
--

INSERT INTO `danhmucphong` (`MaPhong`, `TenPhong`, `GhiChu`, `TinhTrangPhong`, `MaLoaiPhong`) VALUES
('A1001', 'Phong A1001', '', 1, 'A'),
('A1002', 'Phong A1002', '', 0, 'A'),
('A1003', 'Phong A1003', '', 2, 'A'),
('A1010', 'PhÃ²ng A1010', '', 0, 'A'),
('A1011', 'PhÃ²ng A1011', '', 0, 'A'),
('B1001', 'Phong B1001', '', 0, 'B'),
('B1002', 'Phong B1002', '', 0, 'B'),
('B1003', 'Phong B1003', '', 0, 'B'),
('B1004', 'Phong B1004', '', 0, 'B'),
('B1005', 'Phong B1005', '', 0, 'B'),
('B1006', 'Phong B1006', '', 1, 'B'),
('C1001', 'Phong C1001', '', 0, 'C'),
('C1002', 'Phong C1002', '', 0, 'C'),
('C1003', 'Phong C1003', '', 0, 'C'),
('C1004', 'Phong C1004', '', 0, 'C'),
('C1005', 'Phong C1005', '', 1, 'C'),
('C1006', 'Phong C1006', '', 2, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `MaHD` int(11) NOT NULL,
  `TriGia` mediumint(9) DEFAULT NULL,
  `TenKh` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `NgayLap` date DEFAULT NULL,
  PRIMARY KEY (`MaHD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `TriGia`, `TenKh`, `DiaChi`, `NgayLap`) VALUES
(1, 150000, 'Hieu', 'Ha Noi', '2020-07-07'),
(2, 255000, 'Hung', 'Ho Chi Minh', '2020-07-07'),
(3, 300000, 'Trang', 'An Giang', '2020-07-07'),
(4, 1190000, 'Lan', 'Ho Chi Minh', '2020-08-15'),
(5, 1500000, 'Phong', 'Ha Noi', '2020-08-20'),
(6, 1000000, 'Tam', 'Ca Mau', '2020-08-25'),
(7, 1020000, 'Nhi', 'Ho Chi Minh', '2020-09-15'),
(8, 2600000, 'KhÃ¡nh', 'Ho Chi Minh', '2020-09-25'),
(9, 2475000, 'John', 'Canada', '2020-09-20'),
(10, 1400000, 'Háº­u', 'Ho Chi Minh', '2020-10-15'),
(11, 1700000, 'Duy', 'Ho Chi Minh', '2020-10-20'),
(12, 400000, 'HoÃ ng', 'Binh Duong', '2020-11-13'),
(13, 1700000, 'Phong', 'Long An', '2020-11-30'),
(14, 1500000, 'DuyÃªn ', 'KiÃªn Giang', '2021-01-15'),
(15, 5610000, 'David Tráº§n', 'Ho Chi Minh', '2021-01-25'),
(16, 3300000, 'John Dang', 'Ha Noi', '2021-01-31'),
(17, 1500000, 'Linh', 'Ho Chi Minh', '2021-02-12'),
(18, 3400000, 'DÅ©ng', 'Binh Duong', '2021-02-25'),
(19, 1200000, 'John Nguyen', 'Ho Chi Minh', '2021-05-02'),
(20, 1700000, 'Phong', 'Ho Chi Minh', '2021-05-05'),
(21, 150000, 'HoÃ ng', 'Long XuyÃªn', '2021-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `TenKh` varchar(255) DEFAULT NULL,
  `CMND` int(11) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `MaLoaiKh` char(5) DEFAULT NULL,
  PRIMARY KEY (`MaKhachHang`),
  KEY `FK_KH_LK` (`MaLoaiKh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKh`, `CMND`, `DiaChi`, `MaLoaiKh`) VALUES
(1, 'Hieu', 109, 'Ha Noi', 'ND'),
(2, 'Hung', 789, 'Vinh Long', 'NN'),
(3, 'Trang', 456, 'An Giang', 'NN'),
(4, 'Phat', 123, 'Can Tho', 'ND'),
(5, 'Lan', 111, 'Ho Chi Minh', 'ND'),
(6, 'Nga', 222, 'Ho Chi Minh', 'ND'),
(7, 'Phong', 555, 'Ha Noi', 'ND'),
(8, 'Tam', 777, 'Ca Mau', 'ND'),
(9, 'Nhi', 999, 'Ho Chi Minh', 'ND'),
(10, 'Trang', 129, 'Vung Tau', 'ND'),
(11, 'KhÃ¡nh', 921, 'Ho Chi Minh', 'ND'),
(12, 'Háº­u', 345, 'Ho Chi Minh', 'ND'),
(13, 'Duy', 999, 'Ho Chi Minh', 'ND'),
(14, 'HoÃ ng', 333, 'Binh Duong', 'ND'),
(15, 'Phong', 901, 'Long An', 'ND'),
(16, 'DuyÃªn', 324, 'KiÃªn Giang', 'ND'),
(17, 'David Tráº§n', 888, 'Ho Chi Minh', 'NN'),
(18, 'Linh', 911, 'Ho Chi Minh', 'ND'),
(19, 'John Dang', 444, 'Ha Noi', 'NN'),
(20, 'Lan', 369, 'Ha Noi', 'ND'),
(21, 'Linh', 432, 'Ho Chi Minh', 'ND'),
(22, 'Lan', 234, 'Ho Chi Minh', 'ND'),
(23, 'DÅ©ng', 988, 'Binh Duong', 'ND'),
(24, 'John Nguyen', 666, 'Ho Chi Minh', 'NN'),
(25, 'Phong', 133, 'Ho Chi Minh', 'ND'),
(26, 'Lan', 334, 'Ha Noi', 'ND'),
(27, 'Hoang', 1901, 'Long Xuyen', 'ND'),
(28, 'Hoang', 1901, 'Long Xuyen', 'ND'),
(29, 'Trang', 1901, 'Long Xuyen', 'ND'),
(30, 'Duy', 123, 'Vinh Long', 'ND'),
(31, 'Nga', 987, 'Khanh Hoa', 'NN'),
(32, 'Linh', 567, 'Long Xuyen', 'ND'),
(33, 'Hau', 123, 'Tay Ninh', 'NN'),
(34, 'Nhi', 345, 'Hue', 'ND');

-- --------------------------------------------------------

--
-- Table structure for table `loaikhach`
--

DROP TABLE IF EXISTS `loaikhach`;
CREATE TABLE IF NOT EXISTS `loaikhach` (
  `MaLoaiKh` char(5) NOT NULL,
  `TenLoaiKh` varchar(255) DEFAULT NULL,
  `HeSoPhuThu` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`MaLoaiKh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaikhach`
--

INSERT INTO `loaikhach` (`MaLoaiKh`, `TenLoaiKh`, `HeSoPhuThu`) VALUES
('ND', 'Noi Dia', '1.00'),
('NN', 'Nuoc Ngoai', '1.50');

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong`
--

DROP TABLE IF EXISTS `loaiphong`;
CREATE TABLE IF NOT EXISTS `loaiphong` (
  `MaLoaiPhong` char(5) NOT NULL,
  `TenLoaiPhong` varchar(255) DEFAULT NULL,
  `DonGiaTieuChuan` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaLoaiPhong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaiphong`
--

INSERT INTO `loaiphong` (`MaLoaiPhong`, `TenLoaiPhong`, `DonGiaTieuChuan`, `SoLuong`) VALUES
('A', 'Phong Loai A', 150000, 5),
('B', 'Phong Loai B', 170000, 6),
('C', 'Phong Loai C', 200000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `phieuthue`
--

DROP TABLE IF EXISTS `phieuthue`;
CREATE TABLE IF NOT EXISTS `phieuthue` (
  `MaPhieuThue` int(11) NOT NULL,
  `NgayBdThue` date DEFAULT NULL,
  `DonGiaTieuChuan` int(11) DEFAULT NULL,
  `DonGiaDuocTinh` int(11) DEFAULT NULL,
  `SoLuongKh` int(11) DEFAULT NULL,
  `MaPhong` char(5) DEFAULT NULL,
  PRIMARY KEY (`MaPhieuThue`),
  KEY `FK_PT_DMP` (`MaPhong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieuthue`
--

INSERT INTO `phieuthue` (`MaPhieuThue`, `NgayBdThue`, `DonGiaTieuChuan`, `DonGiaDuocTinh`, `SoLuongKh`, `MaPhong`) VALUES
(1, '2020-07-07', 150000, 150000, 1, 'A1002'),
(2, '2020-07-07', 170000, 255000, 1, 'B1001'),
(3, '2020-07-07', 200000, 300000, 2, 'C1001'),
(4, '2020-08-08', 170000, 170000, 2, 'A1003'),
(5, '2020-08-10', 150000, 150000, 1, 'C1005'),
(6, '2020-08-20', 200000, 200000, 1, 'B1004'),
(7, '2020-09-09', 150000, 225000, 1, 'C1003'),
(8, '2020-09-09', 170000, 170000, 1, 'B1002'),
(9, '2020-09-12', 200000, 200000, 2, 'B1005'),
(10, '2020-10-08', 200000, 200000, 1, 'B1004'),
(11, '2020-10-10', 170000, 170000, 1, 'C1004'),
(12, '2020-11-11', 200000, 200000, 1, 'C1002'),
(13, '2020-11-20', 170000, 170000, 1, 'A1003'),
(14, '2021-01-05', 150000, 150000, 1, 'B1003'),
(15, '2021-01-03', 170000, 255000, 2, 'C1004'),
(16, '2021-01-20', 200000, 300000, 2, 'A1001'),
(17, '2021-02-02', 150000, 150000, 2, 'A1002'),
(18, '2021-02-05', 170000, 170000, 1, 'C1004'),
(19, '2021-04-28', 200000, 300000, 1, 'B1005'),
(20, '2021-04-25', 170000, 170000, 2, 'C1004'),
(21, '2021-06-27', 150000, 150000, 1, 'A1001'),
(22, '2021-06-27', 150000, 150000, 1, 'A1001'),
(23, '2021-06-27', 200000, 300000, 2, 'C1005'),
(24, '2021-06-27', 170000, 297500, 3, 'B1006');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoanad`
--

DROP TABLE IF EXISTS `taikhoanad`;
CREATE TABLE IF NOT EXISTS `taikhoanad` (
  `taikhoan` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  PRIMARY KEY (`taikhoan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `taikhoanad`
--

INSERT INTO `taikhoanad` (`taikhoan`, `matkhau`) VALUES
('admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoannv`
--

DROP TABLE IF EXISTS `taikhoannv`;
CREATE TABLE IF NOT EXISTS `taikhoannv` (
  `taikhoan` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  PRIMARY KEY (`taikhoan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `taikhoannv`
--

INSERT INTO `taikhoannv` (`taikhoan`, `matkhau`) VALUES
('user', '1');

-- --------------------------------------------------------

--
-- Table structure for table `thamso`
--

DROP TABLE IF EXISTS `thamso`;
CREATE TABLE IF NOT EXISTS `thamso` (
  `TenThamSo` varchar(30) NOT NULL,
  `GiaTri` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`TenThamSo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thamso`
--

INSERT INTO `thamso` (`TenThamSo`, `GiaTri`) VALUES
('PhuThuKhachNN', '1.50'),
('PhuThuKhachToiDa', '1.25'),
('SoKhachToiDa', '3.00'),
('SoPhongToiDa', '20.00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_baocaodt`
--
ALTER TABLE `ct_baocaodt`
  ADD CONSTRAINT `CT_BAOCAODT_ibfk_1` FOREIGN KEY (`MaLoaiPhong`) REFERENCES `loaiphong` (`MaLoaiPhong`),
  ADD CONSTRAINT `CT_BAOCAODT_ibfk_2` FOREIGN KEY (`MaBaoCaoDT`) REFERENCES `baocaodt` (`MaBaoCaoDT`);

--
-- Constraints for table `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD CONSTRAINT `CT_HOADON_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `CT_HOADON_ibfk_2` FOREIGN KEY (`MaPhieuThue`) REFERENCES `phieuthue` (`MaPhieuThue`);

--
-- Constraints for table `ct_phieuthue`
--
ALTER TABLE `ct_phieuthue`
  ADD CONSTRAINT `CT_PHIEUTHUE_ibfk_1` FOREIGN KEY (`MaPhieuThue`) REFERENCES `phieuthue` (`MaPhieuThue`),
  ADD CONSTRAINT `CT_PHIEUTHUE_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Constraints for table `danhmucphong`
--
ALTER TABLE `danhmucphong`
  ADD CONSTRAINT `DANHMUCPHONG_ibfk_1` FOREIGN KEY (`MaLoaiPhong`) REFERENCES `loaiphong` (`MaLoaiPhong`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `KHACHHANG_ibfk_1` FOREIGN KEY (`MaLoaiKh`) REFERENCES `loaikhach` (`MaLoaiKh`);

--
-- Constraints for table `phieuthue`
--
ALTER TABLE `phieuthue`
  ADD CONSTRAINT `PHIEUTHUE_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `danhmucphong` (`MaPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
