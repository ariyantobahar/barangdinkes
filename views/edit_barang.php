<?php 
include 'koneksi.php';
$id=$_GET['id_barang'];
$sql=mysql_query("select * from databarang where nama_barang='$id'");
$data = mysql_fetch_array($sql);
$stok_akhir = $data['stok_akhir'];
$satuan = $data['satuan'];
$harga = $data['harga_satuan'];
?>
<div class="panel panel-default">
              <div class="panel-heading"><center><b>EDIT BARANG</b></center></div>
              <div class="panel-body">
            <form class="form-horizontal" method="post" action="">
            <div class="form-group">
            	<label class="col-sm-2 control-label">Nama Barang</label>
                          	<div class="col-sm-4">
                              <input type="text" class="form-control" name="nama_barang" value="<?php echo $id ?>" required>
                            </div>   
              <label class="col-sm-2 control-label">Volume Akhir</label>     
                            <div class="col-sm-4">
                            <input type="text" class="form-control" name="v_akhir" value="<?php echo $stok_akhir ?>" required>
                            </div>  
              </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Satuan</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="satuan" value="<?php echo $satuan ?>" required>
                            </div>  
              <label class="col-sm-2 control-label">Harga satuan</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="harga_satuan" value="<?php echo $harga ?>" required>
                            </div>                 
               </div>   
             <div class="col-sm-13" align="right">
            <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            </div>  
            </form>         
            </div>
            </div>
<?php
if(isset($_POST['simpan'])){
$update = mysql_query("update databarang set stok_akhir='$_POST[v_akhir]', harga_satuan='$_POST[harga_satuan]', satuan='$_POST[satuan]' where nama_barang='$id'");
if ($update){
echo "<script> alert('Data barang berhasil diupdate');window.location='index.php?page=daftar_barang';</script>";   
}else{
  echo "<script>alert('Data barang gagal diupdate');window.location='index.php?page=edit&id_barang=$id';</script>";
}
}
?>