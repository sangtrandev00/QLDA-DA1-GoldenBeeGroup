<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project/";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/category.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
include $ROOT_URL . "/DAO/report.php";

switch ($_GET['act']) {
    case 'addcate':
        # code...
        break;
    case 'editcate':
        # code...
        $error = array();
        // if (isset($_POST['editcatebtn']) && $_POST['editcatebtn']) {
        // var_dump($_POST);
        // exit;
        $madanhmuc = $_POST['id'];
        $tendanhmuc = $_POST['catename'];
        $cate_parent = $_POST['cateparent'];
        $cate_desc = $_POST['catedesc'];
        $cate_item = cate_select_by_id($madanhmuc);
        if ($_FILES['cateimage']['name'] == '') {
            $cate_image = $cate_item['hinh_anh'];
        } else {
            $target_file = "$ROOT_URL/uploads/" . basename($_FILES["cateimage"]["name"]);
            $hinh_anh = $_FILES['cateimage'];
            $cate_image = $hinh_anh['name'];
            move_uploaded_file($_FILES["cateimage"]["tmp_name"], $target_file);
        }

        // echo $cate_name, $cate_desc, $cate_desc;

        // echo $tendanhmuc;
        if (empty($tendanhmuc)) {
            $error['catename'] = "Không để trống tên danh mục";
            $result = array(
                "status" => 0,
                "message" => $error['catename'],
            );
        } else {
            if (cate_exist_by_name($tendanhmuc)) {
                $error['catename'] = "Tên danh mục đã bị trùng, mời nhập tên khác!";
                $result = array(
                    "status" => 0,
                    "message" => $error['catename'],
                );
            } else {

                $is_updated = cate_update($madanhmuc, $tendanhmuc, $cate_image, $cate_desc);
                // echo 'Update successfully';
                // echo '<div class="bg-success text-white p-2">Add category successully</div>';

                if ($is_updated) {
                    $result = array(
                        "status" => 1,
                        "message" => "Cập nhật danh mục thành công!",
                    );

                }
            }
        }
        echo json_encode($result);

        // }

        // include "./view/pages/categories/cate-list.php";
        break;
        break;
    case 'deletecate':
        # code...
        break;
    case 'deletesubcate':
        // if (isset($_GET['subid'])) {
        var_dump($_POST);
        $subcateid = $_POST['subid'];
        $cateid = $_POST['cateid'];
        // echo $subcateid . $cateid;
        // subcate_delete($subcateid);
        $is_deleted = subcate_delete($subcateid);

        if ($is_deleted) {
            $result = array(
                "status" => 1,
                "message" => "Xóa sản phẩm thành công!",

            );
            echo json_encode($result);

            // echo '
            //     <script>
            //         document.addEventListener("DOMContentLoaded", function(e){
            //             showToast();
            //         })
            //     </script>
            // ';
        }
        // header("location: ./index.php?act=subcatelist&cateid=" . $cateid);
        // echo "successfully!";
        // include "./vaiew/pages/categories/subcate-list.php";
        // header('location: ./index.php?act=subcatelist&id=');

        break;
    case 'editsubcate':

        $error = array();
        // if (isset($_POST['editcatebtn']) && $_POST['editcatebtn']) {
        // var_dump($_POST);
        // exit;
        $id_dmphu = $_POST['subid'];
        $tendanhmucphu = $_POST['subcatename'];
        $cate_parent = $_POST['cateparent'];
        $subcate_desc = $_POST['subcatedesc'];
        $is_updated = subcate_update($id_dmphu, $tendanhmucphu, $subcate_desc);

        if ($is_updated) {
            echo 'Successfully!';
        }
        break;
    case 'productsbycate':
        $report_products = report_products_by_category();

        // var_dump($report_products);

        echo json_encode($report_products);
        break;
    default:
        # code...
        break;
}
