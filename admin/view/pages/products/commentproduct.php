<!--end breadcrumb-->

<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <?php
// if(isset($thongbao)&&($thongbao!="")){
//     echo '<div class="alert alert-primary" role="alert">'.$thongbao.'</div>';
// }
// if(isset($thongbaoupdate)&&($thongbaoupdate!="")){
//     echo '<div class="alert alert-primary" role="alert">'.$thongbaoupdate.'</div>';
// }

?>
            <table class="table align-middle table-striped">
                <thead>
                    <th>Id</th>
                    <!-- <th>Mã Sản Phẩm</th> -->
                    <th>Tên Sản Phẩm</th>
                    <th>Nội Dung Bình Luận</th>
                    <th>Tên Người Bình Luận</th>
                    <th>Ngày Bình Luận</th>
                    <th>Hành Động</th>
                </thead>
                <tbody>
                    <!-- Row Item -->
                    <!-- Show list product here -->
                    <?php
$showcomment = showcommentproduct_admin();
foreach ($showcomment as $comment) {
    //    print_r($comment);
    $nameproduct = mb_substr($comment['tensp'], 0, 100);
    $xoa_comment = "index.php?act=deletecommentproduct&id=" . $comment['ma_binhluan'];
    echo ' <tr>
                           <td>
                               ' . $comment['ma_binhluan'] . '
                           </td>

                           <td class="productlist">
                               ' . $nameproduct . '...
                           </td>
                           <td><span>' . $comment['noi_dung'] . '</span></td>
                           <td><span>' . $comment['ho_ten'] . '</span></td>
                           <td><span>' . $comment['ngay_binhluan'] . '</span></td>
                           <td>
                               <div class="d-flex align-items-center gap-3 fs-6">
                                   <a href="' . $xoa_comment . '"><i style="color:#e72e2e;" class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#exampleModal""></i></a>
                               </div>
                           </td>
                       </tr>';
}
?>
                </tbody>
            </table>
        </div>

        <!-- <nav class="float-end mt-4" aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> -->

    </div>
</div>
<button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Open modal
    for
    @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
</main>
<!--end page main-->

<!-- Toggle Modal here -->