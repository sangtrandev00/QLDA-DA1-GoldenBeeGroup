<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project/";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/pdo-library.php";
include $ROOT_URL . "/DAO/order.php";
include $ROOT_URL . "/DAO/product.php";

switch ($_GET['act']) {
    case 'updatestatus':
        # code...
        if (isset($_POST['orderid'])) {
            $iddh = $_POST['orderid'];
            $status = $_POST['status'];
            if ($status == 5 || $status == 6) {
                // Cập nhật lại số lượng tồn kho của sản phẩm trong đơn hàng (Tăng lên)
                $products = select_products_from_order_id($_POST['orderid']);

                foreach ($products as $product) {
                    # code...
                    product_update_remaining_qty($product['idsanpham'], $product['soluong']);
                }
            }

            if ($status == 4) {
                $is_updated_status = updatepaymentstatus($iddh, 1);
            } else {
                $is_updated_status = false;
            }

            $is_updated = updateorderstatus($iddh, $status);

            if ($is_updated) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "message" => "Cập nhật thái thành công!",
                        "thanhtoan" => $is_updated_status ? 1 : 0,
                    )
                );
            }
        }
        break;
    case 'updatepayment':
        break;

    default:
        # code...
        break;
}
