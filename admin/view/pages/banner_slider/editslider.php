<?php
    if (isset($_GET['id']) && (isset($_GET['id']) > 0)) {
        $slider = loadone_slider($_GET['id']);
        $hinhpath = "../uploads/" . $slider['img_slider'];
        if (is_file($hinhpath)) {
            $hinh = "<img src='" . $hinhpath . "' height='120'>";
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
                    <h5 class="mb-0">Sửa slider</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3"action="index.php?act=updateslider&id=<?=$slider['id_slider']?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label class="form-label">Tiêu Đề </label>
                                <input type="text" name="title" value="<?php echo $slider['title_slider']?>" class="form-control" placeholder="Blog title">
                                <p class="error-message">
                                    <?php
                                        if (isset($error['title'])) {
                                            echo $error['title'];
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <?php
                                
                                ?>
                                <label class="form-label">Thêm hình ảnh</label>
                                <input class="form-control" name="hinh"type="file"> <br>
                                <?=$hinh?>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nội Dung </label>
                                <textarea class="blognoidung" name="noidung" id="" cols="30" rows="10"><?php echo $slider['content_slider']?></textarea>
                                <p class="error-message">
                                    <?php
                                        if (isset($error['noidung'])) {
                                            echo $error['noidung'];
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="id" value="<?php echo $slider['id_slider']?>">
                                <input type="submit" name="updateslider" class="btn btn-primary px-4" value="Cập Nhật" />
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