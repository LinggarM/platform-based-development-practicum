<!-- File : form_customer2.php
Deskripsi : Form untuk menerima input data customer -->
<!DOCTYPE HTML>
<html>
    <head>
        <style>
        .error {color: #FF0000;}
        </style>
    </head>
<body>
    <?php
        $error_name = '';
        $error_address = '';
        $error_gender = '';
        $error_email = '';
        $error_city = '';
        $error_hobby = '';
        if (isset($_POST["submit"])){
            $name = test_input($_POST['name']);
            if ($name == ''){
                $error_name = "* Name is required";
            } elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $error_name = "* Only letters and white space allowed";
            }
            $address = test_input($_POST['address']);
            if ($address == ''){
                $error_address = "* Address is required";
            }
            $gender = test_input($_POST['gender']);
            if ($gender == ''){
                $error_gender = "* Gender is required";
            }
            $email = test_input($_POST['email']);
            if ($email == ''){
                $error_email = "* Email is required";
            } elseif (!preg_match("/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/",$email)) {
                $error_email = "* Please input correct email address";
            }
            $city = $_POST['city'];
            if (!(isset($_POST['city']) && $_POST['city']!="")){
                $error_city = "* City is required";
            }
            $hobby = $_POST['hobby'];
            if (!(isset($_POST['hobby']) && $_POST['hobby']!="")) {
                $error_hobby = "* Hobby is required";
            }
        }
        //kode untuk validasi field lainnya ....
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <h2>User Input</h2>
    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table>
            <tr>
            <td valign="top">Name</td>
            <td valign="top">:</td>
            <td valign="top"><input type="text" name="name" size="30" maxlength="50" placeholder="Name (max 50 characters)"></td>
            <td valign="top"><span class="error"><?php echo $error_name;?></span></td>
            </tr>
            <tr>
            <td valign="top">Address</td>
            <td valign="top">:</td>
            <td valign="top"><textarea name="address" rows="5" cols="30" placeholder="Address (max 100 characters)"></textarea></td>
            <td valign="top"><span class="error"><?php echo $error_address;?></span></td>
            </tr>
            <tr>
            <td valign="top">Gender</td>
            <td valign="top">:</td>
            <td valign="top">
            <input type="radio" name="gender" value="male">Male <br />
            <input type="radio" name="gender" value="female">Female
            </td>
            <td valign="top"><span class="error"><?php echo $error_gender;?></span></td>
            </tr>
            <tr>
            <td valign="top">Email</td>
            <td valign="top">:</td>
            <td valign="top"><input type="text" name="email" size="30"></td>
            <td valign="top"><span class="error"><?php echo $error_email;?></span></td>
            </tr>
            <tr>
            <td valign="top">City</td>
            <td valign="top">:</td>
            <td valign="top"><select name="city">
            <option value="none">--Select a city--</option>
            <option value="Airport West">Airport West</option>
            <option value="Box Hill">Box Hill</option>
            <option value="Yarraville">Yarraville</option>
            </select>
            </td>
            <td valign="top"><span class="error"><?php echo $error_city;?></span></td>
            </tr>
            <tr>
            <td valign="top">Hobby</td>
            <td valign="top">:</td>
            <td valign="top">
            <input type="checkbox" name="hobby[]" value="travelling">Travelling<br />
            <input type="checkbox" name="hobby[]" value="reading">Reading<br />
            <input type="checkbox" name="hobby[]" value="swimming">Swimming<br />
            <input type="checkbox" name="hobby[]" value="painting">Painting<br />
            </td>
            <td valign="top"><span class="error"><?php echo $error_hobby;?></span></td>
            </tr>
            <tr>
            <td valign="top" colspan="3"><br><input type="submit" name="submit" value="Submit">&nbsp;
            <input type="reset" name="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    <?php
        //membaca isi form
        if (isset($_POST["submit"])){
            echo "<h2>Your Input:</h2>";
            echo 'Name = '.$name.'<br />';
            echo 'Address = '.$_POST['address'].'<br />';
            echo 'Gender = '.$_POST['gender'].'<br />';
            echo 'Email = '.$_POST['email'].'<br />';
            echo 'City = '.$_POST['city'].'<br />';
            $hobby = $_POST['hobby'];
            if (!empty($hobby)){
                echo 'The hobbies selected are: ';
                foreach($hobby as $hobby_item){
                echo '<br />'.$hobby_item;
                }
            }
        }
    ?>
</body>
</html>