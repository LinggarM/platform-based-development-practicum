<?php
    //File : get_session.php
    //Deskripsi : untuk mengkases nilai session
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['level'])){
        echo 'Username : '.$_SESSION['username'].'<br />';
        echo 'Level : '.$_SESSION['level'].'<br />';
    } else {
        echo 'Session has not been set.<br />';
    }
?>