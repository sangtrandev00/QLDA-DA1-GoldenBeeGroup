<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80 section">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Cửa hàng</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="index.html">Home </a></li>
                            <li>Cửa hàng</li>
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

    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="shop-content">
                        <!-- shop-option start -->
                        <div class="shop-option box-shadow mb-30 clearfix">
                            <!-- Nav tabs -->
                            <ul class="nav shop-tab f-left" role="tablist">
                                <li>
                                    <a class="active" href="#grid-view" data-bs-toggle="tab"><i
                                            class="zmdi zmdi-view-module"></i></a>
                                </li>
                                <li>
                                    <a href="#list-view" data-bs-toggle="tab"><i
                                            class="zmdi zmdi-view-list-alt"></i></a>
                                </li>
                            </ul>
                            <!-- short-by -->
                            <div class="short-by f-left text-center">
                                <span>Lọc bởi :</span>
                                <select>
                                    <option value="volvo">Sản phẩm mới nhất</option>
                                    <option value="saab">Giá từ cao đến thấp</option>
                                    <option value="mercedes">Giá từ thấp đến cao</option>
                                    <option value="audi">Sản phẩm xem nhiều nhất</option>
                                </select>
                            </div>
                            <!-- showing -->
                            <div class="showing f-right text-end">
                                <span>Kết quả : 01-09 of 17 sản phẩm</span>
                            </div>
                        </div>
                        <!-- shop-option end -->
                        <!-- Tab Content start -->
                        <div class="tab-content">
                            <!-- grid-view -->
                            <div id="grid-view" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <?php

$product_list = product_select_all();

if (isset($_GET['cateid'])) {
    $cate_id = $_GET['cateid'];
    $product_list = array_filter($product_list, function ($product_item) {
        global $cate_id;
        return $product_item['ma_danhmuc'] == $cate_id;
    });
}
if (isset($_GET['subcateid'])) {
    $subcate_id = $_GET['subcateid'];
    $product_list = array_filter($product_list, function ($product_item) {
        global $subcate_id;

        return $product_item['id_dmphu'] == $subcate_id;
    });

}

// $product_list = product_select_all();
// var_dump($product_list);
foreach ($product_list as $item) {

    #Thumbnail Image
    $image_list = explode(',', $item['images']);
    $cate_name = catename_select_by_id($item['ma_danhmuc'])['ten_danhmuc'];
    $price_format = number_format($item['don_gia']);

    $addcartfunc = "handleAddCart('addtocart', 'addcart')";
    $addwishlistfunc = "handleAddCart('addtowishlist', 'addwishlist')";
    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }

    # code...
    echo '
                               <div class="col-lg-4 col-md-6">
                                   <form action="./index.php?act=addtocart" method="post">
                                   <div class="product-item">
                                   <div class="product-img">
                                       <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">
                                           <img src="' . $thumbnail . '" alt="' . $thumbnail . '" />
                                       </a>
                                   </div>
                                   <div class="product-info">
                                       <h6 class="product-title">
                                           <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">' . $item['tensp'] . '</a>
                                       </h6>
                                       <div class="pro-rating">
                                           <a href="#"><i class="zmdi zmdi-star"></i></a>
                                           <a href="#"><i class="zmdi zmdi-star"></i></a>
                                           <a href="#"><i class="zmdi zmdi-star"></i></a>
                                           <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                           <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                       </div>
                                       <h3 class="pro-price"> ' . $price_format . ' VND</h3>
                                       <ul class="action-button">
                                           <li>
                                               <a onclick="' . $addwishlistfunc . '" class="add-to-wishlist" href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                               <input type="submit" class="add-to-wishlist__submit-input d-none" name="addtowishlistbtn" value="Thêm vào sản phẩm yêu thích">
                                           </li>
                                           <li>
                                               <a class="zoom-detail-product" href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                   title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                           </li>
                                           <li>
                                               <a onclick="' . $addcartfunc . '" class="add-to-cart" href="#" title="Add to cart"><i
                                                       class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                <input type="submit" class="d-none add-to-cart__submit-input" name="addtocartbtn" value="Thêm vào giỏ hàng"/>
                                           </li>
                                       </ul>

                                       <input type="hidden" name="id" value="' . $item['masanpham'] . '"/>
                                       <input type="hidden" name="tensp" value="' . $item['tensp'] . '"/>
                                       <input type="hidden" name="hinh_anh" value="' . $thumbnail . '"/>
                                       <input type="hidden" name="sl" value="1">
                                       <input type="hidden" name="danhmuc" value="' . $cate_name . '"/>
                                       <input type="hidden" name="iddm" value="' . $item['ma_danhmuc'] . '"/>
                                       <input type="hidden" name="don_gia" value="' . $item['don_gia'] . '"/>
                                       <input type="hidden" name="mo_ta" value="' . $item['mo_ta'] . '">
                                       <input type="hidden" name="giam_gia" value="' . $item['giam_gia'] . '">


                                       </div>
                                   </div>
                                   </form>
                               </div>
                                ';
}
?>

                                </div>
                            </div>
                            <!-- list-view -->
                            <div id="list-view" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <?php

// var_dump($product_list);
foreach ($product_list as $item) {

    #Thumbnail Image
    $image_list = explode(',', $item['images']);

    $price_format = number_format($item['don_gia']);
    $addcartfunc = "handleAddCart('addtocart', 'addcart')";
    $addwishlistfunc = "handleAddCart('addtowishlist', 'addwishlist')";
    foreach ($image_list as $image_item) {

        if (substr($image_item, 0, 6) == "thumb-") {
            // echo $image_item;
            $thumbnail = "../uploads/" . $image_item;
            break;
        }

    }

    # code...
    echo '
                               <div class="col-lg-12">
                                    <div class="shop-list product-item">
                                    <div class="product-img">
                                        <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">
                                            <img src="' . $thumbnail . '" alt="' . $thumbnail . '" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="index.php?act=detailproduct&id=' . $item['masanpham'] . '">' . $item['tensp'] . '</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h6 class="brand-name mb-30">' . $item['ma_danhmuc'] . '</h6>
                                        <h3 class="pro-price"> ' . $price_format . ' VND</h3>
                                        <p>
                                        ' . $item['mo_ta'] . '
                                        </p>
                                        <ul class="action-button">
                                            <li>
                                                <a onclick="' . $addwishlistfunc . '"  href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a  href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                                    title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a onclick="' . $addcartfunc . '" href="./index.php?act=addtocart&id' . $item['masanpham'] . '" title="Add to cart"><i
                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               </div>
                                ';
}
?>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Content end -->
                        <!-- shop-pagination start -->
                        <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                            <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                            <li><a href="#">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">05</a></li>
                            <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul>
                        <!-- shop-pagination end -->
                    </div>
                </div>
                <div class="col-lg-3 order-lg-1 order-2">
                    <!-- widget-search -->
                    <aside class="widget-search mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search here...">
                            <button type="submit"><i class="zmdi zmdi-search"></i></button>
                        </form>
                    </aside>
                    <!-- widget-categories -->
                    <aside class="widget widget-categories box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Danh mục</h6>
                        <div id="cat-treeview" class="product-cat">
                            <ul>
                                <!-- Load cate here!!! -->
                                <?php
$cate_list = cate_select_all();
foreach ($cate_list as $cate_item) {

    ?>
                                <li class="open"><a
                                        href="./index.php?act=shop&cateid=<?php echo $cate_item['ma_danhmuc'] ?>"><?php echo $cate_item['ten_danhmuc'] ?></a>
                                    <?php
$subcate_list = subcate_select_all_by_id($cate_item['ma_danhmuc']);
    foreach ($subcate_list as $subcate_item) {
        # code...]
        // echo $subcate_item['id'];
        ?>
                                    <ul>


                                        <li><a
                                                href="./index.php?act=shop&subcateid=<?php echo $subcate_item['id']; ?>"><?php echo $subcate_item['ten_danhmucphu'] ?></a>
                                        </li>
                                        <!-- <li><a href="#">Tab</a></li>
                                                <li><a href="#">Watch</a></li>
                                                <li><a href="#">Head Phone</a></li>
                                                <li><a href="#">Memory</a></li> -->
                                    </ul>
                                    <?php

    }
    ?>
                                </li>
                                <?php
}
?>

                            </ul>
                        </div>
                    </aside>
                    <!-- shop-filter -->
                    <div class="widget shop-filter box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Lọc theo giá</h6>
                        <div class="price_filter">
                            <div class="price_slider_amount">
                                <input type="submit" value="Thang giá:" />
                                <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                            </div>
                            <div id="slider-range"></div>
                        </div>

                        <!-- widget-product -->
                        <aside class="widget widget-product box-shadow mt-5">
                            <h6 class="widget-title border-left mb-20">Sản phẩm gần đây</h6>
                            <!-- product-item start -->
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="product-img__image" src="../uploads/recent-product-1.jpg"
                                            alt="recent-product-1.jpg" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="single-product.html">Product Name</a>
                                    </h6>
                                    <h3 class="pro-price">$ 869.00</h3>
                                </div>
                            </div>
                            <!-- product-item end -->
                            <!-- product-item start -->
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="product-img__image" src="../uploads/recent-product-2.jpg"
                                            alt="recent-product-2.jpg" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="single-product.html">Product Name</a>
                                    </h6>
                                    <h3 class="pro-price">$ 869.00</h3>
                                </div>
                            </div>
                            <!-- product-item end -->
                            <!-- product-item start -->
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="product-img__image" src="../uploads/recent-product-3.jpg"
                                            alt="recent-product-3.jpg" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="single-product.html">Product Name</a>
                                    </h6>
                                    <h3 class="pro-price">$ 869.00</h3>
                                </div>
                            </div>
                            <!-- product-item end -->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

    </div>
    <!-- End page content -->