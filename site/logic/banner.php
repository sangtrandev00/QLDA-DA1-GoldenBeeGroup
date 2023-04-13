<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/pdo-library.php";
include $ROOT_URL . "/DAO/banner_slider.php";

switch ($_GET['act']) {
    case 'get-dateend':
        # code...
        // echo "get-dateend";
        $banner = loadone_banner(20);

        echo json_encode(
            array(
                "status" => 1,
                "content" => $banner['date_end'],
            )
        );
        break;

    default:
        # code...
        break;
}