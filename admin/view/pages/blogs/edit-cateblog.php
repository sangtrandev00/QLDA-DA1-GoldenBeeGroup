<?php
    if(is_array($cateblog)){
        extract($cateblog);
       
    }
    $imgpart ="../uploads/".$hinh_anh;
    if(is_file($imgpart)){
        $img ="<img src='".$imgpart."' height='120   '>";
    }else{
        $img = "";
    }
?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <h5 class="mb-0">Sửa Danh Mục Bài Viết</h5>
            </div>
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form class="row g-3" action="index.php?act=updatecateblog" method="post"
                        enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Tên Danh Mục</label>
                            <input type="text" name="catename" value="<?=$blog_catename?>" class="form-control"
                                placeholder="Blog title">
                        </div>
                        <div class="col-12">
                            <?php
                                
                                ?>
                            <label class="form-label">Thêm hình ảnh</label>
                            <input class="form-control" name="hinh" type="file"> <br>
                            <?=$img?>
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="id" value="<?=$id ?>">
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