<?php
function updateorderstatus($iddh, $trangthai)
{
    $sql = "UPDATE tbl_order set trangthai = ? where id = ?";
    $mess = pdo_execute($sql, $trangthai, $iddh);
    // echo $mess;
    return true;
}

function updatepaymentstatus($iddh, $thanhtoan)
{
    $sql = "UPDATE tbl_order set thanhtoan = ? where id = ?";
    $mess = pdo_execute($sql, $thanhtoan, $iddh);
    // echo $mess;
    return true;
}

function deleteorderdetailbyid($iddh)
{
    $sql = "DELETE from tbl_order_detail where iddonhang = $iddh;";
    pdo_execute($sql);
    return true;
}

function deleteorderbyid($iddh)
{
    $sql = "DELETE from tbl_order where id = $iddh;";
    pdo_execute($sql);
    return true;
}

function select_orderdetail_by_orderid($iddh)
{
    $sql = "SELECT ma_danhmuc, idsanpham, sp.tensp, soluong, dongia, hinhanh from tbl_order_detail detail inner join tbl_sanpham sp on detail.idsanpham = sp.masanpham where iddonhang = $iddh;";
    return pdo_query($sql);
    // return true;
}

// select * from tbl_order od inner join tbl_order_detail detail on od.id = detail.iddonhang inner join tbl_sanpham sp on sp.masanpham = detail.idsanpham having trangthai = 4;

function count_sold_product_by_id($id)
{
    $sql = "SELECT count(*) from tbl_order od inner join tbl_order_detail detail on od.id = detail.iddonhang inner join tbl_sanpham sp on sp.masanpham = detail.idsanpham where trangthai = 4 and idsanpham = '$id'";
    return pdo_query_value($sql);
}

function count_all_sold_products()
{
    $sql = "SELECT count(*) from tbl_order od inner join tbl_order_detail detail on od.id = detail.iddonhang inner join tbl_sanpham sp on sp.masanpham = detail.idsanpham where trangthai = 4";
    return pdo_query_value($sql);
}