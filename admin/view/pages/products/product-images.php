<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/category.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
// var_dump($_POST);
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $product_item = product_select_by_id($id);
    $image_list = explode(',', $product_item['images']);
}
?>

<div class="image-list row">
    <h5>Danh sách hình ảnh hiện tại</h5>
    <div id="carouselImageControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
$i = 0;
foreach ($image_list as $image) {
    # code...
    $is_active = $i == 0 ? "active" : "";
    echo '
    <div class="carousel-item ' . $is_active . '">
        <img style="object-fit: cover" src="../uploads/' . $image . '" class="d-block w-100" alt="' . $image . '">
    </div>
        ';
    $i++;
    if ($i == count($image_list)) {
        $i = 0;
    }
}
?>
            <!-- <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImageControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselImageControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- <div class="col-md-4"><img height="100" class="w-100"
            src="../uploads/41669_laptop_lenovo_thinkpad_x1_yoga_gen_6_20xy00e0vn__6_.jpg" alt=""></div>
    <div class="col-md-4"><img height="100" class="w-100"
            src="../uploads/41669_laptop_lenovo_thinkpad_x1_yoga_gen_6_20xy00e0vn__6_.jpg" alt=""></div>
    <div class="col-md-4"><img height="100" class="w-100"
            src="../uploads/41669_laptop_lenovo_thinkpad_x1_yoga_gen_6_20xy00e0vn__6_.jpg" alt=""></div>
    <div class="col-md-4"><img height="100" class="w-100"
            src="../uploads/41669_laptop_lenovo_thinkpad_x1_yoga_gen_6_20xy00e0vn__6_.jpg" alt=""></div>
    <div class="col-md-4"><img height="100" class="w-100"
            src="../uploads/41669_laptop_lenovo_thinkpad_x1_yoga_gen_6_20xy00e0vn__6_.jpg" alt=""></div>
    <div class="col-md-4"><img height="100" class="w-100"
            src="../uploads/41669_laptop_lenovo_thinkpad_x1_yoga_gen_6_20xy00e0vn__6_.jpg" alt=""></div>
    <div class="col-md-4"><img height="100" class="w-100"
            src="../uploads/41669_laptop_lenovo_thinkpad_x1_yoga_gen_6_20xy00e0vn__6_.jpg" alt=""></div> -->
</div>