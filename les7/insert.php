<?php
require 'db.php';
const NAME_ERROR = "Vul een naam in";
const IMG_ERROR = "Vul een naam van een afbeelding in";
$errors = [];
$inputs = [];
if (isset($_POST['submit'])) {
$name = filter_input(INPUT_POST , 'name', FILTER_SANITIZE_SPECIAL_CHARS);
if(empty($name)){
 $errors['name'] = NAME_ERROR;
}else{
    $inputs['name'] = $name;
}
    $img = filter_input(INPUT_POST, 'img' ,FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($img)){
        $errors['img'] = IMG_ERROR;
    }else{
        $inputs['img'] = $img;
    }
if (count($errors) === 0){
    global $db;
    $query = $db->prepare('INSERT INTO category (name , img ) VALUES (:name , :img)');
    $query->bindParam('name' , $inputs['name']);
    $query->bindParam('img' , $inputs['img']);
    $query-> execute();
    header('Location: index.php');
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
    <title>Document</title>
</head>
<body>
<form method="post">
    <label for="name">Naam</label>
    <input type="text" id="name" name="name">
    <label for="img">Afbeelding</label>
    <input type="text" id="img" name="img">
    <button name="submit">Toevogen</button>
</form>
</body>
</html>


