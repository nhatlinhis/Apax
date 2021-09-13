<?php
define('ROOT', dirname(__FILE__)); //Thu muc chứa file index
include "dangnhap/database.php";
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION["thongtindangnhap"])) {
  header("location:dangnhap/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        QLKS
    </title>
    <link rel="shortcut icon" href="./images/logo-mb.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="./images/logo-lg.png" alt="Comapny logo">
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <img src="./images/user-image-2.png" alt="User picture" class="profile-image">
                <div class="sidebar-user-name">
                    Admin
                </div>
            </div>
            <button class="btn btn-outline">
                <a href="dangnhap/logout.php"><i class='bx bx-log-out bx-flip-horizontal'></i></a>
            </button>
        </div>
        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li>
                <a href="#" class="active">
                    <i class='bx bx-home'></i>
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-door-open'></i>
                    <span>Quản lý</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./danhmucphong">
                            Danh Mục Phòng
                        </a>
                    </li>
                    <li>
                        <a href="./phieuthuephong">
                            Phiếu Thuê Phòng
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-search'></i>
                    <span>Tra cứu</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./tracuu/Tracuu_phong.php">
                            Phòng
                        </a>
                    </li>
                    <li>
                        <a href="./tracuu/Tracuu_phieuthue.php">
                            Phiếu Thuê Phòng
                        </a>
                    </li>
                    <li>
                        <a href="./tracuu/Tracuu_loaiphong.php">
                            Loại Phòng
                        </a>
                    </li>
                    <li>
                        <a href="./tracuu/Tracuu_khachhang.php">
                            Khách Hàng
                        </a>
                    </li>
                    <li>
                        <a href="./tracuu/Tracuu_hoadon.php">
                            Hóa đơn
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./hoadonthanhtoan/">
                    <i class='bx bx-receipt'></i>
                    <span>Hóa đơn thanh toán</span>
                </a>
            </li>
            <li>
                <a href="./baocaodoanhthu/">
                    <i class='bx bx-bar-chart-alt-2' ></i>
                    <span>Báo Cáo Doanh Thu</span>
                </a>
            </li>
            <li>
                <a href="./chinhsua/">
                    <i class='bx bx-cog'></i>
                    <span>Chỉnh sửa</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-color-fill'></i>
                    <span>Giao diện</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#" class="darkmode-toggle" id="darkmode-toggle">
                            Tối
                            <span class="darkmode-switch"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->

    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
        </div>
        
            <img src="./images/home.jpg" alt="background" class="background-home">
    </div>
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- APP JS -->
    <script src="./js/app.js"></script>

</body>

</html>

