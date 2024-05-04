<?php
require_once '../connect.php';
require_once  '../helpers.php';

$login = $_POST['login'];
$pass = $_POST['password'];
$fnp = $_POST['fnp'];
$post = $_POST['post'];
$direction = $_POST['direction'];
$id_inst = $_POST['inst'];

$pass = password_hash($pass, PASSWORD_DEFAULT);
$fl = true;
$fl1 = true;

// $query = mysqli_query($connect, "SELECT * FROM `directions`");
// while($item = mysqli_fetch_assoc($query))
// {
//     if ($item['name'] == $direction)
//      {
//         $fl = false;
//      }
// }

mysqli_query($connect, "INSERT INTO directions (name, id_institute)  VALUES ('$direction', '$id_inst')");


$query = mysqli_query($connect,"SELECT * FROM directions");
$result = mysqli_fetch_all($query);


$id_dir = $result[count($result)-1][0];
mysqli_query($connect, "INSERT INTO users (login, password, fnp , role, id_direction, post) VALUES ('$login', '$pass', '$fnp' , 'OPOP', '$id_dir','$post')");



redirect('../../front/admin.php');


?>

