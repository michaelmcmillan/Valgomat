<?php
require 'PointInPolygon.php';

$path = 'N2000 Kommunekart.csv';
$csv = array_map('str_getcsv', file($path));
$entries = count($csv);

$rows = [];
for ($i = 1; $i < $entries; $i++) {
    $name = $csv[$i][4] . "\n";
    $kml = $csv[$i][9];
    $xml = simplexml_load_string($kml);
    $coordinates = (string) $xml->xpath('//coordinates')[0];
    $points = explode(' ', $coordinates);
    foreach ($points as $key => $point) {
        $points[$key] = str_replace(',', ' ', $point);
    }

    $row["name"] = $name;
    $row["points"] = $points;
    $rows[] = $row;
}
file_put_contents('kommune.data', serialize($rows));

//$pointLocation = new pointLocation();
//print $pointLocation->pointInPolygon("15.6528217 67.5016245", $points);
