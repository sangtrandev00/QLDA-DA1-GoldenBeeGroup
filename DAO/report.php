<?php

// Chỉnh sửa thêm những loại hàm này !!!

function report_products()
{
    $sql = "SELECT dm.ma_danhmuc, dm.ten_danhmuc,"
        . " COUNT(*) so_luong,"
        . " MIN(hh.don_gia) gia_min,"
        . " MAX(hh.don_gia) gia_max,"
        . " AVG(hh.don_gia) gia_avg"
        . " FROM hang_hoa hh "
        . " JOIN loai lo ON dm.ma_danhmuc=hh.ma_danhmuc "
        . " GROUP BY dm.ma_danhmuc, dm.ten_danhmuc";
    return pdo_query($sql);

}

function report_products_by_category()
{
    $sql = "SELECT dm.ma_danhmuc as ma_danhmuc, dm.ten_danhmuc as ten_danhmuc, count(sp.ma_danhmuc) as sl_sp from tbl_sanpham sp inner join tbl_danhmuc dm on sp.ma_danhmuc = dm.ma_danhmuc group by sp.ma_danhmuc";
    return pdo_query($sql);
}

function report_comments()
{
    $sql = "SELECT hh.ma_hh, hh.ten_hh,"
        . " COUNT(*) so_luong,"
        . " MIN(bl.ngay_bl) cu_nhat,"
        . " MAX(bl.ngay_bl) moi_nhat"
        . " FROM binh_luan bl "
        . " JOIN hang_hoa hh ON hh.ma_hh=bl.ma_hh "
        . " GROUP BY hh.ma_hh, hh.ten_hh"
        . " HAVING so_luong > 0";
    return pdo_query($sql);

}

function sum_all_sales()
{
    $sql = 'SELECT sum(tongdonhang) as sum_all_sales from tbl_order where trangthai = 4';
    return pdo_query_value($sql);
}

function count_all_orders()
{
    $sql = 'SELECT count(*) from tbl_order';
    return pdo_query_value($sql);
}

function count_all_comments()
{
    $sql = 'SELECT count(*) from tbl_binhluan';
    return pdo_query_value($sql);
}

function count_all_views()
{
    $sql = 'SELECT sum(so_luot_xem) as views from tbl_sanpham ';
    return pdo_query_value($sql);
}

function count_all_posts()
{
    $sql = 'SELECT count(*) from tbl_blog ';
    return pdo_query_value($sql);
}

function count_all_comments_posts()
{
    $sql = 'SELECT count(*) from tbl_blog_comment ';
    return pdo_query_value($sql);
}

function count_all_customer()
{
    // $sql = 'SELECT sum(so_luot_xem) as views from tbl_sanpham ';
    // return pdo_query_value($sql);
}

function count_all_comments_products()
{
    $sql = "SELECT count(*) from tbl_binhluan;";
    return pdo_query_value($sql);
}

function count_all_user()
{
    $sql = 'SELECT sum(so_luot_xem) as views from tbl_sanpham ';
    return pdo_query_value($sql);
}

function count_total_sales_by_product($id)
{

}
