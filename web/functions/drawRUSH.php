<?php
/* CAT:Bar Chart */

/* Create and populate the pData object */
$MyData = new pData();
$MyData->addPoints($minArray, "Player-Minutes");
$MyData->setAxisName(0, "Player-Minutes");
$MyData->addPoints($dateArray, "Date");
$MyData->setAbscissa("Date");

/* Create the pChart object */
$myPicture = new pImage(500, 600, $MyData);

/* Write the chart title */
$myPicture->setFontProperties(array(
    "FontName" => "library/fonts/Forgotte.ttf",
    "FontSize" => 15
));
$myPicture->drawText(20, 34, "pureLog Rush Server Stats", array(
    "FontSize" => 20
));

/* Define the default font */
$myPicture->setFontProperties(array(
    "FontName" => "library/fonts/calibri.ttf",
    "FontSize" => 9
));

/* Set the graph area */
$myPicture->setGraphArea(70, 60, 480, 580);
$myPicture->drawGradientArea(70, 60, 480, 580, DIRECTION_HORIZONTAL, array(
    "StartR" => 200,
    "StartG" => 200,
    "StartB" => 200,
    "EndR" => 240,
    "EndG" => 240,
    "EndB" => 240,
    "Alpha" => 30
));

/* Draw the chart scale */
$AxisBoundaries = array(0=>array("Min"=>0,"Max"=>69120));
$scaleSettings = array(
    "DrawXLines" => FALSE,
	"Mode" => SCALE_MODE_START0,
    //"Mode"=>SCALE_MODE_MANUAL, 
	//"ManualScale"=>$AxisBoundaries,
	"MinDivHeight"=>30,
    "GridR" => 0,
    "GridG" => 0,
    "GridB" => 0,
    "GridAlpha" => 10,
    "Pos" => SCALE_POS_TOPBOTTOM
);
$myPicture->drawScale($scaleSettings);
//Colors!
//Define palette
$Palette = array(
    "0" => array(
        "R" => 0,
        "G" => 75,
        "B" => 0,
        "Alpha" => 10
    )
);

//Determine how much to reduce by per datum
$primaryMulti= round(180/$arraysize);
$alphaMulti = round(90/$arraysize);
for ($i = 1; $i < $arraysize; $i++) {
    $newGreen = 75 + ($i + 1) * $primaryMulti;
    $newAlpha = 10 + ($i + 1) * $alphaMulti;
    array_push($Palette, array(
        "R" => 0,
        "G" => $newGreen,
        "B" => 0,
        "Alpha" => $newAlpha
    ));
}
//Minimum color settings (last row): 75 Primary and 10 Alpha

/* Turn on shadow computing */
$myPicture->setShadow(TRUE, array(
    "X" => 1,
    "Y" => 1,
    "R" => 0,
    "G" => 0,
    "B" => 0,
    "Alpha" => 10
));

/* Draw the chart */
//$myPicture->drawBarChart(array("Rounded"=>TRUE,"Surrounding"=>30));
$myPicture->drawBarChart(array(
    "DisplayPos" => LABEL_POS_INSIDE,
    "DisplayValues" => TRUE,
    "Rounded" => TRUE,
    "Surrounding" => 30,
    "OverrideColors" => $Palette
));
?>