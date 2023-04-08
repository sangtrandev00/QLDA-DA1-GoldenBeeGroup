<?php
    // if(is_array($cateblog)){
    //     extract($cateblog);
       
    // }
    // $imgpart ="../uploads/".$hinh_anh;
    // if(is_file($imgpart)){
    //     $img ="<img src='".$imgpart."' height='120   '>";
    // }else{
    //     $img = "";
    // }
    if (isset($_GET['id']) && (isset($_GET['id']) > 0)) {
        $blogcate = loadone_cateblog($_GET['id']);
        $hinhpath = "../uploads/" . $blogcate['hinh_anh'];
        if (is_file($hinhpath)) {
            $hinh = "<img src='" . $hinhpath . "' height='120'>";
        } else {
            $hinh = "";
        }
    }
?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <?php
                if (isset($thongbaoupdate) && ($thongbaoupdate != "")) {
                    echo '<div class="alert alert-primary" role="alert">' . $thongbaoupdate . '</div>';
                }
            ?>
            <div class="card-header py-3 bg-transparent">
                <h5 class="mb-0">Sửa Danh Mục Bài Viết</h5>
            </div>
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form class="row g-3" action="index.php?act=updatecateblog&id=<?=$blogcate['id']?>" method="post"
                        enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Tên Danh Mục</label>
                            <input type="text" name="catename" value="<?php echo $blogcate['blog_catename']?>" class="form-control" placeholder="Blog title">
                            <p class="error-message">
                                <?php
                                    if (isset($error['catename'])) {
                                        echo $error['catename'];
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <?php
                                
                                ?>
                            <label class="form-label">Thêm hình ảnh</label>
                            <input class="form-control" name="hinh" type="file"> <br>
                            <?=$hinh?>
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="id" value="<?php echo $blogcate['id'] ?>">
                            <input type="submit" name="updatecate" class="btn btn-primary px-4"
                                value="Cập Nhật Bài Viết" />
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