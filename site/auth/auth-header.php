<style>
.nav-item a {
    font-size: 16px;
    font-weight: 500;
}

.dangnhap .bg-dangnhapp {
    background-color: #fd7e00;
    border: none;
    color: white;
}
</style>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-0 border-bottom">
        <div class="container">
            <a class="navbar-brand" href="../../index.php">
                <?php
include "../view/components/logo.php";
?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Trang chủ</a>
                    </li> -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="../../index.php?act=shop">Cửa
                            hàng</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../../index.php?act=blog">
                            Bài viết
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php?act=about-us">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php?act=contact">Liên hệ</a>
                    </li> -->
                </ul>

                <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                            English
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">Support</a>
                    </li>
                </ul> -->
                <div class="d-flex ms-3 gap-3 dangnhap">
                    <a href="./login.php" class="btn btn-primary btn-m px-4 radius-30 bg-dangnhapp">Đăng nhập</a>
                    <a href="./signup.php" class="btn btn-white btn-m px-4 radius-30">Đăng ký</a>
                </div>
            </div>
        </div>
    </nav>
</header>