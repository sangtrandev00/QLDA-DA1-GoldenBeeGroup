<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0">Danh sách Voucher/Coupon giảm giá</h5>
            <form class="ms-auto position-relative">
                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i>
                </div>
                <input class="form-control ps-5" type="text" placeholder="search">
            </form>
        </div>
        <div class="table-responsive mt-3">
            <table class="table align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>#ID COUPON</th>
                        <th>COUPON CODE</th>
                        <th>Giảm giá</th>
                        <th>Giá trị đơn tối thiểu (VND)</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$coupon_list = select_all_coupons();

// var_dump($coupon_list);
foreach ($coupon_list as $coupon) {
    # code...
    echo '
                    <tr>
                        <td>#' . $coupon['id_coupon'] . '</td>
                        <td>
                            <div class="d-flex align-items-center gap-3 cursor-pointer">
                                <div class="">
                                    <p class="mb-0">' . $coupon['coupon_code'] . '</p>
                                </div>
                            </div>
                        </td>
                        <td>' . $coupon['discount_percent'] . '</td>
                        <td>' . $coupon['min_value'] . '</td>
                        <td>' . $coupon['date_start'] . '</td>
                        <td>' . $coupon['date_end'] . '</td>
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                <a  href="./index.php?act=editcoupon&id=' . $coupon['id_coupon'] . '" class="text-warning" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a onclick="deleteCoupon(' . $coupon['id_coupon'] . ')" href="./index.php?act=deletecoupon&id=' . $coupon['id_coupon'] . '" class="text-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </td>
                    </tr>
    ';
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</main>
<!--end page main-->