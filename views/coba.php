<!DOCTYPE html>
<html>
<head>
<title>Aplikasi perkalian sederhana tanpa submit</title>
</head>
<body>
<input type="text" name="tes1" class="form-control" id="x1">x<input type="text" name="tes2" class="form-control" id="x2" onfocus="mulai()">
=<input type="text" name="kembalian" class="form-control" id="hasil" readonly>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
function mulai(){
setInterval("hasil()",1);
}
function hasil(){
var a1 = document.getElementById('x1').value;
var a2 = document.getElementById('x2').value;
document.getElementById('hasil').value=a1*a2;
}
</script>
</body>
</html>