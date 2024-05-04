<?php 
require_once '../connect.php';
require_once  '../helpers.php';

$id_stud = $_POST['id_stud'];
$id_dir = $_POST['id_dir'];

mysqli_query($connect, "UPDATE `student_opop` SET state = 'Ожидает ПМ' WHERE id_student = $id_stud AND id_opop = $id_dir");

redirect('../../front/manager_OPOP.php');

?>