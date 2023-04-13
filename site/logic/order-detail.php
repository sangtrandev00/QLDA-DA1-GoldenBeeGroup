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

include "$ROOT_URL/site/models/connectdb.php";
include "$ROOT_URL/site/models/donhang.php";
// include $ROOT_URL . "./admin/models/category.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
include "$ROOT_URL" . "/global.php";

// var_dump($_POST);
$orderInfo = getorderinfo($_POST['id']);
// var_dump($_POST);
// var_dump($orderInfo);
// exit;
$cartList = get_order_and_detail($_POST['id']);
// $orderInfo = getorderinfo($_GET['id']);
// var_dump($orderInfo);
$trangthai = showStatus($orderInfo['trangthai'])[0];
$message = showStatus($orderInfo['trangthai'])[1];
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
                <p>Trạng thái: <span class="text-warning "><?php echo $trangthai ?></span> </p>
                <?php if ($orderInfo['trangthai'] == 6) {echo '<p class="text-danger fw-bold">Lý do hủy: ' . $orderInfo['reason_destroy'] . '</p>';}?>
                <p>Thời gian đặt: <span class="text-warning"><?php echo $orderInfo['timeorder'] ?></span> </p>
                <?php
$date = new DateTime($orderInfo['timeorder']);
$date->modify('+2 day');
// echo $date->format('Y-m-d H:i:s');

$current_date = date("Y-m-d H:i:s");
// echo $current_date;

?>
                <div class="row">

                    <?php
// if ($orderInfo['trangthai'] == 4 || $orderInfo['trangthai'] == 5 || $orderInfo['trangthai'] == 6) {

// } else {

?>

                    <?php
switch ($orderInfo['trangthai']) {
    case '1':
    case '2':
        ?>
                    <form onsubmit="destroyOrder(<?php echo $_POST['id'] ?>)" id="cancel-order-form" class="col-6"
                        action="<?php echo './index.php?act=destroyorder&id=' . $orderInfo['id']; ?>" method="post">

                        <input type="hidden" name="destroystatus" value="6">
                        <input type="submit" class="btn btn-outline-danger" name="destroyorderbtn"
                            value="Hủy đơn hàng" />

                    </form>
                    <?php
# code...
        break;
    case '3':
        if ($current_date >= $date->format('Y-m-d H:i:s')) {
            // echo "TRUE";
        } else {
            // echo "FALSE";
        }
        if ($current_date >= $date->format('Y-m-d H:i:s')) {

            ?>
                    <form onsubmit="confirmOrder(<?php echo $_POST['id'] ?>)" id="confirm-order-form" class="col-6"
                        action="<?php echo './index.php?act=updateorder&id=' . $orderInfo['id']; ?>" method="post">
                        <input type="submit" name="updateorderbtn" class="btn btn-outline-success"
                            value="Xác nhận đã nhận hàng" />
                        <input type="hidden" name="updatestatus" value="4">
                    </form>
                    <?php
}
        break;
    case '4':
    case '5':
    case '6':
        ?>
                    <form onsubmit="reOrder(<?php echo $_POST['id'] ?>)" id="re-order-form" class="col-6"
                        action="<?php echo './index.php?act=updateorder&id=' . $orderInfo['id']; ?>" method="post">
                        <input type="submit" name="updateorderbtn" class="btn btn-outline-success"
                            value="Đặt lại đơn hàng" />
                        <input type="hidden" name="reorder" value="">
                    </form>
                    <?php
break;
    default:
        # code...
        break;
}
?>

                    <?php

// }
?>

                </div>

            </div>
        </div>

        <div class="col-md-7 border border-dark">
            <h3 class="mb-3 text-center">Danh sách sản phẩm </h3>
            <?php
switch ($orderInfo['trangthai']) {
    case '1':
    case '2':
    case '3':
        $alert_class = 'alert alert-warning';
        break;
    case '4':
        $alert_class = 'alert alert-success';
        break;
    case '5':
    case '6':
        $alert_class = 'alert alert-danger';
        break;
    default:
        # code...
        break;
}
?>
            <p class="<?php echo $alert_class ?>"><?php echo $message ?></p>
            <table class=" table table-hover shadow p-5">
                <!-- <form action="" method="post">
        <input type="text" name="searchhistory" class="form-control" id="" value=""
            placeholder="Tìm kiếm lịch sử theo mã đơn hàng">
    </form> -->
                <thead class="text-dark bg-light p-3">

                    <tr>
                        <th scope="col">id</th>
                        <!-- <th scope="col">id sản phẩm</th>
                        <th scope="col">id đơn hàng</th> -->
                        <!-- <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th> -->
                        <th scope="col">số lượng</th>

                        <th scope="col">đơn giá</th>
                        <th scope="col">tên sp</th>
                        <th scope="col">hình ảnh</th>
                        <?php if ($orderInfo['trangthai'] == 4 && $orderInfo['thanhtoan'] == 1) {echo '<th scope="col">Đánh giá</th>';}
?>

                    </tr>

                </thead>
                <tbody>

                    <?php

if (isset($_SESSION['iduser'])) {
    // <td class="">' . $cart_item['idsanpham'] . '</td>
    // <td class="">' . $cart_item['iddonhang'] . '</td>
    foreach ($cartList as $cart_item) {
        # code...
        // echo "is rated ?" . is_rated_producted($cart_item['idsanpham'], $cart_item['iddonhang'], $_SESSION['iduser']);
        $is_rated = is_rated_producted($cart_item['idsanpham'], $cart_item['iddonhang'], $_SESSION['iduser']);
        if ($is_rated) {
            $row_review = '
            <td>
                <input type="submit" readonly name="reviewproductbtn" class="btn btn-outline-danger"
                value="Đã đánh giá" />
            </td>
            ';
        } else {
            if ($cart_item['trangthai'] == 4) {
                $row_review = '
                <td>
                    <form onsubmit="reviewProduct(this)" id="re-order-form" class="col-6"
                            action="" method="post">
                            <input type="submit"  name="reviewproductbtn" class="btn btn-outline-primary"
                                value="Đánh giá" />
                            <input type="hidden" name="reorder" value="">
                            <input type="hidden" name="idproduct" value="' . $cart_item['idsanpham'] . '">
                            <input type="hidden" name="tensp" value="' . $cart_item['tensp'] . '">
                            <input type="hidden" name="hinhanh" value="' . $cart_item['hinhanh'] . '">
                            <input type="hidden" name="dongia" value="' . $cart_item['dongia'] . '">
                            <input type="hidden" name="iddh" value="' . $cart_item['iddonhang'] . '">
                            <input type="hidden" name="iduser" value="' . $_SESSION['iduser'] . '">
                    </form>
                </td>
                ';
            } else {
                $row_review = "";
            }
        }

        echo '

    <tr class="p-3">
        <td class="" scope="row"> ' . $cart_item['idsanpham'] . '</td>

        <td class="">' . $cart_item['soluong'] . '</td>
        <td class="">' . $cart_item['dongia'] . '</td>
        <td class=""><a href="./index.php?act=detailproduct&id=' . $cart_item['idsanpham'] . '">' . $cart_item['tensp'] . '</a></td>
        <td class=""><img width=100 height=100 style="object-fit: cover;" src="../uploads/' . $cart_item['hinhanh'] . '" alt=""></td>
       ' . $row_review . '
        </tr>
    ';
    }

    ?>
                </tbody>
            </table>
            <!-- <button class="btn btn-info">In hóa đơn</button> -->
        </div>
    </div>
    <?php
}
?>
</div>