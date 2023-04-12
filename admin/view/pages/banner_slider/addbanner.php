<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <?php
if (isset($thongbao) && ($thongbao != "")) {
    echo '<div class="alert alert-primary" role="alert">' . $thongbao . '</div>';
}

?>
            <div class="card-header py-3 bg-transparent">
                <h5 class="mb-0">Thêm mới banner</h5>
            </div>
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form id="add-blog" class="row g-3" action="index.php?act=addbanner" method="post"
                        enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Tên</label>
                            <input type="text" name="namebanner" class="form-control">
                            <p class="error-message">
                                <?php
if (isset($error['namebanner'])) {
    echo $error['namebanner'];
}
?>
                            </p>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Thêm hình ảnh</label>
                            <input class="form-control" name="images[]" multiple accept="image/png, image/jpeg"
                                type="file">
                            <p class="error-message images-error">
                                <?php
if (isset($error['images'])) {
    echo $error['images'];
}
?>
                            </p>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label">Sản Phẩm</label>
                            <select class="form-select" name="idsp">
                                <?php
$listsp = load_all_sp();
foreach ($listsp as $sp) {
    extract($sp);
    // print_r($sp);
    echo '<option value="' . $masanpham . '">' . $tensp . '</option>';
}
?>

                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nội Dung</label>
                            <textarea class="blognoidung" name="noidung" id="" cols="30" rows="10"></textarea>
                            <p class="error-message">
                                <?php
if (isset($error['noidung'])) {
    echo $error['noidung'];
}
?>
                            </p>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Thông Tin</label>
                            <textarea class="blognoidung" name="thongtin" id="" cols="30" rows="10"></textarea>
                            <p class="error-message">
                                <?php
if (isset($error['thongtin'])) {
    echo $error['thongtin'];
}

?>
                            </p>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Ngày kết thúc</label>
                            <input type="datetime-local" name="date_end" class="form-control" id="">
                            <p class="error-message">
                                <?php
if (isset($error['date_end'])) {
    echo $error['date_end'];
}
?>
                            </p>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="addbanner" class="btn btn-primary px-4" value="Đăng" />
                            <button type="reset" class="btn btn-primary px-4">Xóa thông tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

</main>
<!--end page main-->