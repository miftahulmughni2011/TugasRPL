<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("delete from kuisioner where id_kuisioner='$kode'");

    if($sql) {
      ?>

      <script type="text/javascript">
      alert("Data Berhasil Dihapus");
      window.location.href="?page=kuisioner";
      </script>
  <?php
    }
 ?>
