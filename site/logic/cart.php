<?php

ob_start();
session_start();

include "../../DAO/product.php";
include "../../pdo-library.php";

switch ($_GET['act']) {
    case 'addtowishlist':
        // if (isset($_SESSION['iduser'])) {
        // echo 'hello wishlist action';

        $id = $_POST['id'];
        $product_item = product_select_by_id($id);
        $tendanhmuc = $_POST['danhmuc'];
        $tensp = $product_item['tensp'];
        $hinh_anh = $_POST['hinh_anh'];
        $don_gia = $product_item['don_gia'];
        $giam_gia = $product_item['giam_gia'];
        $gia_moi = $don_gia * (1 - $giam_gia / 100);
        $sl = $_POST['sl'];

        // if (isset($_POST['cart_quantity']) && ($_POST['cart_quantity'] > 0)) {
        //     $sl = $_POST['cart_quantity'];

        //     $product = product_select_by_id($id);
        //     if ($sl > $product['ton_kho']) {
        //         $sl = $product['ton_kho'];
        //         $GLOBALS['changed_cart'] = true;
        //     }

        // } else {
        //     $sl = 1;
        // }

        $flag = 0;

        // Kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không ?
        // Nếu có chỉ cập nhất lại số lượng

        // Ngược lại add mới sp vào giỏ hàng

        // Khởi tạo một mảng con trước khi đưa vào giỏ

        $i = 0;

        foreach ($_SESSION['wishlist'] as $itemsp) {
            # code...
            // var_dump($itemsp);

            if ($itemsp['id'] === $id) {
                $slnew = $sl + $itemsp['sl'];

                // echo "So LUONG MOI: " . $slnew;

                $_SESSION['wishlist'][$i]['sl'] = $slnew;
                $flag = 1;

                break;
            }

            $i++;
        }

        if ($flag == 0) {
            $itemsp = array("id" => $id, "tensp" => $tensp, "danhmuc" => $tendanhmuc, "hinh_anh" => $hinh_anh, "sl" => $sl, "don_gia" => $gia_moi);
            // $itemsp = array($id, $tensp, $img, $gia, $sl, $tendanhmuc);
            // array_push($_SESSION['giohang'], $itemsp);
            // $_SESSION['giohang'][] = $itemsp;

            $_SESSION['wishlist'][] = $itemsp;

        }

        // header('location: index.php?act=viewcart'); // Tại sao lại có dòng này ?
        var_dump($_SESSION['wishlist']);
        // } else {
        //     header('location: ./auth/login.php');
        // }
        break;

    case 'updatecart':
        var_dump($_POST);
        // if (isset($_POST['updatecartbtn']) && $_POST['updatecartbtn']) {

        // echo $GLOBALS['changed_cart'];
        // echo $_POST['changedcart'];

        // $GLOBALS['changed_cart'] = $_POST['changedcart'];
        // $qtylist = $_POST['qtyhidden'];

        // $i = 0;
        // $flag = 0;

        // foreach ($_SESSION["giohang"] as $rowitem) {

        //     $_SESSION['giohang'][$i][4] = $qtylist[$i];
        //     $product = product_select_by_id($rowitem[0]);
        //     if ($_SESSION['giohang'][$i][4] > $product['ton_kho']) {
        //         // UPDATE số lượng trên session luôn, khi đối chiếu với tồn kho.
        //         $_SESSION['giohang'][$i][4] = $product['ton_kho'];
        //         $flag = 1;
        //         break;
        //     }
        //     $i++;
        // }

        // if ($flag == 1) {
        //     echo '<div class="alert alert-danger text-center p-3">Số lượng sản phẩm trong giỏ hàng đã thay đổi, do lượng sản phẩm tồn kho không đủ. Vui lòng <a href="index.php?act=addtocart" class="btn btn-warning">tải lại</a> giỏ hàng</div>';
        // } else {
        //     if (!$_POST['changedcart']) {
        //         echo '<div class="alert alert-success">Cập nhật giỏ hàng thành công!</div>';
        //     }
        //     include "./view/shopcart-page.php";
        // }

        // echo '<div class="update-cart-success d-none" style="">HELLO</div>';
        // } else {
        //     "HELLO world";
        // }

        $cart_list = $_SESSION['giohang'];
        $i = 0;
        foreach ($cart_list as $cart_item) {
            # code...
            if ($cart_item['id'] == $_POST['id']) {
                if ($_POST['type'] == "minus") {
                    $slnew = $cart_item['sl'] - 1;
                    if ($slnew <= 1) {
                        $slnew = 1;
                    }
                } else {
                    $slnew = $cart_item['sl'] + 1;
                    // Handle tồn kho ở đây!
                }
                $_SESSION['giohang'][$i]['sl'] = $slnew;
            }
            $i++;
        }

        var_dump($_SESSION['giohang']);

        break;
    case 'deletecart':
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            var_dump($_POST['id']);
            // var_dump(json_encode($_POST));

            // $id = json_encode($_POST);
            $cart_list = $_SESSION['giohang'];
            $idcart = $_POST['id'];
            function filter_cart($item)
        {
                return $item['id'] != $_POST['id'];
            }

            $cartResult = array_filter($cart_list, "filter_cart");
            // var_dump($result);

            // UPDATE Giohang;
            $_SESSION['giohang'] = $cartResult;
            // $result = array('header' => json_decode(include "./header.php"), 'topcart' => json_decode(include "./topcart.php"), 'tablecart' => json_decode(include "./table-cart.php"));

            $result = array(
                "message" => "Xóa sản phẩm thành công",
                "status" => 1,
            );

            // echo json_encode($result);

            // include "./table-cart.php";

        } else {

        }

        break;
    case 'deletewishlist':
        if (isset($_SESSION['wishlist']) && count($_SESSION['wishlist']) > 0) {
            var_dump($_POST['id']);
            // var_dump(json_encode($_POST));

            // $id = json_encode($_POST);
            $cart_list = $_SESSION['wishlist'];
            $idwishlist = $_POST['id'];
            function filter_wishlist($item)
        {
                return $item['id'] != $_POST['id'];
            }

            $wishlistResult = array_filter($cart_list, "filter_wishlist");
            // var_dump($result);

            // UPDATE Giohang;
            $_SESSION['wishlist'] = $wishlistResult;
            // $result = array('header' => json_decode(include "./header.php"), 'topcart' => json_decode(include "./topcart.php"), 'tablecart' => json_decode(include "./table-cart.php"));

            $result = array(
                "message" => "Xóa sản phẩm thành công",
                "status" => 1,
            );

            // echo json_encode($result);

            // include "./table-cart.php";

        } else {

        }

        break;
    case 'addtocart':
        // if (isset($_SESSION['iduser'])) {
        $id = $_POST['id'];
        $product_item = product_select_by_id($id);
        $tendanhmuc = $_POST['danhmuc'];
        $tensp = $product_item['tensp'];
        $hinh_anh = $_POST['hinh_anh'];
        $don_gia = $product_item['don_gia'];
        $giam_gia = $product_item['giam_gia'];
        $gia_moi = $don_gia * (1 - $giam_gia / 100);
        $sl = $_POST['sl'];

        // if (isset($_POST['cart_quantity']) && ($_POST['cart_quantity'] > 0)) {
        //     $sl = $_POST['cart_quantity'];

        //     $product = product_select_by_id($id);
        //     if ($sl > $product['ton_kho']) {
        //         $sl = $product['ton_kho'];
        //         $GLOBALS['changed_cart'] = true;
        //     }

        // } else {
        //     $sl = 1;
        // }

        $flag = 0;

        // Kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không ?
        // Nếu có chỉ cập nhất lại số lượng

        // Ngược lại add mới sp vào giỏ hàng

        // Khởi tạo một mảng con trước khi đưa vào giỏ

        $i = 0;

        foreach ($_SESSION['giohang'] as $itemsp) {
            # code...
            // var_dump($itemsp);

            if ($itemsp['id'] === $id) {
                $slnew = $sl + $itemsp['sl'];

                // echo "So LUONG MOI: " . $slnew;

                $_SESSION['giohang'][$i]['sl'] = $slnew;
                $flag = 1;

                break;
            }

            $i++;
        }

        if ($flag == 0) {
            $itemsp = array("id" => $id, "tensp" => $tensp, "danhmuc" => $tendanhmuc, "hinh_anh" => $hinh_anh, "sl" => $sl, "don_gia" => $gia_moi);
            // $itemsp = array($id, $tensp, $img, $gia, $sl, $tendanhmuc);
            // array_push($_SESSION['giohang'], $itemsp);
            // $_SESSION['giohang'][] = $itemsp;

            $_SESSION['giohang'][] = $itemsp;

        }

        var_dump($_SESSION['giohang']);
        // }
        // else {
        //     header('location: ./auth/login.php');
        // }
        break;
    case 'checkout':

        if (isset($_POST['changecartcheckoutbtn']) && $_POST['changecartcheckoutbtn']) {

            // $GLOBALS['changed_cart'] = $_POST['changecartcheckout'];
            // if ($GLOBALS['changed_cart']) {
            // echo '<div class="alert alert-danger text-center p-3">Số lượng sản phẩm trong giỏ hàng đã thay đổi, do lượng sản phẩm tồn kho không đủ. Vui lòng <a href="index.php?act=addtocart" class="btn btn-warning">tải lại</a> giỏ hàng</div>';
            // } else {
            include "./view/checkout-page.php";
            // }
        }

        include "./view/pages/cart/checkout.php";

        break;

    case 'buynow':

        var_dump($_POST);

        break;

    case 'ordercompleted':
        include "./view/pages/cart/order-completed.php";
        break;

    default:
        # code...
        break;
}

// var_dump($_SESSION['giohang']);

// $result = array(
//     'id' => 1,
//     'name' => 'AnDN',
// );

// echo json_encode($result);
