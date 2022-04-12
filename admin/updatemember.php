<?php
	include('header.php');
	$idmember = $_GET['idmember'];

	$member = "SELECT * FROM `member` WHERE idmember = '$idmember'";
	$hasil = mysqli_query($conn, $member);

	while ($data = mysqli_fetch_array($hasil)) {
?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Members</strong>
                            </div>
                            <div class="card-body">
                            	<form action="updatemember.php?idmember=<?php echo $idmember;?>" method="POST" class="form form-normal">
                            		<div class="form-group">
                            			<label class=" form-control-label" for="idmember">ID Member</label>
                            			<input type="text" name="idmember" class="form-control" id="idmember" disabled="disabled" value="<?php echo $data['idmember'];?>">
                            		</div>
                            		<div class="form-group">
                            			<label class=" form-control-label" for="nama">Nama</label>
                            			<input type="text" name="nama" class="form-control" id="nama"  value="<?php echo $data['nama'];?>">
                            		</div>
                                    <div class="form-group">
                                    	<label class="form-control-label" for="nohp">No Handphone</label>
                                    	<input type="text" name="nohp" class="form-control" id="nohp"  value="<?php echo $data['nohp'];?>">
                                    </div>
                                    <div class="form-group">
                                    	<label class="form-control-label" for="username">Username</label>
                                    	<input type="text" name="username" class="form-control" id="username"  value="<?php echo $data['username'];?>">
                                    </div>
                                    <div class="form-group">
                                    	<label class="form-control-label" for="password">Password</label>
                                    	<input type="password" name="password" class="form-control" id="password"  value="<?php echo $data['password'];?>">
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
	$idmember = $_GET['idmember'];
	$nama = $_POST['nama'];
	$nohp = $_POST['nohp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$edit = $_POST['edit'];

	$update = "UPDATE member SET nama='$nama', nohp='$nohp', username='$username', password='$password' WHERE idmember = '$idmember'";

	if ($edit) {
		if ($nama == '') {
			echo "Masukkan nama";
		}
		elseif ($nohp == '') {
			echo "Masukkan no handphone";
		}
		elseif ($username == '') {
			echo "Masukkan username";
		}
		elseif ($password == '') {
			echo "Masukkan password";
		} else{
			mysqli_query($conn, $update);
            echo "<script>
            alert('Data berhasil diubah');
            document.location = 'daftarmember.php';
            </script>";
		}
	}
?>

</body>
</html>
