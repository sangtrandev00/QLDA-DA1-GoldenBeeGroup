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
        array("stt" => 1, "id" => 1, "tensp" => "Điện thoại OPPO Reno8 T 5G 256GB", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo-reno8t-vang1-thumb-600x600.jpg", "sl" => 3, "don_gia" => 10999000),
        array("stt" => 2, "id" => 2, "tensp" => "Điện thoại OPPO Reno8 Pro 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo_reno8_pro_1_.jpg", "sl" => 3, "don_gia" => 17590000),
        array("stt" => 3, "id" => 4, "tensp" => "Điện thoại OPPO Reno7 Pro 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo reno 7 t_i_xu_ng_42__3.png", "sl" => 2, "don_gia" => 11990000),
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
        array("stt" => 1, "id" => 1, "tensp" => "Điện thoại OPPO Reno8 T 5G 256GB", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo-reno8t-vang1-thumb-600x600.jpg", "sl" => 3, "don_gia" => 10999000),
        array("stt" => 2, "id" => 2, "tensp" => "Điện thoại OPPO Reno8 Pro 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo_reno8_pro_1_.jpg", "sl" => 3, "don_gia" => 17590000),
        array("stt" => 3, "id" => 4, "tensp" => "Điện thoại OPPO Reno7 Pro 5G", "danhmuc" => "Oppo", "hinh_anh" => "thumb-oppo reno 7 t_i_xu_ng_42__3.png", "sl" => 2, "don_gia" => 11990000),
    ];

    // var_dump($_SESSION['giohang']);
}

include "../global.php";
include "../DAO/category.php";
include "../DAO/product.php";
include "../DAO/user.php";
include "../DAO/comment.php";

// Model to connect database
include "./models/connectdb.php";
include "./models/sanpham.php";
include "./models/user.php";
include "./models/donhang.php";

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
                    array_splice($_SESSION['giohang'], $_GET['idcart'], 1);
                    echo '<div class="alert alert-success" style="">Xóa sản phẩm thành công</div>';

                } else {
                    unset($_SESSION['giohang']);
                }

                if (count($_SESSION['giohang']) > 0) {
                    include "./view/shopcart-page.php";
                } else {
                    header('location: ./index.php');
                }
            }

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
        case 'checkoutbtn':

            $error = array();
            // Khi nút thanh toán được tồn tại và nó được click !!!
            if (isset($_POST['checkoutbtn']) && $_POST['checkoutbtn']) {
                // 1. Lấy dữ liệu
                $iduser = $_SESSION['iduser'];
                $tongdonhang = $_POST['tongdonhang'];
                $hoten = $_POST['fullname'];
                $diachi = $_POST['address'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['phonenumber'];
                $ghichu = $_POST['ghichu'];
                $pttt = "Thanh toán khi nhận hàng"; // Array[0,1,2,3] (hiện tại đang mặc định)
                // Sinh ra mã đơn hàng
                $madonhang = "YOURORDER" . random_int(2000, 9999999);

                date_default_timezone_set('Asia/Ho_Chi_Minh');

                $time_order = date('m/d/Y h:i:s a', time());

                // 2.validate php server
                if (empty($hoten)) {
                    $error['hoten'] = "Không để trống họ tên";
                } else if (strlen($hoten) > 30) {
                    $error['hoten'] = "Họ tên không được phép 30 ký tự";
                }

                if (empty($sodienthoai)) {
                    $error['sodienthoai'] = "Không để trống số điện thoại!";
                }

                if (empty($email)) {
                    $error['email'] = "Không để trống email";
                }
                if (empty($diachi)) {
                    $error['diachi'] = "Không để trống địa chỉ";
                }

                if (!$error) {
                    // Trừ số lượng trong hàng tồn kho đi.
                    $cartList = $_SESSION['giohang'];
                    foreach ($cartList as $cartItem) {
                        # code...
                        $product = product_select_by_id($cartItem[0]);

                        $productQtyRemain = $product['ton_kho'] - $cartItem[4];
                        // echo "So luong con lai trong kho: " . $productQtyRemain;
                        product_update_quantity($cartItem[0], $productQtyRemain);
                    }

                    // 3. tạo đơn hàng và trả về một id đơn hàng
                    $iddh = taodonhang($madonhang, $tongdonhang, $pttt, $hoten, $diachi, $email, $sodienthoai, $ghichu, $iduser, $time_order);
                    $_SESSION['iddh'] = $iddh;
                    if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                        foreach ($_SESSION['giohang'] as $item) {
                            # code...
                            addtocart($iddh, $item[0], $item[1], $item[2], $item[3], $item[4]);
                        }
                        // Xóa đơn hàng sau khi add to cart (database)

                        unset($_SESSION['giohang']);
                        unset($_SESSION['iddh']);
                    }
                    include "./view/detailorder-page.php";
                } else {
                    include "./view/checkout-page.php";
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
                    $iddm = $_POST['iddm'];
                    $tendanhmuc = $_POST['tendanhmuc'];
                    $tensp = $_POST['tensanpham'];
                    $img = $_POST['img'];
                    $gia = $_POST['giasp'];

                    if (isset($_POST['cart_quantity']) && ($_POST['cart_quantity'] > 0)) {
                        $sl = $_POST['cart_quantity'];

                        $product = product_select_by_id($id);
                        if ($sl > $product['ton_kho']) {
                            $sl = $product['ton_kho'];
                            $GLOBALS['changed_cart'] = true;
                        }

                    } else {
                        $sl = 1;
                    }

                    $flag = 0;

                    // Kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không ?
                    // Nếu có chỉ cập nhất lại số lượng

                    // Ngược lại add mới sp vào giỏ hàng

                    // Khởi tạo một mảng con trước khi đưa vào giỏ

                    $i = 0;

                    foreach ($_SESSION['giohang'] as $itemsp) {
                        # code...
                        // var_dump($itemsp);
                        if ($itemsp[0] === $id) {
                            $slnew = $sl + $itemsp[4];
                            // echo "So LUONG MOI: " . $slnew;

                            $_SESSION['giohang'][$i][4] = $slnew;
                            $flag = 1;
                            break;
                        }

                        $i++;
                    }

                    if ($flag == 0) {
                        $itemsp = array($id, $tensp, $img, $gia, $sl, $tendanhmuc);
                        // array_push($_SESSION['giohang'], $itemsp);
                        // $_SESSION['giohang'][] = $itemsp;

                        $_SESSION['giohang'][] = $itemsp;

                    }

                    // header('location: index.php?act=viewcart'); // Tại sao lại có dòng này ?

                } else {
                    // echo "NOTTHING ELSE HERE";
                }
            } else {
                header('location: index.php?act=signinpage');
            }
            include "./view/shopcart-page.php";
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
                        echo '<div class="alert alert-success">Sign up successfully</div>';
                    }
                    // Send email to success account
                }

            }
            include "./view/auth/signup.php";
            break;
        case 'login':
            $error = array();
            if (isset($_POST['loginbtn']) && $_POST['loginbtn']) {

                $username = $_POST['username'];
                $password = $_POST['password'];
                // Đối chiếu password

                // Mã hóa password

                if (empty($username)) {
                    $error['username'] = "Không để trống username";
                }

                if (empty($password)) {
                    $error['password'] = "Không để trống password";
                }

                $password = md5($password);
                // echo $password;

                $islogined = checkuser($username, $password);

                if ($islogined === -1) {
                    // $text_error = "username hoặc password không chính xác";

                    echo '<div class="alert-warning alert" style="">username hoặc password không chính xác</div>';
                    // include "./view/login-page.php";
                } else {
                    $kq = getuserinfo($username, $password);
                    // echo $kq;
                    // var_dump($kq);
                    $role = $kq[0]['vai_tro'];
                    // echo $role;
                    if ($role == 3) {
                        // $_SESSION['role'] = $role;
                        // $_SESSION['username'] = $kq[0]['user'];
                        // $_SESSION['iduser'] = $kq[0]['id'];
                        // header('location: admin/index.php');
                        $_SESSION['role'] = $role;
                        $_SESSION['username'] = $kq[0]['tai_khoan'];
                        $_SESSION['iduser'] = $kq[0]['id'];
                        // echo 'LOGIN SUCCESSFULLY!';
                        header('location: index.php');
                    } else {
                        // $_SESSION['role'] = $role;
                        // $_SESSION['username'] = $kq[0]['user'];
                        // $_SESSION['iduser'] = $kq[0]['id'];
                        // header('location: index.php');
                    }
                }

            }
            include "./view/auth/login.php";
            break;
        case 'forgotpass':
            $error = array();
            if (isset($_POST['forgotpassbtn']) && $_POST['forgotpassbtn']) {
                $username = $_POST['username'];
                $email = $_POST['email'];

                // Validate
                if (empty($username)) {
                    $error['username'] = "Không để trống username";
                }

                if (empty($email)) {
                    $error['email'] = "Không để trống email";
                } else if (is_email($username)) {
                    $error['email'] = "Định dạng email chưa chính xác!";
                }

                if (!$error) {
                    if (user_exist_by_username($username)) {
                        if (email_exist_by_username($email, $username)) {
                            $title = "Mã Code lấy lại mật khẩu";
                            $messageCode = random_int(100000, 999999);
                            $_SESSION['usernamedb'] = $username;
                            $_SESSION['verifycode'] = $messageCode;
                            sendmail($email, $title, $messageCode);
                            header("location: index.php?act=verifycode");
                        } else {
                            echo '<div class="alert alert-danger" >Email của bạn không đúng với tài khoản</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger" >Tài khoản của bạn không tồn tại</div>';
                    }
                }

            }

            include "./view/auth/forgot.php";
            break;
        case 'resetpass':
            include "./view/auth/reset-pass.php";
            break;

        case 'verifycode':
            $error = array();
            if (isset($_POST['verifycodebtn']) && $_POST['verifycodebtn']) {
                $code = $_POST['code'];

                if (empty($code)) {
                    $error['code'] = "Không để trống mã code";
                }

                if (isset($_SESSION['verifycode'])) {
                    $verifycode = $_SESSION['verifycode'];
                    if ($code != $verifycode) {
                        echo '<div class="alert alert-danger" >Mã code xác nhận không chính xác, mời nhập lại username và email</div>';
                        unset($_SESSION['verifycode']);
                        // header('location: index.php?act=forgotpass');
                    } else {
                        header('location: index.php?act=updatepass');
                    }
                }

            }
            include "./view/account/verifycode-page.php";
            break;
        case 'updateaccount':
            $error = array();
            if (isset($_POST['updateacountinfobtn']) && $_POST['updateacountinfobtn']) {
                $tai_khoan = $_POST['tai_khoan'];
                $ho_ten = $_POST['ho_ten'];
                $diachi = $_POST['diachi'];
                $sodienthoai = $_POST['sodienthoai'];
                $email = $_POST['email'];
                $target_dir = "content/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                // echo $target_file;
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], "../" . $target_file);

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

                if (empty($tai_khoan)) {
                    $error['tai_khoan'] = "Không để trống tài khoản!";
                }

                if (!$error) {
                    $is_updated = user_update_info($iduser, $tai_khoan, $ho_ten, $diachi, $sodienthoai, $kichhoat = 1, $target_file, $email, $role = 1);

                    if ($is_updated) {
                        echo '<div class="p-3 bg-success">Chúc mừng bạn đã cập nhật người dùng thành công</div>';
                        echo '
                        <script>
                        const collapseOneElement = document.getElementById("collapseOne");
                        if(collapseOneElement) {
                            collapseOneElement.classList.add("show");
                            collapseOneElement.classList.remove("collapse");
                        }
                    </script>
                        ';
                    } else {

                    }
                } else {
                    echo '
                    <script>
                    const collapseOneElement = document.getElementById("collapseOne");
                    const buttonOne = document.querySelector("#headingOne button");
                    if(buttonOne) {
                        buttonOne.classList.add("show");
                        buttonOne.classList.remove("collapse");
                    }
                    if(collapseOneElement) {
                        collapseOneElement.classList.add("show");
                        collapseOneElement.classList.remove("collapse");
                    }
                </script>
                    ';
                }

            } else {

            }
            include "./view/account/updateacount-page.php";
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
        case 'settingacountpage':
            include "./view/account/setting-acount-page.php";
            break;
        case 'historyorderdetailpage':
            if (isset($_GET['id'])) {
                $cartList = getshowcart($_GET['id']);
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
            header('location: index.php');
            break;

        case 'blog':
            include "./view/pages/blog/blog-list.php";
            break;
        case 'blogdetail':
            include "./view/pages/blog/blog-detail.php";
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
