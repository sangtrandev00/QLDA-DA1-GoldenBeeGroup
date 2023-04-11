<?php
$FOLDER_VAR = "/PRO1014_DA1/main-project";
$ROOT_URL = $_SERVER['DOCUMENT_ROOT'] . "$FOLDER_VAR";

include $ROOT_URL . "/pdo-library.php";

function cate_insert($ten_loai, $hinh_anh, $mo_ta)
{
    $sql = "INSERT INTO tbl_danhmuc(ten_danhmuc, hinh_anh, mo_ta) VALUES(?,?,?)";
    pdo_execute($sql, $ten_loai, $hinh_anh, $mo_ta);
    return true;
}

function count_subcate_by_cateid($cateid)
{
    $sql = "SELECT count(*) from tbl_danhmucphu where iddm = '$cateid'";
    return pdo_query_value($sql);
}

function subcate_insert($iddm, $ten_danhmucphu, $mo_ta)
{
    $sql = "INSERT INTO tbl_danhmucphu(iddm, ten_danhmucphu, mo_ta) VALUES(?,?,?)";
    pdo_execute($sql, $iddm, $ten_danhmucphu, $mo_ta);
    return true;
}

function cate_update($ma_loai, $ten_danhmuc, $hinh_anh, $mo_ta)
{
    $sql = "UPDATE tbl_danhmuc SET ten_danhmuc=?, hinh_anh = ?, mo_ta = ? WHERE ma_danhmuc=?";
    pdo_execute($sql, $ten_danhmuc, $hinh_anh, $mo_ta, $ma_loai);
    return true;
}
function subcate_update($id_dmphu, $ten_danhmucphu, $mo_ta)
{
    $sql = "UPDATE tbl_danhmucphu SET ten_danhmucphu=?, mo_ta = ? WHERE id=?";
    pdo_execute($sql, $ten_danhmucphu, $mo_ta, $id_dmphu);
    return true;
}

function cate_delete($ma_loai)
{
    $sql = "DELETE FROM tbl_danhmuc WHERE ma_danhmuc=?";
    if (is_array($ma_loai)) {
        foreach ($ma_loai as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_loai);
    }

}

function subcate_delete($subcate_id)
{
    $sql = "DELETE FROM tbl_danhmucphu WHERE id=?";
    if (is_array($subcate_id)) {
        foreach ($subcate_id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $subcate_id);
        return true;
    }

}

function cate_select_all()
{
    $sql = "SELECT * FROM tbl_danhmuc";
    return pdo_query($sql);

}
function subcate_select_all()
{
    $sql = "SELECT * FROM tbl_danhmucphu";
    return pdo_query($sql);

}

function cate_select_join_all()
{
    $sql = "SELECT * from tbl_danhmuc dm inner join tbl_danhmucphu dmp on dm.ma_danhmuc = dmp.iddm";
    return pdo_query($sql);
}

function subcate_select_all_by_id($iddm)
{
    $sql = "SELECT * from tbl_danhmucphu where iddm = $iddm";
    return pdo_query($sql);
}

function cate_select_by_id($ma_loai)
{
    $sql = "SELECT * FROM tbl_danhmuc WHERE ma_danhmuc=?";
    return pdo_query_one($sql, $ma_loai);

}

function subcate_select_by_id($ma_loai)
{
    $sql = "SELECT * FROM tbl_danhmucphu WHERE id=?";
    return pdo_query_one($sql, $ma_loai);

}

function select_subcates_by_cateid($cateid)
{
    $sql = "SELECT * FROM tbl_danhmucphu WHERE iddm=?";
    return pdo_query($sql, $cateid);
}

function catename_select_by_id($ma_loai)
{
    $sql = "SELECT ten_danhmuc FROM tbl_danhmuc WHERE ma_danhmuc=?";
    return pdo_query_one($sql, $ma_loai);

}

function subcatename_select_by_id($id_dmphu)
{
    $sql = "SELECT ten_danhmucphu FROM tbl_danhmucphu WHERE id=?";
    return pdo_query_one($sql, $id_dmphu);

}

function cate_exist($ma_loai)
{
    $sql = "SELECT count(*) FROM tbl_danhmuc WHERE ma_danhmuc=?";
    return pdo_query_value($sql, $ma_loai) > 0;

}

function subcate_exist_in_cate($ma_loai)
{
    $sql = "SELECT count(*) from tbl_danhmucphu where iddm = ?";
    return pdo_query_value($sql, $ma_loai) > 0;
}
function cate_exist_by_name($ten_danhmuc)
{
    $sql = "SELECT count(*) FROM tbl_danhmuc WHERE ten_danhmuc=?";
    return pdo_query_value($sql, $ten_danhmuc) > 0;

}
function subcate_exist_by_name($ten_danhmucphu)
{
    $sql = "SELECT count(*) FROM tbl_danhmucphu WHERE ten_danhmucphu=?";
    return pdo_query_value($sql, $ten_danhmucphu) > 0;

}

function cate_select_join_on_product()
{
    $sql = "SELECT * from tbl_sanpham sp inner join tbl_danhmuc dm on sp.ma_danhmuc = dm.ma_danhmuc group by dm.ma_danhmuc";
    return pdo_query($sql);
}

function select_min_max_avg_by_cateid($ma_danhmuc)
{
    $sql = "select min(don_gia) as `min`, max(don_gia) as `max`, avg(don_gia) as `avg` from `tbl_sanpham` sp inner join `tbl_danhmuc` dm on sp.ma_danhmuc = dm.ma_danhmuc where dm.ma_danhmuc = ?";
    return pdo_query($sql, $ma_danhmuc);
}

function count_number_cate_by_cateid($ma_danhmuc)
{
    $sql = "select count(*) as `so_luong` from `tbl_sanpham` sp inner join `tbl_danhmuc` dm on sp.ma_danhmuc = dm.ma_danhmuc where dm.ma_danhmuc = ?;";
    return pdo_query($sql, $ma_danhmuc)[0]['so_luong'];
}

function report_list_select()
{
    $sql = "SELECT dm.ma_danhmuc as madm, dm.ten_danhmuc as tendm, count(sp.masanpham) as `so_luong`, avg(sp.don_gia) as `avg`, min(sp.don_gia) as `min`, max(sp.don_gia) as `max` from tbl_sanpham sp inner join tbl_danhmuc dm on sp.ma_danhmuc = dm.ma_danhmuc group by dm.ma_danhmuc";
    return pdo_query($sql);
}
