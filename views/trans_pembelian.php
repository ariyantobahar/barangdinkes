<div class="panel panel-default">
              <div class="panel-heading"><center><b>Pembelian Barang</b></center></div>
              <div class="panel-body">
            <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label class="col-sm-2 control-label">ID Transaksi</label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" name="id_barang">
                     </div>
                     
            </div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">Nama Barang</label>
                          	<div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_barang" required>
                            </div>          
              </div>
              <div class="form-group">
            	<label class="col-sm-2 control-label">Harga Beli</label>
                          	<div class="col-sm-4">
                              <input type="text" class="form-control" name="harga_beli" required>
                            </div>  
                <label class="col-sm-2 control-label">Harga Jual</label>
                          	<div class="col-sm-4">
                              <input type="text" class="form-control" name="harga_jual" required>
                            </div>               
              </div>  
             <div class="col-sm-13" align="right">
            <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            </div>          
            </form> 
            </div>
            </div>
<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_beli'];
$simpan= mysql_query("insert into barang values('$id_barang','$nama_barang','$harga_beli','$harga_jual','','')");
if ($simpan) {
  echo "<script>alert('Barang berhasil ditambahkan'); document.location='index.php?page=daftar_barang'</script>";
  # code...
}else{
  echo mysql_error();
  echo "<script>alert('Barang gagal ditambahkan'); document.location='index.php?page=tambah_barang'</script>";
}
    
}
?>