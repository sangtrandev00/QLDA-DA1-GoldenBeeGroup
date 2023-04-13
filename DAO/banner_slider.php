<?php
function addslider($title, $hinh, $content, $date)
{
    $sql = "insert into tbl_slider(title_slider,img_slider,content_slider,date_slider) values('$title','$hinh','$content','$date')";
    return pdo_execute($sql);
}
function slider_select_all()
{
    $sql = "SELECT * FROM tbl_slider ORDER BY date_slider DESC";
    return pdo_query($sql);
}
function loadone_slider($id)
{
    $sql = "select * from tbl_slider where id_slider=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function updateslider($id, $title, $hinh, $noidung)
{
    if ($hinh != "") {
        $sql = "update tbl_slider set title_slider='" . $title . "', content_slider='" . $noidung . "', img_slider='" . $hinh . "' where id_slider=" . $id;
    } else {
        $sql = "update tbl_slider set title_slider='" . $title . "', content_slider='" . $noidung . "' where id_slider=" . $id;
    }
    pdo_execute($sql);
}
function delete_slider($id)
{
    $sql = "delete from tbl_slider where id_slider=" . $id;
    pdo_execute($sql);
}
function load_all_sp()
{
    $sql = "SELECT * FROM tbl_sanpham";
    $listsp = pdo_query($sql);
    return $listsp;
}
function addbanner($namebanner, $hinh, $idsp, $noidung, $thongtin, $date, $date_end)
{
    $sql = "insert into tbl_banner(name,idsp,images,noi_dung,date_create, date_end,info) values('$namebanner','$idsp','$hinh','$noidung','$date', '$date_end','$thongtin')";
    return pdo_execute($sql);
}
function banner_select_all()
{
    $sql = "SELECT * FROM tbl_banner ORDER BY date_create DESC";
    return pdo_query($sql);
}
function delete_banner($id)
{
    $sql = "delete from tbl_banner where id=" . $id;
    pdo_execute($sql);
}
function loadone_banner($id)
{
    $sql = "select * from tbl_banner where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_one_sp($id)
{
    $sql = "select * from tbl_sanpham where masanpham=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function updatebanner($id, $namebanner, $hinh, $idsp, $noidung, $thongtin, $date)
{
    if ($hinh != "") {
        $sql = "update tbl_banner set name='" . $namebanner . "', images='" . $hinh . "', idsp='" . $idsp . "', noi_dung='" . $noidung . "', date_create='" . $date . "', info='" . $thongtin . "' where id=" . $id;
    } else {
        $sql = "update tbl_banner set name='" . $namebanner . "', idsp='" . $idsp . "', noi_dung='" . $noidung . "', date_create='" . $date . "', info='" . $thongtin . "' where id=" . $id;
    }
    pdo_execute($sql);
}