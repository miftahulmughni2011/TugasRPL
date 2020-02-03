<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tambah Desa</div>
      <div class="card-body">
          <form method="POST">


              <label for="">Nama Desa</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="namadesa">
                </div>

                <label for="">ID Kecamatan</label>
                  <div class="form-group">
                      <input class="form-control" type="text" name="idkec">
                  </div>
                          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
         </form>

<?php
if (isset($_POST["simpan"])){
$namadesa = $_POST['namadesa'];
$idkec = $_POST['idkec'];


$sql = $koneksi->query("insert into desa values('$idesa','$namadesa','$idkec')");

if ($sql) {
?>
<script type="text/javascript">
alert("Data Berhasil Disimpan");
window.location.href="?page=desa";

<?php


}

}

?>
