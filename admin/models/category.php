<?php

function get_all_cates()
{

    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        // var_dump($result);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

function get_one_cate($id)
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM tbl_danhmuc WHERE id =" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        // var_dump($result);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

function delete_cate($id = 0)
{

    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to delete a record
        $sql = "DELETE FROM tbl_danhmuc WHERE 1";
        if ($id != 0) {
            $sql .= " AND id = " . $id;
        }
        // use exec() because no results are returned
        $conn->exec($sql);
        return true;
        echo "Record deleted successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

}

function add_cate($catename, $hinh_anh, $mo_ta)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tbl_danhmuc (ten_danhmuc, hinh_anh, mo_ta)
        VALUES ('$catename', '$hinh_anh', '$mo_ta')";
        // use exec() because no results are returned
        $conn->exec($sql);
        return true;
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function add_subcate($iddm, $ten_danhmucphu, $mo_ta)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tbl_danhmucphu (iddm, ten_danhmucphu, mo_ta)
        VALUES ('$iddm', '$ten_danhmucphu', '$mo_ta')";
        // use exec() because no results are returned
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

function update_cate($id, $catename, $catetitle)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tbl_danhmuc SET ten_danhmuc ='$catename', tieude ='$catetitle' WHERE id=" . $id;

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
}

function count_products_by_cate($cate_id)
{

    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(*) as sl_sp from tbl_sanpham where ma_danhmuc = '$cate_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        // var_dump($result);
        return $result['sl_sp'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

function count_products_by_subcate($subcate_id)
{

    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(*) as sl_sp from tbl_sanpham where id_dmphu = '$subcate_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        // var_dump($result);
        return $result['sl_sp'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}