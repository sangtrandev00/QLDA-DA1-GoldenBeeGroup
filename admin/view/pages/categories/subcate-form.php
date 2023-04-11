<?php

$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/category.php";
include $ROOT_URL . "/DAO/category.php";

// var_dump($_POST);
// if (isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $cate_item = cate_select_by_id($id);
//     // $image_list = explode(',', $product_item['images']);
//     $image = $cate_item['hinh_anh'];
// }
if (isset($_POST['subid'])) {
    $subid = $_POST['subid'];
    $cateid = $_POST['cateid'];

    $cate_item = cate_select_by_id($cateid);
    $subcate_item = subcate_select_by_id($subid);
}

?>

<form id="subcate-form" class="row g-3" action="./index.php?act=addsubcate" method="POST">
    <div class="col-12">
        <label class="form-label">Tên danh mục phụ</label>
        <input name="subcatename" type="text" class="form-control" placeholder="Tên danh mục"
            value="<?php echo $subcate_item['ten_danhmucphu']; ?>">
        <p class="error-message subcatename-error"></p>
    </div>
    <div class="col-12">
        <label class="form-label">Danh mục cha</label>
        <input type="hidden" name="cateparent" value="<?php echo $_POST['cateid']; ?>">
        <select class="form-select" name="" disabled>
            <option value="">Không có</option>
            <?php
$cate_list = cate_select_all();
foreach ($cate_list as $cate_item) {
    # code...
    $is_selected = $cate_item['ma_danhmuc'] == $_POST['cateid'] ? "selected" : "";
    echo '
                                                <option ' . $is_selected . ' value="' . $cate_item['ma_danhmuc'] . '">' . $cate_item['ten_danhmuc'] . '</option>
                                                ';
}
?>

        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Mô tả</label>
        <textarea name="subcatedesc" class="form-control" rows="3" cols="3" placeholder="Mô tả danh mục"></textarea>
    </div>
    <div class="col-12">
        <div class="d-grid">
            <input type="submit" class="btn btn-primary submit-action-btn" name="addsubcatebtn"
                value="Thêm danh mục phụ">
            <!-- <button class="btn btn-primary">Thêm danh mục</button> -->
        </div>
    </div>
</form>