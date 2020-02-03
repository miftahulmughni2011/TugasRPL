<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("select * from pesanan where id_transaksi='$kode'");
    $tampil = $sql->fetch_assoc();

 ?>
 <form method="POST">

   <label for="">ID Transaksi</label>
     <div class="col-md-2">
         <input class="form-control" readonly=readonly value="<?php echo $tampil['id_transaksi'];?>" type="text" name="idtransaksi">
     </div>
<div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                   <tr>
                       <th>ID Menu</th>
                       <th>Jumlah</th>
                       <th>Sub Total</th>

                   </tr>
               </thead>

               <tbody>

                 <?php
                     $sql = $koneksi->query("SELECT * from detail_pesanan
                     where id_transaksi = '$kode'
                     ; ");
                     while($data = $sql->fetch_assoc()){



                  ?>
                   <tr>
                       <td><?php echo $data['id_menu'] ?></td>
                       <td><?php echo $data['jumlah_pesanan'] ?></td>
                       <td><?php echo $data['subtotal'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>

                <tr>
                  <?php
                      $pesanan = $koneksi->query("select * from pesanan where id_transaksi='$kode'");
                      while($data=$pesanan->fetch_assoc())
                      {
                        ?>
                        <th colspan="2" style="text-align:right;">Total</th>
                        <td> <input type="text" readonly=readonly value="<?php echo $data ['total']; ?>"></td><?php
                      }
                   ?>

                </tr>
              </div>
            </div>
              </table>

       <label for="">Bayar</label>
         <div class="col-md-2">
             <input class="form-control" type="text" name="bayar" />
         </div>

         <div class="col-md-2"> <br>
           <input type="submit" name="simpan" value="Konfirmasi" class="btn btn-primary">
         </div>

 </form>

 <?php

 if (isset($_POST['simpan'])) {
 $idtransaksi = $_POST['idtransaksi'];
 $bayar = $_POST['bayar'];

 $pesanan = $koneksi->query("select * from pesanan where id_transaksi='$kode'");
 $data_pes = $pesanan->fetch_assoc();
  $total = $data_pes['total'];
 $kembali= $bayar-$total;

         if($bayar < $total) {
           ?>
          <script type="text/javascript">
           echo("Bayar tidak boleh kurang dari total");
           window.location.href="?page=pembayaran";
          <?php
         }
         else {
           $sql = $koneksi->query("UPDATE pesanan SET bayar = '$bayar', kembali = '$kembali' WHERE id_transaksi='$idtransaksi'");
         }


             if ($sql) {
             ?>
             <script type="text/javascript">
             alert("Data Berhasil Dibayar");
             window.location.href="?page=pembayaran";
             </script>

             <?php


             }
   }

   ?>
