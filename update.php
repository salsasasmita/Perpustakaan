<?php
    include('header.php');
    $idmember = $_GET['idmember'];

    $member = "SELECT * FROM `member` WHERE idmember = '$idmember'";
	$hasil = mysqli_query($conn, $member);

	while ($data = mysqli_fetch_array($hasil)) {
?>
    <section id="hero" class="login" style="background-image: url(img/perpus.jpg);">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                	<div id="login">
                           	<form action="update.php?idmember=<?php echo $idmember;?>" method="POST">
                           		 <div class="form-group">
                                	<label for="idmember">ID Member</label>
                                    <input type="text" class=" form-control" value="<?php echo $data['idmember'];?>" name="idmember" id="idmember" disabled="disabled">
                                </div>
                                <div class="form-group">
                                	<label for="nama">Nama</label>
                                    <input type="text" class=" form-control" value="<?php echo $data['nama'];?>" name="nama" id="nama">
                                </div>
                                <div class="form-group">
                                	<label for="nohp">No. Handphone</label>
                                    <input type="text" class=" form-control" value="<?php echo $data['nohp'];?>" name="nohp" id="nohp">
                                </div>
                                <div class="form-group">
                                	<label for="username">Username</label>
                                    <input type="text" class=" form-control" value="<?php echo $data['username'];?>" name="username" id="username" >
                                </div>
                                <div class="form-group">
                                	<label for="password">Password</label>
                                    <input type="password" class=" form-control" value="<?php echo $data['password'];?>"name="password" id="password">
                                </div>
                                <div id="pass-info" class="clearfix"></div>
                                <input type="submit" name="ubah" class="btn_full" value="Ubah">
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
<?php
	}
	error_reporting(E_ALL ^ E_NOTICE);
	$idmember = $_GET['idmember'];
	$nama = $_POST['nama'];
	$nohp = $_POST['nohp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$ubah = $_POST['ubah'];

	$query = "UPDATE `member` SET `nama`='$nama',`nohp`='$nohp',`username`='$username',`password`='$password' WHERE idmember='$idmember'";

	if ($ubah) {
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
				alert('Data berhasil diubah');
				document.location = 'index.php';
			</script>";
		}
	}

	include('footer.php');
?>