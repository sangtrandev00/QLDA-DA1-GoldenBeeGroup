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
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 16% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart1"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Số lượt xem</p>
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
                            <p>Tổng doanh thu</p>
                            <h4 class=""><?php echo number_format(sum_all_sales()) ?> VND</h4>
                        </div>
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
                            <h4 class="">30</h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart4"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Post -->
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Số lượng bài viết</p>
                            <h4 class=""><?php echo count_all_posts() ?></h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart4"></div>
                        </div> -->
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
                            <h4 class="">0</h4>
                        </div>
                        <!-- <div class="w-50">
                            <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                            <div id="chart4"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Total phản hồi -->
        <!-- <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Số người dùng</p>
                            <h4 class="">25.8K</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 d-flex">
            <div class="card rounded-4 w-100">
                <div class="card-header bg-transparent border-0">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h6 class="mb-0">Top Sold (Sản phẩm bán chạy )</h6>
                        </div>
                        <div class="col">
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

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex">
            <div class="card rounded-4 w-100">
                <div class="card-header bg-transparent border-0">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h6 class="mb-0">Top Views (Sản phẩm được xem nhiều nhất )</h6>
                        </div>
                        <div class="col">
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
                    <div class="best-product p-2 mb-3 ps ps-active-y">
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


    <!--end row-->

    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Doanh thu theo tháng (Năm 2023 )</h6>
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
                    <div id="reportSaleByMonths"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <h6 class="mb-0 text-uppercase">Doanh thu theo tuần (Năm 2023 )</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div id="totalOrderByWeeks"></div>
        </div>
    </div>

    <h6 class="mb-0 text-uppercase">Doanh thu theo ngày (Tháng 3/ Năm 2023 )</h6>
    <hr />
    <div class="card">
        <div class="card-body">
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

    <!-- <div class="row">
        <div class="col-12 col-lg-6 col-xl-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Traffic Source</h6>
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
                    <div id="chart7" class=""></div>
                    <div class="traffic-widget">
                        <div class="progress-wrapper mb-3">
                            <p class="mb-1">Social <span class="float-end">8,475</span></p>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;"></div>
                            </div>
                        </div>
                        <div class="progress-wrapper mb-3">
                            <p class="mb-1">Direct <span class="float-end">7,989</span></p>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%;"></div>
                            </div>
                        </div>
                        <div class="progress-wrapper mb-0">
                            <p class="mb-1">Search <span class="float-end">6,359</span></p>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="card radius-10 border shadow-none mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">Messages</p>
                                    <h4 class="mb-0 text-primary">289</h4>
                                </div>
                                <div class="dropdown ms-auto">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                    </div>
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
                            <div id="chart8"></div>
                        </div>
                    </div>
                    <div class="card radius-10 border shadow-none mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">Total Posts</p>
                                    <h4 class="mb-0 text-primary">489</h4>
                                </div>
                                <div class="dropdown ms-auto">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                    </div>
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
                            <div id="chart9"></div>
                        </div>
                    </div>
                    <div class="card radius-10 border shadow-none mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">New Tasks</p>
                                    <h4 class="mb-0 text-primary">149</h4>
                                </div>
                                <div class="dropdown ms-auto">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                    </div>
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
                            <div id="chart10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Visitors</h6>
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
                    <div id="chart11" class=""></div>
                    <div class="d-flex align-items-center gap-5 justify-content-center mt-3 p-2 radius-10 border">
                        <div class="text-center">
                            <h3 class="mb-2 text-primary">8,546</h3>
                            <p class="mb-0">New Visitors</p>
                        </div>
                        <div class="border-end sepration"></div>
                        <div class="text-center">
                            <h3 class="mb-2 text-primary-2">3,723</h3>
                            <p class="mb-0">Old Visitors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!--end row-->

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
                                                data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                                aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                                aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
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
                                                data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                                aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                                aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
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
                                                data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                                aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                                aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
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
                                                data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                                aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                                aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
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
                                                data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                                aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                                aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
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
                                                data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                                aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                                aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
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