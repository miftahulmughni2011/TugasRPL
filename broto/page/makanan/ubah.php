<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("select * from menu where id_menu='$kode'");
    $tampil = $sql->fetch_assoc();

 ?>

 <body class="bg-dark">
   <div class="container">
     <div class="card card-register mx-auto mt-5">
       <div class="card-header">Ubah Makanan</div>
       <div class="card-body">
           <form method="POST">
             <label for="">ID Menu</label>
               <div class="form-group">
                   <input class="form-control" value="<?php echo $tampil['id_menu'];?>" type="text" name="idmenu">
               </div>

               <label for="">ID Resep</label>
                 <div class="form-group">
                     <input class="form-control" type="text" name="idresep">
                 </div>

                 <label for="">ID Kategori</label>
                   <div class="form-group">
                       <input class="form-control" type="text" name="idkategori">
                   </div>

                 <label for="">Nama Menu</label>
                   <div class="form-group">
                       <input class="form-control" type="text" name="namamenu">
                   </div>

                   <label for="">Harga</label>
                     <div class="form-group">
                         <input class="form-control" type="text" name="harga">
                     </div>

                           <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
          </form>

 <?php
 if (isset($_POST["simpan"])){
 $idmenu=$_POST['idmenu'];
 $idresep = $_POST['idresep'];
 $idkategori = $_POST['idkategori'];
 $namamenu = $_POST['namamenu'];
 $harga = $_POST['harga'];

 $sql = $koneksi->query("update menu set id_resep='$idresep',id_kategori='$idkategori',nama_menu='$namamenu',harga='$harga' where id_menu='$kode'");

 if ($sql) {
 ?>
 <script type="text/javascript">
 alert("Data Berhasil Diubah");
 window.location.href="?page=makanan";
 </script>

 <?php


 }

 }

 ?>
