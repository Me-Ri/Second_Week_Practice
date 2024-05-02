<?php 
require_once '../connect.php';
require_once  '../helpers.php';
$idGroup = $_POST['groupId'];

mysqli_query($connect, "DELETE FROM `groups` WHERE id = '$idGroup'");

redirect('../../front/group-create.php');
?>