<?php
if (!in_array('ob_gzhandler', ob_list_handlers())) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<a href="index.php?act=wishlist">

    <i class="zmdi zmdi-favorite"></i>
    <?php
$amount_wishlists = array_reduce($_SESSION['wishlist'], function ($prev_value, $curr_val) {
// var_dump($prev_value);
    // var_dump($curr_val['sl']);

    return $curr_val['sl'] + $prev_value;
}, 0);
?>
    Yêu thích (<?php echo $amount_wishlists ?> sp)
</a>