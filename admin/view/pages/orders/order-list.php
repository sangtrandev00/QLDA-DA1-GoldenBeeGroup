<div class="row">
    <div class="col-12 col-lg-9 d-flex">
        <div class="card w-100">
            <div class="card-header py-3">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6 me-auto">
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                    class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="Tìm kiếm đơn hàng">
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>Status</option>
                            <option>Active</option>
                            <option>Disabled</option>
                            <option>Pending</option>
                            <option>Show All</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>Show 10</option>
                            <option>Show 30</option>
                            <option>Show 50</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="table-order-content" class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
// $order_list =
// Total order

// PHẦN XỬ LÝ PHP
// B1: KET NOI CSDL
$conn = connectdb();

$sql = "SELECT * FROM tbl_order"; // Total Product
$_limit = 8;
$pagination = createDataWithPagination($conn, $sql, $_limit);

// var_dump($pagination);

$order_list = $pagination['datalist'];
// var_dump($productList);
$total_page = $pagination['totalpage'];
$start = $pagination['start'];
$current_page = $pagination['current_page'];
$total_records = $pagination['total_records'];

// $order_list = get_all_orders();
foreach ($order_list as $order) {
    # code...
    echo '
                              <tr>
                                <td>#' . $order['id'] . '</td>
                                <td>' . $order['name'] . '</td>
                                <td>' . $order['tongdonhang'] . '</td>
                                <td><span class="badge rounded-pill alert-success">Đã xác nhận</span></td>
                                <td>' . $order['timeorder'] . '</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="./index.php?act=orderdetail&iddh=' . $order['id'] . '" class="text-primary" data-bs-toggle="tooltip"
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
                              ';
}
?>
                        </tbody>
                    </table>
                </div>
                <nav class="float-end" aria-label="Page navigation">
                    <?php
// HIỂN THỊ PHÂN TRANG
// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $total_page > 1) {
    echo '<a class="page-item btn btn-secondary" href="index.php?act=orderlist&page=' . ($current_page - 1) . '">Trước</a> | ';
}

// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++) {
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page) {
        echo '<span class="page-item btn btn-primary">' . $i . '</span> | ';
    } else {
        echo '<a class="page-item btn btn-light" href="index.php?act=orderlist&page=' . $i . '">' . $i . '</a> | ';
    }
}

// nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
if ($current_page < $total_page && $total_page > 1) {
    echo '<a class="page-item btn btn-secondary" href="index.php?act=orderlist&page=' . ($current_page + 1) . '">Sau</a> | ';
}

?>
                    <!-- <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul> -->
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3 d-flex">
        <div class="card w-100">
            <div class="card-header py-3">
                <h5 class="mb-0">Lọc theo</h5>
            </div>
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Order ID</label>
                        <input type="text" class="form-control" placeholder="ID đơn hàng">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Khách hàng</label>
                        <input type="text" class="form-control" placeholder="Tên khách hàng">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Trạng thái đơn hàng</label>
                        <select class="form-select">
                            <option>Đã xác nhận</option>
                            <option>Đang gửi hàng</option>
                            <option>Đã nhận hàng</option>
                            <option>Chờ thanh toán</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Tổng tiền</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Ngày tạo</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Ngày chỉnh sửa</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn btn-primary">Lọc đơn hàng</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end row-->

</main>
<!--end page main-->