<?php
for($i = 0; $i < 10; $i++){
$fp = stream_socket_client("udp://".$argv[1].":1113", $errno, $errstr);
if (!$fp) {
    echo "ERROR: $errno - $errstr<br />\n";
} else {
    fwrite($fp, "\n");
    echo fread($fp, 26);
    fclose($fp);
}
}

