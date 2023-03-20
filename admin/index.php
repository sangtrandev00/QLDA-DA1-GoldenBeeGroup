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
include "../DAO/blog.php";

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
            include "./view/pages/products/product-list.php";
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
                $image_files = $_FILES['images'];
                $image_list = implode(',', $image_files['name']);
                // var_dump($image_files);
                // var_dump($image_list);
                $i = 0;
                foreach ($image_files['name'] as $image_name) {
                    # code...
                    // $target_file = "../uploads/" . basename($file_name);
                    // var_dump($image_file_item);
                    move_uploaded_file($image_files["tmp_name"][$i], "../uploads/" . $image_name);
                    $i++;
                }

                $idproduct = $_GET['id'];
                $tensp = $_POST['tensp'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $id_dmphu = $_POST['id_dmphu'];
                $giam_gia = $_POST['giam_gia'];
                $don_gia = $_POST['don_gia'];
                $so_luong = $_POST['so_luong'];
                // $view = $_POST['view'];
                $mo_ta = $_POST['mo_ta'];
                $thong_tin = $_POST['thong_tin'];
                $dac_biet = 0;
                $promote = 1;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date_create = date('Y-m-d H:i:s');

                // Validate at server

                // if (strlen($tensp) == 0) {
                //     $error['proname'] = "Không để trống tên sản phẩm!";
                // }

                // if (!is_numeric($ma_danhmuc)) {
                //     $error['ma_danhmuc'] = "Không để trống mã danh mục!";
                // }

                // if (empty($don_gia)) {
                //     $error['don_gia'] = "không để trống đơn giá";
                // } else if ($don_gia < 0) {
                //     $error['don_gia'] = "Đơn giá phải lớn hơn 0!";
                // }

                // if (empty($giam_gia)) {
                //     $error['giam_gia'] = "Không để trống giảm giá";
                // } else if ($giam_gia < 0 || $giam_gia > 100) {
                //     $error['giam_gia'] = "Giảm giá phải lớn hơn hoặc bằng 0 và nhỏ hơn bằng 100";
                // }

                // if (empty($_FILES["hinhanh1"]["name"])) {
                //     $error['hinhanh1'] = "Không để trống hình ảnh chính, hình ảnh 1";
                // }

                // if (!$error) {
                $is_updated = product_update($idproduct, $tensp, $don_gia, $so_luong, $image_list, $giam_gia, $dac_biet, $date_create, $mo_ta, $thong_tin, $ma_danhmuc, $id_dmphu, $promote);
                if ($is_updated) {
                    echo '<script>
                            document.getElementById("liveToastBtn").click();
                            // $("#cartModal #cartModalLabel).text("Cập nhật sản phẩm thành công!");
                    </script>';
                    header("location: ./index.php?act=productlist");
                }
                // } else {

                // }
            }

            // include "./view/pages/products/product-list.php";
            break;
        case 'addproduct':
            $error = array();
            if (isset($_POST['addproductbtn']) && $_POST['addproductbtn']) {
                $image_files = $_FILES['images'];
                $image_list = implode(',', $image_files['name']);
                // var_dump($image_files);
                // var_dump($image_list);
                $i = 0;
                foreach ($image_files['name'] as $image_name) {
                    # code...
                    // $target_file = "../uploads/" . basename($file_name);
                    // var_dump($image_file_item);
                    move_uploaded_file($image_files["tmp_name"][$i], "../uploads/" . $image_name);
                    $i++;
                }
                // exit;
                $tensp = $_POST['tensp'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $id_dmphu = $_POST['id_dmphu'];
                $giam_gia = $_POST['giam_gia'];
                $don_gia = $_POST['don_gia'];
                $so_luong = $_POST['so_luong'];
                // $view = $_POST['view'];
                $mo_ta = $_POST['mo_ta'];
                $thong_tin = $_POST['thong_tin'];
                $dac_biet = 0;
                $promote = 1;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date_create = date('Y-m-d H:i:s');

                // if (strlen($tensp) == 0) {
                //     $error['tensp'] = "Không để trống tên sản phẩm!";
                // }
                // if (!is_numeric($ma_danhmuc)) {
                //     $error['ma_danhmuc'] = "Không để trống mã danh mục!";
                // }

                // if (!is_numeric($ma_danhmucphu)) {
                //     $error['ma_danhmucphu'] = "Không để trống mã danh mục!";
                // }

                // if (empty($don_gia)) {
                //     $error['don_gia'] = "không để trống đơn giá";
                // } else if ($don_gia < 0) {
                //     $error['don_gia'] = "Đơn giá phải lớn hơn 0!";
                // }

                // if (empty($giam_gia)) {
                //     $error['giam_gia'] = "Không để trống giảm giá";
                // } else if ($giam_gia < 0 || $giam_gia > 100) {
                //     $error['giam_gia'] = "Giảm giá phải lớn hơn hoặc bằng 0 và nhỏ hơn bằng 100";
                // }

                // if (empty($_FILES["hinhanh1"]["name"])) {
                //     $error['hinhanh1'] = "Không để trống hình ảnh chính, hình ảnh 1";
                // }

                // if (!$error) {
                $is_inserted = product_insert($tensp, $don_gia, $so_luong, $image_list, $giam_gia, $dac_biet, $date_create, $mo_ta, $thong_tin, $ma_danhmuc, $id_dmphu, $promote);
                if ($is_inserted) {
                    echo '<div class="p-3 alert alert-success text-center mt-5">Chúc mừng bạn đã thêm mới sản phẩm thành công</div>';
                }
                // }
            }

            include "./view/pages/products/add-product.php";
            break;
        case 'addcate':
            $error = array();
            if (isset($_POST['addcatebtn']) && $_POST['addcatebtn']) {
                $cate_name = $_POST['catename'];
                // $cate_image = $_FILES['cateimage'];
                $cate_parent = $_POST['cateparent'];

                $cate_desc = $_POST['catedesc'];

                // echo $cate_name, $cate_desc, $cate_desc;
                $target_file = "../uploads/" . basename($_FILES["cateimage"]["name"]);

                $image_file = $_FILES['cateimage'];

                move_uploaded_file($_FILES["cateimage"]["tmp_name"], $target_file);
                // Validate form by server
                // if (empty($catename)) {
                //     $error['catename'] = "Không để trống tên danh mục";
                // }

                // if (cate_exist_by_name($catename)) {
                //     echo '<div class="alert alert-danger">Tên danh mục đã bị trùng, mời nhập tên khác!</div>';
                // }
                // else {
                if ($cate_parent == "") {
                    $is_added = cate_insert($cate_name, $image_file['name'], $cate_desc);
                } else {
                    $subcate_id = add_subcate($cate_parent, $cate_name, $cate_desc);
                    header('location: index.php?act=subcatelist&cateid=' . $cate_parent);
                }
                if ($is_added) {
                    echo 'successfully!';
                    // echo '<div class="bg-success text-white p-2">Add category successully</div>';
                } else {
                    echo "Add category failed";
                }
                // }

            }

            include "./view/pages/categories/cate-list.php";
            break;
        case 'editcate':
            include "./view/pages/categories/cate-list.php";
            break;
        case 'updatecate':

            $error = array();

            if (isset($_POST['editcatebtn']) && $_POST['editcatebtn']) {
                $madanhmuc = $_GET['id'];
                $tendanhmuc = $_POST['catename'];

                $cate_parent = $_POST['cateparent'];
                $cate_desc = $_POST['catedesc'];

                // echo $cate_name, $cate_desc, $cate_desc;
                $target_file = "../uploads/" . basename($_FILES["cateimage"]["name"]);

                $hinh_anh = $_FILES['cateimage'];

                move_uploaded_file($_FILES["cateimage"]["tmp_name"], $target_file);
                // echo $tendanhmuc;
                if (empty($tendanhmuc)) {
                    $error['catename'] = "Không để trống tên danh mục";
                } else {
                    if (cate_exist_by_name($tendanhmuc)) {
                        echo '<div class="alert alert-danger">Tên danh mục đã bị trùng, mời nhập tên khác!</div>';
                    } else {

                        cate_update($madanhmuc, $tendanhmuc, $hinh_anh['name'], $cate_desc);
                        echo 'UPdate successfully';
                        // echo '<div class="bg-success text-white p-2">Add category successully</div>';
                    }
                }

            }

            include "./view/pages/categories/cate-list.php";
            break;
        case 'deletecate':
            if (isset($_GET['id'])) {
                $madanhmuc = $_GET['id'];
                cate_delete($madanhmuc);
                // header("location: ./index.php?act=catelist");
                // echo "successfully!";
                include "./view/pages/categories/cate-list.php";
            }
            break;
        case 'deletesubcate':
            // &subid=22&cateid=46
            if (isset($_GET['subid'])) {
                $subcateid = $_GET['subid'];
                $cateid = $_GET['cateid'];
                echo $subcateid . $cateid;
                subcate_delete($subcateid);
                header("location: ./index.php?act=subcatelist&cateid=" . $cateid);
                // echo "successfully!";
                // include "./vaiew/pages/categories/subcate-list.php";
                // header('location: ./index.php?act=subcatelist&id=')
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
                $cart_list = getshoworderdetail($iddh);
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
            header('location: ./auth/login.php');

            break;

        case 'addblog':
            if (isset($_POST['addblog']) && ($_POST['addblog'])) {
                $idcate = $_POST['idcate'];
                $title = $_POST['title'];
                $date = date('Y-m-d H:i:s');
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {

                }
                $conten = $_POST['noidung'];
                add_blog($title, $hinh, $conten, $date, $idcate);
                $thongbao = "Đã Đăng Bài Viết Thành Công";
            }
            
            $list_blogcate = loadall_cateblog();
            include "./view/pages/blogs/add-blog.php";
            break;
        case 'bloglist':
            include "./view/pages/blogs/blog-list.php";
            break;
        case 'deleteblog':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $blog = delete_blog($_GET['id']);
                $thongbao = "Đã Xóa Bài Viết ".$_GET['id']." Thành Công";
            }
            include './view/pages/blogs/blog-list.php';
            break;
        case 'editblog':
            if (isset($_GET['id']) && (isset($_GET['id']) > 0)) {
                $blog = loadone_blog($_GET['id']);
            }
            include './view/pages/blogs/edit-blog.php';
            break;
        case 'updateblog':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $noidung = $_POST['noidung'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                }
                updateblog($id, $title, $hinh, $noidung);
                
            $thongbaoupdate = "Đã Cập Nhật Bài Viết ".$id." Thành Công";

            }
            include './view/pages/blogs/blog-list.php';
            break;
        case 'blogcate':
            include "./view/pages/blogs/blog-cate.php";
            break;
        case 'addcateblog':
            if (isset($_POST['addcateblog']) && ($_POST['addcateblog'])) {
                $blogcatename = $_POST['blogcatename'];
                $hinhcateblog = $_FILES['hinh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                }
                add_cateblog($blogcatename, $hinhcateblog);
                $thongbao = "Đã Thêm Danh Mục Bài Viết Thành Công";

            }
            include './view/pages/blogs/blog-cate.php';
            break;
        case 'deletecateblog':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $blog = delete_cateblog($_GET['id']);
                $thongbaodelete = "Đã Xóa Danh Mục Bài Viết #".$_GET['id']." Thành Công";

            }
            include './view/pages/blogs/blog-cate.php';
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
