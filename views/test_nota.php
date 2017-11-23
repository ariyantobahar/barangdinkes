<div class="panel panel-default">
		<div class="panel-heading"><center><h4><b>Distribusi Barang</b></h4></center></div>
	<div class="panel-body">
			<form class="form-horizontal" method="post" action="">
						<div class="form-group">
						<label class="col-sm-2 control-label">ID.Distribusi</label>
										<div class="col-sm-4">
										<?php include 'koneksi.php';include 'autonota.php';?>
											 <input type="text" class="form-control" value="<?php echo auto_nota(); ?>" disabled>
											 <input type="hidden" name="id_dist" value="<?php echo auto_nota(); ?>">
										 </div>
								<label class="col-sm-2 control-label">Tgl.Distribusi</label>
										<div class="col-sm-4">
											 <input type="text" class="form-control" name="tgl_dist" value="<?php date_default_timezone_set("Asia/Jakarta");echo date("Y-m-d");?>" >
										 </div>
						</div>
						<div class="form-group">
								<label class="col-sm-2 control-label">Distribusi ke</label>
										<div class="col-sm-10">
											<select class="form-control" name="dist_name">
											<option value=""></option>
											<option>KASUBBAG KEPEGAWAIAN DAN UMUM</option>
											<option>KASUBBAG PERENCANAAN PROGRAM</option>
											<option>KASUBBAG KEUANGAN</option>
											<option>KABID KESEHATAN MASYARAKAT</option>
											<option>KASI KESGA&GISI</option>
											<option>KASI PROMKES & PEMBERDAYAAN MASYARAKAT</option>
											<option>KASI KESLING, KES KERJA & OR</option>
											<option>KABID PENCEGAHAN & PENGENDALIAN PENYAKIT</option>
											<option>KASI SURVEILANS & IMUNISASI</option>	
											<option>KASI PENCEGAHAN & PENGENDALIAN PTM & KESWA</option>
											<option>KASI PENCEGAHAN & P2M</option>
											<option>KABID YANKES</option>
											<option>KASI YANKES PRIMER & TRADISIONAL</option>
											<option>KASI YANKES RUJUKAN</option>
											<option>KASI FASYANKES & PENINGKATAN MUTU</option>
											<option>KABID SUMBER DAYA KESEHATAN</option>
											<option>KASI SDM KESEHATAN</option>
											<option>KASI FARALKES & PKRT</option>
											<option>KASI PEMBIAYAAN & JAMKES</option>
											</select>
										 </div>
						</div>
						<div class="form-group">
						<center><h4><label>Item Distribusi</label></h4></center>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Cari barang</label>
										<div class="col-sm-4">
											 <input type="text" class="form-control" name="brg" id="search-box">
											 <div id="suggesstion-box"></div>
										 </div>
										 <label class="col-sm-2 control-label">Jumlah</label>
											<div class="col-sm-4">
											 <input type="text" class="form-control" name="jml" required>
						</div>
						</div>
						 <div class="col-sm-13" align="right">
            <button class="btn btn-primary" name="simpan" type="submit">Tambah</button>
            </div>
						</form>
<?php
if(isset($_POST['simpan'])){
$tgl = date($_POST['tgl_dist']);
$nama = $_POST['dist_name'];
$nama_brg = $_POST['brg'];
$jumlah = $_POST['jml'];
$id_dist = $_POST['id_dist'];
$sql1 = mysql_query("select * from data_barang where nama_barang='$nama_brg'");
$pembanding = mysql_fetch_array(mysql_query("select * from t_distribusi where nama_barang='$nama_brg'"));
$stok_tdis = $pembanding['jumlah']+$jumlah;
$data1 = mysql_fetch_array($sql1);
$harga = $data1['harga_satuan'];
$stok_akhir = $data1['stok_akhir'];
$satuan = $data1['satuan'];
$total = 0;
if ($jumlah > $stok_akhir || $stok_tdis > $stok_akhir){
echo "<script> alert('Stok barang tidak mencukupi, sisa stok = $stok_akhir');window.location='index.php?page=tes';</script>";	
}
else{
if ($nama_brg == $pembanding['nama_barang']){
	$total = $jumlah + $pembanding['jumlah'];
	$update = mysql_query("update t_distribusi set jumlah='$total' where nama_barang='$nama_brg'");
	echo "<script> window.location='index.php?page=tes';</script>";	
}
else{
$simpan = mysql_query("insert into t_distribusi values('$id_dist','$tgl','$nama','$nama_brg','$jumlah','$satuan','$harga')");
	echo "<script> window.location='index.php?page=tes';</script>";	
}
}
}
?>
		<div class="form-group">
			<center><h4><label>List Barang Distribusi</label></h4></center>
		</div>
	<div class="form-group">
		<div class="col-sm-12">
            <div class="table-responsive">
            <form class="form-horizontal" method="post" action="">
              <table class="table table-bordered table-hover table-striped" align="center">
                <thead>
                  <tr>
                    <th style="text-align: center">Nama Barang</th>
                    <th style="text-align: center">Satuan</th>
                    <th style="text-align: center">Harga Satuan</th>
                    <th style="text-align: center">Jumlah Barang</th>
                    <th style="text-align: center">Subtotal</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php 
$get = mysql_query("select * from t_distribusi");
$total = 0;
$total_harga = 0;
while ($data =mysql_fetch_array($get))
{$subtotal = $data['jumlah'];
$total = $total + $subtotal;
$subharga = $data['harga_satuan']*$data['jumlah'];
$total_harga = $total_harga + $subharga ;
$id_dist = $data['id_distribusi'];
$tgl = $data['tgl_dist'];?>
				<tr>
                <td style="text-align: center"><?php echo $data['nama_barang'] ?></td>
                <td style="text-align: center"><?php echo $data['satuan'] ?></td>
                <td style="text-align: center"><?php echo 'Rp '.number_format($data['harga_satuan'],2)?></td>
                <td style="text-align: center"><?php echo $data['jumlah']  ?></td>
                <td style="text-align: center"><?php echo 'Rp '.number_format($subharga,2)?></td>
                <td><a href="?page=delete&nama_barang=<?php echo $data['nama_barang'] ?>" class="btn btn-primary">delete</a></td>
                </tr><?php
}
?>
				<tr>
				<td colspan="3" style="text-align: center"><b>Total</b></td>
				<td style="text-align: center"><b><?php echo $total?></b></td>
				<td style="text-align: center"><b><?php echo 'Rp '.number_format($total_harga,2) ?></b></td>
				</tr>
                </tbody>
                </table>
                
                </div>
                </div>
                </div>
    		<div class="col-sm-13" align="right">
            <button class="btn btn-primary" name="selesai" type="submit">Selesai</button>
            </div> 
            </form>
				</div>
				</div>
<?php
if(isset($_POST['selesai'])){
$selesai = mysql_query("insert into distribusi values('$id_dist','$tgl','$total','$total_harga')");
$distribusi = mysql_query("select * from t_distribusi");
$stok = 0;
while ($data = mysql_fetch_array($distribusi)){
	$id_dist = $data['id_distribusi'];
	$tgl_dist = $data['tgl_dist'];
	$nama = $data['nama_distribusi'];
	$nama_barang = $data['nama_barang'];
	$jumlah = $data['jumlah'];
	$satuan = $data['satuan'];
	$h_satuan= $data['harga_satuan'];
	$barang = mysql_fetch_array(mysql_query("select * from data_barang where nama_barang='$nama_barang'"));
	$id = $barang['id'];
	$stok = $barang['stok_akhir']-$jumlah;
	$update = mysql_query("update data_barang set stok_akhir='$stok' where nama_barang='$nama_barang'");
	$sql = mysql_query("insert into dtl_distribusi values('$id_dist','$tgl_dist','$nama','$nama_barang','$jumlah','$satuan','$h_satuan','$stok','$id')");
	echo mysql_error();
}
echo "<script> alert('Distribusi Berhasil');window.open('views/cetak.php','_blank');</script>";
}
?>