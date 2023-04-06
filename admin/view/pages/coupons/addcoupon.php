<div class="card ">
    <div class="card-header fs-5 fw-bold ">
        Tạo Mã giảm giá
    </div>
    <div class="card-body p-5">
        <!-- <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a> -->

        <form id="add-coupon-form" action="./index.php?act=addcoupon" method="post">
            <div class="mb-3 row">
                <label for="" class="form-label col-4">Tên mã giảm giá</label>
                <div class="col-8">
                    <input type="text" class="form-control " name="coupon_name" id="" aria-describedby="helpId"
                        placeholder="">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="form-label col-4">Phần trăm giảm giá (% )</label>
                <div class="col-8">
                    <input type="number" class="form-control " name="coupon_discount" id="" aria-describedby="helpId"
                        placeholder="">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="form-label col-4">Đơn hàng tối thiểu</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="min_value" id="" aria-describedby="helpId"
                        placeholder="">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="form-label col-4">Số lượt sử dụng</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="maximum_use" id="" aria-describedby="helpId"
                        placeholder="">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="form-label col-4">Thời gian bắt đầu</label>
                <div class="col-8">
                    <input type="datetime-local" class="form-control" name="date_start" id="date_start"
                        aria-describedby="helpId" placeholder="">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="form-label col-4">Thời gian Kết thúc</label>
                <div class="col-8">
                    <input type="datetime-local" class="form-control" name="date_end" id="date_end"
                        aria-describedby="helpId" placeholder="">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
            </div>
            <!-- <div class="mb-3 row">
                <label for="" class="form-label col-4">Ghi chú của bạn</label>
                <div class="col-8">
                    <textarea placeholder="Ghi chú của bạn" rows="4" cols="" class="col-8 form-control">
                    </textarea>
                </div>
            </div> -->
            <div class="mb-3">
                <input class="btn btn-primary" name="create_coupon_btn" type="submit" value="Tạo mã giảm giá">
            </div>
        </form>
    </div>
    <div class="card-footer text-body-secondary">
        Mã giảm giá tại website
    </div>
</div>

<?php
if (isset($_POST['create_coupon_btn']) && $_POST['create_coupon_btn']) {

    // var_dump($_POST);
    // source

    $coupon_name = $_POST['coupon_name'];
    $coupon_discount = $_POST['coupon_discount'];
    $min_value = $_POST['min_value'];
    $maximum_use = $_POST['maximum_use'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];

    $is_inserted = insert_coupon($coupon_name, $coupon_discount, $min_value, $maximum_use, $date_start, $date_end);

    if ($is_inserted) {
        $_SESSION['alert'] = "Thêm coupon thành công!";
    }
}
?>