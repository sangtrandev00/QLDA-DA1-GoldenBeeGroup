<!-- START SLIDER AREA -->
<div class="slider-area plr-185 mb-80 section">
    <div class="container-fluid">
        <div class="slider-content">
            <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                <!-- layer-1 Start -->
                <div class="col-lg-12">
                    <div class="layer-1">
                        <div class="slider-img">
                            <img src="../uploads/promotion-dummpy-image.png" alt="promotion-dummpy-image.png">
                        </div>
                        <div class="slider-info gray-bg">
                            <div class="slider-info-inner">
                                <h1 class="slider-title-1 text-uppercase text-black-1">Smartphone giá tốt tại cửa hàng
                                </h1>
                                <div class="slider-brief text-black-2">
                                    <p>The Phoner Store với nhiều dòng điện thoại khác nhau, từ các thương hiệu nổi
                                        tiếng, với các phân khúc giá phù hợp cho nhiều đổi tượng khách hàng, ghé thăm
                                        cửa hàng của chúng tôi để nhận nhiều ưu đãi hấp dẫn! </p>
                                </div>
                                <a href="./index.php?act=shop" class="button extra-small button-black">
                                    <span class="text-uppercase">Shop ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- layer-1 end -->
                <!-- layer-2 Start -->
                <div class="col-lg-12">
                    <div class="layer-1">
                        <div class="slider-img">
                            <img src="../uploads/banner-slider-02.jpg" alt="banner-slider-02.jpg">
                        </div>
                        <div class="slider-info gray-bg">
                            <div class="slider-info-inner">
                                <h1 class="slider-title-1 text-uppercase text-black-1">WaterProof smartphone
                                </h1>
                                <div class="slider-brief text-black-2">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the
                                        majority
                                        have suffered alteration in some form, by injected humour, or randomised
                                        words
                                        which don't look even slightly believable. If you are going to use a
                                        passage of
                                        Lorem Ipsum,</p>
                                </div>
                                <a href="#" class="button extra-small button-black">
                                    <span class="text-uppercase">Buy now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- layer-2 end -->
                <!-- layer-3 Start -->
                <div class="col-lg-12">
                    <div class="layer-1">
                        <div class="slider-img">
                            <img src="../uploads/banner-slider-02.jpg" alt="">
                        </div>
                        <div class="slider-info gray-bg">
                            <div class="slider-info-inner">
                                <h1 class="slider-title-1 text-uppercase text-black-1">WaterProof smartphone
                                </h1>
                                <div class="slider-brief text-black-2">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the
                                        majority
                                        have suffered alteration in some form, by injected humour, or randomised
                                        words
                                        which don't look even slightly believable. If you are going to use a
                                        passage of
                                        Lorem Ipsum,</p>
                                </div>
                                <a href="#" class="button extra-small button-black">
                                    <span class="text-uppercase">Buy now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- layer-3 end -->
                <!-- layer-4 Start -->
                <div class="col-lg-12">
                    <div class="layer-1">
                        <div class="slider-img">
                            <img src="../uploads/banner-slider-02.jpg" alt="">
                        </div>
                        <div class="slider-info gray-bg">
                            <div class="slider-info-inner">
                                <h1 class="slider-title-1 text-uppercase text-black-1">WaterProof smartphone
                                </h1>
                                <div class="slider-brief text-black-2">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the
                                        majority
                                        have suffered alteration in some form, by injected humour, or randomised
                                        words
                                        which don't look even slightly believable. If you are going to use a
                                        passage of
                                        Lorem Ipsum,</p>
                                </div>
                                <a href="#" class="button extra-small button-black">
                                    <span class="text-uppercase">Buy now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- layer-4 end -->
            </div>
        </div>
    </div>
</div>
<!-- END SLIDER AREA -->


<!-- Start page content -->
<section id="page-content" class="page-wrapper section">

    <!-- BY BRAND SECTION START-->
    <div class="by-brand-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-start mb-40">
                        <h2 class="uppercase">Các thương hiệu</h2>
                        <h6>Các thương hiệu nổi bật tại cửa hàng</h6>
                    </div>
                    <div class="by-brand-product">
                        <div class="active-by-brand slick-arrow-2">
                            <!-- Loop Brand Item here -->
                            <?php
$cate_list = cate_select_all();
// var_dump($cate_list);

foreach ($cate_list as $cate_item) {
    # code...
    echo '
        <!-- single-brand-product start -->
            <div class="brand-item shadow border border-top-1">
                <div class="single-brand-product">
                    <a href="index.php?act=shop&cateid=' . $cate_item['ma_danhmuc'] . '"><img src="../uploads/' . $cate_item['hinh_anh'] . '"
                            alt=""></a>
                    <h3 class="brand-title text-grey fw-bold fs-1">
                        <a href="#">' . $cate_item['ten_danhmuc'] . '</a>
                    </h3>
                </div>
            </div>
        <!-- single-brand-product end -->
        ';
}

?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BY BRAND SECTION END -->

    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-start mb-40">
                        <h2 class="uppercase">Sản phẩm nổi bật</h2>
                        <h6>Có rất nhiều biến thể của các thương hiệu có sẵn</h6>
                    </div>
                    <div class="featured-product">
                        <div class="active-featured-product slick-arrow-2">
                            <!-- Load Featured products from database -->
                            <?php
$featured_products = product_select_all();
// var_dump($featured_products);
foreach ($featured_products as $item) {

    #Thumbnail Image
    $image_list = explode(',', $item['images']);

    $price_format = number_format($item['don_gia']);

    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }

    # code...
    echo '
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">
                                            <img src="' . $thumbnail . '" alt="' . $thumbnail . '" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">' . $item['tensp'] . '</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price"> ' . $price_format . ' VND</h3>
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                    title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="./index.php?act=addtocart&id' . $item['masanpham'] . '" title="Add to cart"><i
                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                ';
}
?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED PRODUCT SECTION END -->

    <!-- UP COMMING PRODUCT SECTION START -->
    <div class="up-comming-product-section mb-80">
        <div class="container">
            <div class="row">
                <!-- up-comming-pro -->
                <div class="col-lg-8">
                    <div class="up-comming-pro gray-bg clearfix">
                        <div class="up-comming-pro-img f-left">
                            <a href="#">
                                <img src="../uploads/I phone Promotion.png" alt="I phone Promotion.png">
                            </a>
                        </div>
                        <div class="up-comming-pro-info f-left">
                            <h3><a href="#">I phone 14 Pro Max</a></h3>
                            <p>Sản phẩm khuyến mãi trong tháng 3, giá mềm ưu đãi cho các khách hàng mới nhất. Nhấn vào
                                hình ảnh và đặt mua ngay! </p>
                            <div class="up-comming-time">
                                <div data-countdown="2022/02/02"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-block d-md-none d-lg-block">
                    <div class="banner-item banner-1">
                        <div class="ribbon-price">
                            <span> 896.00 VND</span>
                        </div>
                        <div class="banner-img">
                            <a href="#"><img src="../uploads/I phone Promotion 2.png" alt="I phone Promotion 2.png"></a>
                        </div>
                        <div class="banner-info">
                            <h3><a href="#">I phone 14 Pro Max</a></h3>
                            <ul class="banner-featured-list">
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>amet, consectetur</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>labore et dolore.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- UP COMMING PRODUCT SECTION END -->

    <!-- PRODUCT TAB SECTION START -->
    <div class="product-tab-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title text-start mb-40">
                        <h2 class="uppercase">Các sản phẩm tại cửa hàng</h2>
                        <h6>Rất nhiều điện thoại khác nhau đến từ các thương hiệu nổi tiếng (Oppo, Iphone, Samsung,
                            Xiaomi )</h6>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-tab pro-tab-menu text-end">
                        <!-- Nav tabs -->
                        <ul class="nav">
                            <li><a class="active" href="#popular-product" data-bs-toggle="tab">Các sản phẩm phổ biến
                                </a></li>
                            <li><a href="#new-arrival" data-bs-toggle="tab">Sản phẩm mới về</a></li>
                            <li><a href="#best-seller" data-bs-toggle="tab">Bán chạy</a></li>
                            <li><a href="#special-offer" data-bs-toggle="tab">Ưu đãi đặt biệt</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- popular-product start -->
                        <div id="popular-product" class="tab-pane active show">
                            <div class="row">
                                <?php
$product_list = product_select_12();
// var_dump($product_list);
foreach ($product_list as $item) {

    #Thumbnail Image
    $image_list = explode(',', $item['images']);

    $price_format = number_format($item['don_gia']);

    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }

    # code...
    echo '
                                        <div class="col-lg-3 col-md-4">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">
                                                        <img src="' . $thumbnail . '" alt="' . $thumbnail . '" />
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">' . $item['tensp'] . '</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price"> ' . $price_format . ' VND</h3>
                                                    <ul class="action-button">
                                                        <li>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                                title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="./index.php?act=addtocart&id' . $item['masanpham'] . '" title="Add to cart"><i
                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        ';
}
?>
                                <!-- shop-pagination start -->
                                <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">05</a></li>
                                    <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <!-- popular-product end -->
                        <!-- new-arrival start -->
                        <div id="new-arrival" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/1.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/3.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/5.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/6.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/12.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/8.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/11.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/10.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- shop-pagination start -->
                                <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">05</a></li>
                                    <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <!-- new-arrival end -->
                        <!-- best-seller start -->
                        <div id="best-seller" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/12.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/11.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/10.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/8.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/1.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/3.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/4.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->

                                <!-- shop-pagination start -->
                                <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">05</a></li>
                                    <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <!-- best-seller end -->
                        <!-- special-offer start -->
                        <div id="special-offer" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/6.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/12.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/1.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/8.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/9.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/7.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/5.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="col-lg-3 col-md-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="index.php?act=detailproduct">
                                                <img src="assets/img/product/1.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="index.php?act=detailproduct">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->

                                <!-- shop-pagination start -->
                                <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">05</a></li>
                                    <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <!-- special-offer end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB SECTION END -->

    <!-- BLOG SECTION START -->
    <div class="blog-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-start mb-40">
                        <h2 class="uppercase">Các bài viết mới nhất</h2>
                        <h6>Các bài viết về các sản phẩm mới nhất, thủ thuật, hướng dẫn sử dụng điện thoại hay</h6>
                    </div>
                    <div class="blog">
                        <div class="active-blog slick-arrow-2">
                            <div class="blog-item">
                                <img src="../uploads/lastest-blog-1.jpg" alt="lastest-blog-1.jpg">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                    <p>There are many variations of passages of psum available, but the majority
                                        have suffered alterat on in some form, by injected humour, randomis
                                        words which don't look even slightly.</p>
                                    <div class="read-more">
                                        <a href="single-blog.html">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-item">
                                <img src="../uploads/latest-blog-2.jpg" alt="latest-blog-2.jpg">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                    <p>There are many variations of passages of psum available, but the majority
                                        have suffered alterat on in some form, by injected humour, randomis
                                        words which don't look even slightly.</p>
                                    <div class="read-more">
                                        <a href="single-blog.html">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-item">
                                <img src="../uploads/latest-blog-3.jpg" alt="latest-blog-3.jpg">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                    <p>There are many variations of passages of psum available, but the majority
                                        have suffered alterat on in some form, by injected humour, randomis
                                        words which don't look even slightly.</p>
                                    <div class="read-more">
                                        <a href="single-blog.html">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-item">
                                <img src="assets/img/blog/1.jpg" alt="">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                    <p>There are many variations of passages of psum available, but the majority
                                        have suffered alterat on in some form, by injected humour, randomis
                                        words which don't look even slightly.</p>
                                    <div class="read-more">
                                        <a href="single-blog.html">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
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
    <!-- BLOG SECTION END -->
</section>
<!-- End page content -->



<!-- START QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product clearfix">
                        <div class="product-images">
                            <div class="main-image images">
                                <img alt="" src="assets/img/product/quickview.jpg">
                            </div>
                        </div><!-- .product-images -->

                        <div class="product-info">
                            <h1>Aenean eu tristique</h1>
                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="new-price">£160.00</span>
                                    <span class="old-price">£190.00</span>
                                </div>
                            </div>
                            <a href="single-product-left-sidebar.html" class="see-all">See all features</a>
                            <div class="quick-add-to-cart">
                                <form method="post" class="cart">
                                    <div class="numbers-row">
                                        <input type="number" id="french-hens" value="3" min="1">
                                    </div>
                                    <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                </form>
                            </div>
                            <div class="quick-desc">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec
                                est tristique auctor. Donec non est at libero.
                            </div>
                            <div class="social-sharing">
                                <div class="widget widget_socialsharing_widget">
                                    <h3 class="widget-title-modal">Share this product</h3>
                                    <ul class="social-icons clearfix">
                                        <li>
                                            <a class="facebook" href="#" target="_blank" title="Facebook">
                                                <i class="zmdi zmdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="google-plus" href="#" target="_blank" title="Google +">
                                                <i class="zmdi zmdi-google-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="twitter" href="#" target="_blank" title="Twitter">
                                                <i class="zmdi zmdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="pinterest" href="#" target="_blank" title="Pinterest">
                                                <i class="zmdi zmdi-pinterest"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="rss" href="#" target="_blank" title="RSS">
                                                <i class="zmdi zmdi-rss"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .product-info -->
                    </div><!-- .modal-product -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
</div>
<!-- END QUICKVIEW PRODUCT -->


</div>
<!-- Body main wrapper end -->