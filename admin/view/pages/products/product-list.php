<div class="card">
    <div class="card-header py-3">
        <div class="row align-items-center m-0">
            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select onchange="filterByCate(this);" onfocus="this.selectedIndex = -1;" class="form-select">
                    <option value="-1">Tất cả danh mục</option>
                    <?php

$cate_list = cate_select_all();

foreach ($cate_list as $cate_item) {
    # code...
    echo '
                                <option value="' . $cate_item['ma_danhmuc'] . '"><a href="./index.php?act=">' . $cate_item['ten_danhmuc'] . '</a></option>
                            ';
}

?>

                    <!-- <option>Fashion</option>
                    <option>Electronics</option>
                    <option>Furniture</option>
                    <option>Sports</option> -->
                </select>
            </div>
            <div class="col-md-2 col-6">
                <input type="date" onchange="filterByDate(this)" class="form-control">
            </div>
            <!-- <div class="col-md-2 col-6">
                <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div> -->
        </div>
    </div>
    <div class="card-body">

        <div id="table-product-content" class="table-responsive">
            <table id="table-product" class="table align-middle table-striped">
                <thead>
                    <th>Id</th>
                    <th>Hình ảnh/ Tên sản phẩm </th>
                    <th>SL bán </th>
                    <th>Giá tiền </th>
                    <th>Tồn kho </th>
                    <th>Ngày nhập </th>
                    <th>Hành động </th>
                </thead>
                <tbody>
                    <!-- Row Item -->
                    <!-- Show list product here -->
                    <?php
// PHẦN XỬ LÝ PHP
// B1: KET NOI CSDL
$conn = connectdb();

$sql = "SELECT * FROM tbl_sanpham"; // Total Product
$_limit = 8;
$pagination = createDataWithPagination($conn, $sql, $_limit);
$product_list = $pagination['datalist'];
// var_dump($productList);
$total_page = $pagination['totalpage'];
$start = $pagination['start'];
$current_page = $pagination['current_page'];
$total_records = $pagination['total_records'];

// $product_list = product_select_all();

// var_dump($product_list);
foreach ($product_list as $product_item) {

    $image_list = explode(",", $product_item['images']);

    $price_item = $product_item['don_gia'] * (1 - $product_item['giam_gia'] / 100);
    $thumbnail = getthumbnail($image_list);
    $is_danger_class = $product_item['ton_kho'] <= 10 ? 'bg-danger' : "bg-success";
    # code...
    echo '
                            <tr>
                                <td>
                                    ' . $product_item['masanpham'] . '
                                </td>
                                <td class="productlist">
                                    <a class="d-flex align-items-center gap-2" href="#">
                                        <div class="product-box">
                                            <img src="' . $thumbnail . '" alt="' . $thumbnail . '">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 product-title">' . $product_item['tensp'] . '</h6>
                                        </div>
                                    </a>
                                </td>
                                <td>2</td>
                                <td><span>' . $product_item['don_gia'] . ' VND</span></td>
                                <td><span class="badge rounded-pill ' . $is_danger_class . '">' . $product_item['ton_kho'] . '</span></td>
                                <td><span>' . $product_item['ngay_nhap'] . '</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="javascript:viewDetail(' . $product_item['masanpham'] . ')" class="text-primary"
                                            title=""
                                            aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        <a href="javascript:editProduct(' . $product_item['masanpham'] . ')" class="text-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                            aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:deleteProduct(this,' . $product_item['masanpham'] . ');" class="text-danger" data-bs-toggle="tooltip"
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
            <nav class="float-end mt-4" aria-label="Page navigation">
                <?php
// HIỂN THỊ PHÂN TRANG
// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
// if ($current_page > 1 && $total_page > 1) {
//     echo '<a class="page-item btn btn-secondary" href="index.php?act=productlist&page=' . ($current_page - 1) . '">Trước</a> | ';
// }

// // Lặp khoảng giữa
// for ($i = 1; $i <= $total_page; $i++) {
//     // Nếu là trang hiện tại thì hiển thị thẻ span
//     // ngược lại hiển thị thẻ a
//     if ($i == $current_page) {
//         echo '<span class="page-item btn btn-primary">' . $i . '</span> | ';
//     } else {
//         echo '<a class="page-item btn btn-light" href="index.php?act=productlist&page=' . $i . '">' . $i . '</a> | ';
//     }
// }

// // nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
// if ($current_page < $total_page && $total_page > 1) {
//     echo '<a class="page-item btn btn-secondary" href="index.php?act=productlist&page=' . ($current_page + 1) . '">Sau</a> | ';
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
</main>
<!--end page main-->

<!-- Toggle Modal here -->