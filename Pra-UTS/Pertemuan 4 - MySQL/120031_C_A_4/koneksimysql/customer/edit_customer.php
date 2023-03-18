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
if (!isset($_POST["submit"])){
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
}else{
    $name = test_input($_POST['name']);
    if ($name == ''){
        $error_name = "Name is required";
        $valid_name = FALSE;
    }elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $error_name = "Only letters and white space allowed";
        $valid_name = FALSE;
    }else{
        $valid_name = TRUE;
    }

    $address = test_input($_POST['address']);
    if ($address == ''){
        $error_address = "Address is required";
        $valid_address = FALSE;
    }else{
        $valid_address = TRUE;
    }

    $city = $_POST['city'];
    if ($city == '' || $city == 'none'){
        $error_city = "City is required";
        $valid_city = FALSE;
    }else{
        $valid_city = TRUE;
    }
    //update data into database
    if ($valid_name && $valid_address && $valid_city){
        //escape inputs data
        $name = $db->real_escape_string($name);
        $address = $db->real_escape_string($address);
        $city = $db->real_escape_string($city);
        //Asign a query
        $query = " UPDATE customers SET name='".$name."', address='".$address."', city='".$city."' WHERE customerid=".$id." ";
        // Execute the query
        $result = $db->query( $query );
            if (!$result){
            die ("Could not query the database: <br />". $db->error);
        }else{
            echo 'Data has been updated.<br /><br />';
            echo '<a href="view_customer.php">Back to customers data</a>';
            $db->close();
            exit;
        }
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <h2>User Input</h2>
    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
        <table>
            <tr>
                <td valign="top">Name</td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="name" size="30" maxlength="50" placeholder="Name (max 50 characters)" autofocus value="<?php echo $name;?>"></td>
                <td valign="top"><span class="error">* <?php echo $error_name;?></span></td>
            </tr>
            <tr>
                <td valign="top">Address</td>
                <td valign="top">:</td>
                <td valign="top"><textarea name="address" rows="5" cols="30" placeholder="Address (max 100 characters)"><?php echo $address;?></textarea></td>
                <td valign="top"><span class="error">* <?php echo $error_address;?></span></td>
            </tr>
            <tr>
                <td valign="top">City</td>
                <td valign="top">:</td>
                <td valign="top"><select name="city" required>
                    <option value="none" <?php if (!isset($city)) echo 'selected="true"';?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city=="Airport West") echo 'selected="true"';?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city=="Box Hill") echo 'selected="true"'; ?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city=="Yarraville") echo 'selected="true"'; ?>>Yarraville</option>
                    </select>
                </td>
                <td valign="top"><span class="error">* <?php echo $error_city;?></span></td>
            </tr>
            <tr>
            <td valign="top" colspan="3"><br><input type="submit" name="submit" value="Submit">
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    $db->close();
?>