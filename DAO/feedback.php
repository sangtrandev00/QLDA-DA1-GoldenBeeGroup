<?php
    function insert_feedback($name,$email,$phone,$title,$content)
    {
        $sql = "INSERT INTO tbl_feedback(name, email, phone, title, content) VALUES (?,?,?,?,?)";
        pdo_execute($sql, $name, $email, $phone, $title, $content);
    
    }
    function select_all_feedback_list()
    {
    $sql = "SELECT * FROM tbl_feedback";
    return pdo_query($sql);
    }
?>