<?php
// session_start();
/*
 * Định nghĩa các url cần thiết được sử dụng trong website
 */
// $ROOT_URL = "/xshop";
// $CONTENT_URL = "$ROOT_URL/content";
// $ADMIN_URL = "$ROOT_URL/admin";
// $SITE_URL = "$ROOT_URL/site";

$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";
$ADMIN_URL = $ROOT_URL . "/admin";
$SITE_URL = $ROOT_URL . "/site";
$PDO_LIB = $ROOT_URL . "/pdo-library.php";

/*
 * Định nghĩa đường dẫn chứa ảnh sử dụng trong upload
 */
$IMAGE_DIR = $ROOT_URL . "./uploads";

/*
 * 2 biến toàn cục cần thiết để chia sẻ giữa controller và view
 */

$VIEW_NAME = "index.php";
$MESSAGE = '';

/**
 * Kiểm tra sự tồn tại của một tham số trong request
 * @param string $fieldname là tên tham số cần kiểm tra
 * @return boolean true tồn tại
 */
function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}
/**
 * Lưu file upload vào thư mục
 * @param string $fieldname là tên trường file
 * @param string $target_dir thư mục lưu file
 * @return tên file upload
 */
function save_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}
/**
 * Tạo cookie
 * @param string $name là tên cookie
 * @param string $value là giá trị cookie
 * @param int $day là số ngày tồn tại cookie
 */
function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}
/**
 * Xóa cookie
 * @param string $name là tên cookie
 */
function delete_cookie($name)
{
    add_cookie($name, '', -1);
}
/**
 * Đọc giá trị cookie
 * @param string $name là tên cookie
 * @return string giá trị của cookie
 */
function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}
/**
 * Kiểm tra đăng nhập và vai trò sử dụng.
 * Các php trong admin hoặc php yêu cầu phải được đăng nhập mới được
 * phép sử dụng thì cần thiết phải gọi hàm này trước
 **/
function check_login()
{
    global $SITE_URL;
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['vai_tro'] == 1) {
            return;
        }
        if (strpos($_SERVER["REQUEST_URI"], '/admin/') == false) {
            return;
        }
    }
    $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
    header("location: $SITE_URL/tai-khoan/dang-nhap.php");
}

function renderCard($productList)
{
    foreach ($productList as $productItem) {
        # code...
        $productSelectByCate = cate_select_by_id($productItem['ma_danhmuc']);
        $cateName = $productSelectByCate['ten_danhmuc'];
        $newPrice = $productItem['don_gia'] * (1 - $productItem['giam_gia'] / 100);
        echo '
        <div class="text-center">
                    <div class="card position-relative" style="">
                        <img src="../' . $productItem['hinhanh1'] . '"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-cate fz-5">Phân loại: ' . $cateName . '</p>
                            <h5 class="card-title">' . $productItem['tensp'] . '</h5>
                            <s class="mb-3 card-old-price">' . number_format($productItem['don_gia']) . ' VND</s>
                            <div class="card-price mb-3">
                            ' . number_format($newPrice) . ' VND
                            </div>
                            <a href="./index.php?act=detailproductpage&id=' . $productItem['masanpham'] . '" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                        <span class="card-discount position-absolute  translate-middle badge rounded-pill bg-danger p-2">
                           - ' . $productItem['giam_gia'] . ' %
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        <span class="card-view position-absolute badge rounded-pill bg-dark">' . $productItem['so_luot_xem'] . ' view</span>
                    </div>
                </div>
        ';
    }
}

function renderCardShoppage($productList)
{
    foreach ($productList as $productItem) {
        # code...
        $productSelectByCate = cate_select_by_id($productItem['ma_danhmuc']);
        $cateName = $productSelectByCate['ten_danhmuc'];
        $newPrice = $productItem['don_gia'] * (1 - $productItem['giam_gia'] / 100);
        echo '
        <div class="product-item col-4">
        <div class="text-center">
                    <div class="card position-relative" style="">
                        <img src="../' . $productItem['hinhanh1'] . '"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-cate fz-5">Phân loại: ' . $cateName . '</p>
                            <h5 class="card-title">' . $productItem['tensp'] . '</h5>
                            <s class="mb-3 card-old-price">' . number_format($productItem['don_gia']) . ' VND</s>
                            <div class="card-price mb-3">
                            ' . number_format($newPrice) . ' VND
                            </div>
                            <a href="./index.php?act=detailproductpage&id=' . $productItem['masanpham'] . '" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                        <span class="card-discount position-absolute  translate-middle badge rounded-pill bg-danger p-2">
                           - ' . $productItem['giam_gia'] . ' %
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        <span class="card-view position-absolute badge rounded-pill bg-dark">' . $productItem['so_luot_xem'] . ' view</span>
                    </div>
                </div>
        </div>
        ';
    }
}

function validating($phone)
{
    if (preg_match('/^[0-9]{10}+$/', $phone)) {
        return true;
    } else {
        return false;
    }
}

function is_email($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? false : true;
}

function validateUploadImage($fileName)
{
//     $check = getimagesize($_FILES["$fileName"]["tmp_name"]);
    //     if ($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }

// // Check if file already exists
    //     if (file_exists($target_file)) {
    //         echo "Sorry, file already exists.";
    //         $uploadOk = 0;
    //     }

// // Check file size
    //     if ($_FILES["$fileName"]["size"] > 500000) {
    //         echo "Sorry, your file is too large.";
    //         $uploadOk = 0;
    //     }

// // Allow certain file formats
    //     if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //         && $imageFileType != "gif") {
    //         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //         $uploadOk = 0;
    //     }

// // Check if $uploadOk is set to 0 by an error
    //     if ($uploadOk == 0) {
    //         echo "Sorry, your file was not uploaded.";
    //         // if everything is ok, try to upload file
    //     } else {
    //         if (move_uploaded_file($_FILES["$fileName"]["tmp_name"], $target_file)) {
    //             echo "The file " . htmlspecialchars(basename($_FILES["$fileName"]["name"])) . " has been uploaded.";
    //         } else {
    //             echo "Sorry, there was an error uploading your file.";
    //         }
    //     }

}

// include "./site/model/connectdb.php";

function createDataWithPagination($conn, $sql, $_limit)
{

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

    $pagination = ['datalist' => $datalist, 'totalpage' => $total_page, 'start' => $start, 'current_page' => $current_page, 'total_records' => $total_records];
    return $pagination;
}

function showStatus($num)
{
    $trangthai = '';
    $statusMess = '';

    switch ($num) {
        case 1:
            $trangthai = 'Chờ xác nhận';
            $statusMess = 'Đơn hàng đã được đặt, Đang chờ xác nhận!';
            break;
        case 2:
            $trangthai = 'Đã xác nhận';
            $statusMess = 'Đơn hàng đã được xác nhận, Đang chờ giao cho khâu vận chuyển!';
            break;
        case 3:
            $trangthai = 'Đang giao hàng';
            $statusMess = 'Đơn hàng đang được vận chuyển đến cho bạn!';
            break;
        case 4:
            $trangthai = 'Giao hàng thành công';
            $statusMess = 'Đơn hàng đã được giao thành công';
            break;
        case 5:
            $trangthai = 'Giao hàng thất bại';
            $statusMess = 'Đơn hàng đã giao hàng thất bại! Do thời tiết hoặc lỗi do hàng tồn';
            break;
        case 6:
            $trangthai = 'Đơn hàng đã bị hủy';
            $statusMess = 'Đơn hàng đã hủy!';
            break;
        default:
    }
    return [$trangthai, $statusMess];
}

function updateorderstatus($iddh, $trangthai)
{
    $sql = "update tbl_order set trangthai = ? where id = ?";
    $mess = pdo_execute($sql, $trangthai, $iddh);
    echo $mess;
    return true;
}

function deleteorderdetailbyid($iddh)
{
    $sql = "delete from tbl_cart where iddonhang = $iddh;";
    pdo_execute($sql);
    return true;
}

function deleteorderbyid($iddh)
{
    $sql = "delete from tbl_order where id = $iddh;";
    pdo_execute($sql);
    return true;
}

function getthumbnail($image_list)
{

    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            return $thumbnail;
        }
    }

}