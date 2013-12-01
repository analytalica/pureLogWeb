<?php
require_once("chartAssets.php");

/*
	COPY AND PASTE THEN RENAME THIS FILE-
	chartGeneric.php is a template and shouldn't be your only chart file.
	Hence, chart generic.
*/

//Draw Settings
$chartName = "noSpacesPlease";
$chartWidth = 100;
$chartHeight = 100;
$chartTitle = "Space All You Want";

//MySQL Settings
$chartCon = $someConnectionInConnections.php;
$chartDB = "";
$chartTable = "";
$chartLimit = "8"; //As a string, and value-1 is displayed

require_once("functions/getSelect.php");
require_once("functions/drawHorizontalChart.php");
?>