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
                    <div class="card rounded-0 overflow-hidden shadow-none bg-white border">
                        <div class="row g-0">
                            <div
                                class="col-12 order-1 col-xl-8 d-flex align-items-center justify-content-center border-end">
                                <img src="../../admin/assets/images/error/auth-img-register3.png" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-12 col-xl-4 order-xl-2">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Đăng ký</h5>
                                    <p class="card-text mb-4">Đăng ký tài khoản để trở thành khách hàng tại shop!</p>
                                    <form class="form-body">

                                        <div class="row g-3">
                                            <div class="col-12 ">
                                                <label for="inputName" class="form-label">Họ tên của bạn</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-person-circle"></i>
                                                    </div>
                                                    <input type="email" class="form-control radius-30 ps-5"
                                                        id="inputName" placeholder="Enter Name">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Đại chỉ email</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input type="email" class="form-control radius-30 ps-5"
                                                        id="inputEmailAddress" placeholder="Email">
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
                                                        id="inputChoosePassword" placeholder="Password">
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
                                                    <button type="submit" class="btn btn-primary radius-30">Đăng
                                                        ký</button>
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <div class="login-separater text-center"> <span>OR SIGN UP WITH
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