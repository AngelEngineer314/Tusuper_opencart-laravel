<?php
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE HTML PUBLIC "-W3CDTD HTML 4.0EN">
<html>
<head>
<title>SEGURO QUIERES ACTIVA?..</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="GENERATOR" content="XDEVELOPER">
</head>
<?php
error_reporting(E_ALL & ~E_NOTICE);
echo "<script>if(confirm('¿Seguro que queres que carguemos esto?')){ 
document.location='activando.php';} 
else{ alert('BUENO! A PONERSE A VIGILAR, CHAU');}</script>";
?>
</body>
</html>