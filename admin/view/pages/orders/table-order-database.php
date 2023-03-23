<?php

$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/connectdb.php";
include $ROOT_URL . "/admin/models/product.php";
include $ROOT_URL . "/admin/models/order.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
include "$ROOT_URL/global.php";
// PHẦN XỬ LÝ PHP
// B1: KET NOI CSDL
// $conn = connectdb();

// $sql = "SELECT * FROM tbl_order"; // Total Product
// $_limit = 8;
// $pagination = createDataWithPagination($conn, $sql, $_limit);

// // var_dump($pagination);

// $order_list = $pagination['datalist'];
// // var_dump($productList);
// $total_page = $pagination['totalpage'];
// $start = $pagination['start'];
// $current_page = $pagination['current_page'];
// $total_records = $pagination['total_records'];

$order_list = get_all_recent_orders();

$result = array();

foreach ($order_list as $order) {

    // var_dump(count_products_of_order($order['id']));
    # code...
    $row = array();
    $row[0] = "#" . $order['id'];
    $row[1] = $order['name'];

    $row[2] = $order['tongdonhang'];
    $row[3] = '<span class="badge rounded-pill alert-success">Đã xác nhận</span>';
    $row[4] = $order['timeorder'];
    $row[5] = 0;
    $row[6] = '
            <div class="d-flex align-items-center gap-3 fs-6">
                <a href="./index.php?act=orderdetail&iddh=' . $order['id'] . '" class="text-primary" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                    aria-label="Views"><i class="bi bi-eye-fill"></i></a>

                <a href="javascript:deleteOrder(' . $order['id'] . ')" class="text-danger" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
            </div>
    ';
    $result[] = $row;

}

// <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
//                     data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
//                     aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

echo json_encode(
    array(
        "order_list" => $result,
    )
);

// // $order_list = get_all_orders();
// foreach ($order_list as $order) {
//     # code...
//     echo '
//                               <tr>
//                                 <td>#' . $order['id'] . '</td>
//                                 <td>' . $order['name'] . '</td>
//                                 <td>' . $order['tongdonhang'] . '</td>
//                                 <td><span class="badge rounded-pill alert-success">Đã xác nhận</span></td>
//                                 <td>' . $order['timeorder'] . '</td>
//                                 <td>
//                                     <div class="d-flex align-items-center gap-3 fs-6">
//                                         <a href="./index.php?act=orderdetail&iddh=' . $order['id'] . '" class="text-primary" data-bs-toggle="tooltip"
//                                             data-bs-placement="bottom" title="" data-bs-original-title="View detail"
//                                             aria-label="Views"><i class="bi bi-eye-fill"></i></a>
//                                         <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
//                                             data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
//                                             aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
//                                         <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
//                                             data-bs-placement="bottom" title="" data-bs-original-title="Delete"
//                                             aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
//                                     </div>
//                                 </td>
//                             </tr>
//                               ';
// }
