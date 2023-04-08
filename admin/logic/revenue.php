<?php

ob_start();
session_start();
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/pdo-library.php";
include $ROOT_URL . "/DAO/order.php";

switch ($_GET['act']) {
    // case 'jan':
    //     # code...
    //     $revenue = revenue_of_month(1);
    //     echo $revenue;
    //     break;
    // case 'feb':
    //     # code...
    //     $revenue = revenue_of_month(2);

    //     echo $revenue;
    //     break;
    // case 'mar':
    //     # code...
    //     $revenue = revenue_of_month(3);

    //     echo $revenue;
    //     break;
    // case 'apr':
    //     # code...
    //     $revenue = revenue_of_month(4);
    //     break;
    // case 'may':
    //     # code...
    //     $revenue = revenue_of_month(5);

    //     echo $revenue;
    //     break;
    // case 'june':
    //     # code...
    //     $revenue = revenue_of_month(6);

    //     echo $revenue;
    //     break;
    // case 'july':
    //     # code...
    //     $revenue = revenue_of_month(7);

    //     echo $revenue;
    //     break;
    // case 'aug':
    //     # code...
    //     $revenue = revenue_of_month(8);

    //     echo $revenue;
    //     break;
    // case 'sep':
    //     # code...
    //     $revenue = revenue_of_month(9);

    //     echo $revenue;
    //     break;
    // case 'oct':
    //     # code...
    //     $revenue = revenue_of_month(10);

    //     echo $revenue;
    //     break;
    // case 'nov':
    //     # code...
    //     $revenue = revenue_of_month(11);

    //     echo $revenue;
    //     break;
    // case 'dec':
    //     # code...
    //     $revenue = revenue_of_month(12);

    //     echo $revenue;
    //     break;
    case 'allmonth':

        if (isset($_POST['year'])) {
            $year = $_POST['year'];
        }

        $result = array(
            'jan' => revenue_of_month($year, 1),
            'feb' => revenue_of_month($year, 2),
            'mar' => revenue_of_month($year, 3),
            'apr' => revenue_of_month($year, 4),
            'may' => revenue_of_month($year, 5),
            'jun' => revenue_of_month($year, 6),
            'jul' => revenue_of_month($year, 7),
            'aug' => revenue_of_month($year, 8),
            'sep' => revenue_of_month($year, 9),
            'oct' => revenue_of_month($year, 10),
            'nov' => revenue_of_month($year, 11),
            'dec' => revenue_of_month($year, 12),
        );

        echo json_encode(
            array(
                "result" => $result,
            )
        );

        return;
    case 'allweeks':

        if (isset($_POST['year'])) {
            $year = $_POST['year'];
        }

        $result = [];
        for ($i = 1; $i <= 52; $i++) {
            # code...
            $result[] = revenue_of_week($i, $year);
        }
        echo json_encode(
            array(
                "result" => $result,
            )
        );
        break;
    case 'alldaysofmonth':
        if (isset($_POST['month'])) {
            $month = $_POST['month'];
        }

        if (isset($_POST['year'])) {
            $year = $_POST['year'];

        }

        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $result = [];
        $days = [];
        for ($i = 1; $i <= $days_in_month; $i++) {
            # code...
            $days[] = $i;
            $result[] = revenue_of_day_by_month_year($year, $month, $i);
        }
        echo json_encode(
            array(
                "days" => $days,
                "result" => $result,
            )
        );
        break;
    default:
        # code...
        break;
}
