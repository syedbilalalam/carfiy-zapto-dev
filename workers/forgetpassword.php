<?php

// Main director
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
require_once MAIN_ROOT.'/libraries/sessiongen.php';


// Fetching inputs
$userEmail=trim($_POST['email']);

// Checking details validity
if( empty($userEmail))
    die('Invalid request');

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
if(!checkEmailVerified($idToken, $userEmail, $database)){
    header('Location: '.SUB_ROOT.'/forget-password?warn-msg='.urlencode('Email not registered yet !'));
    die();
}

// Closing database
$database->close();


// Setting up session for link activation
sendPasswordResetEmail($userEmail);

// echo "success";
header('Location: '.SUB_ROOT.'/verification-pending');
