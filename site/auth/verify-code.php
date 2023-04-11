<?php
ob_start();
session_start();
include "../models/connectdb.php";
include "../models/user.php";
include "../../pdo-library.php";
include "../../DAO/user.php";

?>

<?php

if (isset($_POST['verifycodebtn']) && $_POST['verifycodebtn']) {
    $error = array();
    $code = $_POST['code'];

    if (empty($code)) {
        $error['code'] = "Mã code của bạn không chính xác";
    }

    if (isset($_SESSION['verifycode'])) {
        $verifycode = $_SESSION['verifycode'];
        if ($code != $verifycode) {
            $error['code'] = "Mã code của bạn không chính xác";
            // header('location: index.php?act=forgotpass');

        } else {

        }
    }

    if (!$error) {
        header('location: ./reset-pass.php');
        unset($_SESSION['verifycode']);
    } else {
        // echo '<div class="alert alert-danger" >Mã code xác nhận không chính xác</div>';

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
    .bg-guii {
        background-color: #ff7f00;
        border: none;
    }

    .bg-guii:hover {
        background-color: #ff7f00;
    }

    .error-message,
    label.error {
        color: red;
    }
    </style>

    <title>GoldenBeeGroup Authentication</title>
</head>

<body class="bg-surface">

    <!--start wrapper-->
    <div class="wrapper">
        <?php
include "./auth-header.php";
?>
        <!--start content-->
        <main class="authentication-content">
            <div class="container">
                <div class="mt-4">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
                                <img src="../../admin/assets/images/error/reset-pass-img-1.png" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Nhập mã code</h5>
                                    <p class="card-text mb-5">Nhập mã code đã gửi đến email của bạn để lấy lại mật khẩu
                                    </p>
                                    <form class="form-body" action="./verify-code.php" method="POST">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <!-- <?php if (isset($error) && !$error > 0) {echo '<div class="alert alert-success">Nhập mã code chính xác, chuyển trang sau 3s</div>';}?> -->
                                                <label for="inputEmailid" class="form-label">Mã code: </label>
                                                <input type="password" name="code" class="form-control radius-30"
                                                    id="inputEmailid" placeholder="Code">
                                                <p class="error-message">
                                                    <?php if (isset($error['code'])) {echo $error['code'];}?></p>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid gap-3">
                                                    <input type="submit" name="verifycodebtn"
                                                        class="btn btn-primary radius-30 bg-guii" value="Gửi" />
                                                    <a href="./login.php" class="btn btn-light radius-30">Trở lại
                                                        đăng nhập</a>
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


    <?php
// if (isset($error) && $error) {
//     unset($_SESSION['verifycode']);
//     // sleep(3);
//     header('location: ./forgot.php');
// }
?>

</body>

</html>