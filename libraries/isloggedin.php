<?php

$GLOBALS['loggedIn'] = false;
// Main directory
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
// Connecting to the database
require_once MAIN_ROOT.'/libraries/cookie.php';
require_once MAIN_ROOT.'/libraries/database.php';

$clientAccountRecord = NULL;
if(!empty($_COOKIE['sid']) && !empty($_COOKIE['marketing_id'])){
    $stmt = $database->prepare('SELECT  `uid`,`name`, `email`, `session_id` FROM `users` WHERE `uid`=?;');
    $stmt->bind_param('i', $_COOKIE['sid']);
    $stmt->execute();
    $result = $stmt->get_result();
    $clientAccountRecord = $result->fetch_assoc();
    if($result->num_rows && bin2hex($clientAccountRecord['session_id']) == $_COOKIE['marketing_id']){
        $GLOBALS['loggedIn'] = true;
    }else{
        setHeaderCookie('sid', '', SUB_ROOT, 0);
        setHeaderCookie('marketing_id', '', SUB_ROOT, 0);
    }
    $stmt->close();
}