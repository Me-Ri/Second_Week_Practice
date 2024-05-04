<?php
require_once '../connect.php';
require_once  '../helpers.php';
$id = $_POST['pmId'];


mysqli_query($connect, "DELETE FROM `practice` WHERE id_ugu_pm = '$id'");
mysqli_query($connect, "DELETE FROM `student_practice` WHERE 1");
mysqli_query($connect, "DELETE FROM `users` WHERE id = '$id'");
mysqli_query($connect, "DELETE FROM `student_opop` WHERE 1");


redirect('../../front/manager-create.php');
?>



