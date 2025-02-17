<?php
try {   $db = new PDO("mysql:host=localhost;dbname=bmw_cars;charset=utf8", "root", "");

} catch (PDOException $e){    die('Error : '.$e->getMessage());
}$query = $db->prepare('SELECT * FROM `bmws`');
$query->execute();
$animals = $query->fetchAll(PDO::FETCH_ASSOC);
?>