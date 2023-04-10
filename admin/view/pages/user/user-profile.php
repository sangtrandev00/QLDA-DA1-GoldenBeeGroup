<!-- <div class="profile-cover bg-dark"></div> -->
<?php
if (isset($_SESSION['idadmin'])) {
    $id = $_SESSION['idadmin'];
    $user = user_select_by_id($id);
}
?>
<div class="row">
    <div class="col-12 col-lg-8">
        <form id="user-profile-form" action="./index.php?act=update-profile&id=<?php echo $user['id'] ?>"
            class="row g-3" method="POST" enctype="multipart/form-data">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Tài khoản của tôi</h5>
                    <hr>
                    <div class="card shadow-none border">
                        <!-- <div class="card-header">
                        <h6 class="mb-0">Thông tin tài khoản</h6>
                    </div> -->
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- <div class="col-6">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" value="@jhon">
                            </div> -->
                                <div class="col-6">
                                    <label class="form-label">Địa chỉ email</label>
                                    <input name="email" type="text" class="form-control"
                                        value="<?php echo $user['email']; ?>">
                                    <p class="error-message">
                                        <?php if (isset($error['email'])) {echo $error['email'];}?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Họ và tên</label>
                                    <input name="hoten" type="text" class="form-control"
                                        value="<?php echo $user['ho_ten']; ?>">
                                    <p class="error-message">
                                        <?php if (isset($error['hoten'])) {echo $error['hoten'];}?>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Avatar</label>
                                    <input accept="image/png, image/gif, image/jpeg" name="avatar" type="file"
                                        accept="JPEG/PNG" name="avatar" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h6 class="mb-0">Thông tin liên hệ</h6>
                        </div>
                        <div class="card-body">

                            <div class="col-12">
                                <label for="" class="form-label">Số điện thoại</label>
                                <input type="phone" class="form-control" name="phone" id="" aria-describedby="helpId"
                                    placeholder="" value="<?php echo $user['sodienthoai'] ?>">
                                <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                <p class="error-message">
                                    <?php if (isset($error['phone'])) {echo $error['phone'];}?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Công ty</label>
                                <input type="text" class="form-control" name="congty"
                                    value="<?php echo $user['congty'] ?>" id="" aria-describedby="helpId"
                                    placeholder="">
                                <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                <p class="error-message">
                                    <?php if (isset($error['congty'])) {echo $error['congty'];}?>
                                </p>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Địa chỉ chi tiết</label>
                                <textarea name="address" class="form-control" rows="4" cols="4"
                                    placeholder="Địa chỉ chi tiết"><?php echo $user['diachi'] ?></textarea>
                                <p class="error-message">
                                    <?php if (isset($error['address'])) {echo $error['address'];}?>
                                </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Về bản thân</label>
                                <textarea class="form-control" rows="4" cols="4" placeholder="Mô tả về bản thân"
                                    name="about_me"><?php echo $user['about_me'] ?></textarea>
                                <p class="error-message">
                                    <?php if (isset($error['about_me'])) {echo $error['about_me'];}?>
                                </p>
                            </div>
                            <div class="text-start">
                                <input type="submit" name="savebtn" class="btn btn-primary px-4 mt-4"
                                    value="Lưu thông tin" />
                            </div>
                        </div>
                    </div>
        </form>
    </div>
</div>
</div>
<div class="col-12 col-lg-4">
    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-body">
            <div class="profile-avatar text-center">
                <img src="../uploads/<?php echo $user['hinh_anh'] ?>" class="rounded-circle shadow" width="120"
                    height="120" style="object-fit: cover;" alt="">
            </div>
            <!-- <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                    <div class="text-center">
                        <h4 class="mb-0">45</h4>
                        <p class="mb-0 text-secondary">Friends</p>
                    </div>
                    <div class="text-center">
                        <h4 class="mb-0">15</h4>
                        <p class="mb-0 text-secondary">Photos</p>
                    </div>
                    <div class="text-center">
                        <h4 class="mb-0">86</h4>
                        <p class="mb-0 text-secondary">Comments</p>
                    </div>
                </div> -->
            <div class="text-center mt-4">
                <h4 class="mb-1"><?php echo $user['ho_ten'] ?>, 22</h4>
                <p class="mb-0 text-secondary">Viet nam</p>
                <div class="mt-4"></div>
                <?php if ($user['vai_tro'] == 1): ?>
                <h6 class="mb-1">Admin</h6>
                <?php elseif ($user['vai_tro'] == 2): ?>
                <h6 class="mb-1">Nhân viên</h6>
                <?php elseif ($user['vai_tro'] == 3): ?>
                <h6 class="mb-1">Khách hàng</h6>
                <?php endif;?>
                <p class="mb-0 text-secondary"><?php echo $user['congty'] ?></p>
            </div>
            <hr>
            <div class="text-start">
                <h5 class="">Giới thiệu</h5>
                <p class="mb-0">
                    <!-- No thing imposible. Believe in the future -->
                    <?php echo $user['about_me'] ?>
            </div>
        </div>
        <!-- <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                    Followers
                    <span class="badge bg-primary rounded-pill">95</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    Following
                    <span class="badge bg-primary rounded-pill">75</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    Templates
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
            </ul> -->
    </div>
</div>
</div>
<!--end row-->

</main>
<!--end page main-->