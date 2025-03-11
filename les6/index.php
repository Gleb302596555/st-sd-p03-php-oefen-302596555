<?php
    if (isset($_POST['submit'])) {
    $name = filter_var($_POST['naam'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    echo "data van het Formulier:
       Naam: " . $name . " Email: " . $email . " ";
    if (isset($_POST['Terms'])) {
        echo "De algemene voorwaarden geaccepteerd";
    } else {
        echo "Niet algemene voorwaarden geaccepteerd";
    }
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title></head>
<body>
<form method="post" action="">
    <label for="name">Naam:</label>
    <input type="text" name="naam"><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email"><br>
    <label for="terms">Accepteer de voorwaarden</label>
    <input type="checkbox" name="terms" value="accepteerd"id="terms"><br>
    <button name="submit">Verzender</button>
    <input type="submit" value="Verzender"></form><br>
</body>
</html>