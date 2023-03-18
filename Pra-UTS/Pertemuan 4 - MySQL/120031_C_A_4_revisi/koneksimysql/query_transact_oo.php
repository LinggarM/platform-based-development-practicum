<?php
    //Nama file: query_transact_oo.php
    //Melakukan insert data pemesanan ke tabel orders dan order_items menggunakan transaction dengan object oriented style
    // Include our login information
    require_once('db_login.php');
    // Connect
    $db = new mysqli($db_host,$db_username,$db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    //set autocommit to false
    $db->autocommit(false);
    $flag = true;
    // Assign the query
    $query1 = "INSERT INTO orders (orderid,customerid,date) VALUES (4,1,'2016-10-18')";
    $query2 = "INSERT INTO order_items (orderid,isbn,quantity) VALUES (6,'0-672-31745-1',2)";
    $result1 = $db->query($query1);
    if (!$result1) {
        $flag = false;
        echo "Error details: " . $db->error .".";
    }
    $result2 = $db->query($query2);
    if (!$result2) {
        $flag = false;
        echo "Error details: " . $db->error . ".";
    }
    if ($flag) {
        $db->commit();
        echo "All queries were executed successfully";
    } else {
        $db->rollback();
        echo "All queries were rolled back";
    }
    //close connection
    $db->close();
?>