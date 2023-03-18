<?php
if (!in_array('ob_gzhandler', ob_list_handlers())) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../../../../site/models/connectdb.php";
include "../../../../site/models/donhang.php";
include "../../../../pdo-library.php";
include "../../../../DAO/user.php";
?>

<?php

$cart_list = getShowCartGroupbyOrder($_SESSION['iduser']);
if (isset($_SESSION['madonhang'])) {
    $cart_list = array_filter($cart_list, function ($cart_item) {
        return $cart_item == $_SESSION['madonhang'];
    });
}
//var_dump($cart_list);
foreach ($cart_list as $cart_item) {
    $trangthai = "Đã xác nhận";
    # code...
    echo '

    <tr class="p-3">

        <td class="" scope="row"> <a class="text-decoration-none" href="./index.php?act=historyorderdetailpage&id=' . $cart_item['iddonhang'] . '">' .
        $cart_item['iddonhang'] . '</a></td>
        <td class="">' . $cart_item['madonhang'] . '</td>
        <td class="">' . $cart_item['soluong'] . '</td>
        <td class="">' . $cart_item['tongdonhang'] . '</td>
        <td class="">' . $cart_item['pttt'] . '</td>
        <td class="">' . $cart_item['timeorder'] . '</td>
        <td class="text-danger">' . $trangthai . '</td>
        <td class=""><a class="text-decoration-none" href="javascript:viewOrderdetail(' . $cart_item['iddonhang'] . ')"><i class="fa-solid fa-eye"></i> Xem</a></td>
        </tr>

        ';
}
?>

</tbody>