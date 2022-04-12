<?php
    include('header.php');
?>
    <section id="hero" class="login" style="background-image: url(img/perpus.jpg);">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                	<div id="login">
                           	<form action="register.php" method="POST">
                                <div class="form-group">
                                	<label for="nama">Nama</label>
                                    <input type="text" class=" form-control"  placeholder="Nama" name="nama" id="nama">
                                </div>
                                <div class="form-group">
                                	<label for="nohp">No. Handphone</label>
                                    <input type="text" class=" form-control" placeholder="No. Handphone" name="nohp" id="nohp">
                                </div>
                                <div class="form-group">
                                	<label for="username">Username</label>
                                    <input type="text" class=" form-control" placeholder="Username" name="username" id="username" >
                                </div>
                                <div class="form-group">
                                	<label for="password">Password</label>
                                    <input type="password" class=" form-control" placeholder="Password" name="password" id="password">
                                </div>
                                <div id="pass-info" class="clearfix"></div>
                                <input type="submit" name="register" class="btn_full" value="Buat akun">
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$nama = $_POST['nama'];
	$nohp = $_POST['nohp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$register = $_POST['register'];

	$query = "INSERT INTO `member`(`nama`, `nohp`, `username`, `password`) VALUES ('$nama','$nohp','$username','$password')";

	if ($register) {
		if ($nama == '') {
			echo "<script>
			alert('Masukkan nama');
			</script>";
		} elseif ($nohp == '') {
			echo "<script>
			alert('Masukkan nohp');
			</script>";
		} elseif ($username == '') {
			echo "<script>
			alert('Masukkan username');
			</script>";
		} elseif ($password == '') {
			echo "<script>
			alert('Masukkan password');
			</script>";
		} else{
			mysqli_query($conn, $query);
			echo "<script>
				alert('Register berhasil, silahkan login');
				document.location = 'login.php';
			</script>";
		}
	}

	include('footer.php');
?>