<?php 
include 'koneksi.php';
	function auto_notap() {  
		$sql = "select * from ( select * from pembelian order by id_pembelian desc limit 1 )sub order by id_pembelian asc";  
		$kueri = mysql_query($sql);  
		$data = mysql_fetch_array($kueri);  
		$id = trim($data['id_pembelian'],"PEMB0");  
		$next = (int)$id + 1;  
		$nextid = "PEMB0".$next;  
		while (nextId($nextid)) {  
			$next   = $next + 1;  
			$nextid = "PEMB0".$next;  
		}    
		return $nextid;   
		}  
	function nextId($id) { 
		$cek = mysql_query("select id_pembelian from pembelian where id_pembelian='$id'");  
		if(mysql_num_rows($cek) < 1) {  
			return false;  
		} else {  
		return true;  
		}  
		}
?>  