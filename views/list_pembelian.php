<div class="row">
          <div class="col-lg-12">
            <h1 align="center">List Pembelian Barang</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
<div class="row">
<div class="form-group">
<div class="col-sm-8">
<a href="?page=pembelian" class="btn btn-primary"><i class="fa fa-plus-square"> Pembelian Baru</i></a>
</div>
</div>
</div>
<p>
<div class="row">
 <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter paginated">
                <thead>
                  <tr>
                    <th>Id Pembelian<i class="fa fa-sort"></i></th>
                    <th>Distributor<i class="fa fa-sort"></i></th>
                    <th>Tanggal Pembelian<i class="fa fa-sort"></i></th>
                    <th>Total Barang <i class="fa fa-sort"></i></th>
                    <th>Total Harga<i class="fa fa-sort"></i></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php 
include 'koneksi.php'; 
$sql= mysql_query("select * from pembelian");
while($data=mysql_fetch_array($sql)){
?>
              <tr>
              <td><?php echo $data['id_pembelian'] ?></td>
              <td><?php echo $data['distributor'] ?></td>
              <td><?php echo $data['tgl_pem']; ?></td>
              <td><?php echo $data['tot_barang'] ?></td>
              <td><?php echo 'Rp '.number_format($data['tot_harga'],2) ?></td>
              <td><a href="?page=delete&id_pem=<?php echo $data['id_pembelian'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><span>hapus</span></a></td>
              <td><a href="?page=detail_pem&id_pem=<?php echo $data['id_pembelian'] ?>" class="btn btn-primary"><span>detail</span></a></td>
              </tr>
<?php              
}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->