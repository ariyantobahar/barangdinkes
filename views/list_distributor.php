 <div class="row">
          <div class="col-lg-12">
            <h1 align="center">Daftar Distributor</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
<div class="row">
<div class="form-group">
<div class="col-sm-8">
<a id="t_dis" data-toggle="modal" data-target="#tdis" class="btn btn-primary"><i class="fa fa-plus-square"> Tambah</i></a>
</div>
</div>
</div>
<p>
<div class="row">
 <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>Nama<i class="fa fa-sort"></i></th>
                    <th>Alamat<i class="fa fa-sort"></i></th>
                    <th>No HP<i class="fa fa-sort"></i></th>
                    <th>Email <i class="fa fa-sort"></i></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php 
include 'koneksi.php';
$sql= mysql_query("select * from distributor");
while($data=mysql_fetch_array($sql)){
?>
              <tr>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo $data['alamat'] ?></td>
              <td><?php echo $data['no_hp']; ?></td>
              <td><?php echo $data['email'] ?></td>
              <td><a id="e_dist" data-toggle="modal" data-target="#edit" data-nama="<?php echo $data['nama']; ?>" data-alamat="<?php echo $data['alamat']; ?>" data-nohp="<?php echo $data['no_hp']; ?>" data-email="<?php echo $data['email']; ?>" data-id="<?php echo $data['id']; ?>"  class="btn btn-primary"><i class="fa fa-edit"> Ubah</i></a></td>
              <td><a href="?page=delete&n_dist=<?php echo $data['nama'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" ><i class="fa fa-eraser"> Hapus</i></a></td>
              </tr>
<?php              
}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->
<div id="tdis" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Distributor</h4>
      </div>
      <form id="form" method="post" action="">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label" for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="stok">
          </div>
          <div class="form-group">
            <label class="control-label" for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" id="satuan">
          </div>
          <div class="form-group">
            <label class="control-label" for="email">Email</label>
            <input type="text" name="email" class="form-control" id="hsatuan">
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="tdis" value="Simpan">
          </div>
          </form>
          </div>
          </div>
          </div>
<div id="edit" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Distributor</h4>
      </div>
      <form id="form" method="post" action="">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama">
            <input type="hidden" name="id_dist" id="id_dist">
          </div>
          <div class="form-group">
            <label class="control-label" for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat">
          </div>
          <div class="form-group">
            <label class="control-label" for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" id="no_hp">
          </div>
          <div class="form-group">
            <label class="control-label" for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email">
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="edit" value="Simpan">
          </div>
          </form>
          </div>
          </div>
          </div>
<?php 
if(isset($_POST['tdis'])){
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$simpan= mysql_query("insert into distributor values('','$nama','$alamat','$email','$no_hp')");
if ($simpan) {
  echo "<script>alert('Distributor berhasil ditambahkan'); document.location='index.php?page=list_dist'</script>";
  # code...
}else{
  echo mysql_error();
  echo "<script>alert('Distributor gagal ditambahkan'); document.location='index.php?page=list_dist'</script>";
}
}else if(isset($_POST['edit'])){
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];
  $email = $_POST['email'];
  $id = $_POST['id_dist'];
$edit = mysql_query("update distributor set nama='$nama', alamat='$alamat', no_hp='$no_hp', email='$email' where id='$id'");
if($edit){
  echo "<script>alert('Data distributor berhasil diubah'); document.location='index.php?page=list_dist'</script>";
}else{
  echo mysql_error();
}
}
?>