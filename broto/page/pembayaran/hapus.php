<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("delete from pesanan where id_transaksi='$kode'");

    if($sql) {
      ?>

      <script type="text/javascript">
      alert("Data Berhasil Dihapus");
      window.location.href="?page=pembayaran";
      </script>
  <?php
    }
 ?>
