<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project/";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "admin/models/category.php";
include $ROOT_URL . "DAO/product.php";
include $ROOT_URL . "./DAO/category.php";
switch ($_GET['act']) {
    case 'addproduct':
        # code...
        break;
    case 'editproduct':
        $error = array();
        // if (isset($_POST['editproductbtn']) && $_POST['editproductbtn']) {
        $image_files = $_FILES['images'];
        $image_list = implode(',', $image_files['name']);
        // var_dump($image_files);
        // var_dump($image_list);
        $i = 0;
        foreach ($image_files['name'] as $image_name) {
            # code...
            // $target_file = "../uploads/" . basename($file_name);
            // var_dump($image_file_item);
            move_uploaded_file($image_files["tmp_name"][$i], "../uploads/" . $image_name);
            $i++;
        }

        $idproduct = $_POST['id'];
        $tensp = $_POST['tensp'];
        $ma_danhmuc = $_POST['ma_danhmuc'];
        $id_dmphu = $_POST['id_dmphu'];
        $giam_gia = $_POST['giam_gia'];
        $don_gia = $_POST['don_gia'];
        $so_luong = $_POST['so_luong'];
        // $view = $_POST['view'];
        $mo_ta = $_POST['mo_ta'];
        $thong_tin = $_POST['thong_tin'];
        $dac_biet = 0;
        $promote = 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date_create = date('Y-m-d H:i:s');

        // Validate at server

        // if (strlen($tensp) == 0) {
        //     $error['proname'] = "Không để trống tên sản phẩm!";
        // }

        // if (!is_numeric($ma_danhmuc)) {
        //     $error['ma_danhmuc'] = "Không để trống mã danh mục!";
        // }

        // if (empty($don_gia)) {
        //     $error['don_gia'] = "không để trống đơn giá";
        // } else if ($don_gia < 0) {
        //     $error['don_gia'] = "Đơn giá phải lớn hơn 0!";
        // }

        // if (empty($giam_gia)) {
        //     $error['giam_gia'] = "Không để trống giảm giá";
        // } else if ($giam_gia < 0 || $giam_gia > 100) {
        //     $error['giam_gia'] = "Giảm giá phải lớn hơn hoặc bằng 0 và nhỏ hơn bằng 100";
        // }

        // if (empty($_FILES["hinhanh1"]["name"])) {
        //     $error['hinhanh1'] = "Không để trống hình ảnh chính, hình ảnh 1";
        // }

        // if (!$error) {
        $is_updated = product_update($idproduct, $tensp, $don_gia, $so_luong, $image_list, $giam_gia, $dac_biet, $date_create, $mo_ta, $thong_tin, $ma_danhmuc, $id_dmphu, $promote);
        if ($is_updated) {
            echo '<script>
                        document.getElementById("liveToastBtn").click();
                        // $("#cartModal #cartModalLabel).text("Cập nhật sản phẩm thành công!");
                </script>';
            $result = array(
                "status" => 1,
                "message" => "Cập nhật sản phẩm thành công!",
            );
            var_dump($result);
        } else {

        }
    // } else {

    // }
    // }

    case 'getproduct':
        if (isset($_GET['id'])) {
            $product_item = product_select_by_id($_GET['id']);
            // var_dump($product_item);
            $result = array(
                "status" => 1,
                "content" => $product_item,
            );
            echo json_encode($result);

        }
        break;
    case 'deleteproduct':
        if (isset($_POST['id'])) {
            product_delete($_POST['id']);
            var_dump(
                array(
                    "status" => 1,
                    "message" => "Xóa sản phẩm thành công!",
                )
            );
        }
        break;

    default:
        # code...
        break;
}
