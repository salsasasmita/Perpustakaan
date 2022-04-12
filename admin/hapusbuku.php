<?php
	include('../koneksi.php');
	$isbn = $_GET['isbn'];
	$hapus = "DELETE FROM buku WHERE isbn='$isbn'";
	$data = mysqli_query($conn, $hapus);

	if ($data > 0) {
		echo "<script>
			alert('data berhasil dihapus');
			document.location.href='daftarbuku.php';
			</script>";
	} else{
		echo "<script>
			alert('data gagal dihapus');
			document.location.href='daftarbuku.php';
			</script>";
	}
?>