<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Checking all the input fields
$vinNumber = trim($_POST['vin']);
$plan = trim($_POST['plan']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);

if(empty($vinNumber) || empty($plan) || empty($phone)){
    header('Location :'.SUB_ROOT.'/get-report?err-msg='.urlencode('Invalid information'));
    die();
}

// Checking email validity
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location :'.SUB_ROOT.'/get-report?err-msg='.urlencode('Invalid email address'));
    die();
}

require_once MAIN_ROOT.'/libraries/isloggedin.php';
require_once MAIN_ROOT.'/libraries/pricing.php';
if(!$GLOBALS['loggedIn'])
    die('Invalid request!');

// Updating to the database about new order
$stmt=$database->prepare('INSERT INTO `orders`( `uid`, `plan`, `vin`, `phone`, `amount`, `payment_status`, `delivery_status`, `time`) VALUES (?,?,?,?,?,?,?,?)');
$orderTime = time();
$amount = PRICING[$plan];
$paid = 0;
$deliveryStatus = 1;
$registrationTime = time();
$stmt->bind_param('isssiiii', $clientAccountRecord['uid'], $plan, $vinNumber, $phone, $amount, $paid, $deliveryStatus, $registrationTime);
$stmt->execute();
$stmt->close();
$orderId = $database->insert_id;
$database->close();

// Deleting session older details
session_start();
if(isset($_SESSION['getOrder']))
    unset($_SESSION['getOrder']);

header('Location: '.SUB_ROOT.'/payment-method?o_id='.$orderId);
