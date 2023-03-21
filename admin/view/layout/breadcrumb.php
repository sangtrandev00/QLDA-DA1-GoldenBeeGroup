<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'subcatelist':
            $breadcrumbs = "Danh mục phụ sản phẩm";
            break;
        case 'catelist':
            $breadcrumbs = "Danh mục sản phẩm";
            break;
        case 'productlist':
            $breadcrumbs = "Sản phẩm";
            break;
        case 'addproduct':
            $breadcrumbs = "Thêm Sản phẩm";
            break;
        case 'editproduct':
        case 'updateproduct':
            $breadcrumbs = "Cập nhật Sản phẩm";
            break;
        case 'orderlist':
            $breadcrumbs = "Danh sách đặt hàng";
            break;
        case 'orderdetail':
            $breadcrumbs = "Đơn hàng chi tiết";
            break;
        case 'userlist':
            $breadcrumbs = "Danh sách người dùng";
            break;
        case 'admin':
            $breadcrumbs = "Danh sách quản trị viên";
            break;
        case 'bloglist':
            $breadcrumbs = "Danh sách bài viết";
            break;
        case 'blogcate':
            $breadcrumbs = "Danh mục bài viết";
            break;
        case 'addblog':
            $breadcrumbs = "Thêm bài viết";
            break;
        case 'commentlist':
            $breadcrumbs = "Danh sách bình luận";
            break;
        default:
            $breadcrumbs = "";
    }
} else {
    $breadcrumbs = "";
}
?>


<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrumbs ?></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->