



<?php
if(isset($_POST['backup'])){
define("BACKUP_PATH", "E:/DARTO/");

$server_name   = "localhost";
$username      = "root";
$password      = "";
$database_name = "basisbarang";
$date_string   = date("Ymd");
$cmd = "C: & cd C:/xampp/mysql/bin & mysqldump.exe --user=root --password= --host=localhost basisbarang > ". BACKUP_PATH . "{$date_string}_{$database_name}.sql";

exec($cmd);
}
?>