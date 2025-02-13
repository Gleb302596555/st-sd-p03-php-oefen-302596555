<?php
require 'db.php';
global $db;
$query = $db->prepare('SELECT info , name FROM `dier` WHERE id = :id');
$query-> bindParam(param)
$query->execute();
$animal = $query->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><?= $animal['name']?></h1>;
<p><?= $animal['info']?></p>;
<img src="img/ <?= $animal['img']?>">
</body>
</html>
