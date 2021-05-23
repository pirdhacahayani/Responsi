<?php
include("koneksi.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>DATA TOKO</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">   
</head>
<body id="page-top">
<div class="container">
  <!--Nav bar untuk menu-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="mainNav">
  <div class="container-fluid">
    <a class="navbar-brand" href="page-top">Toko Jam Tangan Pirdha</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" aria-current="page" href="merk.php">Merk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="jam.php">Jam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="detail_bayar.php">Detail Bayar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="header_bayar.php">Header Bayar</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active js-scroll-trigger" aria-current="page" href="pemasukan.php">Pemasukan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!--Akhir Nav bar untuk menu-->
<br><br><br>
  <h3 class="text-center">Data Penjualan Harian Toko Jam</h3> 

<!--Awal Card Table-->
<div class="card mt-3">
  <div class="card-header bg-success text-white">
    Data Penjualan di Toko
  </div>
  <div class="card-body">
    <table class ="table table-bordered table-striped">
      <tr>
        <th>Nomor Nota</th>
        <th>Tanggal</th>
        <th>Nama Merk</th>
        <th>Model Jam</th>
        <th>Ukuran</th>
        <th>Warna</th>
        <th>Harga</th>
        <th>Jumlah Beli</th>
        <th>Hitung Total</th>
        <th>Sisa Pembayaran</th>
    
      </tr>
      <?php
        $tampil = mysqli_query($koneksi, "SELECT * FROM header_bayar JOIN detail_bayar ON header_bayar.id_detail = 
        detail_bayar.id_detail JOIN jam ON detail_bayar.id_jam = jam.id_jam JOIN merk ON jam.id_merk = merk.id_merk");
        while($data = mysqli_fetch_array($tampil)) :
      ?>
      <tr>
        <td><?=$data['no_nota'];?></td>
        <td><?=$data['tanggal'];?></td>
        <td><?=$data['nama_merk'];?></td>
        <td><?=$data['model_jam'];?></td>
        <td><?=$data['ukuran'];?></td>
        <td><?=$data['warna'];?></td>
        <td><?=$data['harga'];?></td>
        <td><?=$data['jumlah_beli'];?></td>
        <td><?=$data['total_pembelian'];?></td>
        <td><?=$data['sisa_bayar'];?></td>
    
      </tr>

      <?php endwhile; //penutup perulangan while ?>

    </table>

  </div>
</div>
<!--Akhir Card Table-->

</div>


<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>