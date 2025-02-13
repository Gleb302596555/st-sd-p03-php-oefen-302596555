<?php
require 'db.php';
global $db;
$query = $db->prepare('SELECT id , name FROM `dier`');
$query->execute();
$animals = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dieren</title>
</head>
<body>
<?php foreach ($animals as $animal): ?>
<a href=".php?id=<?=$animal['name']?>"><?=$animal['name']?></a><br>;
<?php endforeach; ?>
</body>
</html>
