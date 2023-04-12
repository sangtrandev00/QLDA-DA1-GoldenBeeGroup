<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

// include $ROOT_URL . "/pdo-library.php";
include $ROOT_URL . "/DAO/banner_slider.php";

switch ($_GET['act']) {
    case 'get-dateend':
        # code...
        echo "get-dateend";
        break;

    default:
        # code...
        break;
}
