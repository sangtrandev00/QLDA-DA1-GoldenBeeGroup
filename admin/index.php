<?php
ob_start();
session_start();

if (!isset($_SESSION['alert'])) {
    $_SESSION['alert'] = "";
}

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
include "../DAO/order.php";
include "../DAO/banner_slider.php";
include "../DAO/feedback.php";
// HEADER SECTION
include "./view/layout/header.php";
echo '<div class="d-flex">';
include "./view/components/sidebar/sidebar.php";
// SIDEBAR SECTION
include "./view/layout/breadcrumb.php";

$GLOBALS['inventory_cart'] = "Vượt quá số lượng tồn kho";
if (isset($_SESSION['idadmin'])) {
    // var_dump($_SESSION);
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {

            // case 'loginpage':
            //     if (isset($_SESSION['iduser']) && $_SESSION['iduser'] > 0) {

            //     }

            //     // include "./view/pages/loginpage.php";

            //     break;

            case 'productlist':
                include "./view/pages/products/product-list.php";
                break;

            case 'deleteproduct':
                if (isset($_GET['id'])) {
                    $is_deleted = product_delete($_GET['id']);
                    if ($is_deleted) {
                        echo '
                        <script>
                            // <div class="alert alert-danger">Bạn đã xóa sản phẩm #' . $_GET['id'] . ' thành công</div>
                            document.addEventListener("DOMContentLoaded", (event) => {
                                showToast("Xóa sản phẩm", "Chúc mừng bạn đã Xóa sản phẩm #' . $_GET['id'] . ' thành công");
                            });p
                        </script>
                    ';
                    }
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
                // if (isset($_POST['editproductbtn']) && $_POST['editproductbtn']) {
                if (isset($_GET['id'])) {
                    $idproduct = $_GET['id'];
                    $product_item = product_select_by_id($idproduct);
                    // var_dump($product_item);
                    // exit;
                    // var_dump($_FILES['images']);
                    if (!$_FILES['images']['name'][0]) {
                        $image_list = $product_item['images'];
                        // var_dump($image_list);
                    } else {
                        $image_files = $_FILES['images'];
                        $image_list = implode(',', $image_files['name']);
                        $i = 0;
                        foreach ($image_files['name'] as $image_name) {
                            # code...
                            // $target_file = "../uploads/" . basename($file_name);
                            // var_dump($image_file_item);
                            move_uploaded_file($image_files["tmp_name"][$i], "../uploads/" . $image_name);
                            $i++;
                        }
                    }

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
                           document.addEventListener("DOMContentLoaded", function(e) {
                                showToast("Cập nhật sản phẩm #' . $idproduct . ' thành công", "Chúc mừng bạn đã Cập nhật sản phẩm #' . $idproduct . ' thành công");
                           })
                    </script>';
                        // header("location: ./index.php?act=productlist");
                    }
                    // } else {

                    // }
                }

                include "./view/pages/product-list.productsphp";
                break;
            case 'addproduct':
                $error = array();
                if (isset($_POST['addproductbtn']) && $_POST['addproductbtn']) {
                    $image_files = $_FILES['images'];
                    $image_list = implode(',', $image_files['name']);
                    // var_dump($image_files);

                    if ($_FILES["images"]["name"][0] == "") {
                        $error['images'] = "Không để trống hình ảnh";
                    }

                    $i = 0;
                    foreach ($image_files['name'] as $image_name) {
                        # code...
                        // $target_file = "../uploads/" . basename($file_name);
                        // var_dump($image_file_item);
                        $imageFileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

                        if ($_FILES['images']['name'][0] != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif") {
                            $error['images'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                            break;
                        }

                        move_uploaded_file($image_files["tmp_name"][$i], "../uploads/" . $image_name);
                        $i++;
                    }

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
                    $promote = 0;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date_create = date('Y-m-d H:i:s');

                    // Validate server here !!!
                    if (strlen($tensp) == 0) {
                        $error['product-name'] = "Không để trống tên sản phẩm!";
                    }
                    if (!is_numeric($ma_danhmuc)) {
                        $error['cate'] = "Không để trống mã danh mục!";
                    }

                    if (!is_numeric($id_dmphu)) {
                        $error['subcate'] = "Không để trống mã danh mục phụ";
                    }

                    if (empty($mo_ta)) {
                        $error['desc'] = "Không để trống mô tả sản phẩm";
                    }

                    if (empty($thong_tin)) {
                        $error['info'] = "Không để trống thông tin sản phẩm";
                    }

                    if (empty($don_gia)) {
                        $error['price'] = "không để trống đơn giá";
                    } else if ($don_gia < 0) {
                        $error['price'] = "Đơn giá phải lớn hơn 0!";
                    }

                    if (empty($giam_gia)) {
                        $error['discount'] = "Không để trống giảm giá";
                    } else if (!is_numeric($giam_gia)) {
                        $error['discount'] = "Không để trống giảm giá";
                    } else if ($giam_gia < 0 || $giam_gia > 100) {
                        $error['discount'] = "Giảm giá phải lớn hơn hoặc bằng 0 và nhỏ hơn bằng 100";
                    }

                    if (!$error) {
                        $is_inserted = product_insert($tensp, $don_gia, $so_luong, $image_list, $giam_gia, $dac_biet, $date_create, $mo_ta, $thong_tin, $ma_danhmuc, $id_dmphu, $promote);
                        if ($is_inserted) {
                            echo '<div class="p-3 alert alert-success text-center mt-5">Chúc mừng bạn đã thêm mới sản phẩm thành công</div>';
                        }
                    } else {
                        $_SESSION['alert'] = "Thêm sản phẩm thất bại!";
                    }
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
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    // Allow certain file formats
                    if ($image_file['name'] == "") {
                        $error['image'] = "Hình ảnh không được để trống";
                    } else if ($image_file['name'] != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        $error['image'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                    }

                    move_uploaded_file($_FILES["cateimage"]["tmp_name"], $target_file);
                    // Validate form by server
                    if (empty($cate_name)) {
                        $error['catename'] = "Không để trống tên danh mục";
                    } else if (cate_exist_by_name($cate_name)) {
                        $error['catename'] = "Tên danh mục đã bị trùng mời nhập tên khác";
                    }
                    // else {

                    // If no error
                    if (!$error) {
                        if ($cate_parent == "") {
                            $is_added = cate_insert($cate_name, $image_file['name'], $cate_desc);
                        } else {
                            $subcate_id = add_subcate($cate_parent, $cate_name, $cate_desc);
                            header('location: index.php?act=subcatelist&cateid=' . $cate_parent);
                        }
                        if ($is_added) {
                            $_SESSION['alert'] = "Thêm danh mục sản phẩm thành công!";
                            // echo '<div class="bg-success text-white p-2">Add category successully</div>';
                        } else {

                        }
                    }
                }

                include "./view/pages/categories/cate-list.php";
                break;
            case 'addsubcate':
                $error = array();
                if (isset($_POST['addsubcatebtn']) && $_POST['addsubcatebtn']) {
                    $subcate_name = $_POST['subcatename'];
                    // $cate_image = $_FILES['cateimage'];
                    if ($subcate_name == "") {
                        $error['subcatename'] = "Tên danh mục phụ rỗng !";
                    }

                    $cate_parent = $_POST['cateparent'];

                    $cate_desc = $_POST['subcatedesc'];

                    if (!$error) {

                        $is_added = subcate_insert($cate_parent, $subcate_name, $cate_desc);
                        $_SESSION['alert'] = "Thêm sản phẩm thành công!";
                        if ($is_added) {

                            echo '
                                <script>
                                    document.addEventListener("DOMContentLoaded", (e) => {
                                        showToast();
                                    })
                                </script>
                            ';

                        } else {
                            echo "Add category failed";
                        }
                    } else {
                        $_SESSION['alert'] = "Thêm sản phẩm thất bại!";
                    }
                    // include "./index.php?act=subcatelist&cateid=" . $cate_parent;

                    header("location: ./index.php?act=subcatelist&cateid=" . $cate_parent);
                }

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
                    $cate_item = cate_select_by_id($madanhmuc);

                    if ($_FILES['cateimage']['name'] == '') {
                        $cate_image = $cate_item['hinh_anh'];
                    } else {
                        $target_file = "../uploads/" . basename($_FILES["cateimage"]["name"]);
                        $hinh_anh = $_FILES['cateimage'];
                        $cate_image = $hinh_anh['name'];
                        move_uploaded_file($_FILES["cateimage"]["tmp_name"], $target_file);
                    }

                    // echo $cate_name, $cate_desc, $cate_desc;

                    // echo $tendanhmuc;
                    if (empty($tendanhmuc)) {
                        $error['catename'] = "Không để trống tên danh mục";
                    } else {
                        if (cate_exist_by_name($tendanhmuc)) {
                            echo '<div class="alert alert-danger">Tên danh mục đã bị trùng, mời nhập tên khác!</div>';
                        } else {

                            cate_update($madanhmuc, $tendanhmuc, $cate_image, $cate_desc);
                            echo 'Update successfully';
                            // echo '<div class="bg-success text-white p-2">Add category successully</div>';
                        }
                    }

                }

                include "./view/pages/categories/cate-list.php";
                break;
            case 'deletecate':
                $error = array();
                if (isset($_GET['id'])) {
                    $madanhmuc = $_GET['id'];

                    // validate here!!!
                    //  is exist any danh muc phu theo id danh muc
                    if (subcate_exist_in_cate($_GET['id'])) {
                        // echo "Oke have";
                        $_SESSION['alert'] = "<p >Xóa danh mục  #$madanhmuc không thành công!</p> <p>Danh mục đã tồn tại danh mục con</p> <p>Hãy xóa danh mục con của danh mục này trước!</p>";
                        $error['subcateexist'] = "Danh mục đã tồn tại danh mục con";
                    }

                    if (!$error) {
                        cate_delete($madanhmuc);
                        $_SESSION['alert'] = "Xóa danh mục #$madanhmuc thành công!";
                    }
                    // echo $_SESSION['alert'];
                    include "./view/pages/categories/cate-list.php";
                }
                break;
            case 'deletesubcate':
                // &subid=22&cateid=46
                $error = [];
                if (isset($_GET['subid'])) {
                    $subcateid = $_GET['subid'];
                    $cateid = $_GET['cateid'];
                    echo $subcateid . $cateid;
                    if (count_products_by_subcate($subcateid) > 0) {
                        $error['existproducts'] = "Sản phẩm đã tồn tại trong danh mục con này!";
                    }

                    if (!$error) {
                        subcate_delete($subcateid);
                    }

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
            case 'reviews-product':
                include "./view/pages/products/product-reviews.php";
                break;
            case 'feedback-list':
                include "./view/pages/feedback/feedback-list.php";
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
            case 'my-profile':
                include "./view/pages/user/user-profile.php";
                break;
            case 'userlist':
                include "./view/pages/user/userlist-page.php";
                break;
            case 'adminlist':

                include "./view/pages/user/adminlist-page.php";

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
                    // $username = $_POST['username'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];
                    $filename = $_FILES["image"]["name"];
                    // $imageurl = $_FILES['imageurl'];

                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                    if (empty($_FILES["image"]["name"])) {
                        $error['img'] = "Không để trống hình ảnh";
                    }
                    // Validate at server

                    if (strlen($name) == 0) {
                        $error['name'] = "Không để trống họ tên!";
                    } else if (strlen($name) > 30) {
                        $error['name'] = "Họ tên không vượt quá 30 ký tự!";
                    }
                    if (empty($address)) {
                        $error['address'] = "Không để trống địa chỉ!";
                    }
                    if (empty($email)) {
                        $error['email'] = "Không để trống email!";
                    } else if (!is_email($email)) {
                        $error['email'] = "Email không đúng định dạng!";
                    }

                    if (strlen($phone) == 0) {
                        $error['phone'] = "Không để trống số điện thoại!";
                    } else if (!validating($phone)) {
                        $error['phone'] = "Định dạng số điện thoại không chính xác!";
                    }

                    if (empty($password)) {
                        $error['password'] = "Không để trống password!";
                    }

                    if (!$error) {
                        // Encrypt password
                        $password = md5($password);
                        $is_inserted = user_insert($password, $name, $address, $phone, $kichhoat, $filename, $email, $role);
                        header('Location: index.php?act=adduser');
                        // if ($is_inserted) {
                        //     echo '<div class="p-3 bg-light">Chúc mừng bạn đã thêm mời dùng mới thành công</div>';
                        // }
                    }
                }
                include "./view/pages/user/adduser-page.php";
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
                    // $username = $_POST['username'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];
                    $filename = $_FILES['image']['name'];

                    // $imageurl = $_FILES['imageurl'];

                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    // echo $target_file;

                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                    // validation using php at server
                    // if (empty($_FILES["image"]["name"])) {
                    //     $error['img'] = "Không để trống hình ảnh";
                    // }
                    // Validate at server

                    if (strlen($name) == 0) {
                        $error['name'] = "Không để trống họ tên!";
                    } else if (strlen($name) > 30) {
                        $error['name'] = "Họ tên không vượt quá 30 ký tự!";
                    }

                    if (empty($address)) {
                        $error['address'] = "Không để trống địa chỉ!";
                    }

                    if (empty($email)) {
                        $error['email'] = "Không để trống email";
                    } else if (!is_email($email)) {
                        $error['email'] = "Email không đúng định dạng!";
                    }

                    if (strlen($phone) == 0) {
                        $error['phone'] = "Không để trống số điện thoại!";
                    } else if (!validating($phone)) {
                        $error['phone'] = "Định dạng số điện thoại không chính xác!";
                    }

                    // if (empty($username)) {
                    //     $error['username'] = "Không để trống username!";
                    // }

                    if (empty($password)) {
                        $error['password'] = "không để trống password!";
                    }
                    // var_dump($_POST);

                    // exit;
                    if (!$error) {
                        $password = md5($password);

                        // echo $role;
                        $is_updated = user_update_2($iduser, $password, $name, $address, $phone, $kichhoat, $filename, $email, $role);
                        // header('location: ./view/user/userlist-page.php');
                        // if ($is_updated) {
                        //     echo '
                        // <script>
                        //     window.alert("Chúc mừng bạn đã sửa người dùng thành công!");
                        // </script>
                        // ';
                        // }
                        header('Location: index.php?act=userlist');
                    }

                }

                include "./view/pages/user/edituser-page.php";
                break;
            case 'editadmin':
                $error = array();
                if (isset($_POST['edituserbtn']) && $_POST['edituserbtn']) {

                    $iduser = $_POST['iduser'];
                    $name = $_POST['fullname'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $kichhoat = $_POST['kichhoat'];
                    // $username = $_POST['username'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];
                    $filename = $_FILES['image']['name'];

                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    // echo $target_file;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                    // validation using php at server
                    // if (empty($_FILES["image"]["name"])) {
                    //     $error['img'] = "Không để trống hình ảnh";
                    // }
                    // Validate at server

                    if (strlen($name) == 0) {
                        $error['name'] = "Không để trống họ tên!";
                    } else if (strlen($name) > 30) {
                        $error['name'] = "Họ tên không vượt quá 30 ký tự!";
                    }

                    if (empty($address)) {
                        $error['address'] = "Không để trống địa chỉ!";
                    }

                    if (empty($address)) {
                        $error['address'] = "Không để trống địa chỉ!";
                    }

                    if (empty($email)) {
                        $error['email'] = "không để trống email!";
                    } else if (!is_email($email)) {
                        $error['email'] = "Email không đúng định dạng!";
                    }

                    if (strlen($phone) == 0) {
                        $error['phone'] = "Không để trống số điện thoại!";
                    } else if (!validating($phone)) {
                        $error['phone'] = "Định dạng số điện thoại không chính xác!";
                    }

                    // if (empty($username)) {
                    //     $error['username'] = "Không để trống username!";
                    // }

                    if (empty($password)) {
                        $error['password'] = "không để trống password!";
                    }

                    if (!$error) {
                        $password = md5($password);
                        $is_updated = user_update_2($iduser, $password, $name, $address, $phone, $kichhoat, $filename, $email, $role);
                        // header('Location: adminlist-page.php');
                        // if ($is_updated) {
                        header('Location: index.php?act=adminlist');

                        // }

                    }

                }

                include "./view/pages/user/editadmin-page.php";
                break;
            case 'update-profile':
                if (isset($_GET['id'])) {
                    $error = array();
                    if (isset($_POST['savebtn']) && $_POST['savebtn']) {
                        $id_admin = $_GET['id'];
                        // var_dump($_POST);
                        if (empty($_POST['hoten'])) {
                            $error['hoten'] = "Khồng để trống họ tên";
                        }
                        if (empty($_POST['address'])) {
                            $error['address'] = "Khồng để trống địa chỉ";
                        }
                        if (empty($_POST['phone'])) {
                            $error['phone'] = "Khồng để trống số điện thoại";
                        } else if (!validating($_POST['phone'])) {
                            $error['phone'] = "Số điện thoại không đúng định dạng";
                        }
                        if (empty($_POST['email'])) {
                            $error['email'] = "Khồng để trống email";
                        } else if (!is_email($_POST['email'])) {
                            $error['email'] = "Email không đúng định dạng";
                        }

                        if (empty($_POST['congty'])) {
                            $error['congty'] = "Khồng để trống congty";
                        }
                        if (empty($_POST['about_me'])) {
                            $error['about_me'] = "Khồng để trống giới thiệu";
                        }

                        $avatar_url = $_FILES['avatar']['name'];
                        move_uploaded_file($_FILES["avatar"]["tmp_name"], "../uploads/$avatar_url");
                        if (!$error) {
                            $is_updated = update_profile_admin($id_admin, $_POST['hoten'], $_POST['address'], $_POST['phone'], $avatar_url, $_POST['email'], $_POST['congty'], $_POST['about_me']);

                            if ($is_updated) {
                                $_SESSION['alert'] = "Cập nhật profile thành công!";
                            } else {
                                $_SESSION['alert'] = "Cập nhật profile thất bại";
                            }
                        }

                    }

                    include "./view/pages/user/user-profile.php";
                }

                break;
            case 'deleteuser':
                if (isset($_GET['id'])) {
                    // $comments_deleted = comment_delete_by_iduser($_GET['id']);
                    $id_deleted = user_delete($_GET['id']);
                    // if ($id_deleted) {
                    //     echo '
                    //     <script>
                    //         window.alert("Chúc mừng bạn đã xóa người dùng thành công!");
                    //     </script>
                    //     ';

                    // }
                    header('Location: index.php?act=userlist');
                }

                include "./view/pages/user/userlist-page.php";
                break;
            case 'deleteadmin':
                if (isset($_GET['id'])) {
                    // $comments_deleted = comment_delete_by_iduser($_GET['id']);
                    $id_deleted = user_delete($_GET['id']);
                    header('Location: index.php?act=adminlist');
                    // if ($id_deleted) {
                    //     echo '
                    //     <script>
                    //         window.alert("Chúc mừng bạn đã xóa quản trị viên thành công!");
                    //     </script>
                    //     ';
                    // }
                }

                include "./view/pages/user/adminlist-page.php";
                break;

            case 'orderlist':

                include "./view/pages/orders/order-list.php";
                break;
            case 'userorders':
                if (isset($_GET['id'])) {
                    include "./view/pages/orders/user-order-list.php";
                } else {
                    echo "<p class='alert alert-danger text-center'>Trang không tồn tại!</p>";
                }
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
                    // Delete vnpay transaction.
                    $is_deleted = deleteorderbyid($iddh);

                    if ($is_deleted) {

                        echo '
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                showToast("Xóa đơn hàng!", "Chúng mừng Bạn đã xóa đơn hàng  đơn hàng #' . $iddh . ' thành công!");
                            })
                        </script>
                    ';
                        // echo '<div class="alert alert-danger">Bạn đã xóa đơn hàng  đơn hàng ' . $iddh . ' thành công!</div>';
                    }
                    include "view/pages/orders/order-list.php";
                    // header('location: index.php?act=orderdetail&iddh=' . $iddh);
                }

                break;
            case 'deletedashboardorder':
                if (isset($_GET['iddh'])) {
                    $iddh = $_GET['iddh'];
                    $cart_list = getshoworderdetail($iddh);
                    $orderInfo = getorderinfo($iddh);
                    deleteorderdetailbyid($iddh);
                    $is_deleted = deleteorderbyid($iddh);

                    if ($is_deleted) {

                        echo '
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                showToast("Xóa đơn hàng!", "Chúng mừng Bạn đã xóa đơn hàng  đơn hàng #' . $iddh . ' thành công!");
                            })
                        </script>
                    ';
                        // echo '<div class="alert alert-danger">Bạn đã xóa đơn hàng  đơn hàng ' . $iddh . ' thành công!</div>';
                    }
                    include "./view/pages/dashboard/dashboard.php";
                    // header('location: index.php?act=orderdetail&iddh=' . $iddh);
                }
                break;

            case 'addcoupon':
                include "./view/pages/coupons/addcoupon.php";
                break;
            case 'editcoupon':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $idcoupon = $_GET['id'];

                }
                include "./view/pages/coupons/editcoupon.php";
                break;
            case 'updatecoupon':
                if (isset($_POST['updatecouponbtn']) && $_POST['updatecouponbtn']) {

                    $idcoupon = $_GET['id'];

                    $coupon_name = $_POST['coupon_name'];
                    $coupon_discount = $_POST['coupon_discount'];
                    $min_value = $_POST['min_value'];
                    $maximum_use = $_POST['maximum_use'];
                    $date_start = $_POST['date_start'];
                    $date_end = $_POST['date_end'];

                    $is_updated = update_coupon($idcoupon, $coupon_name, $coupon_discount, $min_value, $maximum_use, $date_start, $date_end);

                    if ($is_updated) {
                        $_SESSION['alert'] = "Cập nhật coupon #$idcoupon thành công!";
                    }
                    include "./view/pages/coupons/couponlist.php";
                }
                break;
            case 'deletecoupon':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $idcoupon = $_GET['id'];

                    $is_deleted = delete_coupon_by_id($idcoupon);

                    if ($is_deleted) {
                        $_SESSION['alert'] = "Delete coupon #$idcoupon thành công!";
                    }
                    include "./view/pages/coupons/couponlist.php";
                }
                break;

            case 'couponlist':
                include "./view/pages/coupons/couponlist.php";
                break;

            case 'logout':
                unset($_SESSION['role']);
                unset($_SESSION['username']);
                unset($_SESSION['idadmin']);
                unset($_SESSION['img']);
                header('location: ./auth/login.php');
                break;

            case 'addblog':
                if (isset($_POST['addblog']) && $_POST['addblog']) {
                    $error = array();
                    $idcate = $_POST['idcate'];
                    $title = $_POST['title'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    $conten = $_POST['noidung'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                    if ($hinh == "") {
                        $error['hinh'] = "Không để trống hình ảnh";
                    }
                    $imageFileType = strtolower(pathinfo($hinh, PATHINFO_EXTENSION));
                    if ($hinh != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $error['hinh'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                    }
                    if (strlen($title) == 0) {
                        $error['title'] = "Không để trống tiêu đề!";
                    }
                    if (strlen($conten) == 0) {
                        $error['noidung'] = "Không để trống nội dung!";
                    }
                    if (!$error) {
                        $is_inserted = add_blog($title, $hinh, $conten, $date, $idcate);
                        if ($is_inserted) {
                            $thongbao = "Thêm Bài Viết Thành Công";
                        }
                    } else {
                        $thongbao = "Thêm Bài Viết Thất Bại";
                    }
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
                    $thongbao = "Đã Xóa Bài Viết " . $_GET['id'] . " Thành Công";
                }
                include './view/pages/blogs/blog-list.php';
                break;
            // case 'editblog':
            //     if (isset($_GET['id']) && (isset($_GET['id']) > 0)) {
            //         $blog = loadone_blog($_GET['id']);
            //     }
            //     include './view/pages/blogs/edit-blog.php';
            //     break;
            case 'updateblog':
                $error = array();
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $noidung = $_POST['noidung'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    if (strlen($title) == 0) {
                        $error['title'] = "Không để trống tiêu đề!";
                    }
                    if (strlen($noidung) == 0) {
                        $error['noidung'] = "Không để trống nội dung!";
                    }
                    // print_r($error) ;
                    if (!$error) {
                        $is_inserted = updateblog($id, $title, $hinh, $noidung);
                        $thongbaoupdate = "Cập Nhật Bài Viết Thành Công";
                        // if ($is_inserted) {
                        //     $thongbaoupdate = "Thêm Bài Viết Thành Công";
                        //     // header('location: index.php?act=bloglist');
                        // }
                        include './view/pages/blogs/blog-list.php';
                        break;
                    } else {
                        $thongbaoupdate = "Cập Nhật Bài Viết Thất Bại";
                        // header('location: index.php?act=updateblog&id='.$id.'');

                    }

                }
                include './view/pages/blogs/edit-blog.php';
                break;
            case 'blogcate':
                include "./view/pages/blogs/blog-cate.php";
                break;
            case 'addcateblog':
                if (isset($_POST['addcateblog']) && $_POST['addcateblog']) {
                    $error = array();
                    $blogcatename = $_POST['blogcatename'];
                    $hinhcateblog = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                    if ($hinhcateblog == "") {
                        $error['hinh'] = "Không để trống hình ảnh";
                    }
                    $imageFileType = strtolower(pathinfo($hinhcateblog, PATHINFO_EXTENSION));
                    if ($hinhcateblog != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $error['hinh'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                    }
                    if (strlen($blogcatename) == 0) {
                        $error['blogcatename'] = "Không để trống tên danh mục!";
                    }
                    if (!$error) {
                        $is_inserted = add_cateblog($blogcatename, $hinhcateblog);
                        if ($is_inserted) {
                            $thongbao = "Thêm Danh Mục Bài Viết Thành Công";
                        }
                    } else {
                        $thongbao = "Thêm Danh Mục Bài Viết Thất Bại";
                    }
                }
                include './view/pages/blogs/blog-cate.php';
                break;
            case 'deletecateblog':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $blog = delete_cateblog($_GET['id']);
                    $thongbaodelete = "Đã Xóa Danh Mục Bài Viết #" . $_GET['id'] . " Thành Công";

                }
                include './view/pages/blogs/blog-cate.php';
                break;
            // case 'editcateblog':
            //     if (isset($_GET['id']) && (isset($_GET['id']) > 0)) {
            //         $cateblog = loadone_cateblog($_GET['id']);
            //     }
            //     include './view/pages/blogs/edit-cateblog.php';
            //     break;
            case 'updatecateblog':
                $error = array();
                if (isset($_POST['updatecate']) && ($_POST['updatecate'])) {
                    $id = $_POST['id'];
                    $catename = $_POST['catename'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                    if (strlen($catename) == 0) {
                        $error['catename'] = "Không để trống tiêu đề!";
                    }
                    // print_r($error);
                    if (!$error) {

                        $thongbaoupdate = "Cập Nhật Danh Mục Bài Viết Thành Công";
                        $is_inserted = update_cateblog($id, $catename, $hinh);
                        // if ($is_inserted) {
                        //     $is_inserted = update_cateblog($id,$catename,$hinh);
                        //     $thongbaoupdate = "Thêm Bài Viết Thành Công";
                        //     // header('location: index.php?act=bloglist');
                        // }
                        include './view/pages/blogs/blog-cate.php';
                        break;
                    } else {
                        $thongbaoupdate = "Cập Nhật Danh Mục Bài Viết Thất Bại";
                        // header('location: index.php?act=updateblog&id='.$id.'');

                    }
                    // update_cateblog($id, $catename, $hinh);

                    // $thongbaoupdatecateblog = "Đã Cập Nhật Danh Mục Bài Viết " . $id . " Thành Công";

                }
                include './view/pages/blogs/edit-cateblog.php';
                break;
            case 'binhluanblog':
                include './view/pages/blogs/comment-blog.php';
                break;
            case 'commentproductlist':
                include './view/pages/products/commentproduct.php';
                break;
            case 'deletecommentblog':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $delete_comment = deletecomment_blog($_GET['id']);

                }
                include './view/pages/blogs/comment-blog.php';
                break;
            case 'deletecommentproduct':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $delete_comment = deletecomment_product($_GET['id']);
                }
                include './view/pages/products/commentproduct.php';
                break;
            case 'addslider':
                if (isset($_POST['addslider']) && $_POST['addslider']) {
                    $error = array();
                    $title = $_POST['title'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    $conten = $_POST['noidung'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                    if ($hinh == "") {
                        $error['hinh'] = "Không để trống hình ảnh";
                    }
                    $imageFileType = strtolower(pathinfo($hinh, PATHINFO_EXTENSION));
                    if ($hinh != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $error['hinh'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                    }
                    if (strlen($title) == 0) {
                        $error['title'] = "Không để trống tiêu đề!";
                    }
                    if (strlen($conten) == 0) {
                        $error['noidung'] = "Không để trống nội dung!";
                    }
                    if (!$error) {
                        $is_inserted = addslider($title, $hinh, $conten, $date);
                        if ($is_inserted) {
                            $thongbao = "Thêm Slider Thành Công";
                        }
                    } else {
                        $thongbao = "Thêm Slider Thất Bại";
                    }
                }
                include "./view/pages/banner_slider/addslider.php";
                break;
            case 'updateslider':
                $error = array();
                if (isset($_POST['updateslider']) && ($_POST['updateslider'])) {
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $noidung = $_POST['noidung'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    if (strlen($title) == 0) {
                        $error['title'] = "Không để trống tiêu đề!";
                    }
                    if (strlen($noidung) == 0) {
                        $error['noidung'] = "Không để trống nội dung!";
                    }
                    // print_r($error) ;
                    if (!$error) {
                        $is_inserted = updateslider($id, $title, $hinh, $noidung);
                        $thongbaoupdate = "Cập Nhật Slider Thành Công";
                        // if ($is_inserted) {
                        //     $thongbaoupdate = "Thêm Bài Viết Thành Công";
                        //     // header('location: index.php?act=bloglist');
                        // }
                        include './view/pages/banner_slider/sliderlist.php';
                        break;
                    } else {
                        $thongbaoupdate = "Cập Nhật Slider Thất Bại";
                        // header('location: index.php?act=updateblog&id='.$id.'');

                    }

                }
                include './view/pages/banner_slider/editslider.php';
                break;
            case 'deleteslider':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $slider = delete_slider($_GET['id']);
                    $thongbao = "Đã Xóa Slider" . $_GET['id'] . " Thành Công";
                }
                include './view/pages/banner_slider/sliderlist.php';
                break;
            case 'sliderlist':
                include "./view/pages/banner_slider/sliderlist.php";
                break;
            case 'addbanner':
                if (isset($_POST['addbanner']) && $_POST['addbanner']) {
                    $error = array();
                    $namebanner = $_POST['namebanner'];
                    $image_files = $_FILES['images'];
                    $image_list = implode(',', $image_files['name']);
                    if ($_FILES["images"]["name"][0] == "") {
                        $error['images'] = "Không để trống hình ảnh";
                    }

                    $i = 0;
                    foreach ($image_files['name'] as $image_name) {
                        $imageFileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

                        if ($_FILES['images']['name'][0] != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif") {
                            $error['images'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                            break;
                        }

                        move_uploaded_file($image_files["tmp_name"][$i], "../uploads/" . $image_name);
                        $i++;
                    }
                    $idsp = $_POST['idsp'];
                    $noidung = $_POST['noidung'];
                    $thongtin = $_POST['thongtin'];
                    $date_end = $_POST['date_end'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    echo $date = date('Y-m-d H:i:s');

                    if (strlen($namebanner) == 0) {
                        $error['namebanner'] = "Không để trống tên!";
                    }
                    if (strlen($thongtin) == 0) {
                        $error['thongtin'] = "Không để trống thông tin!";
                    }
                    if (strlen($noidung) == 0) {
                        $error['noidung'] = "Không để trống nội dung!";
                    }
                    if (empty($date_end)) {
                        $error['date_end'] = "Không để trống ngày kết thúc!";
                    }
                    if (!$error) {
                        $is_inserted = addbanner($namebanner, $image_list, $idsp, $noidung, $thongtin, $date, $date_end);
                        if ($is_inserted) {
                            $thongbao = "Thêm Banner Thành Công";
                        }
                    } else {
                        $thongbao = "Thêm Banner Thất Bại";
                    }
                }
                $listsp = load_all_sp();
                include "./view/pages/banner_slider/addbanner.php";
                break;
            case 'bannerlist':
                include "./view/pages/banner_slider/bannerlist.php";
                break;
            case 'deletebanner':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $slider = delete_banner($_GET['id']);
                    $thongbao = "Đã Xóa Banner " . $_GET['id'] . " Thành Công";
                }
                include "./view/pages/banner_slider/bannerlist.php";
                break;
            case 'updatebanner':
                $error = array();
                if (isset($_POST['updatebanner']) && $_POST['updatebanner']) {
                    $id = $_POST['id'];
                    $namebanner = $_POST['namebanner'];
                    $image_files = $_FILES['images'];
                    $image_list = implode(',', $image_files['name']);
                    $i = 0;
                    foreach ($image_files['name'] as $image_name) {
                        $imageFileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

                        if ($_FILES['images']['name'][0] != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif") {
                            $error['images'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                            break;
                        }

                        move_uploaded_file($image_files["tmp_name"][$i], "../uploads/" . $image_name);
                        $i++;
                    }
                    // $hinh = $_FILES['images']['name'];
                    // $target_dir = "../uploads/";
                    // $target_file = $target_dir . basename($_FILES["images"]["name"]);
                    // move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
                    $idsp = $_POST['idsp'];
                    $noidung = $_POST['noidung'];
                    $thongtin = $_POST['thongtin'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');

                    if (strlen($namebanner) == 0) {
                        $error['namebanner'] = "Không để trống tên!";
                    }
                    if (strlen($thongtin) == 0) {
                        $error['thongtin'] = "Không để trống thông tin!";
                    }
                    if (strlen($noidung) == 0) {
                        $error['noidung'] = "Không để trống nội dung!";
                    }
                    if (!$error) {
                        $is_inserted = updatebanner($id, $namebanner, $image_list, $idsp, $noidung, $thongtin, $date);
                        $thongbaoupdate = "Cập Nhật Banner Thành Công";
                    } else {
                        $thongbaoupdate = "Cập Nhật Banner Thất Bại";
                    }
                }
                // $listsp = load_all_sp();
                include "./view/pages/banner_slider/editbanner.php";
                break;
            case 'deletecateblog':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $blog = delete_cateblog($_GET['id']);
                    $thongbaodelete = "Đã Xóa Danh Mục Bài Viết #" . $_GET['id'] . " Thành Công";

                }
                include './view/pages/blogs/blog-cate.php';
                break;
            default:
                if (isset($_SESSION['idadmin'])) {
                    // include "./auth/login.php";
                    include "./view/pages/dashboard/dashboard.php";
                } else {
                    header('location: ./auth/login.php');
                }
        }
    } else {
        include "./view/pages/dashboard/dashboard.php";
    }
    echo '</div>';
    include "./view/layout/footer.php";

} else {
    header('location: ./auth/login.php');
}
