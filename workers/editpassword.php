<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Checking if loged in or not
require MAIN_ROOT.'/libraries/isloggedin.php';


$newUserPasswrod = trim($_POST['password']);
$newCUserPasswrod = trim($_POST['cpassword']);
if(empty($newUserPasswrod) || empty($newCUserPasswrod) )
    die('Invalid request');

if($newUserPasswrod != $newCUserPasswrod){
    header('Location: '.SUB_ROOT.'/edit-password?err-msg='.urlencode('Enter same password in both fields, Password mismatch!'));
    exit();
}

$newPasswordHash = hex2bin(hash('sha256', $newUserPasswrod));


if($GLOBALS['loggedIn']){
    $stmt=$database->prepare('UPDATE `users` SET `pass_hash`=? WHERE `uid` = ?;');
    $stmt->bind_param('si', $newPasswordHash, $_COOKIE['sid']);
    $stmt->execute();
    $stmt->close();
    $database->close();
    session_start();
    if(!empty( $_SESSION['loginRedirect'])){
        $redirectLink = $_SESSION['loginRedirect'];
        unset( $_SESSION['loginRedirect']);
        header('Location: '.SUB_ROOT.$redirectLink.'?success-msg='.urlencode('Your account password is changed successfully!'));
    }
    else
        header('Location: '.SUB_ROOT.'/account?success-msg='.urlencode('Your account password is changed successfully!'));
    exit();
}else{
    header('Location: '.SUB_ROOT.'/login');
    exit();
}