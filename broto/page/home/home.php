<?php
$koneksi = new mysqli("localhost","root","","broto");
?>

<h2 align="center"> SELAMAT DATANG DI HALAMAN UTAMA MR.BROTO
<img src="LOGO.png" align="center"> </h2>
<h3 align="center"> Menu Yang tersedia </h3> <br>
<div class="row">

  <p>
    <?php
    $sql = $koneksi->query("SELECT * FROM menu");
    while($data = $sql->fetch_assoc()){	?>
      <div class="col-md-3">
        <div class="thumb">

        </div>
        <div class="">
          <img class="img-fluid" src="foto/<?php echo $data['foto'] ?>" alt="">
          <h3><?php echo $data['nama_menu'] ?><br></h3>
          <p>Harga : <?php echo $data['harga'] ?>  </p>
      </div>


    </div>

<?php } ?>

</div>
