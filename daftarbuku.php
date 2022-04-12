<?php
    include('header.php');
?>

<!-- Slider -->
<section class="parallax-window" data-parallax="scroll" data-image-src="img/perpus.jpg" data-natural-width="1400" data-natural-height="470">
<div class="parallax-content-1">
    <div class="animated fadeInDown">
    <h1>DAFTAR BUKU</h1>
    </div>
</div>
</section>
<div class="container margin_60">
    <div class="cart-section">
        <form action="daftarbuku.php" method="POST">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="styled-select-filters">
                        <input type="text" name="keyword" class="form-control" placeholder="Keyword">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div >
                        <input type="submit" name="temukan" id="temukan" class="btn_1" value="Cari">
                    </div>
                </div>
            </div>
        </form>
        <div>&nbsp</div>
        <div>&nbsp</div>

        <div id="caribuku">
            <table class="table table-striped cart-list shopping-cart">
                <tr>
                    <th>No.</th>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Stok</th>
                </tr>
                    <?php
                        $no = 1;
                        $cari = "SELECT * FROM `buku` order by isbn";
                        $hasil = mysqli_query($conn, $cari);

                        if (isset($_POST["temukan"])) {
                        //memperbarui data hasil_cari berdasarkan keyword yang dimasukkan
                        $keyword = $_POST['keyword'];
                        $cari = "SELECT * FROM buku
                        WHERE
                        isbn LIKE '%$keyword%' or
                        judul LIKE '%$keyword%' or
                        pengarang LIKE '%$keyword%' or
                        jumlah LIKE '%$keyword%'";
                        $hasil = mysqli_query($conn, $cari);
                        }

                        while ($data = mysqli_fetch_array($hasil)){
                    ?>
                    <tr>
                        <td><strong><?php echo $no;?></strong></td>
                        <td><strong><?php echo $data['isbn'];?></strong></td>
                        <td><strong><?php echo $data['judul'];?></strong></td>
                        <td><strong><?php echo $data['pengarang'];?></strong></td>
                        <td><strong><?php echo $data['jumlah'];?></strong></td>
                    </tr>
                <?php
                    $no++;
                    }
                ?>
            </table>
        </div>
    </div>
</div><!-- End Container -->

<script src="script.js"></script>

<?php
    include('footer.php');
?>