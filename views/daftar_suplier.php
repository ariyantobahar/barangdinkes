 <div class="row">
          <div class="col-lg-12">
            <h1 align="center">Daftar Supplier</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
<div class="row">
<div class="col-lg-12">
<a href="?page=supplier"class="btn btn-primary">Tambah Supplier</a>
</div>
</div>
<p>
<div class="row">
 <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>Nama Supplier <i class="fa fa-sort"></i></th>
                    <th>No. HP <i class="fa fa-sort"></i></th>
                    <th>Alamat <i class="fa fa-sort"></i></th>
                    <th>Email <i class="fa fa-sort"></i></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php 
include 'koneksi.php';
$sql= mysql_query("select * from suplier");
while($data=mysql_fetch_array($sql)){
?>
              <tr>
              <td><?php echo $data['nama_supplier'] ?></td>
              <td><?php echo $data['no_hp'] ?></td>
              <td><?php echo $data['alamat'] ?></td>
              <td><?php echo $data['email'] ?></td>
              <td><a href="?page=edit_suplier&id=<?php echo $data['id'] ?>" class="btn btn-primary">ubah</a></td>
              <td><a href="?page=delete&id=<?php echo $data['id'] ?>" class="btn btn-danger"><span>hapus</span></a></td>
              </tr>
<?php              
}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="t_sup">
  <div class="modal-dialog modal-lg">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 