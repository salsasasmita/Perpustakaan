<?php
	include('header.php');
?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tambah Buku</strong>
                            </div>
                            <div class="card-body">
                            	<form action="tambahtransaksi.php" method="POST" class="form form-normal">
                            		<div class="form-group">
                            			<label class=" form-control-label">ID Member</label>
                            			<select name="idmember" class="form-control">
                                            <?php
                                                $sql = "SELECT * FROM `member`";
                                                $retval = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($retval)) {
                                            ?>
                                                    <option value="<?php echo $row['idmember']?>"><?php echo $row['idmember']?> - <?php echo $row['nama']?>
                                                    </option>";
                                            <?php
                                                }
                                            ?>
                                        </select>
                            		</div>
                            		<div class="form-group">
                            			<label class=" form-control-label">ISBN</label>
                            			<select name="isbn" class="form-control">
                                            <?php
                                                $sql = "SELECT * FROM `buku`";
                                                $retval = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($retval)) {
                                            ?>
                                                <option value="<?php echo $row['isbn'];?>"><?php echo $row['isbn']; ?> - <?php echo $row['judul']; ?>
                                                </option>";
                                            <?php
                                                }
                                            ?>
                                        </select>
                            		</div>
                                    <div class="form-group">
                                    	<input type="submit" name="tambah" class="btn btn-primary btn-md" value="Tambah">
                                    </div>
                            	</form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
   </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$idmember = $_POST['idmember'];
	$isbn = $_POST['isbn'];
	$tambah = $_POST['tambah'];

    $datesekarang = date("Y-m-d");
    $datekembali = date("Y-m-d", strtotime("+14 day"));    

    $jumlahpinjam = "SELECT * FROM `buku` WHERE isbn = '$isbn'";
    $hasil = mysqli_query($conn, $jumlahpinjam);
    $data = mysqli_fetch_array($hasil);
    $jumlah = $data['jumlah'] - 1;
    $dipinjam = $data['dipinjam'] + 1;

    $query = "UPDATE `buku` SET `jumlah`='$jumlah',`dipinjam`='$dipinjam' WHERE isbn='$isbn'";

    $add = "INSERT INTO `transaksi`(`idmember`, `isbn`, `tanggalpinjam`, `tanggalkembali`) VALUES ('$idmember','$isbn','$datesekarang','$datekembali')";

	if ($tambah) {
		if ($idmember == '') {
			echo "Masukkan ISBN";
		}
		elseif ($isbn == '') {
			echo "Masukkan judul";
		}
		else{
            if ($data['jumlah'] == 0 ) {
                echo "<script>
                alert('Maaf Stok Buku Kosong');
                document.location = 'daftartransaksi.php';
                </script>";
            } else{
                mysqli_query($conn, $add);
                mysqli_query($conn, $query);
                echo "<script>
                alert('Transaksi berhasil ditambahkan');
                document.location = 'daftartransaksi.php';
                </script>";
            }
		}
	}
?>
</body>
</html>