<?php 
$id_dist=$_GET['id_distribusi'];
require '../koneksi.php';
		$strhtml .= "<img src=../Untitled.png>";
		$strhtml .= "<h3 align=center>Distribusi Barang</h3><br>";
		$strhtml .= "<table style=width:800px;>";
		$nama_penerima = mysql_fetch_array(mysql_query("select nama,tanggal from kartustok where id_distribusi='$id_dist' order by nama desc limit 1"));
		$strhtml .= "
			<tr>
				<th align=left>Penerima : $nama_penerima[nama]</th>
				<th align=right>Tanggal : ".date('d F Y', strtotime($nama_penerima['tanggal']))."</th>
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
		$list = mysql_query("select * from kartustok where id_distribusi='$id_dist'");
		while ($data = mysql_fetch_array($list)){
		$subtotal = $data['barang_keluar'];
		$penerima=$data['nama'];
		$total = $total + $subtotal;
		$no++;
		$strhtml .= "
		<tr>
				<td align=center>$no</td>
				<td>$data[nama_barang]</td>
				<td align=center>$data[satuan]</td>
				<td align=center>$data[barang_keluar]</td>
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