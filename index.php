<?php 
include 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/gif" href="LOGO_KOTA_BATAM.png" />
    <title>APLIKASI PERSEDIAAN BHP</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <link rel="stylesheet" href="assets/css/datepicker.min.css">
    <link rel="stylesheet" href="assets/css/datepicker3.min.css">
    <style type="text/css">
    .side-nav {
    margin-left: -225px;
    left: 225px;
    width: 165px;
    position: fixed;
    top: 50px;
    height: 100%;
    border-radius: 0;
    border: none;
    background-color: #0d6b29;
    overflow-y: auto;
  }
 .row {
    margin-right: -15px !important;
    margin-left: -17px !important;
}
.panel {
  margin-left: -2px !important;
}
.navbar-inverse .navbar-nav > li > a {
    color: #f3ffef;
}

.navbar-inverse {
    background-color: #0d6b29;
    border-color: #8d9518;
}

.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
    background-color: #164b1a;
}
.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
    color: #fff;
    background-color: #0d6b29;
}
.side-nav > li.dropdown > ul.dropdown-menu > li > a:hover, .side-nav > li.dropdown > ul.dropdown-menu > li > a.active, .side-nav > li.dropdown > ul.dropdown-menu > li > a:focus {
    color: #fff;
    background-color: #0d6b29;
}
.side-nav > li.dropdown > ul.dropdown-menu > li > a {
    color: #ffdede;
    padding: 15px 15px 15px 25px;
}
    </style>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">APLIKASI PERSEDIAAN BHP</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Daftar Barang<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=daftar_barang"><i class="fa fa-table active"></i> Alat Tulis Kantor</a></li>
                <li><a href="?page=bbm"><i class="fa fa-table active"></i> Bahan Bakar Minyak</a></li>
                <li><a href="?page=prangko"><i class="fa fa-table active"></i> Bahan Prangko</a></li>
                <li><a href="?page=alat_listrik"><i class="fa fa-table active"></i> Alat Listrik</a></li>
                <li><a href="?page=alat_kebersihan"><i class="fa fa-table active"></i> Alat Kebersihan</a></li>
                <li><a href="?page=belanja_cetak"><i class="fa fa-table active"></i> Belanja Cetak</a></li>
                <li><a href="?page=pengadaan_pencetakan"><i class="fa fa-table active"></i> Pengadaan Pencetakan</a></li>
              </ul>
          </li>
                <li><a href="?page=list_pem"><i class="fa fa-table"></i> Barang Masuk</a></li>
             <li><a href="?page=list_dis"><i class="fa fa-table"></i> Barang Keluar</a></li>
              <li><a href="?page=list_dist"><i class="fa fa-table"></i> Distributor</a></li>
              <li><a href="?page=list_bid"><i class="fa fa-table"></i> Bidang</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="" data-toggle="modal" data-target="#upass"><i class="fa fa-edit"></i> Ubah password</li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
         <?php
        if(@$_GET['page'] == 'daftar_barang' || @$_GET['page'] == '' ){
          include "views/daftar_barang.php";
        }else if(@$_GET['page'] == 'distribusi'){
          include "views/distribusi.php";
        }else if(@$_GET['page'] == 'tambah_barang'){
          include "views/tambah_barang.php";
        } else if(@$_GET['page'] == 'delete'){
          include "views/delete.php";
        }else if(@$_GET['page'] == 'edit'){
          include "views/edit_barang.php";
        }else if(@$_GET['page'] == 'tes'){
          include "views/test_nota.php";
        }else if(@$_GET['page'] == 'cetak'){
          include "views/cetakstok.php";
        }else if(@$_GET['page'] == 'list_dis'){
          include "views/l_barang.php";
        }else if(@$_GET['page'] == 'pembelian'){
          include "views/pembelian.php";
        }else if(@$_GET['page'] == 'list_pem'){
          include "views/list_pembelian.php";
        }else if(@$_GET['page'] == 'list_dist'){
          include "views/list_distributor.php";
        }else if(@$_GET['page'] == 'detail'){
          include "views/list_bk.php";
        }else if(@$_GET['page'] == 'list_bid'){
          include "views/list_bidang.php";
        }else if(@$_GET['page'] == 'detail_pem'){
          include "views/list_bm.php";
        }else if(@$_GET['page'] == 'bbm'){
          include "views/db_bbm.php";
        }else if(@$_GET['page'] == 'prangko'){
          include "views/db_bahanprangko.php";
        }else if(@$_GET['page'] == 'alat_listrik'){
          include "views/db_alatlistrik.php";
        }else if(@$_GET['page'] == 'alat_kebersihan'){
          include "views/db_alatkebersihan.php";
        }else if(@$_GET['page'] == 'belanja_cetak'){
          include "views/db_belanjacetak.php";
        }else if(@$_GET['page'] == 'pengadaan_pencetakan'){
          include "views/db_pengadaanpencetakan.php";
        }

         ?>
        
      <div id="upass" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ubah Password</h4>
            </div>
            <form method="post" action="">
            <div class="modal-body">
            <div class="form-group">
            <label class="control-label" for="pass">Password Baru </label>
            <input type="password" name="pass" class="form-control" id="pass" placeholder="Masukkan password baru ....">
            </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" name="spass" value="Simpan">
            </div> 
            </form>
          </div>
        </div>
      </div>


      <?php
      if(isset($_POST['spass'])){
      $pass = $_POST['pass'];
      $user = $_SESSION['user'];
      $ubah = mysql_query("update user set password='$pass' where username='$user'");
      if($ubah){
        echo "<script>alert('Password berhasil diubah');document.location='index.php'</script>";
      }else{
        echo "<script>alert('Password gagal diubah');document.location='index.php'</script>";
      }
            }?>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
     <script src="assets/js/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="assets/js/tablesorter/tables.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <style>
body{}
.frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#item-list{float:left;list-style:none;margin:0;padding:0;width:815px;}
#item-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 3px solid;}
#item-list li:hover{background:#F0F0F0;}
#search-box{padding: 5px;border: #F0F0F0 1px solid;}
/**
 * Override feedback icon position
 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 */
#eventForm .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>
<script>
//autocomplete search
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "readItem.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    }
    });
  });
});

function selectItem(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
$('td', 'table').each(function(i) {
    $(this).text();
});

$('table.paginated').each(function() {
    var currentPage = 0;
    var numPerPage = 7;
    var $table = $(this);
    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
        $('<div class="badge"></span>').text(page + 1).bind('click', {
            newPage: page
        }, function(event) {
            currentPage = event.data['newPage'];
            $table.trigger('repaginate');
            $(this).addClass('active').siblings().removeClass('active');
        }).appendTo($pager).addClass('clickable');
    }
    $pager.insertAfter($table).find('span.page-number:first').addClass('active');
});
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
          autoclose: true,
            format: 'yyyy/mm/dd'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
        
        });
      });
$(document).ready(function() {
    $('#datePicker2')
        .datepicker({
          autoclose: true,
            format: 'yyyy/mm/dd'
        })
        .on('changeDate', function(e) {
            // Revalidate the date fie(ld
                    
                    });
                  });
$(document).on("click", "#edit_brg", function(){
        var nama_brg = $(this).data('nama');
        var stok = $(this).data('stok');
        var sta = $(this).data('sta');
        var satuan = $(this).data('satuan');
        var hsatuan = $(this).data('hsatuan');
        var no = $(this).data('no');
        $(".modal-body #nama").val(nama_brg);
        $(".modal-body #stok").val(stok);
        $(".modal-body #sta").val(sta);
        $(".modal-body #satuan").val(satuan);
        $(".modal-body #hsatuan").val(hsatuan);
        $(".modal-body #no").val(no);

})
$(document).on("click", "#e_dist", function(){
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var nohp = $(this).data('nohp');
        var email = $(this).data('email');
        var id = $(this).data('id');
        $(".modal-body #nama").val(nama);
        $(".modal-body #alamat").val(alamat);
        $(".modal-body #no_hp").val(nohp);
        $(".modal-body #email").val(email);
        $(".modal-body #id_dist").val(id);

})
$(document).on("click", "#e_bid", function(){
        var nama = $(this).data('nama');
        var kepala = $(this).data('kepala');
        var id = $(this).data('id');
        $(".modal-body #nama").val(nama);
        $(".modal-body #kepala").val(kepala);
        $(".modal-body #id").val(id);
})
$(document).on("click", "#c_brg", function(){
        var nama = $(this).data('nama');
        $(".modal-body #nama_barang").val(nama);
})
$(document).on("click", "#cetak_form", function(){
    $('#cetak').modal('hide');
})
$(document).on("click", "#c_kes", function(){
    $('#tcetak').modal('hide');
})
$('.modal').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});
</script>
</body>
</html>