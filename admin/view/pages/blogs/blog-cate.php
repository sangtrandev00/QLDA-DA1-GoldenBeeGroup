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
                     <li class="breadcrumb-item active" aria-current="page">Categories Blogs</li>
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
         <div class="card-header py-3 category-title">
             <h6 class="mb-0">Thêm danh mục bài viết</h6>
         </div>
         <div class="card-body">
             <div class="row">
                 <div class="col-12 col-lg-4 d-flex">
                     <div class="card border shadow-none w-100">
                         <div class="card-body">
                             <form action="./index.php?act=addcateblog" method="POST" enctype="multipart/form-data" class="row g-3 form-cate">
                                 <div class="col-12">
                                     <label class="form-label">Tên danh mục</label>
                                     <input type="text" class="form-control" name="blogcatename" placeholder="Tên danh mục">
                                 </div>
                                 <div class="col-12">
                                     <label class="form-label">Hình ảnh</label>
                                     <input type="file" class="form-control" name="hinh"
                                          placeholder="Hình ảnh">
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
                                             <th><input class="form-check-input" type="checkbox"></th>
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
                                            $xoablog = "index.php?act=deletecateblog&id=".$cate_item['id'];
                                            $suablog = "index.php?act=editcateblog&id=".$cate_item['id'];
                                            echo '
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"></td>
                                                <td>#' . $cate_item['id'] . '</td>
                                                <td>' . $cate_item['blog_catename'] . '</td>
                                                <td><img width="100" height="100" src="../uploads/' . $cate_item['hinh_anh'] . '"/></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a onclick="editCate(' . $cate_item['id'] . ');" href="./index.php?act=subcatelist&id=' . $cate_item['id'] . '" class=" text-primary"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                            data-bs-original-title="View detail" aria-label="Views"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                        <a href="'.$suablog.'" class="text-warning cate-edit-link"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"  title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <a href="'.$xoablog.'" class="text-danger" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title=""
                                                            data-bs-original-title="Delete" aria-label="Delete"><i
                                                                class="bi bi-trash-fill"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            ';
}
?>
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