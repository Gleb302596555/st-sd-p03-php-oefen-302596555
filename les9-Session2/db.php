<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=registr_form;charset=utf8mb4', "root", "",
    );
} catch (PDOException $e) {
    die('Error : ' . $e->getMessage());
}
