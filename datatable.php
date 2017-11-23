<link rel="stylesheet" href="dataTables.bootstrap.min.css">
<link rel="stylesheet" href="bootstrap.min.css">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Harga</th>
        </tr>
        </thead>
        <tbody>
<?php 
include 'koneksi.php';
$sql= mysql_query("select * from databarang");
while($data=mysql_fetch_array($sql)){?>
	<tr>
              <td><?php echo $data['nama_barang'] ?></td>
              <td><?php echo $data['satuan'] ?></td>
              <td><?php echo $data['harga_satuan'] ?></td>
    </tr>
<?php
}
?>
    </tbody>
    </table>
<script src="jquery-1.10.1.min.js"></script>
<script src="jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>