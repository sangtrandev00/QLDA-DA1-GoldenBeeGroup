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
    $xoablog = "index.php?act=deleteblog&id=" . $blog_item['blog_id'];
    $suablog = "index.php?act=editblog&id=" . $blog_item['blog_id'];
    $conten = mb_substr($blog_item['noi_dung'], 0, 40);
    $blog_title = mb_substr($blog_item['blog_title'], 0, 20);
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
                                        <a href="' . $suablog . '" class="text-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                            aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        
                                        <i style="color:#e72e2e;" class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#exampleModal""></i>
                                    </div>
                                </td>
                            </tr>
                            ';
}
?>


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
                          </tr> 
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
</main>
<!--end page main-->

<!-- Toggle Modal here -->