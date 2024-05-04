<?php 
require_once '../connect.php';
require_once  '../helpers.php';

$name = $_POST['name'];

mysqli_query($connect, "INSERT INTO `institutes` (name) VALUES ('$name')");

redirect('../../front/admin.php');

?>