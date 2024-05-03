<?php
require_once '../helpers.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    logout();
} 
redirect('/index.php');
?>