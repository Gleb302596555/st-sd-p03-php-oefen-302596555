<?php

date_default_timezone_set('Europe/Amsterdam');
$time = date(format: "H:i:s a");
echo $time;

if($time > "12:00:00"){
    echo "Het is Morgen";
} elseif ($time <= "6:00:00" || $time >= "12:00:00") {
    echo "Het is ochtend";
}

?>