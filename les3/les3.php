<?php
try {    $db = new PDO("mysql:host=localhost;dbname=cars", "root","");
} catch (PDOException $e){    die('Error : '.$e->getMessage());
}$query = $db->prepare('SELECT * FROM `electric_cars`');
$query->execute();
$cars = $query->fetchAll(PDO::FETCH_ASSOC);
echo"<pre>";
var_dump($cars);
echo"</pre>";
?>