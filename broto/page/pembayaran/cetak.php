<?php

    $kode = $_GET['id'];
    $koneksi = new mysqli("localhost","root","","broto");
    $sql = $koneksi->query("select * from pesanan where id_transaksi='$kode'");
    $tampil = $sql->fetch_assoc();
 ?>

 <h4> Struk Makanan </h4>
 <table>
  <tr>
      <td>MR Broto Restaurant</td>
  </tr>

  <tr>
      <td> Jalan Raya Dipatiukur </td>
  </tr>

<p>------------------------------------------</p>

 </table>

 <table>
   <?php
           $sql = $koneksi->query("SELECT * from detail_pesanan
           where id_transaksi = '$kode'");
           $data = $sql->fetch_assoc();

      ?>

      <tr>
          <td>ID Transaksi   :</td>
          <td><?php echo $tampil['id_transaksi'] ?></td> </tr>
     <tr>
          <td>ID Menu   :</td>
          <td><?php echo $data['id_menu'] ?></td>
    </tr> <tr>
          <td>Jumlah Pesanan  :</td>
          <td><?php echo $data['jumlah_pesanan'] ?></td> </tr>
          <tr><td>Subtotal   :</td>
          <td><?php echo $data['subtotal'] ?></td> </tr>
          <p>--------------------------------------------</p>
          <?php
              $pesanan = $koneksi->query("select * from pesanan where id_transaksi='$kode'");
              while($data=$pesanan->fetch_assoc())
              {
                ?>
                <tr>
                <td>Tanggal Pesan</td>
                <td><?php echo $data['tanggal'] ?></td> </tr>
                <tr>
                <td>Total</td>
                <td><?php echo $data ['total']; ?></td> </tr>
                <td>Bayar</td>
                <td><?php echo $data ['bayar']; ?></td> </tr>
                <td>Kembali</td>
                <td><?php echo $data ['kembali']; ?></td> </tr>

                <?php
              }
           ?>
    </table>
    <p>------------------------------------------------</p>
    <h2>TERIMAKASIH</h2>
