<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
// Checking if loged in or not
require MAIN_ROOT.'/libraries/isloggedin.php';
session_start();
if(!$GLOBALS['loggedIn']){
    $_SESSION['loginRedirect'] = '/libraries/getreport.php';
    header('Location: '.SUB_ROOT.'/login?info-msg='.urlencode('You need to sign in to your account to proceed with purchasing your report!'));
    exit();
}
