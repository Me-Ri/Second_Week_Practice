<?php

require_once '../back/connect.php';
require_once '../back/helpers.php';

$idPractice = $_POST['pracId'];
$commentManager = $_POST['comment'];
//$id = $_GET['idStud'];

$practice = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `practice` WHERE id = '1'"));
$groupId = $practice['id_group'];

$group =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `groups` WHERE id = '$groupId'"));
$idDir = $group['id_direction'];
$direction = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `directions` WHERE id = '$idDir'"));

$opop = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` WHERE id_direction = '$idDir' AND role ='OPOP'"));

$idPM = $practice['id_ugu_pm'];
$practice_manager = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$idPM'"));


$student = mysqli_query($connect, "SELECT * FROM `students` WHERE id_group = '$groupId'");


$OPOPmanager = $opop['fnp'];
$practManager = $practice_manager['fnp'];
$dirName = $direction['name'];
$groupCourse = $group['course'];
$groupName = $group['name'];
$start_date = $practice['start_date'];
$end_date  = $practice['end_date'];
$date = $start_date.'-'.$end_date;
$numberOrder = $practice['order_num'];
$dateOrder = $practice['order_date'];

$array = [];

while ($item = mysqli_fetch_assoc($student)) {
    $stId = $item['id'];
    $studPractice = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `student_practice` WHERE id_student = '$stId'"));
    $mark = $studPractice['mark'];
    $badReason = $studPractice['badReason'];
    $data = $mark.'@'. $badReason .'@'.$item['fnp'];
    array_push($array, $data);

}



var_dump($practManager);
var_dump($OPOPmanager);
var_dump($dirName);
var_dump($groupCourse);
var_dump($groupName);
var_dump($date);
var_dump($numberOrder);
var_dump($dateOrder);
var_dump($array);

$arrayString = implode(",", $array);

$codeDir = NULL;
if ($dirName == "Программная инженерия") {
    $codeDir = "09.03.04";
}
else { // ИВТ
    $codeDir = "09.03.01";
}


 $result = shell_exec("python doc-2.py \"$OPOPmanager\" \"$practManager\" \"$codeDir\" \"$dirName\" \"$groupCourse\" \"$groupName\" \"$arrayString\" \"$commentManager\" \"$numberOrder\" \"$dateOrder\" \"$date\" ");

 //redirect('../front/manager_practice.php');
?>