<?php

function get_all_products($new, $sale, $view, $cateid = 0)
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_sanpham WHERE 1";
        if ($sale == 1) {
            $sql .= " AND sale = 1";
        } else {
            $sql .= " AND sale = 0";
        }
        if ($cateid != 0) {
            $sql .= " AND iddm=" . $cateid;
        }

        // View = 1; Ở trang home ( trang chủ ), view = 0 ở trang khác.
        if ($view == 1) {
            $sql .= " LIMIT 4";
        }

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

function get_sale_products($numbers)
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_sanpham WHERE 1";
        $sql .= " AND sale = 1";
        // $sql .= " AND LIMIT $numbers";

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

function get_one_product($id)
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_sanpham WHERE id=" . $id;

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

function get_images($proid, $priority = 1)
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_hinhanh WHERE douutien = '$priority' and idsp='$proid'";

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

function get_cate_name($cateid)
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT tendanhmuc FROM tbl_danhmuc WHERE id=" . $cateid;

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
}

function totalRecords($sql)
{
    $conn = connectdb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sql = "SELECT * FROM tbl_sanpham WHERE 1";
    // if ($cateid != 0) {
    //     $sql .= " AND ma_danhmuc = '$cateid'";
    // }
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $finalresult = $stmt->fetchAll();
    return count($finalresult);
}