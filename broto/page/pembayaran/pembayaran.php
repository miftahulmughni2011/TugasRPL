<?php
include("session/session_secure_page_kasir.php");
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Pembayaran</div>
        <div class="card-body">
          <div class="table-responsive">
            <a href="?page=pembayaran&aksi=lihat" class="btn btn-primary"> Log Pembayaran </a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Pelanggan</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>No Meja</th>
                            <th>Aksi </th>

                        </tr>
                    </thead>

                    <tbody>

                      <?php
                          $sql = $koneksi->query("SELECT id_transaksi,tanggal,nama,total,bayar,kembali,meja.no_meja FROM pesanan
                          INNER JOIN pelanggan ON pelanggan.`id_pelanggan`=pesanan.`id_pelanggan`
                          INNER JOIN pegawai ON pegawai.`id_pegawai`=pesanan.`id_pegawai`
                          INNER JOIN meja ON meja.no_meja=pesanan.no_meja
                          where bayar=0; ");
                          while($data = $sql->fetch_assoc()){



                       ?>
                        <tr>
                            <td><?php echo $data['id_transaksi'] ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['total'] ?></td>
                            <td><?php echo $data['bayar'] ?></td>
                            <td><?php echo $data['kembali'] ?></td>
                            <td><?php echo $data['no_meja'] ?></td>
                            <td> <a href="?page=pembayaran&aksi=bayar&id=<?php echo $data['id_transaksi'] ?>" class="btn btn-success" >
                               Bayar </a>
                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ?')"
                            href="?page=pembayaran&aksi=hapus&id=<?php echo $data['id_transaksi'] ?>" class="btn btn-danger">Hapus</td>
                        </tr>
                      <?php } ?>


                    </tbody>
                  </table>
                </div>
     </div>

                </div>
