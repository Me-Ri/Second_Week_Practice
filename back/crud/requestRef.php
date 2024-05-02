<?php 
require_once '../connect.php';
require_once  '../helpers.php';


$id_stud = $_POST['id_stud'];
$id_opop = $_POST['id_opop'];

mysqli_query($connect, "INSERT INTO student_opop (id_student, id_opop, state) VALUES ('$id_stud', '$id_opop', 'Ожидает ОПОП')");

redirect('../../front/student.php');
?>