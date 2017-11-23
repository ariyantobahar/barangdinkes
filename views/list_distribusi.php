 <div class="row">
          <div class="col-lg-12">
            <h1 align="center">List Distribusi Barang</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
<div class="row">
          <div class="col-lg-12">
          		<div class="table-responsive">
                <table class="table table-bordered table-hover table striped">
                  <tr>
                    <th>ID Distribusi</th>
                    <th>Tanggal Pendistribusian</th>
                    <th>Penerima</th>
                    <th>Nama Barang</th>
                    <th>Stok Awal</th>
                    <th>Jumlah Barang Keluar</th> 
                    <th>Sisa Stok</th>
                  </tr>
<?php
if(isset($_POST['ubah'])){
include 'koneksi.php';
$sql = mysql_query("select * from dtl_distribusi where id='$_POST[id_dist]'");
$hitung = mysql_num_rows($sql);
if ($hitung < 1){
  echo "<script>alert('Data belum ada'); document.location='index.php?page=list'</script>";
}else{
while($data = mysql_fetch_array($sql)){?>
                  <tr>
                    <td></td>
                    <td><?php echo $data['tgl_dist']?></td>
                    <td><?php echo $data['nama']?></td>
                    <td><?php echo $data['nama_barang']?></td>
                    <td><?php echo $data['jumlah']?></td>
                    <td><?php echo $data['stok_sisa']?></td>
                  </tr><?php

}?>
          </table>
          </div>
          </div>
         </div><?php 
}
}
?>