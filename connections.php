<?php
//Add connection strings here, then store this file in a secure location not publicly accessible.
//Structure: mysqli_connect("ip", "username", "password", "default db", "port");
$conCQ = mysqli_connect("", "", "", "", "");
$conCQDB = "";
$conCQTable = "";
//You will need to establish these variables for every different server.
$conRUSH = mysqli_connect("", "", "", "", "");
$conRUSHDB = "";
$conRUSHTable = "";
//default getAll query: $getAll = "SELECT * FROM " . $conCQDB . "." . $conCQTable . ";";
?>