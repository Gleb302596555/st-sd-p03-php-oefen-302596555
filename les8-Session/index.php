<?php
session_start();
echo $_SESSION['name'];
$_SESSION['name'] = 'Gleb';
if (isset($_SESSION['age'])){
   echo $_SESSION['age'];
}
