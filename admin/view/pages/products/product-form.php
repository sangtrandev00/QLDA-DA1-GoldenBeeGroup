<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/category.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";

// var_dump($_GET);
// var_dump($_POST);
// if (isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $product_item = product_select_by_id($id);
//     $image_list = explode(',', $product_item['images']);
// }

?>

<form id="product-form" action="./index.php?act=addproduct" class="row g-3" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="">
    <div class="col-12">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="tensp" class="form-control" placeholder="Product title">
        <p class="error-message product-name-error">
            <?php if (isset($error['product-name'])) {
    echo $error['product-name'];
}
?></p>
    </div>
    <div class="col-12">
        <label class="form-label">Mô tả sản phẩm</label>
        <textarea name="mo_ta" id="descriptionProductEditor" class="form-control" placeholder="Full description"
            rows="4" cols="4"></textarea>
        <p class="error-message desc-error">
            <?php if (isset($error['desc'])) {
    echo $error['desc'];
}
?></p>
    </div>
    <div class="col-12">
        <label class="form-label">Thông tin sản phẩm</label>
        <textarea name="thong_tin" id="infoProductEditor" class="form-control" placeholder="Full description" rows="4"
            cols="4"></textarea>
        <p class="error-message info-error">
            <?php if (isset($error['info'])) {
    echo $error['info'];
}
?>
    </div>
    <div id="image-input-group" class="col-12">
        <label class="form-label">Thêm hình ảnh</label>
        <input class="form-control" name="images[]" multiple accept="image/png, image/jpeg" type="file">
        <p class="error-message images-error">

        </p>
    </div>

    <div id="imageList" class="col-12">
        <div class="image-list row">
            <h5>Danh sách hình ảnh hiện tại</h5>
            <?php

?>
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
    </div>

    <div class="col-12">
        <label class="form-label">Đơn giá</label>
        <input type="number" name="don_gia" class="form-control" placeholder="Đơn giá">
        <p class="error-message price-error">
            <?php if (isset($error['price'])) {
    echo $error['price'];
}
?></p>
    </div>
    <div class="col-12">
        <label class="form-label">Giảm giá</label>
        <div class="row g-3">
            <div class="col-lg-12">
                <input type="number" name="giam_gia" class="form-control" placeholder="Giảm giá">
                <p class="error-message discount-error">
                    <?php if (isset($error['discount'])) {
    echo $error['discount'];
}
?></p>
            </div>
            <!-- <div class="col-lg-3">
                <div class="input-group">
                    <select class="form-select">
                        <option> USD </option>
                        <option> EUR </option>
                        <option> RUBL </option>
                    </select>
                </div>
            </div> -->
        </div>
    </div>
    <div class="col-12">
        <label for="" class="form-label">Số lượng</label>
        <input type="number" min="1" max="200" name="so_luong" id="" value="1">
        <p class="error-message quantity-error">
            <?php if (isset($error['quantity'])) {
    echo $error['quantity'];
}
?></p>
    </div>

    <div class="col-12 col-md-6">
        <label class="form-label">Danh mục chính</label>
        <select onchange="onSelectCate(this)" name="ma_danhmuc" class="form-select">
            <?php

?>
            <?php
$cate_list = cate_select_all();
foreach ($cate_list as $cate_item) {
    # code...
    echo '
                                                <option value="' . $cate_item['ma_danhmuc'] . '">' . $cate_item['ten_danhmuc'] . '</option>
                                                ';
}
?>
        </select>

        <p class="error-message cate-error">
            <?php if (isset($error['cate'])) {
    echo $error['cate'];
}
?></p>
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label">Danh mục phụ</label>
        <select name="id_dmphu" class="form-select">
            <?php
$subcate_list = subcate_select_all();
foreach ($subcate_list as $subcate_item) {
    # code...
    echo '
                                                    <option value="' . $subcate_item['id'] . '">' . $subcate_item['ten_danhmucphu'] . '</option>
                                                    ';
}
?>
        </select>
    </div>

    <!-- <div class="col-md-12"> -->
    <div class="mb-3 col-md-12">
        <label for="" class="form-label">Hàng đặc biệt</label>
        <!-- <label for="" class="form-label">Dd</label> -->
        <select class="form-select" name="dac_biet" id="">
            <option selected>Chọn 1 trong 2</option>
            <option value="0">Bình thường</option>
            <option value="1">Đặc biệt</option>
            <!-- <option value="">Jakarta</option> -->
        </select>
        <!-- </div> -->
    </div>

    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Xuất bản lên website
            </label>
        </div>
    </div>
    <div class="col-12">
        <input id="product-action-btn" type="submit" name="addproductbtn" class="btn btn-primary px-4"
            value="Nhập sản phẩm" />
        <button type="reset" name="resetbtn" class="btn btn-primary px-4">Xóa thông tin</button>
    </div>
</form>