<?php
ob_start();
session_start();

include "../global.php";

include "./models/connectdb.php";
include "./models/category.php";
include "./models/order.php";

include "../DAO/category.php";
include "../DAO/product.php";
include "../DAO/user.php";
include "../DAO/comment.php";
include "../DAO/report.php";

// HEADER SECTION
include "./view/layout/header.php";
// SIDEBAR SECTION
include "./view/components/sidebar/sidebar.php";

// if (isset($_SESSION['iduser'])) {

if (isset($_GET['act'])) {
    switch ($_GET['act']) {

        case 'loginpage':
            if (isset($_SESSION['iduser']) && $_SESSION['iduser'] > 0) {

            }

            // include "./view/pages/loginpage.php";

            break;

        case 'productlist':
            include "./view/pages/products/product-list.php";
            break;
        case 'deleteproduct':
            if (isset($_GET['id'])) {
                product_delete($_GET['id']);
            }
            include "./view/product/listproduct-page.php";
            break;

        case 'deleteproducts':
            if (isset($_POST['idCheckedList'])) {
                $idCheckedList = explode(',', $_POST['idCheckedList']);
                // var_dump($idCheckedList);
                $is_deleted = product_delete($idCheckedList);
                if ($is_deleted) {
                    echo '<div class="alert alert-danger">Xóa sản phẩm thành công</div>';
                }
                include "./view/product/listproduct-page.php";
            }
            break;

        case 'editproduct':
            $error = array();
            if (isset($_POST['editproductbtn']) && $_POST['editproductbtn']) {
                $idproduct = $_POST['idproduct'];
                $tensp = $_POST['tensp'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $giam_gia = $_POST['giam_gia'];
                $don_gia = $_POST['don_gia'];
                $view = $_POST['view'];
                $so_luong = $_POST['so_luong'];
                $dac_biet = isset($_POST['hangdacbiet']) ? $_POST['hangdacbiet'] : 0;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:i:s');

                // echo $date;

                $target_file1 = "content/" . basename($_FILES["hinhanh1"]["name"]);
                $target_file2 = "content/" . basename($_FILES["hinhanh2"]["name"]);
                $target_file3 = "content/" . basename($_FILES["hinhanh3"]["name"]);
                $target_file4 = "content/" . basename($_FILES["hinhanh4"]["name"]);

                // echo $target_file1, $target_file2, $target_file3, $target_file4, $target_file5; --> Kiểm lỗi file hình ảnh mới dài dòng đây =))
                move_uploaded_file($_FILES["hinhanh1"]["tmp_name"], "../" . $target_file1);
                move_uploaded_file($_FILES["hinhanh2"]["tmp_name"], "../" . $target_file2);
                move_uploaded_file($_FILES["hinhanh3"]["tmp_name"], "../" . $target_file3);
                move_uploaded_file($_FILES["hinhanh4"]["tmp_name"], "../" . $target_file4);

                $mo_ta = $_POST['mo_ta'];

                // Validate at server

                if (strlen($tensp) == 0) {
                    $error['proname'] = "Không để trống tên sản phẩm!";
                }

                if (!is_numeric($ma_danhmuc)) {
                    $error['ma_danhmuc'] = "Không để trống mã danh mục!";
                }

                if (empty($don_gia)) {
                    $error['don_gia'] = "không để trống đơn giá";
                } else if ($don_gia < 0) {
                    $error['don_gia'] = "Đơn giá phải lớn hơn 0!";
                }

                if (empty($giam_gia)) {
                    $error['giam_gia'] = "Không để trống giảm giá";
                } else if ($giam_gia < 0 || $giam_gia > 100) {
                    $error['giam_gia'] = "Giảm giá phải lớn hơn hoặc bằng 0 và nhỏ hơn bằng 100";
                }

                if (empty($_FILES["hinhanh1"]["name"])) {
                    $error['hinhanh1'] = "Không để trống hình ảnh chính, hình ảnh 1";
                }

                if (!$error) {
                    $is_updated = product_update($idproduct, $tensp, $don_gia, $so_luong, $giam_gia, $target_file1, $target_file2, $target_file3, $target_file4, $ma_danhmuc, $dac_biet, $view, $date, $mo_ta);
                    if ($is_updated) {
                        echo '<div class="p-3 alert alert-success">Chúc mừng bạn đã cập nhật sản phẩm thành công</div>';
                    }
                } else {

                    //header('location: ./index.php?act=editproduct&id=' . $idproduct);
                }

            }

            include "./view/product/editproduct-page.php";
            break;
        case 'addproduct':
            $error = array();
            if (isset($_POST['addproductbtn']) && $_POST['addproductbtn']) {
                $tensp = $_POST['tensp'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                // echo $ma_danhmuc;
                // $oldprice = $_POST['oldprice'];
                $giam_gia = $_POST['giam_gia'];
                $don_gia = $_POST['don_gia'];
                $so_luong = $_POST['so_luong'];
                $view = $_POST['view'];
                $dac_biet = 0;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:i:s');
                // echo $date;

                $target_file1 = "content/" . basename($_FILES["hinhanh1"]["name"]);
                $target_file2 = "content/" . basename($_FILES["hinhanh2"]["name"]);
                $target_file3 = "content/" . basename($_FILES["hinhanh3"]["name"]);
                $target_file4 = "content/" . basename($_FILES["hinhanh4"]["name"]);

                // echo $target_file1, $target_file2, $target_file3, $target_file4, $target_file5;
                move_uploaded_file($_FILES["hinhanh1"]["tmp_name"], "../" . $target_file1);
                move_uploaded_file($_FILES["hinhanh2"]["tmp_name"], "../" . $target_file2);
                move_uploaded_file($_FILES["hinhanh3"]["tmp_name"], "../" . $target_file3);
                move_uploaded_file($_FILES["hinhanh4"]["tmp_name"], "../" . $target_file4);

                $mo_ta = $_POST['mo_ta'];

                // Validate at server

                if (strlen($tensp) == 0) {
                    $error['proname'] = "Không để trống tên sản phẩm!";
                }
                if (!is_numeric($ma_danhmuc)) {
                    $error['ma_danhmuc'] = "Không để trống mã danh mục!";
                }

                if (empty($don_gia)) {
                    $error['don_gia'] = "không để trống đơn giá";
                } else if ($don_gia < 0) {
                    $error['don_gia'] = "Đơn giá phải lớn hơn 0!";
                }

                if (empty($giam_gia)) {
                    $error['giam_gia'] = "Không để trống giảm giá";
                } else if ($giam_gia < 0 || $giam_gia > 100) {
                    $error['giam_gia'] = "Giảm giá phải lớn hơn hoặc bằng 0 và nhỏ hơn bằng 100";
                }

                if (empty($_FILES["hinhanh1"]["name"])) {
                    $error['hinhanh1'] = "Không để trống hình ảnh chính, hình ảnh 1";
                }

                if (!$error) {
                    $is_inserted = product_insert($tensp, $don_gia, $so_luong, $giam_gia, $target_file1, $target_file2, $target_file3, $target_file4, $ma_danhmuc, $dac_biet, $view, $date, $mo_ta);
                    if ($is_inserted) {
                        echo '<div class="p-3 alert alert-success">Chúc mừng bạn đã thêm mời dùng mới thành công</div>';
                    }
                }
            }

            include "./view/pages/products/add-product.php";
            break;
        case 'addcate':
            $error = array();
            if (isset($_POST['addcatebtn']) && $_POST['addcatebtn']) {
                $cate_name = $_POST['catename'];
                $cate_image = $_POST['cateimage'];
                $cate_parent = $_POST['cateparent'];
                $cate_desc = $_POST['catedesc'];

                // Validate form by server
                if (empty($catename)) {
                    $error['catename'] = "Không để trống tên danh mục";
                }

                if (cate_exist_by_name($catename)) {
                    echo '<div class="alert alert-danger">Tên danh mục đã bị trùng, mời nhập tên khác!</div>';
                } else {

                    $is_added = add_cate($catename);
                    if ($is_added) {
                        echo '<div class="bg-success text-white p-2">Add category successully</div>';
                    } else {
                        echo "Add category failed";
                    }
                }

            }

            include "./view/pages/categories/cate-list.php";
            break;
        case 'editcate':
            include "./view/cate/editcate-page.php";
            break;
        case 'updatecate':

            $error = array();

            if (isset($_POST['editcatebtn']) && $_POST['editcatebtn']) {
                $madanhmuc = $_POST['madanhmuc'];
                $tendanhmuc = $_POST['catename'];
                // echo $tendanhmuc;
                if (empty($tendanhmuc)) {
                    $error['catename'] = "Không để trống tên danh mục";
                } else {
                    if (cate_exist_by_name($tendanhmuc)) {
                        echo '<div class="alert alert-danger">Tên danh mục đã bị trùng, mời nhập tên khác!</div>';
                    } else {

                        cate_update($madanhmuc, $tendanhmuc);
                        echo '<div class="bg-success text-white p-2">Add category successully</div>';
                    }
                }

            }

            include "./view/cate/editcate-page.php";
            break;
        case 'deletecate':
            if (isset($_GET['id'])) {
                $madanhmuc = $_GET['id'];
                cate_delete($madanhmuc);
                header("location: ./index.php?act=catelist");
            }
            break;
        case 'catelist':
            include "./view/pages/categories/cate-list.php";
            break;
        case 'subcatelist':
            include "./view/pages/categories/subcate-list.php";
            break;
        case 'commentlist':
            include "./view/comments/comments-page.php";
            break;
        case 'deletecomment':
            if (isset($_GET['id'])) {
                comment_delete($_GET['id']);
                header('location: index.php?act=commentdetail&id=' . $_GET['idproduct']);
            }
            // include "./view/comments/comment-detail.php";
            break;
        case 'approvecomment':
            if (isset($_GET['id'])) {
                comment_approve($_GET['id']);
                header('location: index.php?act=commentdetail&id=' . $_GET['idproduct']);
            }
            // include "./view/comments/comment-detail.php";
            break;
        case 'commentdetail':
            include "./view/comments/comment-detail.php";
            break;
        case 'reportbycate':
            include "./view/reports/reportbycate-page.php";
            break;
        case 'reportbycatechart':
            include "./view/reports/reportbycatechart-page.php";
            break;
        case 'reportlist':
            include "./view/reports/reportlist-page.php";
            break;
        case 'userlist':
            if (isset($_SESSION['iduser']) && $_SESSION['role'] == 1) {
                include "./view/user/userlist-page.php";
            } else {
                header('location: index.php');
            }

            break;
        case 'customerlist':
            if (isset($_SESSION['iduser']) && $_SESSION['role'] == 1) {
                include "./view/user/customerlist-page.php";
            } else {
                header('location: index.php');
            }

            break;
        case 'adduser':
            $error = array();
            if (isset($_POST['adduserbtn']) && $_POST['adduserbtn']) {
                // Get data
                $name = $_POST['fullname'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $kichhoat = $_POST['kichhoat'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                // $imageurl = $_FILES['imageurl'];

                $target_dir = "content/";
                $target_file = $target_dir . basename($_FILES["imageurl"]["name"]);
                // echo $target_file;
                move_uploaded_file($_FILES["imageurl"]["tmp_name"], "../" . $target_file);
                // echo $iduser;
                if (empty($_FILES["imageurl"]["name"])) {
                    $error['img'] = "Không để trống hình ảnh";
                }
                // Validate at server

                if (strlen($name) == 0) {
                    $error['name'] = "Không để trống họ tên!";
                } else if (strlen($name) > 30) {
                    $error['name'] = "Họ tên không vượt quá 30 ký tự!";
                }

                if (empty($email)) {
                    $error['email'] = "không để trống email";
                } else if (!is_email($email)) {
                    $error['email'] = "Email không đúng định dạng!";
                }

                if (strlen($phone) == 0) {
                    $error['phone'] = "Không để trống số điện thoại!";
                } else if (!validating($phone)) {
                    $error['phone'] = "Định dạng số điện thoại không chính xác!";
                }

                if (empty($username)) {
                    $error['username'] = "Không để trống username!";
                }

                if (empty($password)) {
                    $error['password'] = "không để trống password!";
                }

                if (!$error) {
                    // Encrypt password
                    $password = md5($password);
                    $is_inserted = user_insert($username, $password, $name, $address, $phone, $kichhoat, $target_file, $email, $role);

                    if ($is_inserted) {
                        echo '<div class="p-3 bg-light">Chúc mừng bạn đã thêm mời dùng mới thành công</div>';
                    }
                }
            }
            include "./view/user/adduser-page.php";
            // include "./view/user/adduser-page.php";
            break;
        case 'edituser':
            $error = array();
            if (isset($_POST['edituserbtn']) && $_POST['edituserbtn']) {

                $iduser = $_POST['iduser'];
                $name = $_POST['fullname'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $kichhoat = $_POST['kichhoat'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                // $imageurl = $_FILES['imageurl'];

                $target_dir = "content/";
                $target_file = $target_dir . basename($_FILES["imageurl"]["name"]);
                // echo $target_file;
                move_uploaded_file($_FILES["imageurl"]["tmp_name"], "../" . $target_file);

                // validation using php at server
                if (empty($_FILES["imageurl"]["name"])) {
                    $error['img'] = "Không để trống hình ảnh";
                }
                // Validate at server

                if (strlen($name) == 0) {
                    $error['name'] = "Không để trống họ tên!";
                } else if (strlen($name) > 30) {
                    $error['name'] = "Họ tên không vượt quá 30 ký tự!";
                }

                if (empty($email)) {
                    $error['email'] = "không để trống email";
                } else if (!is_email($email)) {
                    $error['email'] = "Email không đúng định dạng!";
                }

                if (strlen($phone) == 0) {
                    $error['phone'] = "Không để trống số điện thoại!";
                } else if (!validating($phone)) {
                    $error['phone'] = "Định dạng số điện thoại không chính xác!";
                }

                if (empty($username)) {
                    $error['username'] = "Không để trống username!";
                }

                if (empty($password)) {
                    $error['password'] = "không để trống password!";
                }

                if (!$error) {
                    $password = md5($password);

                    // echo $role;
                    $is_updated = user_update($iduser, $username, $password, $name, $address, $phone, $kichhoat, $target_file, $email, $role);

                    if ($is_updated) {
                        echo '<div class="p-3 alert alert-success">Chúc mừng bạn đã cập nhật người dùng thành công</div>';
                    }

                }

            }

            include "./view/user/edituser-page.php";
            break;
        case 'deleteuser':
            if (isset($_GET['id'])) {
                $comments_deleted = comment_delete_by_iduser($_GET['id']);
                $id_deleted = user_delete($_GET['id']);
                if ($id_deleted) {

                    echo '<div class="p-3 alert alert-success text-white">Chúc mừng bạn đã xóa người dùng thành công</div>';

                }
            }

            include "./view/user/userlist-page.php";
            break;

        case 'orderlist':

            include "./view/pages/orders/order-list.php";
            break;

        case 'orderdetail':
            if (isset($_GET['iddh'])) {
                $iddh = $_GET['iddh'];
                $cart_list = getshowcart($iddh);
                $orderInfo = getorderinfo($iddh);
                // var_dump($orderInfo);
                include "./view/order/orderdetail-page.php";
            }

            include "./view/pages/orders/order-detail.php";

            break;
        case 'userorderdetail':
            if (isset($_GET['iduser'])) {
                $iduser = $_GET['iduser'];
                $cart_list = getshowcartbyiduser($iduser);
                // var_dump($cart_list);
                include "./view/order/userorderdetail-page.php";
            }

            break;

        // case 'orderconfirm':
        //     if (isset($_GET['id'])) {
        //         $id = $_GET['id'];
        //         echo $id;
        //         $is_updated = updateorderbyid($_GET['id']);

        //         if ($is_updated) {
        //             echo 'update successfully!';
        //         }
        //         header('location: index.php?act=orderlist');
        //     }
        //     echo 'Hello world';
        //     break;
        case 'updateorder':
            if (isset($_POST['updateorderbtn']) && $_POST['updateorderbtn']) {

                if (isset($_GET['iddh']) && $_GET['iddh'] > 0) {

                    $iddh = $_GET['iddh'];
                    $status = $_POST['status'];
                    echo $status;

                    // echo $status;

                    $is_updated = updateorderstatus($iddh, $status);
                    if ($is_updated) {
                        echo '
                                <script>
                                    const notifyModelBtn = document.querySelector("#notifyModelBtn");
                                    console.log(notifyModelBtn);
                                </script>
                            ';
                    } else {
                    }
                    // include "view/order/userorderdetail-page.php";
                    header('location: ./index.php?act=orderdetail&iddh=' . $iddh . '&status=updated');
                }

            }
            break;

        case 'deleteorder':
            if (isset($_GET['iddh'])) {
                $iddh = $_GET['iddh'];
                $cart_list = getshowcart($iddh);
                $orderInfo = getorderinfo($iddh);
                deleteorderdetailbyid($iddh);
                $is_deleted = deleteorderbyid($iddh);

                if ($is_deleted) {
                    echo '<div class="alert alert-danger">Bạn đã xóa đơn hàng  đơn hàng ' . $iddh . ' thành công!</div>';
                }
                include "view/order/orderlist-page.php";
                // header('location: index.php?act=orderdetail&iddh=' . $iddh);
            }

            break;
        case 'logout':
            unset($_SESSION['role']);
            unset($_SESSION['username']);
            unset($_SESSION['iduser']);
            header('location: loginpage.php');

            break;

        case 'addblog':
            include "./view/pages/blogs/add-blog.php";
            break;

        default:
            // if (isset($_SESSION['iduser'])) {
            include "./view/pages/dashboard/dashboard.php";
            // } else {
            //     header('location: loginpage.php');
            // }

    }
} else {
    // if (isset($_SESSION['iduser'])) {
    include "./view/pages/dashboard/dashboard.php";
    // } else {
    //     header('location: loginpage.php');
    // }
}

include "./view/layout/footer.php";

// }
// else {
//     header('location: loginpage.php');
// }