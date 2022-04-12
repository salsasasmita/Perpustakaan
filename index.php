<?php
	include('header.php');
?>


<!-- Slider -->
<section class="parallax-window" data-parallax="scroll" data-image-src="img/perpus.jpg" data-natural-width="1400" data-natural-height="470">
<div class="parallax-content-1">
    <div class="animated fadeInDown">
    <h1>PERPUSTAKAAN</h1>
    </div>
</div>
</section>
<div class="container margin_60">
    
        <div class="main_title">
            <h2><span>Top</span> Books</h2>
        </div>
        
        <div class="row">
        <?php
        	$query = "SELECT * FROM buku order by isbn limit 6";
        	$hasil = mysqli_query($conn, $query);

        	while($data = mysqli_fetch_array($hasil)){
        		$stok = $data['jumlah'];

        ?>
            <div class="col-md-6 col-sm-6" data-wow-delay="0.1s">
                <div class="tour_container">
                    <div class="tour_title">
                    	<div class="container">
	                    	<div class="row">
		                        <h3><strong><?php echo $data['judul'];?></strong></h3>
		                    </div>
		                    <div class="row">
		                        <?php echo $data['pengarang'];?>
		                    </div>
		                    <div class="row">
		                    	Stok: <?php echo $stok; ?>
		                    </div><!-- End wish list-->
	                    </div>
                    </div>
                    </div>
            </div><!-- End col-md-4 -->
            <?php
            	}
            ?>
        </div><!-- End row -->
        <p class="text-center add_bottom_30">
            <a href="daftarbuku.php" class="btn_1 medium"><i class="icon-eye-7"></i>Lihat Daftar Buku</a>
        </p>
    </div><!-- End container -->


<?php
	include('footer.php');
?>