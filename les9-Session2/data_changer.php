<?php
session_start();
require "db.php";
global $db;

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: log_in.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify'])) {
    $password = $_POST['password'];
    $userId = $_SESSION['user_id'];

    $query = $db->prepare('SELECT password FROM form WHERE id = :id');
    $query->bindParam(':id', $userId, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['verified'] = true;
        header('Location: update_data.php');
        exit;
    } else {
        $error = "Wachtwoord onjuist.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Verificatie</title>
</head>
<body>
<h2>Bevestig je identiteit</h2>

<?php if (isset($error)) echo '<p style="color:red;">' . $error . '</p>'; ?>

<form method="post">
    <label>Wachtwoord:</label>
    <input type="password" name="password" required>
    <button type="submit" name="verify">Verifiëren</button>
</form>
</body>
</html>
