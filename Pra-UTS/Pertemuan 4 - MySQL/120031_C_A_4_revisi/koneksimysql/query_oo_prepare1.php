<?php
    //Nama File: query_oo_prepare1.php
    //Melakukan insert data buku dengan prepare statement
    // Include our login information
    require_once('db_login.php');
    // Connect
    $db = new mysqli($db_host,$db_username,$db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    // prepare and bind
    if($stmt = $db->prepare("INSERT INTO books (isbn,author,title,price) VALUES (?,?,?,?)")){
        $stmt->bind_param("sssd", $isbn, $author, $title, $price);
        // set parameters and execute
        $isbn = "0-672-31509-3";
        $author = "John Doe";
        $title = "PHP Tutorial";
        $price = 15.78;
        $stmt->execute();
        $isbn = "0-672-31509-4";
        $author = "Mary Moe";
        $title = "MySQL Tutorial";
        $price = 15.90;
        $stmt->execute();
        $isbn = "0-672-31509-5";
        $author = "Dooley";
        $title = "Java Tutorial";
        $price = 10.78;
        $stmt->execute();
        echo "New records created successfully";
        $stmt->close();
    }
    $db->close();
?>