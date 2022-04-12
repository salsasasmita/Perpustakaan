<?php
	include('../koneksi.php');
	$idmember = $_GET['idmember'];
	$hapus = "DELETE FROM member WHERE idmember='$idmember'";
	$data = mysqli_query($conn, $hapus);

	if ($data > 0) {
		echo "<script>
			alert('data berhasil dihapus');
			document.location.href='daftarmember.php';
			</script>";
	} else{
		echo "<script>
			alert('data gagal dihapus');
			document.location.href='daftarmember.php';
			</script>";
	}
?>