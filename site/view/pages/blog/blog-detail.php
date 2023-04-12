<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80 section">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Bài viết chi tiết</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="index.html">Trang chủ</a></li>
                            <li><a href="index.html">Bài viết</a></li>
                            <li>Bài viết chi tiết</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper section">
    <!-- Start page content -->
    <section id="page-content" class="page-wrapper section">

        <!-- BLOG SECTION START -->
        <div class="blog-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="blog-details-area">
                            <!-- blog-details-photo -->
                            <?php
if (isset($_GET['id']) && $_GET['id'] > 0) {

    $blog_id = $_GET['id'];
    $blog = blog_select_by_id($blog_id);
    // var_dump($blog);

    #Thumbnail Image
    $image_list = explode(',', $blog['images']);
    foreach ($image_list as $image_item) {
        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }

}
?>
                            <div class="blog-details-photo bg-img-1 p-20 mb-30">
                                <img src="img/blog/10.jpg" alt="">
                                <div class="f-right bg-img-3">
                                    Ngày đăng:
                                    <!-- <span class="meta-date"><?php echo $blog['create_time'] ?></span> -->
                                    <p><?php echo $blog['create_time'] ?></p>
                                    <!-- <span class="meta-month">June</span> -->
                                </div>
                            </div>
                            <!-- blog-like-share -->
                            <ul class="blog-like-share mb-20">
                                <li>
                                    <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                </li>
                                <li>
                                    <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                </li>
                                <li>
                                    <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                </li>
                            </ul>

                            <h3 class="blog-details-title mb-30"><?php echo $blog['blog_title'] ?></h3>
                            <img style="width: 100%;" src="<?php echo $thumbnail ?>" alt="">
                            <div class="blog-description mb-60">
                                <?php echo $blog['noi_dung'] ?>
                            </div>
                            <!-- blog-share-tags -->
                            <div class="blog-share-tags box-shadow clearfix mb-60">
                                <div class="blog-share f-left">
                                    <p class="share-tags-title f-left">share</p>
                                    <ul class="footer-social f-left">
                                        <li>
                                            <a class="facebook" href="" title="Facebook"><i
                                                    class="zmdi zmdi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="google-plus" href="" title="Google Plus"><i
                                                    class="zmdi zmdi-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="twitter" href="" title="Twitter"><i
                                                    class="zmdi zmdi-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-tags f-right">
                                    <p class="share-tags-title f-left">Tags</p>
                                    <ul class="blog-tags-list f-left">
                                        <li><a href="#"><?php echo $blog['tags'] ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- author-post -->
                            <!-- <div class="media author-post box-shadow mb-60">
                                <div class="media-left pr-20">
                                    <a href="#">
                                        <img class="media-object" src="img/author/1.jpg" alt="#">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">
                                        <a href="#">Golden Bee Group Chandra Das</a>
                                    </h6>
                                    <p class="mb-0">No one rejects, dislikes, or avoids pleasure itself, because it
                                        is pleasure, but because those who do not know how to pursu pleasure
                                        rationally encounter conseques ences that are extremely painful.</p>
                                </div>
                            </div> -->
                            <!-- comments on t this post -->
                            <style>
                            </style>
                            <div class="post-comments mb-60">

                                <!-- single-comments -->
                                <?php
//showcomment
$showcomment = showcomment($blog_id);
if (!empty($showcomment)):
    echo '<h4 class="blog-section-title border-left mb-30">Bình Luận</h4>';
    foreach ($showcomment as $comment):
    ?>
	                                <div class="media mt-30">
	                                    <div class="media-body">
	                                        <div class="clearfix">
	                                            <div class="name-commenter f-left">
	                                                <h6 class="media-heading"><a href="#"><?=$comment['ho_ten']?></a></h6>
	                                                <p class="mb-10"><?=$comment['ngay_bl']?></p>
	                                            </div>
	                                            <!-- <ul class="reply-delate f-right">
											                                                    <li><a href="#">Reply</a></li>
											                                                    <li>/</li>
											                                                    <li><a href="#">Delate</a></li>
											                                                </ul> -->
	                                        </div>
	                                        <p class="mb-10"><?=$comment['noi_dungbl']?></p>
	                                        <?php
    $showprofile = getprofile($comment['id']);
    if (!empty($showprofile)):
        foreach ($showprofile as $profile):
            if (isset($_SESSION['iduser'])) {

                if ($_SESSION['iduser'] == $profile['id']) {
                    echo '<a class="xoa_btn" href="index.php?act=deletecmt&idblog=' . $comment['id_bl'] . '&idprofile=' . $comment['id_blog'] . '"> Xóa</a>';
                }
            }
            ?>
			                                        <?php endforeach;endif?>
	                                    </div>
	                                </div>
	                                <?php endforeach;endif?>

                                <!-- <div class="media mt-30">
                                      <div class="media-left">
                                          <a href="#"><img class="media-object" src="" alt="#"></a>
                                      </div>
                                      <div class="media-body">
                                          <div class="clearfix">
                                              <div class="name-commenter f-left">
                                                  <h6 class="media-heading"><a href="#"></a></h6>
                                                  <p class="mb-10"></p>
                                              </div>
                                              <ul class="reply-delate f-right">
                                                  <li><a href="#">Reply</a></li>
                                                  <li>/</li>
                                                  <li><a href="#">Delate</a></li>
                                              </ul>
                                          </div>
                                          <p class="mb-0">Bài Viết hay</p>
                                      </div>
                                  </div> -->
                                <!-- single-comments -->
                            </div>
                            <!-- leave your comment -->
                            <div class="leave-comment">

                                <form action="index.php?act=commentblog&id=<?=$blog_id?>" method="POST">
                                    <h4 class="blog-section-title border-left mb-30">Để Lại Bình Luận Của bạn</h4>
                                    <p class="error-message">
                                        <?php
if (isset($error['content'])) {
    echo $error['content'];
}
?>
                                    </p>
                                    <?php
if (!isset($_SESSION['iduser'])) {
    $thongbao = "<a class='btn btn-outline-dark' href='./auth/login.php'>Đăng Nhập</a> Để Bình Luận";
    echo '<div class="alert alert-primary" role="alert">' . $thongbao . '</div>';
}
// else
//     $date = date('Y-m-d H:i:s');
//     $makh = $_SESSION['iduser'];

// ?>
                                    <div class="row">
                                        <!-- <div class="col-lg-6">
                                            <input type="text" name="name" placeholder="Tên Của Bạn...">
                                        </div> -->
                                        <!-- <div class="col-lg-6">
                                            <input type="hidden" name="makh" value="" placeholder="Tên Của Bạn...">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="hidden" name="date" value="" placeholder="Tên Của Bạn...">
                                        </div> -->

                                        <!-- <div class="col-lg-6">
                                            <input type="text" name="email" placeholder="Email Của Bạn...">
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="subject" placeholder="Tiêu Đề...">
                                        </div> -->
                                        <div class="col-lg-12">
                                            <textarea class="custom-textarea" name="content"
                                                placeholder="Nội Dung..."></textarea>
                                        </div>
                                    </div>
                                    <!-- <button class="submit-btn-1 black-bg mt-30 btn-hover-2" name="sencomment" type="submit">Bình Luận</button> -->
                                    <input class="mt-30 color_btn btn-hover-1" type="submit" value="BÌNH LUẬN"
                                        name="sencomment">
                                </form>
                            </div>
                            <style>
                            .color_btn {
                                background-color: #ff7f00;
                                border: none;
                                width: 128px;
                                height: 35px;
                                font-size: 13px;
                                font-weight: 700;
                                color: white;
                                border-bottom: none;

                            }

                            .xoa_btn {
                                font-size: 13px;
                                font-weight: 600;
                                color: #ff7f00;
                            }

                            .xoa_btn:hover {
                                color: black;
                            }
                            </style>
                            <!--  -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <!-- widget-search -->
                        <aside class="widget-search mb-30">
                            <form action="#">
                                <input type="text" placeholder="Search here...">
                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                            </form>
                        </aside>
                        <!-- widget-categories -->
                        <aside class="widget widget-categories box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Danh muc bài viết</h6>
                            <?php
$list_catename_blog = get_all_catename_blog();
foreach ($list_catename_blog as $items) {
    extract($items);

    ?>
                            <div id="cat-treeview" class="product-cat">
                                <ul>
                                    <li class="closed"><a href="#"><?php echo $items['blog_catename'] ?></a>
                                        <!-- <ul>
                                              <li><a href="#">Mobile</a></li>
                                              <li><a href="#">Tab</a></li>
                                              <li><a href="#">Watch</a></li>
                                              <li><a href="#">Head Phone</a></li>
                                              <li><a href="#">Memory</a></li>
                                          </ul> -->
                                    </li>
                                </ul>
                            </div>
                            <?php
}
?>
                        </aside>
                        <!-- widget-product -->
                        <aside class="widget widget-product box-shadow mb-30 recent-blog">
                            <h6 class="widget-title border-left mb-20 recent-blog__title">Các bài viết gần đây</h6>
                            <?php
// $recent_blog = recent_blog();
// // var_dump($recent_blog);
// foreach ($recent_blog as $blog) {
//     if (substr($image_item, 0, 6) == "thumb-") {
//         // echo $image_item;
//         $thumbnail = "../uploads/" . $image_item;
//         break;
//     }
// }
// $connten = mb_substr($blog['blog_title'],0,20);
// print_r($connten) ;
$new_blog = get_all_new_blog();
// var_dump($new_blog);
foreach ($new_blog as $blog) {
    extract($blog);
    $image_list = explode(',', $blog['images']);
    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }
    }
    $title = mb_substr($blog['blog_title'], 0, 100);
    echo '
                                    <div class="product-item recent-blog__item">
                                  <div class="product-img ">
                                      <a href="index.php?act=blogdetail&id=' . $blog['blog_id'] . '">
                                          <img class="recent-blog__img-thumb" src="' . $thumbnail . '" alt="" />
                                      </a>
                                  </div>
                                  <div class="product-info">
                                      <h6 class="product-title">
                                          <a href="index.php?act=blogdetail&id=' . $blog['blog_id'] . '">' . $title . '</a>
                                      </h6>

                                  </div>
                              </div>';
}

?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- BLOG SECTION END -->

    </section>
    <!-- End page content -->