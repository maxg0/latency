<?php
$averages = array();
$firstTime = microtime(true);
for($i = 0; $i < 10000; $i++){
$startTime = microtime(true);
$fp = stream_socket_client("udp://".$argv[1].":1113", $errno, $errstr);
if (!$fp) {
	echo "ERROR: $errno - $errstr<br />\n";
} else {
	fwrite($fp, "\n");
	echo fread($fp, 26);
	fclose($fp);
	$endTime = microtime(true);
	$total = $endTime - $startTime;
	echo "$total ";
	array_push($averages, $total);
}
}
$lastTime = microtime(true);
$totalTime = $lastTime - $firstTime;
$average = array_sum($averages)/count($averages);
echo "\naverage is: $average\n";
echo "firstTime: $firstTime, lastTime: $lastTime\n totaling: $totalTime";
