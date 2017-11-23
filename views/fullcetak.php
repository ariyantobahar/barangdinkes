<?php 
require '../koneksi.php';
$kode = $_GET['kode'];
$nama_barang = $_POST['nama_barang'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_selesai = $_POST['tgl_selesai'];
		$strhtml .= "<img src=../Untitled.png>";
		$strhtml .= "<h3 align=center>Kartu Stok</h3><br>";
		$strhtml .= "<table style=width:800px; border=1>
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
				
			</tr>";
		$no = 0;
		$total = 0;
		$t_masuk = 0;
		$t_keluar = 0;
		$sub_total = 0;
		$sql = mysql_query("SELECT a.nama_barang, a.stok_awal, a.satuan, a.harga_satuan, SUM(b.barang_masuk) as b_masuk, SUM(b.barang_keluar) as b_keluar, a.stok_akhir from databarang a LEFT JOIN kartustok b ON a.nama_barang=b.nama_barang where  a.kode='$kode' GROUP BY a.nama_barang ASC");
		while ($data = mysql_fetch_array($sql)){
		$nama_barang = $data['nama_barang'];
		$stok_awal = $data['stok_awal'];
		$stok_akhir = $data['stok_akhir'];
		$barang_masuk = $data['b_masuk'];
		$barang_keluar = number_format((float)$data['b_keluar'],2);
		$satuan = $data['satuan'];
		$h_satuan = $data['harga_satuan'];
		$submasuk = number_format((float)$data['b_masuk']*$data['harga_satuan'],2);
		$subkeluar = number_format((float)$data['b_keluar']*$data['harga_satuan'],2);
		$sisa = number_format((float)$stok_akhir * $data['harga_satuan'],2);
		$s_total = $stok_awal + $barang_masuk;
		$sub_total = number_format((float)$s_total * $h_satuan,2);
		$no++;
		$strhtml .= "
		<tr>
				<td>$no</td>
				<td>$nama_barang</td>
				<td align=center>$satuan</td>
				<td align=center>$h_satuan</td>s
				<td align=center>$stok_awal</td>
				<td align=center>$barang_masuk</td>
				<td align=center>$barang_keluar</td>
				<td align=center>$stok_akhir</td>
				<td align=center>$s_total</td>
				<td align=center>$submasuk</td>
				<td align=center>$subkeluar</td>
				<td align=center>$sub_total</td>
				<td align=center>$sisa</td>
		   </tr>";
		}
		$strhtml .= "</table>";
		

// Panggil mPdf
require ("../MPDF57/mpdf.php");


$mpdf = new mPDF('utf-8', 'A4', 0, '', 10, 10, 5, 1, 1, 0, 'L');
//$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($strhtml);
$mpdf->Output();