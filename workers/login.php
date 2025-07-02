<?php
// Fetching inputs
$userEmail=trim($_POST['email']);
$userPassword=trim($_POST['password']);

// Checking details validity
if(empty($userPassword)  || empty($userEmail)){
    header('Location: '.SUB_ROOT.'/login?err-msg='.urlencode('Invalid information entered !'));
    die();
}

// Checking email validity
if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    header('Location: '.SUB_ROOT.'/login?err-msg='.urlencode('Invalid email !'));
    die();
}

// Main directory
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
// Connecting to the database
require_once MAIN_ROOT.'/libraries/database.php';

// Contacting firebase
require_once MAIN_ROOT.'/libraries/firebase.php';

// Checking if email exists or not
$stmt = $database->prepare('SELECT `email` FROM `firebase` WHERE `email` = ?;');
$stmt->bind_param('s', $userEmail);
if(!$stmt->execute())
    die('Invalid request');
$result = $stmt->get_result();
$stmt->close();

$idToken = getIdToken($userEmail,$auth, $database);
if(empty($idToken) && !checkEmailVerified($idToken, $userEmail, $database))
    header('Location: '.SUB_ROOT.'/login?err-msg='.urlencode('Invalid information entered !'));
else {
    $passwordHash = hash('sha256', $userPassword);
    $stmt = $database->prepare('SELECT `uid`, `pass_hash`, `session_id` FROM `users` WHERE `email` = ?;');
    $stmt->bind_param('s', $userEmail);
    $stmt->execute();
    $userInformation=$stmt->get_result()->fetch_assoc();
    $stmt->close();
    // Checking if password is correct or not
    if($userInformation['pass_hash'] && bin2hex($userInformation['pass_hash']) == $passwordHash){
        require_once MAIN_ROOT.'/libraries/cookie.php';
        setHeaderCookie('sid', $userInformation['uid'], SUB_ROOT, 5184000);
        setHeaderCookie('marketing_id', bin2hex($userInformation['session_id']), SUB_ROOT, 5184000);

        // Checking for available redirects
        session_start();
        if(!empty($_SESSION['loginRedirect'])){
            header('Location: '.SUB_ROOT.$_SESSION['loginRedirect']);
            unset($_SESSION['loginRedirect']);
        }
        else
            header('Location: '.SUB_ROOT.'/');
        exit();
    }
    else if (loginUser($userEmail, $userPassword, $database)){
        // Updating the new password to the server
        $newPasswordHash = hex2bin(hash('sha256', $userPassword));
        $stmt=$database->prepare('UPDATE `users` SET `pass_hash`=? WHERE `email`=?');
        $stmt->bind_param('ss', $newPasswordHash, $userEmail);
        $stmt->execute();

        // Loggin as usual
        require_once MAIN_ROOT.'/libraries/cookie.php';
        setHeaderCookie('sid', $userInformation['uid'], SUB_ROOT, 5184000);
        setHeaderCookie('marketing_id', bin2hex($userInformation['session_id']), SUB_ROOT, 5184000);

        // Checking for available redirects
        session_start();
        if(!empty($_SESSION['loginRedirect'])){
            header('Location: '.SUB_ROOT.$_SESSION['loginRedirect']);
            unset($_SESSION['loginRedirect']);
        }
        else
            header('Location: '.SUB_ROOT.'/');
        exit();
    }
    else{
        header('Location: '.SUB_ROOT.'/login?err-msg='.urlencode('Wrong information entered !'));
        die();
    }
    
    // Closing database
    $database->close();
}

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <base href='/ms/'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carfiy Loading...</title>
    <link rel="stylesheet" href="./static/global_files/docs/global.css">
    <style>
        body{
            background-color:red;
            background-color:var(--pellet-dark);
            display:flex;
            justify-content: center;
            align-items:center;
            height:100vh;
            width:100vw;
        }
        img{
            width:120px;
        }
    </style>
</head>
<body>
    <img src="./static/global_files/media/logo-web-white.png" alt="Carfiy">
    <script>
       
        setTimeout(()=>{
            window.location.replace('<?php echo './'; ?>');
        },11000);
    </script>
</body>
</html> -->
