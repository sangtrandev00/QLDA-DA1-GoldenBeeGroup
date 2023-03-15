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

    <!-- Bootstrap CSS -->
    <link href="../../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../admin/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../../admin/assets/css/style.css" rel="stylesheet" />
    <link href="../../admin/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="../../admin/assets/css/pace.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <title>Bootstrap 5 Admin Template</title>
    <style>
    .btn.btn-primary {
        background-color: orange;
        border: 1px solid orange;
    }
    </style>
    <style>

    </style>
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
                    <div class="card rounded-0 overflow-hidden shadow-none border mb-5 mb-lg-0">
                        <div class="row g-0">
                            <div
                                class="col-12 order-1 col-xl-8 d-flex align-items-center justify-content-center border-end">
                                <img src="../../admin/assets/images/error/auth-img-7.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-12 col-xl-4 order-xl-2">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Đăng nhập</h5>
                                    <p class="card-text mb-4">Đăng nhập tài khoản để tham gia vào cửa hàng</p>
                                    <form action="./login.php" class="form-body" method="POST">

                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Địa chỉ email</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input type="email" name="email" class="form-control radius-30 ps-5"
                                                        id="inputEmailAddress" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Nhập
                                                    Mật khẩu</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" name="password"
                                                        class="form-control radius-30 ps-5" id="inputChoosePassword"
                                                        placeholder="Mật khẩu">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked="">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">lưu
                                                        thông tin</label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end"> <a href="./forgot.php">Quên mật khẩu ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input type="submit" name="loginbtn"
                                                        class="btn btn-primary radius-30" value="Đăng nhập" />
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <div class="login-separater text-center"> <span>OR SIGN IN WITH
                                                        EMAIL</span>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex align-items-center gap-3 justify-content-center">
                                                    <button type="button" class="btn btn-white text-danger"><i
                                                            class="bi bi-google me-0"></i></button>
                                                    <button type="button" class="btn btn-white text-primary"><i
                                                            class="bi bi-linkedin me-0"></i></button>
                                                    <button type="button" class="btn btn-white text-info"><i
                                                            class="bi bi-facebook me-0"></i></button>
                                                </div>
                                            </div> -->
                                            <div class="col-12 text-center">
                                                <p class="mb-0">Vẫn chưa có tài khoản? <a href="./signup.php">Đăng ký ở
                                                        đây</a></p>
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


    <!-- Bootstrap bundle JS -->
    <script src="../../admin/assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="../../admin/assets/js/jquery.min.js"></script>
    <script src="../../admin/assets/js/pace.min.js"></script>


</body>

</html>

<?php
// session_start();

if (isset($_POST['loginbtn']) && $_POST['loginbtn']) {
    $error = array();

    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $email, $password;
    // Đối chiếu password

    // Mã hóa password

    if (empty($email)) {
        $error['email'] = "Không để trống email";
    }

    if (empty($password)) {
        $error['password'] = "Không để trống password";
    }

    $password = md5($password);
    // echo $password;

    $islogined = checkuser($email, $password);
    echo $islogined;
    if ($islogined === -1) {
        // $text_error = "username hoặc password không chính xác";

        echo '<div class="alert-warning alert" style="">username hoặc password không chính xác</div>';
        // include "./view/login-page.php";
    } else {
        $kq = getuserinfo($email, $password);
        // var_dump($kq);
        $role = $kq['vai_tro'];
        // echo $role;
        // if ($role == 3) {
        $_SESSION['role'] = $role;
        $_SESSION['email'] = $kq['email'];
        $_SESSION['iduser'] = $kq['id'];
        $_SESSION['ho_ten'] = $kq['ho_ten'];
        header('location: ../../index.php');
        // } else {
        // }

    }
}
?>