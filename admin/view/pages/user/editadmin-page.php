  <!--start content-->
  <main class="page-content">

      <div class="card">
          <div class="card-body">
              <div class="border p-3 rounded">
                  <h6 class="mb-0 text-uppercase">Thêm người dùng</h6>
                  <hr />
                  <form class="row g-3" id="form-adduser" action="./index.php?act=adduser" method="post"
                      enctype="multipart/form-data">
                      <div class="col-12">
                          <label class="form-label">Họ và Tên:</label>
                          <input type="text" class="form-control" name="fullname" value="" required>
                          <p class="error-message"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
                      </div>
                      <div class="col-12">
                          <label class="form-label">Địa chỉ:</label>
                          <input type="text" class="form-control" name="address" value="" required>
                          <p class="error-message"><?php echo isset($error['address']) ? $error['address'] : ''; ?></p>
                      </div>
                      <div class="col-12">
                          <label class="form-label">Email:</label>
                          <input type="email" class="form-control" name="email" value="" required>
                          <p class="error-message"><?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
                      </div>
                      <div class="col-12">
                          <label class="form-label">Phone:</label>
                          <input type="text" class="form-control" name="phone" value="" required>
                          <p class="error-message"><?php echo isset($error['phone']) ? $error['phone'] : ''; ?></p>
                      </div>
                      <div class="col-12">
                          <label class="form-label">Kích hoạt:</label>
                          <input type="number" class="form-control" min=0 max=1 name="kichhoat" value="1" required>
                      </div>
                      <!-- <div class="col-12">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="" required>
                        <p class="error-message"></p>
                    </div> -->
                      <div class="col-12">
                          <label class="form-label">Password:</label>
                          <input type="password" class="form-control" name="password" value="" required>
                          <p class="error-message"><?php echo isset($error['password']) ? $error['password'] : ''; ?>
                          </p>
                      </div>
                      <div class="col-12">
                          <label class="form-label">Hình ảnh:</label>
                          <input type="file" class="form-control" name="image" value=""
                              accept="image/gif, image/jpeg, image/png, image/jpg">
                          <p class="error-message"><?php echo isset($error['img']) ? $error['img'] : ''; ?></p>
                      </div>
                      <div class="col-12">
                          <label class="form-label">Chọn vai trò:</label>
                          <select name="role" class="form-select" aria-label="Default select example">
                              <option selected disabled value="">Chọn vai trò</option>
                              <option value="1">Quản Trị Viên</option>
                              <option value="2">Nhân Viên</option>
                              <option value="3">Khách Hàng</option>
                          </select>
                      </div>
                      <div class="col-12">
                          <div class="d-grid">
                              <input type="hidden" name="iduser" value="">
                              <input type="submit" name="adduserbtn" value="Thêm người dùng" class="btn btn-primary" />
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>

  </main>
  <!--end page main-->

  <!-- Toggle Modal here -->
  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.validate.min.js"></script>
  <script>
src = "assets/js/additional-methods.min.js"
  </script>

  <script src="assets/js/pages/validate.js">

  </script>