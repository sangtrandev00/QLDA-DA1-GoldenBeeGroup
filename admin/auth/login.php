<?php
ob_start();
session_start();
include "../models/connectdb.php";
include "../models/user.php";

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <style>
    .btn-primary-login {
        background-color: #ff7f00;
        color: white;
        border: none;
    }

    .btn-primary-login:hover {
        background-color: #ff7f00;
        border: none;
    }

    .mb-0 a {
        color: #ff7f00;
    }

    .form-check-input-change:checked {
        border: #ff7f00;
        background-color: #ff7f00;
    }

    .text-end a {
        color: #ff7f00;
    }

    .images img {
        width: 70%;
    }
    </style>

    <title>GoldenBeeGroup Authentication</title>

</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center images">
                                <img src="../assets/images/error/login-admin.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Đăng nhập</h5>
                                    <p class="card-text mb-5">Đăng nhập để vào trang quản trị admin</p>
                                    <form class="form-body" action="./login.php" method="post">
                                        <!-- <div class="d-grid">
                                            <a class="btn btn-white radius-30" href="javascript:;"><span
                                                    class="d-flex justify-content-center align-items-center">
                                                    <img class="me-2" src="../assets/images/icons/search.svg" width="16"
                                                        alt="">
                                                    <span>Sign in with Google</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH
                                                EMAIL</span>
                                            <hr>
                                        </div> -->
                                        <div class="row g-3">

                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Địa chỉ email </label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input type="email" class="form-control radius-30 ps-5"
                                                        id="inputEmailAddress" placeholder="Email" name="email"
                                                        required>
                                                    <p class="error-message">
                                                        <?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Nhập mật
                                                    khẩu</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" class="form-control radius-30 ps-5"
                                                        id="inputChoosePassword" placeholder="Mật khẩu" name="password"
                                                        required>
                                                    <p class="error-message">
                                                        <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input form-check-input-change"
                                                        type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Nhớ
                                                        thông tin</label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end"> <a href="./forgot.php">Quên mật khẩu?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input type="submit" name="loginbtn"
                                                        class="btn btn-primary radius-30 btn-primary-login"
                                                        value="Đăng nhập" />
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <p class="mb-0">Vẫn chưa có tài khoản ? <a href="./">Đăng ký tại đây</a>
                                                </p>
                                            </div> -->
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


    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/pace.min.js"></script>
    <!-- Jquery Validate https://jqueryvalidation.org/documentation/ cdn lib-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>



</body>

</html>

<?php

$error = array();
if (isset($_POST['loginbtn']) && $_POST['loginbtn']) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    // Đối chiếu password
    //Validate form
    if (empty($email)) {
        $error['email'] = "Không để trống email";
    }
    if (empty($password)) {
        $error['password'] = "Không để trống password";
    }

    if (!$error) {
        $password = md5($password);
        // echo $password;
        $islogined = checkuser2($email, $password);
        // echo $islogined;
        if ($islogined === -1) {
            echo '
                <script>
                    window.alert("Email hoặc mật khẩu của bạn không đúng. Xin vui lòng nhập lại!");
                </script>
                ';
        } else {
            $kq = getuserinfo2($email, $password);
            $role = $kq[0]['vai_tro'];
            // echo $role;
            if ($role == 1 || $role == 2) {
                $_SESSION['role'] = $role;
                $_SESSION['username'] = $kq[0]['ho_ten'];
                $_SESSION['iduser'] = $kq[0]['id'];
                $_SESSION['img'] = $kq[0]['hinh_anh'];
                header('Location: ../index.php');
            } else {
                echo '
                    <script>
                        window.alert("Email hoặc của bạn không đúng. Xin vui lòng nhập lại!");
                    </script>
                    ';
            }
        }
    }
}
?>