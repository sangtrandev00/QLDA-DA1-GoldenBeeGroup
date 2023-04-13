<!--start content-->
<main class="page-content">


    <?php

// var_dump($user);
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $user = user_select_by_id($_GET['id']);
    // var_dump($user);
    $hinhpath = "../uploads/" . $user['hinh_anh'];
    if (is_file($hinhpath)) {
        $hinh = "<img src='" . $hinhpath . "' height='40'>";
    } else {
        $hinh = "không có hình";
    }
}

?>
    <div class="card">
        <a class="my-3 d-inline-block btn btn-outline-primary col-xl-3 ms-3" href="./index.php?act=adminlist">
            <-- Trở lại trang quản trị viên</a>
                <div class="card-body">
                    <div class="border p-3 rounded">

                        <h6 class="mb-0 text-uppercase">Cập nhật quản trị viên</h6>
                        <hr />
                        <form class="row g-3" id="form-edit-admin"
                            action="<?php echo "index.php?act=editadmin&id=" . $_GET['id'] ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="col-12">
                                <label class="form-label">Họ và Tên:</label>
                                <input type="text" class="form-control" name="fullname"
                                    value="<?php echo $user['ho_ten'] ?>" required>
                                <p class="error-message"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Địa chỉ:</label>
                                <input type="text" class="form-control" name="address"
                                    value="<?php echo $user['diachi'] ?>" required>
                                <p class="error-message">
                                    <?php echo isset($error['address']) ? $error['address'] : ''; ?></p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email"
                                    value="<?php echo $user['email'] ?>" required>
                                <p class="error-message"><?php echo isset($error['email']) ? $error['email'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone:</label>
                                <input type="text" class="form-control" name="phone"
                                    value="<?php echo $user['sodienthoai'] ?>" required>
                                <p class="error-message"><?php echo isset($error['phone']) ? $error['phone'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kích hoạt:</label>
                                <input type="number" class="form-control" min=0 max=1 name="kichhoat"
                                    value="<?php echo $user['kich_hoat'] ?>" required>
                            </div>
                            <!-- <div class="col-12">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="" required>
                                <p class="error-message">

                            </div> -->
                            <div class="col-12">
                                <label class="form-label">Password:</label>
                                <input type="text" class="form-control" name="password"
                                    value="<?php echo $user['mat_khau'] ?>" required>
                                <p class="error-message">
                                    <?php echo isset($error['password']) ? $error['password'] : ''; ?></p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Hình ảnh:</label>
                                <?=$hinh?>
                                <input type="file" class="form-control" name="image" style="margin-top: 5px;" value=""
                                    accept="image/gif, image/jpeg, image/png, image/jpg">
                                <p class="error-message"><?php echo isset($error['img']) ? $error['img'] : ''; ?></p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Chọn vai trò:</label>
                                <select name="role" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Chọn vai trò</option>
                                    <option <?php if ($user['vai_tro'] == 1) {echo 'selected';}?> value="1">Quản Trị
                                        Viên</option>
                                    <option <?php if ($user['vai_tro'] == 2) {echo 'selected';}?> value="2">Nhân Viên
                                    </option>
                                    <option <?php if ($user['vai_tro'] == 3) {echo 'selected';}?> value="3">Khách Hàng
                                    </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <input type="hidden" name="iduser"
                                        value="<?php if (isset($_GET['id'])) {echo $_GET['id'];}?>">
                                    <input type="submit" name="edituserbtn" value="Cập nhật quản trị viên"
                                        class="btn btn-primary" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
    <!-- >>>>>>> 11022a8 (Edit file list user and admin/ Add user) -->

</main>
<!--end page main-->

<!-- Bootstrap bundle JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script>
src = "assets/js/additional-methods.min.js"
</script>

<script src="assets/js/pages/validate.js">

</script>