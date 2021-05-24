<?php

include("koneksi.php");
    
  //jika tombol simpan diklik
   if(isset($_POST['bsimpan']))
   {
     //pengujian apakah data disimpan baru atau di edit
     if($_GET['hal']=="edit")
     {
       //data akan diedit
       $edit = mysqli_query($koneksi, "UPDATE merk set id_merk='$_POST[tid_merk]', 
       nama_merk='$_POST[tnama_merk]', model_jam='$_POST[tmodel_jam]'
       WHERE id_merk='$_GET[id]'");
 
       if($edit)
       {
         echo "<script>
         alert('Edit Data Sukses!');
         document.location='merk.php';
         </script>";
       }
       else
       {
         echo "<script>
         alert('Edit Data Gagal!');
         document.location='merk.php';
         </script>";
       }
 
     }
     else
     {
       //data akan disimpan baru    
       $simpan = mysqli_query($koneksi, "INSERT INTO merk (id_merk, nama_merk, model_jam)
       VALUES ('$_POST[tid_merk]', '$_POST[tnama_merk]', '$_POST[tmodel_jam]')");
 
       if($simpan)
       {
         echo "<script>
         alert('Simpan Data Sukses!');
         document.location='merk.php';
         </script>";
       }
       else
       {
         echo "<script>
         alert('Simpan Data Gagal!');
         document.location='merk.php';
         </script>";
       }
     }
   }
   //jika tombol edit/hapus diklik
   if(isset($_GET['hal']))
   {
     //jika data diedit
     if($_GET['hal']=="edit")
     {
       //tampilkan data yang akan diedit
       $tampil = mysqli_query($koneksi, "SELECT * FROM merk WHERE id_merk = '$_GET[id]'");
       $data = mysqli_fetch_array($tampil);
       if($data)
       {
         //jika data ditemukan, maka data ditampung ke dalam variabel
         $vid_merk= $data['id_merk'];
         $vnama_merk= $data['nama_merk'];
         $vmodel_jam= $data['model_jam'];
       }
     }
     else if($_GET['hal']=="hapus")
     {
       //persipahan hapus data
       $hapus = mysqli_query($koneksi, "DELETE FROM merk WHERE id_merk='$_GET[id]' ");
       if($hapus)
       {
         echo "<script>
         alert('Hapus Data Sukses!');
         document.location='merk.php';
         </script>";
       }
     }
   }
 
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
        <li class="nav-item active">
          <a class="nav-link active js-scroll-trigger" aria-current="page" href="merk.php">Merk</a>
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
        <li class="nav-item ">
          <a class="nav-link js-scroll-trigger" aria-current="page" href="pemasukan.php">Pemasukan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!--Akhir Nav bar untuk menu-->
<br><br><br>
  <h3 class="text-center">Data Merk</h3>
  
<!--Awal Card Form-->
<div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Form Input Data Merk
  </div>
  <div class="card-body">
    <form method = "post" action="">
    <div class="form-group">
        <label>ID Merk</label>
        <input type="text" name="tid_merk" value="<?=@$vid_merk?>" class="form-control" placeholder="Input ID Merk di sini!" required>
    </div>
    <div class="form-group">
        <label>Nama Merk</label>
        <input type="text" name="tnama_merk" value="<?=@$vnama_merk?>" class="form-control" placeholder="Input Nama Merk di sini!" required>
    </div> 
    <div class="form-group">   
        <label>Model Jam</label>
        <input type="text" name="tmodel_jam" value="<?=@$vmodel_jam?>" class="form-control" placeholder="Input Model Jam di sini!" required>
    </div>
    
    <button type ="submit" class="btn btn-success" name="bsimpan">Simpan</button>
    <button type ="reset" class="btn btn-danger" name="breset">Kosongkan</button>

    </form>
  </div>
</div>
<!--Akhir Card Form-->

<!--Awal Card Table-->
<div class="card mt-3">
  <div class="card-header bg-success text-white">
    Data Toko
  </div>
  <div class="card-body">
    <table class ="table table-bordered table-striped">
      <tr>
        <th>No.</th>
        <th>ID Merk</th>
        <th>Nama Merk</th>
        <th>Model Jam</th>
        <th>Aksi</th>
      </tr>
      <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM merk order by id_merk");
        while($data = mysqli_fetch_array($tampil)) :
      ?>
      <tr>
        <td><?=$no++;?></td>
        <td><?=$data['id_merk'];?></td>
        <td><?=$data['nama_merk'];?></td>
        <td><?=$data['model_jam'];?></td>
        <td>
          <a href="merk.php?hal=edit&id=<?=$data['id_merk']?>" class ="btn btn-warning">Edit</a>
          <a href="merk.php?hal=hapus&id=<?=$data['id_merk']?>" onclick="return confirm('Apakah yakin ingin menghapus data?')" 
          class ="btn btn-danger">Hapus</a>
        </td>
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
