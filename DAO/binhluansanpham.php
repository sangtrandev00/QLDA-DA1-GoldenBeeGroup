<?php

    function binhluan($idsp,$noi_dung,$ma_nguoidung){
        $sql = "insert into tbl_binhluan(noi_dung,ma_sanpham,ma_nguoidung) values ('$noi_dung','$idsp','$ma_nguoidung')";
    pdo_execute($sql);
}
    


?>