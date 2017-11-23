<?php 
include 'koneksi.php';
$id=$_GET['id'];
$sql=mysql_query("select * from suplier where id='$id'");
$data = mysql_fetch_array($sql);
$nama= $data['nama_supplier'];
$no_hp= $data['no_hp'];
$alamat = $data['alamat'];
$email = $data['email'];
?>
<div class="row">
          <div class="col-lg-12">
            <h1 align="center">Supplier</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
 <div class="row">
         <div class="col-lg-11">
             <section class="panel">
                  <header class="panel-heading">
                      <b><h4 align="center">Edit Supplier</b></h4>
                         </header>
<div class="panel-body">
      <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Supplier</label>
                    <div class="col-sm-4">
                       <input type="text" class="form-control" name="nama_sup" value="<?php echo $nama ?>" required>
                     </div>
                     <label class="col-sm-2 control-label">No.Hp</label>
                          	<div class="col-sm-4">
                              <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp ?>" required>
                            </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                       <textarea class="from-control" rows="3" cols="115" name="alamat"><?php echo $alamat ?></textarea>
                     </div>  
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                       <input type="text" class="form-control" name="email" value="<?php echo $email ?>" required>
                     </div>  
            </div>
            <div class="col-sm-13" align="right">
            <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            </div>
</form>
</div>
<?php
if(isset($_POST['simpan'])){
$nama_u = $_POST['nama_sup'];
$alamat_u= $_POST['alamat'];
$no_hp_u = $_POST['no_hp'];
$email_u = $_POST['email'];
$simpan= mysql_query("UPDATE suplier set nama_supplier='$nama_u', no_hp='$no_hp_u', alamat='$alamat_u', email='$email_u' where id='$id'");
if ($simpan) {
  echo "<script>alert('Data suplier berhasil diubah'); document.location='index.php?page=daftar_suplier'</script>";
  # code...
}else{
  echo mysql_error();
  echo "<script>alert('Data suplier gagal diubah'); document.location='index.php?page=daftar_suplier'</script>";
}
    
}
?>