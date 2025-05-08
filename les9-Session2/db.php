<?php
try {
    $db = new PDO('mysql:localhost;dbname:registr_form' ,  "root" , "");
} catch (PDOException $e){
    die('Error : ' . $e->getMessage());
}
