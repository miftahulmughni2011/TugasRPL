<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("select * from bahan where id_bahan='$kode'");
    $tampil = $sql->fetch_assoc();

 ?>

 <body class="bg-dark">
   <div class="container">
     <div class="card card-register mx-auto mt-5">
       <div class="card-header">Ubah Bahan</div>
       <div class="card-body">
           <form method="POST">
             <label for="">ID Bahan</label>
               <div class="form-group">
                   <input class="form-control" value="<?php echo $tampil['id_bahan'];?>" type="text" name="idbahan">
               </div>

               <label for="">ID Resep</label>
                 <div class="form-group">
                     <input class="form-control" type="text" name="idresep">
                 </div>
                 <label for="">Nama Bahan</label>
                   <div class="form-group">
                       <input class="form-control" type="text" name="namabahan">
                   </div>

                   <label for="">Jumlah</label>
                     <div class="form-group">
                         <input class="form-control" type="text" name="jumlah">
                     </div>
                           <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
          </form>

 <?php
 if (isset($_POST["simpan"])){
 $idbahan = $_POST['idbahan'];
 $idresep = $_POST['idresep'];
 $namabahan = $_POST['namabahan'];
 $jumlah = $_POST['jumlah'];

 $sql = $koneksi->query("update bahan set id_resep='$idresep',nama_bahan='$namabahan',jumlah='$jumlah' where id_bahan='$kode'");

 if ($sql) {
 ?>
 <script type="text/javascript">
 alert("Data Berhasil Diubah");
 window.location.href="?page=bahan";
 </script>

 <?php


 }

 }

 ?>
