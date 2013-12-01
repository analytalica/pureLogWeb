<?php
//Get arrays from cache
$dateArray = __c()->get($chartName . "Date");
$minArray  = __c()->get($chartName . "Min");
$cached    = true;

//Got from cache?
if ($dateArray == null || $minArray == null) {
    if (!$chartCon) {
        die('Could not connect: ' . mysqli_error($chartCon));
    }
    $getAll = "(SELECT * FROM " . $chartDB . "." . $chartTable . " ORDER BY id DESC LIMIT " . $chartLimit . ") ORDER BY id ASC;";
    $table = mysqli_query($chartCon, $getAll) or die(mysqli_error($chartCon));
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
	__c()->set("chartCQ7Date", $dateArray, 600);
    __c()->set("chartCQ7Min", $minArray, 600);
	$cached = false;
}
$arraysize = count($dateArray);
?>