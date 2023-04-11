<?php
ob_start();
session_start();
include "../models/connectdb.php";
include "../models/user.php";

include "../../global.php";
include "$ROOT_URL/pdo-library.php";
include "$ROOT_URL/DAO/user.php";
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = [];
}
?>
<?php

if (isset($_POST['forgotbtn']) && $_POST['forgotbtn']) {
    $error = array();
    $email = $_POST['email'];

    // Validate

    if (empty($email)) {
        $error['email'] = "Không để trống email!";
    }

    if (!$error) {
        if (email_exist($email)) {
            $title = "Code Reset Password";
            $messageCode = random_int(100000, 999999);
            $_SESSION['emailreset'] = $email;
            $_SESSION['verifycode'] = $messageCode;
            sendmail($email, $title, $messageCode);
            header("location: ./verify-code.php");
        } else {
            echo '
            <script>
                window.alert("Email của bạn không đúng. Xin vui lòng nhập lại!");
            </script>
            ';
        }
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

    .images img {
        width: 80%;
    }

    .error-message-forgot {
        color: red;
        font-weight: 500;
        margin-top: 5px;
        margin-left: 5px;
    }
    </style>

    <title>GoldenBeeGroup Authentication</title>
</head>

<body class="bg-surface">

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center border-end images">
                                <img src="../../admin/assets/images/error/forgot-password-img.png" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Quên mật khẩu</h5>
                                    <p class="card-text mb-5">Hãy nhập địa chỉ email của bạn để lấy lại mật khẩu</p>
                                    <form class="form-body" id="forgot-auth-admin" action="./forgot.php" method="post">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailid" class="form-label">Email</label>
                                                <input type="email" class="form-control radius-30" id="inputEmailid"
                                                    placeholde r="Email" name="email">
                                                <p class="error-message-forgot">
                                                    <?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid gap-3">
                                                    <input type="submit" name="forgotbtn"
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
    </div>
    <!--end wrapper-->


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

</body>

</html>