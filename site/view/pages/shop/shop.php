<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80 section">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Cửa hàng</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="index.html">Home </a></li>
                            <li>Cửa hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<div id="page-content" class="page-wrapper section">

    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="shop-content">
                        <!-- shop-option start -->
                        <div class="shop-option box-shadow mb-30 clearfix">
                            <!-- Nav tabs -->
                            <ul class="nav shop-tab f-left align-item-center" role="tablist">
                                <li>
                                    <a class="active" href="#grid-view" data-bs-toggle="tab"><i
                                            class="zmdi zmdi-view-module"></i></a>
                                </li>
                                <li>
                                    <a href="#list-view" data-bs-toggle="tab"><i
                                            class="zmdi zmdi-view-list-alt"></i></a>
                                </li>
                                <!-- <li>Tìm kiếm: Tên sản phẩm</li> -->
                            </ul>
                            <!-- short-by -->
                            <div class="short-by f-left text-center">
                                <span>Lọc bởi :</span>
                                <select onchange="filterProducts(this)">
                                    <option value="">Lọc sản phẩm ở đây</option>
                                    <option <?php if (isset($_GET['filter']) && $_GET['filter'] == 'newest') {
    echo 'selected';
}
?> value="newest">Sản
                                        phẩm mới nhất
                                    </option>
                                    <option <?php if (isset($_GET['filter']) && $_GET['filter'] == 'pricedesc') {
    echo 'selected';
}
?> value="pricedesc">Giá từ cao đến thấp</option>
                                    <option <?php if (isset($_GET['filter']) && $_GET['filter'] == 'priceinsc') {
    echo 'selected';
}
?> value="priceinsc">Giá từ thấp đến cao</option>
                                    <option <?php if (isset($_GET['filter']) && $_GET['filter'] == 'mostview') {
    echo 'selected';
}
?> value="mostview">
                                        Sản phẩm xem nhiều nhất</option>
                                </select>
                            </div>
                            <!-- showing -->
                            <div class="showing f-right text-end">Kết quả tìm được :
                                <span id="show-search-result">
                                </span>sản
                                phẩm
                            </div>
                        </div>
                        <!-- shop-option end -->
                        <!-- Tab Content start -->
                        <div class="tab-content">
                            <!-- grid-view -->
                            <div id="grid-view" class="tab-pane active show shop-grid-content" role="tabpanel">
                                <div class="row">
                                    <?php
// PHẦN XỬ LÝ PHP
// B1: KET NOI CSDL
$conn = connectdb();

$sql = "SELECT * FROM tbl_sanpham"; // Total Product

if (isset($_GET['subcateid'])) {
    $subcate_id = $_GET['subcateid'];
    $sql = "SELECT * FROM tbl_sanpham where id_dmphu = '$subcate_id'";
    // echo "$sql";
}

if (isset($_GET['cateid'])) {
    $cate_id = $_GET['cateid'];
    $sql = "SELECT * FROM tbl_sanpham where ma_danhmuc = '$cate_id'";
}

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM tbl_sanpham where tensp like '%$query%'";
    // echo $sql;
}

// Filter products
if (isset($_GET['filter']) && $_GET['filter'] == 'pricedesc') {
    $sql .= " order by don_gia desc";

    // echo $sql;

} else if (isset($_GET['filter']) && $_GET['filter'] == 'priceinsc') {
    $sql .= " order by don_gia asc";

    // echo $sql;

} else if (isset($_GET['filter']) && $_GET['filter'] == 'newest') {
    $sql .= " order by ngay_nhap desc";
    // echo $sql;

} else if (isset($_GET['filter']) && $_GET['filter'] == 'mostview') {
    $sql .= " order by so_luot_xem desc";
    // echo $sql;

}

if (isset($_GET['minprice']) && $_GET['minprice'] != 0 && isset($_GET['maxprice']) && $_GET['maxprice'] != 0) {
    $min_price = $_GET['minprice'];
    $max_price = $_GET['maxprice'];

    $sql = "SELECT * FROM tbl_sanpham where don_gia between '$min_price' and '$max_price'";
    // echo $sql;
}

$_limit = 12;

// BƯỚC 2: TÌM TỔNG SỐ RECORDS

$stmt = $conn->prepare($sql);

// echo $sql;

$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$finalresult = $stmt->fetchAll();
$total_records = count($finalresult);

// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
if (isset($_POST['currentPage'])) {
    $current_page = $_POST['currentPage'];

    echo 'current_page' . $current_page;
    // exit;
}

$limit = $_limit;

// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

if ($start < 0) {
    $start = 0;
}

// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH SẢN PHẨM
// Có limit và start rồi thì truy vấn CSDL lấy danh sách SẢN PHẨM

$stmt = $conn->prepare("$sql LIMIT $start, $limit");
$stmt->execute();
$datalist = $stmt->fetchAll();

$product_list = $datalist;
// echo count($product_list);
// $product_list = product_select_all();
// var_dump($product_list);
foreach ($product_list as $item) {

    #Thumbnail Image
    $image_list = explode(',', $item['images']);
    $cate_name = catename_select_by_id($item['ma_danhmuc'])['ten_danhmuc'];
    $price_format = number_format($item['don_gia']);

    $addcartfunc = "handleAddCart('addtocart', 'addcart')";
    $addwishlistfunc = "handleAddCart('addtowishlist', 'addwishlist')";
    $avg_stars = avg_star_reviews_of_product($item['masanpham']);
    $result_stars = renderStarRatings(round($avg_stars, 0));
    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }

    # code...
    echo '
                               <div class="col-lg-4 col-md-6">
                                   ' . cardItem($item, $thumbnail, $addcartfunc, $addwishlistfunc, $cate_name, $price_format, $result_stars) . '
                               </div>
                                ';
}
?>

                                </div>
                            </div>
                            <!-- list-view -->
                            <div id="list-view" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <?php
foreach ($product_list as $item) {

    #Thumbnail Image
    $image_list = explode(',', $item['images']);
    $cate_name = catename_select_by_id($item['ma_danhmuc'])['ten_danhmuc'];
    $price_format = number_format($item['don_gia']);
    $addcartfunc = "handleAddCart('addtocart', 'addcart')";
    $addwishlistfunc = "handleAddCart('addtowishlist', 'addwishlist')";

    $avg_stars = avg_star_reviews_of_product($item['masanpham']);
    $result_stars = renderStarRatings(round($avg_stars, 0));
    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }

    # code...
    echo '
                               <div class="col-lg-12">
                                    <div class="shop-list product-item position-relative">
                                    <span class="ms-2 badge bg-secondary">' . $item['giam_gia'] . '%</span>
                                    <span class="product-item__views position-absolute translate-middle badge rounded-pill bg-danger">
                                    ' . $item['so_luot_xem'] . ' views
                                    <span class="visually-hidden">unread messages</span>
                                    </span>
                                    <div class="product-img">
                                        <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">
                                            <img src="' . $thumbnail . '" alt="' . $thumbnail . '" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a  href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">' . $item['tensp'] . '</a>
                                        </h6>
                                        <div class="pro-rating">
                                            ' . $result_stars . '
                                        </div>
                                        <h6 class="brand-name mb-30">Brand: ' . $cate_name . '</h6>
                                        <h3 class="pro-price"> ' . $price_format . ' VND</h3>
                                        <p>
                                        ' . $item['mo_ta'] . '
                                        </p>
                                        <ul class="action-button">
                                            <li>
                                                <a onclick="' . $addwishlistfunc . '"  href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a class="zoom-detail-product"  href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                    title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a onclick="' . $addcartfunc . '" href="./index.php?act=addtocart&id' . $item['masanpham'] . '" title="Add to cart"><i
                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               </div>
                                ';
}
?>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Content end -->
                        <!-- shop-pagination start -->
                        <ul id="shop-pagination" class="shop-pagination box-shadow text-center ptblr-10-30">

                            <?php
// HIỂN THỊ PHÂN TRANG
// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $total_page > 1) {
    echo '<a class="page-item btn btn-secondary" href="index.php?act=shop&page=' . ($current_page - 1) . '">Trước</a> | ';
}

// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++) {
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page) {
        echo '<span class="page-item btn btn-primary main-bg-color main-border-color">' . $i . '</span> | ';
    } else {
        echo '<a class="page-item btn btn-light" href="index.php?act=shop&page=' . $i . '">' . $i . '</a> | ';
    }
}

// nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
if ($current_page < $total_page && $total_page > 1) {
    echo '<a class="page-item btn btn-secondary" href="index.php?act=shop&page=' . ($current_page + 1) . '">Sau</a> | ';
}

?>
                        </ul>
                        <!-- shop-pagination end -->
                    </div>
                </div>
                <div class="col-lg-3 order-lg-1 order-2">
                    <!-- widget-search -->
                    <aside class="widget-search mb-30">
                        <form onsubmit="searchProducts(this)" id="searchForm" action="#">
                            <input name="searchvalue" type="text" placeholder="Tìm kiếm ở đây...">
                            <button type="submit"><i class="zmdi zmdi-search"></i></button>
                        </form>
                    </aside>
                    <!-- widget-categories -->
                    <aside class="widget widget-categories box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Danh mục</h6>
                        <div id="cat-treeview" class="product-cat">
                            <ul>
                                <!-- Load cate here!!! -->
                                <?php
$cate_list = cate_select_all();
foreach ($cate_list as $cate_item) {

    ?>
                                <li class="open"><a
                                        href="./index.php?act=shop&cateid=<?php echo $cate_item['ma_danhmuc'] ?>"><?php echo $cate_item['ten_danhmuc'] ?></a>
                                    <?php
$subcate_list = subcate_select_all_by_id($cate_item['ma_danhmuc']);
    foreach ($subcate_list as $subcate_item) {
        # code...]
        // echo $subcate_item['id'];
        ?>
                                    <ul>


                                        <li><a
                                                href="./index.php?act=shop&subcateid=<?php echo $subcate_item['id']; ?>"><?php echo $subcate_item['ten_danhmucphu'] ?></a>
                                        </li>
                                    </ul>
                                    <?php

    }
    ?>
                                </li>
                                <?php
}
?>

                            </ul>
                        </div>
                    </aside>
                    <!-- shop-filter -->
                    <div class="widget shop-filter box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Lọc theo giá</h6>
                        <div class="price_filter">
                            <form id="form-filter-price" onsubmit="filterByPrice(this)" action="" method="post">
                                <div class="price_slider_amount">
                                    <input type="submit" class="w-100" value="Thang giá:" />
                                    <br>
                                    <input onchange="filterByPrice()" type="text" class="w-100" id="amount" name="price"
                                        placeholder="Add Your Price" />

                                </div>
                                <div id="slider-range"></div>
                                <input class="mt-3 btn btn-light" type="submit" value="Tìm">
                            </form>
                        </div>

                        <!-- widget-product -->
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

        <input type="hidden" name="total_result" value="<?php echo $total_records ?>">
    </div>
    <!-- End page content -->

    <script>
    document.addEventListener("DOMContentLoaded", function(e) {
        const searchResult = $("input[name='total_result']").val();
        $("#show-search-result").text(searchResult);

        // console.log('Hello search result');
    })
    </script>