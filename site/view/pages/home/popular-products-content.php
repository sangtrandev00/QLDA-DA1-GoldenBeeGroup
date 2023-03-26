<div class="row">
    <?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include "$ROOT_URL/global.php";
include "$ROOT_URL/site/models/connectdb.php";
// PHẦN XỬ LÝ PHP
// B1: KET NOI CSDL
$conn = connectdb();

$sql = "SELECT * FROM tbl_sanpham order by so_luot_xem desc"; // Total Product
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

$pagination = createDataWithPagination($conn, $sql, $_limit);
$product_list = $pagination['datalist'];
// var_dump($productList);
$total_page = $pagination['totalpage'];
$start = $pagination['start'];
$current_page = $pagination['current_page'];
$total_records = $pagination['total_records'];

// $product_list = product_select_12();
// var_dump($product_list);
foreach ($product_list as $item) {

    #Thumbnail Image
    $image_list = explode(',', $item['images']);

    $price_format = number_format($item['don_gia'] * (1 - $item['giam_gia'] / 100));
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
                                        <div class="col-lg-3 col-md-4">
                                        <form action="./index.php?act=addtocart" method="post">
                                                <div class="product-item position-relative">
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
                                                            <button onclick="' . $addcartfunc . '" class="add-to-cart" data-bs-toggle="modal" data-bs-target="#cartModal" type="submit"  type="submit"  title="Add to cart"><i
                                                                    class="zmdi zmdi-shopping-cart-plus"></i></button>
                                                            <input type="submit" class="d-none add-to-cart__submit-input" name="addtocartbtn" value="Thêm vào giỏ hàng" >
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
    <!-- shop-pagination start -->
    <ul class="shop-pagination box-shadow text-center ptblr-10-30">

        <?php
// HIỂN THỊ PHÂN TRANG
// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $total_page > 1) {
    echo '<a class="page-item btn btn-secondary" href="index.php?page=' . ($current_page - 1) . '">Trước</a> | ';
}

// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++) {
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page) {
        echo '<span class="page-item btn btn-primary main-bg-color main-border-color">' . $i . '</span> | ';
    } else {
        echo '<a onclick="setPagination()" class="page-item btn btn-light" href="index.php?page=' . $i . '">' . $i . '</a> | ';
    }
}

// nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
if ($current_page < $total_page && $total_page > 1) {
    echo '<a class="page-item btn btn-secondary" href="index.php?page=' . ($current_page + 1) . '">Sau</a> | ';
}

?>
        <!-- <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">05</a></li>
                                    <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> -->
    </ul>
    <!-- shop-pagination end -->
</div>