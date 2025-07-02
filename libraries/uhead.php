<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/libraries/serviceemail.php';
    session_start();
    // Clearing older post datas
    if(isset($_SESSION['postRequest']))
        unset($_SESSION['postRequest']);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION['postRequest'] = $_POST;
    }

    // Defining crypto support status status
    define('CRYPTO_SUPPORT', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="/">
<!-- Global css file -->
<link rel="stylesheet" href="./static/global_files/docs/global.css">
<!-- Google fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />