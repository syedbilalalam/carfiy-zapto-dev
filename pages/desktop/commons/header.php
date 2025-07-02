<?php
// Main directory
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
require MAIN_ROOT.'/libraries/isloggedin.php';
?>
<a href="./">
    <img class="mainLogo" src="static/global_files/media/logo-web-white.png" alt="Carfiy">
</a>
<nav class="navButtonsHolder">
    <a href="./my-orders">
        <button class="btn navButton">My orders</button>
    </a>
    <a href="./why-to-choose-us">
        <button class="btn navButton">Why to choose us</button>
    </a>
    <a href="./about-us">
        <button class="btn navButton">About us</button>
    </a>
    <a href="./pricing">
        <button class="btn navButton">Pricing</button>
    </a>
    <a href="./get-report">
        <button class="btn navButton">Get report</button>
    </a>
    <?php
    if($GLOBALS['loggedIn']){

    ?>
    <a href="./account">
        <button class="btn navButton">Account</button>
    </a>
    <?php
    }else{
    ?>
        <a href="./login">
            <button class="btn navButton">Log in</button>
        </a>
    <?php
    }
    ?>
</nav>
