<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <?php
// include "../site/view/components/logo.php";
// ?>
        </div>
        <div>
            <h4 class="logo-text">The Phoner</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="./index.php">
                <div class="parent-icon"><i class="lni lni-dashboard"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Danh sách các chức năng</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Sản phẩm</div>
            </a>

            <ul class="">
                <li class=""> <a href="index.php?act=productlist"><i class="bi bi-circle"></i>Danh sách sản phẩm</a>
                </li>
                <li> <a href="index.php?act=catelist"><i class="bi bi-circle"></i>Danh mục</a>
                </li>
                <li> <a href="index.php?act=addproduct"><i class="bi bi-circle"></i>Thêm sản phẩm</a>
                </li>
                <li> <a href="index.php?act=commentproductlist"><i class="bi bi-circle"></i>Bình Luận Sản Phẩm</a>
                </li>
        </li>
    </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-revenue"></i>
            </div>
            <div class="menu-title">Đơn hàng</div>
        </a>

        <ul class="">
            <li> <a href="index.php?act=orderlist"><i class="bi bi-circle"></i>Danh sách đơn hàng</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-blogger"></i>
            </div>
            <div class="menu-title">Bài viết</div>
        </a>

        <ul class="">
            <li> <a href="index.php?act=bloglist"><i class="bi bi-circle"></i>Danh sách bài viết</a>
            </li>

            <li> <a href="index.php?act=blogcate"><i class="bi bi-circle"></i>Danh mục bài viết</a>
            </li>
            <li> <a href="index.php?act=addblog"><i class="bi bi-circle"></i>Thêm Bài Viết</a></li>
            <li> <a href="index.php?act=binhluanblog"><i class="bi bi-circle"></i>Bình Luận Bài Viết</a></li>
        </ul>

    </li>
    <?php
if (isset($_SESSION['idadmin']) && $_SESSION['role'] == 1) {
    echo '
            <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-users"></i>
                </div>
                <div class="menu-title">Người dùng</div>
            </a>

            <ul class="">
                <li class=""> <a href="index.php?act=userlist"><i class="bi bi-circle"></i>Danh sách khách hàng</a>
                </li>
                <li> <a href="index.php?act=adminlist"><i class="bi bi-circle"></i>Danh sách quản trị viên</a>
                </li>
                <li> <a href="index.php?act=adduser"><i class="bi bi-circle"></i>Thêm người dùng</a>
                </li>
            </ul>
        </li>
            ';
}
?>
    <!-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-users"></i>
            </div>
            <div class="menu-title">Người dùng</div>
        </a>

        <ul class="">
            <li class=""> <a href="index.php?act=userlist"><i class="bi bi-circle"></i>Danh sách khách hàng</a>
            </li>
            <li> <a href="index.php?act=adminlist"><i class="bi bi-circle"></i>Danh sách quản trị viên</a>
            </li>
            <li> <a href="index.php?act=adduser"><i class="bi bi-circle"></i>Thêm người dùng</a>
            </li>
        </ul>
    </li> -->
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fadeIn animated bx bx-slideshow"></i>
            </div>
            <div class="menu-title">Banners/ Sliders</div>
        </a>

        <ul class="">
            <li class=""> <a href="index.php?act=bannerlist"><i class="bi bi-circle"></i>Danh sách banners</a>
            </li>
            <li> <a href="index.php?act=sliderlist"><i class="bi bi-circle"></i>Danh sách sliders</a>
            </li>
            <li> <a href="index.php?act=addbanner"><i class="bi bi-circle"></i>Thêm Banner</a>
            </li>
            <li> <a href="index.php?act=addslider"><i class="bi bi-circle"></i>Thêm Slider</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"> <i class="lni lni-wechat"></i>
            </div>
            <div class="menu-title">Phản hồi</div>
        </a>

        <ul class="">
            <li class=""> <a href="index.php?act=feedback-list"><i class="bi bi-circle"></i>Danh sách phản hồi</a>
            </li>
            <li> <a href="index.php?act=reviews-product"><i class="bi bi-circle"></i>Danh sách đánh giá sp</a>
            </li>
            <!-- <li> <a href="index.php?act=adduser"><i class="bi bi-circle"></i>Thêm người dùng</a>
            </li> -->
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"> <i class="fadeIn animated bx bx-money"></i>
            </div>
            <div class="menu-title">Voucher/Coupon</div>
        </a>

        <ul class="">
            <li class=""> <a href="index.php?act=couponlist"><i class="bi bi-circle"></i>Quản lý
                    voucher/coupon</a>
            </li>
            <li> <a href="index.php?act=addcoupon"><i class="bi bi-circle"></i>Tạo mã giảm giá</a>
            </li>
            <!-- <li> <a href="index.php?act=adduser"><i class="bi bi-circle"></i>Thêm người dùng</a>
            </li> -->
        </ul>
    </li>
    <li>
        <a href="javascript:;" href="rel:0937988510">
            <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
            </div>
            <div class="menu-title">Hỗ trợ</div>
        </a>
    </li>
    <!--end navigation-->
</aside>
<!--end sidebar -->