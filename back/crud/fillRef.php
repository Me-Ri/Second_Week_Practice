<?php
require_once '../connect.php';
require_once  '../helpers.php';

$idStud = $_POST['id_stud'];
$idDir = $_POST['id_dir'];
$dif = $_POST['difficults'];
$volume = $_POST['volume'];
$demQ = $_POST['demQ'];
$comment = $_POST['comments'];
$mark = $_POST['mark'];

mysqli_query($connect, "INSERT INTO `student_practice` (id_student, difficults, volume, qualities, comment, mark) VALUES ('$idStud','$dif','$volume','$demQ', '$comment')");

redirect('../../front/manager_practice.php');

?>