<?php
require_once '../connect.php';
require_once  '../helpers.php';

$login = $_POST['login'];
$pass = $_POST['password'];
$fnp = $_POST['fnp'];
$id_group = $_POST['groupId'];
$pass = password_hash($pass, PASSWORD_DEFAULT);

mysqli_query($connect, "INSERT INTO students (fnp, id_group)  VALUES ('$fnp', '$id_group')");

$query = mysqli_query($connect,"SELECT * FROM students");
$result = mysqli_fetch_all($query);


$id_stud = $result[count($result)-1][0];
mysqli_query($connect, "INSERT INTO users (login, password, fnp , role, id_student) VALUES ('$login', '$pass', '$fnp' , '', '$id_stud')");



redirect('../../front/group-create.php');


?>

