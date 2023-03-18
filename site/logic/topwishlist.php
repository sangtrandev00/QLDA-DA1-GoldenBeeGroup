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
    Yêu thích (<?php echo count($_SESSION['wishlist']) ?> sp)
</a>