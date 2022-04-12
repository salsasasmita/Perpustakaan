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
                                <div class="row">
                                    <div class="col col-md-3" style="padding-bottom: 10px;">
                                        <a href="tambahbuku.php">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>TAMBAH</button>
                                        </a>
                                    </div>
                                </div>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ISBN</th>
                                            <th>JUDUL BUKU</th>
                                            <th>PENGERANG</th>
                                            <th>JUMLAH</th>
                                            <th>KELUAR</th>
                                            <th>EDIT</th>
                                            <th>HAPUS</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                    	<?php
                                    		$query = "SELECT * FROM buku";
                                    		$hasil = mysqli_query($conn, $query);

                                    		while ($data = mysqli_fetch_array($hasil)) {
                                    			echo "
			                                        <tr>
			                                            <td>$data[isbn]</td>
			                                            <td>$data[judul]</td>
			                                            <td>$data[pengarang]</td>
                                                        <td>$data[jumlah]</td>
                                                        <td>$data[dipinjam]</td>
			                                            <td>
			                                            	<a href='updatebuku.php?isbn=$data[isbn]'>
			                                            		<button class='btn btn-primary'>
			                                            			<span class='fa fa-edit'></span>EDIT
			                                            		</button>
			                                            	</a>
			                                            </td>
			                                            <td>
			                                            	<a href='hapusbuku.php?isbn=$data[isbn]'>
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
