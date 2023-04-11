<div class="card">
    <div class="card-header py-3 category-title">
        <h6 class="mb-0">Thêm danh mục bài viết</h6>
    </div>
    <?php
if (isset($thongbao) && ($thongbao != "")) {
    echo '<div class="alert alert-primary" role="alert">' . $thongbao . '</div>';
}
if (isset($thongbaodelete) && ($thongbaodelete != "")) {
    echo '<div class="alert alert-primary" role="alert">' . $thongbaodelete . '</div>';
}
if (isset($thongbaoupdate) && ($thongbaoupdate != "")) {
    echo '<div class="alert alert-primary" role="alert">' . $thongbaoupdate . '</div>';
}

?>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">

                        <form action="./index.php?act=addcateblog" method="POST" enctype="multipart/form-data"
                            class="row g-3 form-cate">
                            <div class="col-12">
                                <label class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" name="blogcatename" placeholder="Tên danh mục">
                                <p class="error-message"><?php if (isset($error['blogcatename'])) {echo $error['blogcatename'];}?></p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control" name="hinh" placeholder="Hình ảnh">
                                <p class="error-message"><?php if (isset($error['hinh'])) {echo $error['hinh'];}?></p>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <input type="submit" name="addcateblog" class="btn btn-primary"
                                        value="Thêm danh mục" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 d-flex">

                <div class="card border shadow-none w-100">
                    <div class="card-header">
                        <h3>Danh mục chính</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <!-- <th><input class="form-check-input" type="checkbox"></th> -->
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Hình ảnh</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$cate_list = blog_cate_select_all();
foreach ($cate_list as $cate_item) {
    $xoablog = "index.php?act=deletecateblog&id=" . $cate_item['id'];
    $suablog = "index.php?act=updatecateblog&id=" . $cate_item['id'];
    $viewcateblog = "index.php?act=viewcateblog&id=" . $cate_item['id'];
    echo '
                                            <tr>
                                                <td>#' . $cate_item['id'] . '</td>
                                                <td>' . $cate_item['blog_catename'] . '</td>
                                                <td><img width="100" height="100" src="../uploads/' . $cate_item['hinh_anh'] . '"/></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a href="' . $viewcateblog . '" class=" text-primary"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                            data-bs-original-title="View detail" aria-label="Views"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                        <a href="' . $suablog . '" class="text-warning cate-edit-link"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"  title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <a href="' . $xoablog . '"><i style="color:#e72e2e;" class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#exampleModal""></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            ';
}
?>
                                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        button type="button" class="btn btn-primary">Xóa</button>
      </div>
    </div>
  </div>
</div> -->
                                </tbody>
                            </table>
                        </div>
                        <nav class="float-end mt-0" aria-label="Page navigation">
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
            </div>
        </div>
        <!--end row-->
    </div>
</div>

</main>
<!--end page main-->

<script>
// function editCate(cateId) {
//     console.log('clicked', cateId);
// }

// console.log('hello clicked');

// const editCate = () => {
//     const editCateBtns = document.querySelectorAll('.cate-edit-link');

//     for (const editCateBtn of editCateBtns) {
//         console.log('edit', editCateBtn);

//         editCateBtn.addEventListener('click', (event) => {

//             console.log('this', event.currentTarget);
//             const rowElement = event.currentTarget.parentElement.parentElement.parentElement;
//             console.log('rowElement: ', rowElement);


//             const name = rowElement.cells[2].innerText;
//             const image = rowElement.cells[3].innerText;
//             const desc = rowElement.cells[4].innerText;

//             console.log('name: ', name);

//             const formElement = document.querySelector('.form-cate');

//             formElement.action = "./index.php?act=editcate&id="
//             console.log('formElement: ', formElement);

//             formElement.elements[0].value = name;
//             formElement.elements[3].value = desc;
//             formElement.elements[4].value = "Sửa danh mục";

//             console.log('inputCate: ', formElement.elements);

//         })
//     }

// }

// editCate();
</script>