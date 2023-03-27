<?php

?>



<h5 class="my-3">Hình đại diện</h5>
<?php
if (isset($_SESSION['iduser'])) {
    $iduser = $_SESSION['iduser'];
    $user = user_select_by_id($iduser);
    $password = $user['mat_khau'];
}

$imgUrl = substr($user['hinh_anh'], 0, 4) == "http" ? $user['hinh_anh'] : "../uploads/" . $user['hinh_anh'];

?>
<img src="<?php echo $imgUrl ?>" alt="fsdf" style="width: 8rem; height: 8rem; object-fit: cover; border-radius: 50%"
    class="account-img">
<h5 class="mt-3">Thông tin tài khoản: </h5>
<ul>
    <!-- <li>
        Tên đăng nhập: <?php echo $user['tai_khoan']; ?>
    </li> -->
    <li>
        Họ tên: <?php echo $user['ho_ten']; ?>
    </li>
    <li>
        Địa chỉ: <?php echo $user['diachi']; ?>
    </li>
    <li>
        Công ty: <?php echo $user['congty']; ?>
    </li>
    <li>
        Điện thoại: <?php echo $user['sodienthoai']; ?>
    </li>
    <li>
        Email: <?php echo $user['email']; ?>
    </li>

</ul>