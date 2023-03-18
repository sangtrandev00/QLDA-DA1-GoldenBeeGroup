<?php
if (!in_array('ob_gzhandler', ob_list_handlers())) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../../site/models/connectdb.php";
include "../../site/models/donhang.php";
include "../../site/models/user.php";

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
        // var_dump($_POST);
        $is_updated = update_shipping_address($_POST['iduser'], $_POST['shippingaddress']);
        echo $_POST['shippingaddress'];
        $result = [
            "status" => 1,
            "content" => $_POST['shippingaddress'],
        ];
        var_dump($result);
        break;
    case 'changepass':
        // var_dump($_POST);
        $oldpass = md5($_POST['oldpass']);
        $user = user_get_by_id($_POST['iduser']);
        $currpass = $user['mat_khau'];

        $newpass = $_POST['newpass'];
        $renewpass = $_POST['renewpass'];

        if ($oldpass != $currpass) {
            $result = array(
                "status" => 0,
                "content" => "Cập nhật mật khẩu thất bại, mật khẩu cũ không chính xác",
            );

        } else {

            if ($newpass != $renewpass) {
                $result = array(
                    "status" => 0,
                    "content" => "Cập nhật mật khẩu thất bại, nhập lại mật khẩu không chính xác",
                );
            } else {

                $is_changed = user_change_pass_by_id($_POST['iduser'], md5($newpass));
                if ($is_changed) {
                    $result = array(
                        "status" => 1,
                        "content" => "Cập nhật mật khẩu thành công",
                    );
                }

                // echo '<div class="alert alert-success">Thay đổi mật khẩu thành công!</div>';
            }
        }

        echo json_encode($result);

        break;
    case 'search-order':

        var_dump($_POST);
        // $_SESSION['madonhang'] = $_POST['searchValue'];
        // var_dump($_SESSION['madonhang']);
        unset($_SESSION['madonhang']);
        break;

    default:
        # code...
        break;
}
