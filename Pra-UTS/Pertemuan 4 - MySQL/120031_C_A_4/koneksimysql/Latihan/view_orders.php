<!-- File: view_orders.php
Deskripsi : menampilkan data order
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html401/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>Displaying in an HTML table</title>
    </head>
<body>
    <table border="1">
        <?php
            // Include our login information
            require_once('db_login.php');

            // Connect
            $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
            if (mysqli_connect_errno()){
                die ("Could not connect to the database: <br />". mysqli_connect_error( ));
            }

            //Asign a query
            $query = " SELECT orders.orderid AS order_id, orders.date AS order_date, customers.name AS customer_name, customers.address AS customer_address, customers.email AS customer_email FROM orders, customers WHERE customers.customerid = orders.customerid ";

            // Execute the query
            $result = mysqli_query($con,$query);
            if (!$result){
                die ("Could not query the database: <br />". mysqli_error($con));
            }
            // Fetch and display the results
            while ($row = mysqli_fetch_array($result)){
                echo '<table>';
                echo '<tr><td>Date</td><td>: '.$row['order_date'] . '</td></tr>';
                echo '<tr><td>Name</td><td>: '.$row['customer_name'] . '</td></tr>';
                echo '<tr><td>Address</td><td>: '.$row['customer_address'] . '</td></tr>';
                echo '<tr><td>Email</td><td>: '.$row['customer_email'] . '</td></tr>';
                echo '</table>';

                echo '<table border = "1">';
                echo '<tr><td>No</td><td>ISBN</td><td>Title</td><td>Price</td><td>Qty</td><td>Price X Qty</td></tr>';

                $orderid = $row['order_id'];
                $query_items = " SELECT oi.orderid AS order_id, oi.quantity AS qty, b.isbn AS isbn, b.title AS title, b.price AS price FROM order_items oi, books b WHERE oi.isbn = b.isbn AND oi.orderid = $orderid";
                $result_items = mysqli_query($con,$query_items);
                if (!$result_items){
                    die ("Could not query the database: <br />". mysqli_error($con));
                }

                $qty = 0;
                $pricexqty = 0;
                while ($row = mysqli_fetch_array($result_items)){
                    echo '<tr><td>'.$row['order_id'].'</td><td>'.$row['isbn'].'</td><td>'.$row['title'].'</td><td>'.$row['price'].'</td><td>'.$row['qty'].'</td><td>'.$row['price'].'</td></tr>';
                    $qty = $qty + $row['qty'];
                    $pricexqty = $pricexqty + $row['price'] * $row['qty'];
                }

                echo '<tr><td colspan="4">Total</td><td>'.$qty.'</td><td>'.$pricexqty.'</td>';
                echo '</table><br/>';
            }
            echo 'Total Rows = '.mysqli_num_rows($result).'<br />';
            mysqli_close($con);
        ?>
    </table>
</body>
</html>