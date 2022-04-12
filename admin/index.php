<?php
    include('header.php');
?>
        <div class="content mt-3">
            <a href="daftarmember.php">
            <div class="col-sm-12 col-lg-4">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">
                            <?php
                                $query = "SELECT COUNT(*) as jumlah FROM member";
                                $hasil = mysqli_query($conn, $query);

                                $data = mysqli_fetch_array($hasil);
                                echo $data['jumlah'];
                            ?>
                            </span>
                        </h4>
                        <p class="text-light">Members</p>
                        <div style="height:70px;" height="70"></div>
                    </div>

                </div>
            </div>
            </a>
            <!--/.col-->

            <a href="daftarbuku.php">
            <div class="col-sm-12 col-lg-4">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                         <div class="dropdown float-right">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">
                            <?php
                                $query = "SELECT COUNT(*) as jumlah FROM buku";
                                $hasil = mysqli_query($conn, $query);

                                $data = mysqli_fetch_array($hasil);
                                echo $data['jumlah'];
                            ?>
                            </span>
                        </h4>
                        <p class="text-light">BOOKS</p>
                        <div style="height:70px;" height="70"></div>
                    </div>
                </div>
            </div>
            </a>
            <!--/.col-->

            <a href="daftartransaksi.php">
            <div class="col-sm-12 col-lg-4">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">

                        </div>
                        <h4 class="mb-0">
                            <span class="count">
                                <?php
                                $query = "SELECT COUNT(*) as jumlah FROM transaksi";
                                $hasil = mysqli_query($conn, $query);

                                $data = mysqli_fetch_array($hasil);
                                echo $data['jumlah'];
                                ?>
                            </span>
                        </h4>
                        <p class="text-light">TRANSACTION</p>
                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">                        
                    </div>
                </div>
            </div>
            </a>
            <!--/.col-->

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-content dib">
                                <div class="stat-text">BORROWED</div>
                                <div class="stat-digit">
                                    <?php
                                    $query = "SELECT dipinjam FROM buku";
                                    $hasil = mysqli_query($conn, $query);
                                    $dipinjam = 0;
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        $dipinjam = $dipinjam + $data['dipinjam'];
                                    }
                                    echo $dipinjam;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
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