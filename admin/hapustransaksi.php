<?php
	include('../koneksi.php');
	$idtransaksi = $_GET['idtransaksi'];

	$isbn = "SELECT `isbn`, `status` FROM `transaksi` WHERE idtransaksi='$idtransaksi'";
	$hasil = mysqli_query($conn, $isbn);
	$data = mysqli_fetch_array($hasil);
	$status = $data['status'];

	if ($status != 'KEMBALI') {
		$jumlahpinjam = "SELECT * FROM `buku` WHERE isbn = '$data[isbn]'";
	    $hasil = mysqli_query($conn, $jumlahpinjam);
	    $data = mysqli_fetch_array($hasil);
	    $jumlah = $data['jumlah'] + 1;
	    $dipinjam = $data['dipinjam'] - 1;
	    $query = "UPDATE `buku` SET `jumlah`='$jumlah',`dipinjam`='$dipinjam' WHERE isbn='$data[isbn]'";
	    $kembali = mysqli_query($conn, $query);

		$hapus = "DELETE FROM transaksi WHERE idtransaksi='$idtransaksi'";
		$data = mysqli_query($conn, $hapus);

		if ($data > 0) {
			echo "<script>
				alert('data berhasil dihapus');
				document.location.href='daftartransaksi.php';
				</script>";
		} else{
			echo "<script>
				alert('data gagal dihapus');
				document.location.href='daftartransaksi.php';
				</script>";
		}
	} else{
		$hapus = "DELETE FROM transaksi WHERE idtransaksi='$idtransaksi'";
		$data = mysqli_query($conn, $hapus);

		if ($data > 0) {
			echo "<script>
				alert('data berhasil dihapus');
				document.location.href='daftartransaksi.php';
				</script>";
		} else{
			echo "<script>
				alert('data gagal dihapus');
				document.location.href='daftartransaksi.php';
				</script>";
		}
	}
?>