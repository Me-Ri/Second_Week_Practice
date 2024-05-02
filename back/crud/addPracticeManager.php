<?php
require_once '../connect.php';
require_once  '../helpers.php';
$login = $_POST['login'];
$pass = $_POST['password'];
$fnp = $_POST['fnp'];
$id_dir = $_POST['id_dir'];
$post = $_POST['post'];

$pass = password_hash($pass, PASSWORD_DEFAULT);

mysqli_query($connect, "INSERT INTO users (login, password, fnp, role, id_direction, post) VALUES ('$login', '$pass', '$fnp' , 'P_MANAGER', '$id_dir', '$post')");

redirect('../../front/manager-create.php');
?>



