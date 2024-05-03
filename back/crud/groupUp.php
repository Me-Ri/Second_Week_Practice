<?php
require_once '../connect.php';
require_once  '../helpers.php';


$groupName = $_POST['group-name'];
$groupCourse = $_POST['group-course'];
$idDirection = $_POST['id_dir'];
$idGroup = $_POST['id_group'];

mysqli_query($connect, "UPDATE `groups` SET name = '$groupName', id_direction = '$idDirection' , course = '$groupCourse' WHERE id = '$idGroup'");

redirect('../../front/group-create.php');
?>