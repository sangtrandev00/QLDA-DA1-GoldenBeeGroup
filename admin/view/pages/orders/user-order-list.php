<div class="row">
    <div class="col-12 col-lg-12 d-flex">
        <div class="card w-100">
            <div class="card-body">
                <div id="table-order-content" class="table-responsive">
                    <table id="table-user-orders" class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>IDDH</th>
                                <th>Tên khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Pttt</th>
                                <th>Ngày đặt</th>
                                <th>SL</th>
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
    $trangthai = showStatus($order['trangthai'])[0];
    echo '
                              <tr>
                                <td>#' . $order['id'] . '</td>
                                <td>' . $order['name'] . '</td>
                                <td>' . $order['tongdonhang'] . '</td>
                                <td><span class="">' . $trangthai . '</span></td>
                                <td>' . $order['timeorder'] . '</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="./index.php?act=orderdetail&iddh=' . $order['id'] . '" class="text-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                            aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                            aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:deleteOrder(' . $order['id'] . ')" class="text-danger"  title=""
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
// // HIỂN THỊ PHÂN TRANG
// // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
// if ($current_page > 1 && $total_page > 1) {
//     echo '<a class="page-item btn btn-secondary" href="index.php?act=orderlist&page=' . ($current_page - 1) . '">Trước</a> | ';
// }

// // Lặp khoảng giữa
// for ($i = 1; $i <= $total_page; $i++) {
//     // Nếu là trang hiện tại thì hiển thị thẻ span
//     // ngược lại hiển thị thẻ a
//     if ($i == $current_page) {
//         echo '<span class="page-item btn btn-primary">' . $i . '</span> | ';
//     } else {
//         echo '<a class="page-item btn btn-light" href="index.php?act=orderlist&page=' . $i . '">' . $i . '</a> | ';
//     }
// }

// // nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
// if ($current_page < $total_page && $total_page > 1) {
//     echo '<a class="page-item btn btn-secondary" href="index.php?act=orderlist&page=' . ($current_page + 1) . '">Sau</a> | ';
// }

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

</div>
<!--end row-->

</main>
<!--end page main-->