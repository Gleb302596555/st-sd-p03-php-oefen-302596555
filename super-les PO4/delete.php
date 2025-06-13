<?php
session_start();
require 'db.php';
global $db;
$id = $_GET['id'];
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $userQuery = $db->prepare('SELECT * FROM users WHERE email = :email');
    $userQuery->bindParam('email', $_SESSION['email']);
    $userQuery->execute();
    $user = $userQuery->fetch(PDO::FETCH_ASSOC);
    if ($user['role'] === 'ROLE_ADMIN') {
        $productQuery = $db->prepare('SELECT * FROM products WHERE category_id = :id');
        $productQuery->bindParam('id', $id);
        $productQuery->execute();
        $products = $productQuery->fetchAll(PDO::FETCH_ASSOC);
        if (count($products) === 0) {
            $updateQuery = $db->prepare('DELETE FROM category WHERE id = :id');
            $updateQuery->bindParam('id', $id);
            $updateQuery->execute();
            $_SESSION['message'] = 'De categorie is verwijderd';
        }else{
            $_SESSION['error'] = 'Er zijn nog producten gekoppeld. Doe hier iets mee';
        }
    }
}

header('Location: index.php');