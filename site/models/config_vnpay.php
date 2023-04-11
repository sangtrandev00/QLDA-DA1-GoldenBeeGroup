<?php

$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

// include $ROOT_URL . "/pdo-library.php";
// include $ROOT_URL . "/DAO/product.php";
// include $ROOT_URL . "/DAO/category.php";
// include $ROOT_URL . "/DAO/order.php";

date_default_timezone_set('Asia/Ho_Chi_Minh');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$vnp_TmnCode = "ED75PCEI"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "JRZOMCSKDGFFNJEDUGXACNSAINHQDWLC"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

// Config here to return to website (when uploading to website)
$vnp_Returnurl = "http://localhost:8082/PRO1014_DA1/main-project/site/index.php?act=ordercompleted";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
