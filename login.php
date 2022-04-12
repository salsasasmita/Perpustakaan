<?php
    error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
    include('header.php');

    if (isset($_SESSION['username'])) {
        echo "<script>
            alert('Maaf anda sudah login');
            document.location = 'index.php';
        </script>";
    } else{

    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $_POST['login'];

    if ($login) {
        $sql = "SELECT * FROM `member` WHERE `username` = '$username' and `password`= '$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);

         if ($row['username'] != '') {
            $_SESSION['idmember'] = $row['idmember'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
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

<section id="hero" class="login" style="background: url(img/perpus1.jpg);" >
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                	<div id="login">
                            <form action="login.php" method="POST">                       
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class=" form-control" placeholder="Username" name="username" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class=" form-control" placeholder="Password" name="password" id="password">
                                </div>
                                <input type="submit" name="login" value="Log In" class="btn_full">
                                <a href="register.php " class="btn_full_outline">Register</a>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
<?php
	include('footer.php');
}
?>
