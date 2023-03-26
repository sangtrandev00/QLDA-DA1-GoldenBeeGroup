<?php

function taodonhang($madonhang, $tongdonhang, $pttt, $hoten, $diachi, $email, $sodienthoai, $ghichu, $iduser, $timeorder, $thanhtoan)
{
    try {

        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $sql = "INSERT INTO `tbl_order` (`madonhang`,`pttt`,`hoten`,`dienthoai`,`email`,`diachi`,`tongdonhang`)
        // VALUES ('" . $madonhang . "','" . $pttt . "','" . $hoten . " ','" . $sodienthoai . " ','" . $email . " ','" . $diachi . " ,' " . $tongdonhang . "  ')
        // ";
        // echo $timeorder;
        $sql = "INSERT INTO tbl_order (madonhang, pttt, name, dienthoai, email, address, tongdonhang, ghichu, iduser, timeorder, thanhtoan)
        VALUES ('$madonhang', '$pttt', '$hoten', '$sodienthoai','$email','$diachi','$tongdonhang','$ghichu', '$iduser','$timeorder', $thanhtoan )";

        // use exec() because no results are returned
        $conn->exec($sql);
        $last_id = $conn->lastInsertId(); // phuong thuc nay de lam gi ?
        return $last_id;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function addtocart($iddh, $idsp, $tensp, $img, $gia, $sl)
{
    $conn = connectdb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO tbl_order_detail (idsanpham, iddonhang, soluong, dongia,tensp,hinhanh)
    VALUES ('$idsp', '$iddh', '$sl', '$gia','$tensp','$img')";

    // use exec() because no results are returned
    $conn->exec($sql);
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

function get_order_and_detail($iddh)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT detail.id as id, idsanpham, iddonhang, soluong, dongia, tensp, hinhanh, trangthai, thanhtoan FROM tbl_order_detail detail inner join tbl_order od on od.id = detail.iddonhang WHERE iddonhang = " . $iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getorderinfo($iddh)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_order od inner join tbl_vnpay vnpay on od.id = vnpay.order_id WHERE id = " . $iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
    return $kq;
}

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

function getshowcartbyiduser($iduser)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_order_detail  INNER JOIN tbl_order on tbl_cart.iddonhang = tbl_order.id WHERE iduser='$iduser'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getShowCartGroupbyOrder($userId)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT tbl_order.id, madonhang, iddonhang,tongdonhang, pttt,sum(soluong) as soluong, timeorder,iduser, trangthai FROM tbl_order_detail INNER JOIN tbl_order on tbl_order_detail.iddonhang = tbl_order.id group by iddonhang HAVING iduser = '$userId' order by timeorder desc");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}