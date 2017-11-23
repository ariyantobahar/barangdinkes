<div class="panel panel-default">
<div class="panel-heading"><center><h4><b>Form Pembelian Barang</b></h4></center></div>
	<div class="panel-body">
			<form class="form-horizontal" method="post" action="">
<?php include 'koneksi.php';
include 'autonotap.php';
$ctable = "CREATE TABLE if not exists sementara2(
		id_pembelian varchar(50) not null,
		tgl_pembelian date not null,
		id_nota varchar(50) not null,
		supplier varchar(50) not null,
		nama_barang varchar(50) not null,
		satuan varchar(50) not null,
		jumlah float not null,
		harga_satuan float not null)";
		$kueri = mysql_query($ctable);?>
							<input type="hidden" name="id_pem" value="<?php echo auto_notap(); ?>">		 
            				<input type="hidden" name="tgl_pembelian" value="<?php echo date("Y-m-d"); ?>">
						<div class="form-group">
								<label class="col-sm-2 control-label">Supplier</label>
										<div class="col-sm-4">
										<select class="form-control" name="supplier">
										<?php $sql = mysql_query("SELECT supplier from sementara2 order by supplier desc limit 1");
										$data2 = mysql_fetch_array($sql);
										?>
										<option><?php echo $data2['supplier']; ?></option>
										<?php
										$que = mysql_query("select nama from distributor");
										while($data3 =mysql_fetch_array($que)){?>
										<option><?php echo $data3['nama']; ?></option>
										<?php 
										}
										 ?>
										</select>
										 </div>
						<label class="col-sm-2 control-label">ID.Nota</label>
						<div class="col-sm-4">
						<input type="text" class="form-control" name="id_nota" value="<?php 
						$i_nota = mysql_fetch_array(mysql_query("select id_nota from sementara2"));
						echo $i_nota['id_nota'];
						 ?>">	
						</div>
						</div>
						<div class="form-group">
						<center><h4><label>Item Yang Dibeli</label></h4></center>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Cari barang</label>
										<div class="col-sm-4">
											 <input type="text" class="form-control" name="brg" id="search-box" autocomplete="off">
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
$tgl = $_POST['tgl_pembelian'];
$nama = $_POST['supplier'];
$nama_brg = $_POST['brg'];
$jumlah = $_POST['jml'];
$id_pembelian = $_POST['id_pem'];
$id_nota = $_POST['id_nota'];
$sql1 = mysql_query("select * from databarang where nama_barang='$nama_brg'");
$data1 = mysql_fetch_array($sql1);
$harga = $data1['harga_satuan'];
$satuan = $data1['satuan'];
$pembanding = mysql_fetch_array(mysql_query("select * from sementara2 where nama_barang='$nama_brg'"));
$total = 0;
if ($nama_brg == $pembanding['nama_barang']){
	$total = $jumlah + $pembanding['jumlah'];
	$update = mysql_query("update sementara2 set jumlah='$total' where nama_barang='$nama_brg'");
	echo "<script> window.location='index.php?page=pembelian';</script>";	
}
else{
$simpan = mysql_query("insert into sementara2 values('$id_pembelian','$tgl','$id_nota','$nama','$nama_brg','$satuan','$jumlah','$harga')");
	echo "<script> window.location='index.php?page=pembelian';</script>";	
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
$get = mysql_query("select * from sementara2");
$total = 0;
$total_harga = 0;
while ($data =mysql_fetch_array($get))
{$subtotal = $data['jumlah'];
$total = $total + $subtotal;
$subharga = $data['harga_satuan']*$data['jumlah'];
$total_harga = $total_harga + $subharga ;
$id_pembelian = $data['id_pembelian'];
$tgl = $data['tgl_pembelian'];?>
				<tr>
                <td style="text-align: center"><?php echo $data['nama_barang'] ?></td>
                <td style="text-align: center"><?php echo $data['satuan'] ?></td>
                <td><?php echo 'Rp '.number_format($data['harga_satuan'],2)?></td>
                <td style="text-align: center"><?php echo $data['jumlah']  ?></td>
                <td style="text-align: center"><?php echo 'Rp '.number_format($subharga,2)?></td>
                <td><a href="?page=delete&n_barang=<?php echo $data['nama_barang'] ?>" class="btn btn-primary">delete</a></td>
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
$dist = mysql_query("select * from sementara2");
$row = mysql_num_rows($dist);
if ($row < 1){
	echo "<script> alert('Anda harus mengisi data terlebih dahulu');window.location='index.php?page=pembelian';</script>";	
}else{
$nama = mysql_fetch_array(mysql_query("select * from sementara2"));
$selesai = mysql_query("insert into pembelian values('$id_pembelian','$nama[supplier]','$tgl','$total','$total_harga')");
$stok = 0;
while ($data1 = mysql_fetch_array($dist)){
	$id_pem = $data1['id_pembelian'];
	$tgl_pem = $data1['tgl_pembelian'];
	$id_nota = $data1['id_nota'];
	$supp = $data1['supplier'];
	$nama_barang = $data1['nama_barang'];
	$satuan = $data1['satuan'];
	$jumlah = $data1['jumlah'];
	$h_satuan = $data1['harga_satuan'];
	$barang = mysql_fetch_array(mysql_query("select * from databarang where nama_barang='$nama_barang'"));
	$stok = $barang['stok_akhir']+$jumlah;
	$s_awal = $barang['stok_awal'];
	$update = mysql_query("update databarang set stok_akhir='$stok' where nama_barang='$nama_barang'");
	$goo = mysql_query("insert into dtl_pembelian values('$id_pem','$id_nota','$tgl_pem','$supp','$nama_barang','$satuan','$h_satuan','$jumlah','$stok')");
	$k_stok = mysql_query("insert into kartustok values('$id_pem','$tgl_pem','$supp','$nama_barang','$satuan','$h_satuan','$s_awal','$barang[stok_akhir]','$jumlah','','$stok','') ");
	
}
echo "<script> alert('Pembelian Berhasil');window.location='index.php?page=list_pem';</script>";
$delete = mysql_query("drop table sementara2");	
}
}
?>