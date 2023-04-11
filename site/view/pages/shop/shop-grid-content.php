<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

// include $ROOT_URL . "./admin/models/category.php";
include "$ROOT_URL/site/models/connectdb.php";
include "$ROOT_URL/global.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
?>


<div class="row">
    <?php
// PHẦN XỬ LÝ PHP
// B1: KET NOI CSDL
$conn = connectdb();

$sql = "SELECT * FROM tbl_sanpham"; // Total Product

if (isset($_POST['searchValue'])) {
    $value = $_POST['searchValue'];
    $sql = "SELECT * FROM tbl_sanpham WHERE tensp like '%$value%'";
}

if (isset($_POST['filter']) && $_POST['filter'] == 'priceinsc') {
    $filterValue = $_POST['filter'];
    echo $filterValue;
    $sql = "SELECT * FROM tbl_sanpham order by don_gia ASC";
}

if (isset($_POST['filter']) && $_POST['filter'] == 'pricedesc') {
    $filterValue = $_POST['filter'];
    echo $filterValue;
    $sql = "SELECT * FROM tbl_sanpham order by don_gia DESC";
}

if (isset($_POST['filter']) && $_POST['filter'] == 'newest') {
    $filterValue = $_POST['filter'];
    $sql = "SELECT * FROM tbl_sanpham order by ngay_nhap DESC";
}

if (isset($_POST['filter']) && $_POST['filter'] == 'mostview') {
    $filterValue = $_POST['filter'];
    echo $filterValue;
    $sql = "SELECT * FROM tbl_sanpham order by so_luot_xem DESC";
}

$_limit = 12;

// BƯỚC 2: TÌM TỔNG SỐ RECORDS
$stmt = $conn->prepare($sql);
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
// var_dump($productList);
// $total_page = $pagination['totalpage'];
// $start = $pagination['start'];
// $current_page = $pagination['current_page'];
// $total_records = $pagination['total_records'];
// $product_list = product_select_all();

if (isset($_GET['cateid'])) {
    $cate_id = $_GET['cateid'];
    $product_list = array_filter($product_list, function ($product_item) {
        global $cate_id;
        return $product_item['ma_danhmuc'] == $cate_id;
    });
}
if (isset($_GET['subcateid'])) {
    $subcate_id = $_GET['subcateid'];
    $product_list = array_filter($product_list, function ($product_item) {
        global $subcate_id;

        return $product_item['id_dmphu'] == $subcate_id;
    });

}

// $product_list = product_select_all();
// var_dump($product_list);
foreach ($product_list as $item) {

    #Thumbnail Image
    $image_list = explode(',', $item['images']);
    $cate_name = catename_select_by_id($item['ma_danhmuc'])['ten_danhmuc'];
    $price_format = number_format($item['don_gia']);

    $addcartfunc = "handleAddCart('addtocart', 'addcart')";
    $addwishlistfunc = "handleAddCart('addtowishlist', 'addwishlist')";
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
                                   <form action="./index.php?act=addtocart" method="post">
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
                                               <a onclick="' . $addwishlistfunc . '" class="add-to-wishlist" href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                               <input type="submit" class="add-to-wishlist__submit-input d-none" name="addtowishlistbtn" value="Thêm vào sản phẩm yêu thích">
                                           </li>
                                           <li>
                                               <a class="zoom-detail-product" href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                   title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                           </li>
                                           <li>
                                               <a onclick="' . $addcartfunc . '" class="add-to-cart" href="#" title="Add to cart"><i
                                                       class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                <input type="submit" class="d-none add-to-cart__submit-input" name="addtocartbtn" value="Thêm vào giỏ hàng"/>
                                           </li>
                                       </ul>

                                       <input type="hidden" name="id" value="' . $item['masanpham'] . '"/>
                                       <input type="hidden" name="tensp" value="' . $item['tensp'] . '"/>
                                       <input type="hidden" name="hinh_anh" value="' . $thumbnail . '"/>
                                       <input type="hidden" name="sl" value="1">
                                       <input type="hidden" name="danhmuc" value="' . $cate_name . '"/>
                                       <input type="hidden" name="iddm" value="' . $item['ma_danhmuc'] . '"/>
                                       <input type="hidden" name="don_gia" value="' . $item['don_gia'] . '"/>
                                       <input type="hidden" name="mo_ta" value="' . $item['mo_ta'] . '">
                                       <input type="hidden" name="giam_gia" value="' . $item['giam_gia'] . '">


                                       </div>
                                   </div>
                                   </form>
                               </div>
                                ';
}
?>

</div>