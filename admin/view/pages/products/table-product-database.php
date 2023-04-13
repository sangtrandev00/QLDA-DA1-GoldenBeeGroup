<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/connectdb.php";
include $ROOT_URL . "/admin/models/product.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
include $ROOT_URL . "/DAO/order.php";
include "$ROOT_URL/global.php";
?>

<?php
// var_dump($product_list);
$product_list = product_select_all();

if (isset($_POST['cateid']) && $_POST['cateid'] >= 0) {
    $product_list = array_filter($product_list, function ($product_item) {
        return $product_item['ma_danhmuc'] == $_POST['cateid'];
    });
}

if (isset($_POST['datevalue'])) {
    $datevalue = $_POST['datevalue'];

    $product_list = select_products_by_date($datevalue);
}

$result = array();
foreach ($product_list as $product_item) {

    $image_list = explode(",", $product_item['images']);
    $thumbnail = getthumbnail($image_list);
    $price_item = $product_item['don_gia'] * (1 - $product_item['giam_gia'] / 100);
    $sl_ban = count_sold_product_by_id($product_item['masanpham']);
    $is_danger_class = $product_item['ton_kho'] <= 10 ? 'bg-danger' : "bg-success";
    # code...
    $row = array();
    $row[0] = $product_item['masanpham'];
    $row[1] = '
                <a class="d-flex align-items-center gap-2" href="#">
                    <div class="product-box">
                        <img src="' . $thumbnail . '" alt="' . $thumbnail . '">
                    </div>
                    <div>
                        <h6 class="mb-0 product-title">' . $product_item['tensp'] . '</h6>
                    </div>
                </a>
    ';
    $row[2] = $sl_ban;
    $row[3] = '<span>' . number_format($product_item['don_gia']) . ' VND</span>';
    $row[4] = '<span class="badge rounded-pill ' . $is_danger_class . '">' . $product_item['ton_kho'] . '</span>';
    $row[5] = '<span>' . $product_item['ngay_nhap'] . '</span>';
    $row[6] = '
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
    ';

    // var_dump($row);
    $result[] = $row;

}

echo json_encode(
    array(
        "product_list" => $result,
    )
);

?>