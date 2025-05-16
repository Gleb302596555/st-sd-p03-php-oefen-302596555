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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratieformulier</title>
    <!-- ✅ Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- ✅ Bootstrap Alert -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['success']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset ($_SESSION['success']); ?>
            <?php endif; ?>

            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title mb-4">Registreren</h4>
                    <form method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Gebruikersnaam</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   value="<?php echo isset($inputs['name']) ? htmlspecialchars($inputs['name']) : ''; ?>">
                            <?php if (isset($errors['name'])): ?>
                                <div class="text-danger"><?php echo $errors['name']; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Wachtwoord</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <?php if (isset($errors['password'])): ?>
                                <div class="text-danger"><?php echo $errors['password']; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Emailadres</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="<?php echo isset($inputs['email']) ? htmlspecialchars($inputs['email']) : ''; ?>">
                            <?php if (isset($errors['email'])): ?>
                                <div class="text-danger"><?php echo $errors['email']; ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" id="submit" name="submit" class="btn btn-primary w-100">Registreren</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Bootstrap JS (for alert dismissal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>