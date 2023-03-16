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
    <style>
        .bg-dangky{
            background-color: #ff7f00;
            border: none;
        }
        .bg-dangky:hover{
            background-color: #ff7f00;
        }
        .text-center a{
            color: #ff7f00;
        }
        .images img{
            width: 50%;
        }
    </style>

    <title>Bootstrap 5 Admin Template</title>
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
                <div class="my-4">
                    <div class="card rounded-0 overflow-hidden shadow-none bg-white border">
                        <div class="row g-0">
                            <div
                                class="col-12 order-1 col-xl-8 d-flex align-items-center justify-content-center border-end images bg-surface">
                                <img src="../../admin/assets/images/error/auth-img-regis-3.png" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-12 col-xl-4 order-xl-2">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Đăng ký</h5>
                                    <p class="card-text mb-4">Đăng ký tài khoản để trở thành khách hàng tại shop!</p>
                                    <form action="./signup.php" class="form-body" method="POST">

                                        <div class="row g-3">
                                            <div class="col-12 ">
                                                <label for="inputName" class="form-label">Họ tên của bạn</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-person-circle"></i>
                                                    </div>
                                                    <input type="text" name="fullname"
                                                        class="form-control radius-30 ps-5" id="inputName"
                                                        placeholder="Nhập họ tên của bạn">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Địa chỉ email</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input type="email" class="form-control radius-30 ps-5"
                                                        id="inputEmailAddress" placeholder="Email" name="email">
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
                                                    <input type="password" name="password"
                                                        class="form-control radius-30 ps-5" id="inputChoosePassword"
                                                        placeholder="Mật khẩu">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChooseRePassword" class="form-label">Nhập lại mật
                                                    khẩu</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" name="reenterpass"
                                                        class="form-control radius-30 ps-5" id="inputChooseRePassword"
                                                        placeholder="Nhập lại mật khẩu">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Tôi
                                                        đồng ý với điều khoản và điều kiện</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input type="submit" name="signupbtn"
                                                        class="btn btn-primary radius-30 bg-dangky" value="Đăng ký" />
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <p class="mb-0">Đã có tài khoản ? <a href="./login.php">Đăng nhập
                                                        tại đây</a></p>
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
// include "./auth-footer.php";
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

$error = array();

if (isset($_POST['signupbtn']) && $_POST['signupbtn']) {
    $fullname = $_POST['fullname'];
    // $homeaddress = $_POST['address'];
    // $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $reenterpass = $_POST['reenterpass'];

    // Validate at server

    echo $fullname, $password, $email, $reenterpass;

    if (strlen($fullname) == 0) {
        $error['fullname'] = "Không để trống họ tên!";
    } else if (strlen($fullname) > 30) {
        $error['fullname'] = "Họ tên không vượt quá 30 ký tự!";
    }

    if (empty($email)) {
        $error['email'] = "không để trống email";
    }
    // else if (!is_email($email)) {
    //     $error['email'] = "Email không đúng định dạng!";
    // }
    // else if (email_exist($email)) {
    //     $error['email'] = "Email của bạn đã tồn tại!";
    //     echo "Email của bạn đã tồn tại!";
    // }

    // if (strlen($phonenumber) == 0) {
    //     $error['phonenumber'] = "Không để trống số điện thoại!";
    // } else if (!validating($phonenumber)) {
    //     $error['phonenumber'] = "Định dạng số điện thoại không chính xác!";
    // }

    if (empty($password)) {
        $error['password'] = "không để trống password!";
    }
    if (empty($reenterpass)) {
        $error['reenterpass'] = "không để trống repassword!";
    }

    if (!$error) {
        $is_inserted = user_register($fullname, $email, $password);

        echo 'Register successfully!';
        // if ($is_inserted) {
        //     echo '<div class="register-account-success d-none" style="">HELLO</div>';
        // }
        if ($is_inserted) {
            echo '<div class="alert alert-success">Sign up successfully</div>';
        }
        // Send email to success account
    }

}
?>