<?php
    session_start();
    error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
    include('../koneksi.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $signin = $_POST['signin'];

    if ($signin) {
        $sql = "SELECT * FROM `user` WHERE `username` = '$username' and `password`= '$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);

        if ($row['username'] != '') {
            $_SESSION['idmember'] = $row['idmember'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['status'] = $row['status'];
            echo "<script>
            document.location = 'index.php';
            </script>";
        } else{
            echo "<script>
            alert('Maaf anda gagal login');
            document.location = 'login.php';
            </script>";
        }
    }
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content" style="margin-top: 180px;">
                <div class="login-form">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="username" style="color: black;">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: black;">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                            <input type="submit" name="signin" value="Sign In" class="btn btn-success btn-flat m-b-30 m-t-30">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>