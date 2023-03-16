<?php
if (!in_array('ob_gzhandler', ob_list_handlers())) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="total-cart-in">

    <div class="cart-toggler">
        <a href="./index.php?act=viewcart">
            <?php
$amount_carts = array_reduce($_SESSION['giohang'], function ($prev_value, $curr_val) {
    // var_dump($prev_value);
    // var_dump($curr_val['sl']);

    return $curr_val['sl'] + $prev_value;
}, 0);
?>
            <span class="cart-quantity"><?php echo $amount_carts ?></span><br>
            <span class="cart-icon">
                <i class="zmdi zmdi-shopping-cart-plus"></i>
            </span>
        </a>
    </div>
    <ul id="topCartInnerWrapper" class="top-cart-inner-wrapper">
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
    $idcart = $cart_item['id'];
    $delcartfunc = "handleDeleteCart($idcart)";
    echo '
                                                            <!-- single-cart -->
                                                                <div class="single-cart clearfix">
                                                                    <div class="cart-img f-left">
                                                                        <a href="./index.php?act=detailproduct&id=' . $cart_item['id'] . '" class="" style="max-width: 200px;">
                                                                            <img style="width: 80px; height: 80px;" src="../uploads/' . $cart_item['hinh_anh'] . '"
                                                                                alt="Cart Product" />
                                                                        </a>
                                                                        <div class="del-icon">
                                                                            <a onclick="' . $delcartfunc . '" href="./index.php?act=deletecart&idcart=">
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
    </ul>
</div>