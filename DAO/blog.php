<?php
function blog_select_by_id($blog_id)
{
    $sql = "SELECT * FROM tbl_blog WHERE blog_id=?";
    return pdo_query_one($sql, $blog_id);

}

function blog_select_all(){
    $sql = "SELECT * FROM tbl_blog";
    return pdo_query($sql);
}
function blog_cate_select_all(){
    $sql = "SELECT * FROM tbl_blog_cate";
    return pdo_query($sql);
}
function delete_blog($id){
    $sql = "delete from tbl_blog where blog_id=".$id;
    pdo_execute($sql);
}
?>