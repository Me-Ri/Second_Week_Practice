<?php 
require_once '../connect.php';
require_once  '../helpers.php';

$id = $_POST['id'];

mysqli_query($connect, "DELETE FROM `institutes` WHERE id = $id");

redirect('../../front/admin.php');

?>