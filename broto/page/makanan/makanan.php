<?php
include("session/session_secure_page_koki.php");
?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Makanan</div>
        <div class="card-body">
          <div class="table-responsive">
            <a href="?page=makanan&aksi=tambah" class="btn btn-primary"> Tambah </a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Menu</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Resep</th>
                            <th>foto</th>
                            <th colspan="2" align="center">Aksi</th>

                        </tr>
                    </thead>

                    <tbody>

                      <?php
                          $sql = $koneksi->query("select * from resep inner join kategori inner join menu
                          on kategori.id_kategori=menu.id_kategori and menu.id_resep=resep.id_resep");
                          while($data = $sql->fetch_assoc()){



                       ?>
                        <tr>
                            <td><?php echo $data['id_menu'] ?></td>
                            <td><?php echo $data['nama_menu'] ?></td>
                            <td><?php echo $data['nama_kategori'] ?></td>
                            <td><?php echo $data['harga'] ?></td>
                            <td><?php echo $data['nama_resep'] ?></td>
                            <td><?php echo $data['foto'] ?></td>

                            <td> <a href="?page=makanan&aksi=ubah&id=<?php echo $data['id_menu'] ?>" class="btn btn-success" >
                               Ubah </a>
                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ?')" href="?page=makanan&aksi=hapus&id=<?php echo $data['id_menu'] ?>"
                            class="btn btn-danger"> Hapus</td>
                        </tr>
                      <?php } ?>


                    </tbody>
                  </table>
                </div>
     </div>

                </div>
