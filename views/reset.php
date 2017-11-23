<?php
include '../koneksi.php';
$sql = mysql_query("delete from pembelian");
$sql1 = mysql_query("delete from kartustok");
$sql2 = mysql_query("delete from distribusi");
if ($sql2){
 echo "<script>alert('Data berhasil direset'); document.location='../index.php?page=daftar_barang'</script>";
}else{
	echo mysql_error();
	echo "<script>alert('Data gagal direset');</script>";
}
?>