<?php 
include 'koneksi.php';
	function auto_nota() {  
		$sql = "select * from ( select * from distribusi order by id_distribusi desc limit 1 )sub order by id_distribusi asc";  
		$kueri = mysql_query($sql);  
		$data = mysql_fetch_array($kueri);  
		$id = trim($data['id_distribusi'],"DIST0");  
		$next = (int)$id + 1;  
		$nextid = "DIST0".$next;  
		while (nextId($nextid)) {  
			$next   = $next + 1;  
			$nextid = "DIST0".$next;  
		}    
		return $nextid;   
		}  
	function nextId($id) { 
		$cek = mysql_query("select id_distribusi from distribusi where id_distribusi='$id'");  
		if(mysql_num_rows($cek) < 1) {  
			return false;  
		} else {  
		return true;  
		}  
		}
?>  