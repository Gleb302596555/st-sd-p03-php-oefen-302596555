<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Date</title>
</head>
<body>
<?php
    date_default_timezone_set('Europe/Amsterdam');

    $today = date(format: "j-n-Y H:i:s");
    echo $today;
  ?>
</body>
</html>