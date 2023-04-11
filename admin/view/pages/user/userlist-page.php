  <!--start content-->
  <main class="page-content">

      <div class="card">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <h5 class="mb-0">Quản lý người dùng</h5>
                  <form class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                              class="bi bi-search"></i></div>
                      <input class="form-control ps-5" type="text" placeholder="search">
                  </form>
              </div>
              <div class="table-responsive mt-3">
                  <table class="table align-middle">
                      <thead class="table-secondary">
                          <tr>
                              <th>Mã KH</th>
                              <th>Hình ảnh</th>
                              <th>Họ và Tên</th>
                              <th>Địa chỉ email</th>
                              <th>Vai trò</th>
                              <th>Hành động</th>
                          </tr>
                      </thead>

                      <tbody>
                          <?php
$userList = user_select(3);
foreach ($userList as $user) {
    $role = '';

    if (isset($user['hinh_anh'])) {
        $img = substr($user['hinh_anh'], 0, 4) == 'http' ? $user['hinh_anh'] : "../uploads/" . $user['hinh_anh'];
    } else {
        $img = "";
    }

    switch ($user['vai_tro']) {
        case '1':
            # code...
            $role = "Quản trị viên";
            break;
        case '2':
            # code...
            $role = "Nhân viên";
            break;
        case '3':
            # code...
            $role = "Khách hàng";
            break;
        default:
            $role = "Khách hàng";
            break;
    }
    echo '
    <tr>
    <td>' . $user['id'] . '</td>
     <td>
       <div class="d-flex align-items-center gap-3 cursor-pointer">
          <img src="' . $img . '" class="rounded-circle" width="44" height="44" alt="" style="object-fit: cover;">
       </div>
     </td>
     <td>' . $user['ho_ten'] . '</td>
     <td>' . $user['email'] . '</td>
     <td>' . $role . '</td>
     <td>
       <div class="table-actions d-flex align-items-center gap-3 fs-6">
         <a href="./index.php?act=userorders&id=' . $user['id'] . '" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Xem lịch sử đặt hàng"><i class="bi bi-eye-fill"></i></a>
         <a href="./index.php?act=edituser&id=' . $user['id'] . '" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
         <a href="./index.php?act=deleteuser&id=' . $user['id'] . '" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
       </div>
     </td>
   </tr>
    ';

}?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

  </main>
  <!--end page main-->

  <!-- Toggle Modal here -->