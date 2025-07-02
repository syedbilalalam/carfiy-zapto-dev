<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
session_start();
// print_r($_SESSION);
// die();
if(empty($_SESSION['loginUID']) || empty($_SESSION['loginSession']) || empty($_SESSION['loginEmail']) || empty($_SESSION['loginExp']) || time()> $_SESSION['loginExp']){
    $sessionExpired = false;
    if(isset($_SESSION['loginUID'])){
        $sessionExpired=true;
        unset($_SESSION['loginUID']);
    }
    if(isset($_SESSION['loginSession']))
        unset($_SESSION['loginSession']);
    if(isset($_SESSION['loginEmail']))
        unset($_SESSION['loginEmail']);
    if(isset($_SESSION['loginExp']))
        unset($_SESSION['loginExp']);
    
    if($sessionExpired)
        header('Location: '.SUB_ROOT.'/login?warn-msg='.urlencode('Session expired !'));
    else
        header('Location: '.SUB_ROOT.'/login');
    exit();
}


require_once MAIN_ROOT.'/libraries/database.php';
require_once MAIN_ROOT.'/libraries/firebase.php';
$idToken = getIdToken($_SESSION['loginEmail'], $auth, $database);
if(checkEmailVerified($idToken, $_SESSION['loginEmail'],$database)){
    require_once MAIN_ROOT.'/libraries/cookie.php';
    setHeaderCookie('sid', $_SESSION['loginUID'], SUB_ROOT, 5184000);
    setHeaderCookie('marketing_id', $_SESSION['loginSession'], SUB_ROOT, 5184000);

     // Removing session details
    if(isset($_SESSION['loginUID']))
        unset($_SESSION['loginUID']);
    if(isset($_SESSION['loginSession']))
        unset($_SESSION['loginSession']);
    if(isset($_SESSION['loginEmail']))
        unset($_SESSION['loginEmail']);
    if(isset($_SESSION['loginExp']))
        unset($_SESSION['loginExp']);

    // Checking for login redirects
    if(!empty($_SESSION['loginRedirect'])){
        $loginRedirect = $_SESSION['loginRedirect'];
        unset($_SESSION['loginRedirect']);
        header('Location: '.SUB_ROOT.$loginRedirect);
    }
    else
        header('Location: '.SUB_ROOT.'/?success-msg='.urlencode('Account created successfully!'));
    exit();
}else{
    header('Location: '.SUB_ROOT.'/verification-pending?warn-msg='.urlencode('Email is not verified yet ! Visit your email account and click on the provided link wait for that link to verify its you.'));
}

// var_dump(sendPasswordResetEmail('syedbilalalam2006@gmail.com'));
// echo 'hello';