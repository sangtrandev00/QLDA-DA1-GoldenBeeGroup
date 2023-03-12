<?php
function connectdb()
{
    $servername = "localhost";
    $username = "asm_myclass";
    $password = "trannhatsang10";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=duanmau_xshop", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;

}