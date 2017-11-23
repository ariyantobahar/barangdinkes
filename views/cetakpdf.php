<?php 
require '../koneksi.php';
$nama_barang = $_POST['nama_barang'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_selesai = $_POST['tgl_selesai'];
		$strhtml .= "<img src=../Untitled.png>";
		$strhtml .= "<h3 align=center>Kartu Stok</h3><br>";
		$strhtml .= "<table style=width:800px;>";
		$strhtml .= "
			<tr>
				<th align=left>Nama Barang : $nama_barang</th>
			</tr>";
		$strhtml .= "</table>";
		$strhtml .= "<table style=width:800px; border=1>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Distributor/Penerima</th>
				<th>Stok Awal</th>
				<th>Satuan</th>
				<th>Harga Satuan</th>
				<th>Barang Masuk</th>
				<th>Barang Keluar</th>
				<th>Stok Sisa</th>
				<th>Keterangan</th>
				<th>Harga B.Masuk</th>
				<th>Harga B.Keluar</th>
				<th>Sisa Harga</th>
			</tr>";
		$no = 0;
		$total = 0;
		$t_masuk = 0;
		$t_keluar = 0;
		$t_hargamasuk = 0;
		$t_hargakeluar=0;
		$list = mysql_query("select * from kartustok where tanggal >='$tgl_mulai' and tanggal <='$tgl_selesai' and nama_barang='$nama_barang' order by tanggal ASC");
		while ($data = mysql_fetch_array($list)){
		$tanggal = $data['tanggal'];
		$penerima = $data['nama'];
		$stok_awal = $data['stok_awal'];
		$h_satuan = $data['harga_satuan'];
		$stok_akhir = $data['stok_akhir'];
		$barang_masuk = $data['barang_masuk'];
		$barang_keluar = $data['barang_keluar'];
		$satuan = $data['satuan'];
		$harga_satuan = $data['satuan'];
		$stok_sisa = $data['stok_sisa'];
		$keterangan = $data['keterangan'];
		$t_keluar = $t_keluar + $data['barang_keluar'];
		$t_masuk = $t_masuk + $data['barang_masuk'];
		$sisa = $stok_sisa *$h_satuan;
		$submasuk = $barang_masuk*$h_satuan;
		$subkeluar = $barang_keluar*$h_satuan;
		$t_hargamasuk = $t_hargamasuk + $submasuk;
		$t_hargakeluar = $t_hargakeluar +$subkeluar;
		$no++;
		$strhtml .= "
		<tr>
				<td align=center>$no</td>
				<td>$tanggal</td>
				<td align=center>$penerima</td>
				<td align=center>$stok_awal</td>
				<td align=center>$satuan</td>
				<td align=center>$h_satuan</td>
				<td align=center>$barang_masuk</td>
				<td align=center>$barang_keluar</td>
				<td align=center>$stok_sisa</td>
				<td align=center>$keterangan</td>
				<td align=center>$submasuk</td>
				<td align=center>$subkeluar</td>
				<td align=center>$sisa</td>
		   </tr>";
		}
		$strhtml .= 
			"<tr>
				<td colspan=6><b>Total</b></td>
				<td align=center><b>$t_masuk</b></td>
				<td align=center><b>$t_keluar</b></td>
				<td></td>
				<td></td>
				<td align=center><b>$t_hargamasuk</b></td>
				<td align=center><b>$t_hargakeluar</b></td>
				<td align=center><b>$sisa</b></td>
			</tr>";
		$strhtml .= "</table>";

// Panggil mPdf
require ("../MPDF57/mpdf.php");


$mpdf = new mPDF('utf-8', 'A4', 0, '', 10, 10, 5, 1, 1, 1, '');
//$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($strhtml);
$mpdf->Output();