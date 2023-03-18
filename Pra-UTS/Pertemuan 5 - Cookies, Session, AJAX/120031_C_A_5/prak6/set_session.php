<?php
    //File : set_session.php
    //Deskripsi : untuk mengeset session
    //Remember that session_start must come before any other line that generates output
    session_start();
    $_SESSION['username'] = 'adam';
    $_SESSION['level'] = 'admin';
    echo 'Session has been set<br />';
?>