<?php
	include('header.php');
?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Buku</strong>
                            </div>
                            <div class="card-body">
                            	<form action="tambahbuku.php" method="POST" class="form form-normal">
                            		<div class="form-group">
                            			<label class=" form-control-label" for="isbn">ISBN</label>
                            			<input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN">
                            		</div>
                            		<div class="form-group">
                            			<label class=" form-control-label" for="judul">Judul Buku</label>
                            			<input type="text" name="judul" class="form-control" id="judul" placeholder="Judul">
                            		</div>
                            		<div class="form-group">
                            			<label class=" form-control-label" for="pengarang">Pengarang</label>
                            			<input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Pengarang">
                            		</div>
                            		<div class="form-group">
                            			<label class=" form-control-label" for="jumlah">Jumlah</label>
                            			<input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah">
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
	$isbn = $_POST['isbn'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$jumlah = $_POST['jumlah'];
	$tambah = $_POST['tambah'];

	$add = "INSERT INTO `buku`(`isbn`, `judul`, `pengarang`, `jumlah`) VALUES ('$isbn','$judul','$pengarang','$jumlah')";

	if ($tambah) {
		if ($isbn == '') {
			echo "Masukkan ISBN";
		}
		elseif ($judul == '') {
			echo "Masukkan judul";
		}
		elseif ($pengarang == '') {
			echo "Masukkan pengarang";
		}
		elseif ($jumlah == '') {
			echo "Masukkan jumlah";
		} else{
			mysqli_query($conn, $add);
            echo "<script>
            alert('Data berhasil ditambahkan');
            document.location = 'daftarbuku.php';
            </script>";
		}
	}
?>
</body>
</html>