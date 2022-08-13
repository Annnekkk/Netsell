-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 17, 2022 lúc 08:37 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `stk` text NOT NULL,
  `ctk` text NOT NULL,
  `ngan_hang` text NOT NULL,
  `noidung` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `bank`
--

INSERT INTO `bank` (`id`, `stk`, `ctk`, `ngan_hang`, `noidung`, `logo`) VALUES
(13, '11232323', 'Nguyễn Tuấn Anh', 'abc', 'nap', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `ngan_hang` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `ma_gd` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `ten_nguoi_gui` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `noidung_ck` text CHARACTER SET utf16 COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `thucnhan` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `time` text DEFAULT NULL,
  `username` varchar(32) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `status` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `banks`
--

INSERT INTO `banks` (`id`, `ngan_hang`, `ma_gd`, `ten_nguoi_gui`, `noidung_ck`, `thucnhan`, `time`, `username`, `status`) VALUES
(1, 'momo', '13203510013', '', '', '1000', '1624545128', 'admin', 'xuly');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `loaithe` varchar(32) NOT NULL,
  `menhgia` int(11) NOT NULL,
  `thucnhan` int(11) DEFAULT 0,
  `seri` text NOT NULL,
  `pin` text NOT NULL,
  `createdate` datetime NOT NULL,
  `status` varchar(32) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `cards`
--

INSERT INTO `cards` (`id`, `code`, `username`, `loaithe`, `menhgia`, `thucnhan`, `seri`, `pin`, `createdate`, `status`, `note`) VALUES
(1, '0EIOuh4MURbJ', 'admin', 'VIETTEL', 10000, 9000, '10007669433139', '511588948998551', '2022-05-24 20:32:34', 'xuly', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `code` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `pin` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `display` varchar(32) DEFAULT 'show',
  `money` int(11) NOT NULL DEFAULT 0,
  `badge` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `code`, `pin`, `title`, `note`, `display`, `money`, `badge`) VALUES
(34, 'NICKTDSRAND1', 'xuttc', 'NICK TDS RANDOM 1M - 2M XU', '<p>Random 1.000.000 - 2.000.000 xu<br></p>', 'show', 30000, 'sale'),
(35, 'CLONEVERYMAIL', 'clone', 'CLONE VERY MAIL', '<p>Định dạng tài khoản: ID|PASS|2FA|COOKIE|TOKEN</p><p>Đã check live trước khi mua, không bảo hành login...</p>', 'show', 100, 'Hàng mới up!'),
(36, '3IKTR24ZFQ9P', 'clone', 'clone bá đạo', '<p>id|pass|2fa</p>', 'show', 10000, 'sale');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc_clone`
--

CREATE TABLE `chuyenmuc_clone` (
  `id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `name` text NOT NULL,
  `display` text NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuyenmuc_clone`
--

INSERT INTO `chuyenmuc_clone` (`id`, `code`, `name`, `display`, `createdate`) VALUES
(1, 'clone', 'clone vip', 'show', '2022-05-17 07:43:10'),
(3, 'xuttc', 'xu tương tác chép', 'show', '2022-05-23 14:14:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `msg1` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg2` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg3` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg4` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg5` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg6` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg7` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg8` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg9` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg10` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg11` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg12` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `msg13` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `14` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `15` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `16` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `17` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `18` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `19` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `20` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side1` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side2` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side3` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side4` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side5` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side6` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side7` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side8` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `side9` text COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `lang`
--

INSERT INTO `lang` (`id`, `msg1`, `msg2`, `msg3`, `msg4`, `msg5`, `msg6`, `msg7`, `msg8`, `msg9`, `msg10`, `msg11`, `msg12`, `msg13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `side1`, `side2`, `side3`, `side4`, `side5`, `side6`, `side7`, `side8`, `side9`) VALUES
(1, 'Vui lòng điền vào ô trống !', 'Tài khoản không tồn tại trong hệ thống !', 'Địa chỉ Email đã tồn tại !', 'IP này đã đạt giới hạn tạo tài khoản!', 'Đăng ký tài khoản thành công !', 'Vui lòng điền vào ô trống !', 'Tài khoản không tồn tại trong hệ thống !', 'Mật khẩu không chính xác', 'Đăng nhập thành công !', 'Vui lòng điền vào ô trống !', 'Địa chỉ email không hợp lệ !', 'Địa chỉ email không có trong hệ thống !', 'Vui lòng kiểm tra hòm thư Email của bạn!', 'Vui lòng đăng nhập để tiếp tục', 'Số lượng tối thiểu là 1 tài khoản !', 'Số lượng tối đa khi mua 1 lần là 10.000 !', 'Loại tài khoản không tồn tại !', 'Số tài khoản trong hệ thống không đủ !', 'Số dư không đủ thanh toán!', 'Số lượng tài khoản không đủ, vui lòng thử lại', 'Home', 'Mua Tài Khoản', 'Nạp Tiền', 'Lịch Sử Đơn Hàng', 'Công Cụ', 'Giftcode', 'Cộng Tác Viên', 'Yêu Cầu Hỗ Trợ', 'Liên Hệ Facebook');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `log`
--

INSERT INTO `log` (`id`, `username`, `content`, `createdate`) VALUES
(1, '', 'Thực hiện đăng nhập vào hệ thống ! ', '2020-12-08 15:54:06'),
(2, 'admin', 'Thực hiện dọn dẹp lịch sử đơn hàng ! ', '2020-12-08 18:26:49'),
(3, '', 'Thực hiện đăng nhập vào hệ thống ! ', '2020-12-09 00:26:50'),
(4, 'admin', 'Mua 111 tài khoản NICK GMAIL với giá 99.900đ. ', '2020-12-09 00:36:20'),
(5, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2021-07-06 19:53:06'),
(6, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2021-07-06 21:30:48'),
(7, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2021-07-06 22:12:16'),
(8, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2021-07-06 22:16:14'),
(9, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2021-07-06 22:20:46'),
(10, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 22:37:05'),
(11, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 22:37:22'),
(12, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 23:33:21'),
(13, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 23:46:52'),
(14, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 23:49:04'),
(15, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 23:51:13'),
(16, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 23:55:02'),
(17, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 23:56:10'),
(18, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 23:57:00'),
(19, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-22 23:57:15'),
(20, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-23 10:40:26'),
(21, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-23 10:40:45'),
(22, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-23 11:04:39'),
(23, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-23 11:29:05'),
(24, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-23 11:46:44'),
(25, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-23 12:14:40'),
(26, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-23 18:25:30'),
(27, 'admin', 'Mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ. ', '2022-05-23 19:06:11'),
(28, 'admin', 'Mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ. ', '2022-05-23 19:06:51'),
(29, 'admin', 'Mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ. ', '2022-05-23 19:08:46'),
(30, 'admin', 'Mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ. ', '2022-05-23 19:11:32'),
(31, 'admin', 'Mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ. ', '2022-05-23 19:12:06'),
(32, 'admin', 'Mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ. ', '2022-05-23 19:12:34'),
(33, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-23 23:38:16'),
(34, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-24 11:01:00'),
(35, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-24 16:27:24'),
(36, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-24 20:15:55'),
(37, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-24 21:48:17'),
(38, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-05-25 21:26:42'),
(39, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-06-16 19:04:13'),
(40, 'admin', 'Thực hiện đăng nhập vào hệ thống ! ', '2022-06-16 19:10:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_die`
--

CREATE TABLE `log_die` (
  `id` int(11) NOT NULL,
  `loai` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `uid` varchar(64) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `createdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ls_mua`
--

CREATE TABLE `ls_mua` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `createdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `ls_mua`
--

INSERT INTO `ls_mua` (`id`, `username`, `content`, `createdate`) VALUES
(1, 'adm*****', 'Vừa mua 111 tài khoản NICK GMAIL với giá 99.900đ', '2020-12-09 00:36:20'),
(2, 'admin', 'Vừa mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ', '2022-05-23 19:06:11'),
(3, 'admin', 'Vừa mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ', '2022-05-23 19:06:51'),
(4, 'admin', 'Vừa mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ', '2022-05-23 19:08:46'),
(5, 'admin', 'Vừa mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ', '2022-05-23 19:11:32'),
(6, 'admin', 'Vừa mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ', '2022-05-23 19:12:06'),
(7, 'admin', 'Vừa mua 1 tài khoản NICK TDS RANDOM 1M - 2M XU với giá 30.000đ', '2022-05-23 19:12:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nap_auto`
--

CREATE TABLE `nap_auto` (
  `id` int(11) NOT NULL,
  `id_nap` text DEFAULT NULL,
  `key_nap` text DEFAULT NULL,
  `sdt_momo` text DEFAULT NULL,
  `token_momo` text DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `nguon_nap` text NOT NULL,
  `ck_nap` text NOT NULL,
  `ctk_momo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `nap_auto`
--

INSERT INTO `nap_auto` (`id`, `id_nap`, `key_nap`, `sdt_momo`, `token_momo`, `noidung`, `nguon_nap`, `ck_nap`, `ctk_momo`) VALUES
(1, '9626386461', '2e739e14d6ef1e0721d9b86f74e9787f', '0363449824', 'không có token', 'nap', 'https://thesieure.com/chargingws/v2', '10', 'Nguyễn Tuấn Anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ID_BUY` varchar(32) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `soluong` int(11) DEFAULT 0,
  `money` int(11) DEFAULT 0,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `live` int(11) DEFAULT 0,
  `type` varchar(64) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `display` varchar(32) COLLATE utf8mb4_vietnamese_ci DEFAULT 'show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `ID_BUY`, `title`, `soluong`, `money`, `username`, `createdate`, `live`, `type`, `display`) VALUES
(1, 'ZYRBHK35VMW6', 'NICK TDS RANDOM 1M - 2M XU', 1, 30000, 'admin', '2022-05-23 19:06:11', 0, 'xuttc', 'show'),
(2, '93SIC8K0HBY5', 'NICK TDS RANDOM 1M - 2M XU', 1, 30000, 'admin', '2022-05-23 19:06:51', 0, 'xuttc', 'show'),
(3, 'V3EQO4LXRNYZ', 'NICK TDS RANDOM 1M - 2M XU', 1, 30000, 'admin', '2022-05-23 19:08:46', 0, 'xuttc', 'show'),
(4, '4OI7ZSXECY06', 'NICK TDS RANDOM 1M - 2M XU', 1, 30000, 'admin', '2022-05-23 19:11:32', 0, 'xuttc', 'show'),
(5, '3DLEQKWI2748', 'NICK TDS RANDOM 1M - 2M XU', 1, 30000, 'admin', '2022-05-23 19:12:06', 0, 'xuttc', 'show'),
(6, 'D43NBXP8ZFE2', 'NICK TDS RANDOM 1M - 2M XU', 1, 30000, 'admin', '2022-05-23 19:12:34', 0, 'xuttc', 'show');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `site_image` text DEFAULT NULL,
  `site_domain` text DEFAULT NULL,
  `site_favicon` text DEFAULT NULL,
  `site_logo` text DEFAULT NULL,
  `site_tenweb` text DEFAULT NULL,
  `site_mota` text DEFAULT NULL,
  `site_tukhoa` text DEFAULT NULL,
  `site_baotri` varchar(32) DEFAULT 'OFF',
  `tuyetroi` varchar(32) DEFAULT 'ON',
  `ck_ctv` text NOT NULL,
  `ck_daily` text NOT NULL,
  `fb_admin` text NOT NULL,
  `zalo_admin` text NOT NULL,
  `thongbao` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `site_image`, `site_domain`, `site_favicon`, `site_logo`, `site_tenweb`, `site_mota`, `site_tukhoa`, `site_baotri`, `tuyetroi`, `ck_ctv`, `ck_daily`, `fb_admin`, `zalo_admin`, `thongbao`) VALUES
(1, 'https://i.imgur.com/BL5DC8e.jpg', 'localhost', 'https://i.imgur.com/ndO0JSq.jpg', 'https://i.imgur.com/XA0H78d.png', 'SHOPANHNGUYEN.COM', 'SHOPANHNGUYEN | SHOP CLONE - VIA CHẤT LƯỢNG UY TÍN', 'shop clone, shop via, shop bm, clone gia re, muabm, mua clone', 'OFF', 'OFF', '5', '10', 'facebook.com/nguyenanh.offcial', '0363449824', '<h1><font color=\"#ff0000\"><span style=\"font-family: \" arial=\"\" black\";\"=\"\">CHUNG</span></font></h1><h4>- Website do&nbsp;<a href=\"https://fb.com/nguyenanh.offcial\" target=\"_blank\"><font color=\"#ff0000\"><span style=\"font-family: \" times=\"\" new=\"\" roman\";\"=\"\">Nguyễn Anh Offcial</span></font></a>&nbsp;Phát hành<br>- Liên Hệ Mua Trực Tiếp Qua<font color=\"#ff00ff\">&nbsp;<a href=\"http://fb.com/nguyenanh.offcial\" target=\"_blank\"><span style=\"font-family: Impact;\">Facebook</span></a></font>&nbsp;hoặc<font color=\"#0000ff\">&nbsp;</font><font color=\"#ff00ff\"><a href=\"https://zalo.me/0363449824\" target=\"_blank\" style=\"\"><span style=\"font-family: Impact;\">Zalo</span></a><span style=\"font-family: Impact;\">&nbsp;</span></font></h4>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `ID_BUY` varchar(32) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `id_fb` varchar(32) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'live',
  `gender` text DEFAULT NULL,
  `friends` text DEFAULT NULL,
  `name` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `birthday` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `code`, `ID_BUY`, `username`, `note`, `id_fb`, `createdate`, `status`, `gender`, `friends`, `name`, `updated_time`, `birthday`) VALUES
(1, 'NICKTDSRAND1', 'ZYRBHK35VMW6', 'admin', 'ádsadasd', 'ádsadasd', '2022-05-23 19:06:11', 'live', NULL, NULL, NULL, NULL, NULL),
(2, 'NICKTDSRAND1', '93SIC8K0HBY5', 'admin', 'ádasdasda', 'ádasdasda', '2022-05-23 19:06:51', 'live', NULL, NULL, NULL, NULL, NULL),
(3, 'NICKTDSRAND1', 'V3EQO4LXRNYZ', 'admin', 'á', 'á', '2022-05-23 19:08:46', 'live', NULL, NULL, NULL, NULL, NULL),
(4, 'NICKTDSRAND1', '4OI7ZSXECY06', 'admin', 'da', 'da', '2022-05-23 19:11:32', 'live', NULL, NULL, NULL, NULL, NULL),
(5, 'NICKTDSRAND1', '3DLEQKWI2748', 'admin', 'sd', 'sd', '2022-05-23 19:12:06', 'live', NULL, NULL, NULL, NULL, NULL),
(6, 'NICKTDSRAND1', 'D43NBXP8ZFE2', 'admin', 'ád', 'ád', '2022-05-23 19:12:34', 'live', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id`, `content`, `createdate`, `title`) VALUES
(7, '<p>Nội dung thông báo #1</p>', '2020-11-19 04:18:23', 'Tiêu đề thông báo #1'),
(8, '<p>Nội dung thông báo #2</p>', '2020-11-19 04:18:32', 'Tiêu đề thông báo #2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT 0,
  `total_nap` int(11) NOT NULL DEFAULT 0,
  `level` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ck` float DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `ip` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `banned` int(11) NOT NULL DEFAULT 0,
  `fullname` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `token` varchar(64) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ref` varchar(64) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `code`, `username`, `email`, `password`, `money`, `total_nap`, `level`, `ck`, `createdate`, `ip`, `banned`, `fullname`, `token`, `ref`) VALUES
(1, 'XS9T5WV8OQQQ', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1708100, 2000000, 'admin', 10, '2020-07-16 14:43:56', '113.185.46.58', 0, 'CMSNT.CO', NULL, NULL),
(18, 'NJKMTRPAGQDY', 'tuthan2k8', 'tuthan1801@gmail.com', '07a449da7bca230b98ed8e61e4cb61e1', 0, 0, NULL, 0, '2022-05-21 21:56:54', '::1', 0, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `chuyenmuc_clone`
--
ALTER TABLE `chuyenmuc_clone`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `log_die`
--
ALTER TABLE `log_die`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `ls_mua`
--
ALTER TABLE `ls_mua`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `nap_auto`
--
ALTER TABLE `nap_auto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `chuyenmuc_clone`
--
ALTER TABLE `chuyenmuc_clone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `log_die`
--
ALTER TABLE `log_die`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ls_mua`
--
ALTER TABLE `ls_mua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nap_auto`
--
ALTER TABLE `nap_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
