<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tambah Bahan</div>
      <div class="card-body">
          <form method="POST">


              <label for="">ID Bahan</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="idbahan">
                </div>

                <label for="">ID Resep</label>
                    <div class="form">
                        <select class="form-control" name="idtransaksi">
                           <option value=""> - Pilih Resep -</option >
                           <?php
                               $menu1 = $koneksi->query("select * from resep");
                               while($data=$menu1->fetch_assoc())
                               {
                                 ?>
                                 <option value="<?php echo $data['id_resep'] ?>"><?php echo $data['nama_resep']; ?></option>
                                 <?php
                               }
                            ?>
                        </select>
                </div>

                  <label for="">Nama Bahan</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="namabahan">
                    </div>

                    <label for="">jumlah</label>
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


$sql = $koneksi->query("insert into bahan values('$idbahan','$idresep','$namabahan','$jumlah')");

if ($sql) {
?>
<script type="text/javascript">
alert("Data Berhasil Disimpan");
window.location.href="?page=bahan";
</script>

<?php


}

}

?>
