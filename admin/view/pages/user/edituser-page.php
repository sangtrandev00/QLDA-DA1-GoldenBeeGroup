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
        <a class="my-3 d-inline-block btn btn-outline-primary col-xl-3 ms-3" href="./index.php?act=userlist">
            <-- Trở lại trang người dùng</a>
                <div class="card-body">

                    <div class="border p-3 rounded">

                        <a class="my-3 d-inline-block btn btn-outline-primary" href="./index.php?act=userlist">
                            << Trở lại trang user</a>
                                <h3 class="h3 mb-4 text-gray-500 btn-info text-white p-2">Cập nhật user</h1>
                                    <form id="edituserForm" class="pb-3"
                                        action="<?php echo "index.php?act=edituser&id=" . $_GET['id'] ?>" method="post"
                                        enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="">Tên User: </label>
                                            <input type="text" class="form-control" name="fullname"
                                                value="<?php echo $user['ho_ten'] ?>" required>
                                            <p class="error-message">
                                                <?php echo isset($error['name']) ? $error['name'] : ''; ?></p>

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Địa chỉ: </label>
                                            <input type="text" class="form-control" name="address"
                                                value="<?php echo $user['diachi'] ?>" required>
                                            <p class="error-message">
                                                <?php echo isset($error['address']) ? $error['address'] : ''; ?></p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Email: </label>
                                            <input type="email" class="form-control" name="email"
                                                value="<?php echo $user['email'] ?>" required>
                                            <p class="error-message">
                                                <?php echo isset($error['email']) ? $error['email'] : ''; ?></p>

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Phone: </label>
                                            <input type="text" class="form-control" name="phone"
                                                value="<?php echo $user['sodienthoai'] ?>" required>
                                            <p class="error-message">
                                                <?php echo isset($error['phone']) ? $error['phone'] : ''; ?></p>

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Kích hoạt: </label>
                                            <input type="number" class="form-control" min=0 max=1 name="kichhoat"
                                                value="<?php echo $user['kich_hoat'] ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Username: </label>
                                            <input type="text" class="form-control" name="username"
                                                value="<?php echo $user['tai_khoan'] ?>" required>
                                            <p class="error-message">
                                                <?php echo isset($error['username']) ? $error['username'] : ''; ?>
                                            </p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Password: </label>
                                            <input type="text" class="form-control" name="password"
                                                value="<?php echo $user['mat_khau'] ?>" required>
                                            <p class="error-message">
                                                <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                                            </p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Hình ảnh: </label>
                                            <?=$hinh?>
                                            <input type="file" class="form-control" name="image" value=""
                                                style="margin-top: 5px;"
                                                accept="image/gif, image/jpeg, image/png, image/jpg">
                                            <p class="error-message">
                                                <?php echo isset($error['img']) ? $error['img'] : ''; ?></p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Vai trò </label>
                                            <select name="role" class="form-select" aria-label="Default select example">
                                                <option selected>Chọn vai trò</option>
                                                <option <?php if ($user['vai_tro'] == 1) {echo 'selected';}?> value="1">
                                                    Quản Trị Viên</option>
                                                <option <?php if ($user['vai_tro'] == 2) {echo 'selected';}?> value="2">
                                                    Nhân Viên</option>
                                                <option <?php if ($user['vai_tro'] == 3) {echo 'selected';}?> value="3">
                                                    Khách Hàng</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="iduser"
                                            value="<?php if (isset($_GET['id'])) {echo $_GET['id'];}?>">
                                        <input type="submit" name="edituserbtn" value="Cập nhật"
                                            class="btn btn-primary mt-3" />
                                    </form>
                    </div>
                    </tbody>
                    </table>
                </div>
    </div>

    </div>

</main>
<!--end page main-->

<!-- Toggle Modal here -->