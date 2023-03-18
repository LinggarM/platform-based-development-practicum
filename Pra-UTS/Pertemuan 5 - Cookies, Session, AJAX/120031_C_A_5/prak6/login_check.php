<?php 
	session_start();
	require_once('db_login.php');
	$con = mysqli_connect($db_host, $db_username, $db_password, $db_database);

	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = mysqli_query($con,"SELECT * FROM customers WHERE email='$username' AND password ='$password'");
	$cek = mysqli_num_rows($login);
	if($cek > 0){
		$data = mysqli_fetch_assoc($login);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location:view_books.php");
	} else {
		header("location:login.php?pesan=gagal");
	}
?>