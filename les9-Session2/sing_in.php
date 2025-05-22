<?php
session_start();
global $db;
require "db.php";
require "db-account.php";
const NAME_ERROR = 'Vul een naam in.';
const PASSWORD_ERROR = 'Vul jouw wachtwoord in.';
const EMAIL_ERROR = 'Vul jouw email in.';
const USED_ERROR = 'Deze email al in gebruik.';

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
            $emailQuery = $db->prepare('SELECT email FROM form WHERE email = :email');
            $emailQuery->bindParam('email', $inputs['email']);
            $emailQuery->execute();
            $users = $emailQuery->fetchAll(PDO::FETCH_ASSOC);

            if (count($users)=== 0) {
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
            }else{
                $errors['used'] = USED_ERROR;
            }

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
    <title>Scooter's Shop</title>    <link rel="stylesheet" href="./css/style.css">
    <title>Registratieformulier</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body class=" py-5">
<?php include 'nav-bar.php' ?>
<div class="container" style="margin-top: 25vh;">
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                                   value="<?php echo isset($inputs['name']) ?($inputs['name']) : ''; ?>">
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
                                   value="<?php echo isset($inputs['email']) ? ($inputs['email']) : ''; ?>">
                            <?php if (isset($errors['email'])): ?>
                                <div class="text-danger"><?php echo $errors['email']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($errors['used'])): ?>
                                <div class="text-danger"><?php echo $errors['used']; ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" id="submit" name="submit" class="btn btn-primary w-100">Registreren</button>
                        <div class="text-center mt-3">
                            <a href="log_in.php" class="btn btn-outline-secondary">U heeft al een account, klik hier om in te loggen</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Bootstrap JS (for alert dismissal) -->

</body>
</html>