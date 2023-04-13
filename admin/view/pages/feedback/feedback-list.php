<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0">Danh sách feedback người dùng</h5>
            <form class="ms-auto position-relative">
                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i>
                </div>
                <input class="form-control ps-5" type="text" placeholder="search">
            </form>
        </div>
        <div class=" mt-3">
            <table style="" class="table align-middle table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col" style="min-width:140px;">Tên người dùng</th>
                        <th scope="col">Email</th>
                        <th scope="col" style="min-width:130px;">Số điện thoại</th>
                        <th scope="col" style="min-width:150px;">Chủ đề</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Ngày gửi</th>
                        <th scope="col" style="min-width:100px;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$feedback_list = select_all_feedback_list();

foreach ($feedback_list as $feedback) {

    echo '
                    <tr>
                        <td scope="row">#' . $feedback['id'] . '</td>
                        <td>
                            ' . $feedback['name'] . '
                        </td>
                        <td>' . $feedback['email'] . '</td>
                        <td>' . $feedback['phone'] . '</td>
                        <td>' . $feedback['title'] . '</td>
                        <td style="width: 200px; word-wrap: break-word">' . $feedback['content'] . '</td>
                        <td>' . $feedback['date_create'] . '</td>
                        <td style="cursor: pointer">
                        <a href="#!" style="font-weight: 550;">Reply</a>
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