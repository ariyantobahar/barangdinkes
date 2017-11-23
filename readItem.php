<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$s = " || Stok = ";
$c = " || Harga = ";
$space = " ";
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM databarang WHERE nama_barang like '%" . $_POST["keyword"] . "%' ORDER BY nama_barang LIMIT 0,8";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="item-list">
<?php
foreach($result as $item) {
?>
<li onClick="selectItem('<?php echo $item["nama_barang"]; ?>');"><?php echo $item["nama_barang"]; echo $s   ;echo $item["stok_akhir"];echo $space ;echo $item["satuan"]; echo $c   ;echo $item["harga_satuan"];?></li>
<?php } ?>
</ul>
<?php } } ?>