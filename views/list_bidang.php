 <div class="row">
          <div class="col-lg-12">
            <h1 align="center">Daftar Bidang</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
<div class="row">
<div class="form-group">
<div class="col-sm-8">
<a id="t_dis" data-toggle="modal" data-target="#tbid" class="btn btn-primary"><i class="fa fa-plus-square"> Tambah</i></a>
</div>
</div>
</div>
<p>
<div class="row">
 <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter paginated">
                <thead>
                  <tr>
                    <th>No <i class="fa fa-sort"></th>
                    <th>Nama Bidang<i class="fa fa-sort"></i></th>
                    <th>Kepala<i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
<?php 
include 'koneksi.php';
$sql= mysql_query("select * from bidang");
$no = 0;
while($data=mysql_fetch_array($sql)){
  $no++
?>
              <tr>
              <td align="center"><?php echo $no ?></td>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo $data['kepala'] ?></td>
              <td align="center"><a id="e_bid" data-toggle="modal" data-target="#edit" data-nama="<?php echo $data['nama']; ?>" data-kepala="<?php echo $data['kepala']; ?>" data-id="<?php echo $data['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"> Ubah</i></a></td>
              <td align="center"><a href="?page=delete&n_bid=<?php echo $data['nama'] ?>" class="btn btn-danger"><i class="fa fa-eraser"> Hapus</i></a></td>
              </tr>
<?php              
}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->
<div id="tbid" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Bidang</h4>
      </div>
      <form id="form" method="post" action="">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label" for="kepala">Kepala</label>
            <input type="text" name="kepala" class="form-control" id="kepala">
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="t_bid" value="Simpan">
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
        <h4 class="modal-title">Ubah Data Bidang</h4>
      </div>
      <form id="form" method="post" action="">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama">
            <input type="hidden" name="id" id="id"></input>
          </div>
          <div class="form-group">
            <label class="control-label" for="alamat">Kepala</label>
            <input type="text" name="kepala" class="form-control" id="kepala">
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
if(isset($_POST['t_bid'])){
$nama = $_POST['nama'];
$kepala = $_POST['kepala'];
$data = mysql_query("select * from bidang where nama='$nama'");
$jumlah = mysql_num_rows($data);
if ($jumlah > 0 ){
echo "<script>alert('Nama bidang telah ada'); document.location='index.php?page=list_bid'</script>";
}else{
$simpan= mysql_query("insert into bidang values('','$nama','$kepala')");
if ($simpan) {
  echo "<script>alert('Data berhasil ditambahkan'); document.location='index.php?page=list_bid'</script>";
  # code...
}else{
  echo "<script>alert('Data gagal ditambahkan'); document.location='index.php?page=list_bid'</script>";
}
}
}else if(isset($_POST['edit'])){
  $nama = $_POST['nama'];
  $kepala = $_POST['kepala'];
  $id = $_POST['id'];
$edit = mysql_query("update bidang set kepala='$kepala', nama='$nama' where id='$id'");
if($edit){
  echo "<script>alert('Data Bidang berhasil diubah'); document.location='index.php?page=list_bid'</script>";
}else{
  echo mysql_error();
}
}
?>