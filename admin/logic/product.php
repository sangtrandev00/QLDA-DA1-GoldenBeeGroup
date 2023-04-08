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
        $idproduct = $_POST['id'];
        $product_item = product_select_by_id($idproduct);
        // if (isset($_POST['editproductbtn']) && $_POST['editproductbtn']) {
        $image_files = $_FILES['images'];
        if ($_FILES['images']['name'][0] == "") {
            $image_list = $product_item['images'];
        } else {
            $image_list = implode(',', $image_files['name']);
            // var_dump($image_files);
            // var_dump($image_list);
            $i = 0;
            foreach ($image_files['name'] as $image_name) {
                # code...
                // $target_file = "../uploads/" . basename($file_name);
                // var_dump($image_file_item);
                move_uploaded_file($image_files["tmp_name"][$i], "$ROOT_URL/uploads/" . $image_name);
                $i++;
            }
        }
        // var_dump($image_list);
        // exit;

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

        // Validate server here !!!
        if (strlen($tensp) == 0) {
            $error['product-name'] = "Không để trống tên sản phẩm!";
        }
        if (!is_numeric($ma_danhmuc)) {
            $error['cate'] = "Không để trống mã danh mục!";
        }

        if (!is_numeric($id_dmphu)) {
            $error['subcate'] = "Không để trống mã danh mục phụ";
        }

        if (empty($mo_ta)) {
            $error['desc'] = "Không để trống mô tả sản phẩm";
        }

        if (empty($thong_tin)) {
            $error['info'] = "Không để trống thông tin sản phẩm";
        }

        if (empty($don_gia)) {
            $error['price'] = "không để trống đơn giá";
        } else if ($don_gia < 0) {
            $error['price'] = "Đơn giá phải lớn hơn 0!";
        }

        if (empty($giam_gia)) {
            $error['discount'] = "Không để trống giảm giá";
        } else if ($giam_gia < 0 || $giam_gia > 100) {
            $error['discount'] = "Giảm giá phải lớn hơn hoặc bằng 0 và nhỏ hơn bằng 100";
        }

        if (!$error) {
            $is_updated = product_update($idproduct, $tensp, $don_gia, $so_luong, $image_list, $giam_gia, $dac_biet, $date_create, $mo_ta, $thong_tin, $ma_danhmuc, $id_dmphu, $promote);
            if ($is_updated) {
                $result = array(
                    "status" => 1,
                    "content" => "Cập nhật sản phẩm thành công!",
                );
                echo json_encode($result);
            }
        } else {
            $result = array(
                "status" => 0,
                "content" => "Cập nhật sản phẩm thất bại",
                "error" => $error,
            );
            echo json_encode($result);
        }

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
    case 'dataproducts':
        $product_list = product_select_all();

        // array(
        //     "id" => 1,
        //     "tensp" =>
        // )
        // $product_list = array_map(function ($product_item) {

        //     return $product_item;
        // }, $product_list);

        // echo json_encode(
        //     array(
        //         'product_list' => $product_list,
        //     )
        // );
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

    case 'addreplyreviews':
        if (isset($_POST['idReview'])) {
            $id_review = $_POST['idReview'];
            $id_user = $_POST['idUser'];
            $content = $_POST['content'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_create = date("Y-m-d H:i:s");

            $is_inserted = insert_reply_review($id_user, $id_review, $content, $date_create);
            if ($is_inserted) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "content" => "Trả lời bình luận thành công!",
                    )
                );
            }
        }
        break;
    case 'getreplyreview':
        if (isset($_GET['idReply'])) {
            $id_reply = $_GET['idReply'];

            $reply_review = select_reply_review_by_id($id_reply);

            echo json_encode(
                array(
                    "status" => 1,
                    "content" => $reply_review,
                )
            );
        }
        break;
    case 'updateReplyReviews':
        if (isset($_POST['idReply'])) {
            $id_review = $_POST['idReview'];
            $id_user = $_POST['idUser'];
            $id_reply = $_POST['idReply'];
            $content = $_POST['content'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_modified = date('Y-m-d H:i:s');
            $is_updated = update_reply_review($id_reply, $id_user, $id_review, $content, $date_modified);

            if ($is_updated) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "content" => "Cập nhật trả lời bình luận thành công!",
                    )
                );
            } else {
                echo json_encode(
                    array(
                        "status" => 0,
                        "content" => "Cập nhật trả lời bình luận thất bại!",
                    )
                );
            }
        }
        break;
    default:
        # code...
        break;
}
