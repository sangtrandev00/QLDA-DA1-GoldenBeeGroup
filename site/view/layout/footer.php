<style>
.wrap {
    width: 250px;
    height: 50px;
    background: #fff;
    /* position: absolute; */

    /* transform: translate(-50%, -50%); */
    border-radius: 10px;
}

.stars {
    width: fit-content;
    /* margin: 0 auto; */
    cursor: pointer;
}

.star {
    color: var(--main-color) !important;
}

.rate {
    height: 50px;
    margin-left: -5px;
    padding: 5px;
    font-size: 25px;
    position: relative;
    cursor: pointer;
}

.rate input[type="radio"] {
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 0%);
    pointer-events: none;
}

.star-over::after {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 16px;
    content: "\f005";
    display: inline-block;
    color: #d3dcff;
    z-index: 1;
    position: absolute;
    top: 17px;
    left: 10px;
}

.rate:nth-child(1) .face::after {
    content: "\f119";
    /* ☹ */
}

.rate:nth-child(2) .face::after {
    content: "\f11a";
    /* 😐 */
}

.rate:nth-child(3) .face::after {
    content: "\f118";
    /* 🙂 */
}

.rate:nth-child(4) .face::after {
    content: "\f580";
    /* 😊 */
}

.rate:nth-child(5) .face::after {
    content: "\f59a";
    /* 😄 */
}

.face {
    opacity: 0;
    position: absolute;
    width: 35px;
    height: 35px;
    background: #91a6ff;
    border-radius: 5px;
    top: -50px;
    left: 2px;
    transition: 0.2s;
    pointer-events: none;
}

.face::before {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    content: "\f0dd";
    display: inline-block;
    color: #91a6ff;
    z-index: 1;
    position: absolute;
    left: 9px;
    bottom: -15px;
}

.face::after {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    display: inline-block;
    color: #fff;
    z-index: 1;
    position: absolute;
    left: 5px;
    top: -1px;
}

.rate:hover .face {
    opacity: 1;
}
</style>


<!-- START QUICKVIEW PRODUCT -->

<div id="quickview-wrapper">
    <button type="button" class="btn btn-primary d-none" id="liveToastBtn">Show live toast</button>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product clearfix">
                        <div class="product-images">
                            <div class="main-image images">
                                <img alt="" src="assets/img/product/quickview.jpg">
                            </div>
                        </div><!-- .product-images -->

                        <div class="product-info">
                            <h1>Aenean eu tristique</h1>
                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="new-price">£160.00</span>
                                    <span class="old-price">£190.00</span>
                                </div>
                            </div>
                            <a href="single-product-left-sidebar.html" class="see-all">Xem tất cả các thông tin</a>
                            <div class="quick-add-to-cart">
                                <form action="./index.php?act=addtocart" method="post" class="cart">
                                    <div class="numbers-row">
                                        <input type="number" name="sl" id="french-hens" value="1" min="1" max="10">
                                    </div>
                                    <input class="single_add_to_cart_button" name="addtocartbtn" type="submit"
                                        value="Thêm vào giỏ hàng"></input>

                                    <input type="hidden" name="id" value="" />
                                    <input type="hidden" name="tensp" value="" />
                                    <input type="hidden" name="hinh_anh" value="" />
                                    <input type="hidden" name="danhmuc" value="" />
                                    <input type="hidden" name="iddm" value="" />
                                    <input type="hidden" name="don_gia" value="" />
                                    <input type="hidden" name="mo_ta" value="">
                                    <input type="hidden" name="giam_gia" value="">
                                </form>
                            </div>
                            <div class="quick-desc">
                                <p class="quick-desc__paragraph">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec
                                    est tristique auctor. Donec non est at libero.
                                </p>
                            </div>

                        </div><!-- .product-info -->
                    </div><!-- .modal-product -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->

    <!-- Cart Modal -->
    <button type="button" id="cartModalBtn" class="btn btn-primary d-none" data-bs-toggle="modal"
        data-bs-target="#cartModal">
        Launch demo modal
    </button>

    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cartModalLabel">Cart Modal title</h1>
                    <button type="button" class="btn-close main-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Nội dung ở đây!!!
                </div>
                <div class="modal-footer">
                    <form action="./index.php?act=deletecart&idcart=" method="post">
                        <input type="submit" name="actionbtn" class="btn btn-secondary continue-btn" value="Tiếp tục" />
                        <button type="button" class="btn btn-primary close-modal-btn main-bg-color main-border-color"
                            data-bs-dismiss="modal">Đóng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal orderDetail -->
    <button id="orderDetailModalBtn" type="button" class="btn btn-primary d-none" data-bs-toggle="modal"
        data-bs-target="#orderDetailModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="orderDetailModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body print">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary d-none main-bg-color main-bg-color">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Review modal -->

    <!-- Button trigger modal -->
    <button type="button" id="reviewModalBtn" class="btn btn-primary d-none" data-bs-toggle="modal"
        data-bs-target="#reviewModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade " id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reviewModalLabel">Đánh giá sản phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="review-product__form" action="" method="post">
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <img style="width: 60px; height: 60px;" class="review-product__img" src="" alt="hihi">
                            </div>
                            <div class="col-md-10">
                                <a href="" class="review-product__name">OPPO Reno T8</a>
                                <!-- <p class="">Loại hàng: <span class="review-product__cate-name">OPPO</span></p> -->
                                <p>Giá tiền: <span class="review-product__price">200000</span> VND</p>
                            </div>
                        </div>
                        <div class="star_rating position-relative mb-3">
                            <label for="" class="form-label">Đánh giá chất lượng sản phẩm</label>
                            <div class="wrap">
                                <div class="stars">
                                    <label class="rate">
                                        <input type="radio" name="radio1" id="star1" value="star1">
                                        <div class="face"></div>
                                        <i class="far fa-star star one-star"></i>
                                    </label>
                                    <label class="rate">
                                        <input type="radio" name="radio1" id="star2" value="star2">
                                        <div class="face"></div>
                                        <i class="far fa-star star two-star"></i>
                                    </label>
                                    <label class="rate">
                                        <input type="radio" name="radio1" id="star3" value="star3">
                                        <div class="face"></div>
                                        <i class="far fa-star star three-star"></i>
                                    </label>
                                    <label class="rate">
                                        <input type="radio" name="radio1" id="star4" value="star4">
                                        <div class="face"></div>
                                        <i class="far fa-star star four-star"></i>
                                    </label>
                                    <label class="rate">
                                        <input type="radio" name="radio1" id="star5" value="star5">
                                        <div class="face"></div>
                                        <i class="far fa-star star five-star"></i>
                                    </label>
                                </div>
                                <input type="hidden" id="star-rating-hidden" name="review_star_rating" value="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Thêm hình ảnh nhận hàng</label>
                            <input type="file" class="form-control" name="review_img" id="review-image" placeholder=""
                                aria-describedby="fileHelpId">
                            <!-- <div id="fileHelpId" class="form-text">Help text</div> -->
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nội dung đánh giá</label>
                            <textarea class="form-control" placeholder="Giống với mô tả,..." name="review_content" id=""
                                rows="8"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="save-review-btn btn btn-primary main-bg-color main-border-color">Lưu
                        đánh giá</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END QUICKVIEW PRODUCT -->

<!-- START FOOTER AREA -->
<footer id="footer" class="footer-area section">
    <div class="footer-top">
        <div class="container-fluid">
            <div class="plr-150">
                <div class="footer-top-inner gray-bg">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="single-footer footer-about">
                                <div class="footer-logo">
                                    <!-- <img src="assets/img/logo/logo.png" alt=""> -->
                                    <!-- Place logo here!!! -->
                                    <h3>ThePhoner Store</h3>
                                </div>
                                <div class="footer-brief">
                                    <p>Thephonerstore cửa hàng chuyên cung cấp điện thoại chính hãng, giá tốt. Hãy đặt
                                        hàng tại store của chúng tôi để nhận ưu đãi hấp dẫn nhé</p>
                                    <p>Địa chỉ: 19/7c Đông Tác, Dĩ An, Bình Dương</p>
                                    <p>Email: admin@thephonerstore.online </p>
                                    <p>Số điện thoại: 0937988510 </p>
                                </div>
                                <ul class="footer-social">
                                    <li>
                                        <a class="facebook" href="" title="Facebook"><i
                                                class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="google-plus" href="" title="Google Plus"><i
                                                class="zmdi zmdi-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 d-block d-xl-block d-lg-none d-md-none">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">Chính sách</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="index.php?act=csbanhang"><i class="zmdi zmdi-circle"></i><span>Bán
                                                hàng</span></a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=csdoitra"><i class="zmdi zmdi-circle"></i><span>Đổi
                                                trả</span></a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=csbaohanh"><i class="zmdi zmdi-circle"></i><span>Bảo
                                                hành</span></a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=csbaomat"><i class="zmdi zmdi-circle"></i><span>Bảo
                                                mật</span></a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=cssudung"><i class="zmdi zmdi-circle"></i><span>Sử
                                                dụng</span></a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=cskiemhang"><i class="zmdi zmdi-circle"></i><span>Kiểm
                                                hàng</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">Tài khoản</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="./index.php?act=myaccount"><i class="zmdi zmdi-circle"></i><span>Tài
                                                khoản của
                                                tôi</span></a>
                                    </li>
                                    <li>
                                        <a href="./index.php?act=wishlist"><i class="zmdi zmdi-circle"></i><span>Sản
                                                phẩm yêu
                                                thích</span></a>
                                    </li>
                                    <li>
                                        <a href="./index.php?act=shopcart"><i class="zmdi zmdi-circle"></i><span>Giỏ
                                                hàng của
                                                tôi</span></a>
                                    </li>
                                    <li>
                                        <a href="./index.php?act=login"><i class="zmdi zmdi-circle"></i><span>Đăng
                                                nhập</span></a>
                                    </li>
                                    <li>
                                        <a href="./index.php?act=signup"><i class="zmdi zmdi-circle"></i><span>Đăng
                                                ký</span></a>
                                    </li>
                                    <li>
                                        <a href="./index.php?act=checkout"><i class="zmdi zmdi-circle"></i><span>Thanh
                                                toán</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">Liên hệ với chúng tôi</h4>
                                <div class="footer-message">
                                    <form action="#">
                                        <input type="text" name="name" placeholder="Tên của bạn ...">
                                        <input type="text" name="email" placeholder="Email của bạn ...">
                                        <textarea class="height-80" name="message"
                                            placeholder="Để lại lời nhắn ở đây..."></textarea>
                                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">Gửi tin
                                            nhắn</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom black-bg">
        <div class="container-fluid">
            <div class="plr-185">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p class="copy-text"> © 2022 <strong>ThePhoner Store</strong> Tạo bởi <i
                                        class="zmdi zmdi-favorite" style="color: red;" aria-hidden="true"></i>
                                    By <a class="company-name" href="#">
                                        <strong> Golden Bee Group</strong></a>.</p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-payment text-end">
                                <li>
                                    <a href="#"><img src="assets/img/payment/1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/payment/2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/payment/3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/payment/4.jpg" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER AREA -->

<!-- Placed JS at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<!-- Bootstrap framework js -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- jquery.nivo.slider js -->
<script src="assets/lib/js/jquery.nivo.slider.js"></script>
<!-- All js plugins included in this file. -->
<script src="assets/js/plugins.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="assets/js/main.js"></script>
<!-- Data table -->
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/table-datatable.js"></script>

<!-- Custom config javascript -->
<script src="assets/js/config.js"></script>
<script src="assets/js/validate.js"></script>
<script src="assets/js/pages/account.js"></script>
<script src="assets/js/pages/checkout.js"></script>
<script>
$(function() {

    $(document).on({
        mouseover: function(event) {
            $(this).find('.far').addClass('star-over');
            $(this).prevAll().find('.far').addClass('star-over');
        },
        mouseleave: function(event) {
            $(this).find('.far').removeClass('star-over');
            $(this).prevAll().find('.far').removeClass('star-over');
        }
    }, '.rate');


    $(document).on('click', '.rate', function() {
        if (!$(this).find('.star').hasClass('rate-active')) {
            $(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
            $(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
            $(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
        } else {
            console.log('has', this);
            const starRating = $(this).find(".star").attr("class");

            console.log(starRating.includes("five-star"));
            const starRatingHiden = document.getElementById("star-rating-hidden");
            if (starRating.includes("five-star")) {
                $("#star-rating-hidden").val("5");
            } else if (starRating.includes("four-star")) {
                $("#star-rating-hidden").val("4");
            } else if (starRating.includes("three-star")) {
                $("#star-rating-hidden").val("3");
            } else if (starRating.includes("two-star")) {
                $("#star-rating-hidden").val("2");
            } else if (starRating.includes("one-star")) {
                $("#star-rating-hidden").val("1");
            }
        }
    });

});
</script>
<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        // case 'settingaccount':
        // case 'updateaccount':
        //     echo '
        //         <script src="assets/js/pages/account.js"></script>
        //     ';
        //     break;
        case 'detailproduct':
            # code...
            echo '
                <script src="assets/js/pages/detailproduct.js"></script>
            ';
            break;
        case 'shop':
            # code...
            echo '
            <script src="assets/js/pages/shop.js"></script>
        ';
            break;
        case 'viewcart':
        case 'deletecart':
        case 'shoppingcart':
        case 'checkout':
        case 'addtocart':
        case 'wishlist':
            echo '
                <script src="assets/js/pages/cart.js"></script>
            ';
            break;
        case 'shop':
            echo '
            <script src="assets/js/pages/shop.js"></script>
        ';
            break;
        default:
            # code...
            echo '
                <script src="assets/js/pages/home.js"></script>
            ';
            break;
    }
} else {
    echo '
        <script src="assets/js/pages/home.js"></script>
    ';
}
?>
</body>

</html>