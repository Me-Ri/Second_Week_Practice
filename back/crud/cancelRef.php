<?php
require_once '../connect.php';
require_once  '../helpers.php';

$idStud = $_POST['studId'];

mysqli_query($connect, "UPDATE `student_opop` set state = 'Редактирует ПМ' Where id_student = $idStud");


redirect('../../front/manager_OPOP.php');


?>
