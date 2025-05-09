<?php

const TITLE_ERROR = "Vul uw aanhef in";
const NAME_ERROR = "Vul uw name in";
const EMAIL_ERROR = "Vul uw email in";
const TERMS_ERROR = "Uw moet de algemene voorwaarden accepteren";

$errors = [];
$inputs =[];

if (isset($_POST['submit'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($title)) {
        $errors[] = TITLE_ERROR;
    }
    else{
        $inputs['title'] = $title;
    }

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($name)) {
        $errors[] = NAME_ERROR;
    }
    else{
        $inputs['name'] = $name;
    }
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (empty($email)) {
        $errors[] = EMAIL_ERROR;
    }
    else{
        $inputs['email'] = $email;
    }
    $terms = filter_input(INPUT_POST, 'terms', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($terms)) {
        $errors[] = TERMS_ERROR;
    }
    else{
        $inputs['terms'] = $terms;
    }
}
?>
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<<<<<<< Updated upstream
<a href="insert.php">toevoegen</a>
</body>
</html>
=======
<form method="POST">
    <label for="man">Meneer</label>
    <input type="radio" name="title" value="Meneer" id="man" <?= (isset($_POST['title']) && $_POST['title'] === 'Meneer') ? 'checked' : '' ?>><br>

    <label for="woman">Mevrouw</label>
    <input type="radio" name="title" value="Mevrouw" id="woman" <?= (isset($_POST['title']) && $_POST['title'] === 'Mevrouw') ? 'checked' : '' ?>><br>

    <label for="different">Anders</label>
    <input type="radio" name="title" value="Anders" id="different" <?= (isset($_POST['title']) && $_POST['title'] === 'Anders') ? 'checked' : '' ?>><br>

    <div><?= $errors['title'] ?? '' ?></div>

    <label for="name">Naam</label>
    <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>">
    <div><?= $errors['name'] ?? '' ?></div>

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>">
    <div><?= $errors['email'] ?? '' ?></div>

    <input type="checkbox" name="terms" value="accepted" id="terms" <?= isset($_POST['terms']) && $_POST['terms'] === 'accepted' ? 'checked' : '' ?>>
    <label for="terms">Accepteer de voorwaarden</label><br>
    <div><?= $errors['terms'] ?? '' ?></div>

    <button name="submit">Verzenden</button>
</form>

</body>
</html>
>>>>>>> Stashed changes
