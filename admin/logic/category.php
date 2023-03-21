<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project/";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "admin/models/category.php";
include $ROOT_URL . "DAO/product.php";
include $ROOT_URL . "./DAO/category.php";

switch ($_GET) {
    case 'addcate':
        # code...
        break;
    case 'editcate':
        # code...
        $error = array();
        // if (isset($_POST['editcatebtn']) && $_POST['editcatebtn']) {
        $madanhmuc = $_POST['id'];
        $tendanhmuc = $_POST['catename'];
        $cate_parent = $_POST['cateparent'];
        $cate_desc = $_POST['catedesc'];
        $cate_item = cate_select_by_id($madanhmuc);
        if ($_FILES['cateimage']['name'] == '') {
            $cate_image = $cate_item['hinh_anh'];
        } else {
            $target_file = "../uploads/" . basename($_FILES["cateimage"]["name"]);
            $hinh_anh = $_FILES['cateimage'];
            $cate_image = $hinh_anh['name'];
            move_uploaded_file($_FILES["cateimage"]["tmp_name"], $target_file);
        }

        // echo $cate_name, $cate_desc, $cate_desc;

        // echo $tendanhmuc;
        if (empty($tendanhmuc)) {
            $error['catename'] = "Không để trống tên danh mục";
        } else {
            if (cate_exist_by_name($tendanhmuc)) {
                echo '<div class="alert alert-danger">Tên danh mục đã bị trùng, mời nhập tên khác!</div>';
            } else {

                $is_updated = cate_update($madanhmuc, $tendanhmuc, $cate_image, $cate_desc);
                // echo 'Update successfully';
                // echo '<div class="bg-success text-white p-2">Add category successully</div>';

                if ($is_updated) {
                    $result = array(
                        "status" => 1,
                        "message" => "Cập nhật danh mục thành công!",
                    );
                    echo json_encode($result);
                }
            }
        }

        // }

        // include "./view/pages/categories/cate-list.php";
        break;
        break;
    case 'deletecate':
        # code...
        break;

    default:
        # code...
        break;
}