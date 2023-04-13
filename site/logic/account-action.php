<?php

if (!in_array('ob_gzhandler', ob_list_handlers())) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

// include $ROOT_URL . "/pdo-library.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
include $ROOT_URL . "/DAO/order.php";
include $ROOT_URL . "/DAO/user.php";
include $ROOT_URL . "/site/models/connectdb.php";
include $ROOT_URL . "/site/models/user.php";
include $ROOT_URL . "/site/models/donhang.php";

// include "../../site/models/connectdb.php";
// include "../../site/models/donhang.php";
// include "../../site/models/user.php";

switch ($_GET['act']) {
    case 'updateaccountinfo':
        # code...
        $error = array();
        // $tai_khoan = $_POST['tai_khoan'];
        var_dump($_POST);
        $iduser = $_POST['iduser'];
        $ho_ten = $_POST['ho_ten'];
        $diachi = $_POST['diachi'];
        $sodienthoai = $_POST['sodienthoai'];
        $email = $_POST['email'];

        var_dump($_FILES);
        $target_file = "../uploads/" . basename($_FILES["hinh_anh"]["name"]);

        // echo $target_file;

        move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);

        // validate at server

        // Validate php here

        // if (empty($_FILES["hinh_anh"]["name"])) {
        //     $error['hinh_anh'] = "Không để trống hình ảnh";
        // }

        // Validate at server

        if (strlen($ho_ten) == 0) {
            $error['ho_ten'] = "Không để trống họ tên!";
        } else if (strlen($ho_ten) > 30) {
            $error['ho_ten'] = "Họ tên không vượt quá 30 ký tự!";
        }

        if (empty($email)) {
            $error['email'] = "không để trống email";
        }
        // else if (!is_email($email)) {
        //     $error['email'] = "Email không đúng định dạng!";
        // }

        if (strlen($sodienthoai) == 0) {
            $error['sodienthoai'] = "Không để trống số điện thoại!";
        }
        // else if (!validating($sodienthoai)) {
        //     $error['sodienthoai'] = "Định dạng số điện thoại không chính xác!";
        // }

        if (empty($tai_khoan)) {
            $error['tai_khoan'] = "Không để trống tài khoản!";
        }

        if (!$error) {
            $is_updated = user_update_info($iduser, $tai_khoan, $ho_ten, $diachi, $sodienthoai, $kichhoat = 1, $target_file, $email, $role = 1);

            if ($is_updated) {
                echo '<div class="p-3 bg-success">Chúc mừng bạn đã cập nhật người dùng thành công</div>';
                echo '
                     <script>
                     const collapseOneElement = document.getElementById("collapseOne");
                     if(collapseOneElement) {
                         collapseOneElement.classList.add("show");
                         collapseOneElement.classList.remove("collapse");
                     }
                 </script>
                     ';
            } else {

            }
        } else {
            echo '
                 <script>
                 const collapseOneElement = document.getElementById("collapseOne");
                 const buttonOne = document.querySelector("#headingOne button");
                 if(buttonOne) {
                     buttonOne.classList.add("show");
                     buttonOne.classList.remove("collapse");
                 }
                 if(collapseOneElement) {
                     collapseOneElement.classList.add("show");
                     collapseOneElement.classList.remove("collapse");
                 }
             </script>
                 ';
        }

        break;
    case 'updateshippingaddress':
        #code ...
        $is_updated = update_shipping_address($_POST['iduser'], $_POST['province_id'], $_POST['district_id'], $_POST['ward_id'], $_POST['detail_address']);
        if ($is_updated) {

            $result = [
                "status" => 1,
                "content" => "Cập nhật địa chỉ giao hàng thành công!",
            ];

        } else {
            $result = [
                "status" => 0,
                "content" => "Cập nhật thất bại",
            ];
        }

        // var_dump();
        echo json_encode($result);
        break;
    case 'insertshippingaddress':
        $is_inserted = insert_shipping_address($_POST['iduser'], $_POST['province_id'], $_POST['district_id'], $_POST['ward_id'], $_POST['detail_address']);

        if ($is_inserted) {

            $result = [
                "status" => 1,
                "content" => "Cập nhật địa chỉ giao hàng thành công!",
            ];

        } else {
            $result = [
                "status" => 0,
                "content" => "Cập nhật thất bại",
            ];
        }
        break;
    case 'checkexistshippingaddress':
        $is_existed = is_existing_shipping_address($_POST['iduser']);
        if ($is_existed) {
            echo json_encode(
                array(
                    "status" => 1,
                    "content" => true,
                )
            );
        } else {
            echo json_encode(
                array(
                    "status" => 0,
                    "content" => false,
                )
            );
        }
        break;
    case 'changepass':
        // var_dump($_POST);

        $error = array();
        $oldpass = md5($_POST['oldpass']);
        $user = user_get_by_id($_POST['iduser']);
        $currpass = $user['mat_khau'];

        $newpass = $_POST['newpass'];
        $renewpass = $_POST['renewpass'];

        if (empty($oldpass)) {
            $error['oldpass'] = "Không để trống mật khẩu cũ!";
        } else if ($oldpass != $currpass) {
            $result = array(
                "status" => 0,
                "content" => "Cập nhật mật khẩu thất bại, mật khẩu cũ không chính xác",
            );
            $error['oldpass'] = "Nhập mật khẩu cũ không chính xác!";

        }

        if (empty($newpass)) {
            $error['newpass'] = "Không để trống mật khẩu mới!";
        }

        if (empty($newpass)) {
            $error['renewpass'] = "Không để trống nhập lại mật khẩu!";
        } else if ($newpass != $renewpass) {
            $result = array(
                "status" => 0,
                "content" => "Cập nhật mật khẩu thất bại, nhập lại mật khẩu không chính xác",
            );
            $error['renewpass'] = "Nhập lại mật khẩu không chính xác";
        }

        if (!$error) {
            $is_changed = user_change_pass_by_id($_POST['iduser'], md5($newpass));
            if ($is_changed) {
                $result = array(
                    "status" => 1,
                    "content" => "Cập nhật mật khẩu thành công",

                );
            }
        } else {
            $result = array(
                "status" => 0,
                "content" => "Cập nhật mật khẩu thất bại",
                "error" => $error,
            );
        }

        // echo '<div class="alert alert-success">Thay đổi mật khẩu thành công!</div>';

        echo json_encode($result);

        break;
    case 'search-order':

        var_dump($_POST);
        // $_SESSION['madonhang'] = $_POST['searchValue'];
        // var_dump($_SESSION['madonhang']);
        unset($_SESSION['madonhang']);
        break;
    case 'reason-destroy':
        // echo "hihi";
        if (isset($_POST['id'])) {
            $is_updated = update_order_reason_destroy($_POST['reason'], $_POST['id']);

            if ($is_updated) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "content" => "Thêm lý do hủy",
                    )
                );
            }
        }
        break;

    case 'destroyorder':
        if (isset($_POST['orderid'])) {
            // Cập nhật lại số lượng tồn kho của sản phẩm trong đơn hàng (Tăng lên)
            $products = select_products_from_order_id($_POST['orderid']);

            foreach ($products as $product) {
                # code...
                product_update_remaining_qty($product['idsanpham'], $product['soluong']);
            }
            // Cập nhật trạng thái
            $is_updated = updateorderstatus($_POST['orderid'], 6);

            if ($is_updated) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "message" => "Cập nhật trạng thái thành công!",
                    )
                );
            }
        } else {

        }
        break;
    case 'confirmorder':
        if (isset($_POST['orderid'])) {
            $is_updated = updateorderstatus($_POST['orderid'], 4);
            if ($is_updated) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "message" => "Cập nhật trạng thái thành công!",
                    )
                );
            }
        }
        break;
    case 'reorder':
        // $_SESSION['giohang'][] =
        if (isset($_POST['orderid'])) {
            $reorder_list = select_orderdetail_by_orderid($_POST['orderid']);
            // var_dump($reorder_list);
            // $_SESSION['giohang'][] = $reorder_list;

            foreach ($reorder_list as $order) {
                # code...
                $danhmuc = catename_select_by_id($order['ma_danhmuc'])['ten_danhmuc'];
                $id = $order['idsanpham'];
                $sl = $order['soluong'];
                $don_gia = $order['dongia'];
                $hinh_anh = $order['hinhanh'];
                $tensp = $order['tensp'];
                $cart_item = array(
                    "id" => $id,
                    "tensp" => $tensp,
                    "danhmuc" => $danhmuc,
                    "hinh_anh" => $hinh_anh,
                    "sl" => $sl,
                    "don_gia" => $don_gia,
                );

                $_SESSION['giohang'][] = $cart_item;

            }
            // exit;
            // if ($reorder_list) {
            echo json_encode(
                array(
                    "status" => 1,
                    "message" => "Thành công!",
                )
            );
            // }

        }
        break;
    case 'updatepaymentmethod':
        // echo 'payment';
        $is_updated = user_update_payment_method($_POST['iduser'], $_POST['paymentMethod']);
        if ($is_updated) {
            echo json_encode(
                array(
                    "status" => 1,
                    "message" => "Cập nhật phương thức thanh toán thành công!",
                )
            );
        }
        break;
    case 'reviewproduct':
        // if (isset($_POST['editproductbtn']) && $_POST['editproductbtn']) {
        $image_files = $_FILES['review_imgs'];

        $images_review = implode(',', $image_files['name']);
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

        $iduser = $_POST['iduser'];
        $idsanpham = $_POST['idsanpham'];
        $noidung = $_POST['review_content'];
        $rating_star = $_POST['review_star_rating'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date_create = date('Y-m-d H:i:s');
        $iddh = $_POST['iddh'];
        $is_inserted = insert_reviews($iduser, $idsanpham, $images_review, $noidung, $rating_star, $date_create, $iddh, 1);
        if ($is_inserted) {
            echo json_encode(
                array(
                    "status" => 1,
                    "content" => "Đánh giá sản phẩm thành công!",
                )
            );
        }
        // exit;
        break;
    default:
        # code...
        break;
}