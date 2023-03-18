<?php
//File : edit_customer.php
//Deskripsi : menampilkan form edit data customer dan mengupdate data ke database
    $id = $_GET['id'];
    // connect database
    require_once('../db_login.php');
    $db = new mysqli($db_host, $db_username, $db_password, $db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    $query = " SELECT * FROM customers WHERE customerid=".$id." ";
    // Execute the query
    $result = $db->query( $query );
    if (!$result){
        die ("Could not query the database: <br />". $db->error);
    }else{
        while ($row = $result->fetch_object()){
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
    <h2>Detail Customer</h2>
    <table>
    <tr>
        <td>Name</td>
        <td>:</td>
        <td><?php echo $name;?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td>:</td>
        <td><?php echo $address;?></td>
    </tr>
    <tr>
        <td>City</td>
        <td>:</td>
        <td><?php echo $city;?></td>
    </tr>
    </table><br/>
    
    <a href="tugas_view_customer.php">Back to customers data</a>
</body>
</html>
<?php
    $db->close();
?>