<?php
	include('../koneksi.php');
	$idtransaksi = $_GET['idtransaksi'];

	$tglkmbl = "SELECT `tanggalkembali` FROM `transaksi` WHERE idtransaksi='$idtransaksi'";
	$hasil = mysqli_query($conn, $tglkmbl);
	$data = mysqli_fetch_array($hasil);

	$tglkmbl = $data['tanggalkembali'];
	$tglskg = date('Y-m-d');

	if (strtotime($tglkmbl) > strtotime($tglskg)) {
		$denda=0;
	} else {
		$tglskg = new DateTime();
		$tglkmbl=new DateTime($tglkmbl);
		$diff=$tglkmbl->diff($tglskg)->days;

		$denda=2500 * $diff;

	}

	$update = "UPDATE `transaksi` SET `status`='KEMBALI',`denda`='$denda' WHERE idtransaksi = '$idtransaksi'";
	$query = mysqli_query($conn, $update);

	$isbn = "SELECT `isbn` FROM `transaksi` WHERE idtransaksi='$idtransaksi'";
	$hasil = mysqli_query($conn, $isbn);
	$data = mysqli_fetch_array($hasil);

	$jumlahpinjam = "SELECT * FROM `buku` WHERE isbn = '$data[isbn]'";
    $hasil = mysqli_query($conn, $jumlahpinjam);
    $data = mysqli_fetch_array($hasil);
    $jumlah = $data['jumlah'] + 1;
    $dipinjam = $data['dipinjam'] - 1;
    $query = "UPDATE `buku` SET `jumlah`='$jumlah',`dipinjam`='$dipinjam' WHERE isbn='$data[isbn]'";
    $kembali = mysqli_query($conn, $query);

	$update = "UPDATE `transaksi` SET `status`='KEMBALI',`denda`='$denda' WHERE idtransaksi = '$idtransaksi'";
	$query = mysqli_query($conn, $update);

	header('Location: daftartransaksi.php');
?>