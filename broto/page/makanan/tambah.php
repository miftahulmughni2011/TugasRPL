<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tambah Makanan</div>
      <div class="card-body">
          <form method="POST">


              <label for="">ID Menu</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="id_menu">
                </div>

              <label for="">ID Resep</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="id_resep">
                </div>

                  <label for="">ID Kategori</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="id_kategori">
                    </div>

                    <label for="">Nama Menu</label>
                      <div class="form-group">
                          <input class="form-control" type="text" name="nama_menu">
                      </div>

                      <label for="">Harga</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="harga">
                        </div>



                          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
         </form>

<?php
if (isset($_POST["simpan"])){
$idmenu = $_POST['id_menu'];
$idresep = $_POST['id_resep'];
$idkategori = $_POST['id_kategori'];
$namamenu = $_POST['nama_menu'];
$harga = $_POST['harga'];


$sql = $koneksi->query("insert into menu values('$idmenu','$idresep','$idkategori','$namamenu','$harga')");

if ($sql) {
?>
<script type="text/javascript">
alert("Data Berhasil Disimpan");
window.location.href="?page=makanan";
</script>

<?php


}

}

?>
