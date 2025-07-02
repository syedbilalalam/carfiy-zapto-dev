<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/enter-otp/docs/styles.css">
<title>Carfiy | Know your vehicle better</title>
<?php
    include MAIN_ROOT.'/libraries/lhead.php';
?>
<body>

    <header>
    <?php
        include MAIN_ROOT.'/pages/desktop/commons/header.php';
    ?>
    </header>
    <main>
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
    <?php
        include MAIN_ROOT.'/pages/desktop/commons/footer.php';
    ?>
    </footer>


    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Local js file -->
    <script src="./static/d/enter-otp/docs/scripts.js" type="text/javascript"></script>
</body>

</html>