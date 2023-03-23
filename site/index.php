<?php

ob_start();
session_start();

if (!isset($_SESSION['giohang'])) {
    // $_SESSION['giohang'] = [
    //     [1, 1, "Điện thoại OPPO Reno8 T 5G 256GB", "thumb-oppo-reno8t-vang1-thumb-600x600.jpg", 3, 10999000],
    //     [2, 2, "Điện thoại OPPO Reno8 Pro 5G", "thumb-oppo_reno8_pro_1_.jpg", 3, 17590000],
    //     [3, 4, "Điện thoại OPPO Reno7 Pro 5G", "thumb-oppo reno 7 t_i_xu_ng_42__3.png", 2, 11990000],
    // ];
    $_SESSION['giohang'] = [
        // array("id" => 1, "tensp" => "Điện thoại OPPO Reno8 T 5G 256GB", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo-reno8t-vang1-thumb-600x600.jpg", "sl" => 3, "don_gia" => 10999000),
        // array("id" => 2, "tensp" => "Điện thoại OPPO Reno8 Z 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo_reno8_pro_1_.jpg", "sl" => 3, "don_gia" => 17590000),
        // array("id" => 4, "tensp" => "Điện thoại OPPO Reno7 Pro 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo reno 7 t_i_xu_ng_42__3.png", "sl" => 2, "don_gia" => 11990000),
    ];

    // var_dump($_SESSION['giohang']);
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

    // var_dump($_SESSION['giohang']);
}

include "../global.php";
include "../DAO/category.php";
include "../DAO/product.php";
include "../DAO/user.php";
include "../DAO/comment.php";
include "../DAO/blog.php";

// Model to connect database
include "./models/connectdb.php";
include "./models/sanpham.php";
include "./models/user.php";
include "./models/donhang.php";
include "./models/blog-cate.php";

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
                if (isset($_POST['changecartcheckoutbtn']) && $_POST['changecartcheckoutbtn']) {

                    // $GLOBALS['changed_cart'] = $_POST['changecartcheckout'];
                    // if ($GLOBALS['changed_cart']) {
                    // echo '<div class="alert alert-danger text-center p-3">Số lượng sản phẩm trong giỏ hàng đã thay đổi, do lượng sản phẩm tồn kho không đủ. Vui lòng <a href="index.php?act=addtocart" class="btn btn-warning">tải lại</a> giỏ hàng</div>';
                    // } else {
                    include "./view/checkout-page.php";
                    // }
                }
                include "./view/pages/cart/checkout.php";
            } else {
                header("location: ./auth/login.php");
            }

            break;

        case 'ordercompleted':
            if (isset($iddh)) {

            }
            include "./view/pages/cart/order-completed.php";
            break;

        case 'checkoutbtn':

            $error = array();
            // Khi nút thanh toán được tồn tại và nó được click !!!
            // echo "HELLO WORLD";
            if (isset($_POST['checkoutbtn']) && $_POST['checkoutbtn']) {
                // echo "HELLO WORLD checkout";
                // 1. Lấy dữ liệu
                $iduser = $_SESSION['iduser'];
                $tongdonhang = $_POST['tongdonhang'];
                $hoten = $_POST['name'];
                $diachi = $_POST['address'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['phone'];
                $ghichu = $_POST['ghichu'];
                $pttt = "Thanh toán khi nhận hàng"; // Array[0,1,2,3] (hiện tại đang mặc định)
                // Sinh ra mã đơn hàng
                $madonhang = "THEPHONERSTORE" . random_int(2000, 9999999);

                date_default_timezone_set('Asia/Ho_Chi_Minh');

                $time_order = date('m/d/Y h:i:s a', time());

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
                if (empty($diachi)) {
                    $error['address'] = "Không để trống địa chỉ";
                }

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
                    $iddh = taodonhang($madonhang, $tongdonhang, $pttt, $hoten, $diachi, $email, $sodienthoai, $ghichu, $iduser, $time_order);
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
                    include "./view/pages/cart/order-completed.php";
                } else {
                    include "./view/pages/cart/checkout.php";
                }
            }
            break;

        case 'addtocart':
            // var_dump($_SESSION['giohang']);
            if (isset($_SESSION['iduser'])) {

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

                    // header('location: index.php?act=viewcart'); // Tại sao lại có dòng này ?

                } else {
                    // echo "NOTTHING ELSE HERE";
                }
            } else {
                header('location: ./auth/login.php');
            }

            include "./view/pages/cart/shopping-cart.php";
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
            include "./view/shoppage.php";
            break;

        case 'detailproduct':
            include "./view/pages/detailproduct/detail-product.php";
            break;
        case 'detailproductpage':

            if (isset($_POST['sendcommentbtn']) && $_POST['sendcommentbtn']) {
                if (isset($_SESSION['iduser'])) {
                    $iduser = $_SESSION['iduser'];
                    $masanpham = $_POST['masanpham'];
                    $commentMessage = $_POST['comment'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay_binhluan = date("Y-m-d H:i:s");
                    comment_insert($iduser, $masanpham, $commentMessage, $ngay_binhluan);
                    include "./view/detailproduct-page.php";
                    echo '<script>
                    alert("Bình luận thành công");
                    </script>';
                } else {
                    echo '<script>
                    alert("Bạn chưa đăng nhập để bình luân, xin mời đăng nhập");
                    </script>';

                    include "./view/account/signin-page.php";
                }

            } else {
                include "./view/detailproduct-page.php";
            }

            break;
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
                $email = $_POST['email'];
                // $password = $_POST[''];
                $target_file = "../uploads/" . basename($_FILES["hinh_anh"]["name"]);
                // echo $target_file;
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);

                // validate at server

                // Validate php here

                if (empty($_FILES["hinh_anh"]["name"])) {
                    $error['hinh_anh'] = "Không để trống hình ảnh";
                }
                // Validate at server

                if (strlen($ho_ten) == 0) {
                    $error['ho_ten'] = "Không để trống họ tên!";
                } else if (strlen($ho_ten) > 30) {
                    $error['ho_ten'] = "Họ tên không vượt quá 30 ký tự!";
                }

                if (empty($email)) {
                    $error['email'] = "không để trống email";
                } else if (!is_email($email)) {
                    $error['email'] = "Email không đúng định dạng!";
                }

                if (strlen($sodienthoai) == 0) {
                    $error['sodienthoai'] = "Không để trống số điện thoại!";
                } else if (!validating($sodienthoai)) {
                    $error['sodienthoai'] = "Định dạng số điện thoại không chính xác!";
                }

                // if (empty($tai_khoan)) {
                //     $error['tai_khoan'] = "Không để trống tài khoản!";
                // }

                if (!$error) {
                    echo 'Success!';
                    $is_updated = user_update_info($_POST['iduser'], $ho_ten, $diachi, $sodienthoai, $kichhoat = 1, $target_file, $email, $role = 1);

                    if ($is_updated) {

                        echo '
                        <script>

                        </script>
                        ';
                    } else {

                    }
                } else {
                    echo "Error: ";
                    echo '
                        <script>
                            $("#cartModal").trigger("click");
                        </script>
                    ';
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
            unset($_SESSION['username']);
            unset($_SESSION['iduser']);
            header('location: ./auth/login.php');
            break;

        case 'blog':
            include "./view/pages/blog/blog-list.php";
            break;
        case 'blogdetail':
            include "./view/pages/blog/blog-detail.php";
            break;

        case 'my-account':
            include "./view/auth/my-account.php";
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
            // if(isset($_POST['sencomment'])):
            //     // comment_blog($content,$idblog,$userid, $date)
            //     $content = $_POST['content'];
            //     $idblog = $_GET['id'];
            //     $date = $_POST['date'];

            //         if(isset($_SESSION['user'])){
            //             // print_r($_SESSION['user']);
            //             comment_blog($content,$idblog,$_SESSION['iduser'],$date);
            //             // header('location: ./view/blog/blog-detail.php?id='.$idblog.'');

            //         }
            //         // else{
            //         //     $_SESSION['error'] = 'Đăng Nhập Để Bình Luận';
            //         //     header('location: http://localhost/PRO1014_DA1/main-project/site/index.php?act=blogdetail&id='.$idblog.'');
            //         // }
            //     endif;
            if (isset($_POST['sencomment']) && ($_POST['sencomment'])) {
                $name = $_POST['name'];
                $idblog = $_GET['id'];
                $content = $_POST['content'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = $_POST['date'];
                $makh = $_POST['makh'];
                if (isset($_SESSION['iduser'])) {
                    comment_blog($makh, $content, $idblog, $name, $date);
                    header('location: http://localhost/PRO1014_DA1/main-project/site/index.php?act=blogdetail&id=' . $idblog . '');
                } else {
                    // $thongbao = "Đăng Nhập Để Bình Luận";
                    // header('location: http://localhost/PRO1014_DA1/main-project/site/index.php?act=blogdetail&id='.$idblog.'');
                }

            }
            include "./view/pages/blog/blog-detail.php";
            break;
        case 'deletecmt':
            $id = $_GET['idblog'] ? $_GET['idblog'] : '';
            deletecmt($id);
            header('location: http://localhost/PRO1014_DA1/main-project/site/index.php?act=blogdetail&id=' . $_GET['idprofile'] . '');
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
