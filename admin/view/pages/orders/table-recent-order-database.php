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
    $trangthai = showStatus($order['trangthai'])[0];
    $thanhtoan = showPayment($order['thanhtoan']);

    // if ($order['trangthai'] == 6) {
    //     $delete_action_row = '
    //     <a href="javascript:deleteOrder(' . $order['id'] . ')" class="text-danger" data-bs-toggle="tooltip"
    //     data-bs-placement="bottom" title="" data-bs-original-title="Delete"
    //     aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
    // ';
    // } else {
    // }
    $delete_action_row = "";
    switch ($order['trangthai']) {
        case '1':
        case '2':
        case '3':
            $alert_class = 'text-warning';
            break;
        case '4':
            $alert_class = 'text-success';
            break;
        case '5':
        case '6':
            $alert_class = 'text-danger';
            break;
        default:
            $alert_class = '';
            # code...
            break;
    }

    $row = array();
    $row[0] = "#" . $order['id'];
    $row[1] = '<a href="./index.php?act=userorders&id=' . $order['iduser'] . '">' . $order['name'] . '</a>';

    $row[2] = $order['tongdonhang'];
    $row[3] = '<span class="' . $alert_class . '">' . $trangthai . '</span>';
    $row[4] = $order['pttt'];
    $row[5] = $order['timeorder'];
    $row[6] = $order['tongsoluong'];
    $row[7] = '
            <div class="d-flex align-items-center gap-3 fs-6">
                <a href="./index.php?act=orderdetail&iddh=' . $order['id'] . '" class="text-primary" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                    aria-label="Views"><i class="bi bi-eye-fill"></i></a>

                ' . $delete_action_row . '
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