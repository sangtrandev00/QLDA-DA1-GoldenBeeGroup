  
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
                      <li class="breadcrumb-item active" aria-current="page">Products List</li>
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
          
          <div class="card-body">

              <div id="table-product-content" class="table-responsive">
                  <table class="table align-middle table-striped">
                      
                     <tbody>

                   
<!-- Begin Page Content -->
<div class="container">
    <!-- Page Heading -->

            <h3 class="h3 mb-4 text-gray-500 btn-info text-white p-2">Thêm user</h1>
                <form id="edituserForm" class="pb-3" action="index.php?act=adduser"
                    method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="">Tên User: </label>
                        <input type="text" class="form-control" name="fullname" value="" required>
                        <p class="error-message"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
                      
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Địa chỉ: </label>
                        <input type="text" class="form-control" name="address" value="" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email: </label>
                        <input type="email" class="form-control" name="email" value="" required>
                        <p class="error-message"><?php echo isset($error['email']) ? $error['email'] : ''; ?></p>

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone: </label>
                        <input type="text" class="form-control" name="phone" value="" required>
                        <p class="error-message"><?php echo isset($error['phone']) ? $error['phone'] : ''; ?></p>

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Kích hoạt: </label>
                        <input type="number" class="form-control" min=0 max=1 name="kichhoat"
                            value="1" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Username: </label>
                        <input type="text" class="form-control" name="username"
                            value="" required>
                        <p class="error-message"><?php echo isset($error['username']) ? $error['username'] : ''; ?></p>

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password: </label>
                        <input type="text" class="form-control" name="password" value="" required>
                        <p class="error-message"><?php echo isset($error['password']) ? $error['password'] : ''; ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Hình ảnh: </label> 
                        <input type="file" class="form-control" name="image" value="" accept="image/gif, image/jpeg, image/png, image/jpg" required>
                        <p class="error-message"><?php echo isset($error['img']) ? $error['img'] : ''; ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Vai trò </label>
                        <select name="role" class="form-select" aria-label="Default select example">
                            <option selected>Chọn vai trò</option>
                            <option value="1">Quản Trị Viên</option>
                            <option value="2">Nhân Viên</option>
                            <option value="3">Khách Hàng</option>
                        </select>
                    </div>
                    <input type="hidden" name="iduser" value="">
                    <input type="submit" name="adduserbtn" value="Thêm" class="btn btn-primary mt-3" />
                </form>
</div>
                     </tbody>
                  </table>
              </div>
          </div>
      </div>
      
  </main>
  <!--end page main-->

  <!-- Toggle Modal here -->