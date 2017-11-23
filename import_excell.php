
<!-- form import/upload -->

<html>
<head>
 <title>Import Excel</title>
</head>
 
 <body>
 <form method="post" action="import.php" enctype="multipart/form-data">
 Pilih File <input type="file" name="datague"/>
 
<input type="submit" name="import" value="Import"/>
 </form>
 </body>
</html>


<!-- script actionnya -->
<?php
include "koneksi.php";
require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');

// Ambil Value Dari Inputan Form
$fileexcel = $_FILES['datague']['name'];
$data->read($fileexcel);
 
for ($x=2; $x <= count($data->sheets[0]["cells"]); $x++) {
    // Mendefinisikan Shell dalam File Excel Sejumlah Field yang ada di tabel
    $nama = $data->sheets[0]["cells"][$x][1];
 $jeniskelamin = $data->sheets[0]["cells"][$x][2];
    $agama = $data->sheets[0]["cells"][$x][3];
 $alamat = $data->sheets[0]["cells"][$x][4];
 // Simpan Ke Tabel
    $simpan = mysql_query("INSERT INTO data (nama,jenis_kelamin,agama,alamat) VALUES ('$nama','$jeniskelamin','$agama','$alamat')");
 if (!$simpan){
 echo "Data Ke ".$x." GAGAL disimpan!";
 }
}
echo "<script>alert('Data Berhasil di Import!'); history.go(-1);</script>";
?>
