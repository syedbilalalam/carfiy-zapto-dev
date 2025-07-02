<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Checking if loged in or not
require MAIN_ROOT.'/libraries/isloggedin.php';


$newUserName = trim($_POST['uname']);
if(empty($newUserName))
    die('Invalid request');


if($GLOBALS['loggedIn']){
    
    $stmt=$database->prepare('UPDATE `users` SET `name`=? WHERE `uid` = ?;');
    $stmt->bind_param('si', $newUserName, $_COOKIE['sid']);
    $stmt->execute();
    $stmt->close();
    $database->close();

    header('Location: '.SUB_ROOT.'/account?success-msg='.urlencode('Your account name is changed successfully!'));
    exit();
}else{
    session_start();
    $_SESSION['loginRedirect'] = '/account';
    header('Location: '.SUB_ROOT.'/login');
    exit();
}