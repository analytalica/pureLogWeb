<?php
include("config.php");

/* pChart library inclusions */
include("library/class/pData.class.php");
include("library/class/pDraw.class.php");
include("library/class/pImage.class.php");
include("phpfastcache/phpfastcache.php");
phpFastCache::$storage = "files";

//Get arrays from cache
$dateArray = __c()->get("chartCQ30Date");
$minArray  = __c()->get("chartCQ30Min");
$cached    = true;

//Got from cache?
if ($dateArray == null || $minArray == null) {
    if (!$conCQ) {
        die('Could not connect: ' . mysqli_error($conCQ));
    }
    $getAll = "(SELECT * FROM " . $conCQDB . "." . $conCQTable . " ORDER BY id DESC LIMIT 31) ORDER BY id ASC;";
    $table = mysqli_query($conCQ, $getAll) or die(mysqli_error($conCQ));
    $dateArray = array();
    $minArray  = array();
    $arraysize = 0;
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
	__c()->set("chartCQ30Date", $dateArray, 600);
    __c()->set("chartCQ30Min", $minArray, 600);
	$cached = false;
}
$arraysize = count($dateArray);

$chartHeight = 950;
include("functions/drawCQ.php");
/* Render the picture (choose the best way) */
$myPicture->autoOutput("pictures/example.drawBarChart.poll.png");
?>