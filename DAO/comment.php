<?php

function comment_insert($iduser, $masanpham, $noidung, $ngay_binhluan)
{
    $sql = "INSERT INTO tbl_binhluan(ma_nguoidung, ma_sanpham, noi_dung, ngay_binhluan) VALUES (?,?,?,?)";
    pdo_execute($sql, $iduser, $masanpham, $noidung, $ngay_binhluan);

}

function comment_update($ma_binhluan, $iduser, $masanpham, $noidung, $ngay_binhluan)
{
    $sql = "UPDATE tbl_binhluan SET ma_nguoidung=?,ma_sanpham=?,noi_dung=?,ngay_binhluan=? WHERE ma_binhluan=?";
    pdo_execute($sql, $iduser, $masanpham, $noidung, $ngay_binhluan, $ma_binhluan);

}

function comment_delete($ma_binhluan)
{
    $sql = "DELETE FROM tbl_binhluan WHERE ma_binhluan=?";
    if (is_array($ma_binhluan)) {
        foreach ($ma_binhluan as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_binhluan);
    }

}
function comment_approve($ma_binhluan)
{
    $sql = "UPDATE tbl_binhluan set duyet = 1  WHERE ma_binhluan=?";
    pdo_execute($sql, $ma_binhluan);

}

function comment_delete_by_iduser($iduser)
{
    $sql = "DELETE FROM tbl_binhluan WHERE ma_nguoidung=?";
    if (is_array($iduser)) {
        foreach ($iduser as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $iduser);
    }
}

function comment_select_all()
{
    $sql = "SELECT * FROM tbl_binhluan bl ORDER BY ngay_binhluan DESC";
    return pdo_query($sql);

}

function comment_select_by_id($ma_binhluan)
{
    $sql = "SELECT * FROM tbl_binhluan WHERE ma_binhluan=?";
    return pdo_query_one($sql, $ma_binhluan);

}

function comment_exist($ma_binhluan)
{
    $sql = "SELECT count(*) FROM tbl_binhluan WHERE ma_binhluan=?";
    return pdo_query_value($sql, $ma_binhluan) > 0;

}

function comment_select_by_product($ma_sanpham)
{
    $sql = "SELECT bl.*, sp.tensp FROM tbl_binhluan bl JOIN tbl_sanpham sp ON sp.masanpham=bl.ma_sanpham WHERE bl.ma_sanpham=?  ORDER BY ngay_binhluan DESC";
    return pdo_query($sql, $ma_sanpham);

}

function comment_select_by_product_has_approved($ma_sanpham)
{
    $sql = "SELECT bl.*, sp.tensp FROM tbl_binhluan bl JOIN tbl_sanpham sp ON sp.masanpham=bl.ma_sanpham WHERE bl.ma_sanpham=? AND duyet = 1 ORDER BY ngay_binhluan DESC";
    return pdo_query($sql, $ma_sanpham);

}

function count_comment_select_by_iduser($ma_nguoidung)
{
    $sql = "SELECT count(ma_nguoidung) as 'so_binhluan', bl.*, sp.tensp FROM tbl_binhluan bl JOIN tbl_sanpham sp ON sp.masanpham=bl.ma_sanpham WHERE bl.ma_sanpham=? group by bl.ma_sanpham order by bl.ngay_binhluan desc";
    return pdo_query($sql, $ma_nguoidung);

}

function comment_select_groupby_product()
{
    $sql = "SELECT bl.*, sp.tensp FROM tbl_binhluan bl JOIN tbl_sanpham sp ON sp.masanpham=bl.ma_sanpham group by bl.ma_sanpham order by bl.ngay_binhluan";
    return pdo_query($sql);

}

function count_comment_has_approved($ma_sanpham)
{
    $sql = "select * from tbl_binhluan where ma_sanpham = $ma_sanpham and duyet = 1";
    return count(pdo_query($sql));
}