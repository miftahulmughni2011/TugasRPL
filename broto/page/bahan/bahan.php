<?php
include("session/session_secure_page_pantry.php");
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Bahan Baku</div>
        <div class="card-body">
          <div class="table-responsive">
            <a href="?page=bahan&aksi=tambah" class="btn btn-primary"> Tambah </a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Bahan</th>
                            <th>Nama Bahan</th>
                            <th>Jumlah</th>
                            <th colspan="2" align="center">Aksi</th>

                        </tr>
                    </thead>

                    <tbody>

                      <?php
                          $sql = $koneksi->query("select * from bahan");
                          while($data = $sql->fetch_assoc()){



                       ?>
                        <tr>
                            <td><?php echo $data['id_bahan'] ?></td>
                            <td><?php echo $data['nama_bahan'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>

                            <td> <a href="?page=bahan&aksi=ubah&id=<?php echo $data['id_bahan'] ?>" class="btn btn-success" >
                               Ubah </a>
                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ?')" href="?page=bahan&aksi=hapus&id=<?php echo $data['id_bahan'] ?>"
                            class="btn btn-danger"> Hapus</td>
                        </tr>
                      <?php } ?>


                    </tbody>
                  </table>
                </div>
     </div>

                </div>
