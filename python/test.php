<?php

require_once '../back/connect.php';
require_once '../back/helpers.php';
$id = $_GET['idStud'];

$student = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `students` WHERE id = '$id'"));
$idGroup = $student['id_group'];
$idStud = $student['id'];
$group = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `groups` WHERE id = '$idGroup'"));
$idDir = $group['id_direction'];
$practice = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `practice` WHERE id_group = '$idGroup'"));
$studPractice = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `student_practice` WHERE id_student = '$idStud'"));
$idPM = $practice['id_ugu_pm'];
$practiceManager = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$idPM'"));
$direction = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `directions` WHERE id = '$idDir'"));
$idInst = $direction['id_institute'];
$inst = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `institutes` WHERE id = '$idInst'"));
$instName = $inst['name'];


// var_dump($student);
// var_dump($practice);
// var_dump($studPractice);
// var_dump($practiceManager);


$practManager = $practiceManager['fnp'];
$studFnp = $student['fnp'];
$groupCourse = $group['course'];
$groupName = $group['name'];

$postPM = $practiceManager['post'];
$typePrac = $practice['type'];
$viewPrac = $practice['view'];

$start_date = $practice['start_date'];
$end_date  = $practice['end_date'];
$date = $start_date.'-'.$end_date;
$dirName = $direction['name'];
$address = $practice['address'];
$quality = $studPractice['qualities'];
$difficult = $studPractice['difficults'];
$volume = $studPractice['volume'];
$comment = $studPractice['comment'];
$mark = $studPractice['mark'];

// $command = implode(" ", $array);
// var_dump($command);


// $name = $_POST['name'];
// $pass = $_POST['password'];
// $code = $_POST['code'];
// $_SESSION['validation'] = [];
// $_SESSION['user'] = [];


// $result = shell_exec("python test.py $practManager");

$result = shell_exec("python test.py \"$practManager\" \"$practManager\" \"$practManager\" \"$studFnp\" \"$instName\" \"$groupCourse\" \"$groupName\" \"ФГБОУ ВО 'Югорский Государственный Университет'\" \"$postPM\" \"$typePrac\" \"$date\" \"$postPM\" \"$dirName\" \"$postPM\" \"$viewPrac\" \"$address\" \"$quality\" \"$difficult\" \"$volume\" \"$comment\" \"$mark\" \"$idStud\"");
// $result = shell_exec("python test.py $practManager $practManager $practManager $studFnp $groupCourse $groupName $postPM $typePrac $date $postPM $dirName $postPM $viewPrac $address $quality $difficult $volume $comment");

// var_dump($result);
redirect('../front/manager_practice.php')

?>