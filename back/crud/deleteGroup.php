<?php 
require_once '../connect.php';
require_once  '../helpers.php';
$idGroup = $_POST['groupId'];

$group = mysqli_query($connect, "SELECT * FROM `groups` WHERE id =  '$idGroup' ");

while ($item = mysqli_fetch_assoc($group)) {
    $groupId = $item['id'];
    $stud = mysqli_query($connect, "SELECT * FROM `students` where id_group = '$groupId'");
    while ($st = mysqli_fetch_assoc($stud)) {
        $studId = $st['id'];
        mysqli_query($connect, "DELETE FROM `users` WHERE id_student =  '$studId'");
        mysqli_query($connect, "DELETE FROM `students` where id = '$studId'");
        mysqli_query($connect, "DELETE FROM `student_opop` WHERE id_student = '$studId'");
        mysqli_query($connect, "DELETE FROM `student_practice` WHERE id_student = '$studId'");
    }
    
   
}
mysqli_query($connect, "DELETE FROM `practice` WHERE id_group = '$idGroup'");
mysqli_query($connect, "DELETE FROM `groups` WHERE id = '$idGroup'");



redirect('../../front/group-create.php');
?>