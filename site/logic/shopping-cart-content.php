<?php
// if (!in_array('ob_gzhandler', ob_list_handlers())) {
//     ob_start('ob_gzhandler');
// } else {
//     ob_start();
// }

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

// include $ROOT_URL . "./admin/models/category.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
?>


<div class="shopping-cart-content">
    <form action="#">

        <div id="table-content-wrapper" class="table-content table-responsive mb-50">

            <table class="text-center">
                <thead>
                    <tr>
                        <th class="product-thumbnail">Sản phẩm</th>
                        <th class="product-price">Đơn giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Thành tiền</th>
                        <th class="product-remove">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$cart_list = $_SESSION['giohang'];
$i = 0;
$subtotal = 0;
foreach ($cart_list as $cart_item) {
    # code...
    $price_item = number_format($cart_item['don_gia']);
    $total_item = number_format($cart_item['sl'] * $cart_item['don_gia']);
    // echo $cart_item['sl'] * $cart_item['don_gia'];
    $id = $cart_item['id'];

    $delcartfunc = "handleDeleteCart($id)";
    $update_cart_func_click = "updateCart('onclick')";
    $update_cart_func_keyup = "updateCart('onkeyup')";
    $subtotal += $cart_item['sl'] * $cart_item['don_gia'];
    echo '
                                                        <!-- tr -->
                                                        <tr class="product-item__row" data-id="' . $cart_item['id'] . '">
                                                                <td class="product-thumbnail">
                                                                    <div class="pro-thumbnail-img">
                                                                        <img src="../uploads/' . $cart_item['hinh_anh'] . '" alt="' . $cart_item['hinh_anh'] . '">
                                                                    </div>
                                                                    <div class="pro-thumbnail-info text-start">
                                                                        <h6 class="product-title-2">
                                                                            <a href="./index.php?act=detailproduct&id=' . $cart_item['id'] . '">' . $cart_item['tensp'] . '</a>
                                                                        </h6>
                                                                        <p>Thương hiệu: ' . $cart_item['danhmuc'] . '</p>
                                                                    </div>
                                                                </td>
                                                                <td class="product-price">' . $price_item . ' VND</td>
                                                                <td class="product-quantity">
                                                                    <div class="cart-plus-minus f-left">
                                                                    <div class="dec qtybutton" onclick="' . $update_cart_func_click . '">-</div>
                                                                        <input readonly onkeyup="' . $update_cart_func_keyup . '" type="text"  min="1" max="20" value="' . $cart_item['sl'] . '" name="qtybutton"
                                                                            class="cart-plus-minus-box">
                                                                            <div class="inc qtybutton" onclick="' . $update_cart_func_click . '">+</div>
                                                                    </div>
                                                                </td>
                                                                <td class="product-subtotal">' . $total_item . ' VND</td>
                                                                <td onclick="' . $delcartfunc . '" class="product-remove">
                                                                <a data-name="' . $cart_item['tensp'] . '" data-index="' . $i . '" href="#" data-bs-toggle="modal" data-bs-target="#cartModal"><i class="zmdi zmdi-close"></i></a>
                                                                </td>
                                                            </tr>
                                                        ';
    $i++;
}
?>
                    <a class="btn btn-outline-warning mb-3" href="./index.php?act=shop">Tiếp
                        tục mua hàng</a>
                </tbody>

            </table>
            <div id="notify-update-cart" class="alert alert-warning d-none">Xóa sản phẩm
                thành công
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- <div class="coupon-discount box-shadow p-30 mb-50">
                    <h6 class="widget-title border-left mb-20">Mã giảm giá</h6>
                    <p>Nhập mã phiếu giảm giá của bạn nếu bạn có!</p>
                    <input type="text" name="name" placeholder="Nhập mã của bạn ở đây...">
                    <button class="submit-btn-1 black-bg btn-hover-2" type="submit">Nhập mã
                        giảm giá</button>
                </div> -->
            </div>
            <div class="col-md-6">
                <div id="paymentDetails" class="payment-details box-shadow p-30 mb-50">
                    <h6 class="widget-title border-left mb-20">Thanh toán chi tiết</h6>
                    <table>
                        <tr>
                            <td class="td-title-1">Tổng phụ đơn hàng</td>
                            <td class="td-title-2"><?php echo number_format($subtotal) ?>
                                VND</td>
                        </tr>
                        <!-- <tr>
                            <td class="td-title-1">Chi phí vận chuyển</td>
                            <td class="td-title-2">00.00 VND</td>
                        </tr>
                        <tr>
                            <td class="td-title-1">Vat</td>
                            <td class="td-title-2">00.00 VND</td>
                        </tr> -->
                        <tr>
                            <td class="order-total">Tổng đơn hàng</td>
                            <td class="order-total-price">
                                <?php echo number_format($subtotal) ?> VND</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <a href="./index.php?act=checkout" class="btn btn-dark mb-5 ml-auto d-block">Thanh
            toán</a>
        <!-- Module extra --- Làm thêm -->
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="culculate-shipping box-shadow p-30">
                    <h6 class="widget-title border-left mb-20">culculate shipping</h6>
                    <p>Enter your coupon code if you have one!</p>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <input type="text" placeholder="Country">
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <input type="text" placeholder="Region / State">
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <input type="text" placeholder="Post code">
                        </div>
                        <div class="col-md-12">
                            <button class="submit-btn-1 black-bg btn-hover-2">get a
                                quote</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </form>
</div>