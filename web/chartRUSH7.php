<?php
include("config.php");

/* pChart library inclusions */
include("library/class/pData.class.php");
include("library/class/pDraw.class.php");
include("library/class/pImage.class.php");
include("phpfastcache/phpfastcache.php");
phpFastCache::$storage = "files";

//Get arrays from the cache
$dateArray = __c()->get("chartRUSH7Date");
$minArray  = __c()->get("chartRUSH7Min");
$cached = true;

//Is it null?
if ($dateArray == null || $minArray == null) {
    if (!$conRUSH) {
        die('Could not connect: ' . mysqli_error($conRUSH));
    }
	//we actually have to select 8 rows and not 7
    $getAll = "(SELECT * FROM " . $conRUSHDB . "." . $conRUSHTable . " ORDER BY id DESC LIMIT 8) ORDER BY id ASC;";
    $table = mysqli_query($conRUSH, $getAll) or die(mysqli_error($conRUSH));
    $dateArray = array();
    $minArray  = array();
    
    while ($row = mysqli_fetch_row($table)) {
        //Stack the date and minutes columns into their own respective arrays
        array_push($dateArray, $row[1]);
        array_push($minArray, $row[2]);
        //This is necessary to generate the X and Y axes for the graph.
    }
	array_pop($dateArray);
	array_pop($minArray);
	for($a = 0; $a < count($dateArray); $a++){
		$weekday = date('D', date_timestamp_get(date_create_from_format('mdY', $dateArray[$a]))) . "\r\n" . $dateArray[$a];
		$dateArray[$a] = $weekday;
	}
	//Insert into cache
    __c()->set("chartRUSH7Date", $dateArray, 600);
    __c()->set("chartRUSH7Min", $minArray, 600);
	$cached = false;
}
$arraysize = count($dateArray);

include("functions/drawRUSH.php");
/* Render the picture (choose the best way) */
$myPicture->autoOutput("pictures/example.drawBarChart.poll.png");
?>