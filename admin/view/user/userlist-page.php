  <!--start content-->
  <main class="page-content">
      

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