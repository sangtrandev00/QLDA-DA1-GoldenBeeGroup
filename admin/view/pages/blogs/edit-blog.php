
<?php
    if(is_array($blog)){
        extract($blog);
       
    }
    $imgpart ="../uploads/".$images;
    if(is_file($imgpart)){
        $img ="<img src='".$imgpart."' height='120   '>";
    }else{
        $img = "";
    }
?>
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Blogs</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Add New Blogs</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3"action="index.php?act=updateblog" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label class="form-label">Tiêu Đề Bài Viết</label>
                                <input type="text" name="title" value="<?=$blog_title?>" class="form-control" placeholder="Blog title">
                            </div>
                            <div class="col-12">
                                <?php
                                
                                ?>
                                <label class="form-label">Thêm hình ảnh</label>
                                <input class="form-control" name="hinh"type="file"> <br>
                                <?=$img?>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nội Dung Bài Viết</label>
                                <textarea class="blognoidung" name="noidung" id="" cols="30" rows="10"><?=$noi_dung?></textarea>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="id" value="<?=$blog_id ?>">
                                <input type="submit" name="update" class="btn btn-primary px-4" value="Cập Nhật Bài Viết" />
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