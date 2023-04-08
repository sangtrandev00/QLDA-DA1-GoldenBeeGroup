<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/connectdb.php";
include $ROOT_URL . "/admin/models/product.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
include "$ROOT_URL/global.php";
?>

<table id="table-product" class="table align-middle table-striped">
    <thead>
        <th>Id</th>
        <th>Hình ảnh/ Tên sản phẩm </th>
        <th>SL bán</th>
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
if (isset($_POST['cateid'])) {
    $cateid = $_POST['cateid'];
    if ($cateid >= 0) {
        $sql = "SELECT * FROM tbl_sanpham WHERE ma_danhmuc = '$cateid'";
    } else {
        $sql = "SELECT * FROM tbl_sanpham";
    }
}

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
    $thumbnail = getthumbnail($image_list);
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
                                <td><span>' . $product_item['don_gia'] . ' VND</span></td>
                                <td><span class="badge rounded-pill bg-success">' . $product_item['ton_kho'] . '</span></td>
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