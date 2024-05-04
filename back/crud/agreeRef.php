<?php
require_once '../connect.php';
require_once  '../helpers.php';

$studId = $_POST['studId'];

mysqli_query($connect, "UPDATE student_opop SET state = 'Подтвержден' WHERE id_student = '$studId'");


redirect('../../front/manager_OPOP.php');

?>