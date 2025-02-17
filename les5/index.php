<?php
require 'db.php';
global $db;
$query = $db->prepare('SELECT id , model FROM `bmws`');
$query->execute();
$bmws = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($bmws as $bmw) {
    echo "<a href='info.php?id=$bmw[id]'>$bmw[model]</a><br>";
}
?>


