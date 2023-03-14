<?php
// function trimNameImage($image)
// {
//     return trim($image, " ");
// }

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $product_id = $_GET['id'];
    $product = product_select_by_id($product_id);

    // var_dump($product);

    #Thumbnail Image
    $image_list = explode(',', $product['images']);
    $price_format = number_format($product['don_gia']);

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
                                <div class="single-product-info">
                                    <h3 class="text-black-1"><?php echo $product['tensp'] ?> </h3>
                                    <h6 class="brand-name-2"></h6>
                                    <!--  hr -->
                                    <hr>
                                    <!-- single-pro-color-rating -->
                                    <div class="single-pro-color-rating clearfix">
                                        <div class="sin-pro-color f-left">
                                            <p class="color-title f-left">Tồn kho: <span
                                                    class="inventory-number fw-bold fs-3"><?php echo $product['ton_kho'] ?></span>
                                            </p>
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
                                            <span class="text-black-5">( 27 Rating )</span>
                                        </div>
                                    </div>
                                    <!-- hr -->
                                    <hr>
                                    <!-- plus-minus-pro-action -->
                                    <div class="plus-minus-pro-action clearfix">
                                        <div class="sin-plus-minus f-left clearfix">
                                            <p class="color-title f-left">Số lượng: </p>
                                            <div class="cart-plus-minus f-left">
                                                <input type="text" value="02" name="qtybutton"
                                                    class="cart-plus-minus-box">
                                            </div>
                                        </div>

                                        <div class="sin-pro-action f-right">
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist" tabindex="0"><i
                                                            class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview" tabindex="0"><i
                                                            class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare" tabindex="0"><i
                                                            class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart" tabindex="0"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- plus-minus-pro-action end -->
                                    <!-- hr -->
                                    <hr>
                                    <!-- single-product-price -->
                                    <h3 class="pro-price">Giá sản phẩm: <?php echo $price_format ?> VND</h3>
                                    <!--  hr -->
                                    <hr>
                                    <div>
                                        <a href="#" class="button extra-small button-black" tabindex="-1">
                                            <span class="text-uppercase"> Mua
                                                ngay</span>
                                        </a>
                                    </div>
                                </div>
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
        $thumbnail = getthumbnail($image_list);
        // var_dump($thumbnail);
        // var_dump($thumbnail);

        # code...
        echo '
        <div class="product-item">
            <div class="product-img">
                <a href="./index.php?act=detailproduct&id=' . $product_item['masanpham'] . '">
                    <img src="' . $thumbnail . '" alt="" />
                </a>
            </div>
            <div class="product-info">
                <h6 class="product-title">
                    <a href="./index.php?act=detailproduct&id=' . $product_item['masanpham'] . '">' . $product_item['tensp'] . '</a>
                </h6>
                <div class="pro-rating">
                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                </div>
                <h3 class="pro-price">' . $product_item['don_gia'] . ' VND</h3>
                <ul class="action-button">
                    <li>
                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                            title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                    </li>
                    <li>
                        <a href="#" title="Add to cart"><i
                                class="zmdi zmdi-shopping-cart-plus"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        ';
    }
    ?>
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img src="img/product/1.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="single-product.html">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <!-- <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li> -->
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img src="img/product/1.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="single-product.html">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img src="img/product/1.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="single-product.html">Product Name</a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ 869.00</h3>
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                        title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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