<?php

ob_start();
session_start();

include "../../DAO/product.php";
include "../../pdo-library.php";

switch ($_GET['act']) {
    case 'wishlist':
        include "./view/pages/cart/wishlist.php";
        break;

    case 'updatecart':

        if (isset($_POST['updatecartbtn']) && $_POST['updatecartbtn']) {

            // echo $GLOBALS['changed_cart'];
            // echo $_POST['changedcart'];

            $GLOBALS['changed_cart'] = $_POST['changedcart'];
            $qtylist = $_POST['qtyhidden'];

            $i = 0;
            $flag = 0;

            foreach ($_SESSION["giohang"] as $rowitem) {

                $_SESSION['giohang'][$i][4] = $qtylist[$i];
                $product = product_select_by_id($rowitem[0]);
                if ($_SESSION['giohang'][$i][4] > $product['ton_kho']) {
                    // UPDATE số lượng trên session luôn, khi đối chiếu với tồn kho.
                    $_SESSION['giohang'][$i][4] = $product['ton_kho'];
                    $flag = 1;
                    break;
                }

                // var_dump($product);
                $i++;
            }

            if ($flag == 1) {
                echo '<div class="alert alert-danger text-center p-3">Số lượng sản phẩm trong giỏ hàng đã thay đổi, do lượng sản phẩm tồn kho không đủ. Vui lòng <a href="index.php?act=addtocart" class="btn btn-warning">tải lại</a> giỏ hàng</div>';
            } else {
                if (!$_POST['changedcart']) {
                    echo '<div class="alert alert-success">Cập nhật giỏ hàng thành công!</div>';
                }
                include "./view/shopcart-page.php";
            }
            // echo '<div class="update-cart-success d-none" style="">HELLO</div>';
        } else {
            "HELLO world";
        }

        break;
    case 'deletecart':
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            // template này có thể phải nhớ !!!
            if (isset($_GET['idcart'])) {
                echo '<div class="alert alert-success" style="">Sản phẩm ' . $_SESSION['giohang'][$_GET['idcart']]['tensp'] . ' đã được xóa!</div>';
                array_splice($_SESSION['giohang'], $_GET['idcart'], 1);

            }

            // else {
            //     unset($_SESSION['giohang']);
            // }

            // if (count($_SESSION['giohang']) > 0) {
            include "./view/pages/cart/shopping-cart.php";
            // } else {
            //     header('location: ./index.php');
            // }
        }

        break;
    case 'addtocart':
        echo 'Add to cart demo using Ajax: ';
        print_r($_POST);
        // Handle logic cart here
        echo $_POST['id'];
        echo $_POST['sl'];
        echo $_POST['danhmuc'];
        $id = $_POST['id'];
        $product_item = product_select_by_id($id);
        var_dump($product_item);

        $tendanhmuc = $_POST['danhmuc'];
        $tensp = $product_item['tensp'];
        $hinh_anh = $_POST['hinh_anh'];
        $don_gia = $product_item['don_gia'];
        $giam_gia = $product_item['giam_gia'];

        echo "gia moi: " . $don_gia * (1 - $giam_gia / 100);
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

        echo json_encode($_SESSION['giohang']);
        // header('location: ./index.php');

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
