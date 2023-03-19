<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

// include $ROOT_URL . "./admin/models/category.php";
include $ROOT_URL . "./DAO/product.php";
include $ROOT_URL . "./DAO/category.php";
function getthumbnail($image_list)
{

    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            return $thumbnail;
        }
    }

}
?>

<table class="table align-middle table-striped">
    <thead>
        <th>Id</th>
        <th>Hình ảnh/ Tên sản phẩm </th>
        <th>Giá tiền </th>
        <th>Tồn kho </th>
        <th>Ngày nhập </th>
        <th>Hành động </th>
    </thead>
    <tbody>
        <!-- Row Item -->
        <!-- Show list product here -->
        <?php
$product_list = product_select_all();
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