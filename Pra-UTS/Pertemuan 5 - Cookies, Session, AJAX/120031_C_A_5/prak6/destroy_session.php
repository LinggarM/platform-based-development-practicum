<?php
    //File : destroy_session.php
    //Deskripsi : untuk menghapus session
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    session_destroy();
    echo "sessions has been destroyed.";
?>