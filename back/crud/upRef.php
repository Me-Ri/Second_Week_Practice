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
$badReason = $_POST['bad-reason'];

mysqli_query($connect, "UPDATE `student_practice`  SET id_student = '$idStud', difficults = '$dif',volume = '$volume', qualities ='$demQ', comment = '$comment', mark = '$mark', badReason ='$badReason' WHERE id_student = '$idStud'");

mysqli_query($connect, "UPDATE `student_opop` SET state = 'Подтверждает ОПОП' WHERE id_student = '$idStud' AND id_opop = '$idDir'");

redirect('../../python/doc-1.php?idStud='.urlencode($idStud));

?>