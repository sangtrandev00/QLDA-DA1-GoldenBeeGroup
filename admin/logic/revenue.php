<?php

ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/pdo-library.php";
include $ROOT_URL . "/DAO/order.php";

switch ($_GET['act']) {
    case 'jan':
        # code...
        $revenue = revenue_of_month(1);
        echo $revenue;
        break;
    case 'feb':
        # code...
        $revenue = revenue_of_month(2);

        echo $revenue;
        break;
    case 'mar':
        # code...
        $revenue = revenue_of_month(3);

        echo $revenue;
        break;
    case 'apr':
        # code...
        $revenue = revenue_of_month(4);
        break;
    case 'may':
        # code...
        $revenue = revenue_of_month(5);

        echo $revenue;
        break;
    case 'june':
        # code...
        $revenue = revenue_of_month(6);

        echo $revenue;
        break;
    case 'july':
        # code...
        $revenue = revenue_of_month(7);

        echo $revenue;
        break;
    case 'aug':
        # code...
        $revenue = revenue_of_month(8);

        echo $revenue;
        break;
    case 'sep':
        # code...
        $revenue = revenue_of_month(9);

        echo $revenue;
        break;
    case 'oct':
        # code...
        $revenue = revenue_of_month(10);

        echo $revenue;
        break;
    case 'nov':
        # code...
        $revenue = revenue_of_month(11);

        echo $revenue;
        break;
    case 'dec':
        # code...
        $revenue = revenue_of_month(12);

        echo $revenue;
        break;
    case 'allmonth':
        $result = array(
            'jan' => revenue_of_month(1),
            'feb' => revenue_of_month(2),
            'mar' => revenue_of_month(3),
            'apr' => revenue_of_month(4),
            'may' => revenue_of_month(5),
            'jun' => revenue_of_month(6),
            'jul' => revenue_of_month(7),
            'aug' => revenue_of_month(8),
            'sep' => revenue_of_month(9),
            'oct' => revenue_of_month(10),
            'nov' => revenue_of_month(11),
            'dec' => revenue_of_month(12),
        );

        echo json_encode($result);

        return;
    case 'allweeks':
        $revenue_weeks = revenue_of_weeks();

        // var_dump($revenue_weeks);
        echo json_encode(
            array(
                "result" => $revenue_weeks,
            )
        );
        exit;
        break;
    default:
        # code...
        break;
}
