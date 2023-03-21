<?php
function get_all_products($new, $sale, $view, $cateid = 0)
{
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_sanpham WHERE 1";
        if ($sale == 1) {
            $sql .= " AND sale = 1";
        } else if ($sale == 0) {
            $sql .= " AND sale = 0";
        } else {

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

function insert_product($cateid, $tensp, $oldprice = 0, $newprice = 0, $shortdesc = null, $fulldesc = null, $new, $view = 1, $sale = 0, $hinhanh1, $hinhanh2, $hinhanh3, $hinhanh4, $hinhanh5)
{
    try {
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tbl_sanpham (tensp, giasp, iddm, shortdesc, fulldesc, giacu, view, new, sale, hinhanh1, hinhanh2, hinhanh3, hinhanh4, hinhanh5)
        VALUES ('$tensp', '$newprice', '$cateid', '$shortdesc', '$fulldesc', '$oldprice', '$view', '$new', '$sale','$hinhanh1', '$hinhanh2', '$hinhanh3','$hinhanh4', '$hinhanh5')";
        // use exec() because no results are returned
        $conn->exec($sql);
        return true;
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}

function update_product($id, $cateid, $tensp, $oldprice = 0, $newprice = 0, $shortdesc = null, $fulldesc = null, $new, $view = 1, $sale = 0, $hinhanh1, $hinhanh2 = null, $hinhanh3 = null, $hinhanh4 = null, $hinhanh5 = null)
{

    try {

        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tbl_sanpham
        SET tensp='$tensp',
            giasp='$newprice',
            iddm='$cateid',
            giacu='$oldprice',
            shortdesc='$shortdesc',
            fulldesc='$fulldesc',
            new = '$new',
            view = '$view',
            sale = '$sale',
            hinhanh1 = '$hinhanh1',
            hinhanh2 = '$hinhanh2',
            hinhanh3 = '$hinhanh3',
            hinhanh4 = '$hinhanh4',
            hinhanh5 = '$hinhanh5'
         WHERE id=" . $id;

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

function delete_product($idsp)
{
    try {

        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to delete a record
        $sql = "DELETE FROM tbl_sanpham WHERE id=" . $idsp;

        // use exec() because no results are returned
        $conn->exec($sql);
        return true;
        echo "Record deleted successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

function select_products_by_date($date_value)
{
    // SELECT *, CAST(ngay_nhap AS DATE) from tbl_sanpham where CAST(ngay_nhap AS DATE) = '2023-03-12';
    try {
        $conn = connectdb();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *, CAST(ngay_nhap AS DATE) from tbl_sanpham where CAST(ngay_nhap AS DATE) = '$date_value'";

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
