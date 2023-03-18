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

// var_dump($_POST);
$orderInfo = getorderinfo($_POST['id']);
$cartList = getshoworderdetail($_POST['id']);
// $orderInfo = getorderinfo($_GET['id']);
// var_dump($orderInfo);
?>

<div class="p-3">
    <!-- <a class="text-decoration-none btn btn-outline-primary" href="index.php?act=settingacountpage"><i
            class="fa-solid fa-backward"></i> Trở lại
        lịch sử đơn
        hàng</a> -->
    <div class="row">
        <div class="col-md-5 shadow p-3">
            <h3 class="title alert bg-light">Thông tin đặt hàng</h3>
            <div class="mb-3">
                <p>Id đơn hàng: <span class="text-warning"><?php echo $orderInfo['id'] ?></span> </p>
                <p>Mã đơn hàng: <span class="text-warning"><?php echo $orderInfo['madonhang'] ?></span> </p>
                <p>Tổng đơn hàng: <span class="text-warning"><?php echo $orderInfo['tongdonhang'] ?> VND</span> </p>
                <p>Phương thức thanh toán: <span class="text-warning"><?php echo $orderInfo['pttt'] ?></span> </p>
                <p>Tên người đặt: <span class="text-warning"><?php echo $orderInfo['name'] ?></span> </p>
                <p>Số điện thoại liên hệ: <span class="text-warning"><?php echo $orderInfo['dienThoai'] ?></span> </p>
                <p>Địa chỉ: <span class="text-warning"><?php echo $orderInfo['address'] ?></span> </p>
                <p>Trạng thái: <span class="text-warning"><?php echo "Đã đặt hàng" ?></span> </p>
                <p>Thời gian đặt: <span class="text-warning"><?php echo $orderInfo['timeorder'] ?></span> </p>
                <div class="row">

                    <?php
// if ($orderInfo['trangthai'] == 4 || $orderInfo['trangthai'] == 5 || $orderInfo['trangthai'] == 6) {

// } else {

?>
                    <form class="col-6" action="<?php echo './index.php?act=updateorder&id=' . $orderInfo['id']; ?>"
                        method="post">
                        <input type="submit" name="updateorderbtn" class="btn btn-outline-success"
                            value="Xác nhận đã nhận hàng" />
                        <input type="hidden" name="updatestatus" value="4">
                    </form>

                    <form class="col-6" action="<?php echo './index.php?act=destroyorder&id=' . $orderInfo['id']; ?>"
                        method="post">

                        <input type="hidden" name="destroystatus" value="6">
                        <input type="submit" class="btn btn-outline-danger" name="destroyorderbtn"
                            value="Hủy đơn hàng" />

                    </form>
                    <?php

// }
?>

                </div>

            </div>
        </div>

        <div class="col-md-7 border border-dark">
            <h3 class="mb-3 text-center">Danh sách sản phẩm </h3>
            <p class="alert alert-warning"><?php echo "Đã xác nhận" ?></p>
            <table class=" table table-hover shadow p-5">
                <!-- <form action="" method="post">
        <input type="text" name="searchhistory" class="form-control" id="" value=""
            placeholder="Tìm kiếm lịch sử theo mã đơn hàng">
    </form> -->
                <thead class="text-dark bg-light p-3">

                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">id sản phẩm</th>
                        <th scope="col">id đơn hàng</th>
                        <!-- <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th> -->
                        <th scope="col">số lượng</th>

                        <th scope="col">đơn giá</th>
                        <th scope="col">tên sp</th>
                        <th scope="col">hình ảnh</th>

                    </tr>

                </thead>
                <tbody>

                    <?php

if (isset($_SESSION['iduser'])) {

    foreach ($cartList as $cart_item) {
        # code...
        echo '

    <tr class="p-3">
        <td class="" scope="row"> ' . $cart_item['id'] . '</td>
        <td class="">' . $cart_item['idsanpham'] . '</td>
        <td class="">' . $cart_item['iddonhang'] . '</td>
        <td class="">' . $cart_item['soluong'] . '</td>
        <td class="">' . $cart_item['dongia'] . '</td>
        <td class="">' . $cart_item['tensp'] . '</td>
        <td class=""><img width=100 height=100 src="../uploads/' . $cart_item['hinhanh'] . '" alt=""></td>
        </tr>
    ';
    }

    ?>
                </tbody>
            </table>
            <button class="btn btn-info">In hóa đơn</button>
        </div>
    </div>
    <?php
}
?>
</div>