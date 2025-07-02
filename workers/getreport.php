<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Checking all the input fields
$vinNumber = trim($_POST['vin']);
$plan = trim($_POST['plan']);
$phone = trim($_POST['phone']);

if(empty($vinNumber) || empty($plan) || empty($phone)){
    header('Location :'.SUB_ROOT.'/get-report?err-msg='.urlencode('Invalid information'));
    die();
}

// Storing the information in the session
session_start();
$_SESSION['getOrder'] = [
    'vin'=> $vinNumber,
    'plan'=>$plan,
    'phone'=>$phone
];

// Handleing the control back to the file
// require MAIN_ROOT.'/libraries/getreport.php';

$_SESSION['loginRedirect'] = '/get-report';
header('Location: '.SUB_ROOT.'/login?info-msg='.urlencode('You need to sign in to your account to proceed with purchasing your report!'));
