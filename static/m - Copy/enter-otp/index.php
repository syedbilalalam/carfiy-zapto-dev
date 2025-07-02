<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/enter-otp/docs/styles.css">
<title>Carfiy | Know your vehicle better</title>
<?php
    include MAIN_ROOT.'/libraries/lhead.php';
?>
<body>

    <header>
    <?php
        include MAIN_ROOT.'/pages/mobile/commons/header.php';
    ?>
    </header>
    <main>
        <section id="mNavBar" class="mobileNavBar">
            <button id="closeNavBar" class="btn navButton close">Close <span class="material-symbols-outlined"> &#xe316;
                </span></button>
            <button class="btn navButton">My orders</button>
            <button class="btn navButton">Why to choose us</button>
            <button class="btn navButton">About us</button>
            <button class="btn navButton">Pricing</button>
            <button class="btn navButton">Get report</button>
            <button class="btn navButton">Log in</button>
        </section>

        <div class="deviceFrameLimitations">
            <div class="container">
                <div class="headingArea">
                    <h1 class="pageHeading">We have sent a 6-digit OTP to</h1>
                    <p class="infoText"><span class="makeBold">jhon@example.com</span> enter the OTP in the following fields then you will be proceeded.</p>
                </div>
                <div class="otpInput">
                    <div class="inputSet">
                        <input type="text" class="inp otpBox" maxlength="6">
                        <input type="text" class="inp otpBox" maxlength="5">
                        <input type="text" class="inp otpBox" maxlength="4">
                    </div>
                    <div class="inputSet">
                        <input type="text" class="inp otpBox" maxlength="3">
                        <input type="text" class="inp otpBox" maxlength="2">
                        <input type="text" class="inp otpBox" maxlength="1">
                    </div>
                </div>
                <div class="buttonRow">
                    <button class="btn takeWidth" type="submit">Verify & Proceed</button>
                    <button class="btn disabled secondary"  type="button">Resend ? (1:23)</button>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <img class="mainLogo" src="./static/global_files/media/logo-web-white.png" alt="Carfiy">
        <a>Privacy Policy</a>
        <a>Cookie Policy</a>
        <a>Terms & Conditions</a>
        <a>FAQs</a>
        <p>Contact us: carfiy@sample.com</p>
        <p>Contact us: <a>Chat service</a></p>

        <p>Supported payment methods for our precious customers</p>
        <div class="supportedPayMethods">
            <img src="./static/global_files/media/vectors/mc-logo.svg" alt="MasterCard">
            <img src="./static/global_files/media/visa-logo.png" alt="Visa card">
        </div>
        <p class="softwareHouse">Copyrights 2025 carfiy.com. All rights reserved. Website designed and developed by M &
            B Software House</p>
    </footer>


    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Local js file -->
    <script src="./static/m/enter-otp/docs/scripts.js" type="text/javascript"></script>
</body>

</html>