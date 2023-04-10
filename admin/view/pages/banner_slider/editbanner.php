<?php
    if (isset($_GET['id']) && (isset($_GET['id']) > 0)) {
        $banner = loadone_banner($_GET['id']);
        $image_list = explode(",", $banner['images']);
        $thumbnail = getthumbnail($image_list);
        // $hinhpath = "../uploads/" . $banner['images'];
        // echo $thumbnail;
        if (is_file($thumbnail)) {
            $hinh = "<img src='" . $thumbnail . "' height='120'>";
        } else {
            $hinh = "không có hình";
        }
    }
    
?>
<!--start content-->
<main class="page-content">

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
            <?php
                if (isset($thongbaoupdate) && ($thongbaoupdate != "")) {
                    echo '<div class="alert alert-primary" role="alert">' . $thongbaoupdate . '</div>';
                }
            ?>
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Sửa Banner</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3"action="index.php?act=updatebanner&id=<?=$banner['id']?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label class="form-label">Tên</label>
                                <input type="text" name="namebanner" value="<?php echo $banner['name']?>" class="form-control" placeholder="Blog title">
                                <p class="error-message">
                                    <?php
                                        if (isset($error['namebanner'])) {
                                            echo $error['namebanner'];
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <?php
                                
                                ?>
                                <label class="form-label">Thêm hình ảnh</label>
                                <input class="form-control" name="images[]" multiple accept="image/png, image/jpeg" type="file"> <br>
                                <?=$hinh?>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Sản Phẩm</label>
                                <select class="form-select" name="idsp">
                                    <?php
                                    $listsp = load_all_sp();
                                    foreach ($listsp as $sp) {
                                        extract($sp);
                                        // print_r($sp);  
                                         echo '<option value="'.$masanpham.'">'.$tensp.'</option>';
                                    }
                                    ?>
    
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nội Dung</label>
                                <textarea class="blognoidung" name="noidung" id="" cols="30" rows="10"><?=$banner['noi_dung']?></textarea>
                                <p class="error-message">
                                    <?php
                                        if (isset($error['noidung'])) {
                                            echo $error['noidung'];
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Thông Tin</label>
                                <textarea class="blognoidung" name="thongtin" id="" cols="30" rows="10"><?=$banner['info']?></textarea>
                                <p class="error-message">
                                    <?php
                                        if (isset($error['thongtin'])) {
                                            echo $error['thongtin'];
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="id" value="<?php echo $banner['id']?>">
                                <input type="submit" name="updatebanner" class="btn btn-primary px-4" value="Cập Nhật" />
                                <button type="reset" class="btn btn-primary px-4">Xóa thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

</main>
<!--end page main-->