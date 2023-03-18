<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">
        .login-form {
            width: 340px;
            margin: 50px auto;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-form">
    <form name="formlogin" method="post" action="login_check.php">
        <?php 
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan']=="gagal") {
                    echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Username dan Password tidak sesuai !</div>";
                } else if ($_GET['pesan']=="blmlogin") {
                    echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Kalo pengin liat buku Login dulu !</div>";
                }
            }
	    ?>
        <h2 class="text-center">Halaman Login</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary btn-block">Log in</button>
        </div>      
    </form>
    </div>
</body>
</html>