 <div class="row">
          <div class="col-lg-12">
            <h1 align="center">Persediaan Alat Listrik</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
<div class="row">
<div class="form-group">
<div class="col-sm-8">
<a id="t_brg" data-toggle="modal" data-target="#tbrg" class="btn btn-primary"><i class="fa fa-plus-square"> Tambah</i></a>
<a id="t_cetak" data-toggle="modal" data-target="#tcetak" class="btn btn-warning"><i class="fa fa-print"> Cetak</i></a>
<a href="views/reset.php" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk mereset semua history barang masuk dan barang keluar ?');"><i class="fa fa-eraser"> Reset</i></a>
</div>
<div class="col-sm-4">
<input type="text" style="background-image: url(pink.png);background-position: 6px 5px;background-repeat: no-repeat;padding: 5px 20px 4px 40px;" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Masukkan nama barang....">
</div> 
</div>
</div>
<p>
<div class="row">
 <div class="col-lg-12">
            <div class="table-responsive">
              <table id="myTable" class="table table-bordered table-hover table-striped tablesorter paginated">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Stok Awal</th>
                    <th>Stok Akhir</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</i></th>
                    <th>Jumlah Harga</i></th>
                  </tr>
                </thead>
                <tbody>
<?php 
include 'koneksi.php';
$sql= mysql_query("select * from databarang where kode=4");
while($data=mysql_fetch_array($sql)){
?>
              <tr>
              <td><?php echo $data['nama_barang'] ?></td>
              <td><?php echo $data['stok_awal'] ?></td>
              <td><?php echo $data['stok_akhir'] ?></td>
              <td><?php echo $data['satuan'] ?></td>
              <td><?php echo 'Rp '.number_format($data['harga_satuan'],2) ?></td>
              <td><?php echo 'Rp '.number_format($data['stok_akhir']*$data['harga_satuan'],2) ?></td>
              <td><a id="edit_brg" data-toggle="modal" data-target="#editbrg" data-nama="<?php echo $data['nama_barang']; ?>" data-stok="<?php echo $data['stok_awal']; ?>" data-sta="<?php echo $data['stok_akhir']; ?>" data-satuan="<?php echo $data['satuan']; ?>" data-hsatuan="<?php echo $data['harga_satuan']; ?>" data-no="<?php echo $data['no']; ?>" class="btn btn-primary"><i class="fa fa-edit"> Ubah</i></a></td>
              <td><a href="?page=delete&id_barang=<?php echo $data['nama_barang'] ?>" class="btn btn-danger"  ><i class="fa fa-eraser" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"; > Hapus</i></a></td>
              <td><a id="c_brg" data-toggle="modal" data-target="#cetak" data-nama="<?php echo $data['nama_barang']?>" class="btn btn-default"><i class="fa fa-print"> Cetak</i></a></td>
              </tr>
<?php              
}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->
<div id="editbrg" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Barang</h4>
      </div>
      <form id="form" method="post" action="">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="nama">Nama Barang</label>
            <input type="text" name="nama" class="form-control" id="nama">
            <input type="hidden" name="no" class="form-control" id="no">
          </div>
          <div class="form-group">
            <label class="control-label" for="stok">Stok Awal</label>
            <input type="text" name="stok" class="form-control" id="stok">
          </div>
          <div class="form-group">
            <label class="control-label" for="sta">Stok Akhir</label>
            <input type="text" name="sta" class="form-control" id="sta">
          </div>
          <div class="form-group">
            <label class="control-label" for="satuan">Satuan</label>
            <input type="text" name="satuan" class="form-control" id="satuan">
          </div>
          <div class="form-group">
            <label class="control-label" for="hsatuan">Harga Satuan</label>
            <input type="text" name="hsatuan" class="form-control" id="hsatuan">
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="editbrg" value="Simpan">
          </div>
          </form>
          </div>
          </div>
          </div>
<div id="tbrg" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Barang</h4>
      </div>
      <form id="form" method="post" action="">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="nama">Nama Barang</label>
            <input type="text" name="nama" class="form-control" id="nama" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label" for="stok">Stok Awal</label>
            <input type="text" name="stok" class="form-control" id="stok">
          </div>
          <div class="form-group">
            <label class="control-label" for="satuan">Satuan</label>
            <input type="text" name="satuan" class="form-control" id="satuan">
          </div>
          <div class="form-group">
            <label class="control-label" for="hsatuan">Harga Satuan</label>
            <input type="text" name="hsatuan" class="form-control" id="hsatuan">
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="tbrg" value="Simpan">
          </div>
          </form>
          </div>
          </div>
          </div>
<div id="cetak" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Cetak</h4>
      </div>
      <form id="form" method="post" action="views/cetakpdf.php" target="_blank">
        <div class="modal-body">
        <div class="form-group">
        <input type="hidden" name="nama_barang" id="nama_barang">
         <label class="control-label" for="tgl_mulai">Tanggal Mulai</label>
          <div class="input-group date" id="datePicker">
            <input type="text" name="tgl_mulai" class="form-control" id="tgl_mulai" autofocus>
            <span class="input-group-addon"><span class="fa fa-calendar"></span>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label" for="tgl_selesai">Tanggal Selesai</label>
          <div class="input-group input-append date" id="datePicker2">
            <input type="text" name="tgl_selesai" class="form-control" id="tgl_selesai">
            <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
          </div>
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="cetak" value="Cetak" id="cetak_form">
          </div>
          </form>
          </div>
          </div>
          </div>
<div id="tcetak" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Cetak Keseluruhan</h4>
      </div>
      <form id="form" method="post" action="">
        <div class="modal-body">
        <div class="form-group">
         <label class="control-label" for="output">Pilih Output :</label>
          </div>
          <div class="form-group">
          <a href="views/fullcetak.php?kode=4" class="btn btn-primary" target="_blank" id="c_kes">Pdf</a>  
          <a href="views/excelfull.php?kode=4" class="btn btn-primary" id="c_kes">Excell</a>    
          </div>
          </div>
          </form>
          </div>
          </div>
          </div>
<?php
if(isset($_POST['editbrg'])){
$update = mysql_query("update databarang set stok_awal='$_POST[stok]', stok_akhir='$_POST[sta]', harga_satuan='$_POST[hsatuan]', satuan='$_POST[satuan]' where nama_barang='$_POST[nama]'");
if ($update){
echo "<script> alert('Data barang berhasil diupdate');window.location='index.php?page=alat_listrik';</script>";   
}else{
  echo "<script>alert('Data barang gagal diupdate');window.location='index.php?page=edit&id_barang=$id';</script>";
}
}else if(isset($_POST['tbrg'])){
$nama_barang = $_POST['nama'];
$volume = $_POST['stok'];
$satuan = $_POST['satuan'];
$harga_satuan =$_POST['hsatuan'];
$kode = 4;
$simpan= mysql_query("insert into databarang values('$nama_barang','$volume','$volume','$satuan','$harga_satuan','$kode')");
if ($simpan) {
  echo "<script>alert('Barang berhasil ditambahkan'); document.location='index.php?page=alat_listrik'</script>";
  # code...
}else{
  echo mysql_error();
  echo "<script>alert('Barang gagal ditambahkan'); document.location='index.php?page=alat_listrik'</script>";
}

}
?>
      