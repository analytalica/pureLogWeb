<?php
//Add connection strings here, then store this file in a secure location not publicly accessible.
//Structure: mysqli_connect("ip", "username", "password", "default db", "port");

$conCQ = mysqli_connect("", "", "", "", "");
$conRUSH = mysqli_connect("", "", "", "", "");
$conYaddaYadda = mysqli_connect("", "", "", "", "");

//These connections will be used in the chart (chartGeneric.php) files.

//default getAll query: $getAll = "SELECT * FROM " . $conCQDB . "." . $conCQTable . ";";
?>