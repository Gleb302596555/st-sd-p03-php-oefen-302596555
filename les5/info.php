<?php
require 'db.php';
global $db;
$query = $db->prepare('SELECT id , name FROM `dier`');
$query->execute();
$animals = $query->fetchAll(PDO::FETCH_ASSOC);
?>