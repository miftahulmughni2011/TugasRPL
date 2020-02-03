<?php

    $kode = $_GET['kodepes'];


 ?>
 <form method="POST">

     <label for="">ID Transaksi</label>
       <div class="col-md-2">
           <input class="form-control" type="text" name="kode" value="<?php echo $kode; ?>" readonly="" />
       </div>

       <label for="">Pilih Pelanggan</label>
         <div class="col-md-3">
           <select class="form-control" name="idpelanggan">
             <option value=""> - Pilih Pelanggan -</option >
              <?php
                  $pelanggan = $koneksi->query("select * from pelanggan");
                  while($data=$pelanggan->fetch_assoc())
                  {
                    ?>
                    <option value="<?php echo $data['id_pelanggan']?>"><?php echo $data['nama']; ?></option>
                    <?php
                  }
               ?>
           </select>
         </div>

         <script type="text/javascript">
function tambahItem(idTabel)
{
 var idtabel = document.getElementById(idTabel);
 var isi = document.getElementById('isi').value;
 var jumBaris = idtabel.rows.length;
 var baris = idtabel.insertRow(jumBaris);

 var kolom1 = baris.insertCell(0);
 var element1 = document.createElement("input");
 element1.type = "checkbox";
 element1.align = "center";
 kolom1.appendChild(element1);

 var kolom2 = baris.insertCell(1);
 kolom2.innerHTML = '<input type="text" name="idmenu[]" value="'+isi+'" readonly=readonly style="background-color:white;border:none" />';
 document.getElementById('isi').value = '';

 var kolom3 = baris.insertCell(2);
 kolom3.innerHTML = '<input type="text" name="jumlah[]" value="0" style="background-color:white;border:none" />';

}

function hapusItem(idTabel)
{
 try{
 var idtabel = document.getElementById(idTabel);
 var jumBaris = idtabel.rows.length;

 for(var i=0;i<jumBaris;i++)
  {
   var baris = idtabel.rows[i];
   var chkbox = baris.cells[0].childNodes[0];
   if(null != chkbox && true == chkbox.checked)
    {
     idtabel.deleteRow(i);
     jumBaris--;
     i--;
    }
  }
 }catch(e)
 {
  alert(e);
 }
}
</script>
         <div class="form-group">
         <label class="col-sm-2 control-label">Pilih Menu</label>
         <div class="col-sm-10">
         <select class="form-control" name="isi" id="isi">
           <option value="">-Pilih Menu-</option>
           <?php
           $query = mysqli_query($koneksi,"SELECT * FROM menu;");
           while($res=mysqli_fetch_array($query)){ ?>
             <option value="<?php echo $res['id_menu']; ?>"><?php echo $res['nama_menu']." (".$res['harga'].")"; ?></option>
            <?php } ?>
         </select>
       </div>
<label class="col-sm-2 control-label"></label>
<div class="col-sm-10">
  <button class="btn btn-default" type="button" value="Tambah Item" onclick="tambahItem('tabelku')" >Tambah Item</button>
  <button class="btn btn-default" type="button" value="Hapus Item" onclick="hapusItem('tabelku')" >Hapus Item</button>
  <br><br>
  <table class="table table-bordered" id="tabelku" border="1">
  <tr>
   <td align="center">Cek</td>
   <td align="center">ID Menu</td>
   <td align="center">Jumlah</td>
  </tr>
  </table>
</div>
</div>

       <label for="">No Meja</label>
           <div class="col-md-2">
             <select class="form-control" name="nomeja">
                <?php
                    $meja = $koneksi->query("select * from meja");
                    while($data=$meja->fetch_assoc())
                    {
                      ?>
                      <option value="<?php echo $data['no_meja']?>"> <?php echo $data['no_meja']; ?></option>
                      <?php
                    }
                 ?>
             </select>
       </div>




         <div class="col-md-2"> <br>
           <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
         </div>
 </form>

 <?php

 if (isset($_POST['simpan'])) {
 $date = date("Y-m-d");
 $kd_pes = $_POST['kode'];
 $id_pelanggan = $_POST['idpelanggan'];
 $id_menu = $_POST['idmenu'];
 $id_pegawai = $_POST['idpegawai'];
 $no_meja = $_POST['nomeja'];
 $jml = $_POST['jumlah'];
 $jumlah = count ($id_menu);

 for ($i=0; $i < $jumlah; $i++) {
			if (empty($id_menu[$i])) {
				?>
				<div class="alert alert-danger" role="alert" style="margin-top: 15px">
			 			Data gagal disimpan<br>Mohon untuk memilih barang.
		 		</div>
		 		<?php
				header('Refresh: 2; URL=index.php?page=pemesanan&aksi=tambah');
				die();
			}
		}

          $sql = $koneksi->query("insert into pesanan values('$kd_pes','$id_pelanggan','peg3','$date','$no_meja',0,0,0)");
          for ($i=0; $i < $jumlah ; $i++) {
            $menu = $koneksi->query("select * from menu where id_menu='$id_menu[$i]'");
            $data_menu = $menu->fetch_assoc();
            $harga = $data_menu['harga'];
            $subtotal = $harga*$jml[$i];
            $total = $total+$subtotal;
          $sql1 = $koneksi->query("insert into detail_pesanan values('$kd_pes','$id_menu[$i]','$jml[$i]','$subtotal')");
        }
        $koneksi->query("update pesanan set total = '$total' where id_transaksi='$kd_pes'");


             if ($sql && $sql1) {
             ?>
             <script type="text/javascript">
             alert("Data Berhasil Disimpan");
             window.location.href="?page=pemesanan&kodepes=<?php echo $kode; ?>";
             </script>

             <?php


             }
   }
   ?>
