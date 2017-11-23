 <div class="row">
          <div class="col-lg-12">
            <h1 align="center">List Barang Keluar</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
<div class="row">
<div class="form-group">
<div class="col-sm-5">
<a href="?page=distribusi" class="btn btn-primary"><i class="fa fa-plus-square"> Buat Baru</i></a>
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
                    <th>Id Distribusi<i class="fa fa-sort"></i></th>
                    <th>Tanggal Distribusi<i class="fa fa-sort"></i></th>
                    <th>Penerima<i class="fa fa-sort"></i></th>
                    <th>Total Barang <i class="fa fa-sort"></i></th>
                    <th>Total Harga<i class="fa fa-sort"></i></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php 
include 'koneksi.php';
$sql= mysql_query("select * from distribusi order by tgl_dist asc");
while($data=mysql_fetch_array($sql)){
?>
              <tr>
              <td><?php echo $data['id_distribusi'] ?></td>
              <td><?php echo $data['tgl_dist'] ?></td>
              <td><?php echo $data['penerima']; ?></td>
              <td><?php echo $data['tot_barang'] ?></td>
              <td><?php echo 'Rp '.number_format($data['tot_harga'],2) ?></td>
              <td><a href="?page=delete&id_dist=<?php echo $data['id_distribusi'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="fa fa-eraser"><span> Hapus</span></a></td></i>
              <td><a href="?page=detail&id_dist=<?php echo $data['id_distribusi'] ?>" class="btn btn-primary"><span> Detail</span></a></td>
              <td><a href="views/cetak_kartu.php?&id_distribusi=<?php echo $data['id_distribusi'] ?>" class="btn btn-default" target="_blank"><i class="fa fa-print"><span> Cetak</span></a></td></i>
              </tr>
<?php              
}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->