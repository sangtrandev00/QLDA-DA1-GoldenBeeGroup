<!--start overlay-->
<div class="overlay nav-toggle-icon"></div>
<!--end overlay-->


<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->




<!-- START QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Button trigger modal -->
    <button type="button" id="quickViewTableBtn" class="btn btn-primary d-none" data-bs-toggle="modal"
        data-bs-target="#productsModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="quickViewTable" tabindex="-1" aria-labelledby="quickViewTableLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="quickViewTableLabel">Xem nhanh</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

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
                        <input type="submit" name="actionbtn" class="btn btn-secondary action-btn d-none"
                            value="Tiếp tục" />
                        <button type="button" class="btn btn-primary close-modal-btn"
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
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#alertModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="alertModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $_SESSION['alert']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="continue-btn btn btn-primary d-none">Tiếp tục</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END QUICKVIEW PRODUCT -->

<!--start footer-->
<footer class="footer">
    <div class="footer-text">
        GoldenBeeGroup . Make By GoldenBeeGroup Team
    </div>
</footer>
<!--end footer-->


</div>
<!--end wrapper-->


<!-- Bootstrap bundle JS -->

<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/additional-methods.min.js">

</script>

<!--  -->

<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="assets/plugins/ckeditor/ckeditor.js"></script>
<script src="assets/js/pace.min.js"></script>

<!-- Data table -->
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/table-datatable.js"></script>

<!-- Chart -->
<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apex-custom.js"></script>
<!-- Slick slider -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--app-->
<script src="assets/js/app.js"></script>
<script src="assets/js/index.js"></script>
<!-- <script src="assets/js/index4.js"></script> -->
<script src="assets/js/pages/product.js"></script>
<script src="assets/js/pages/common.js"></script>

<script src="assets/js/pages/validate.js">

</script>
<!-- Custom javasscript -->
<script>
new PerfectScrollbar(".best-product")
</script>

<script>

</script>

<?php

if ($_SESSION['alert'] != "") {
    // echo $_SESSION['alert'];
    echo "
        <script>
            var alertModalNotify = new bootstrap.Modal('#alertModal');
            alertModalNotify.show();
        </script>
   ";
}

$_SESSION['alert'] = "";

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'catelist':
        case 'addcate':
        case 'editcate':
        case 'updatecate':
        case 'subcatelist':
        case 'deletesubcate':
        case 'updatesubcate':
        case 'deletecate':
            echo '
            <script src="assets/js/pages/category.js"></script>
          ';
            break;

        case 'addproduct':
        case 'productlist':
        case 'updateproduct':
        case 'editproduct':
        case 'deleteproduct':
        case 'reviews-product':
            echo '

        ';

            break;
            break;
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
        case 'orderlist':
        case 'editorder':
        case 'deleteorder':
            echo '
                <script src="assets/js/pages/order.js"></script>
            ';
            break;
        default:
            # code...
            echo '
              <script src="assets/js/pages/home.js"></script>
              <script src="assets/js/pages/order.js"></script>
          ';
            break;
    }
} else {
    echo '
      <script src="assets/js/pages/home.js"></script>
      <script src="assets/js/pages/order.js"></script>
  ';
}
?>


</body>

</html>