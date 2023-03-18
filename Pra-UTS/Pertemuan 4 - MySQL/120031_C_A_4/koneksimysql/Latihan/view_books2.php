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
        <?php
            // Include our login information
            require_once('db_login.php');

            // Connect
            $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
            if (mysqli_connect_errno()){
                die ("Could not connect to the database: <br />". mysqli_connect_error( ));
            }

            //Asign a query
            $query = " SELECT b.isbn AS book_isbn, b.author AS book_author, b.title AS book_title FROM books b ";

            // Execute the query
            $result = mysqli_query($con,$query);
            if (!$result){
                die ("Could not query the database: <br />". mysqli_error($con));
            }
            // Fetch and display the results
            while ($row = mysqli_fetch_array($result)){
                echo 'ISBN: '.$row['book_isbn'] . '<br />';
                echo 'Author: '.$row['book_author'] . '<br /> ';
                echo 'Title: '.$row['book_title'] . '<br /><br /> ';
                }
            echo 'Total Rows = '.mysqli_num_rows($result).'<br />';
            mysqli_close($con);
        ?>
    </table>
</body>
</html>