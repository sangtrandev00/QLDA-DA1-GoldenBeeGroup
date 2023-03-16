<?php
// ob_start();
// session_start();

?>

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

    $subtotal += $cart_item['sl'] * $cart_item['don_gia'];
    echo '
                                                        <!-- tr -->
                                                        <tr class="product-item__row">
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
                                                                        <input type="text" value="' . $cart_item['sl'] . '" name="qtybutton"
                                                                            class="cart-plus-minus-box">
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

    </tbody>
</table>