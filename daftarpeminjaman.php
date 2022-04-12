<?php
	include('header.php');
?>

<!-- Slider -->
<section class="parallax-window" data-parallax="scroll" data-image-src="img/perpus.jpg" data-natural-width="1400" data-natural-height="470">
<div class="parallax-content-1">
    <div class="animated fadeInDown">
    <h1>DAFTAR PEMINJAMAN</h1>
    </div>
</div>
</section>
<div class="container margin_60">
	<div class="cart-section">
		<table class="table table-striped cart-list shopping-cart">
		<thead>
		<tr>
			<th>
				 ID Transaksi
			</th>
			<th>
				 ISBN
			</th>
			<th>
				 Tanggal Pinjam
			</th>
			<th>
				 Tanggal Kembali
			</th>
			<th>
				 Status
			</th>
			<th>
				 Denda
			</th>
		</tr>
		</thead>
		<tbody>
			<?php
				$idmember = $_SESSION['idmember'];

				$cari = "SELECT * FROM `transaksi` WHERE `idmember` = '$idmember'";
				$hasil = mysqli_query($conn, $cari);

				while ($data = mysqli_fetch_array($hasil)){
					$isbn = $data['isbn'];
			?>
		<tr>
			<td>
				<strong>
					<?php
						echo $data['idtransaksi'];
					?>
				</strong>
			</td>
			<td>
				<strong>
					<?php
						$query = "SELECT * FROM `buku` WHERE `isbn` = '$isbn'";
						$hayo = mysqli_query($conn, $query);
						$data2 = mysqli_fetch_array($hayo);
						echo $data2['judul'];
					?>
				</strong>
			</td>
			<td>
				<strong>
					<?php
						echo $data['tanggalpinjam'];
					?>
				</strong>
			</td>
			<td>
				<strong>
					<div style="color: red;"><?php echo $data['tanggalkembali']; ?></div>
				</strong>
			</td>
			<td>
				<strong>
					<?php
						if ($data['status'] != 'KEMBALI') {
					?>
						<div style="color: red;"><?php echo $data['status']; ?></div>
					<?php
					} else{
					?>
						<div style="color: green;"><?php echo $data['status']; ?></div>
					<?php
					}
					?>
				</strong>
			</td>
			<td>
				<strong>
					<?php
						echo "Rp".$data['denda'];
					?>
				</strong>
			</td>
		</tr>
		<?php
			}
		?>
		</tbody>
		</table>
	</div>
</div><!-- End Container -->



<?php
	include('footer.php');
?>