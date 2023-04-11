<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/category.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
// if (isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $product_item = product_select_by_id($id);
//     $image_list = explode(',', $product_item['images']);
// }
$cate_list = cate_select_all();
?>

<div class="card border shadow-none w-100">
    <div class="card-header">
        <h3>Danh mục chính</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th><input class="form-check-input" type="checkbox"></th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Số sản phẩm</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
foreach ($cate_list as $cate_item) {
    # code...
    echo '
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"></td>
                                                <td>#' . $cate_item['ma_danhmuc'] . '</td>
                                                <td>' . $cate_item['ten_danhmuc'] . '</td>
                                                <td><img width="80" height="100" src="../uploads/' . $cate_item['hinh_anh'] . '"/></td>
                                                <td>' . $cate_item['mo_ta'] . '</td>
                                                <td>' . count_subcate_by_cateid($cate_item['ma_danhmuc']) . '</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a onclick="viewDetail(' . $cate_item['ma_danhmuc'] . ')"  href="./index.php?act=subcatelist&cateid=' . $cate_item['ma_danhmuc'] . '" class=" text-primary"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                            data-bs-original-title="View detail" aria-label="Views"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                        <a onclick="editCate(' . $cate_item['ma_danhmuc'] . ');" href="#" class="text-warning cate-edit-link"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"  title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <a onclick="deleteCate(' . $cate_item['ma_danhmuc'] . ')" href="./index.php?act=deletecate&id=' . $cate_item['ma_danhmuc'] . '" class="text-danger" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title=""
                                                            data-bs-original-title="Delete" aria-label="Delete"><i
                                                                class="bi bi-trash-fill"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            ';
}
?>
                </tbody>
            </table>
        </div>
        <nav class="float-end mt-0" aria-label="Page navigation">
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