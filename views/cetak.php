<?php 
require '../koneksi.php';
		$strhtml .= "<img src=../Untitled.png>";
		$strhtml .= "<h3 align=center>Distribusi Barang</h3><br>";
		$strhtml .= "<table style=width:800px;>";
		$nama_penerima = mysql_fetch_array(mysql_query("select * from sementara order by nama_distribusi desc"));
		$strhtml .= "
			<tr>
				<th align=left>Penerima : $nama_penerima[nama_distribusi]</th>
				<th align=right>Tanggal : ".date('d F Y', strtotime($nama_penerima['tgl_dist']))."</th>
			</tr>";
		$strhtml .= "</table>";
		$strhtml .= "<table style=width:800px; border=1>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Satuan</th>
				<th>Jumlah</th>
			</tr>";
		$no = 0;
		$total = 0;
		$total_harga = 0;
		$list = mysql_query("select * from sementara");
		while ($data = mysql_fetch_array($list)){
		$subtotal = $data['jumlah'];
		$penerima = $data['penerima'];
		$total = $total + $subtotal;
		$tgl = $data['tgl_dist'];
		$no++;
		$strhtml .= "
		<tr>
				<td align=center>$no</td>
				<td>$data[nama_barang]</td>
				<td align=center>$data[satuan]</td>
				<td align=center>$data[jumlah]</td>
		   </tr>";
		}
		$strhtml .= 
			"<tr>
				<td colspan=3><b>Total</b></td>
				<td align=center><b>$total</b></td>
			</tr>";
		$strhtml .= "</table>";
		$strhtml .= "<p align=right><b>Yang menerima barang<b>";
		$strhtml .= "<br><br><br><br><div align=right><b><u>$penerima</u><b></div>";

// Panggil mPdf
require ("../MPDF57/mpdf.php");


$mpdf = new mPDF('utf-8', 'A4', 0, '', 10, 10, 5, 1, 1, 1, '');
//$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($strhtml);
$mpdf->Output();
$delete = mysql_query("drop table sementara");