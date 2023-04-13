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
    $sql = 'SELECT DISTINCT sum(tongdonhang) OVER () as sum_all_sales from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 4 group by de.iddonhang;';
    return pdo_query_value($sql);
}

function count_all_orders()
{
    $sql = 'SELECT DISTINCT count(*) OVER () as totalRecord from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang group by de.iddonhang';
    return pdo_query_value($sql);
}

function count_all_orders_failed()
{
    $sql = 'SELECT DISTINCT count(*) OVER () as totalRecord from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 5 group by de.iddonhang';
    return pdo_query_value($sql);
}

function sum_money_all_failed_orders_paid()
{
    // SELECT DISTINCT sum(tongdonhang) OVER () as sum_all_sales from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 5 and pttt LIKE '%VNpay%' group by de.iddonhang;
    $sql = 'SELECT DISTINCT sum(tongdonhang) OVER () as sum_all_sales from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 5 and pttt LIKE "%VNpay%" group by de.iddonhang;';
    return pdo_query_value($sql);
}

function count_all_shipping_orders()
{
    $sql = 'SELECT DISTINCT count(*) OVER () as totalRecord from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 3 group by de.iddonhang';
    return pdo_query_value($sql);
}

function sum_all_money_of_shipping_orders()
{
    $sql = 'SELECT DISTINCT sum(tongdonhang) OVER () as sum_all_sales from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 3 group by de.iddonhang;';
    return pdo_query_value($sql);
}

function count_all_orders_success()
{
    $sql = 'SELECT DISTINCT count(*) OVER () as totalRecord from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 4 group by de.iddonhang';
    return pdo_query_value($sql);
}

function count_all_confirmed_orders()
{
    $sql = 'SELECT DISTINCT count(*) OVER () as totalRecord from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 2 group by de.iddonhang';
    return pdo_query_value($sql);
}

function count_all_unconfirmed_orders()
{
    $sql = 'SELECT DISTINCT count(*) OVER () as totalRecord from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 1 group by de.iddonhang';
    return pdo_query_value($sql);
}

function count_all_orders_being_destroyed()
{
    $sql = 'SELECT DISTINCT count(*) OVER () as totalRecord from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 6 group by de.iddonhang';
    return pdo_query_value($sql);
}

function sum_money_all_orders_failed_paid()
{
    $sql = 'SELECT DISTINCT sum(tongdonhang) OVER () as sum_all_sales from tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang where trangthai = 6 and pttt LIKE "%VNpay%" group by de.iddonhang;';
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

function count_all_reviews_products()
{
    $sql = 'SELECT count(*) from tbl_danhgiasp ';
    return pdo_query_value($sql);
}

function count_all_replied_reviews()
{
    $sql = 'SELECT count(*) from tbl_reply_reviews';
    return pdo_query_value($sql);
}

function count_all_customer()
{
    $sql = 'SELECT count(*) from tbl_nguoidung where vai_tro = 3';
    return pdo_query_value($sql);
}

function count_all_products_inventory_less_than($num)
{
    $sql = "SELECT count(*) from tbl_sanpham where ton_kho <= '$num'";
    return pdo_query_value($sql);
}

function count_all_comments_products()
{
    $sql = "SELECT count(*) from tbl_binhluan;";
    return pdo_query_value($sql);
}

function count_all_customer_feedbacks()
{
    $sql = "SELECT count(*) from tbl_feedback";
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

function report_products_by_cates()
{
    $sql = "SELECT dm.ma_danhmuc as madm, dm.ten_danhmuc as tendm, count(sp.masanpham) as `so_luong`, avg(sp.don_gia) as `avg`, min(sp.don_gia) as `min`, max(sp.don_gia) as `max`, hinh_anh from tbl_sanpham sp inner join tbl_danhmuc dm on sp.ma_danhmuc = dm.ma_danhmuc group by dm.ma_danhmuc";
    return pdo_query($sql);
}

function top_users_bought_products()
{
    $sql = "SELECT *, sum(tongdonhang) as tongtienmuahang, count(*) as sodonhang from tbl_order od inner join tbl_nguoidung ng on od.iduser = ng.id where trangthai = 4 group by iduser order by tongtienmuahang desc";
    return pdo_query($sql);
}

function top_bom_users_bought_products()
{
    $sql = "SELECT *, count(*) as so_lan_bom_hang from tbl_order od inner join tbl_nguoidung ng on od.iduser = ng.id where trangthai = 5 group by iduser order by so_lan_bom_hang desc;";
    return pdo_query($sql);
}
