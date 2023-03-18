<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Add New Product</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3">
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
                                <textarea name="information" class="form-control" placeholder="Full description"
                                    rows="4" cols="4"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Thêm hình ảnh</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Đơn giá</label>
                                <input type="text" name="don_gia" class="form-control" placeholder="Enter tags">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Giảm giá</label>
                                <div class="row g-3">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Price">
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <select class="form-select">
                                                <option> USD </option>
                                                <option> EUR </option>
                                                <option> RUBL </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Số lượng</label>
                                <input type="number" name="form-control" id="" placeholder="Số lượng">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Danh mục chính</label>
                                <select class="form-select">
                                    <?php

?>
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
                            <div class="col-12 col-md-6">
                                <label class="form-label">Danh mục phụ</label>
                                <select class="form-select">
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
                                <select class="form-select" name="" id="">
                                    <option selected>Select one</option>
                                    <option value="">Đặc biệt</option>
                                    <option value="">Bình thường</option>
                                    <!-- <option value="">Jakarta</option> -->
                                </select>
                                <!-- </div> -->
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Publish on website
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary px-4" value="Nhập sản phẩm" />
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