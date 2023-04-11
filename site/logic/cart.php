<?php

ob_start();
session_start();

include "../../DAO/product.php";
include "../../pdo-library.php";

$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include "$ROOT_URL/site/models/config_vnpay.php";
include "$ROOT_URL/DAO/order.php";
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
        // var_dump($_SESSION['wishlist']);
        echo json_encode(
            array(
                "status" => 1,
                "content" => $_SESSION['wishlist'],
            )
        );
        // } else {
        //     header('location: ./auth/login.php');
        // }
        break;

    case 'updatecart':
        // var_dump($_POST);
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
            $product_item = product_select_by_id($cart_item['id']);

            if ($cart_item['id'] == $_POST['id']) {
                if ($_POST['type'] == "minus") {
                    $slnew = $cart_item['sl'] - 1;
                    if ($slnew <= 1) {
                        $slnew = 1;
                    }
                } else if ($_POST['type'] == 'add') {
                    $slnew = $cart_item['sl'] + 1;
                    // var_dump($product_item);
                    if ($slnew > $product_item['ton_kho']) {
                        $slnew = $product_item['ton_kho'];
                        echo json_encode(
                            array(
                                "status" => 0,
                                "content" => 'Cập nhật số lượng sản phẩm' . $cart_item["tensp"] . ' thất bại, vượt quá số lượng tồn kho (còn lại: ' . $product_item['ton_kho'] . ')',
                            )
                        );
                        exit;
                    }
                    // Handle tồn kho ở đây!
                } else if ($_POST['type'] == 'keyup') {

                    $slnew = $_POST['sl'];
                    // echo "hello keyup" . $slnew;

                    if ($slnew > $product_item['ton_kho']) {
                        $slnew = $product_item['ton_kho'];

                        echo json_encode(
                            array(
                                "status" => 0,
                                "content" => 'Cập nhật số lượng sản phẩm' . $cart_item["tensp"] . ' thất bại, vượt quá số lượng tồn kho (còn lại: ' . $product_item['ton_kho'] . ')',
                            )
                        );
                        exit;
                    }
                }
                $_SESSION['giohang'][$i]['sl'] = $slnew;
            }
            $i++;
        }
        echo json_encode(
            array(
                "status" => 1,
                "content" => $_SESSION['giohang'],
            )
        );
        // var_dump($_SESSION['giohang']);

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
            var_dump($cartResult);

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
                if ($slnew > $product_item['ton_kho']) {
                    // Kiểm tra tồn kho ở đây
                    $slnew = $product_item['ton_kho'];
                    // $GLOBALS['changed_cart'] = true;

                    // var_dump(
                    //     array(
                    //         "status" => 0,
                    //         "message" => "Thêm sản phẩm $tensp thất bại, vượt quá số lượng tồn kho",
                    //     )
                    // );

                    echo json_encode(
                        array(
                            "status" => 0,
                            "content" => "Thêm sản phẩm $tensp thất bại, vượt quá số lượng tồn kho",
                        )
                    );
                    exit;

                } else {
                    // Nếu không vượt quá số lượng cập nhật sản phẩm mới trong giỏ
                    echo json_encode(
                        array(
                            "status" => 1,
                            "content" => "Thêm sản phẩm $tensp thành công",
                        )
                    );
                    $_SESSION['giohang'][$i]['sl'] = $slnew;
                }

                // echo "So luong moi tren gio:" . $_SESSION['giohang'][$i]['sl'];
                $flag = 1;

                break;
            }
            $i++;
        }

        // exit;

        if ($flag == 0) {
            // Kiểm tra số lượng tồn kho ở đây
            if ($sl > $product_item['ton_kho']) {
                echo json_encode(
                    array(
                        "status" => 0,
                        "content" => "Thêm sản phẩm $tensp thất bại, vượt quá số lượng tồn kho",
                    )
                );
            } else {
                $itemsp = array("id" => $id, "tensp" => $tensp, "danhmuc" => $tendanhmuc, "hinh_anh" => $hinh_anh, "sl" => $sl, "don_gia" => $gia_moi);
                // $itemsp = array($id, $tensp, $img, $gia, $sl, $tendanhmuc);
                // array_push($_SESSION['giohang'], $itemsp);
                // $_SESSION['giohang'][] = $itemsp;

                $_SESSION['giohang'][] = $itemsp;

                echo json_encode(
                    array(
                        "status" => 1,
                        "content" => $_SESSION['giohang'],
                    )
                );
            }

        }
        // var_dump($_SESSION['giohang'][$i]);
        // var_dump($_SESSION['giohang']);
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
    case 'checkinventory':

        // var_dump($_SESSION['giohang']);
        $flag = 0;
        $i = 0;
        foreach ($_SESSION['giohang'] as $cart_item) {
            # code...
            // if($cart_item['sl'])
            $product_item = product_select_by_id($cart_item['id']);
            if ($cart_item['sl'] > $product_item['ton_kho']) {
                $flag = 1;
                $index = $cart_item['id'];
                $_SESSION['giohang'][$i]['sl'] = $product_item['ton_kho'];
            }
            $i++;
        }

        if ($flag == 1) {
            echo json_encode(
                array(
                    "status" => 0,
                    "content" => "Giỏ hàng vượt quá số lượng tồn kho. Mời reload lại trang giỏ hàng!",
                    "cart" => $_SESSION['giohang'],
                )
            );
        } else {
            echo json_encode(
                array(
                    "status" => 1,
                    "content" => "OK",
                    "cart" => $_SESSION['giohang'],
                )
            );
        }

        break;
    case 'ordercompleted':
        include "./view/pages/cart/order-completed.php";
        break;
    case 'vnpay_payment':
        // $iduser = $_SESSION['iduser'];
        // $tongdonhang = $_POST['tongdonhang'];
        // $hoten = $_POST['name'];
        // $diachi = $_POST['address'];
        // $email = $_POST['email'];
        // $sodienthoai = $_POST['phone'];
        // $ghichu = $_POST['ghichu'];

        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $_POST['tongdonhang']; // Số tiền thanh toán
        $vnp_Locale = "vn"; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = "NCB"; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // header('Location: ' . $vnp_Url);
        // die();

        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        break;
    case 'applycoupon':
        if (isset($_POST['coupon']) && $_POST['coupon'] != "") {
            $iduser = $_POST['iduser'];
            $coupon = $_POST['coupon'];
            $is_applied = is_applied_coupon($coupon, $iduser);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $current_date = date('Y-m-d H:i:s');
            $is_outdated = is_outdated_coupon($coupon, $current_date);

            $is_exist_coupon = is_exist_coupon($coupon);
            if ($is_exist_coupon == 0) {
                echo json_encode(
                    array(
                        "status" => 0,
                        "content" => "Mã coupon không tồn tại",
                    )
                );
                exit;
            }

            if ($is_outdated == 0) {
                echo json_encode(
                    array(
                        "status" => 0,
                        "content" => "Mã coupon không hợp lệ, đã quá hạn sử dụng",
                    )
                );
                exit;
            }

            if ($is_applied > 0) {
                // echo "is applied: ?" . $is_applied;
                echo json_encode(
                    array(
                        "status" => 0,
                        "content" => "Mã coupon không hợp lệ, đã áp dụng",
                    )
                );
                exit;
            }

            // is valid money

            $is_valid_money = is_valid_money_for_coupon($coupon, $_POST['subtotal']);
            if ($is_valid_money == 0) {
                echo json_encode(
                    array(
                        "status" => 0,
                        "content" => "Mã coupon không hợp lệ, không đủ tiền",
                    )
                );
                exit;
            }
            $discount_percent = get_discount_percent($coupon);
            if ($discount_percent == 0) {
                echo json_encode(
                    array(
                        "status" => 0,
                        "content" => "Mã coupon không hợp lệ",
                    )
                );
            } else {
                echo json_encode(
                    array(
                        "status" => 1,
                        "content" => $discount_percent,
                    )
                );
            }

        } else {
            echo json_encode(
                array(
                    "status" => 0,
                    "content" => "Mã coupon không hợp lệ",
                )
            );
        }
        break;

    case 'updateordercoupon':
        if (isset($_POST['coupon'])) {
            $coupon = $_POST['coupon'];

            echo json_encode(
                array(
                    "status" => 1,
                    "content" => $discount_percent,
                )
            );
        }
        break;
    // case 'check-applied-coupon':
    //     if (isset($_POST['coupon'])) {
    //         $coupon = $_POST['coupon'];

    //         echo json_encode(
    //             array(
    //                 "status" => 1,
    //                 "content" => $discount_percent,
    //             )
    //         );
    //     }
    //     break;
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
