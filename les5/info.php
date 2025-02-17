<?php
require 'db.php';
global $db;

$id = $_GET['id'];

$query = $db->prepare("SELECT * FROM `bmws` WHERE id = :id");
$query->bindParam(':id', $id);
$query->execute();


$bmw = $query->fetch(PDO::FETCH_ASSOC);


echo "Model: " . htmlspecialchars($bmw['model']) . "<br>";
echo "Price: " . htmlspecialchars($bmw['price']) . "<br>";
echo "Range: " . htmlspecialchars($bmw['range1']) . "<br>";


?>

<br>

<a href="index.php">Back</a>
