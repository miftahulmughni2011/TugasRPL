<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tambah Kuisioner</div>
      <div class="card-body">
          <form method="POST">


              <label for="">ID Kuisioner</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="idkuisioner" readonly value="">
                </div>

                <label for="">Saran</label>
                  <div class="form-group">
                      <textarea class="form-control" name="saran"> </textarea>
                  </div>

                  <label for="">Pilih Pelanggan</label>
                    <div class="col-md-3">
                      <select class="form-control" name="idpelanggan">
                        <option value=""> - Pilih Pelanggan -</option >
                         <?php
                             $pelanggan = $koneksi->query("select * from pelanggan");
                             while($data=$pelanggan->fetch_assoc())
                             {
                               ?>
                               <option value="<?php echo $data['id_pelanggan']?>"><?php echo $data['nama']; ?></option>
                               <?php
                             }
                          ?>
                      </select>
                    </div>
                    <br>
                          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
         </form>

<?php
if (isset($_POST["simpan"])){
$idkuisioner = $_POST['idkuisioner'];
$saran = $_POST['saran'];
$idpelanggan = $_POST['idpelanggan'];


$sql = $koneksi->query("insert into kuisioner values('$idkuisioner','$saran','$idpelanggan')");

if ($sql) {
?>
<script type="text/javascript">
alert("Data Berhasil Disimpan");
window.location.href="?page=kuisioner";
</script>

<?php


}

}

?>
