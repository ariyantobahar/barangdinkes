<?php
include 'koneksi.php';
if (isset ($_GET['nama_barang'])){
$nama_barang= $_GET['nama_barang'];
$sql = mysql_query("delete from sementara where nama_barang='$nama_barang'");
echo "<script>document.location='index.php?page=distribusi'</script>";
}
else if(isset ($_GET['id_barang'])){
$id = $_GET['id_barang'];
$sql = mysql_query("delete from databarang where nama_barang='$id'");
if($sql){
	echo "<script>alert('Data Barang berhasil dihapus'); document.location='index.php?page=daftar_barang'</script>";
}else{
	echo "<script>alert('Data Barang gagal dihapus'); document.location='index.php?page=daftar_barang'</script>";
}
}else if(isset ($_GET['id_dist'])){
	$id_dist = $_GET['id_dist'];
	$sq = mysql_query("select * from dtl_distribusi where id_distribusi='$id_dist'");
	while ($data = mysql_fetch_array($sq)){
	$nama= $data['nama_barang'];
	$jum = $data['barang_keluar'];
	$que = mysql_fetch_array(mysql_query("select * from databarang where nama_barang='$nama'"));
	$stok= $que['stok_akhir'];
	$stok_terbaru = $stok + $jum;
	$up = mysql_query("update databarang set stok_akhir='$stok_terbaru' where nama_barang='$nama'");
	}
	$del = mysql_query("delete from kartustok where id_distribusi='$id_dist'");
	$sql = mysql_query("delete from distribusi where id_distribusi='$id_dist'");
	echo "<script>document.location='index.php?page=list_dis'</script>";
}
else if(isset ($_GET['n_barang'])){
	$n_barang = $_GET['n_barang'];
	$sql = mysql_query("delete from sementara2 where nama_barang='$n_barang'");
	echo "<script>document.location='index.php?page=pembelian'</script>";
}else if(isset ($_GET['id_pem'])){
	$id_pem = $_GET['id_pem'];
	$sq = mysql_query("select * from dtl_pembelian where id_pembelian='$id_pem'");
	while ($data = mysql_fetch_array($sq)){
	$nama= $data['nama_barang'];
	$jum = $data['jumlah'];
	$que = mysql_fetch_array(mysql_query("select * from databarang where nama_barang='$nama'"));
	$stok= $que['stok_akhir'];
	$stok_terbaru = $stok - $jum;
	$up = mysql_query("update databarang set stok_akhir='$stok_terbaru' where nama_barang='$nama'");
	}
	$del = mysql_query("delete from kartustok where id_distribusi='$id_pem'");
	$sql = mysql_query("delete from pembelian where id_pembelian='$id_pem'");
	echo "<script>document.location='index.php?page=list_pem'</script>";

}else if(isset ($_GET['n_dist'])){
	$n_dist = $_GET['n_dist'];
	$sql = mysql_query("delete from distributor where nama='$n_dist'");
	echo "<script>document.location='index.php?page=list_dist'</script>";
}else if(isset ($_GET['n_bid'])){
	$n_bid = $_GET['n_bid'];
	$sql = mysql_query("delete from bidang where nama='$n_bid'");
	if($sql){
	echo "<script>alert('Data berhasil dihapus');document.location='index.php?page=list_bid'</script>";
}
}
?>