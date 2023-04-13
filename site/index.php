<?php

ob_start();
session_start();

if (!isset($_SESSION['views'])) {
    $_SESSION['views'] = [];
}

if (!isset($_SESSION['alert'])) {
    $_SESSION['alert'] = "";
}

if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [
        // array("id" => 1, "tensp" => "Điện thoại OPPO Reno8 T 5G 256GB", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo-reno8t-vang1-thumb-600x600.jpg", "sl" => 3, "don_gia" => 10999000),
        // array("id" => 2, "tensp" => "Điện thoại OPPO Reno8 Z 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo_reno8_pro_1_.jpg", "sl" => 3, "don_gia" => 17590000),
        // array("id" => 4, "tensp" => "Điện thoại OPPO Reno7 Pro 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo reno 7 t_i_xu_ng_42__3.png", "sl" => 2, "don_gia" => 11990000),
    ];
}

if (!isset($_SESSION['wishlist'])) {
    // $_SESSION['giohang'] = [
    //     [1, 1, "Điện thoại OPPO Reno8 T 5G 256GB", "thumb-oppo-reno8t-vang1-thumb-600x600.jpg", 3, 10999000],
    //     [2, 2, "Điện thoại OPPO Reno8 Pro 5G", "thumb-oppo_reno8_pro_1_.jpg", 3, 17590000],
    //     [3, 4, "Điện thoại OPPO Reno7 Pro 5G", "thumb-oppo reno 7 t_i_xu_ng_42__3.png", 2, 11990000],
    // ];
    $_SESSION['wishlist'] = [
        // array("stt" => 1, "id" => 1, "tensp" => "Điện thoại OPPO Reno8 T 5G 256GB", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo-reno8t-vang1-thumb-600x600.jpg", "sl" => 3, "don_gia" => 10999000),
        // array("stt" => 2, "id" => 2, "tensp" => "Điện thoại OPPO Reno8 Pro 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo_reno8_pro_1_.jpg", "sl" => 3, "don_gia" => 17590000),
        // array("stt" => 3, "id" => 4, "tensp" => "Điện thoại OPPO Reno7 Pro 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo reno 7 t_i_xu_ng_42__3.png", "sl" => 2, "don_gia" => 11990000),
    ];
}

include "../global.php";
include "../DAO/category.php";
include "../DAO/product.php";
include "../DAO/user.php";
include "../DAO/comment.php";
include "../DAO/blog.php";
include "../DAO/order.php";
include "../DAO/feedback.php";

// Model to connect database
include "./models/connectdb.php";
include "./models/sanpham.php";
include "./models/user.php";
include "./models/donhang.php";
include "./models/blog-cate.php";
include "./models/banner_slider.php";
include "./models/config_vnpay.php";

// Header
include "./view/layout/header.php";

if (!isset($GLOBALS['changed_cart'])) {
    $GLOBALS['changed_cart'] = false;
}

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'contact':
            include "./view/pages/contact/contact.php";
            break;

        case 'about-us':
            include "./view/pages/about/about.php";
            break;

        case 'shop':
            include "./view/pages/shop/shop.php";
            break;

        case 'shopcartpage':

            include "./view/shopcart-page.php";
            break;

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
                // header('location: ./index.php?act=viewcart');
                // } else {
                //     header('location: ./index.php');
                // }
            }

            break;
        case 'checkout':

            if (isset($_SESSION['iduser'])) {
                // Kiểm tra tồn kho ở đây!!!

                if (isset($_POST['changecartcheckoutbtn']) && $_POST['changecartcheckoutbtn']) {

                    // $GLOBALS['changed_cart'] = $_POST['changecartcheckout'];
                    // if ($GLOBALS['changed_cart']) {
                    // echo '<div class="alert alert-danger text-center p-3">Số lượng sản phẩm trong giỏ hàng đã thay đổi, do lượng sản phẩm tồn kho không đủ. Vui lòng <a href="index.php?act=addtocart" class="btn btn-warning">tải lại</a> giỏ hàng</div>';
                    // } else {
                    include "./view/checkout-page.php";
                    // }
                }

                // Kiểm tra tồn kho ở đây

                include "./view/pages/cart/checkout.php";
            } else {
                header("location: ./auth/login.php");
            }

            break;

        case 'ordercompleted':
            if (isset($_GET['vnp_Amount'])) {
                $vnp_SecureHash = $_GET['vnp_SecureHash'];
                $inputData = array();
                foreach ($_GET as $key => $value) {
                    if (substr($key, 0, 4) == "vnp_") {
                        $inputData[$key] = $value;
                    }
                }

                unset($inputData['vnp_SecureHash']);
                ksort($inputData);
                $i = 0;
                $hashData = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                }

                $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

                // BAO MAT THONG TIN

                if ($secureHash == $vnp_SecureHash) {
                    if ($_GET['vnp_ResponseCode'] == '00') {
                        // GET order info from SESSION
                        $bill = $_SESSION['bill'];

                        // var_dump($bill);
                        $madonhang = $bill['madonhang'];
                        $tongdonhang = $bill['tongdonhang'];
                        $hoten = $bill['hoten'];
                        $diachi = $bill['diachi'];
                        $email = $bill['email'];
                        $sodienthoai = $bill['sodienthoai'];
                        $pttt = $bill['pttt'];
                        $ghichu = $bill['ghichu'];
                        $iduser = $_SESSION['iduser'];
                        $time_order = $bill['time_order'];

                        $shippingfee = $bill['shippingfee'];
                        $vat_fee = $bill['vat_fee'];
                        // LOOP and insert to giohang
                        $cart_list = $_SESSION['giohang'];
                        foreach ($cart_list as $cart_item) {
                            # code...
                            $product = product_select_by_id($cart_item['id']);

                            $productQtyRemain = $product['ton_kho'] - $cart_item['sl'];
                            // echo "So luong con lai trong kho: " . $productQtyRemain;
                            product_update_quantity($cart_item['id'], $productQtyRemain);
                        }

                        // 3. tạo đơn hàng và trả về một id đơn hàng
                        $iddh = taodonhang($madonhang, $tongdonhang, $shippingfee, $vat_fee, $pttt, $hoten, $diachi, $email, $sodienthoai, $ghichu, $iduser, $time_order, 1);
                        update_coupon_for_orderid($_SESSION['bill']['coupon_code'], $iddh);
                        if ($_SESSION['bill']['coupon_code'] != "") {
                            // Update quantity of coupon code!!!
                            update_quantity_of_coupon($_SESSION['bill']['coupon_code']);
                        }
                        $_SESSION['iddh'] = $iddh;
                        if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                            foreach ($_SESSION['giohang'] as $item) {
                                # code...
                                addtocart($iddh, $item['id'], $item['tensp'], $item['hinh_anh'], $item['don_gia'], $item['sl']);
                            }
                            // Xóa đơn hàng sau khi add to cart (database)
                            unset($_SESSION['giohang']);
                            unset($_SESSION['iddh']);
                            unset($_SESSION['bill']);
                        }

                        // INSERT vào bảng tbl_vnpay
                        // $id_vnpay = "";
                        $order_id = $iddh;
                        $amount = $_GET['vnp_Amount'];
                        $bankcode = $_GET['vnp_BankCode'];
                        $banktransno = $_GET['vnp_BankTranNo'];
                        $cardtype = $_GET['vnp_CardType'];
                        $orderinfo = $_GET['vnp_OrderInfo'];
                        $paydate = $_GET['vnp_PayDate'];
                        $tmncode = $_GET['vnp_TmnCode'];
                        $transaction_no = $_GET['vnp_TransactionNo'];

                        insert_vnpay($order_id, $amount, $bankcode, $banktransno, $cardtype, $orderinfo, $paydate, $tmncode, $transaction_no);

                        echo "<span style='color:blue'>GD Thanh cong</span>";

                        include "./view/pages/cart/order-completed.php";
                        exit;
                    } else {
                        echo "<span style='color:red'>GD Khong thanh cong</span>";
                    }
                } else {
                    echo "<span style='color:red'>Chu ky khong hop le</span>";
                }

            }
            include "./view/pages/cart/order-completed.php";
            break;

        case 'checkoutbtn':
            // Kiểm tra tồn kho ở đây luôn! - Phòng trường hợp đang ở giỏ hàng tiến tới đặt hàng đã có người đặt hàng từ trước.

            $error = array();
            // Khi nút thanh toán được tồn tại và nó được click !!!

            if ($_GET['type'] == 'vnpay') {

                $iduser = $_SESSION['iduser'];
                $tongdonhang = $_POST['tongdonhang'];
                $hoten = $_POST['name'];
                $diachi = $_POST['detail_address'] . ", " . $_POST['ward_name'] . ", " . $_POST['district_name'] . ", " . $_POST['province_name'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['phone'];
                $ghichu = $_POST['ghichu'];

                if (empty($ghichu)) {
                    $error['ghichu'] = "Không để trống ghi chú!";
                }

                if (empty($hoten)) {
                    $error['hoten'] = "Không để trống họ tên";
                } else if (strlen($hoten) > 30) {
                    $error['hoten'] = "Họ tên không được phép 30 ký tự";
                }

                if (empty($sodienthoai)) {
                    $error['phone'] = "Không để trống số điện thoại!";
                }

                if (empty($email)) {
                    $error['email'] = "Không để trống email";
                }

                if (!$error) {
// Array[0,1,2,3] (hiện tại đang mặc định)
                    $madonhang = "THEPHONERSTORE" . random_int(2000, 9999999);

                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $time_order = date('Y-m-d H:i:s', time());

                    $vnp_TxnRef = $madonhang; //Mã giao dịch thanh toán tham chiếu của merchant
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
                        "vnp_OrderType" => "billpayment",
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        "vnp_ExpireDate" => $expire,
                        "vnp_OrderInfo" => $ghichu,

                        // "vnp_BankTranNo" => $ghichu,
                        // "vnp_Inv_Customer" => $hoten,
                        // "vnp_Bill_Address" => $diachi,
                        // "vnp_Bill_Email" => $email,
                        // "vnp_Inv_Type" => "Thanh toán qua vnpay",
                        // "vnp_Bill_FirstName" => $hoten,

                    );

                    $_SESSION['bill']['hoten'] = $hoten;
                    $_SESSION['bill']['email'] = $email;
                    $_SESSION['bill']['tongdonhang'] = $tongdonhang;
                    $_SESSION['bill']['madonhang'] = $madonhang;
                    $_SESSION['bill']['sodienthoai'] = $sodienthoai;
                    $_SESSION['bill']['ghichu'] = $ghichu;
                    $_SESSION['bill']['diachi'] = $diachi;
                    $_SESSION['bill']['pttt'] = "Thanh toán VNpay";
                    $_SESSION['bill']['time_order'] = $time_order;
                    $_SESSION['bill']['shippingfee'] = $_POST['shippingfee'];
                    $_SESSION['bill']['vat_fee'] = $_POST['vat_fee'];
                    $_SESSION['bill']['coupon_code'] = $_POST['coupon_code'];
// $_SESSION['bill'][''] = $time_order;
                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }

// var_dump($inputData);
                    // exit;
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

                    header('Location: ' . $vnp_Url);
                    die();

                } else {
                    include "./view/pages/cart/checkout.php";
                }

                // $returnData = array('code' => '00'
                //     , 'message' => 'success'
                //     , 'data' => $vnp_Url);
                // if (isset($_POST['redirect'])) {
                //     header('Location: ' . $vnp_Url);
                //     die();
                // } else {
                //     echo json_encode($returnData);
                // }
            } else if ($_GET['type'] == 'cod') {

                // if (isset($_POST['checkoutbtn']) && $_POST['checkoutbtn']) {
                // echo "HELLO WORLD checkout";
                // var_dump($_POST);
                // 1. Lấy dữ liệu

                $iduser = $_SESSION['iduser'];
                $tongphu = $_POST['tongphu'];
                $shippingfee = $_POST['shippingfee'];
                $tongdonhang = $_POST['tongdonhang'];
                $hoten = $_POST['name'];
                if (empty($_POST['detail_address'])) {
                    $error['detail_address'] = "Không để trống địa chỉ chi tiết";
                }
                if (empty($_POST['ward_id'])) {
                    $error['ward_name'] = "Không để trống phường/xã";
                }
                if (empty($_POST['province_id'])) {
                    $error['district_name'] = "Không để trống quận/huyện";
                }
                if (empty($_POST['province_id'])) {
                    $error['province_name'] = "Không để trống tỉnh/thành phó";
                }

                $diachi = $_POST['detail_address'] . ", " . $_POST['ward_name'] . ", " . $_POST['district_name'] . ", " . $_POST['province_name'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['phone'];
                $ghichu = $_POST['ghichu'];

                if (empty($ghichu)) {
                    $error['ghichu'] = "Không để trống ghi chú!";
                }
                $pttt = "Thanh toán khi nhận hàng"; // Array[0,1,2,3] (hiện tại đang mặc định)
                // Sinh ra mã đơn hàng
                $madonhang = "THEPHONERSTORE" . random_int(2000, 9999999);
                $vat_fee = $_POST['vat_fee'];
                $coupon_code = $_POST['coupon_code'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');

                $time_order = date('Y-m-d H:i:s', time());

                // 2.validate php server
                if (empty($hoten)) {
                    $error['hoten'] = "Không để trống họ tên";
                } else if (strlen($hoten) > 30) {
                    $error['hoten'] = "Họ tên không được phép 30 ký tự";
                }

                if (empty($sodienthoai)) {
                    $error['phone'] = "Không để trống số điện thoại!";
                }

                if (empty($email)) {
                    $error['email'] = "Không để trống email";
                }
                // if (empty($diachi)) {
                //     $error['address'] = "Không để trống địa chỉ";
                // }

                if (!$error) {
                    // Trừ số lượng trong hàng tồn kho đi.
                    $cart_list = $_SESSION['giohang'];
                    foreach ($cart_list as $cart_item) {
                        # code...
                        $product = product_select_by_id($cart_item['id']);

                        $productQtyRemain = $product['ton_kho'] - $cart_item['sl'];
                        // echo "So luong con lai trong kho: " . $productQtyRemain;
                        product_update_quantity($cart_item['id'], $productQtyRemain);
                    }

                    // 3. tạo đơn hàng và trả về một id đơn hàng
                    $iddh = taodonhang($madonhang, $tongdonhang, $shippingfee, $vat_fee, $pttt, $hoten, $diachi, $email, $sodienthoai, $ghichu, $iduser, $time_order, 0);
                    $_SESSION['iddh'] = $iddh;
                    if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                        foreach ($_SESSION['giohang'] as $item) {
                            # code...
                            addtocart($iddh, $item['id'], $item['tensp'], $item['hinh_anh'], $item['don_gia'], $item['sl']);
                        }
                        // Xóa đơn hàng sau khi add to cart (database)
                        unset($_SESSION['giohang']);
                        unset($_SESSION['iddh']);
                    }
                    // Cập nhật coupon vào đơn hàng ở đây!

                    update_coupon_for_orderid($coupon_code, $iddh);
                    if ($coupon_code != "") {
                        update_quantity_of_coupon($coupon_code);
                    }
                    include "./view/pages/cart/order-completed.php";
                } else {
                    include "./view/pages/cart/checkout.php";
                }
                // }
            }

            break;

        case 'addtocart':
            // var_dump($_SESSION['giohang']);
            // if (isset($_SESSION['iduser'])) {

            if (isset($_POST['addtocartbtn']) && $_POST['addtocartbtn']) {

                // echo "HELLO WORLD";

                $id = $_POST['id'];
                // $productitem = get_one_product($id)[0];
                // $iddm = $_POST['iddm'];
                $tendanhmuc = $_POST['danhmuc'];
                $tensp = $_POST['tensp'];
                $hinh_anh = $_POST['hinh_anh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];

                // echo "gia moi: " . $don_gia * (1 - $giam_gia / 100);
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

                header('location: index.php?act=viewcart');

            } else {

            }
            // } else {
            //     header('location: ./auth/login.php');
            // }

            include "./view/pages/cart/shopping-cart.php";
            break;
        case 'reorder':

            break;

        case 'addtowishlist':
            // if (isset($_SESSION['iduser'])) {

            if (isset($_POST['addtowishlistbtn']) && $_POST['addtowishlistbtn']) {

                // echo "HELLO WORLD";

                $id = $_POST['id'];
                // $productitem = get_one_product($id)[0];
                $iddm = $_POST['iddm'];
                $tendanhmuc = $_POST['danhmuc'];
                $tensp = $_POST['tensp'];
                $hinh_anh = $_POST['hinh_anh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
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

            } else {
                // echo "NOTTHING ELSE HERE";
            }

            // }
            // else {
            //     header('location: ./auth/login.php');
            // }
            include "./view/pages/cart/wishlist.php";
            break;

        case 'viewcart':
            include "./view/pages/cart/shopping-cart.php";
            break;
        case 'searchproducts':
            if (isset($_POST['searchbtn']) && $_POST['searchbtn']) {
                $searchProductPattern = "%" . $_POST['searchproductname'] . "%";
                $searchProductList = product_select_by_name($searchProductPattern);
            }
            include "./view/pages/shop/shop.php";
            break;

        case 'detailproduct':
            include "./view/pages/detailproduct/detail-product.php";
            break;
        // case 'detailproductpage':

        //     if (isset($_POST['sendcommentbtn']) && $_POST['sendcommentbtn']) {
        //         if (isset($_SESSION['iduser'])) {
        //             $iduser = $_SESSION['iduser'];
        //             $masanpham = $_POST['masanpham'];
        //             $commentMessage = $_POST['comment'];
        //             date_default_timezone_set('Asia/Ho_Chi_Minh');
        //             $ngay_binhluan = date("Y-m-d H:i:s");
        //             comment_insert($iduser, $masanpham, $commentMessage, $ngay_binhluan);
        //             include "./view/detailproduct-page.php";
        //             echo '<script>
        //             alert("Bình luận thành công");
        //             </script>';
        //         } else {
        //             echo '<script>
        //             alert("Bạn chưa đăng nhập để bình luân, xin mời đăng nhập");
        //             </script>';

        //             include "./view/account/signin-page.php";
        //         }

        //     } else {
        //         include "./view/detailproduct-page.php";
        //     }

        //     break;

        case 'signup':

            $error = array();

            if (isset($_POST['signupbtn']) && $_POST['signupbtn']) {
                $fullname = $_POST['fullname'];
                $homeaddress = $_POST['address'];
                $phonenumber = $_POST['phonenumber'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $reenterpass = $_POST['reenterpass'];

                // Validate at server

                if (strlen($fullname) == 0) {
                    $error['fullname'] = "Không để trống họ tên!";
                } else if (strlen($fullname) > 30) {
                    $error['fullname'] = "Họ tên không vượt quá 30 ký tự!";
                }

                if (empty($email)) {
                    $error['email'] = "không để trống email";
                } else if (!is_email($email)) {
                    $error['email'] = "Email không đúng định dạng!";
                }

                if (strlen($phonenumber) == 0) {
                    $error['phonenumber'] = "Không để trống số điện thoại!";
                } else if (!validating($phonenumber)) {
                    $error['phonenumber'] = "Định dạng số điện thoại không chính xác!";
                }

                if (empty($username)) {
                    $error['username'] = "Không để trống username!";
                }

                if (empty($password)) {
                    $error['password'] = "không để trống password!";
                }
                if (empty($reenterpass)) {
                    $error['reenterpass'] = "không để trống repassword!";
                }

                if (!$error) {
                    $is_inserted = user_insert($username, $password, $fullname, $homeaddress, $phonenumber, 1, null, $email, 3);
                    // if ($is_inserted) {
                    //     echo '<div class="register-account-success d-none" style="">HELLO</div>';
                    // }
                    if ($is_inserted) {
                        // echo '<div class="alert alert-success">Sign up successfully</div>';
                        header("location: ./login.php");
                    }
                    // Send email to success account
                }

            }
            // include "./view/auth/signup.php";
            break;
        case 'login':
            include "./view/auth/login.php";
            break;
        case 'forgotpass':
            include "./view/auth/forgot.php";
            break;
        case 'resetpass':
            include "./view/auth/reset-pass.php";
            break;
        case 'verifycode':
            $error = array();
            include "./view/auth/verifycode-page.php";
            break;
        case 'updateaccount':
            $error = array();
            if (isset($_POST['updateacountinfobtn']) && $_POST['updateacountinfobtn']) {
                // $tai_khoan = $_POST['tai_khoan'];
                $ho_ten = $_POST['ho_ten'];
                $diachi = $_POST['diachi'];
                $sodienthoai = $_POST['sodienthoai'];
                $congty = $_POST['companyname'];
                $target_file = basename($_FILES["hinh_anh"]["name"]);
                // echo $target_file;
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);

                // validate at server
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Allow certain file formats
                if ($_FILES['hinh_anh']['name'] == "") {
                    // $error['image'] = "Hình ảnh không được để trống";
                } else if ($_FILES['hinh_anh']['name'] != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    $error['image'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                }

                if (empty($_FILES["hinh_anh"]["name"])) {
                    // $error['hinh_anh'] = "Không để trống hình ảnh";
                    // GET image from database
                    $user = user_select_by_id($_SESSION['iduser']);
                    $target_file = $user['hinh_anh'];

                } else if ($_FILES["hinh_anh"]['name'] != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    $error['hinh_anh'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                }
                // Validate at server

                if (strlen($ho_ten) == 0) {
                    $error['ho_ten'] = "Không để trống họ tên!";
                } else if (strlen($ho_ten) > 50) {
                    $error['ho_ten'] = "Họ tên không vượt quá 50 ký tự!";
                }

                // if (empty($congty)) {
                //     $error['congty'] = "không để trống email";
                // }

                // if (empty($email)) {
                //     $error['email'] = "không để trống email";
                // } else if (!is_email($email)) {
                //     $error['email'] = "Email không đúng định dạng!";
                // }

                if (strlen($sodienthoai) == 0) {
                    $error['sodienthoai'] = "Không để trống số điện thoại!";
                } else if (!validating($sodienthoai)) {
                    $error['sodienthoai'] = "Định dạng số điện thoại không chính xác!";
                }

                if (empty($congty)) {
                    $error['company'] = "Không để trống công ty!";
                }

                if (empty($diachi)) {
                    $error['diachi'] = "Không để trống địa chỉ";
                }

                if (!$error) {

                    // echo 'Success!';
                    $is_updated = user_update_info($_POST['iduser'], $ho_ten, $diachi, $sodienthoai, $kichhoat = 1, $target_file, $congty);

                    if ($is_updated) {

                        $_SESSION['alert'] = "Cập nhật thông tin tài khoản thành công!";

                    }

                } else {
                    $_SESSION['alert'] = "Cập nhật thông tin tài khoản thất bại!";

                }

            } else {

            }
            include "./view/pages/account/my-account.php";
            break;
        case 'updatepass':
            $error = array();
            if (isset($_POST['updatepassbtn']) && $_POST['updatepassbtn']) {
                $newpass = $_POST['newpass'];
                $renewpass = $_POST['renewpass'];

                if ($newpass != $renewpass) {
                    echo '<div class="alert alert-danger">Mật khẩu xác nhận không chính xác, hãy nhập lại!</div>';
                } else {
                    user_change_pass_by_username($_SESSION['usernamedb'], $newpass);
                    unset($_SESSION['usernamedb']);
                    unset($_SESSION['verifycode']);
                    header('location: index.php?act=signinpage');
                    echo '<div class="alert alert-success">Thay đổi mật khẩu thành công!</div>';
                }
            }
            include "./view/account/updatepass-page.php";
            break;
        case 'changepass':
            $error = array();
            if (isset($_POST['updatepassbtn']) && $_POST['updatepassbtn']) {
                $newpass = $_POST['newpass'];
                $renewpass = $_POST['renewpass'];

                if (empty($newpass)) {
                    $error['newpass'] = "Không để trống mật khẩu mới";
                }
                if (empty($renewpass)) {
                    $error['renewpass'] = "Không để trống nhập lại mật khẩu mới";
                }

                if (!$error) {
                    if ($newpass == $renewpass) {

                        user_change_password($iduser, $newpass);

                        echo '<div class="mt-5 mb-3 text-muted alert alert-success">Cập nhật mật khẩu thành công</div>';
                        echo '
                        <script>
                            const collapseTwoElement = document.getElementById("collapseTwo");
                            if(collapseTwoElement) {
                                collapseTwoElement.classList.add("show");
                                collapseTwoElement.classList.remove("collapse");
                            }
                        </script>
                        ';
                    } else {
                        echo '<div class="mt-5 mb-3 text-muted alert alert-danger">Cập nhật mật khẩu thất bại</div>';
                        echo '
                        <script>

                        if(collapseTwoElement) {
                            const collapseTwoElement = document.getElementById("collapseTwo");
                            collapseTwoElement.classList.add("show");
                            collapseTwoElement.classList.remove("collapse");
                        }

                        </script>
                        ';
                    }
                }

            }

            include "./view/account/changepass-page.php";
            break;
        case 'settingaccount':
            include "./view/pages/account/my-account.php";
            break;
        case 'historyorderdetailpage':
            if (isset($_GET['id'])) {
                $cartList = getshoworderdetail($_GET['id']);
                $orderInfo = getorderinfo($_GET['id']);
                // var_dump($orderInfo);
                //var_dump($cartList);
            }
            include "./view/account/historyorder-detail-page.php";
            break;

        case 'updateorder':

            if (isset($_POST['updateorderbtn']) && $_POST['updateorderbtn']) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $iddh = $_GET['id'];

                    $status = $_POST['updatestatus'];
                    $is_updated = updateorderstatus($iddh, $status);

                    if ($is_updated) {
                        // echo '
                        //     <script>
                        //         const notifyModelBtn = document.querySelector("#notifyModelBtn");
                        //         console.log(notifyModelBtn);
                        //     </script>
                        // ';
                    } else {

                    }
                    header('location: ./index.php?act=historyorderdetailpage&id=' . $iddh . '&status=updated');
                }
            }
        case 'destroyorder':

            if (isset($_POST['destroyorderbtn']) && $_POST['destroyorderbtn']) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $iddh = $_GET['id'];

                    $status = $_POST['destroystatus'];
                    $is_updated = updateorderstatus($iddh, $status);

                    if ($is_updated) {
                        // echo '
                        //     <script>
                        //         const notifyModelBtn = document.querySelector("#notifyModelBtn");
                        //         console.log(notifyModelBtn);
                        //     </script>
                        // ';
                    } else {

                    }
                    header('location: ./index.php?act=historyorderdetailpage&id=' . $iddh . '&status=destory');
                }
            }

            break;

        case 'logout':
            unset($_SESSION['role']);
            unset($_SESSION['ho_ten']);
            unset($_SESSION['iduser']);
            unset($_SESSION['email']);
            header('location: ./auth/login.php');
            break;

        case 'blog':
            include "./view/pages/blog/blog-list.php";
            break;
        case 'blogdetail':
            include "./view/pages/blog/blog-detail.php";
            break;

        case 'my-account':
            if (isset($_SESSION['iduser'])) {
                include "./view/auth/my-account.php";
            } else {
                header('location: ./auth/login.php');
            }
            break;
        case 'csbanhang':
            include "./view/pages/policy/sales-policy.php";
            break;
        case 'csdoitra':
            include "./view/pages/policy/return-policy.php";
            break;
        case 'csbaohanh':
            include "./view/pages/policy/warranty-policy.php";
            break;
        case 'csbaomat':
            include "./view/pages/policy/privacy-policy.php";
            break;
        case 'cssudung':
            include "./view/pages/policy/usage-policy.php";
            break;
        case 'cskiemhang':
            include "./view/pages/policy/inspection-policy.php";
            break;
        case 'commentblog':
            if (isset($_POST['sencomment']) && ($_POST['sencomment'])) {
                $error = array();
                $idblog = $_GET['id'];
                $content = $_POST['content'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:m:s');
                // exit;
                $makh = $_SESSION['iduser'];
                if (isset($_SESSION['iduser'])) {
                    if (strlen($content) == 0) {
                        $error['content'] = "Bạn Chưa Nhập Bình Luận";
                    }
                    if (!$error) {
                        $is_inserted = comment_blog($makh, $content, $idblog, $date);
                        if ($is_inserted) {
                            $thongbao = "Thêm Bài Viết Thành Công";
                        }
                    } else {
                        $thongbao = "Thêm Bài Viết Thất Bại";
                    }

                    // header('location: index.php?act=blogdetail&id='.$idblog.'');
                } else {
                    // $thongbao = "Đăng Nhập Để Bình Luận";
                    header('location: ./auth/login.php');}
            }
            include "./view/pages/blog/blog-detail.php";
            break;
        case 'deletecmt':
            $id = $_GET['idblog'] ? $_GET['idblog'] : '';
            deletecmt($id);
            header('location: index.php?act=blogdetail&id=' . $_GET['idprofile'] . '');
            break;

        // Thanh toan
        case 'vnpaypayment':
            // header("location ")
            // include ".";
            break;
        case 'commentproduct':
            if (isset($_POST['sentcommentproduct']) && ($_POST['sentcommentproduct'])) {
                $idproduct = $_GET['id'];
                $noidung = $_POST['noidung'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:m:s');
                $makh = $_SESSION['iduser'];
                // $makh = 1;
                if (isset($_SESSION['iduser'])) {
                    $is_inserted = comment_product($makh, $noidung, $idproduct, $date);
                } else {
                    header('location: ./auth/login.php');
                }
            }
            include './view/pages/detailproduct/detail-product.php';
            break;
        case 'deletecmtproduct':
            $id = $_GET['idproduct'] ? $_GET['idproduct'] : '';
            deletecmtproduct($id);
            header('location: index.php?act=commentproduct&id=' . $_GET['idprofile'] . '');
            break;
        case 'feedback':

            if (isset($_POST['guitn']) && $_POST['guitn']) {
                $error = array();
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                if (empty($name)) {
                    $error['name'] = "Không để trống tên!";
                }
                if (empty($email)) {
                    $error['email'] = "Không để trống email!";
                }
                if (empty($phone)) {
                    $error['phone'] = "Không để trống số điện thoại!";
                }
                if (empty($title)) {
                    $error['title'] = "Không để trống chủ đề!";
                }
                if (empty($content)) {
                    $error['content'] = "Không để trống nội dung!";
                }
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date_create = date('Y-m-d H:i:s', time());

                if (!$error) {
                    $is_inserted = insert_feedback($name, $email, $phone, $title, $content, $date_create);
                    if ($is_inserted) {
                        $_SESSION['alert'] = "Gửi phản hồi thành công! Chúng tôi sẽ liên hệ bạn qua mail một cách sớm nhất!";
                    } else {
                        $_SESSION['alert'] = "Gửi phản hồi thất bại!";
                    }
                    // header('Location: index.php');
                } else {
                    $_SESSION['alert'] = "Gửi phản hồi thất bại!";
                }

            }
            include "./view/pages/home/home.php";

            break;
        case 'feedback-ct':

            if (isset($_POST['guitn']) && $_POST['guitn']) {
                $error = array();
                $name = $_POST['name'];
                $email = $_POST['email'];
                $title = $_POST['title'];
                $phone = $_POST['phone'];
                $content = $_POST['content'];

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date_create = date('Y-m-d H:i:s', time());
                if (empty($name)) {
                    $error['name'] = "Không để trống tên!";
                }
                if (empty($email)) {
                    $error['email'] = "Không để trống email!";
                }
                if (empty($phone)) {
                    $error['phone'] = "Không để trống số điện thoại!";
                }
                if (empty($title)) {
                    $error['title'] = "Không để trống chủ đề!";
                }
                if (empty($content)) {
                    $error['content'] = "Không để trống nội dung!";
                }
                if (!$error) {
                    $is_inserted = insert_feedback($name, $email, $phone, $title, $content, $date_create);
                    if ($is_inserted) {
                        $_SESSION['alert'] = "Gửi phản hồi thành công!, Chúng tôi sẽ liên hệ bạn qua mail một cách sớm nhất";

                    } else {
                        $_SESSION['alert'] = "Gửi phản hồi thất bại!";
                    }
                } else {
                    $_SESSION['alert'] = "Gửi phản hồi thất bại!";
                }

            }
            include "./view/pages/contact/contact.php";
            break;
        default:
            include "./view/component/carousel.php";
            // include "./view/component/catalog.php";
            include "./view/home.php";
    }

} else {
    // Home content
    include "./view/pages/home/home.php";

}
// Footer
include "./view/layout/footer.php";
