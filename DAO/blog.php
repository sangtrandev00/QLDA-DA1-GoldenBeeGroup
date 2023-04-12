<?php
function blog_select_by_id($blog_id)
{
    $sql = "SELECT * FROM tbl_blog WHERE blog_id=?";
    return pdo_query_one($sql, $blog_id);

}

function blog_select_all()
{
    $sql = "SELECT * FROM tbl_blog ORDER BY create_time DESC";
    return pdo_query($sql);
}
function blog_cate_select_all()
{
    $sql = "SELECT * FROM tbl_blog_cate";
    return pdo_query($sql);
}
function loadall_cateblog()
{
    $sql = "select * from tbl_blog_cate order by id";
    $list_cateblog = pdo_query($sql);
    return $list_cateblog;
}
function delete_blog($id)
{
    $sql = "delete from tbl_blog where blog_id=" . $id;
    pdo_execute($sql);
}
function delete_cateblog($id)
{
    $sql = "delete from tbl_blog_cate where id=" . $id;
    pdo_execute($sql);
}
function add_blog($title, $hinh, $connten, $ngaynhap, $idcate)
{
    $sql = "insert into tbl_blog(blog_title,images,noi_dung,create_time,blogcate_id) values('$title','$hinh','$connten','$ngaynhap','$idcate')";
    return pdo_execute($sql);
}
function loadone_blog($id)
{
    $sql = "select * from tbl_blog where blog_id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadone_cateblog($id)
{
    $sql = "select * from tbl_blog_cate where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function updateblog($id, $title, $hinh, $noidung)
{
    if ($hinh != "") {
        $sql = "update tbl_blog set blog_title='" . $title . "', noi_dung='" . $noidung . "', images='" . $hinh . "' where blog_id=" . $id;
    } else {
        $sql = "update tbl_blog set blog_title='" . $title . "', noi_dung='" . $noidung . "' where blog_id=" . $id;
    }
    pdo_execute($sql);
}
function add_cateblog($catename, $hinh)
{
    if ($hinh != "") {
        $sql = "insert into tbl_blog_cate(blog_catename,hinh_anh) values('$catename','$hinh')";
    } else {
        $sql = "insert into tbl_blog_cate(blog_catename) values('$catename')";
    }
    pdo_execute($sql);
}
// function update_cateblog($id,$catename,$hinh){
//     if($hinh != ""){
//         $sql = "update tbl_blog_cate set blog_catename='".$catename."', hinh_anh='".$hinh."' where id=".$id;
//     }else{
//         $sql = "update tbl_blog_cate set blog_catename='".$catename."' where id=".$id;
//     }
//     pdo_execute($sql);
// }
function update_cateblog($id, $catename, $hinh)
{
    $sql = "update tbl_blog_cate set blog_catename='" . $catename . "', hinh_anh='" . $hinh . "' where id=" . $id;
    pdo_execute($sql);
}
function viewcateblog($id)
{
    $sql = "select * from tbl_blog where blogcate_id=" . $id;
    $listviewcateblog = pdo_query($sql);
    return $listviewcateblog;
}
