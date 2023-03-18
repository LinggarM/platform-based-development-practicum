<?php
    //File : show_cart.php
    //Deskripsi : untuk memproses dan menampilkan shopping cart
    session_start();
    $isbn = $_GET['isbn'];

    // Mendapatkan nilai harga items
    require_once('db_login.php');
    $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }
    $query = " SELECT * FROM books WHERE isbn = '$isbn' ";
    $result = mysqli_query($con,$query);
    if (!$result){
        die ("Could not query the database: <br />". mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
    $harga = $row['price'];

    if($isbn){
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            $_SESSION['total_item'] = 0;
            $_SESSION['total_price'] = 0;
        }
        if (isset($_SESSION['cart'][$isbn])){
            $_SESSION['cart'][$isbn]++;
        } else {
            $_SESSION['cart'][$isbn]++;
        }
        $_SESSION['total_items'] = calculate_items($_SESSION['cart']);
        $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
        display_cart($_SESSION['cart']);
        echo '<br /><br /><a href="view_books.php">Continue Shopping</a>';
    }

    function calculate_items($array) {
        return count($array);
    }

    function calculate_price($array) {
        global $harga;
        $price = $_SESSION['total_price'] + $harga;
        return $price;
    }

    function display_cart($array) {
        echo '<table border="1"><tr><th>ISBN</th><th>Jumlah</th></tr>';
        foreach ($array as $value) {
            echo '<tr><td>'.key($array).'</td><td>'.$value.' buah </td><br/>';
            next($array);
        }
        echo '</table>';
        echo '<br/>Total Items : '.$_SESSION['total_items'].'<br/>';
        echo 'Total Harga : '.$_SESSION['total_price'].'<br/>';
    }
?>