<?php 
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost", "root", "", "perpus");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>