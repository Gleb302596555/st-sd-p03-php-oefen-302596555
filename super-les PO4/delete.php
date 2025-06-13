<?php

session_start();

require 'db.php';
global $db;
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $userQuery = $db->prepare('SELECT * FROM users WHERE email = :email');
    $userQuery->bindParam('email', $_SESSION['email']);
    $userQuery->execute();
    $user = $userQuery->fetch(PDO::FETCH_ASSOC);

    if ((isset($user) && $user['role'] === 'ROLE_ADMIN')) {
        $updateQuery = $db->prepare('DELETE FROM category WHERE id = :id');
        $updateQuery->bindParam('id', $id);
        $updateQuery->execute();
        $_SESSION['message'] = 'De categorie is verwijderd';
    }
}

header('Location: index.php');