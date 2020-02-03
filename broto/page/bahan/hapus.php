<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("delete from login where id_admin='$kode'");

    if($sql) {
      ?>

      <script type="text/javascript">
      alert("Data Berhasil Dihapus");
      window.location.href="?page=login";
      </script>
  <?php
    }
 ?>
