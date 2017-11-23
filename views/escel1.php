<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		<form action="" method="post" enctype="multipart/form-data">
			<label>Pilih File .xls</label> <input name="import" type="file" required>
		</div>
			<button class="btn btn-default" name="simpan" id="save" type="submit">Import</button>
		</form>
	</div>
</div>

<?php
if(isset($_POST['simpan'])){

$nama = $_FILES['import']['type'];

if ($nama != 'application/vnd.ms-excel'){
	echo "<script>alert('Anda memasukkan file yang salah'); document.location='index.php?page=hasil'</script>";
}else{

//menggunakan class phpExcelReader
require_once 'excel_reader.php';

//koneksi ke database
include 'koneksi.php';
$hapus = mysql_query("DELETE from hasil where kecamatan !=1 ");
//membaca file excel yang diupload
$data1 = new Spreadsheet_Excel_Reader($_FILES['import']['tmp_name']);

//membaca jumlah baris dari excel
$baris=$data1->rowcount($sheet_index=0);

//nilai awal counter jumlah data yang sukses dan yang gagal di import
for($i=2;$i<=$baris;$i++){
	//membaca data nama
	$kecamatan=$data1->val($i,1);
	$pendidikan=$data1->val($i,2);
	$penduduk=$data1->val($i,3);
	$budaya=$data1->val($i,4);
	$ekonomi=$data1->val($i,5);
	$kesehatan=$data1->val($i,6);
	$cluster=$data1->val($i,7);
	
	//insert kedalam tabel dosen
	   $simpan = mysql_query("INSERT INTO hasil VALUES ('$kecamatan','$pendidikan','$penduduk','$budaya','$ekonomi','$kesehatan','$cluster')");
	   if($simpan){
		   echo "<script>alert('Data berhasil di import'); document.location='index.php?page=hasil'</script>";
		   
	   }else{
		   echo "<script>alert('Data gagal di import'); document.location='index.php?page=hasil'</script>";
	   }
		}
	}
} 
?>