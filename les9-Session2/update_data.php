<?php
session_start();
require "db.php";
global $db;

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
    header('Location: data_changer.php');
    exit;
}

$userId = $_SESSION['user_id'];


$query = $db->prepare('SELECT username, email FROM form WHERE id = :id');
$query->bindParam(':id', $userId, PDO::PARAM_INT);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $newUsername = $_POST['username'];

    $updateQuery = $db->prepare('UPDATE form SET email = :email, password = :password, username = :username WHERE id = :id');
    $updateQuery->bindParam(':username', $newUsername);
    $updateQuery->bindParam(':email', $newEmail);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $updateQuery->bindParam(':password', $hashedPassword);
    $updateQuery->bindParam(':id', $userId);
    $updateQuery->execute();

    echo "<p>Gegevens succesvol bijgewerkt.</p>";
    $_SESSION['verified'] = false; // Reset verification
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Gegevens wijzigen</title>
</head>
<body>
<h2>Gegevens wijzigen</h2>

<form method="post">
    <label>Nieuwe username:</label>
    <input type="text" name="username" value="<?=($user['username']) ?>" required><br>
    <label>Nieuwe e-mail:</label>
    <input type="email" name="email" value="<?=($user['email']) ?>" required><br>

    <label>Nieuw wachtwoord:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Opslaan</button>
</form>
</body>
</html>
