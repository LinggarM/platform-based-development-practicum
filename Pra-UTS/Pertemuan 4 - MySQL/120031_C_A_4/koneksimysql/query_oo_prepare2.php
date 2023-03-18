<?php
    //Nama file: query_oo_prepare2.php
    //Menampilkan data buku dengan isbn tertentu
    // Include our login information
    require_once('db_login.php');
    // Connect
    $db = new mysqli($db_host,$db_username,$db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    //prepare statement
    if ($stmt = $db->prepare("SELECT * FROM books WHERE isbn=?")) {
        //bind parameter
        $stmt->bind_param("s",$keyword);
        //execute prpeapred statement
        $keyword = "0-672-31509-2";
        $stmt->execute();
        /* bind variables to prepared statement */
        $stmt->bind_result($isbn,$author,$title,$price);
        /* fetch values */
        while ($stmt->fetch()) {
            echo 'ISBN: '.$isbn.'<br />';
            echo 'Author: '.$author.'<br /> ';
            echo 'Title: '.$title.'<br /> ';
            echo 'Price: '.$price.'<br /><br />';
        }
        /* close statement */
        $stmt->close();
    }
    /* close connection */
    $db->close();
?>