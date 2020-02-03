<?php
include("session/session_secure_page_cs.php");
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Kuisioner</div>
        <div class="card-body">
          <div class="table-responsive">
            <a href="?page=kuisioner&aksi=tambah" class="btn btn-primary"> Tambah </a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Kuisioner</th>
                            <th>Saran</th>
                            <th>Nama Pelanggan </th>

                        </tr>
                    </thead>

                    <tbody>

                      <?php
                          $sql = $koneksi->query("select * from kuisioner inner join pelanggan on
                          kuisioner.id_pelanggan = pelanggan.id_pelanggan");
                          while($data = $sql->fetch_assoc()){



                       ?>
                        <tr>
                            <td><?php echo $data['id_kuisioner'] ?></td>
                            <td><?php echo $data['saran'] ?></td>
                            <td><?php echo $data['nama'] ?></td>

                        </tr>
                      <?php } ?>


                    </tbody>
                  </table>
                </div>
     </div>
                </div>
