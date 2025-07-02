<?php

// Main director
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
require_once MAIN_ROOT.'/libraries/sessiongen.php';


// Fetching inputs
$userName=trim($_POST['uname']);
$userPassword=trim($_POST['password']);
$userConfirmPassword=trim($_POST['cpassword']);
$userEmail = trim($_POST['email']);

// Checking details validity
if(empty($userName) || empty($userPassword) || empty($userConfirmPassword) || empty($userEmail))
    die('Invalid request');
// Checking passwords
if($_POST['password'] != $_POST['cpassword']){
    header('Location: '.SUB_ROOT.'/sign-up?err-msg='.urlencode('Enter same password in both fields, Password mismatch!'));
    die();
}

// Checking email validity
if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    die('Invalid request');
}

// Connecting to the database
require_once MAIN_ROOT.'/libraries/database.php';

// Sending email to the user
require_once MAIN_ROOT.'/libraries/firebase.php';

// Checking if already have an account of this email
$idToken = getIdToken($userEmail,$auth, $database);
if(checkEmailVerified($idToken, $userEmail, $database)){
    header('Location: '.SUB_ROOT.'/sign-up?warn-msg='.urlencode('Email already registered to us !'));
    die();
}

$uid = 0;
// Checking for old user records
$stmt = $database->prepare('SELECT `uid` FROM `users` WHERE `email` = ?;');
$stmt->bind_param('s', $userEmail);
if(!$stmt->execute())
    die('Invalid request');
$userOldRecords=null;
$result=$stmt->get_result();
if($result->num_rows){
    $userOldRecords = $result->fetch_assoc();
    $uid = $userOldRecords['uid'];
}
$stmt->close();

// Creating hash of the user password
$passwordHash = hash('sha256', $userPassword);


// Starting the session to check for previous tokens
session_start();
$idToken = getIdToken($userEmail, $auth, $database, $passwordHash);
$passwordHashBin = hex2bin($passwordHash);

// Generating new session id
$newSessionId=sessionGenerator();
$newSessionIdBin=hex2bin($newSessionId);
$regTime = time();


$isVerified = 0;
$enc_key = '';
if(empty($userOldREcords)){
    $stmt=$database->prepare('INSERT INTO `users`(`name`, `email`, `enc_key`, `pass_hash`, `session_id`, `verified`, `registeration_time`) VALUES (?,?,?,?,?,?,?);');
    $stmt->bind_param('sssssii', $userName, $userEmail, $enc_key, $passwordHashBin, $newSessionIdBin, $isVerified, $regTime);
    if(!$stmt->execute())
        die('Invalid request');
    $uid = $database->insert_id;
}else{
    $stmt->$database->prepare('UPDATE `users` SET `name`=?,`enc_key`=?,`pass_hash`=?,`session_id`=?,`verified`=?,`registeration_time`=? WHERE `email` = ?;');
    $stmt->bind_param('ssssiis', $userName, $enc_key, $passwordHashBin, $newSessionIdBin, $isVerified, $regTime, $userEmail);
    if(!$stmt->execute())
        die('Invalid request');
}
$stmt->close();
// Handling the firebase idToken
// Sending the verification email
$response = sendVerificationEmail($idToken);

// Setting up session for link activation
$_SESSION['loginUID'] = $uid;
$_SESSION['loginSession'] = $newSessionId;
$_SESSION['loginEmail'] = $userEmail;
$_SESSION['loginExp'] = time()+420;

// print_r($response);

// Closing database
$database->close();

// echo "success";
header('Location: '.SUB_ROOT.'/verification-pending');
