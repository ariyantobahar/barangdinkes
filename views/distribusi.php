<div class="panel panel-default">
		<div class="panel-heading"><center><h4><b>Form Barang Keluar</b></h4></center></div>
	<div class="panel-body">
			<form class="form-horizontal" method="post" action="">
<?php include 'koneksi.php';
include 'autonota.php';
$ctable = "CREATE TABLE if not exists sementara(
		id_distribusi varchar(50) not null,
		tgl_dist date not null,
		nama_distribusi varchar(50) null,
		nama_barang varchar(50) not null,
		jumlah float(10) not null,
		satuan varchar(50) not null,
		harga_satuan int(10) not null,
		keterangan varchar(50) null,
		penerima varchar (200) not null)";

		$kueri = mysql_query($ctable);?>

							<input type="hidden" name="id_dist" value="<?php echo auto_nota(); ?>">
            			<!---	<input type="hidden" name="tgl_dist" value="<?php echo date("Y-m-d"); ?>"> 	-->
						<div class="form-group">
								<label class="col-sm-2 control-label">Bidang </label>
										<div class="col-sm-10">
										<?php $n_dist = mysql_fetch_array(mysql_query("select nama_distribusi from sementara order by nama_distribusi desc limit 1")); ?>
										<select name="dist_name" class="form-control">
  											<option value="<?php echo $n_dist['nama_distribusi']; ?>"><?php echo $n_dist['nama_distribusi']; ?></option>
  											<?php  
  											$get = mysql_query("select * from bidang order by nama asc");
  											while ($data = mysql_fetch_array($get)){?>
  											<option value="<?php echo $data['nama'] ?>"><?php echo $data['nama']?></option>	
  											<?php
  											}
  											?>
										</select> 
										 </div>
						</div>
						<div class="form-group">
						<?php 
						$pen = mysql_fetch_array(mysql_query("select penerima from sementara order by penerima desc limit 1"));
						?>
						<label class="col-sm-2 control-label">Penerima</label>
						<div class="col-sm-4">
						<input type="text" class="form-control" name="penerima" value="<?php echo $pen['penerima']; ?>">
						</div>
						<label class="col-sm-2 control-label">Tanggal</label>
						<div class="col-sm-4">
						<?php $t_sem = mysql_fetch_array(mysql_query("select tgl_dist from sementara order by tgl_dist desc limit 1")); ?>
						<div class="input-group date" id="datePicker">
            			<input type="text" name="tgl_dist" class="form-control" value="<?php echo $t_sem['tgl_dist']?>" id="tgl_dist" autocomplete="off">
           				<span class="input-group-addon"><span class="fa fa-calendar"></span>
        				 </div>
						</div>
						</div>
						<div class="form-group">
						<center><h4><label>Item Distribusi</label></h4></center>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Cari barang</label>
										<div class="col-sm-4">
											 <input type="text" class="form-control" name="brg" id="search-box" autocomplete="off">
											 <div id="suggesstion-box"></div>
										 </div>
										 <label class="col-sm-2 control-label">Jumlah</label>
											<div class="col-sm-4">
											 <input type="text" class="form-control" name="jml" required autocomplete="off">
						</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Keterangan</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="keterangan" placeholder="Khusus kupon bensin...">
						</div>
						</div>
						 <div class="col-sm-13" align="right">
            <button class="btn btn-primary" name="simpan" type="submit">Tambah</button>
            </div>
						</form>
<?php
if(isset($_POST['simpan'])){
$tgl = $_POST['tgl_dist'];
$nama = $_POST['dist_name'];
$penerima = $_POST['penerima'];
$nama_brg = $_POST['brg'];
$jumlah = $_POST['jml'];
$id_dist = $_POST['id_dist'];
$keterangan = $_POST['keterangan'];
$sql1 = mysql_query("select * from databarang where nama_barang='$nama_brg'");
$pembanding = mysql_fetch_array(mysql_query("select * from sementara where nama_barang='$nama_brg'"));
$stok_tdis = $pembanding['jumlah']+$jumlah;
$data1 = mysql_fetch_array($sql1);
$harga = $data1['harga_satuan'];
$stok_akhir = $data1['stok_akhir'];
$satuan = $data1['satuan'];
$total = 0;
if ($jumlah > $stok_akhir || $stok_tdis > $stok_akhir){
echo "<script> alert('Stok barang tidak mencukupi, sisa stok = $stok_akhir');window.location='index.php?page=distribusi';</script>";	
}
else{
if ($nama_brg == $pembanding['nama_barang']){
	$total = $jumlah + $pembanding['jumlah'];
	$update = mysql_query("update sementara set jumlah='$total' where nama_barang='$nama_brg'");
	echo "<script> window.location='index.php?page=distribusi';</script>";	
}
else{
echo mysql_error();
$simpan = mysql_query("insert into sementara values('$id_dist','$tgl','$nama','$nama_brg','$jumlah','$satuan','$harga','$keterangan','$penerima')");
	echo "<script> window.location='index.php?page=distribusi';</script>";	
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
$get = mysql_query("select * from sementara");
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
                <td><?php echo 'Rp '.number_format($data['harga_satuan'],2)?></td>
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
$dist = mysql_query("select * from sementara");
$row = mysql_num_rows($dist);
if ($row < 1){
	echo "<script> alert('Anda harus mengisi data terlebih dahulu');window.location='index.php?page=distribusi';</script>";	
}else{
$nama = mysql_fetch_array(mysql_query("select * from sementara"));
$selesai = mysql_query("insert into distribusi values('$id_dist','$nama[nama_distribusi]','$tgl','$total','$total_harga')");
$stok = 0;
while ($data1 = mysql_fetch_array($dist)){
	$id_dist = $data1['id_distribusi'];
	$tgl_dist = $data1['tgl_dist'];
	$nama = $data1['nama_distribusi'];
	$nama_barang = $data1['nama_barang'];
	$jumlah = $data1['jumlah'];
	$satuan = $data1['satuan'];
	$h_satuan = $data1['harga_satuan'];
	$ket = $data1['keterangan'];
	$barang = mysql_fetch_array(mysql_query("select * from databarang where nama_barang='$nama_barang'"));
	$stok = $barang['stok_akhir']-$jumlah;
	$stok_awal = $barang['stok_awal'];
	$update = mysql_query("update databarang set stok_akhir='$stok' where nama_barang='$nama_barang'");
	$goo = mysql_query("insert into dtl_distribusi values('$id_dist','$tgl_dist','$nama','$nama_barang','$jumlah','$satuan','$h_satuan','$stok','$ket')");
	$k_stok = mysql_query("insert into kartustok values('$id_dist','$tgl_dist','$nama','$nama_barang','$satuan','$h_satuan','$stok_awal','$barang[stok_akhir]','','$jumlah','$stok','$ket')");
	
}
echo "<script> alert('Distribusi Berhasil');window.location='index.php?page=list_dis';window.open('views/cetak.php','_blank');</script>";	
}
}
?>