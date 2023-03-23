<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project/";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "admin/models/category.php";
include $ROOT_URL . "DAO/product.php";
include $ROOT_URL . "./DAO/category.php";
include $ROOT_URL . "./DAO/order.php";

switch ($_GET['act']) {
    case 'updatestatus':
        # code...
        if (isset($_POST['orderid'])) {
            $iddh = $_POST['orderid'];
            $status = $_POST['status'];
            $is_updated = updateorderstatus($iddh, $status);

            if ($is_updated) {
                echo json_encode(
                    array(
                        "status" => 1,
                        "message" => "Cập nhật thái thành công!",
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
