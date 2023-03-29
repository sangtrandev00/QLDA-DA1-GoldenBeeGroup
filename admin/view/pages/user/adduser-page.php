  
  <!--start content-->
  <main class="page-content">
      

      <div class="card">
          
          <div class="card-body">

        <div id="table-product-content" class="table-responsive">
            <table class="table align-middle table-striped">

                <tbody>


                    <!-- Begin Page Content -->
                    <div class="container">
                        <!-- Page Heading -->

                        <h3 class="h3 mb-4 text-gray-500 btn-info text-white p-2">Thêm user</h1>
                            <form id="edituserForm" class="pb-3" action="index.php?act=adduser" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label for="">Tên User: </label>
                                    <input type="text" class="form-control" name="fullname" value="" required>
                                    <p class="error-message">
                                        <?php echo isset($error['name']) ? $error['name'] : ''; ?></p>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Địa chỉ: </label>
                                    <input type="text" class="form-control" name="address" value="" required>
                                    <p class="error-message">
                                    <?php echo isset($error['address']) ? $error['address'] : ''; ?></p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Email: </label>
                                    <input type="email" class="form-control" name="email" value="" required>
                                    <p class="error-message">
                                        <?php echo isset($error['email']) ? $error['email'] : ''; ?></p>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Phone: </label>
                                    <input type="text" class="form-control" name="phone" value="" required>
                                    <p class="error-message">
                                        <?php echo isset($error['phone']) ? $error['phone'] : ''; ?></p>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Kích hoạt: </label>
                                    <input type="number" class="form-control" min=0 max=1 name="kichhoat" value="1"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Username: </label>
                                    <input type="text" class="form-control" name="username" value="" required>
                                    <p class="error-message">
                                        <?php echo isset($error['username']) ? $error['username'] : ''; ?></p>

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password: </label>
                        <input type="text" class="form-control" name="password" value="" required>
                        <p class="error-message"><?php echo isset($error['password']) ? $error['password'] : ''; ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Hình ảnh: </label> 
                        <input type="file" class="form-control" name="image" value="" accept="image/gif, image/jpeg, image/png, image/jpg">
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