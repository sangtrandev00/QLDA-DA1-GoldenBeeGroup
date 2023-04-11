<?php
ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/admin/models/category.php";
include $ROOT_URL . "/DAO/product.php";
include $ROOT_URL . "/DAO/category.php";

switch ($_GET['act']) {
    case 'getproduct':
        # code...
        $product = product_select_by_id($_POST['id']);

        echo json_encode(
            array(
                "product" => $product,
            )
        );
        break;

    default:
        # code...
        break;
}