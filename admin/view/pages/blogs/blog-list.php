
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
                      <li class="breadcrumb-item active" aria-current="page">Blogs List</li>
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
                      <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                          link</a>
                  </div>
              </div>
          </div>
      </div>
      <!--end breadcrumb-->

      <div class="card">
          <div class="card-header py-3">
              <div class="row align-items-center m-0">
                  <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                      <select class="form-select">
                          <option>All category</option>
                          <option>Fashion</option>
                          <option>Electronics</option>
                          <option>Furniture</option>
                          <option>Sports</option>
                      </select>
                  </div>
                  <div class="col-md-2 col-6">
                      <input type="date" class="form-control">
                  </div>
                  <div class="col-md-2 col-6">
                      <select class="form-select">
                          <option>Status</option>
                          <option>Active</option>
                          <option>Disabled</option>
                          <option>Show all</option>
                      </select>
                  </div>
              </div>
          </div>
          <div class="card-body">

              <div class="table-responsive">
              <?php 
                    if(isset($thongbao)&&($thongbao!="")){
                        echo '<div class="alert alert-primary" role="alert">'.$thongbao.'</div>';
                    }
                    if(isset($thongbaoupdate)&&($thongbaoupdate!="")){
                        echo '<div class="alert alert-primary" role="alert">'.$thongbaoupdate.'</div>';
                    }
                    
                ?>
                  <table class="table align-middle table-striped">
                      <thead>
                          <th>Id</th>
                          <th>Hình Ảnh/Tiêu Đề</th>
                          <th>Nội Dung</th>
                          <th>Ngày Viết </th>
                          <th>Tag </th>
                          <th>Hành Động</th>
                      </thead>
                      <tbody>
                          <!-- Row Item -->
                          <!-- Show list product here -->
                          <?php
$blog_list = blog_select_all();
// var_dump($blog_list);

foreach ($blog_list as $blog_item) {

    $image_list = explode(",", $blog_item['images']);
    $thumbnail = getthumbnail($image_list);
    $xoablog = "index.php?act=deleteblog&id=".$blog_item['blog_id'];
    $suablog = "index.php?act=editblog&id=".$blog_item['blog_id'];
    $conten = mb_substr($blog_item['noi_dung'],0,40);
    $blog_title = mb_substr($blog_item['blog_title'],0,20);
    # code...
    echo '
                            <tr>
                                <td>
                                    ' . $blog_item['blog_id'] . '
                                </td>
                                <td class="productlist">
                                    <a class="d-flex align-items-center gap-2" href="#">
                                    <div class="product-box"><img src="' . $thumbnail . '" alt="' . $thumbnail . '"></div>
                                        <div>
                                            <h6 class="mb-0 product-title">' . $blog_title . '...</h6>
                                        </div>
                                    </a>
                                </td>
                                <td><span>' . $conten . '...</span></td>
                                <td><span>' . $blog_item['create_time'] . '</span></td>
                                <td><span>' . $blog_item['tags'] . '</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="" class="text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            title=""
                                            aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        <a href="'.$suablog.'" class="text-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                            aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        
                                        <i style="color:#e72e2e;" class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#exampleModal""></i>
                                    </div>
                                </td>
                            </tr>
                            ';
}
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn Muốn Xóa Bài Viết</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Nhấn xóa để xóa bài viết
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="<?=$xoablog?>"><button type="button" class="btn btn-primary">Xóa</button></a>
      </div>
    </div>
  </div>
</div>

                         
                          <!-- <tr>
                              <td>
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox">
                                  </div>
                              </td>
                              <td class="productlist">
                                  <a class="d-flex align-items-center gap-2" href="#">
                                      <div class="product-box">
                                          <img src="assets/images/products/10.png" alt="">
                                      </div>
                                      <div>
                                          <h6 class="mb-0 product-title">Orange Micro Headphone </h6>
                                      </div>
                                  </a>
                              </td>
                              <td><span>$18.00</span></td>
                              <td><span class="badge rounded-pill bg-success">Active</span></td>
                              <td><span>5-31-2020</span></td>
                              <td>
                                  <div class="d-flex align-items-center gap-3 fs-6">
                                      <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                          data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                          aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                      <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                          data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                          aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                      <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                          data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                          aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                  </div>
                              </td>
                          </tr> -->
                      </tbody>
                  </table>
              </div>

              <nav class="float-end mt-4" aria-label="Page navigation">
                  <ul class="pagination">
                      <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
              </nav>

          </div>
      </div>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Open modal for
          @getbootstrap</button>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Recipient:</label>
                              <input type="text" class="form-control" id="recipient-name">
                          </div>
                          <div class="mb-3">
                              <label for="message-text" class="col-form-label">Message:</label>
                              <textarea class="form-control" id="message-text"></textarea>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Send message</button>
                  </div>
              </div>
          </div>
      </div>
  </main>
  <!--end page main-->

  <!-- Toggle Modal here -->