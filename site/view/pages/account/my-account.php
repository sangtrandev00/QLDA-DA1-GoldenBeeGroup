<?php
if (isset($_SESSION['iduser'])) {
    $iduser = $_SESSION['iduser'];
    $user_info = user_select_by_id($iduser);
    // var_dump($user_info);
}
?>

<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80 section">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Tài khoản của tôi</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Tài khoản của tôi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<div id="page-content" class="page-wrapper section">

    <!-- LOGIN SECTION START -->
    <div class="login-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="my-account-content" id="accordion">
                        <!-- My Personal Information -->
                        <div class="card mb-15">
                            <div class="card-header" id="headingOne">
                                <h4 class="card-title">
                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">Thông tin tài khoản của tôi</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordion">
                                <div class="card-body p-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form onsubmit="updateInfo()" action="./index.php?act=updateaccount"
                                                method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="iduser"
                                                    value="<?php echo $_SESSION['iduser'] ?>">
                                                <div class="new-customers">
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-md-1w">
                                                                <p class="error-message"><?php if (isset($error['ho_ten'])) {
    echo $error['ho_ten'];
}
?>
                                                                </p>
                                                                <input type="text" name="ho_ten"
                                                                    placeholder="Họ và tên">
                                                            </div>
                                                            <!-- <div class="col-md-12 form-group mb-3">
                                                                <label for="hinh_anh">Avatar: </label>
                                                                <input type="file" name="hinh_anh" id="hinh_anh">
                                                            </div> -->

                                                            <div class="mb-20 d-flex align-content-center">
                                                                <p class="error-message">
                                                                    <?php if (isset($error['hinh_anh'])) {echo $error['hinh_anh'];}?>
                                                                </p>

                                                                <label for="formFileMultiple"
                                                                    class="form-label pl-20 w-25">Avatar:
                                                                </label>
                                                                <input class="form-control form-control-lg" type="file"
                                                                    name="hinh_anh" id="formFileMultiple">
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <p class="error-message">
                                                                <?php if (isset($error['sodienthoai'])) {echo $error['sodienthoai'];}?>
                                                            </p>
                                                            <input type="text" name="sodienthoai"
                                                                placeholder="Số điện thoại...">
                                                        </div>

                                                        <input type="text" name="companyname"
                                                            placeholder="Tên công ty...">
                                                        <div class="form-group">
                                                            <p class="error-message">
                                                                <?php if (isset($error['email'])) {echo $error['email'];}?>
                                                            </p>
                                                            <input type="text" name="email"
                                                                placeholder="Địa chỉ email...">
                                                        </div>

                                                        <div class="form-group">
                                                            <p class="error-message">
                                                                <?php if (isset($error['diachi'])) {echo $error['diachi'];}?>
                                                            </p>
                                                            <textarea name="diachi" class="custom-textarea"
                                                                placeholder="Dịa chỉ..."></textarea>
                                                        </div>
                                                        <div class="checkbox">

                                                            <label class="mr-10">
                                                                <small>
                                                                    <input type="checkbox" name="signup">Tôi muốn đăng
                                                                    ký
                                                                    nhận tin
                                                                    tức mới nhất qua mail
                                                                </small>
                                                            </label>
                                                            <br>
                                                            <label>
                                                                <small>
                                                                    <input type="checkbox" name="signup">Tôi đã đọc và
                                                                    đồng
                                                                    ý với <a href="index.php?act=privacy-policy">Chính
                                                                        sách
                                                                        bảo mật</a>
                                                                </small>
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input name="updateacountinfobtn"
                                                                    class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                                                    value="Lưu thông tin" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="reset"
                                                                    class="submit-btn-1 mt-20 btn-hover-1 f-right"
                                                                    type="reset">Xóa thông tin form</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <?php include "./view/pages/account/account-info.php";?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My shipping address -->
                    <div class="card mb-15">
                        <div class="card-header" id="headingTwo">
                            <h4 class="card-title">
                                <a data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">Địa chỉ gửi hàng</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                            <div class="card-body">
                                <?php ?>
                                <form onsubmit="updateShippingAddress(<?php echo $iduser ?>);"
                                    action="./index.php?act=updateshippingaddress" method="POST">
                                    <div class="new-customers p-30">
                                        <!-- <div class="col-md-12">
                                            <input type="text" placeholder="Họ và tên">
                                        </div>
                                        <input type="text" placeholder="Số điện thoại...">
                                        <input type="text" placeholder="Tên công ty của bạn...">
                                        <input type="text" placeholder="Địa chỉ email..."> -->
                                        <textarea name="shippingaddress" class="custom-textarea"
                                            placeholder="Địa chỉ gửi hàng..."><?php echo $user_info['ship_address'] ?></textarea>
                                        <!-- <textarea class="custom-textarea"
                                            placeholder="Thêm tin nhắn cho cửa hàng..."></textarea> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input name="savebtn" class="submit-btn-1 mt-20 btn-hover-1"
                                                    type="submit" value="Lưu địa chỉ" />
                                            </div>
                                            <div class="col-md-6">
                                                <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Xóa
                                                    thông tin form</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Oke -->
                    <br>
                    <!-- My billing details -->
                    <div class="card mb-15">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">Thay đổi mật khẩu</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordion">
                            <div class="card-body">
                                <form onsubmit="changePassword(<?php echo $iduser ?>)" action="#">
                                    <div class="p-30">
                                        <input name="oldpass" type="password" placeholder="Mật khẩu cũ...">
                                        <input name="newpass" type="password" placeholder="Mật khẩu mới...">
                                        <input name="renewpass" type="password" placeholder="Xác nhận mật khẩu mới...">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                                    value="register">Cập nhật mật khẩu</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="reset" class="submit-btn-1 mt-20 btn-hover-1 f-right"
                                                    type="reset">Xóa
                                                    trường thông tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- My Order info -->
                    <div class="card mb-15">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">Lịch sử đơn hàng </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table mt-5 table-hover shadow p-3">
                                    <form action="" method="post">
                                        <input type="text" name="searchhistory" class="form-control" id="" value=""
                                            placeholder="Tìm kiếm lịch sử theo mã đơn hàng">
                                    </form>
                                    <thead class="text-dark bg-light p-3">
                                        <tr>
                                            <th scope="col">iddh</th>
                                            <th scope="col">Mã đơn hàng</th>
                                            <!-- <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th> -->
                                            <th scope="col">Số lượng</th>

                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Phương thức thanh toán</th>
                                            <th scope="col">Thời gian đặt hàng</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php

if (isset($_SESSION['iduser'])) {
    $iduser = $_SESSION['iduser'];
    $cart_list = getShowCartGroupbyOrder($iduser);
    //var_dump($cart_list);
    foreach ($cart_list as $cart_item) {
        $trangthai = "Đã xác nhận";
        # code...
        echo '

    <tr class="p-3">

        <td class="" scope="row"> <a class="text-decoration-none" href="./index.php?act=historyorderdetailpage&id=' . $cart_item['iddonhang'] . '">' .
            $cart_item['iddonhang'] . '</a></td>
        <td class="">' . $cart_item['madonhang'] . '</td>
        <td class="">' . $cart_item['soluong'] . '</td>
        <td class="">' . $cart_item['tongdonhang'] . '</td>
        <td class="">' . $cart_item['pttt'] . '</td>
        <td class="">' . $cart_item['timeorder'] . '</td>
        <td class="text-danger">' . $trangthai . '</td>
        <td class=""><a class="text-decoration-none" href="javascript:viewOrderdetail(' . $cart_item['iddonhang'] . ')"><i class="fa-solid fa-eye"></i> Xem</a></td>
        </tr>

        ';
    }

    ?>

                                    </tbody>
                                </table>
                                <?php
}
?>
                            </div>
                        </div>
                    </div>

                    <!-- My Order info -->
                    <div id="orderDetail" class="card mb-15 d-none">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a data-bs-toggle="collapse" data-bs-target="#collapseOrderdetail" aria-expanded="false"
                                    aria-controls="collapseOrderdetail">Đơn hàng chi tiết
                                    #123</a>
                            </h4>
                        </div>
                        <div id="collapseOrderdetail" class="collapse " aria-labelledby="headingFour"
                            data-bs-parent="#accordion">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">Phương thức thanh toán</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordion">
                            <div class="panel-body">
                                <form action="#">
                                    <div class="new-customers p-30">
                                        <select class="custom-select">
                                            <option value="defalt">Card Type</option>
                                            <option value="c-1">Master Card</option>
                                            <option value="c-2">Paypal</option>
                                            <option value="c-3">Paypal</option>
                                            <option value="c-4">Paypal</option>
                                        </select>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Card Number">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Card Security Code">
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="custom-select">
                                                    <option value="defalt">Month</option>
                                                    <option value="c-1">January</option>
                                                    <option value="c-2">February</option>
                                                    <option value="c-3">March</option>
                                                    <option value="c-4">April</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="custom-select">
                                                    <option value="defalt">Year</option>
                                                    <option value="c-4">2017</option>
                                                    <option value="c-1">2016</option>
                                                    <option value="c-2">2015</option>
                                                    <option value="c-3">2014</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                                    value="register">pay now</button>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                                    value="register">cancel order</button>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="submit-btn-1 mt-20 f-right btn-hover-1" type="submit"
                                                    value="register">continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN SECTION END -->
</div>
<!-- End page content -->