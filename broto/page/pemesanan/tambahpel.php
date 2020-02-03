<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tambah Pelanggan</div>
      <div class="card-body">
          <form method="POST">


              <label for="">ID Pelanggan</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="id_pelanggan">
                </div>

              <label for="">Nama</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="nama">
                </div>

                  <label for="">No Telepon</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="no_telp">
                    </div>


                          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
         </form>

<?php
if (isset($_POST["simpan"])){
$idpelanggan = $_POST['id_pelanggan'];
$nama = $_POST['nama'];
$notelp = $_POST['no_telp'];


$sql = $koneksi->query("insert into pelanggan values('$idpelanggan','$nama','$notelp')");

if ($sql) {
?>
<script type="text/javascript">
alert("Data Berhasil Disimpan");
window.location.href="?page=pemesanan";
</script>

<?php


}

}

?>
