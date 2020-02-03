<?php

    $kode = $_GET['id'];

    $sql = $koneksi->query("select * from wisata where id_wisata='$kode'");
    $tampil = $sql->fetch_assoc();

 ?>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Ubah Wisata</div>
      <div class="card-body">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq_SCcm6scjldhMwO4kCqos7xbiP1Gi4Y&libraries=places"></script>
        <?php // proses inisialisasi map ?>
          <script type="text/javascript">
              var geocoder;
              var map;
              function initialize() {
                  geocoder = new google.maps.Geocoder();
                  var latlng = new google.maps.LatLng(-6.9174639, 107.61912280000001);
                  var mapOptions = {
                      zoom: 12,
                      center: latlng
                    }
                    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                  }
        <?php // membuat fungsi geocoder untuk mendapatkan latitude dan longtitude ?>
          function geocodeLokasi() {
        var address = document.getElementById('alamat').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
            var lat = results[0].geometry.location.lat();
            var lng = results[0].geometry.location.lng();
          } else {
            alert('Geocode gagal dilakukan karena : ' + status);
          }
            document.getElementById("lat").value = lat;
            document.getElementById('lng').value=lng;
        });
      }

              google.maps.event.addDomListener(window, 'load', initialize);
      </script>
            <form method="POST">
              <label for="">ID Wisata</label>
                <div class="form-group">
                    <input class="form-control" value="<?php echo $tampil['id_wisata'];?>" type="text" name="idwisata">
                </div>

                <label for="">Nama Wisata</label>
                  <div class="form-group">
                      <input class="form-control" type="text" name="namawisata">
                  </div>


                <label for="">ID Kategori</label>
                  <div class="form-group">
                    <select class="form-control" name="idkategori">
                       <?php
                           $kategori = $koneksi->query("select * from kategori");
                           while($data=$kategori->fetch_assoc())
                           {
                             ?>
                             <option value="<?php echo $data['id_kategori']?>"><?php echo $data['nama_kategori']; ?></option>
                             <?php
                           }
                        ?>
                    </select>
                  </div>

                    <label for="">ID Kota</label>
                      <div class="form-group">

                        <select class="form-control" name="idkota" id="idkota">
                          <option value="">-Pilih Kota-</option>
                           <?php
                               $kota = $koneksi->query("select * from kota order by nama_kota");
                               while($data=$kota->fetch_assoc())
                               {
                                 ?>
                                 <option value="<?php echo $data['id_kota']?>"><?php echo $data['nama_kota']; ?></option>
                                 <?php
                               }
                            ?>
                        </select>
                      </div>

                      <label for="">ID Kecamatan</label>
                        <div class="form-group">

                          <select class="form-control" name="idkec" id="idkec">
                            <option value="">-Pilih Kecamatan -</option>
                             <?php
                                 $kec = $koneksi->query("select * from kecamatan inner join kota
                                 on kecamatan.id_kota = kota.id_kota order by nama_kec");
                                 while($data=$kec->fetch_assoc())
                                 {
                                   ?>
                                   <option id="idkec" class="<?php echo $data['id_kota']?>"
                                   value="<?php echo $data['id_kec']?>"><?php echo $data['nama_kec']; ?></option>
                                   <?php
                                 }
                              ?>
                          </select>
                        </div>

                        <label for="">ID Desa</label>
                          <div class="form-group">

                            <select class="form-control" name="iddesa" id="iddesa">
                              <option value="">-Pilih Desa -</option>
                               <?php
                                   $desa = $koneksi->query("select * from desa inner join kecamatan
                                   on desa.id_kec = kecamatan.id_kec order by nama_desa");
                                   while($data=$desa->fetch_assoc())
                                   {
                                     ?>
                                     <option id="iddesa" class="<?php echo $data['id_kec']?>"
                                     value="<?php echo $data['id_desa']?>"><?php echo $data['nama_desa']; ?></option>
                                     <?php
                                   }
                                ?>
                            </select>

                          </div>


                      <label for="">Alamat</label>
                        <div class="form-group">

                            <input type="text" onChange="geocodeLokasi()" name="alamat" class="form-control" id="alamat"  />
                        </div>


                      <label for="">Deskripsi</label>
                        <div class="form-group">

                            <input type="text" name="deskripsi" class="form-control"  />
                        </div>

                        <label for="">Rating</label>
                          <div class="form-group">

                              <input type="text" name="rating" class="form-control"  />
                          </div>



                        <label for="">Tiket</label>
                          <div class="form-group">

                              <input type="number" name="tiket" class="form-control"  />
                          </div>

                          <label for="">Latitude</label>
                            <div class="form-group">

                                <input type="text" name="latitude" class="form-control" id="lat" />
                            </div>

                            <label for="">Longtitude</label>
                              <div class="form-group">

                                  <input type="text" name="longtitude" class="form-control" id="lng" />
                              </div>


                          <label for="">keterangan</label>
                            <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="keterangan" class="form-control"  />
                            </div>
                            </div>
                            <label for="">No Telepon</label>
                              <div class="form-group">

                                  <input type="text" name="notelp" class="form-control"  />
                              </div>

                            <div id="map-canvas" style="width: 500px; height: 500px; margin-top: 20px">
                            </div>
                            <hr>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
           </form>

           <script src="js/jquery-1.10.2.min.js"></script>
             <script src="js/jquery.chained.min.js"></script>
             <script>
                 $("#idkec").chained("#idkota");
                 $("#iddesa").chained("#idkec");
             </script>


<?php
if (isset($_POST["simpan"])){
  $namawisata = $_POST['namawisata'];
  $idkategori = $_POST['idkategori'];
  $idkota = $_POST['idkota'];
  $idkec = $_POST['idkec'];
  $iddesa = $_POST['iddesa'];
  $alamat = $_POST['alamat'];
  $deskripsi = $_POST['deskripsi'];
  $rating = $_POST['rating'];
  $tiket = $_POST['tiket'];
  $latitude = $_POST['latitude'];
  $longtitude = $_POST['longtitude'];
  $keterangan = $_POST['keterangan'];
  $notelp = $_POST['notelp'];

$sql = $koneksi->query("update wisata set nama_wisata='$namawisata',id_kategori='$idkategori',id_kota='$idkota',id_kec='$idkec',id_desa='$iddesa',deskripsi='$deskripsi',
alamat='$alamat',rating='$rating',tiket='$tiket', latitude='$latitude', longtitude='$longtitude', keterangan='$keterangan',no_telp='$notelp' where id_wisata='$kode')");

if ($sql) {
?>
<script type="text/javascript">
alert("Data Berhasil Dirubah");
window.location.href="?page=wisata";
</script>

<?php


}

}

?>
