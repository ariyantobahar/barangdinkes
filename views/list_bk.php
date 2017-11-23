<div class="panel panel-default">
<div class="panel-heading"><center><h4><b>Detail</b></h4></center></div>
	<div class="panel-body">
			<form class="form-horizontal" method="post" action="">
<?php include 'koneksi.php';?>
		<div class="form-group">
			<center><h4><label>List Barang Distribusi</label></h4></center>
		</div>
	<div class="form-group">
		<div class="col-sm-12">
            <div class="table-responsive">
            <form class="form-horizontal" method="post" action="">
              <table class="table table-bordered table-hover table-striped" align="center">
                <thead>
                  <tr>
                    <th style="text-align: center">Nama Barang</th>
                    <th style="text-align: center">Satuan</th>
                    <th style="text-align: center">Harga Satuan</th>
                    <th style="text-align: center">Jumlah Barang</th>
                    <th style="text-align: center">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
<?php 
$id = $_GET['id_dist'];
$get = mysql_query("select * from dtl_distribusi where id_distribusi = '$id'");
$total = 0;
$total_harga = 0;
while ($data =mysql_fetch_array($get))
{
$subtotal = $data['barang_keluar'];
$total = $total + $subtotal;
$subharga = $data['harga_satuan']*$data['barang_keluar'];
$total_harga = $total_harga + $subharga;?>
				<tr>
                <td style="text-align: center"><?php echo $data['nama_barang'] ?></td>
                <td style="text-align: center"><?php echo $data['satuan'] ?></td>
                <td><?php echo 'Rp '.number_format($data['harga_satuan'],2)?></td>
                <td style="text-align: center"><?php echo $data['barang_keluar']  ?></td>
                <td style="text-align: center"><?php echo 'Rp '.number_format($subharga,2)?></td>
                </tr><?php
}
?>
				<tr>
				<td colspan="3" style="text-align: center"><b>Total</b></td>
				<td style="text-align: center"><b><?php echo $total?></b></td>
				<td style="text-align: center"><b><?php echo 'Rp '.number_format($total_harga,2) ?></b></td>
				</tr>
                </tbody>
                </table>
                
                </div>
                </div>
                </div>
    		<div class="col-sm-13" align="right">
            <a href="?page=list_dis" class="btn btn-primary">Kembali</a>
            </div> 
            </form>
				</div>
				</div>