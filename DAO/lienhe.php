<?php
function lienhe($ten,$email,$chude,$sdt,$tinnhan){
    $sql = "insert into tbl_lienhe(ten,email,chude,sdt,tinnhan) values ('$ten','$email','$chude','$sdt','$tinnhan')";
    pdo_execute($sql);
}
?>