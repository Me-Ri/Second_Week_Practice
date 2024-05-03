<?php
session_start();
require_once '../helpers.php';
require_once '../connect.php';

print_r($_POST);
$name = $_POST['name'];
$pass = $_POST['password'];
$_SESSION['validation'] = [];



if(empty($name)) {
    addValidationError('name', 'Неверное имя');  
   
}

if(empty($pass)) {
    addValidationError('password', 'Пустой пароль'); 
   
}
if(!empty($_SESSION['validation'])) {
    addOldValue('name', $name);
    addOldValue('password', $pass);
    redirect('../../front/register.php');
}
$pass = password_hash($pass, PASSWORD_DEFAULT);

mysqli_query($connect, "INSERT INTO users (login, password, role) VALUES ('$name', '$pass', '')");
redirect('/../../front/login.php');
mysqli_close($connect);

?>