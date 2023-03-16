<li>
    <div class="top-cart-inner your-cart">
        <h5 class="text-capitalize">Giỏ hàng của bạn</h5>
    </div>
</li>
<li>
    <div class="total-cart-pro">

        <?php
$cart_list = $_SESSION['giohang'];
// var_dump($cart_list);
$total_cart = 0;
$i = 0;
foreach ($cart_list as $cart_item) {
    # code...
    $total_cart += $cart_item['sl'] * $cart_item['don_gia'];
    $price_item = number_format($cart_item['don_gia']);
    echo '
                                                            <!-- single-cart -->
                                                                <div class="single-cart clearfix">
                                                                    <div class="cart-img f-left">
                                                                        <a href="./index.php?act=detailproduct&id=' . $cart_item['id'] . '" class="" style="max-width: 200px;">
                                                                            <img style="width: 80px; height: 80px;" src="../uploads/' . $cart_item['hinh_anh'] . '"
                                                                                alt="Cart Product" />
                                                                        </a>
                                                                        <div class="del-icon">
                                                                            <a href="./index.php?act=deletecart&idcart=">
                                                                                <i class="zmdi zmdi-close"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cart-info f-left">
                                                                        <h6 class="text-capitalize text-truncate" style="max-width: 200px;">
                                                                            <a href="#">' . $cart_item['tensp'] . '</a>
                                                                        </h6>
                                                                        <p>
                                                                            <span>Sl <strong>:</strong></span>' . $cart_item['sl'] . '
                                                                        </p>
                                                                        <p>
                                                                            <span>Giá <strong>:</strong></span> ' . $price_item . ' VND
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            ';
    $i++;
}
?>
    </div>
</li>
<li>
    <div class="top-cart-inner subtotal">
        <h4 class="text-uppercase g-font-2">
            Tổng tiền =
            <span><?php echo number_format($total_cart); ?>VND</span>
        </h4>
    </div>
</li>
<li>
    <div class="top-cart-inner view-cart">
        <h4 class="text-uppercase">
            <a href="./index.php?act=viewcart">Xem giỏ hàng</a>
        </h4>
    </div>
</li>
<li>
    <div class="top-cart-inner check-out">
        <h4 class="text-uppercase">
            <a href="./index.php?act=checkout">Thanh toán</a>
        </h4>
    </div>
</li>