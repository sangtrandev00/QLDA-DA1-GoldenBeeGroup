<?php

// Hàm lấy tất cả danh mục

function checkuser($email, $password)
{
    // $kq = '';
    $conn = connectdb();
    // Lỗi cú pháp ở đây !!!
    $sql = "SELECT * FROM tbl_nguoidung WHERE email = '$email' AND mat_khau = '$password'";
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

function getuserinfo($email, $password)
{
    // $kq = '';
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_nguoidung WHERE email = '$email' AND mat_khau = '$password'");
    $stmt->execute();
    // return $kq;
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
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

function update_shipping_address($iduser, $province_id, $district_id, $ward_id, $detail_address)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tbl_shipping SET province_id='$province_id', district_id='$district_id', ward_id='$ward_id', detail_address='$detail_address' WHERE id_user=" . $iduser;

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

function is_existing_shipping_address($iduser)
{
    $conn = connectdb();

    $stmt = $conn->prepare("SELECT count(*) as user_shipping FROM tbl_shipping WHERE id_user = '$iduser'");

    $stmt->execute();
    // return $kq;
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
    return $kq['user_shipping'] > 0;
}

function insert_shipping_address($id_user, $province_id, $district_id, $ward_id, $detail_address)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO tbl_shipping (id_user, province_id, district_id, ward_id, detail_address)
        VALUES ('$id_user','$province_id','$district_id', '$ward_id', '$detail_address')";

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
}

function user_get_by_id($iduser)
{
    $conn = connectdb();

    $stmt = $conn->prepare("SELECT * FROM tbl_nguoidung WHERE id = '$iduser'");

    $stmt->execute();

    // return $kq;
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
    return $kq;
}

function user_change_pass_by_id($iduser, $newpass)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tbl_nguoidung SET mat_khau='$newpass'  WHERE id=" . $iduser;

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