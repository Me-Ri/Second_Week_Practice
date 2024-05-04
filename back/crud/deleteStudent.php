<?php
require_once '../connect.php';
require_once  '../helpers.php';

$idStud = $_POST['id_stud'];

mysqli_query($connect, "DELETE FROM `users` WHERE id_student = '$idStud'");
mysqli_query($connect, "DELETE FROM `students` WHERE id = '$idStud'");
mysqli_query($connect, "DELETE FROM `student_opop` WHERE id_student = '$idStud'");
mysqli_query($connect, "DELETE FROM `student_practice` WHERE id_student = '$idStud'");

redirect('../../front/group-create.php');


?>
