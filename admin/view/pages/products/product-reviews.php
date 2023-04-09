<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0">Danh sách đánh giá sản phẩm</h5>
            <form class="ms-auto position-relative">
                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i>
                </div>
                <input class="form-control ps-5" type="text" placeholder="search">
            </form>
        </div>
        <div class=" mt-3">
            <table style="" class="table align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>#ID Review</th>
                        <th>Iduser</th>
                        <th>Tên sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Rating Star</th>
                        <th>Ngày tạo</th>
                        <th>Mã đơn hàng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$reviews_list = select_all_reviews_product();

// var_dump($coupon_list);
foreach ($reviews_list as $review) {
    # code...
    $is_replied = select_id_replied_review($review['id_review']);
    if ($is_replied) {
        $id_reply = select_id_replied_review($review['id_review'])['id_reply'];
    } else {
        $id_reply = "";
    }
    $product = product_select_by_id($review['idsanpham']);
    // echo $id_reply;
    $row_reply = !$is_replied ? ' <a onclick="replyReview(' . $review['id_review'] . ', ' . $_SESSION['idadmin'] . ')" href="#">Reply</a>' : '<a class="text-warning" href="#" onclick="updateReplyReview(' . $review['id_review'] . ', ' . $_SESSION['idadmin'] . ', ' . $id_reply . ')">Edit Reply</a>';
    echo '
                    <tr>
                        <td>#' . $review['id_review'] . '</td>
                        <td>
                            <div class="d-flex align-items-center gap-3 cursor-pointer">
                                <div class="">
                                    <p class="mb-0">' . $review['iduser'] . '</p>
                                </div>
                            </div>
                        </td>
                        <td>' . $product['tensp'] . '</td>
                        <td style="width: 400px; word-wrap: break-word">' . $review['noidung'] . '</td>
                        <td>' . $review['rating_star'] . '</td>
                        <td>' . $review['date_create'] . '</td>
                        <td > ' . $review['iddonhang'] . '</td>
                        <td style="cursor: pointer">
                        ' . $row_reply . '
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