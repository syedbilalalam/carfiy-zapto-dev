<?php
// Main directory
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
require MAIN_ROOT.'/libraries/isloggedin.php';
?>
<section id="mNavBar" class="mobileNavBar" tabindex="0">
    <button id="closeNavBar" class="btn navButton close">Close <span class="material-symbols-outlined"> &#xe316; </span></button>    
    <a class="button" href="./my-orders">
        <button class="btn navButton">My orders</button>
    </a>
    <a class="button" href="./why-to-choose-us">
        <button class="btn navButton">Why to choose us</button>
    </a>
    <a class="button" href="./about-us">
        <button class="btn navButton">About us</button>
    </a>
    <a class="button" href="./pricing">
        <button class="btn navButton">Pricing</button>
    </a>
    <a class="button" href="./get-report">
        <button class="btn navButton">Get report</button>
    </a>
    <?php
    if($GLOBALS['loggedIn']){
    ?>
        <a class="button" href="./account">
            <button class="btn navButton">Account</button>
        </a>
    <?php
    }else{
    ?>
        <a class="button" href="./login">
            <button class="btn navButton">Log in</button>
        </a>
    <?php
    }
    ?>
</section>