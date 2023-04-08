<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/connectdb.php";
include $ROOT_URL . "/admin/models/product.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
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

    $row[2] = '<span>' . number_format($product_item['don_gia']) . ' VND</span>';
    $row[3] = '<span class="badge rounded-pill bg-success">' . $product_item['ton_kho'] . '</span>';
    $row[4] = '<span>' . $product_item['ngay_nhap'] . '</span>';
    $row[5] = '
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
    // echo '
    //                         <tr>
    //                             <td>
    //                                 ' . $product_item['masanpham'] . '
    //                             </td>
    //                             <td class="productlist">
    //                                 <a class="d-flex align-items-center gap-2" href="#">
    //                                     <div class="product-box">
    //                                         <img src="' . $thumbnail . '" alt="' . $thumbnail . '">
    //                                     </div>
    //                                     <div>
    //                                         <h6 class="mb-0 product-title">' . $product_item['tensp'] . '</h6>
    //                                     </div>
    //                                 </a>
    //                             </td>
    //                             <td><span>' . $product_item['don_gia'] . ' VND</span></td>
    //                             <td><span class="badge rounded-pill bg-success">' . $product_item['ton_kho'] . '</span></td>
    //                             <td><span>' . $product_item['ngay_nhap'] . '</span></td>
    //                             <td>
    //                                 <div class="d-flex align-items-center gap-3 fs-6">
    //                                     <a href="javascript:viewDetail(' . $product_item['masanpham'] . ')" class="text-primary"
    //                                         title=""
    //                                         aria-label="Views"><i class="bi bi-eye-fill"></i></a>
    //                                     <a href="javascript:editProduct(' . $product_item['masanpham'] . ')" class="text-warning" data-bs-toggle="tooltip"
    //                                         data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
    //                                         aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
    //                                     <a href="javascript:deleteProduct(this,' . $product_item['masanpham'] . ');" class="text-danger" data-bs-toggle="tooltip"
    //                                         data-bs-placement="bottom" title="" data-bs-original-title="Delete"
    //                                         aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
    //                                 </div>
    //                             </td>
    //                         </tr>
    //                         ';

}

echo json_encode(
    array(
        "product_list" => $result,
    )
);

?>