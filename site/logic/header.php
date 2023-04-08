<?php
if (!in_array('ob_gzhandler', ob_list_handlers())) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// var_dump($_SERVER);
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    echo "called directly";
    // include "../DAO/category.php";
    include "../../pdo-library.php";
} else {
    echo "included/required";
}

// var_dump($_SESSION);

function connectdb()
{

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=duan1_database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();

    }

    return $conn;

}

function cate_select_all()
{
    $sql = "SELECT * FROM tbl_danhmuc";
    return pdo_query($sql);

}

function cate_select_join_all()
{
    $sql = "SELECT * from tbl_danhmuc dm inner join tbl_danhmucphu dmp on dm.ma_danhmuc = dmp.iddm";
    return pdo_query($sql);
}

function subcate_select_all_by_id($iddm)
{
    $sql = "SELECT * from tbl_danhmucphu where iddm = $iddm";
    return pdo_query($sql);
}

function cate_select_by_id($ma_loai)
{
    $sql = "SELECT * FROM tbl_danhmuc WHERE ma_danhmuc=?";
    return pdo_query_one($sql, $ma_loai);

}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Goden Bee Group || Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="assets/lib/css/nivo-slider.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="assets/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="assets/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="assets/css/style-customizer.css">
    <link href="#" data-style="styles" rel="stylesheet">

    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div id="main" class="wrapper">

        <!-- START HEADER AREA -->
        <header id="header" class="header-area header-wrapper">
            <!-- header-top-bar -->
            <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 d-none d-md-block">
                            <!-- <div class="call-us">
                                <a href="phoneto:0937988510" class="mb-0 roboto">Liên hệ: 0937988510</a>
                            </div> -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top-link clearfix">
                                <ul class="link f-right top-header-menu">
                                    <?php
if (isset($_SESSION['iduser'])) {
    echo '
                                            <li class="top-header-menu__item">
                                                <a href="index.php?act=settingaccount">
                                                    <i class="zmdi zmdi-account"></i>
                                                    ' . $_SESSION['ho_ten'] . '
                                                </a>
                                                <ul class="top-header-menu__dropdown">
                                                    <li><a href="index.php?act=settingaccount">Quản lý tài khoản</a> </li>
                                                    <li><a href="./index.php?act=logout">Đăng xuất</a></li>
                                                </ul>
                                            </li>
                                            ';
}
?>

                                    <li id="topWishlist" class="top-header-menu__item">
                                        <a href="index.php?act=wishlist">
                                            <i class="zmdi zmdi-favorite"></i>
                                            Yêu thích (<?php echo count($_SESSION['wishlist']) ?> sp)
                                        </a>
                                    </li>
                                    <?php
if (!isset($_SESSION['iduser'])) {
    echo '
                                            <li class="top-header-menu__item">
                                                <a href="./auth/login.php">
                                                    <i class="zmdi zmdi-lock"></i>
                                                    Đăng nhập
                                                </a>
                                            </li>
                                            ';
}
?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-middle-area -->
            <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-lg-2 col-md-4">
                                <div class="logo">
                                    <a href="index.php">
                                        <!-- <img src="assets/img/logo/logo.png" alt="main logo"> -->
                                        <?php
// include "./view/components/logo.php";
?>
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-lg-8 d-none d-lg-block">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li><a href="index.php">Trang chủ</a>

                                        </li>

                                        <li class="mega-parent"><a href="index.php?act=shop">Cửa hàng</a>
                                            <div class="mega-menu-area clearfix">
                                                <div class="mega-menu-link f-left">
                                                    <?php
$cate_list = cate_select_all();
// var_dump($cate_list);
foreach ($cate_list as $cate_item) {
    # code...
    ?>
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title fw-bold">
                                                            <?php echo $cate_item['ten_danhmuc'] ?>
                                                        </li>

                                                        <li>
                                                            <a href="#">All <?php echo $cate_item['ten_danhmuc'] ?></a>
                                                        </li>

                                                        <?php

    $subcate_list = subcate_select_all_by_id($cate_item['ma_danhmuc']);

    // var_dump($subcate_list);

    foreach ($subcate_list as $subcate_item) {

        ?>

                                                        <li>
                                                            <a
                                                                href="./index.php?act=shop&<?php echo $subcate_item['id'] ?>"><?php echo $subcate_item['ten_danhmucphu'] ?></a>
                                                        </li>
                                                        <?php
# code...
    }
    ?>
                                                    </ul>
                                                    <?php
}
?>

                                                </div>
                                                <!-- <div class="mega-menu-photo f-left">
                                                    <a href="#">
                                                        <img src="assets/img/mega-menu/1.jpg" alt="mega menu image">
                                                    </a>
                                                </div> -->
                                            </div>
                                        </li>


                                        <li><a href="index.php?act=blog">Bài viết</a>
                                            <ul class="dropdwn">
                                                <li>
                                                    <a href="index.php?act=blog">Thủ thuật</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?act=blog">Tin tức điện thoại</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?act=blog">Hướng dẫn</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="index.php?act=about-us">Về chúng tôi</a>
                                        </li>
                                        <li>
                                            <a href="index.php?act=contact">Liên hệ</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- -search & total-cart -->
                            <div class="col-lg-2 col-md-8">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search f-left">
                                        <div class="header-search-inner">
                                            <button class="search-toggle">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                            <form action="#">
                                                <div class="top-search-box">
                                                    <input type="text" placeholder="Search here your product...">
                                                    <button type="submit">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- total-cart -->
                                    <div id="topHeaderCart" class="total-cart f-left">
                                        <div class="total-cart-in">


                                            <div class="cart-toggler">
                                                <a href="./index.php?act=viewcart">
                                                    <span
                                                        class="cart-quantity"><?php echo count($_SESSION['giohang']) ?></span><br>
                                                    <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <ul id="topCartInnerWrapper" class="top-cart-inner-wrapper">
                                                <li>
                                                    <div class="top-cart-inner your-cart">
                                                        <h5 class="text-capitalize">Giỏ hàng của bạn</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="total-cart-pro">

                                                        <?php
$cart_list = $_SESSION['giohang'];
// var_dump($cart_list);
$total_cart = 0;
$i = 0;
foreach ($cart_list as $cart_item) {
    # code...
    $total_cart += $cart_item['sl'] * $cart_item['don_gia'];
    $price_item = number_format($cart_item['don_gia']);
    echo '
                                                            <!-- single-cart -->
                                                                <div class="single-cart clearfix">
                                                                    <div class="cart-img f-left">
                                                                        <a href="./index.php?act=detailproduct&id=' . $cart_item['id'] . '" class="" style="max-width: 200px;">
                                                                            <img style="width: 80px; height: 80px;" src="../uploads/' . $cart_item['hinh_anh'] . '"
                                                                                alt="Cart Product" />
                                                                        </a>
                                                                        <div class="del-icon">
                                                                            <a href="./index.php?act=deletecart&idcart=">
                                                                                <i class="zmdi zmdi-close"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cart-info f-left">
                                                                        <h6 class="text-capitalize text-truncate" style="max-width: 200px;">
                                                                            <a href="./index.php?act=detailproduct&id=' . $cart_item['id'] . '">' . $cart_item['tensp'] . '</a>
                                                                        </h6>
                                                                        <p>
                                                                            <span>Sl <strong>:</strong></span>' . $cart_item['sl'] . '
                                                                        </p>
                                                                        <p>
                                                                            <span>Giá <strong>:</strong></span> ' . $price_item . ' VND
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            ';
    $i++;
}
?>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner subtotal">
                                                        <h4 class="text-uppercase g-font-2">
                                                            Tổng tiền =
                                                            <span><?php echo number_format($total_cart); ?>VND</span>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner view-cart">
                                                        <h4 class="text-uppercase">
                                                            <a href="./index.php?act=viewcart">Xem giỏ hàng</a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner check-out">
                                                        <h4 class="text-uppercase">
                                                            <a href="./index.php?act=checkout">Thanh toán</a>
                                                        </h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER AREA -->

        <!-- START MOBILE MENU AREA -->
        <div class="mobile-menu-area d-block d-lg-none section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="index.php">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=shop">Cửa hàng</a>
                                    </li>
                                    <li><a href="index.php?act=blog">Bài viết</a>
                                        <ul>
                                            <li>
                                                <a href="index.php?act=blog">Thủ thuật</a>
                                            </li>
                                            <li>
                                                <a href="index.php?act=blog">Tin tức điện thoại</a>
                                            </li>
                                            <li>
                                                <a href="index.php?act=blog">Hướng dẫn</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="index.php?act=about-us">Về chúng tôi</a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=contact">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MOBILE MENU AREA -->