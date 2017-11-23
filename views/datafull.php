<table border="1">
<tr>
	<th>No</th>
	<th>Nama Barang</th>
	<th>Satuan</th>
	<th>H Satuan</th>
	<th>Stok Awal</th>
	<th>Barang Masuk</th>
	<th>Barang Keluar</th>
	<th>Stok Sisa</th>
	<th>Stok Total</th>
	<th>Harga B.Masuk</th>
	<th>Harga B.Keluar</th>
	<th>Harga Stok Total</th>
	<th>Sisa Harga</th>
 </tr>
<?php
include '../koneksi.php';
$no = 0;
$total = 0;
$t_masuk = 0;
$t_keluar = 0;
$sub_total = 0;
$sql= mysql_query("SELECT a.nama_barang, a.stok_awal, a.satuan, a.harga_satuan, SUM(b.barang_masuk) as b_masuk, SUM(b.barang_keluar) as b_keluar, a.stok_akhir from databarang a LEFT JOIN kartustok b ON a.nama_barang=b.nama_barang where  a.kode='1' GROUP BY a.nama_barang ASC");
while($data = mysql_fetch_array($sql)){
	$nama_barang = $data['nama_barang'];
	$stok_awal = $data['stok_awal'];
	$stok_akhir = $data['stok_akhir'];
	$barang_masuk = $data['b_masuk'];
	$barang_keluar = $data['b_keluar'];
	$satuan = $data['satuan'];
	$h_satuan = $data['harga_satuan'];
	$submasuk = $data['b_masuk']*$data['harga_satuan'];
	$subkeluar = $data['b_keluar']*$data['harga_satuan'];
	$sisa = $stok_akhir * $data['harga_satuan'];
	$s_total = $stok_awal + $barang_masuk;
	$sub_total = $s_total * $h_satuan;
	$no++;?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $nama_barang ?></td>
		<td align=center><?php echo $satuan ?></td>
		<td align=center><?php echo $h_satuan ?></td>
		<td align=center><?php echo $stok_awal ?></td>
		<td align=center><?php echo $barang_masuk ?></td>
		<td align=center><?php echo $barang_keluar ?></td>
		<td align=center><?php echo $stok_akhir ?></td>
		<td align=center><?php echo $s_total ?></td>
		<td align=center><?php echo $submasuk ?></td>
		<td align=center><?php echo $subkeluar ?></td>
		<td align=center><?php echo $sub_total ?></td>
		<td align=center><?php echo $sisa ?></td>
	</tr><?php 
}?>
</table>