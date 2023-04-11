<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80 section">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Tất cả bài viết</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="index.html">Home</a></li>
                            <li>Bài viết</li>
                            <li>Danh sách bài viết</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<div id="page-content" class="page-wrapper section">

    <!-- BLOG SECTION START -->
    <div class="blog-section mb-50">
        <div class="container">
            <div class="row">
                <!-- blog-option start -->
                <div class="col-lg-12">
                    <div class="blog-option box-shadow mb-30  clearfix">
                        <!-- categories -->
                        <div class="dropdown f-left">
                            <button class="option-btn">
                                Danh mục bài viết
                                <i class="zmdi zmdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-width mt-30">
                                <aside class="widget widget-categories box-shadow">
                                    <h6 class="widget-title border-left mb-20">Categories</h6>
                                    <?php
$list_catename_blog = get_all_catename_blog();
foreach ($list_catename_blog as $items) {
    extract($items);

    ?>
                                    <div id="cat-treeview" class="product-cat">
                                        <ul>
                                            <li class="closed"><a href="#"><?php echo $items['blog_catename'] ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php
}
?>
                                </aside>
                            </div>
                        </div>
                        <!-- recent-product -->
                        <div class="dropdown f-left">
                            <button class="option-btn">
                                Các bài viết gần đây
                                <i class="zmdi zmdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-width mt-30">
                                <aside class="widget widget-product box-shadow">
                                    <h6 class="widget-title border-left mb-20">recent blog</h6>
                                    <!-- product-item start -->
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="./index.php?act=blogdetail">
                                                <img src="img/cart/4.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title multi-line mt-10">
                                                <a href="./index.php?act=blogdetai./index.php?act=blogdetail">Dummy Blog
                                                    Name</a>
                                            </h6>
                                        </div>
                                    </div>
                                    <!-- product-item end -->
                                    <!-- product-item start -->
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="./index.php?act=blogdetail">
                                                <img src="img/cart/5.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title multi-line mt-10">
                                                <a href="./index.php?act=blogdetai./index.php?act=blogdetail">Dummy Blog
                                                    Name</a>
                                            </h6>
                                        </div>
                                    </div>
                                    <!-- product-item end -->
                                    <!-- product-item start -->
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="./index.php?act=blogdetail">
                                                <img src="img/cart/6.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title multi-line mt-10">
                                                <a href="./index.php?act=blogdetai./index.php?act=blogdetail">Dummy Blog
                                                    Name</a>
                                            </h6>
                                        </div>
                                    </div>
                                    <!-- product-item end -->
                                </aside>
                            </div>
                        </div>
                        <!-- Tags -->
                        <!-- <div class="dropdown f-left">
                            <button class="option-btn">
                                Tags
                                <i class="zmdi zmdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-width mt-30">
                                <aside class="widget widget-tags box-shadow">
                                    <h6 class="widget-title border-left mb-20">Tags</h6>
                                    <ul class="widget-tags-list">
                                        <li><a href="#">Bleckgerry ios</a></li>
                                        <li><a href="#">Symban</a></li>
                                        <li><a href="#">IOS</a></li>
                                        <li><a href="#">Bleckgerry</a></li>
                                        <li><a href="#">Windows Phone</a></li>
                                        <li><a href="#">Windows Phone</a></li>
                                        <li><a href="#">Androids</a></li>
                                    </ul>
                                </aside>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- blog-option end -->
            </div>
            <div class="row">
                <!-- blog-item start -->
                <?php
$list_blog = get_all_list_blog();
// var_dump($list_blog);
foreach ($list_blog as $blog) {
    extract($blog);
    $image_list = explode(',', $blog['images']);
    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }
    }
    $conten = mb_substr($blog['noi_dung'], 0, 100);

    echo '<div class="col-md-6 boder">
                        <div class="blog-item-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog-image">
                                        <a href="index.php?act=blogdetail&id=' . $blog_id . '"><img src="' . $thumbnail . '"
                                                alt="' . $thumbnail . '"></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="blog-desc">
                                        <h5 class="blog-title-2"><a href="index.php?act=blogdetail&id=' . $blog_id . '">' . $blog_title . '</a>
                                        </h5>
                                        <p class="conten_blog">' . $conten . '...</p>
                                        <div class="read-more">
                                            <a href="index.php?act=blogdetail&id=' . $blog_id . '">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
}
?>

                <!-- blog-item end -->
                <!-- blog-item start -->
                <!-- <div class="col-md-6">
                    <div class="blog-item-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog-image">
                                    <a href="./index.php?act=blogdetail"><img src="../uploads/blog-post-thumbnail-2.jpg"
                                            alt="blog-post-thumbnail-2.jpg"></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog-desc">
                                    <h5 class="blog-title-2"><a href="./index.php?act=blogdetail">dummy Blog name</a>
                                    </h5>
                                    <p>There are many variations of passages of in psum available, but the
                                        majority have sufe ered on in some form...</p>
                                    <div class="read-more">
                                        <a href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- blog-item end -->
            </div>
        </div>
    </div>
    <!-- BLOG SECTION END -->
</div>
<!-- End page content -->