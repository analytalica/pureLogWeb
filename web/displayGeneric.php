<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<title>pureLog Web Interface</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="center">
<?php

//Fill elements of this array with the charts you want
//displayed on this page.

$displayArray = array(
	1 => "chartBF4CQ30.php",
	2 => "chartBF4M30.php",
	3 => "chartBF3CQ30.php"
);

?>

<table border="1" class="center">
<tr>
<?php
foreach($displayArray as $image){
	echo("<td><img src=\"" . $image . "\" alt=\"" . $image . "\"></td>");
}
?>
</tr>
</table> 
</div>
<div id="centerCol">
<?php include("navigationGeneric.php"); ?>
<?php include("main.php"); ?>
</div>
</body>
</html>
