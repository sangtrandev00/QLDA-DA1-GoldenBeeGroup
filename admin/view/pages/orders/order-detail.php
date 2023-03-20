<?php
if (isset($_GET['iddh'])) {
    $iddh = $_GET['iddh'];
    $order_detail_list = getshoworderdetail($iddh);
    $order_info = getorderinfo($iddh);
    // var_dump($orderInfo);
}
?>

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <div class="row g-3 align-items-center">
                <div class="col-12 col-lg-4 col-md-6 me-auto">
                    <h5 class="mb-1">Thời gian đặt: <?php echo $order_info['timeorder'] ?></h5>
                    <p class="mb-0">Order ID : #<?php echo $order_info['id'] ?></p>
                </div>
                <div class="col-12 col-lg-3 col-6 col-md-3">
                    <select class="form-select">
                        <option>Thay đổi trạng thái</option>
                        <option>Chờ thành toán</option>
                        <option>Đã xác nhận</option>
                        <option>Đang gửi hàng</option>
                        <option>Đã gửi hàng thành công</option>
                    </select>
                </div>
                <div class="col-12 col-lg-3 col-6 col-md-3">
                    <button type="button" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> In</button>
                </div>
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
                                    <p class="mb-1"><strong>Shipping</strong> : Red Express</p>
                                    <p class="mb-1"><strong>Pttt</strong> : <?php echo $order_info['pttt'] ?></p>
                                    <p class="mb-1"><strong>Trạng thái</strong> : <?php echo $order_info['trangthai'] ?>
                                    </p>
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

            <div class="row">
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
                                    <h5 class="mb-0">Tóm tắt đơn hàng</h5>
                                </div>
                                <div class="ms-auto">
                                    <button type="button"
                                        class="btn alert-success radius-30 px-4"><?php echo $order_info['trangthai'] ?></button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Tổng phụ</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0"><?php echo $order_info['tongdonhang'] ?></h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Chi phí ship</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">0.00 VND</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Thuế</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">1000000 VND</h5>
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
                                    <p class="mb-0">Giảm giá</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0 text-danger">-3600000 VND </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border shadow-none bg-warning radius-10">
                        <div class="card-body">
                            <h5>Payment info</h5>
                            <div class="d-flex align-items-center gap-3">
                                <div class="fs-1">
                                    <i class="bi bi-credit-card-2-back-fill"></i>
                                </div>
                                <div class="">
                                    <p class="mb-0 fs-6">Master Card **** **** 8956 </p>
                                </div>
                            </div>
                            <p>Business name: Template Market LLP <br>
                                Phone: +91-9910XXXXXX
                            </p>
                        </div>
                    </div>


                </div>
            </div>
            <!--end row-->

        </div>
    </div>

</main>
<!--end page main-->