<?php
    // Include our login information
    require_once('db_login.php');

    // Connect
    $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }

    //Asign a query
    $id = $_GET['id'];
    $query = " SELECT * FROM customers WHERE customerid = '$id' ";

    // Execute the query
    $result = mysqli_query($con,$query);
    if (!$result){
        die ("Could not query the database: <br />". mysqli_error($con));
    }
    // Fetch and display the results
    $row = mysqli_fetch_array($result);
    echo "<br/><br/>";
    echo 'Name = '.$row['name'].'<br />';
    echo 'Address = '.$row['address'].'<br />';
    echo 'City = '.$row['city'].'<br />';
?>