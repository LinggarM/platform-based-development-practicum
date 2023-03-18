<?php
    //File : destroy_cookie.php
    //Deskripsi : untuk menghapus cookie
    //Remember that setcookie must come before any other line that generates output
    setcookie("username","", time( )-10 );
    echo "Cookie has been destroyed.";
?>