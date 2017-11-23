<?php 
$tgl = date("Y-m-d");
$sql = mysql_query("select * into outfile '../../htdocs/barang/backup/$tgl.sql' from databarang");

?>