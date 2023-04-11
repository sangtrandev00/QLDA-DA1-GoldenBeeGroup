<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/category.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
?>

<div class="wishlist-content">
    <div class="table-content table-responsive mb-50">
        <table class="text-center">
            <thead>
                <tr>
                    <th class="product-thumbnail">Sản phẩm</th>
                    <th class="product-price">Đơn giá</th>
                    <th class="product-stock">Còn lại trong kho</th>
                    <th class="product-add-cart">Thêm vào giỏ hàng</th>
                    <th class="product-remove">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
$wish_list = $_SESSION['wishlist'];

// var_dump($wish_list)
foreach ($wish_list as $item) {
    # code...
    $product_item = product_select_by_id($item['id']);
    // $cate_name = catename_select_by_id($item['ma_danhmuc'])['ten_danhmuc'];
    $old_price = number_format($product_item['don_gia']);
    $new_price = number_format($product_item['don_gia'] * (1 - $product_item['giam_gia'] / 100));
    $ton_kho = $product_item['ton_kho'];
    $addcartfunc = "handleAddCart('addtocart', 'addcart')";
    echo '
                                                        <!-- tr -->
                                                            <tr>
                                                                <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="../uploads/' . $item['hinh_anh'] . '" alt="' . $item['hinh_anh'] . '">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-start">
                                                                    <h6 class="product-title-2">
                                                                        <a href="./index.php?act=detailproduct&id=' . $item['id'] . '">' . $item['tensp'] . '</a>
                                                                    </h6>
                                                                    <p>Thương hiệu: ' . $item['danhmuc'] . '</p>
                                                                    <p>số lượng: ' . $item['sl'] . '</p>
                                                                </div>
                                                                </td>

                                                                <td class="product-price">' . $new_price . ' VND</td>
                                                                <td class="product-stock text-uppercase">' . $ton_kho . '</td>
                                                                <td class="product-add-cart">
                                                                    <form action="" method="post">
                                                                        <a onclick="' . $addcartfunc . '" class="add-to-cart" href="#" title="Add To Cart">
                                                                            <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                                        </a>
                                                                        <input type="submit" class="d-none add-to-cart__submit-input" name="addtocartbtn" value="Thêm vào giỏ hàng"/>

                                                                        <input type="hidden" name="id" value="' . $item['id'] . '"/>
                                                                        <input type="hidden" name="tensp" value="' . $item['tensp'] . '"/>
                                                                        <input type="hidden" name="hinh_anh" value="' . $item['hinh_anh'] . '"/>
                                                                        <input type="hidden" name="sl" value="' . $item['sl'] . '">
                                                                        <input type="hidden" name="danhmuc" value="' . $item['danhmuc'] . '"/>
                                                                        <input type="hidden" name="don_gia" value="' . $item['don_gia'] . '"/>
                                                                        <input type="hidden" name="giam_gia" value="' . $product_item['giam_gia'] . '">
                                                                        </form>

                                                                </td>

                                                                <td class="product-remove">
                                                                    <a onclick="handleDeleteWishlist(' . $item['id'] . ')" data-name="' . $item['tensp'] . '" href="#" ><i class="zmdi zmdi-close"></i></a>
                                                                </td>


                                                                </tr>
                                                        ';
}
?>
            </tbody>

        </table>
        <div class="d-flex justify-content-end">
            <!-- <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">Thêm tất cả vào
                                                giỏ</button> -->
        </div>
    </div>
</div>