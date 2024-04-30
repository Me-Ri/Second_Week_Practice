<?php
require_once __DIR__ . '/../helpers.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logout();
} 
redirect('/index.php');
?>