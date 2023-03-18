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

// include "./view/account/updateacount-page.php";