<?php
try {
    $db = new PDO( 'mysql:host=localhost;dbname=vegetabels' , "root" , "");
}catch (PDOException $e){
    die('Error : ' . $e->getMessage());
}
?>