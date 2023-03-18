<?php

ob_start();
session_start();

include "../../DAO/product.php";
include "../../pdo-library.php";

switch ($_GET['act']) {
    case 'orderdetail':

        echo 'good to see!';

        break;
    case '':
        break;
    default:
        break;
}
