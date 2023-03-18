<?php
function blog_select_by_id($blog_id)
{
    $sql = "SELECT * FROM tbl_blog WHERE blog_id=?";
    return pdo_query_one($sql, $blog_id);

}

?>