<?php
require_once '../connect.php';
require_once  '../helpers.php';


$groupName = $_POST['group-name'];
$groupCourse = $_POST['group-course'];
$idDirection = $_POST['id_dir'];

mysqli_query($connect, "INSERT INTO `groups` (name, id_direction, course) VALUES ('$groupName','$idDirection','$groupCourse')");

redirect('../../front/group-create.php');
?>