<?php

$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "./admin/models/category.php";
include $ROOT_URL . "./DAO/category.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $cate_item = cate_select_by_id($id);
    // $image_list = explode(',', $product_item['images']);
    $image = $cate_item['hinh_anh'];
}
?>


<form id="cate-form" action="./index.php?act=addcate" method="POST" class="row g-3 form-cate"
    enctype="multipart/form-data">
    <input type="hidden" name="id" value="">
    <div class="col-12">
        <label class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="catename" placeholder="Tên danh mục">
    </div>
    <div class="col-12">
        <label class="form-label">Hình ảnh</label>
        <input type="file" class="form-control" name="cateimage" accept="image/png, image/jpeg" placeholder="Hình ảnh">
    </div>
    <div class="col-12">
        <label for=""></label>
        <img src="..uploads/<?php echo $image ?>" style="" class="w-100 cate-img" alt="<?php echo $image ?>">
    </div>
    <div class="col-12">
        <label class="form-label">Danh mục cha</label>
        <select class="form-select" name="cateparent">
            <option value="">Không có</option>
            <!-- <option value="">Fashion</option>
                                         <option value="">Electronics</option>
                                         <option value="">Furniture</option>
                                         <option value="">Sports</option> -->
            <?php
$cate_list = cate_select_all();
foreach ($cate_list as $cate_item) {
    # code...
    echo '
                                                <option value="">' . $cate_item['ten_danhmuc'] . '</option>
                                                ';
}
?>

        </select>
    </div>
    <div class="col-12">
        <label class="form-label" name="catedesc">Mô tả</label>
        <textarea name="catedesc" class="form-control" rows="3" cols="3" placeholder="Mô tả danh mục"></textarea>
    </div>
    <div class="col-12">
        <div class="d-grid">
            <input type="submit" name="addcatebtn" class="btn btn-primary submit-action-btn" value="Thêm danh mục" />
        </div>
    </div>
</form>