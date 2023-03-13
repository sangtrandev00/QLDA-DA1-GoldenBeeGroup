<?php
ob_start();
session_start();
include "../models/connectdb.php";
include "../models/user.php";
include "../../pdo-library.php";
include "../../DAO/user.php";
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

    <title>Onedash - Bootstrap 5 Admin Template</title>
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
                                <img src="../../admin/assets/images/error/forgot-password-frent-img.jpg"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Quên mật khẩu</h5>
                                    <p class="card-text mb-5">Hãy nhập địa chỉ email của bạn để lấy lại mật khẩu</p>
                                    <form class="form-body" action="./forgot.php" method="POST">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailid" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control radius-30"
                                                    id="inputEmailid" placeholder="Email">
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid gap-3">
                                                    <input type="submit" name="forgotbtn"
                                                        class="btn btn-primary radius-30" value="Gửi" />
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


</body>

</html>

<?php
if (isset($_POST['forgotbtn']) && $_POST['forgotbtn']) {
    $email = $_POST['email'];

    // Validate

    if (empty($email)) {
        $error['email'] = "Không để trống email";
    }
    // else if (is_email($email)) {
    //     $error['email'] = "Định dạng email chưa chính xác!";
    // }

    if (!$error) {
        if (email_exist($email)) {
            // if (email_exist_by_username($email, $username)) {
            $title = "Mã Code lấy lại mật khẩu";
            $messageCode = random_int(100000, 999999);
            $_SESSION['emailreset'] = $email;
            $_SESSION['verifycode'] = $messageCode;
            sendmail($email, $title, $messageCode);
            header("location: ./verify-code.php");
            // } else {
            //     echo '<div class="alert alert-danger" >Email của bạn không đúng với tài khoản</div>';
            // }
        } else {
            echo '<div class="alert alert-danger" >Email của bạn không tồn tại</div>';
        }
    }
}
?>