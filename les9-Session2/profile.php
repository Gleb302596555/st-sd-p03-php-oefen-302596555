<?php
session_start();


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: log_in.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Profielpagina</title>
</head>
<body>
<h1>Welkom, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>

<p>Je bent succesvol ingelogd.</p>

<p>
    Jouw email:<?= htmlspecialchars($_SESSION['email']) ?>
</p>

<form action="logout.php" method="post">
    <button type="submit" name="logout">Uitloggen</button>
</form>
</body>
</html>