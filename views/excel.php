<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		<form action="" method="post" enctype="multipart/form-data">
			<label>Pilih File .xls</label><input name="import" type="file" accept="application/vnd.ms-excel" required>
		</div>
			<button class="btn btn-default" name="simpan" id="save" type="submit">Import</button>
		</form>
	</div>
</div>

<?php
if(isset($_POST['simpan'])){

$nama = $_FILES['import']['type'];

if ($nama != 'application/vnd.ms-excel'){
	echo "<script>alert('Anda memasukkan file yang salah'); document.location='index.php'</script>";
}else{
//menggunakan class phpExcelReader
require_once '../excel_reader.php';

//koneksi ke database
include '../koneksi.php';
//$hapus = mysql_query("DELETE from databarang where nama_barang !=1 ");
//membaca file excel yang diupload
$data1 = new Spreadsheet_Excel_Reader($_FILES['import']['tmp_name']); 

//membaca jumlah baris dari excel
$baris=$data1->rowcount($sheet_index=0);
$kolom=$data1->colcount($sheet_index=0);
//nilai awal counter jumlah data yang sukses dan yang gagal di import
for($i=2;$i<=$baris;$i++){
	//membaca data nama
	$nama_barang=$data1->val($i,1);
	$stok_awal=$data1->val($i,2);
	$satuan=$data1->val($i,3);
	$harga_satuan=$data1->val($i,4);
	$kode=$data1->val($i,5);
	
	//insert kedalam tabel dosen
	   $simpan = mysql_query("INSERT INTO databarang VALUES ('$nama_barang','$stok_awal','$stok_awal','$satuan','$harga_satuan','$kode')");
	   if($simpan){
		   echo "<script>alert('Data berhasil di import'); document.location='excel.php'</script>";
		   
	   }else{
	   	echo mysql_error();
		   echo "<script>alert('Data gagal di import'); document.location='index.php?page=datacluster'</script>";
	   }
		}
}
} 
?>