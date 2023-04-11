<?php
ob_start();
session_start();
include "../models/connectdb.php";
include "../models/user.php";
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include "$ROOT_URL/global.php";
include "$ROOT_URL/pdo-library.php";
include "$ROOT_URL/DAO/user.php";
// var_dump($_SESSION);
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = [];
}

if (!isset($_SESSION['toastAlert'])) {
    $_SESSION['toastAlert'] = "";
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
    <link rel="stylesheet" href="style.css">
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

    .color-regis {
        color: #ff7f00;
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
        width: 50%;
    }

    .error-message {
        color: red;
    }


    label[id*="-error"] {
        color: red;
        position: relative;
        padding: 0;
    }
    </style>
    <title>GoldenBeeGroup Authentication</title>
    <style>

    </style>
</head>

<body class="bg-surface">

    <!--start wrapper-->
    <div class="wrapper">
        <?php
include "./auth-header.php";
?>

        <?php
// session_start();

if (isset($_POST['loginbtn']) && $_POST['loginbtn']) {
    $error = array();

    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $email, $password;
    // Đối chiếu password

    // Mã hóa password

    if (empty($email)) {
        $error['email'] = "Không để trống email";
    } else if (!is_email($email)) {
        $error['email'] = "Định dạng email không chính xác!";
    } else if (!email_exist($email)) {
        $error['email'] = "Email chưa chưa đăng ký tại website!";
    }

    if (empty($password)) {
        $error['password'] = "Không để trống password";
    }

    if (!$error) {
        $password = md5($password);
        // echo $password;

        $islogined = checkuser($email, $password);
        if ($islogined === -1) {
            // $text_error = "username hoặc password không chính xác";

            echo '<div class="alert-warning alert text-center" style="">Email hoặc password không chính xác</div>';
            $_SESSION['toastAlert'] = "Email hoặc password không chính xác";
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

}
?>

        <!--start content-->
        <main class="authentication-content">
            <div class="container">
                <div class="mt-4">
                    <div class="card rounded-0 overflow-hidden shadow-none mb-5 mb-lg-0">
                        <div class="row g-0">
                            <div
                                class="col-12 order-1 col-xl-8 d-flex align-items-center justify-content-center border-end images">
                                <img src="../../admin/assets/images/error/auth-img-1.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-12 col-xl-4 order-xl-2">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title dangnhap-title">Đăng nhập</h5>
                                    <p class="card-text mb-4">Đăng nhập tài khoản để tham gia vào cửa hàng</p>
                                    <form id="login-client-form" action="./login.php" class="form-body" method="POST">

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
                                                    <p class="error-message">
                                                        <?php
if (isset($error['email'])) {
    echo $error['email'];
}
?>
                                                    </p>
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
                                                    <p class="error-message">
                                                        <?php
if (isset($error['password'])) {
    echo $error['password'];
}
?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input form-check-input-change"
                                                        type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Lưu
                                                        thông tin</label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end"> <a href="./forgot.php">Quên mật khẩu ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input type="submit" name="loginbtn"
                                                        class="btn btn-primary radius-30 btn-primary-login"
                                                        value="Đăng nhập" />
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

    <!-- Jquery Validate https://jqueryvalidation.org/documentation/ cdn lib-->
    <!-- Jquery Validate https://jqueryvalidation.org/documentation/ cdn lib-->


    <script src="../../site/assets/js/jquery.validate.min.js">

    </script>

    <script src="../../site/assets/js/additional-methods.min.js">

    </script>

    <script src="../../site/assets/js/validate.js">

    </script>
</body>

</html>



<div id="liveToast" class="toast top-0 end-0 position-fixed mt-5 me-5" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div id="toast-content" class="toast-header text-bg-warning">
        <!-- <img src="..." class="rounded me-2" alt="..."> -->
        <strong id="toast-content-header" class="me-auto">Bootstrap</strong>
        <small>1 seconds ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <?php echo $_SESSION['toastAlert'] ?>
    </div>
</div>
<button type="button" class="btn btn-primary d-none" id="liveToastBtn">Show live toast</button>
<script>
// const toastTrigger = document.getElementById('liveToastBtn')
// const toastLiveExample = document.getElementById('liveToast')

// if (toastTrigger) {
//     toastTrigger.addEventListener('click', () => {
//         const toast = new bootstrap.Toast(toastLiveExample)
//         toast.show()
//     })
// }
</script>

<?php
if (isset($error)) {
    echo '
    <script>
        const toastLiveExample = document.getElementById("liveToast");
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show();
    </script>
    ';
}

$_SESSION['error'] = [];
?>


<script>

</script>