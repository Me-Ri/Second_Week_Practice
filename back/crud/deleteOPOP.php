<?php
require_once '../connect.php';
require_once  '../helpers.php';
$idOpop = $_POST['id_opop'];
$opop = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` where id = $idOpop"));
$idDir = $_POST['id_dir'];
$direction = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `directions` where id = $idDir"));
mysqli_query($connect, "DELETE FROM `users` WHERE id = '$idOpop'");
mysqli_query($connect, "DELETE FROM `directions` WHERE id = '$idDir'");

$group = mysqli_query($connect, "SELECT * FROM `groups` WHERE id_direction =  '$idDir' ");

while ($item = mysqli_fetch_assoc($group)) {
    $groupId = $item['id'];
    $stud = mysqli_query($connect, "SELECT * FROM `students` where id_group = '$groupId'");
    while ($st = mysqli_fetch_assoc($stud)) {
        $studId = $st['id'];
        mysqli_query($connect, "DELETE FROM `users` WHERE id_student =  '$studId'");
        mysqli_query($connect, "DELETE FROM `student_practice` WHERE id_student = '$studId'");
    }   
    mysqli_query($connect, "DELETE FROM `students` where id_group = '$groupId'");
    mysqli_query($connect, "DELETE FROM `practice` WHERE id_group = '$groupId'");
}
mysqli_query($connect, "DELETE FROM `groups` WHERE id_direction =  '$idDir' ");
mysqli_query($connect, "DELETE FROM `users` WHERE id_direction =  '$idDir' ");
mysqli_query($connect, "DELETE FROM `student_opop` WHERE id_opop =  '$idDir' ");

 redirect('../../front/admin.php');


?>