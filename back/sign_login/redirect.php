<?php 
session_start();
$userRole = $_SESSION['user']['role'];
$userId = $_SESSION['user']['id'];
require_once '../connect.php';
require_once '../helpers.php';

//$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$userId'");

if ($userRole == "ADMIN") 
{
    redirect('../../front/admin.php');
} 
else if ($userRole == "OPOP") 
{
    redirect('../../front/manager_OPOP.php');
}
else if ($userRole == "P_MANAGER") {
    redirect('../../front/manager_practice.php');
}
else  
{
    redirect('../../front/student.php');
}
