<?php
if (isset($_GET['cateid'])) {
    $iddm = $_GET['cateid'];
    $subcate_list = subcate_select_all_by_id($iddm);
    // var_dump($subcate_list);
    ?>

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Thêm danh mục phụ sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form onsubmit="addSubCate(this)" class="row g-3" action="./index.php?act=addsubcate"
                            method="POST">
                            <div class="col-12">
                                <label class="form-label">Tên danh mục phụ</label>
                                <input name="subcatename" type="text" class="form-control" placeholder="Tên danh mục">
                                <p class="error-message subcatename-error">
                                    <?php if (isset($error['subcatename'])) {echo $error['subcatename'];}?></p>
                            </div>
                            <!-- <div class="col-12">
                                <label class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control" placeholder="Hình ảnh">
                            </div> -->
                            <div class="col-12">
                                <label class="form-label">Danh mục cha</label>
                                <input type="hidden" name="cateparent" value="<?php echo $_GET['cateid']; ?>">
                                <select class="form-select" name="" disabled>
                                    <option value="">Không có</option>
                                    <!-- <option value="">Fashion</option>
                                         <option value="">Electronics</option>
                                         <option value="">Furniture</option>
                                         <option value="">Sports</option> -->
                                    <?php
$cate_list = cate_select_all();
    foreach ($cate_list as $cate_item) {
        # code...
        $is_selected = $cate_item['ma_danhmuc'] == $_GET['cateid'] ? "selected" : "";
        echo '
                                                <option ' . $is_selected . ' value="' . $cate_item['ma_danhmuc'] . '">' . $cate_item['ten_danhmuc'] . '</option>
                                                ';
    }
    ?>

                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mô tả</label>
                                <textarea name="subcatedesc" class="form-control" rows="3" cols="3"
                                    placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary" name="addsubcatebtn"
                                        value="Thêm danh mục phụ">
                                    <!-- <button class="btn btn-primary">Thêm danh mục</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 d-flex">

                <div class="card border shadow-none w-100">
                    <div class="card-header">
                        <h3>Danh mục phụ</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th><input class="form-check-input" type="checkbox"></th>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                        <th>Số sản phẩm</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
foreach ($subcate_list as $cate_item) {
        # code...
        // echo $cate_item['id'];
        // var_dump(count_products_by_subcate($cate_item['id']));
        echo '
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"></td>
                                                <td>#' . $cate_item['id'] . '</td>
                                                <td>' . $cate_item['ten_danhmucphu'] . '</td>
                                                <td>' . $cate_item['mo_ta'] . '</td>
                                                <td>' . count_products_by_subcate($cate_item['id']) . '</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">

                                                        <a href="javascript:editSubcate(' . $cate_item['id'] . ', ' . $iddm . ')" class="text-warning"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <a href="javascript:deleteSubcate(' . $cate_item['id'] . ', ' . $iddm . ')" class="text-danger" data-bs-toggle="tooltip"
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
            </div>
        </div>
        <!--end row-->
    </div>
</div>

</main>
<!--end page main-->

<?php

}
?>