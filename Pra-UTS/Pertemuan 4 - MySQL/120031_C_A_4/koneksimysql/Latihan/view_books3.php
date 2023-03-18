<!-- File: view_books.php
Deskripsi : menampilkan data buku menggunakan mysqli dengan pendekatan prosedural
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
        <tr>
            <th>ISBN</th>
            <th>Author</th>
            <th>Title</th>
            <th>Price</th>
        </tr>
        <?php
            // Include our login information
            require_once('db_login.php');

            // Connect
            $con = new mysqli($db_host, $db_username, $db_password, $db_database);
            if (mysqli_connect_errno()){
                die ("Could not connect to the database: <br />". mysqli_connect_error( ));
            }

            //Asign a query
            $query = " SELECT * FROM books ";

            // Execute the query
            $result = $con->query($query);
            if (!$result){
                die ("Could not query the database: <br />". mysqli_error($con));
            }
            // Fetch and display the results
            while ($row = $result->fetch_object()){
                echo '<tr>';
                echo '<td>'.$row->isbn.'</td>';
                echo '<td>'.$row->author.'</td> ';
                echo '<td>'.$row->title.'</td> ';
                echo '<td>'.$row->price.'</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '<br />';
            echo 'Total Rows = '.$result->num_rows.'<br />';
            $con->close();
        ?>
    </table>
</body>
</html>