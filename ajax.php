<?php
require_once 'koneksi.php';

if($_GET['type'] == 'country'){
	$result = mysql_query("SELECT nama_barang FROM barang where name LIKE '".strtoupper($_GET['name_startsWith'])."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['name']);	
	}	
	echo json_encode($data);
}

?>