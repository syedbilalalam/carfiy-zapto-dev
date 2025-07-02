<?php
// Including sub root informations
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
require_once MAIN_ROOT.'/libraries/firebase.php';
require_once MAIN_ROOT.'/libraries/securedatabase.php';


// Read the ID token from POST request
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$idToken = $data['idToken'] ?? '';

try {
    // Verify token
    $verifiedIdToken = $auth->verifyIdToken($idToken);
    // Our claims from social media sign up/in
    $localId = $verifiedIdToken->claims()->get('sub'); // User UID
    $userEmail = $verifiedIdToken->claims()->get('email'); // Email
    $displayName = $verifiedIdToken->claims()->get('name'); // Display Name

    // Manageing successful sign up/in
    // Updating firebase database
    $stmt=$pdo->prepare('INSERT INTO `firebase`(`localId`, `email`) VALUES (:localId,:email) ON DUPLICATE KEY UPDATE `email` = VALUES(`email`);');
    $stmt->bindParam(':localId', $localId, PDO::PARAM_STR);
    $stmt->bindParam('email', $userEmail, PDO::PARAM_STR);
    $stmt->execute();
    $stmt = null;

    // User verification status
    $userVerified = 1;

    // User table id
    $userTableId = 0;

    // Session var init
    $sessionId;
    
    // Check user previous activity
    $stmt=$pdo->prepare('SELECT  `uid`, `session_id`, `verified` FROM `users` WHERE `email` = :email;');
    $stmt->bindParam(':email', $userEmail, PDO::PARAM_STR);
    $stmt->execute();
    
    if($record = $stmt->fetch(PDO::FETCH_ASSOC)){
        // Closing previous stmt
        $stmt=null;

        // Setting up records and sessions
        $sessionId = $record['session_id'];
        
        // Updating user id
        $userTableId = $record['uid'];

        // Checking previous verification status
        $passwordHash = NULL;

        // Updating the existing record
        $stmt=$pdo->prepare('UPDATE `users` SET '.(!$record['verified']?'`pass_hash`=:passHash, ':'').'`verified`=:verified WHERE `uid` = :userTableId;');
        if(!$record['verified'])
            $stmt->bindParam(':passHash', $passwordHash, PDO::PARAM_NULL);
        $stmt->bindParam(':verified', $userVerified, PDO::PARAM_INT);
        $stmt->bindParam(':userTableId', $userTableId, PDO::PARAM_INT);
        $stmt->execute();
    }
    else{
        // Closing previous stmt
        $stmt=null;
        
        // Generating new session
        require_once MAIN_ROOT.'/libraries/sessiongen.php';
        $sessionId = hex2bin(sessionGenerator($userEmail));
        
        // Registration time
        $regTime = time();

        // Inserting new record local database
        $stmt=$pdo->prepare('INSERT INTO `users`(`name`, `email`, `session_id`, `verified`, `registeration_time`) VALUES (:name,:email,:sessionId,:verified,:regTime);');
        $stmt->bindParam(':name', $displayName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $userEmail, PDO::PARAM_STR);
        $stmt->bindParam(':sessionId', $sessionId, PDO::PARAM_LOB);
        $stmt->bindParam(':verified', $userVerified, PDO::PARAM_INT);
        $stmt->bindParam(':regTime', $regTime, PDO::PARAM_INT);
        $stmt->execute();

        // Updating user table id
        $userTableId = $pdo->lastInsertId();

    }
    // Closing stmt
    $stmt=null;

    // Closing pdo
    $pdo = null;


    // Setting up login cookie
    require_once MAIN_ROOT.'/libraries/cookie.php';
    setHeaderCookie('sid', $userTableId, SUB_ROOT, 5184000);
    setHeaderCookie('marketing_id', bin2hex($sessionId), SUB_ROOT, 5184000);

    // Redirecting user
    // Checking for available redirects
    session_start();
    if(!empty($_SESSION['loginRedirect'])){
        header('Location: '.SUB_ROOT.$_SESSION['loginRedirect']);
        unset($_SESSION['loginRedirect']);
    }
    else
        header('Location: '.SUB_ROOT.'/');
    
    // echo json_encode(["status" => "success", "uid" => $localId]);
} catch (\Exception $e) {
    header('Location: '.SUB_ROOT.'/login?err-msg='.urlencode('Sign in with google is failed try other ways to sign in :('));
    // echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
