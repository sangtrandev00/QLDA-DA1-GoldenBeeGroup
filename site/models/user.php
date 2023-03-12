<?php

// Hàm lấy tất cả danh mục

function checkuser($username, $password)
{
    // $kq = '';
    $conn = connectdb();
    // Lỗi cú pháp ở đây !!!
    $sql = "SELECT * FROM tbl_nguoidung WHERE tai_khoan = '$username' AND mat_khau = '$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // return $kq;

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    // Chưa check user
    if (count($kq) > 0) {
        // echo "kq: " . var_dump($kq);
        return $kq[0]['vai_tro'];
    } else {
        return -1;
    }
    // return $kq;
}

function insertuser($name, $homeaddress, $phonenumber, $username, $email, $password)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_nguoidung (name,address,phonenumber, user, email,pass)
    VALUES ('$name','$homeaddress','$phonenumber', '$username', '$email','$password')";
    $conn->exec($sql);
    return true;
}

function getuserinfo($username, $password)
{
    // $kq = '';
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_nguoidung WHERE tai_khoan = '$username' AND mat_khau = '$password'");
    $stmt->execute();
    // return $kq;
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getuserinfobyid($iduser)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_nguoidung WHERE id = '$iduser'");
    $stmt->execute();
    // return $kq;
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function updateuser($iduser, $urlavatar, $name, $email, $phonenumber, $address)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tbl_nguoidung SET avatar='$urlavatar', name='$name', email='$email', phonenumber='$phonenumber',address='$address'  WHERE id=" . $iduser;

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();
        return true;
        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

function findIdbyUser($username)
{
    // $kq = '';
    $conn = connectdb();

    $stmt = $conn->prepare("SELECT id FROM tbl_nguoidung WHERE user = '$username'");

    $stmt->execute();

    // return $kq;
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    if (count($kq) > 0) {
        return $kq[0];
    } else {
        return false;
    }
}

function updatepass($iduser, $newpass)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tbl_nguoidung SET pass='$newpass'  WHERE id=" . $iduser;

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        return true;
        echo $stmt->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}