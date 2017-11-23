<div class="row">
          <div class="col-lg-12">
            <h1>Data Cluster</h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
<?php 
session_start();
if($_SESSION['hak_akses']=='admin'){
include "excel.php";
}else{

}
?>
<div class="form-group">
                <form action="" method="post">
                <label>Pilih Tahun</label>
                <select class="form-control" name='tahun'>
<?php 
include 'koneksi.php';
$ah = mysql_query("SELECT distinct tahun FROM data ORDER BY data.Tahun ASC");
while($tah = mysql_fetch_array($ah)){
 ?>
                  <option><?php echo $tah['tahun']?></option>
              <?php
}?>               
                  </select>
                <button class="btn btn-primary" name="ubah" id="save" type="submit">Ok</button>
                </form>
                  </div>
<div class="row">
          <div class="col-lg-12">
          		<div class="table-responsive">
                <table class="table table-bordered table-hover table striped">
                  <tr>
                    <th>Kecamatan</th>
                    <th>Faktor Pendidikan</th>
                    <th>Faktor Kependudukan</th>
                    <th>Faktor Budaya</th>
                    <th>Faktor Ekonomi</th> 
                    <th>Faktor Kesehatan</th>
                  </tr>
<?php
if(isset($_POST['ubah'])){
$tahun = $_POST['tahun'];
$_SESSION['tahun']= $tahun;
$sql = mysql_query("select * from data where Tahun='$tahun'");
while($data = mysql_fetch_array($sql)){
?>
                  <tr>
                    <td><?php echo $data['Kecamatan']?></td>
                    <td><?php echo $data['F_Pendidikan']?></td>
                    <td><?php echo $data['F_Kependudukan']?></td>
                    <td><?php echo $data['F_Budaya']?></td>
                    <td><?php echo $data['F_Ekonomi']?></td>
                    <td><?php echo $data['F_Kesehatan']?></td>
                  </tr>
                <?php
                }
              }
                ?>
                </table>
              </div>
          </div>
         </div>
