<?php
session_start();
require_once '../helpers.php';
require_once '../connect.php';

$name = $_POST['name'];
$pass = $_POST['password'];
$code = $_POST['code'];
$_SESSION['validation'] = [];
$_SESSION['user'] = [];





$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$name'");
if($user = mysqli_fetch_assoc($query)) {


if(password_verify($pass, $user['password']) ) {
    $_SESSION['user']['id'] = $user['id'];
    $_SESSION['user']['role'] = $user['role'];
    redirect('redirect.php');
}
    errorMsg('error', 'Неверно введен пароль');
    addOldValue('name', $name); 
} else {
    addOldValue('name', $name);
    errorMsg('error', 'Пользователь не найден');
}

redirect('../../front/login.php');
?>