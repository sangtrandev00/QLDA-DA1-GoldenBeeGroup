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
                      <thead>
                          <th>Mã KH</th>
                          <th>Họ Và Tên</th>
                          <th>Địa Chỉ Email</th>
                          <th>Hình ảnh </th>
                          <th>Vai Trò</th>
                          <th>Hành động </th>
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
    <tr class="">
        <td scope="row">' . $user['id'] . '</td>
        <td>' . $user['ho_ten'] . '</td>
        <td>' . $user['email'] . '</td>
        <td><img width=100 height=100 style="object-fit: cover;" src="' . $img . '" /></td>
        <td>' . $role . '</td>
        <td><a href="./index.php?act=edituser&id=' . $user['id'] . '" class="btn btn-primary">Sửa</a><a href="./index.php?act=deleteuser&id=' . $user['id'] . '"
        class="btn btn-danger mx-2">Xóa</a>
        </td>
    </tr>
    ';
}
?>

        </tbody>
                  </table>
              </div>
          </div>
      </div>
      
  </main>
  <!--end page main-->

  <!-- Toggle Modal here -->