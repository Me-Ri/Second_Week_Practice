<?php
require_once '../connect.php';
$pass = password_hash('zmo', PASSWORD_DEFAULT);

mysqli_query($connect, "UPDATE `users` SET password = '$pass' WHERE id = '9'");







?>