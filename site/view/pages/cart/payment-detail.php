<!-- <?php
if (!in_array('ob_gzhandler', ob_list_handlers())) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$amount_carts = array_reduce($_SESSION['giohang'], function ($prev_value, $curr_val) {
    // var_dump($prev_value);
    // var_dump($curr_val['sl']);

    return $curr_val['sl'] + $prev_value;
}, 0);

$total_carts = array_reduce($_SESSION['giohang'], function ($prev_value, $curr_val) {
    return $curr_val['sl'] * $curr_val['don_gia'] + $prev_value;
}, 0)

?>

<h6 class="widget-title border-left mb-20">Thanh toán chi tiết</h6>
<table>
    <tr>
        <td class="td-title-1">Tổng phụ đơn hàng</td>
        <td class="td-title-2"><?php echo number_format($total_carts) ?>
            VND</td>
    </tr>
    <tr>
        <td class="td-title-1">Chi phí vận chuyển</td>
        <td class="td-title-2">00.00 VND</td>
    </tr>
    <tr>
        <td class="td-title-1">Vat</td>
        <td class="td-title-2">00.00 VND</td>
    </tr>
    <tr>
        <td class="order-total">Tổng đơn hàng</td>
        <td class="order-total-price">
            <?php echo number_format($total_carts) ?> VND</td>
    </tr>
</table> -->