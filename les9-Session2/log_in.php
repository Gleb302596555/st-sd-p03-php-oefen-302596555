<?php
session_start();
require 'db.php';
global $db;

$errors = [];

if (isset($_POST['submit'])) {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST['password'];

    if (empty($username)) {
        $errors['username'] = 'Voer je gebruikersnaam in.';
    }

    if (empty($password)) {
        $errors['password'] = 'Voer je wachtwoord in.';
    }

    if (empty($errors)) {
        try {
            $query = $db->prepare('SELECT * FROM form WHERE username = :username');
            $query->bindParam(':username', $username);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Login gelukt!
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['logged_in'] = true;

                header('Location: profile.php');
                exit;
            } else {
                $errors['login'] = 'Gebruikersnaam of wachtwoord is onjuist.';
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $errors['login'] = 'Er is een fout opgetreden. Probeer later opnieuw.';
        }
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>


    <p style="color:red;"><?php echo $errors['login'] ?? ""; ?></p>


<form method="post">
    <label for="username">Gebruikersnaam:</label><br>
    <input type="text" name="username" id="username" required value="<?= $_POST['username'] ?? '' ?>"><br>

        <p style="color:red;"><?php echo $errors['username'] ?? ""; ?></p>


    <label for="password">Wachtwoord:</label><br>
    <input type="password" name="password" id="password" required><br>

        <p style="color:red;"><?php echo $errors['password'] ?? ""; ?></p>

    <button type="submit" name="submit">Inloggen</button>
</form>
</body>
</html>
