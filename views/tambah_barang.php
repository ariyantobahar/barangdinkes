<div class="panel panel-default">
              <div class="panel-heading"><center><b>TAMBAH BARANG</b></center></div>
              <div class="panel-body">
            <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-4">
                       <input type="text" class="form-control" name="nama_barang">
                     </div>
                <label class="col-sm-2 control-label">Volume</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="volume" required>
                            </div> 
            </div>
            <div class="form-group">
            	 <label class="col-sm-2 control-label">Satuan</label>
                          	<div class="col-sm-4">
                              <input type="text" class="form-control" name="satuan" required>
                            </div> 
                <label class="col-sm-2 control-label">Harga Satuan</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="harga_satuan" required>
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
$nama_barang = $_POST['nama_barang'];
$volume = $_POST['volume'];
$satuan = $_POST['satuan'];
$harga_satuan =$_POST['harga_satuan'];
$simpan= mysql_query("insert into databarang values('$nama_barang','$volume','$volume','$satuan','$harga_satuan')");
if ($simpan) {
  echo "<script>alert('Barang berhasil ditambahkan'); document.location='index.php?page=daftar_barang'</script>";
  # code...
}else{
  echo mysql_error();
  echo "<script>alert('Barang gagal ditambahkan'); document.location='index.php?page=tambah_barang'</script>";
}
    
}
?>