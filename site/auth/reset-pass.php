<?php
ob_start();
session_start();
include "../models/connectdb.php";
include "../models/user.php";
include "../../pdo-library.php";
include "../../DAO/user.php";

// var_dump($_SESSION);
// if (isset($_SESSION['emailreset'])) {

?>
<?php

if (isset($_POST['updatepassbtn']) && $_POST['updatepassbtn']) {

    $error = array();
    $newpass = $_POST['newpass'];
    $renewpass = $_POST['renewpass'];

    if (empty($newpass)) {
        $error['newpass'] = "không để trống mật khẩu mới";
    }

    if (empty($renewpass)) {
        $error['renewpass'] = "Không để trống nhập lại mật khẩu mới!";
    } else if ($newpass != $renewpass) {
        echo '<div class="alert alert-danger text-center">Mật khẩu xác nhận không chính xác, hãy nhập lại!</div>';
        $error['renewpass'] = "Mật khẩu xác nhận không chính xác";
    }

    if (!$error) {
        header('refresh:3;url=login.php');
        user_change_pass_by_email($_SESSION['emailreset'], md5($newpass));
        unset($_SESSION['emailreset']);
        unset($_SESSION['verifycode']);
        // echo '<div class="alert alert-success">Thay đổi mật khẩu thành công!</div>';
        // echo 'You\'ll be redirected in about 5 secs. ';
        // echo 'If not, click <a href="wherever.php">here</a>.';
    } else {

    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../admin/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../../admin/assets/css/style.css" rel="stylesheet" />
    <link href="../../admin/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="../../admin/assets/css/pace.min.css" rel="stylesheet" />
    <style>
    .bg-reset-pass {
        background-color: #ff7f00;
        border: none;
    }

    .bg-reset-pass:hover {
        background-color: #ff7f00;
    }

    .images img {
        width: 70%;
    }

    .error-message {
        color: red;
    }

    label.error {
        color: red;
    }
    </style>

    <title>GoldenBeeGroup Authentication</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">
        <!--start content-->
        <main class="authentication-content">
            <?php
include "./auth-header.php";
?>

            <div class="container">

                <div class="mt-4">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center border-end images">
                                <img src="../../admin/assets/images/error/reset-pass.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Tạo mật khẩu mới</h5>
                                    <p class="card-text mb-5">Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn.
                                        Vui lòng nhập của bạn
                                        mật khẩu mới!</p>
                                    <form id="reset-pass-client-form" action="./reset-pass.php" class="form-body"
                                        method="POST">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <?php
if (isset($error) && !$error) {
    echo '<div class="alert alert-success">Tạo mật khẩu mới thành công, chuyển trang sau 3s</div>';
}
?>
                                                <label for="inputNewPassword" class="form-label">Mật khẩu mới</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" id="newpass" name="newpass"
                                                        class="form-control radius-30 ps-5" id="inputNewPassword"
                                                        placeholder="Nhập mật khẩu mới">
                                                    <p class="error-message">
                                                        <?php if (isset($error['newpass'])) {echo $error['newpass'];}?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputConfirmPassword" class="form-label">Xác nhận mật
                                                    khẩu</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" name="renewpass"
                                                        class="form-control radius-30 ps-5" id="inputConfirmPassword"
                                                        placeholder="Xác nhận mật khẩu">
                                                    <p class="error-message">
                                                        <?php if (isset($error['renewpass'])) {echo $error['renewpass'];}?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid gap-3">
                                                    <input type="submit" name="updatepassbtn"
                                                        class="btn btn-primary radius-30 bg-reset-pass"
                                                        value="Thay đổi mật khẩu" />
                                                    <a href="./login.php" class="btn btn-light radius-30">Trở lại đăng
                                                        nhập</a>
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
        </main>

        <!--end page main-->
        <?php
include "./auth-footer.php";
?>
    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="../../admin/assets/js/jquery.min.js"></script>
    <script src="../../admin/assets/js/pace.min.js"></script>

    <!-- Jquery validation here -->
    <script src="../../site/assets/js/jquery.validate.min.js">

    </script>

    <script src="../../site/assets/js/additional-methods.min.js">

    </script>

    <script src="../../site/assets/js/validate.js">

    </script>
</body>

</html>

<?php

// } else {
//     echo '<div>Trang không tồn tại!</div>';
// }
?>