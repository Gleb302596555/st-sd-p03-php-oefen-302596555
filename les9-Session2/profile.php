<?php
session_start();
require "db.php";
global $db;


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: log_in.php');
    exit;
}


$username = $_SESSION['username'];
$userId = $_SESSION['user_id'];
$query = $db->prepare('SELECT * FROM `form` WHERE `id` = :id');
$query->bindParam(':id', $userId, PDO::PARAM_INT);

$query->execute();

$forms = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Profielpagina</title>
</head>
<body>
<h1>Welkom, <?= ($_SESSION['username']) ?>!</h1>

<p>Je bent succesvol ingelogd.</p>

<?php
if ($forms) {
    foreach ($forms as $form){
        echo '<p>Jouw email is: ' . ($form['email']) . '</p>';
    }
} else {
    echo '<p>Geen formuliergegevens gevonden.</p>';
}
?>

<form action="data_changer.php" method="post">
    <button type="submit" name="data_changer">Wijzig gegevens</button>
</form>
</body>
</html>
