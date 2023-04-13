<!--start content-->
<main class="page-content">

    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">

        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Số đơn hàng</p>
                            <h4 class=""><?php echo count_all_orders() ?></h4>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="./index.php?act=orderlist" class="btn btn-outline-dark">Xem</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-30 px-3">
                            <p>Đơn hàng đã giao</p>
                            <h4 class=""><?php echo count_all_orders_success() ?></h4>
                        </div>
                        <div class="w-70">
                            <p>Tổng doanh thu</p>
                            <h4 class="mt-3"><?php echo number_format(sum_all_sales()) ?></h4>
                        </div>

                    </div>
                    <a href="javascript:showOrders(4)" class="btn btn-outline-primary">Xem nhanh</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-30 flex-fill px-3">
                            <p>Đơn hàng đang giao</p>
                            <h4 class=""><?php echo count_all_shipping_orders() ?></h4>
                        </div>
                        <div class="w-70 flex-fill ">
                            <p>Tổng tiền đang giao</p>
                            <h4 class="mt-3">
                                <?php echo number_format(sum_all_money_of_shipping_orders()); ?>
                            </h4>
                        </div>
                    </div>
                    <a href="javascript:showOrders(3)" class="btn btn-outline-primary">Xem nhanh</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-100">
                            <p>Đơn hàng chờ xác nhận</p>
                            <h4 class=""><?php echo count_all_unconfirmed_orders() ?></h4>
                        </div>
                    </div>
                    <a href="javascript:showOrders(1)" class="btn btn-outline-primary">Xem nhanh</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-100">
                            <p>Đơn hàng đã xác nhận</p>
                            <h4 class=""><?php echo count_all_confirmed_orders() ?></h4>
                        </div>
                    </div>
                    <a href="javascript:showOrders(2)" class="btn btn-outline-primary">Xem nhanh</a>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-100">
                            <p>Đơn hàng đã bị hủy</p>
                            <h4 class=""><?php echo count_all_orders_being_destroyed() ?></h4>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="w-100">
                            <p>Hoàn tiền (đơn đã thanh toán )</p>
                            <h4>
                                <?php
echo number_format(sum_money_all_orders_failed_paid());
?>
                            </h4>
                        </div>
                    </div>
                    <a href="javascript:showOrders(6)" class="btn btn-outline-primary">Xem nhanh</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-100">
                            <p>Đơn hàng giao thất bại</p>
                            <h4 class=""><?php echo count_all_orders_failed() ?></h4>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="w-100">
                            <p>Hoàn tiền (đơn đã thanh toán )</p>
                            <h4><?php echo number_format(sum_money_all_failed_orders_paid()) ?></h4>
                        </div>
                    </div>
                    <a href="javascript:showOrders(5)" class="btn btn-outline-primary">Xem nhanh</a>
                </div>
            </div>

        </div>

        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-100">
                            <p>Số lượt xem sp</p>
                            <h4 class=""><?php echo count_all_views() ?></h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-danger">- 3.4% <i class="bi bi-arrow-down"></i></p>
                            <div id="chart2"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">

                        <div class="w-100">
                            <p class="w-100">
                                Gần hết hàng
                            </p>
                            <h4>
                                <?php echo count_all_products_inventory_less_than(10) ?>
                            </h4>
                        </div>

                    </div>
                    <div class="d-flex">
                        <a href="javascript:callAjaxProducts()" class="btn btn-outline-danger">Nhập thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Số khách hàng</p>
                            <h4 class=""><?php echo count_all_customer() ?></h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart4"></div>
                        </div> -->
                    </div>
                    <div class="d-flex">
                        <a href="./index.php?act=userlist" class="btn btn-outline-dark">Xem</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Post -->
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-100">
                            <p>Số lượng bài viết</p>
                            <h4 class=""><?php echo count_all_posts() ?></h4>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="./index.php?act=bloglist" class="btn btn-outline-dark">Xem</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Total Post comments -->
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-100">
                            <p>Bình luận bài viết</p>
                            <h4 class=""><?php echo count_all_comments_posts() ?></h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart4"></div>
                        </div> -->

                    </div>
                    <div class="d-flex">
                        <a href="./index.php?act=binhluanblog" class="btn btn-outline-dark">Xem</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Comment -->
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-100">
                            <p>Bình luận sản phẩm</p>
                            <h4 class=""><?php echo count_all_comments_products(); ?></h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart4"></div>
                        </div> -->
                    </div>
                    <div class="d-flex">
                        <a href="./index.php?act=commentproductlist" class="btn btn-outline-dark">Xem</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Comment -->
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Phản hồi</p>
                            <h4 class=""><?php echo count_all_customer_feedbacks() ?></h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart4"></div>
                        </div> -->
                    </div>
                    <div class="d-flex">
                        <a href="./index.php?act=feedback-list" class="btn btn-outline-dark">Xem</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50 ">
                            <p>Lượt đánh giá sp</p>
                            <h4 class=""><?php echo count_all_reviews_products() ?></h4>
                        </div>
                        <div class="w-50 px-2">
                            <p>Đã trả lời</p>
                            <h4>
                                <?php echo count_all_replied_reviews(); ?>
                            </h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart4"></div>
                        </div> -->
                    </div>
                    <div class="d-flex">
                        <a href="./index.php?act=reviews-product" class="btn btn-outline-dark">Xem</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total phản hồi -->
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 d-flex">
            <div class="card rounded-4 w-100">
                <div class="card-header bg-transparent border-0">
                    <div class="row g-3 align-items-center">
                        <div class="col-10">
                            <h6 class="mb-0">Top Sold (Sản phẩm bán chạy )</h6>
                        </div>
                        <div class="col-2">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                <div class="dropdown">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="best-product p-2 mb-3">
                        <?php
$top_sold_products = select_top_sold_products();

// var_dump($top_sold_products);

foreach ($top_sold_products as $product) {
    # code...
    echo '
        <div class="best-product-item">
            <div class="d-flex align-items-center gap-3">
                <div class="product-box border">
                    <img src="../uploads/' . $product['hinhanh'] . '" alt="' . $product['ten_sp'] . '">
                </div>
                <div class="product-info flex-grow-1">
                    <div class="progress-wrapper">
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;">
                            </div>
                        </div>
                    </div>
                    <p class="product-name mb-0 mt-2 fs-6">' . $product['ten_sp'] . ' <span
                            class="float-end">' . $product['sl_ban'] . ' đã bán</span></p>
                </div>
            </div>
        </div>
    ';
}
?>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 420px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 315px;"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex">
            <div class="card rounded-4 w-100">
                <div class="card-header bg-transparent border-0">
                    <div class="row g-3 align-items-center">
                        <div class="col-10">
                            <h6 class="mb-0">Top Views (Sản phẩm được xem nhiều nhất )</h6>
                        </div>
                        <div class="col-2">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                <div class="dropdown">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="best-product p-2 mb-3 ps ps--active-y">
                        <?php
$top_views_products = select_top_view_products();

// var_dump($top_sold_products);

foreach ($top_views_products as $product) {
    # code...
    $image_list = explode(',', $product['images']);
    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }
    echo '
        <div class="best-product-item">
            <div class="d-flex align-items-center gap-3">
                <div class="product-box border">
                    <img src="../uploads/' . $thumbnail . '" alt="' . $product['tensp'] . '">
                </div>
                <div class="product-info flex-grow-1">
                    <div class="progress-wrapper">
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;">
                            </div>
                        </div>
                    </div>
                    <p class="product-name mb-0 mt-2 fs-6">' . $product['tensp'] . ' <span
                            class="float-end">' . $product['so_luot_xem'] . ' đã xem</span></p>
                </div>
            </div>
        </div>
    ';
}
?>

                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 420px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 253px;"></div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-12 col-lg-6 d-flex">
            <div class="card rounded-4 w-100 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Orders</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="chartTotalOrders"></div>
                    <div
                        class="d-flex align-items-center gap-5 justify-content-center mt-0 p-2 bg-light radius-10 border">
                        <div class="text-center">
                            <h2 class="mb-2 text-info">9.32m</h2>
                            <p class="mb-0">Total <br> Orders</p>
                        </div>
                        <div class="border-end sepration"></div>
                        <div class="text-center">
                            <h2 class="mb-2">2.56</h2>
                            <p class="mb-0">AVG per <br> Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        </div>
        <!--end row-->
        <div class="row">
            <!-- Top khách hàng mua hàng nhiều nhất -->
            <div class="col-12 col-lg-6 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-header bg-transparent border-0">
                        <div class="row g-3 align-items-center">
                            <div class="col-10">
                                <h6 class="mb-0">VIP members (Mua hàng nhiều nhất )</h6>
                            </div>
                            <div class="col-2">
                                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="best-users p-2 mb-3 ps ps-active-y">
                            <div class="table-responsive">
                                <table class="table table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên/Hình ảnh</th>
                                            <th scope="col">Tổng tiền đã mua</th>
                                            <th scope="col">Tổng đơn hàng đã mua</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $vip_members = top_users_bought_products();?>
                                        <?php foreach ($vip_members as $member): ?>
                                        <tr class="">
                                            <td scope="row">
                                                <div class="user-box border">
                                                    <img style="width: 100px; height: 100px; object-fit: cover;"
                                                        src="../uploads/<?php echo $member['hinh_anh'] ?>"
                                                        alt="<?php echo $member['name'] ?>">
                                                    <p class="user-name mb-0 mt-2 fs-6"><?php echo $member['name'] ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td><?php echo $member['tongtienmuahang'] ?></td>
                                            <td><?php echo $member['sodonhang'] ?></td>
                                        </tr>

                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="best-user-item">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-box border">
                                        <img style="width: 100px; height: 100px;"
                                            src="../uploads/<?php echo $member['hinh_anh'] ?>"
                                            alt="<?php echo $member['name'] ?>">
                                        <p class="user-name mb-0 mt-2 fs-6"><?php echo $member['name'] ?></p>
                                    </div>
                                    <div class="user-info flex-grow-1">
                                        <p class="user-name mb-0 mt-2 fs-6"><?php echo $member['tongtienmuahang'] ?>
                                            <span class="float-end"><?php echo $member['sodonhang'] ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div> -->



                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 420px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 253px;"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-header bg-transparent border-0">
                        <div class="row g-3 align-items-center">
                            <div class="col-10">
                                <h6 class="mb-0">BOM members (BOM hàng nhiều nhất)</h6>
                            </div>
                            <div class="col-2">
                                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="best-users p-2 mb-3 ps ps-active-y">
                            <div class="table-responsive">
                                <table class="table table-danger">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên/Hình ảnh</th>
                                            <th scope="col">Giao hàng thất bại</th>
                                            <!-- <th scope="col">Tổng đơn hàng đã mua</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $bom_members = top_bom_users_bought_products();?>
                                        <?php foreach ($bom_members as $member): ?>
                                        <tr class="">
                                            <td scope="row">
                                                <div class="user-box border">
                                                    <img style="width: 100px; height: 100px; object-fit: cover;"
                                                        src="../uploads/<?php echo $member['hinh_anh'] ?>"
                                                        alt="<?php echo $member['name'] ?>">
                                                    <p class="user-name mb-0 mt-2 fs-6"><?php echo $member['name'] ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td><?php echo $member['so_lan_bom_hang'] ?></td>
                                        </tr>

                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="best-user-item">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-box border">
                                        <img style="width: 100px; height: 100px;"
                                            src="../uploads/<?php echo $member['hinh_anh'] ?>"
                                            alt="<?php echo $member['name'] ?>">
                                        <p class="user-name mb-0 mt-2 fs-6"><?php echo $member['name'] ?></p>
                                    </div>
                                    <div class="user-info flex-grow-1">
                                        <p class="user-name mb-0 mt-2 fs-6"><?php echo $member['tongtienmuahang'] ?>
                                            <span class="float-end"><?php echo $member['sodonhang'] ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div> -->



                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 420px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 253px;"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--end row-->

        <div class="row">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Doanh thu theo tháng (Năm <span class="report-year-selected">2023</span> )
                            </h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item change-year-sale-report" data-year="2022"
                                            href="javascript:changeYearSaleReport()">Năm
                                            2022</a></li>
                                    <li><a class="dropdown-item change-year-sale-report" data-year="2023"
                                            href="javascript:changeYearSaleReport()">Năm
                                            2023</a></li>
                                    <li><a class="dropdown-item change-year-sale-report" data-year="2024"
                                            href="javascript:changeYearSaleReport()">Năm
                                            2024</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="reportSaleByMonths"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <!-- <h6 class="mb-0 text-uppercase">Doanh thu theo tuần (Năm 2023 )</h6>
        <hr /> -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h6 class="mb-0">Doanh thu theo tuần (Năm <span class="report-year-selected">2023</span> )
                    </h6>
                    <div class="fs-5 ms-auto dropdown">
                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                                class="bi bi-three-dots"></i></div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item change-year-sale-report" data-year="2022" href="#">Năm
                                    2022</a></li>
                            <li><a class="dropdown-item change-year-sale-report" data-year="2023" href="#">Năm
                                    2023</a></li>
                            <li><a class="dropdown-item change-year-sale-report" data-year="2024" href="#">Năm
                                    2024</a></li>
                        </ul>
                    </div>
                </div>
                <div id="totalOrderByWeeks"></div>
            </div>
        </div>

        <!-- <h6 class="mb-0 text-uppercase">Doanh thu theo ngày (Tháng 3/ Năm 2023 )</h6>
        <hr /> -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h6 class="mb-0">Doanh thu theo ngày (Tháng <span class="report-month-selected">3</span>/Năm <span
                            class="report-year-selected">2023</span> )
                    </h6>
                    <div class="fs-5 ms-auto dropdown">
                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                                class="bi bi-three-dots"></i></div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item change-month-sale-selected" data-month="1" href="#">Tháng
                                    1</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="2" href="#">Tháng
                                    2</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="3" href="#">Tháng
                                    3</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="4" href="#">Tháng
                                    4</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="5" href="#">Tháng
                                    5</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="6" href="#">Tháng
                                    6</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="7" href="#">Tháng
                                    7</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="8" href="#">Tháng
                                    8</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="9" href="#">Tháng
                                    9</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="10" href="#">Tháng
                                    10</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="11" href="#">Tháng
                                    11</a></li>
                            <li><a class="dropdown-item change-month-sale-selected" data-month="12" href="#">Tháng
                                    12</a></li>
                        </ul>
                    </div>
                </div>
                <div id="totalOrderByDays"></div>
            </div>
        </div>

        <h6 class="mb-0 text-uppercase">Thống kê sản phẩm theo danh mục</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div id="productsByCatePieChart"></div>
            </div>
        </div>

        <!--end row-->
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Danh mục</th>
                                        <th>SL sản phẩm</th>
                                        <th>Giá cao nhất</th>
                                        <th>Giá thấp nhất</th>
                                        <th>Giá trung bình</th>
                                        <!-- <th>Hành động</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$sum_sl = 0;
$report_products_by_cates = report_products_by_cates();
?>
                                    <?php foreach ($report_products_by_cates as $item): ?>
                                    <?php $sum_sl += $item['so_luong']?>
                                    <tr>
                                        <td>#<?php echo $item['madm'] ?></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box border">
                                                    <img src="../uploads/<?php echo $item['hinh_anh'] ?>"
                                                        alt="<?php echo $item['tendm'] ?>">
                                                </div>
                                                <div class="product-info">
                                                    <a href=""
                                                        class="product-name mb-1"><?php echo $item['tendm'] ?></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $item['so_luong'] ?></td>
                                        <td><?php echo $item['max'] ?></td>
                                        <td><?php echo $item['min'] ?></td>
                                        <td><?php echo $item['avg'] ?></td>
                                        <!-- <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                            </div>
                                        </td> -->
                                    </tr>
                                    <?php endforeach;?>
                                    <tr>Tổng số lượng sp: <?php echo $sum_sl ?></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Đơn hàng gần đây</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table id="table-recent-order" class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Pttt</th>
                                        <th>Ngày đặt</th>
                                        <th>SL</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#89742</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box border">
                                                    <img src="assets/images/products/11.png" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">Smart Mobile Phone</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2</td>
                                        <td>$214</td>
                                        <td>Apr 8, 2021</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#68570</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box border">
                                                    <img src="assets/images/products/07.png" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">Sports Time Watch</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td>$185</td>
                                        <td>Apr 9, 2021</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#38567</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box border">
                                                    <img src="assets/images/products/17.png" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">Women Red Heals</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>3</td>
                                        <td>$356</td>
                                        <td>Apr 10, 2021</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#48572</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box border">
                                                    <img src="assets/images/products/04.png" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">Yellow Winter Jacket</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td>$149</td>
                                        <td>Apr 11, 2021</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#96857</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box border">
                                                    <img src="assets/images/products/10.png" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">Orange Micro Headphone</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2</td>
                                        <td>$199</td>
                                        <td>Apr 15, 2021</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#96857</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box border">
                                                    <img src="assets/images/products/12.png" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">Pro Samsung Laptop</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td>$699</td>
                                        <td>Apr 18, 2021</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12 col-lg-12 col-xl-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Sales By Country</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="geographic-map" class="mt-2"></div>
                    <div class="traffic-widget">
                        <div class="progress-wrapper mb-3">
                            <p class="mb-1">United States <span class="float-end">$2.5K</span></p>
                            <div class="progress rounded-0" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;"></div>
                            </div>
                        </div>
                        <div class="progress-wrapper mb-3">
                            <p class="mb-1">Russia <span class="float-end">$4.5K</span></p>
                            <div class="progress rounded-0" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%;"></div>
                            </div>
                        </div>
                        <div class="progress-wrapper mb-0">
                            <p class="mb-1">Australia <span class="float-end">$8.5K</span></p>
                            <div class="progress rounded-0" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
        </div>
        <!--end row-->

</main>
<!--end page main-->