<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=kartustok.xls");

$kode = $_GET['kode'];
include 'datafull.php';
?>