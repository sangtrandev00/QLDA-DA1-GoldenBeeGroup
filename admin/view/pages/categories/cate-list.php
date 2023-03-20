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
                     <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
             <h6 class="mb-0">Thêm danh mục sản phẩm</h6>
         </div>
         <div class="card-body">
             <div class="row">
                 <div class="col-12 col-lg-4 d-flex">
                     <div class="card border shadow-none w-100">
                         <div class="card-body">
                             <form id="cate-form" action="./index.php?act=addcate" method="POST"
                                 class="row g-3 form-cate" enctype="multipart/form-data">
                                 <div class="col-12">
                                     <label class="form-label">Tên danh mục</label>
                                     <input type="text" class="form-control" name="catename" placeholder="Tên danh mục">
                                 </div>
                                 <div class="col-12">
                                     <label class="form-label">Hình ảnh</label>
                                     <input type="file" class="form-control" name="cateimage"
                                         accept="image/png, image/jpeg" placeholder="Hình ảnh">
                                 </div>
                                 <div class="col-12">
                                     <label class="form-label">Danh mục cha</label>
                                     <select class="form-select" name="cateparent">
                                         <option value="">Không có</option>
                                         <!-- <option value="">Fashion</option>
                                         <option value="">Electronics</option>
                                         <option value="">Furniture</option>
                                         <option value="">Sports</option> -->
                                         <?php
$cate_list = cate_select_all();
foreach ($cate_list as $cate_item) {
    # code...
    echo '
                                                <option value="' . $cate_item['ma_danhmuc'] . '">' . $cate_item['ten_danhmuc'] . '</option>
                                                ';
}
?>

                                     </select>
                                 </div>
                                 <div class="col-12">
                                     <label class="form-label" name="catedesc">Mô tả</label>
                                     <textarea name="catedesc" class="form-control" rows="3" cols="3"
                                         placeholder="Mô tả danh mục"></textarea>
                                 </div>
                                 <div class="col-12">
                                     <div class="d-grid">
                                         <input type="submit" name="addcatebtn"
                                             class="btn btn-primary submit-action-btn" value="Thêm danh mục" />
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
                                             <th>Description</th>
                                             <th>Order</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
foreach ($cate_list as $cate_item) {
    # code...
    echo '
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"></td>
                                                <td>#' . $cate_item['ma_danhmuc'] . '</td>
                                                <td>' . $cate_item['ten_danhmuc'] . '</td>
                                                <td><img width="80" height="100" src="../uploads/' . $cate_item['hinh_anh'] . '"/></td>
                                                <td>' . $cate_item['mo_ta'] . '</td>
                                                <td>0</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a onclick="viewDetail(' . $cate_item['ma_danhmuc'] . ')"  href="./index.php?act=subcatelist&cateid=' . $cate_item['ma_danhmuc'] . '" class=" text-primary"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                            data-bs-original-title="View detail" aria-label="Views"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                        <a onclick="editCate(' . $cate_item['ma_danhmuc'] . ');" href="#" class="text-warning cate-edit-link"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"  title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <a onclick="deleteCate(' . $cate_item['ma_danhmuc'] . ')" href="./index.php?act=deletecate&id=' . $cate_item['ma_danhmuc'] . '" class="text-danger" data-bs-toggle="tooltip"
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
 </script>