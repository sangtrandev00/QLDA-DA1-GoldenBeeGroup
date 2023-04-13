<?php
if (isset($_GET['iddh'])) {
    $iddh = $_GET['iddh'];
    $order_detail_list = getshoworderdetail($iddh);
    $order_info = getorderinfo($iddh);
    // var_dump($orderInfo);
    $trangthai = showStatus($order_info['trangthai'])[0];
    $message = showStatus($order_info['trangthai'])[1];

    switch ($order_info['thanhtoan']) {
        case '0':
            $thanhtoan = "Chưa thanh toán";
            break;
        case '1':
            $thanhtoan = "Đã thanh toán";
            break;
        default:
            # code...
            break;
    }
}
?>


<div class="card">
    <div class="card-header py-3">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-lg-3 col-md-6 me-auto">
                <h5 class="mb-1">Thời gian đặt: <?php echo $order_info['timeorder'] ?></h5>
                <p class="mb-0">Order ID : #<?php echo $order_info['id'] ?></p>
            </div>
            <div class="col-12 col-lg-3 col-md-6">
                <!-- <select id="select-payment" class="form-select">
                    <option value="-1">Trạng thái thanh toán</option>
                    <option <?php ?> value="2">Xác nhận đã thanh toán
                    </option>
                </select> -->
            </div>
            <div class="col-12 col-lg-3 col-6 col-md-3 hide-on-print">
                <?php
switch ($order_info['trangthai']) {
    case "1":
        ?>
                <select id="select-status" class="form-select">
                    <option value="-1">Thay đổi trạng thái đơn hàng</option>
                    <option <?php ?> value="2">Xác nhận đơn hàng
                    </option>
                </select>

                <?php
break;
    case "2":
        ?>
                <select id="select-status" class="form-select">
                    <option value="-1">Thay đổi trạng thái đơn hàng</option>
                    <option <?php ?> value="3">Đang gửi hàng
                    </option>
                </select>
                <?php
break;
    case "3":
        ?>
                <select id="select-status" class="form-select">
                    <option value="-1">Thay đổi trạng thái đơn hàng</option>
                    <option <?php ?> value="4">Đã gửi hàng thành
                        công</option>
                    <option <?php ?> value="5">Giao hàng thất bại
                    </option>
                    <option <?php ?> value="6">Đã hủy hàng
                    </option>
                </select>
                <?php
break;
    case "4":
        ?>

                <?php
case "5":
        ?>

                <?php
case "6":
        ?>
                <select disabled="true" class="form-select">
                    <option <?php if ($order_info['trangthai'] == 4) {echo 'selected';}?> value="4">Giao hàng thành công
                    </option>
                    <option <?php if ($order_info['trangthai'] == 5) {echo 'selected';}?> value="5">Giao hàng thất bại
                    </option>
                    <option <?php if ($order_info['trangthai'] == 6) {echo 'selected';}?> value="6">Đơn hàng đã bị hủy
                    </option>
                </select>
                <?php
break;
    default;
}
?>

            </div>
            <div class="col-12 col-lg-3 col-6 col-md-3 hide-on-print">
                <button type="button" class="btn btn-primary"
                    onclick="changeStatus(<?php echo $_GET['iddh'] ?>)">Lưu</button>
                <a href="javascript:window.print()" type="button" class="btn btn-secondary"><i
                        class="bi bi-printer-fill"></i> In</a>
            </div>
            <?php if (isset($order_info['trangthai']) && $order_info['trangthai'] == 6): ?>
            <p class="fw-bold fs-5">Lý do hủy đơn hàng: <?php echo $order_info['reason_destroy'] ?></p>
            <?php endif?>
        </div>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
            <div class="col">
                <div class="card border shadow-none radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box bg-light-primary border-0">
                                <i class="bi bi-person text-primary"></i>
                            </div>
                            <div class="info">
                                <h6 class="mb-2">Khách hàng</h6>
                                <p class="mb-1"><?php echo $order_info['name'] ?> </p>
                                <p class="mb-1"><?php echo $order_info['email'] ?></p>
                                <p class="mb-1"><?php echo $order_info['dienThoai'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border shadow-none radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box bg-light-success border-0">
                                <i class="bi bi-truck text-success"></i>
                            </div>
                            <div class="info">
                                <h6 class="mb-2">Thông tin gửi hàng</h6>
                                <p class="mb-1"><strong>Shipping</strong> : GHN</p>
                                <p class="mb-1"><strong>Pttt</strong> : <?php echo $order_info['pttt'] ?></p>
                                <p class="mb-1"><strong>Trạng thái</strong> : <?php echo $message ?></p>
                                <p class="mb-1"><strong>Trạng thái thanh toán</strong> :
                                    <?php echo $thanhtoan ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border shadow-none radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box bg-light-danger border-0">
                                <i class="bi bi-geo-alt text-danger"></i>
                            </div>
                            <div class="info">
                                <h6 class="mb-2">Gửi đến</h6>
                                <!-- <p class="mb-1"><strong>City</strong> : Sydney, Australia</p> -->
                                <p class="mb-1"><strong>Địa chỉ</strong> <?php echo $order_info['address'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="row order-detail__products">
            <div class="col-12 col-lg-8">
                <div class="card border shadow-none radius-10">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Đơn vị tiền</th>
                                        <th>Số lượng</th>
                                        <th>Tổng (VND)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
$total_item = 0;
foreach ($order_detail_list as $order_detail) {
    # code...
    $sum_item = $order_detail['dongia'] * $order_detail['soluong'];
    echo '
                                            <tr>
                                                <td>
                                                    <div class="orderlist">
                                                        <a class="d-flex align-items-center gap-2" href="javascript:;">
                                                            <div class="product-box">
                                                                <img src="../uploads/' . $order_detail['hinhanh'] . '" alt="">
                                                            </div>
                                                            <div>
                                                                <P class="mb-0 product-title">' . $order_detail['tensp'] . '</P>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>' . $order_detail['dongia'] . ' </td>
                                                <td>' . $order_detail['soluong'] . '</td>
                                                <td>' . number_format($sum_item) . '</td>
                                            </tr>
                                            ';
}
?>
                                    <!-- <tr>
                                            <td>
                                                <div class="orderlist">
                                                    <a class="d-flex align-items-center gap-2" href="javascript:;">
                                                        <div class="product-box">
                                                            <img src="assets/images/products/01.png" alt="">
                                                        </div>
                                                        <div>
                                                            <P class="mb-0 product-title">Men White Polo T-shirt</P>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>$35.00</td>
                                            <td>2</td>
                                            <td>$70.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="orderlist">
                                                    <a class="d-flex align-items-center gap-2" href="javascript:;">
                                                        <div class="product-box">
                                                            <img src="assets/images/products/02.png" alt="">
                                                        </div>
                                                        <div>
                                                            <P class="mb-0 product-title">Formal Black Coat Pant</P>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>$25.00</td>
                                            <td>1</td>
                                            <td>$25.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="orderlist">
                                                    <a class="d-flex align-items-center gap-2" href="javascript:;">
                                                        <div class="product-box">
                                                            <img src="assets/images/products/03.png" alt="">
                                                        </div>
                                                        <div>
                                                            <P class="mb-0 product-title">Blue Shade Jeans</P>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>$65.00</td>
                                            <td>2</td>
                                            <td>$130.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="orderlist">
                                                    <a class="d-flex align-items-center gap-2" href="javascript:;">
                                                        <div class="product-box">
                                                            <img src="assets/images/products/04.png" alt="">
                                                        </div>
                                                        <div>
                                                            <P class="mb-0 product-title">Yellow Winter Jacket for Men
                                                            </P>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>$56.00</td>
                                            <td>1</td>
                                            <td>$56.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="orderlist">
                                                    <a class="d-flex align-items-center gap-2" href="javascript:;">
                                                        <div class="product-box">
                                                            <img src="assets/images/products/05.png" alt="">
                                                        </div>
                                                        <div>
                                                            <P class="mb-0 product-title">Men Sports Shoes Nike</P>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>$85.00</td>
                                            <td>1</td>
                                            <td>$85.00</td>
                                        </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card border shadow-none bg-light radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="mb-0">Tóm tắt </h5>
                            </div>
                            <div class="ms-auto">
                                <button type="button"
                                    class="btn alert-success radius-30 px-4"><?php echo $trangthai ?></button>
                            </div>
                        </div>
                        <!-- <div class="d-flex align-items-center mb-3">
                            <div>
                                <p class="mb-0">Giảm giá</p>
                            </div>
                            <div class="ms-auto">
                                <h5 class="mb-0">0 VND</h5>
                            </div>
                        </div> -->
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <p class="mb-0">Chi phí ship</p>
                            </div>
                            <div class="ms-auto">
                                <h5 class="mb-0"><?php echo number_format($order_info['shipping_fee']) ?> VND</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <p class="mb-0">Thuế</p>
                            </div>
                            <div class="ms-auto">
                                <h5 class="mb-0"><?php echo number_format($order_info['vat_fee']) ?> VND</h5>
                            </div>
                        </div>
                        <!-- <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Payment Fee</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">$14.00</h5>
                                </div>
                            </div> -->
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <p class="mb-0">Tổng</p>
                            </div>
                            <div class="ms-auto">
                                <h5 class="mb-0 text-danger"><?php echo number_format($order_info['tongdonhang']) ?> VND
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($order_info['pttt'] == "Thanh toán VNpay"): ?>
                <div class="card border shadow-none bg-warning radius-10">
                    <div class="card-body">
                        <h5>Thông tin thanh toán</h5>
                        <div class="d-flex align-items-center gap-3">
                            <div class="fs-1">
                                <i class="bi bi-credit-card-2-back-fill"></i>
                            </div>
                            <div class="">
                                <p class="mb-0 fs-6">ATM Card 9704198526191432198 </p>
                            </div>
                        </div>
                        <p>Tên chủ thẻ: Nguyen Van A <br>
                            Ngân hàng: NCB
                        </p>
                    </div>
                </div>
                <?php endif;?>


            </div>
        </div>
        <!--end row-->

    </div>
</div>

</main>
<!--end page main-->