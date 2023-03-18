<!--
File : latihan.php
Deskripsi : menampilkan data customer
-->
<!DOCTYPE HTML>
<html>
    <head>
        <script>
            function getXMLHTTPRequest() {
                var req = false;
                try {
                    /* for Firefox */
                    req = new XMLHttpRequest();
                } catch (err) {
                    try {
                        /* for some versions of IE */
                        req = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (err) {
                        try {
                            /* for some other versions of IE */
                            req = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (err) {
                            req = false;
                        }
                    }
                }
                return req;
            }
            function get_customers(sel){
                var xmlhttp = getXMLHTTPRequest();
                //get input value
                var id = sel.value;
                //set url and inner
                var url = "latihan_get.php?id=" + id;
                var inner = "user_input";
                //open request
                xmlhttp.open('GET', url, true);
                xmlhttp.onreadystatechange = function() {
                    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                        document.getElementById(inner).innerHTML = xmlhttp.responseText;
                    }
                    return false;
                }
                xmlhttp.send(null);
            }
        </script>
    </head>
<body>
    <h2>Customers Data</h2>
    <select name="customers" id="customers" onchange="get_customers(this);">
    <?php
    // Include our login information
    require_once('db_login.php');

    // Connect
    $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }

    //Asign a query
    $query = " SELECT * FROM customers ";

    // Execute the query
    $result = mysqli_query($con,$query);
    if (!$result){
        die ("Could not query the database: <br />". mysqli_error($con));
    }
    // Fetch and display the results
    while ($row = mysqli_fetch_array($result)){
        echo '<option value="'.$row['customerid'].'">'.$row['name'].'</option>';
    }
    ?>
    </select>
    <div id="user_input"></div>
</body>
</html>