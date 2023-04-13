<?php
function insert_feedback($name, $email, $phone, $title, $content, $date_create)
{
    $sql = "INSERT INTO tbl_feedback(name, email, phone, title, content, date_create) VALUES (?,?,?,?,?,?)";
    pdo_execute($sql, $name, $email, $phone, $title, $content, $date_create);
    return true;
}
function select_all_feedback_list()
{
    $sql = "SELECT * FROM tbl_feedback";
    return pdo_query($sql);
}
