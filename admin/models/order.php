<?php

function get_all_orders()
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE 1");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";
}

function get_all_recent_orders()
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT od.id, madonhang, tongdonhang, pttt, iduser, name, dienThoai, address, ghichu, timeorder, trangthai, thanhtoan, sum(soluong) as tongsoluong FROM tbl_order od inner join tbl_order_detail de on od.id = de.iddonhang group by iddonhang order by timeorder desc;");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";
}

function getshoworderdetail($iddh)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_order_detail WHERE iddonhang = " . $iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getorderinfo($iddh)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE id = " . $iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
    return $kq;
}

function getshoworderdetailbyiduser($iduser)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_cart  INNER JOIN tbl_order on tbl_cart.iddonhang = tbl_order.id WHERE iduser='$iduser'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function updateorderbyid($iddh, $trangthai)
{
    $sql = "update tbl_order set trangthai = 'confirmed' where id = $iddh;";
    pdo_execute($sql);
    return true;
}

function count_products_of_order($iddh)
{
    $sql = "SELECT sum(soluong) as 'sl_sp' from tbl_order inner join tbl_order_detail on tbl_order.id = tbl_order_detail.iddonhang group by iddonhang having iddonhang = '$iddh'";
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
    return $kq;
}