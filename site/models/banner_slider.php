<?php
 function get_new_slider_home()
 {
 
     try {
         $conn = connectdb();
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $stmt = $conn->prepare("SELECT * FROM tbl_slider where 1 order by date_slider desc limit 0,2");
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
 function get_new_banner_home()
 {
 
     try {
         $conn = connectdb();
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $stmt = $conn->prepare("SELECT * FROM tbl_banner where 1 order by date_create desc limit 0,1");
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
?>