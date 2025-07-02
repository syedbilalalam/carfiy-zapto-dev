<?php
// Checking if admin is logged in or not
require $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Importing LDB
require_once MAIN_ROOT.'/libraries/ad-dsaltb.php';
// Starting the session
session_start();

if(!empty($_POST['email']) && !empty($_POST['password'])){
    if(isset(LDB[$_POST['email']]) && LDB[$_POST['email']] == $_POST['password']){
        // Logged in now setting up the session
        $_SESSION['adminEmail'] = $_POST['email'];
        $_SESSION['adminPassword'] = $_POST['password'];

        header('Location: '.SUB_ROOT.'/seller/admin/home/index.php');
        exit();
    }
}
if(!empty($_SESSION['adminEmail']) && !empty($_SESSION['adminPassword'])){
    if(isset(LDB[$_SESSION['adminEmail']]) && LDB[$_SESSION['adminEmail']] == $_SESSION['adminPassword']){
        header('Location: '.SUB_ROOT.'/seller/admin/home/index.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            box-sizing:border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="#" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
