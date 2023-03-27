
      <!--end breadcrumb-->

      <div class="card">
          <div class="card-header py-3">
              <div class="row align-items-center m-0">
                  <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
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
                      </thead>
                      <tbody>
                          <!-- Row Item -->
                          <!-- Show list product here -->
                          <?php
    $listviewcateblog = viewcateblog($_GET['id']);
foreach ($listviewcateblog as $viewcateblog) {

    $image_list = explode(",", $viewcateblog['images']);
    $thumbnail = getthumbnail($image_list);
    // $xoablog = "index.php?act=deleteblog&id=".$blog_item['blog_id'];
    // $suablog = "index.php?act=editblog&id=".$blog_item['blog_id'];
    $conten = mb_substr($viewcateblog['noi_dung'],0,40);
    $blog_title = mb_substr($viewcateblog['blog_title'],0,30);
    echo '
                            <tr>
                                <td>
                                    ' . $viewcateblog['blog_id'] . '
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
                                <td><span>' . $viewcateblog['create_time'] . '</span></td>
                                <td><span>' . $viewcateblog['tags'] . '</span></td>

                            </tr>
                            ';
}
?>
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