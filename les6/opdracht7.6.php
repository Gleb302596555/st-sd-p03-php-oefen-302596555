<?php
$name = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
number_format($name, 2, ',', '.');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title></head>
<body>
<form method="post" action="">
    <label for="name">Bedrag exclusief BTW</label>
    <input type="text" name="naam"><br>
    <input type="radio" name="title" value="Laag,9%"><label for="name">Laag, 9%</label><br>
    <input type="radio" name="title" value="Hoog, 21%"><label for="name">Hoog, 21%</label><br>
    <input type="submit" value="Uitrekenen">
</form>
</body>
</html>