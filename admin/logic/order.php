<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/pdo-library.php";
include $ROOT_URL . "/DAO/order.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/global.php";

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
    case 'list-orders-by-status':

        $order_list = select_orders_by_status($_POST['status']);

        $result = array();

        foreach ($order_list as $order) {
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
                    $alert_class = "";
                    # code...
                    break;
            }
            // var_dump(count_products_of_order($order['id']));
            # code...
            $row = array();
            $row[0] = "#" . $order['id'];
            $row[1] = '<a href="index.php?act=userorders&id=' . $order['iduser'] . '">' . $order['name'] . '</a>';
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

        echo json_encode(
            array(
                "order_list" => $result,
            )
        );
        break;
    default:
# code...
        break;
}
