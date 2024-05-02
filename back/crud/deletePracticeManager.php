<?php
require_once '../connect.php';
require_once  '../helpers.php';
$id = $_POST['pmId'];

mysqli_query($connect, "DELETE FROM `users` WHERE id = '$id'");

redirect('../../front/manager-create.php');
?>



