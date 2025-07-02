<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/forget-password/docs/styles.css">
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
            <button id="closeNavBar" class="btn navButton close">Close <span class="material-symbols-outlined"> &#xe316; </span></button>    
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
                    <h2 class="pageHeading">Leave everything to us we will restore your password instantly,</h2>
                    <h1 class="pageHeading">Lets verify its your email</h1>
                </div>
                <form class="loginForm">
                    <div class="inpHolder">
                        <div class="inputGroup">
                            <label for="email" class="infoText">Email</label>
                            <input required id="email" class="inp" type="text" placeholder="Enter your email here e.g jhon@example.com">
                        </div>
                    </div>

                    <div class="buttonGroup">
                        <div class="buttonRow">
                            <button class="btn takeWidth" type="submit">Send OTP & Verify its you</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </main>
    <footer>
    <?php
        include MAIN_ROOT.'/pages/mobile/commons/footer.php';
    ?>
    </footer>


    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Local js file -->
    <script src="./static/m/forget-password/docs/scripts.js" type="text/javascript"></script>
</body>

</html>