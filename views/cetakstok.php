<?php 
$nama_barang = $_GET['id_barang'];
?>
<div class="row">
  <div class="col-lg-12">
    <div class="form-group">
    <form action="views/cetakpdf.php" method="post" target="_blank">
      <label>Dari Tanggal :</label>
      <div class="input-group input-append date" id="datePicker">
        <input type="text" class="form-control" name="tgl_mulai" />
        <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
      </div>
       <label>Sampai :</label>
        <div class="input-group input-append date" id="datePicker2">
      <input type="text" class="form-control" name="tgl_selesai">
      <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
      </div>
    </div>
      <input type="hidden" name="nama_barang" value="<?php echo $nama_barang ?>">
      <button class="btn btn-primary" name="simpan" id="" type="submit">Cetak</button>
    </form>
  </div>
</div>