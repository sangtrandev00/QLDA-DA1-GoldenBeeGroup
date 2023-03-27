<?php
// function trimNameImage($image)
// {
//     return trim($image, " ");
// }

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $product_id = $_GET['id'];
    if (!isset($_SESSION['views']['view' . $_GET['id']])) {
        product_increase_view($_GET['id']);
        $_SESSION['views']["view" . $_GET['id']] = $_GET['id'];
    }

    $product = product_select_by_id($product_id);

    // var_dump($product);
    $cate_name = catename_select_by_id($product['ma_danhmuc'])['ten_danhmuc'];
    $subcate_name = subcatename_select_by_id($product['id_dmphu'])['ten_danhmucphu'];
    #Thumbnail Image
    $image_list = explode(',', $product['images']);
    $price_format = number_format($product['don_gia']);

    $old_price = number_format($product['don_gia']);
    $new_price = number_format($product['don_gia'] * (1 - $product['giam_gia'] / 100));

    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }

    ?>

<!-- Start page content -->
<section id="page-content" class="page-wrapper section">

    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- single-product-area start -->
                    <div class="single-product-area mb-80">
                        <div class="row">
                            <!-- imgs-zoom-area start -->
                            <div class="col-lg-5">
                                <div class="imgs-zoom-area">
                                    <img id="zoom_03" src="../uploads/<?php echo $thumbnail ?>"
                                        data-zoom-image="../uploads/<?php echo $thumbnail ?>" alt="">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                <?php
// var_dump($image_list);
    foreach ($image_list as $image_item) {
        $image_item = trim($image_item, " ");
        # code...
        echo '
                                                        <div class="p-c">
                                                            <a href="#" data-image="../uploads/' . $image_item . '"
                                                                data-zoom-image="../uploads/' . $image_item . '">
                                                                <img class="zoom_03" src="../uploads/' . $image_item . '" alt="">
                                                            </a>
                                                        </div>
                                                        ';

    }
    ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- imgs-zoom-area end -->
                            <!-- single-product-info start -->
                            <div class="col-lg-7">
                                <form action="./index.php?act=addtocart" method="post" method="POST">
                                    <div class="single-product-info">
                                        <h3 class="text-black-1"><?php echo $product['tensp'] ?> <span
                                                class="fs-4 fw-light">
                                                (<?php echo count_sold_product_by_id($_GET['id']) ?>
                                                đã bán )</span>
                                        </h3>
                                        <h6 class="my-4">Thương hiệu: <?php echo $cate_name ?> </h6>
                                        <h6 class="my-4">Dòng sản phẩm: <?php echo $subcate_name ?></h6>
                                        <h6 class="single-product__views">
                                            <span class="">(<?php echo $product['so_luot_xem'] ?> lượt
                                                xem)</span>

                                        </h6>
                                        <!--  hr -->
                                        <hr>
                                        <!-- single-pro-color-rating -->
                                        <div class="single-pro-color-rating clearfix">
                                            <div class="sin-pro-color f-left">
                                                <?php
if ($product['ton_kho'] > 0) {

        ?>
                                                <p class="remain-quatity-pro f-left">Tồn kho: <span
                                                        class="inventory-number fw-bold fs-3"><?php echo $product['ton_kho'] ?></span>
                                                </p>

                                                <?php

    } else {
        echo '<div class="alert alert-warning">Hết hàng</div>';
    }
    ?>
                                                <!-- <div class="widget-color f-left">
                                                <ul>
                                                    <li class="color-1"><a href="#"></a></li>
                                                    <li class="color-2"><a href="#"></a></li>
                                                    <li class="color-3"><a href="#"></a></li>
                                                    <li class="color-4"><a href="#"></a></li>
                                                </ul>
                                            </div> -->
                                            </div>
                                            <div class="pro-rating sin-pro-rating f-right">
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                <span class="text-black-5">( 27 đánh giá )</span>
                                            </div>
                                        </div>
                                        <!-- hr -->
                                        <hr>
                                        <!-- plus-minus-pro-action -->
                                        <div class="plus-minus-pro-action clearfix">
                                            <div class="sin-plus-minus f-left clearfix">
                                                <p class="color-title f-left mr-3">Số lượng: </p>
                                                <div class="cart-plus-minus f-left ms-5">
                                                    <input type="text" min="1" max="10" value="01" name="sl"
                                                        class="cart-plus-minus-box">
                                                </div>
                                            </div>


                                        </div>
                                        <!-- plus-minus-pro-action end -->
                                        <!-- hr -->
                                        <hr>
                                        <!-- single-product-price -->
                                        <h3 class="pro-price">Giá sản phẩm: <?php echo $new_price ?> VND <del
                                                class="ms-3 fs-3 fw-lighter text-text-decoration-line-through"><?php echo $old_price ?>
                                                VND</del>
                                        </h3>
                                        <!--  hr -->
                                        <hr>
                                        <div class="">
                                            <a onclick="handleAddCart('addtocart', 'buynow')" href="#"
                                                class="button extra-small button-black " tabindex="-1">
                                                <span class="text-uppercase"> Mua
                                                    ngay</span>
                                            </a>
                                            <div class="sin-pro-action f-right mr-100">
                                                <ul class="action-button">
                                                    <li class="text-center d-flex justify-content-center mb-3">
                                                        <a onclick="handleAddCart('addtowishlist', 'addwishlist')"
                                                            class="add-to-wishlist text-center mr-10" href="#"
                                                            title="Wishlist" tabindex="0"><i
                                                                class="zmdi zmdi-favorite"></i></a>
                                                        <input type="submit"
                                                            class="add-to-wishlist__submit-input d-none"
                                                            name="addtowishlistbtn" value="Thêm vào sản phẩm yêu thích">
                                                        <label for="">Yêu thích</label>
                                                    </li>
                                                    <li class="text-center d-flex justify-content-center mb-3">
                                                        <a onclick="handleAddCart('addtocart', 'addcart');"
                                                            class="add-to-cart text-center mr-10" href="#"
                                                            title="Add to cart" tabindex="0"><i
                                                                class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        <input type="submit" class="d-none" name="addtocartbtn"
                                                            value="add to cart">
                                                        <label for="">Thêm vào giỏ hàng</label>
                                                    </li>

                                                    <input type="hidden" name="id"
                                                        value="<?php echo $product['masanpham'] ?>" />
                                                    <input type="hidden" name="tensp"
                                                        value="<?php echo $product['tensp'] ?>" />
                                                    <input type="hidden" name="hinh_anh"
                                                        value="<?php echo $thumbnail ?>" />
                                                    <input type="hidden" name="don_gia"
                                                        value="<?php echo $product['don_gia'] ?>" />

                                                    <input type="hidden" name="danhmuc"
                                                        value="<?php echo $cate_name ?>" />
                                                    <input type="hidden" name="iddm"
                                                        value="<?php echo $product['ma_danhmuc'] ?>" />
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- single-product-info end -->
                        </div>
                        <!-- single-product-tab -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- hr -->
                                <hr>
                                <div class="single-product-tab reviews-tab">
                                    <ul class="nav mb-20">
                                        <li><a class="active" href="#description" data-bs-toggle="tab">Mô tả sản
                                                phẩm</a>
                                        </li>
                                        <li><a href="#information" data-bs-toggle="tab">Thông tin sản phẩm</a></li>
                                        <li><a href="#reviews" data-bs-toggle="tab">reviews/đánh giá</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active show" id="description">
                                            <!-- <p>There are many variations of passages of Lorem Ipsum available,
                                                but the
                                                majo Rity have be suffered alteration in some form, by injected
                                                humou or
                                                randomis Rity have be suffered alteration in some form, by
                                                injected
                                                humou or randomis words which donot look even slightly
                                                believable. If
                                                you are going to use a passage Lorem Ipsum.</p>
                                            <p>rerum blanditiis dolore dignissimos expedita consequatur deleniti
                                                consectetur non exercitationem. rerum blanditiis dolore
                                                dignissimos
                                                expedita consequatur deleniti consectetur non exercitationem.
                                            </p> -->
                                            <?php echo $product['mo_ta'] ?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="information">
                                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem,
                                                neque
                                                fugit inventore quo dignissimos est iure natus quis nam illo
                                                officiis,
                                                deleniti consectetur non ,aspernatur.</p>
                                            <p>rerum blanditiis dolore dignissimos expedita consequatur deleniti
                                                consectetur non exercitationem.</p> -->

                                            <?php echo $product['information'] ?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="reviews">
                                            <!-- reviews-tab-desc -->
                                            <div class="reviews-tab-desc">
                                                <!-- single comments -->
                                                <div class="media mt-30">
                                                    <div class="media-left">
                                                        <!-- ảnh người đánh giá -->
                                                        <a href="#"><img class="media-object" src="" alt="#"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="name-commenter pull-left">
                                                                <h6 class="media-heading"><a href="#">Lam Phối</a> </h6>
                                                                <p class="mb-10">13 March, 2023 at 9:30pm</p>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Điện thoại rất đẹp, có nhiều ưu đãi khi mua điện
                                                            thoại</p>
                                                    </div>
                                                </div>
                                                <!-- single comments -->
                                                <div class="media-body mt-40">
                                                    <input type="text" placeholder="Tên Của Bạn" name="">
                                                    <input type="text" placeholder="Email Của Bạn" name="">
                                                    <textarea name="review" id="" cols="30" rows="5"
                                                        placeholder="Đánh Giá Của Bạn"></textarea>
                                                    <input
                                                        style="width: 100px; height: 40px; background-color: #ff7f00; color: white; border: none;text-transform: uppercase;font-weight: 700;"
                                                        type="submit" value="Đánh Giá">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  hr -->
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="message-box-section mt--50 mb-80">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="message-box box-shadow white-bg">
                                        <form id="contact-form" action="">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4 class="blog-section-title border-left mb-30">bình luận</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="com_name" placeholder="Họ Và Tên">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="com_email" placeholder="Email">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="com_phone" placeholder="Số Điện Thoại">
                                                </div>
                                                <div class="col-lg-12 mb-30">
                                                    <textarea class="custom-textarea" name="com_message"
                                                        placeholder="Nội dung Bình Luận"></textarea>
                                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">Bình
                                                        Luận</button>
                                                </div>
                                                <div class="col-lg-12 comment">
                                                    <div class="name-comment">
                                                        <p>Lam Phối</p>
                                                    </div>
                                                    <div>
                                                        <p>Điện thoại này còn hàng không</p>
                                                    </div>
                                                    <div>
                                                        <ul class="reply">
                                                            <li>Trả Lời</li>
                                                            <li><i class="zmdi zmdi-favorite"></i> Thích</li>
                                                            <li>3/14/2023</li>
                                                        </ul>
                                                    </div>
                                                    <div class="reply-commnet">
                                                        <div class="name-comment">
                                                            <p>Goden Bee Group</p>
                                                        </div>
                                                        <div>
                                                            <p>Hiện vẫn còn hàng trên cách chi nhánh bạn có thể cho mình
                                                                biết bạn ở khu vực nào không ạ</p>
                                                        </div>
                                                        <div>
                                                            <ul class="reply">
                                                                <li>Trả Lời</li>
                                                                <li><i class="zmdi zmdi-favorite"></i> Thích</li>
                                                                <li>3/14/2023</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12 comment">
                                                    <div class="name-comment">
                                                        <p>Lam Phối</p>
                                                    </div>
                                                    <div>
                                                        <p>Điện thoại này còn hàng không</p>
                                                    </div>
                                                    <div>
                                                        <ul class="reply">
                                                            <li>Trả Lời</li>
                                                            <li><i class="zmdi zmdi-favorite"></i> Thích</li>
                                                            <li>3/14/2023</li>
                                                        </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <p class="form-message"></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-area end -->
                    <div class="related-product-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title text-start mb-40">
                                    <h2 class="uppercase">Các sản phẩm liên quan</h2>
                                    <h6>Ghé xem các sản phẩm liên quan tại cửa hàng</h6>
                                </div>


                                <div class="active-related-product slick-arrow-2">
                                    <?php
$relate_products = product_select_similar_cate($product['ma_danhmuc'], $product_id);
    // var_dump($relate_products);

    foreach ($relate_products as $product_item) {

        $image_list = explode(',', $product_item['images']);
        $cate_name = catename_select_by_id($product_item['ma_danhmuc'])['ten_danhmuc'];
        $thumbnail = getthumbnail($image_list);
        // var_dump($thumbnail);
        $old_price = number_format($product_item['don_gia']);
        $new_price = number_format($product_item['don_gia'] * (1 - $product_item['giam_gia'] / 100));
        $addcartfunc = "handleAddCart('addtocart', 'addcart')";
        $addwishlistfunc = "handleAddCart('addtowishlist', 'addwishlist')";
        # code...
        echo cardItem($product_item, $thumbnail, $addcartfunc, $addwishlistfunc, $cate_name, $price_format);
    }
    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</section>
<!-- End page content -->

<?php
}
?>
<style>
.reply-commnet {
    margin-left: 30px;
}

.comment {
    color: black;
    cursor: pointer;
}

.comment p {
    color: black;
    font-weight: 500;
    font-size: 14px;
}

ul>li {
    margin: 0 20px 0 0;
}

li>.zmdi-favorite {
    color: red;
}

.reply {
    display: flex;
    margin-bottom: 10px;
}
</style>