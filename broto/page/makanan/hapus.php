<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("delete from menu where id_menu='$kode'");

    if($sql) {
      ?>

      <script type="text/javascript">
      alert("Data Berhasil Dihapus");
      window.location.href="?page=makanan";
      </script>
  <?php
    }
 ?>
