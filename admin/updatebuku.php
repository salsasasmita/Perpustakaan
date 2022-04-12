<?php
	include('header.php');
	$isbn = $_GET['isbn'];

	$buku = "SELECT * FROM `buku` WHERE isbn = '$isbn'";
	$hasil = mysqli_query($conn, $buku);

	while ($data = mysqli_fetch_array($hasil)) {
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
                            	<form action="updatebuku.php?isbn=<?php echo $isbn;?>" method="POST" class="form form-normal">
                            		<div class="form-group">
                            			<label class=" form-control-label" for="isbn">ISBN</label>
                            			<input type="text" name="isbn" class="form-control" id="isbn" disabled="disabled" value="<?php echo $data['isbn'];?>">
                            		</div>
                            		<div class="form-group">
                            			<label class=" form-control-label" for="judul">Judul</label>
                            			<input type="text" name="judul" class="form-control" id="judul"  value="<?php echo $data['judul'];?>">
                            		</div>
                                    <div class="form-group">
                                    	<label class="form-control-label" for="pengarang">Pengarang</label>
                                    	<input type="text" name="pengarang" class="form-control" id="pengarang"  value="<?php echo $data['pengarang'];?>">
                                    </div>
                                    <div class="form-group">
                                    	<label class="form-control-label" for="jumlah">Jumlah</label>
                                    	<input type="text" name="jumlah" class="form-control" id="jumlah"  value="<?php echo $data['jumlah'];?>">
                                    </div>
                                    <div class="form-group">
                                    	<input type="submit" name="edit" class="btn btn-primary btn-md" value="Edit">
                                    </div>
                            	</form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
   </div><!-- /#right-panel -->

	<?php
			}
   	?>

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
	$isbn = $_GET['isbn'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$jumlah = $_POST['jumlah'];
	$edit = $_POST['edit'];

	$update = "UPDATE `buku` SET `judul`='$judul',`pengarang`='$pengarang',`jumlah`='$jumlah'WHERE isbn='$isbn'";

	if ($edit) {
		if ($judul == '') {
			echo "Masukkan judul";
		}
		elseif ($pengarang == '') {
			echo "Masukkan no handphone";
		}
		elseif ($jumlah == '') {
			echo "Masukkan jumlah";
		}
		else{
			mysqli_query($conn, $update);
            echo "<script>
            alert('Data berhasil diubah');
            document.location = 'daftarbuku.php';
            </script>";
		}
	}
?>

</body>
</html>
