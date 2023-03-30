<!-- <div class="profile-cover bg-dark"></div> -->
<?php
if (isset($_SESSION['iduser'])) {
    $id = $_SESSION['iduser'];
    $user = user_select_by_id($id);
}
?>
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-0">Tài khoản của tôi</h5>
                <hr>
                <div class="card shadow-none border">
                    <!-- <div class="card-header">
                        <h6 class="mb-0">Thông tin tài khoản</h6>
                    </div> -->
                    <div class="card-body">
                        <form class="row g-3">
                            <!-- <div class="col-6">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" value="@jhon">
                            </div> -->
                            <div class="col-6">
                                <label class="form-label">Địa chỉ email</label>
                                <input type="text" class="form-control" value="<?php echo $user['email']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" value="<?php echo $user['ho_ten']; ?>">
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card shadow-none border">
                    <div class="card-header">
                        <h6 class="mb-0">Thông tin liên hệ</h6>
                    </div>
                    <div class="card-body">
                        <form class="row g-3">

                            <div class="col-12">
                                <label for="" class="form-label"></label>
                                <textarea class="form-control" rows="4" cols="4"
                                    placeholder="Địa chỉ chi tiết"><?php echo $user['diachi'] ?></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Về bản thân</label>
                                <textarea class="form-control" rows="4" cols="4"
                                    placeholder="Mô tả về bản thân"><?php echo $user['about_me'] ?></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-start">
                    <button type="submit" name="savebtn" class="btn btn-primary px-4">Lưu thông tin</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
                <div class="profile-avatar text-center">
                    <img src="<?php echo $user['hinh_anh'] ?>" class="rounded-circle shadow" width="120" height="120"
                        alt="">
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
                    <h6 class="mb-1">Admin manager</h6>
                    <p class="mb-0 text-secondary">FPT polytechnic</p>
                </div>
                <hr>
                <div class="text-start">
                    <h5 class="">Giới thiệu</h5>
                    <p class="mb-0">
                        No thing imposible. Believe in the future
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