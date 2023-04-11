

<div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <?php
if (isset($thongbao) && ($thongbao != "")) {
    echo '<div class="alert alert-primary" role="alert">' . $thongbao . '</div>';
}

?>
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Thêm mới slider</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form id="add-slider" class="row g-3" action="index.php?act=addslider" method="post"
                            enctype="multipart/form-data">
                            <div class="col-12">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" placeholder="Slider title">
                                <p class="error-message">
                                    <?php
                                        if (isset($error['title'])) {
                                            echo $error['title'];
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Thêm hình ảnh</label>
                                <input class="form-control" name="hinh" type="file">
                                <p class="error-message images-error">
                                <?php 
                                    if (isset($error['hinh'])) {
                                        echo $error['hinh'];
                                    }
                                ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nội Dung</label>
                                <textarea class="blognoidung" name="noidung" id="" cols="30" rows="10"></textarea>
                                <p class="error-message">
                                    <?php
                                        if (isset($error['noidung'])) {
                                            echo $error['noidung'];
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <input type="submit" name="addslider" class="btn btn-primary px-4"
                                    value="Đăng" />
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