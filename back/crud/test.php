<?php
require_once '../connect.php';

$pass = password_hash('admin', PASSWORD_DEFAULT);

mysqli_query($connect, "INSERT INTO `users` (login, password, role) VALUES('admin', '$pass', 'ADMIN')"); 







?>