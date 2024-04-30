<?php
session_start();
function redirect(string $path)
{
    header("Location: $path");
    die();
}
function hasValidationError(string $fieldName): bool {
    return isset($_SESSION['validation'][$fieldName]);
}
function validationErrorMsg(string $fieldName) {
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
    echo $message;
}
function addValidationError(string $fieldName, string $Message) {
    $_SESSION['validation'][$fieldName] = $Message;
    
}
function clearValidation() {
    $_SESSION['validation'] = [];
}
function addOldValue(string $key, mixed $value) {
    $_SESSION['old'][$key] = $value;
}
function old(string $key) {
    $value = $_SESSION['old'][$key] ?? ''; 
    unset($_SESSION['old'][$key]);
    return $value;
}

function errorMsg(string $key, string $message) {
    $_SESSION['message'][$key] = $message;
}
function getErrorMsg(string $key) : string {
    $message = $_SESSION['message']['error'];
    unset($_SESSION['message']['error']);
    return $message;
}

function hasErrorMessage(string $key): bool{
    return isset($_SESSION['message'][$key]);   
}

function currentUser(): array|false {
    $connect = mysqli_connect("127.0.0.1", "root", "", "PHP4");
if(!$connect) {
    die('Ошибка подключения к бд');
}

    if(!isset($_SESSION['user']['id'])) {
        return false;
    }
    $userId = $_SESSION['user']['id'] ?? null;

    $query = mysqli_query($connect, "SELECT * FROM `Users` WHERE `id` = '$userId'");
    $user = mysqli_fetch_assoc($query);
    return $user;
}

function logout() {
    unset($_SESSION['user']['id']);
    redirect('/login.php');
    
}

function checkAuth() {
    if(!isset($_SESSION['user']['id'])) {
        redirect('/index.php');
    }
}
?>
