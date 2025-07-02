<?php
session_start();
// Clearing older post datas
if(isset($_SESSION['postRequest']))
    unset($_SESSION['postRequest']);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['postRequest'] = $_POST;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carfiy | Know your vehicle better</title>
    <link rel="stylesheet" href="./static/global_files/docs/global.css">
    <style>
        .pageLoadingCover{
            background-color:red;
            background-color:var(--pellet-dark);
            display:flex;
            justify-content: center;
            align-items:center;
            height:100vh;
            width:100vw;
            position:fixed;
            top:0;
            left:0;
            z-index:100;
            transition:0.2s
        }
        .pageLoadingCover .img{
            width:120px;
        }
    </style>
</head>
<body>
    <img src="./static/global_files/media/logo-web-white.png" alt="Carfiy">
    <script>
        let userAgent;
        if(window.innerWidth< 630)
            userAgent = 'm';
        else
            userAgent = 'd';
        const targetURL = new URL(window.location.href);
        targetURL.searchParams.set('user-agent',userAgent);
        setTimeout(()=>{
            window.location.replace(targetURL.toString());
        },1000);
    </script>
</body>
</html>