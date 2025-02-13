<?php
try {    $db = new PDO("mysql:host=localhost;dbname=dieren", "root","");
} catch (PDOException $e){    die('Error : '.$e->getMessage());
}$query = $db->prepare('SELECT * FROM `dier`');
$query->execute();
$animals = $query->fetchAll(PDO::FETCH_ASSOC);
?>