<?php
session_start();
global $db;
require "db.php";
const NAME_ERROR = 'Vul een naam in';
const PASSWORD_ERROR = 'Vul jouw wachtwoord in';
const EMAIL_ERROR = 'Vul jouw email in';

if (isset($_POST['submit'])) {
    $errors = [];
    $inputs = [];

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($name)) {
        $errors['name'] = NAME_ERROR;
    } else {
        $inputs['name'] = $name;
    }


    $password = $_POST['password'];
    if (empty($password)) {
        $errors['password'] = PASSWORD_ERROR;
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $inputs['password'] = $hashedPassword;
    }

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        $errors['email'] = EMAIL_ERROR;
    } else {
        $inputs['email'] = $email;
    }


    try {
        if (count($errors) === 0) {
            $query = $db->prepare('INSERT INTO form (username, password, email, time_created) VALUES (:name, :password, :email, NOW())');
            $query->bindParam(':name', $inputs['name']);
            $query->bindParam(':password', $inputs['password']);
            $query->bindParam(':email', $inputs['email']);
            $query->execute();

            $_SESSION['success'] = 'Registratie is gelukt';
            $_SESSION['user_id'] = $db->lastInsertId();
            $_SESSION['username'] = $inputs['name'];
            $_SESSION['email'] = $inputs['email'];
            $_SESSION['logged_in'] = true;
            header('Location: profile.php');
            exit;
        }
    } catch (PDOException $e) {

        $errors['database'] = 'Registration failed. Please try again later.';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
<?php if (isset($_SESSION['success'])): ?>
    <script>
        alert("<?php echo $_SESSION['success']; ?>");
    </script>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<form action="" method="post">
    <label for="name">Username:</label>
    <?php if (isset($errors['name'])): ?>
        <?php echo $errors['name']; ?>
    <?php endif; ?>
    <input type="text" id="name" name="name" value="<?php echo isset($inputs['name']) ?? ''; ?>"><br>


    <label for="password">Password:</label>
    <?php if (isset($errors['password'])): ?>
        <?php echo $errors['password']; ?>
    <?php endif; ?>
    <input type="password" id="password" name="password"><br>


    <label for="email">Email:</label>
    <?php if (isset($errors['email'])): ?>
        <?php echo $errors['email']; ?>
    <?php endif; ?>

    <input type="email" id="email" name="email" value="<?php echo isset($inputs['email']) ?? ''; ?>"><br>
    <button type="submit" id="submit" name="submit">Submit</button>
</form>
</body>
</html>
