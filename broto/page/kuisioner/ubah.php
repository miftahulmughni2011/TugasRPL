<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("select * from kuisioner where id_kuisioner='$kode'");
    $tampil = $sql->fetch_assoc();

 ?>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Ubah Kuisioner</div>
      <div class="card-body">
          <form method="POST">
            <label for="">ID Kuisioner</label>
              <div class="form-group">
                  <input class="form-control" value="<?php echo $tampil['id_kuisioner'];?>" type="text" name="idkuisioner">
              </div>

              <label for="">Saran</label>
                <div class="form-group">
                    <textarea class="form-control" name="saran"> </textarea>
                </div>

                <label for="">ID Pelanggan</label>
                  <div class="form-group">
                      <input class="form-control" value="<?php echo $tampil['id_pelanggan'];?>" type="text" name="idpelanggan">
                  </div>
                          <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
         </form>

<?php
if (isset($_POST["simpan"])){
$idkuisioner = $_POST['idkuisioner'];
$saran = $_POST['saran'];
$idpelanggan = $_POST['idpelanggan'];


$sql = $koneksi->query("update kuisioner set saran='$saran', id_pelanggan='$idpelanggan' where id_kuisioner='$kode')");

if ($sql) {
?>
<script type="text/javascript">
alert("Data Berhasil Dirubah");
window.location.href="?page=kuisioner";
</script>

<?php


}

}

?>
