<?php
session_start();
ob_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/site/models/connectdb.php";
include $ROOT_URL . "/site/models/danhmuc.php";
include $ROOT_URL . "/site/models/sanpham.php";
include $ROOT_URL . "/site/models/donhang.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";
include "$ROOT_URL/global.php";
// PHẦN XỬ LÝ PHP

?>

<?php

$result = array();
if (isset($_SESSION['iduser'])) {
    $iduser = $_SESSION['iduser'];
    $cart_list = getShowCartGroupbyOrder($iduser);

    // var_dump($cart_list);
    foreach ($cart_list as $cart_item) {
        # code...
        $trangthai = showStatus($cart_item['trangthai'])[0];
        switch ($cart_item['trangthai']) {
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
                # code...
                break;
        }
        $row = array();
        $row[0] = "#" . '<a class="text-decoration-none" href="./index.php?act=historyorderdetailpage&id=' . $cart_item['iddonhang'] . '">' .
            $cart_item['iddonhang'] . '</a>';
        $row[1] = $cart_item['madonhang'];

        $row[2] = $cart_item['soluong'];
        $row[3] = $cart_item['tongdonhang'];
        $row[4] = $cart_item['pttt'];
        $row[5] = $cart_item['timeorder'];
        $row[6] = '<span class="' . $alert_class . '">' . $trangthai . '</span>';
        $row[7] = '
        <a class="text-decoration-none" href="javascript:viewOrderdetail(' . $cart_item['iddonhang'] . ')"><i class="fa-solid fa-eye"></i> Xem</a>
    ';
        $result[] = $row;

    }
}

// var_dump('$result', $result);
?>

<?php

// <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" // data-bs-placement="bottom" title=""
//data-bs-original-title="Edit info" // aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

echo json_encode(
    array(
        "order_list" => $result,
    )
);

// // $order_list = get_all_orders();
// foreach ($order_list as $order) {
// # code...
// echo '
// <tr>
// <td>#' . $order['id'] . '</td>
// <td>' . $order['name'] . '</td>
// <td>' . $order['tongdonhang'] . '</td>
// <td><span class="badge rounded-pill alert-success">Đã xác nhận</span></td>
// <td>' . $order['timeorder'] . '</td>
// <td>
// <div class="d-flex align-items-center gap-3 fs-6">
// <a href="./index.php?act=orderdetail&iddh=' . $order['id'] . '" class="text-primary"
//    data-bs-toggle="tooltip" // data-bs-placement="bottom" title="" data-bs-original-title="View detail" //
//  aria-label="Views"><i class="bi bi-eye-fill"></i></a>
// <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" // data-bs-placement="bottom"
//   title="" data-bs-original-title="Edit info" // aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
// <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" // data-bs-placement="bottom"
//  title="" data-bs-original-title="Delete" // aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
// </div>
// </td>
// </tr>
// ';
// }