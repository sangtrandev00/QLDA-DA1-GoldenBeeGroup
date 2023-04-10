<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/connectdb.php";
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
        // echo $tendanhmuc;
        if (empty($tendanhmuc)) {
            $error['catename'] = "Không để trống tên danh mục";
        }
        $target_file = "$ROOT_URL/uploads/" . basename($_FILES["cateimage"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($_FILES['cateimage']['name'] == '') {
            $cate_image = $cate_item['hinh_anh'];
        } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $error['image'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
        } else {

            $hinh_anh = $_FILES['cateimage'];
            $cate_image = $hinh_anh['name'];
            move_uploaded_file($_FILES["cateimage"]["tmp_name"], $target_file);
        }

        // echo $cate_name, $cate_desc, $cate_desc;

        if (!$error) {
            $is_updated = cate_update($madanhmuc, $tendanhmuc, $cate_image, $cate_desc);
            if ($is_updated) {
                $result = array(
                    "status" => 1,
                    "message" => "Cập nhật danh mục thành công!",
                );

            }
        } else {
            $result = array(
                "status" => 0,
                "message" => "Cập nhật sản phẩm không thành công!",
                "error" => $error,
            );
        }

        echo json_encode($result);

        // }

        // include "./view/pages/categories/cate-list.php";
        break;
    case 'addsubcate':
        $error = array();
        $subcate_name = $_POST['subcatename'];
        if ($subcate_name == "") {
            $error['subcatename'] = "Tên danh mục phụ rỗng !";
        } else if (subcate_exist_by_name($subcate_name)) {
            $error['subcatename'] = "Tên danh mục phụ đã tồn tại !";
        }

        $cate_parent = $_POST['cateparent'];
        $cate_desc = $_POST['subcatedesc'];

        if (!$error) {

            $is_added = subcate_insert($cate_parent, $subcate_name, $cate_desc);
            if ($is_added) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "content" => "Thêm sản phẩm thành công!",
                    )
                );
            }
        } else {
            echo json_encode(
                array(
                    "status" => 0,
                    "content" => "Thêm sản phẩm thất bại!",
                    "error" => $error,
                )
            );
        }

        // include "./index.php?act=subcatelist&cateid=" . $cate_parent;

        break;
    case 'editsubcate':
        $error = array();
        $id_dmphu = $_POST['subid'];
        $tendanhmucphu = $_POST['subcatename'];
        $cate_parent = $_POST['cateparent'];
        $subcate_desc = $_POST['subcatedesc'];
        if ($tendanhmucphu == "") {
            $error['subcatename'] = "Tên danh mục phụ không được để trống!";
        }

        if (!$error) {

            $is_updated = subcate_update($id_dmphu, $tendanhmucphu, $subcate_desc);
            if ($is_updated) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "content" => "Cập nhật danh mục phụ thành công!",
                    )
                );
            }
        } else {
            echo json_encode(
                array(
                    "status" => 0,
                    "content" => "Cập nhật danh mục phụ thất bại!",
                    "error" => $error,
                )
            );
        }
        break;

    case 'deletesubcate':
        // &subid=22&cateid=46
        $error = [];
        if (isset($_POST['subid'])) {
            $subcateid = $_POST['subid'];
            $cateid = $_POST['cateid'];
            // echo $subcateid . $cateid;
            if (count_products_by_subcate($subcateid) > 0) {
                $error['existproducts'] = "Sản phẩm đã tồn tại trong danh mục con này!, Hãy xóa sản phẩm con trong danh mục này trước!";
            }

            if (!$error) {
                subcate_delete($subcateid);

                echo json_encode(
                    array(
                        "status" => 1,
                        "content" => "Xóa danh mục sản phẩm con thành công!",
                    )
                );
            } else {
                echo json_encode(
                    array(
                        "status" => 0,
                        "content" => "Xóa danh mục sản phẩm con thất bại!",
                        "error" => $error,
                    )
                );
            }

            // echo "successfully!";
            // include "./vaiew/pages/categories/subcate-list.php";
            // header('location: ./index.php?act=subcatelist&id=')
        }
        break;
    case 'productsbycate':
        $report_products = report_products_by_category();

        // var_dump($report_products);

        echo json_encode($report_products);
        break;

    case 'selectsubcate':
        if (isset($_POST['cateId'])) {
            $subcates = select_subcates_by_cateid($_POST['cateId']);

            echo json_encode(
                array(
                    "subcates" => $subcates,
                )
            );
        }

        break;
    default:
        # code...
        break;
}
