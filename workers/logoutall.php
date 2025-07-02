<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Checking if loged in or not
require MAIN_ROOT.'/libraries/isloggedin.php';

// For removing client cookies
require_once MAIN_ROOT.'/libraries/cookie.php';


if($GLOBALS['loggedIn']){
    // Generating new session id
    require_once MAIN_ROOT.'/libraries/sessiongen.php';
    $newSessionId = hex2bin(sessionGenerator());


    $stmt=$database->prepare('UPDATE `users` SET `session_id`=? WHERE `uid` = ?;');
    $stmt->bind_param('si', $newSessionId, $_COOKIE['sid']);
    $stmt->execute();
    $stmt->close();
    $database->close();

    // Removing client cookies
    require_once MAIN_ROOT.'/libraries/cookie.php';
    
}
// Removing client cookie
setHeaderCookie('sid', '', SUB_ROOT, 0);
setHeaderCookie('marketing_id', '', SUB_ROOT, 0);
header('Location: '.SUB_ROOT.'/');


