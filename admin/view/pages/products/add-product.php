<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <h5 class="mb-0">Thêm sản phẩm mới</h5>
            </div>
            <div class="card-body">
                <div id="add-product-content" class="border p-3 rounded">
                    <form action="./index.php?act=addproduct" class="row g-3" method="POST"
                        enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="tensp" class="form-control" placeholder="Product title">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Mô tả sản phẩm</label>
                            <textarea name="mo_ta" class="form-control" placeholder="Full description" rows="4"
                                cols="4"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Thông tin sản phẩm</label>
                            <textarea name="thong_tin" class="form-control" placeholder="Full description" rows="4"
                                cols="4"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Thêm hình ảnh (Có thể thêm nhiều hình ảnh )</label>
                            <input class="form-control" name="images[]" multiple accept="image/png, image/jpeg"
                                type="file">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Đơn giá (Đơn vị VND )</label>
                            <input type="number" min="1" max="99999999999" name="don_gia" class="form-control"
                                placeholder="VD: 2000000 ">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Giảm giá (Đơn vị % )</label>
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <input type="number" min="0" max="100" name="giam_gia" class="form-control"
                                        placeholder="Vd: 5">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Số lượng</label>
                            <input type="number" min="1" max="200" name="so_luong" id="" value="1">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Danh mục chính</label>
                            <select name="ma_danhmuc" class="form-select">
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
                            <input type="submit" name="addproductbtn" class="btn btn-primary px-4"
                                value="Nhập sản phẩm" />
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