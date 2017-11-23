    <!DOCTYPE html>   
    <html lang="en">   
    <head>   
    <meta charset="utf-8">   
    <title>Final Output</title>   
    <meta name="description" content="Bootstrap.">  
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>  
    <body style="margin:20px auto">  
    <div class="container">
    <div class="row header" style="text-align:center;color:green">
    <h3>Bootstrap</h3>
    </div>
    <table id="myTable" class="table table-striped" >  
            <thead>  
              <tr>  
                <th>1</th>  
                <th>EMPName</th>  
                <th>Country</th>  
                <th>Salary</th>  
				<th>5</th>
				<th>6</th>
              </tr>  
            </thead>  
            <tbody>  
              <?php 
include 'koneksi.php';
$sql= mysql_query("select * from data_barang");
while($data=mysql_fetch_array($sql)){
?>
              <tr>
              <td><?php echo $data['nama_barang'] ?></td>
              <td><?php echo $data['stok_awal'] ?></td>
              <td><?php echo $data['stok_akhir'] ?></td>
              <td><?php echo $data['satuan'] ?></td>
              <td><?php echo 'Rp '.number_format($data['harga_satuan'],2) ?></td>
              <td><?php echo 'Rp '.number_format($data['stok_akhir']*$data['harga_satuan'],2) ?></td>
              </tr>
<?php              
}
?>
            </tbody>  
          </table>  
    	  </div>
    </body>  
    <script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
    </script>
    </html>  