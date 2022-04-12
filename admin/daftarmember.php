<?php
	include('header.php');
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
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID MEMBER</th>
                                            <th>NAMA</th>
                                            <th>NO HP</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th>EDIT</th>
                                            <th>HAPUS</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                    	<?php
                                    		$query = "SELECT * FROM member";
                                    		$hasil = mysqli_query($conn, $query);

                                    		while ($data = mysqli_fetch_array($hasil)) {
                                                $pw = md5($data['password']);
                                    			echo "
			                                        <tr>
			                                            <td>$data[idmember]</td>
			                                            <td>$data[nama]</td>
			                                            <td>$data[nohp]</td>
                                                        <td>$data[username]</td>
                                                        <td>$pw</td>
			                                            <td>
			                                            	<a href='updatemember.php?idmember=$data[idmember]'>
			                                            		<button class='btn btn-primary'>
			                                            			<span class='fa fa-edit'></span>EDIT
			                                            		</button>
			                                            	</a>
			                                            </td>
			                                            <td>
			                                            	<a href='hapusmember.php?idmember=$data[idmember]'>
			                                            		<button class='btn btn-danger'>
			                                            			<span class='fa fa-trash-o'></span>HAPUS
			                                            		</button>
			                                            	</a>
			                                            </td>
			                                        </tr>
			                                        ";
                                        	}
                                        ?>
                                    </tbody>
                                </table>
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

</body>

</html>
