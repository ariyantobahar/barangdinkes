<div class="panel panel-default">
      <div class="panel-heading"><center><b>TAMBAH SUPPLIER</b></center></div>
          <div class="panel-body">
      <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Supplier</label>
                    <div class="col-sm-4">
                       <input type="text" class="form-control" name="nama_sup" required>
                     </div>
                     <label class="col-sm-2 control-label">No.Hp</label>
                          	<div class="col-sm-4">
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                       <textarea class="from-control" rows="3" cols="115" name="alamat"></textarea>
                     </div>  
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                   <div class="col-sm-4">
                       <input type="text" class="form-control" name="email" required>
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
$nama = $_POST['nama_sup'];
$alamat= $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$simpan= mysql_query("insert into suplier values('','$nama','$no_hp','$alamat','$email')");
if ($simpan) {
  echo "<script>alert('Supplier berhasil ditambahkan'); document.location='index.php?page=daftar_suplier'</script>";
  # code...
}else{
  echo mysql_error();
  echo "<script>alert('Supplier gagal ditambahkan'); document.location='index.php?page=supplier'</script>";
}
    
}
?>