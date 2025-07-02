<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/sign-up/docs/styles.css">
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
                    <h2 class="pageHeading">We hope you get the best experience from us,</h2>
                    <h1 class="pageHeading">Lets sign you up</h1>
                </div>
                <form class="loginForm">
                    <div class="inpHolder">
                        <div class="inputGroup">
                            <label for="user" class="infoText">Name</label>
                            <input required id="user" class="inp" type="text" placeholder="e.g Jhon">
                        </div>
                        <div class="inputGroup">
                            <label for="email" class="infoText">Email</label>
                            <input required id="email" class="inp" type="text" placeholder="Enter your email here e.g jhon@example.com">
                        </div>
                        <div class="inputGroup">
                            <label for="password" class="infoText">Password</label>
                            <div class="showPassword">
                                <input required id="password" class="inp showPasswordInp" type="password" placeholder="Enter your password">
                                <span class="showPasswordTarget" data-status="password">SHOW</span>
                            </div>
                        </div>
                        <div class="inputGroup">
                            <label for="cpassword" class="infoText">Re-Enter Password</label>
                            <div class="showPassword">
                                <input required id="cpassword" class="inp showPasswordInp" type="password" placeholder="Re-Enter your password">
                                <span class="showPasswordTarget" data-status="password">SHOW</span>
                            </div>
                        </div>
                    </div>

                    <div class="buttonGroup">
                        <div class="buttonRow">
                            <button class="btn takeWidth" type="submit">Sign up</button>
                        </div>
                        <div class="buttonRow">
                            <button id="googleSignIn" class="btn takeWidth" type="button">Continue with Google</button>
                        </div>
                        <div class="buttonRow">
                            <button id="fbButton" class="btn takeWidth" type="button">Continue with Facebook</button>
                        </div>
                        <p class="letSignUp">By signing up with us you accept our <a class="makeBold">Terms of use</a> and <a class="makeBold">Privacy policy</a>.</p>
                    </div>
                    <p class="letSignUp">Already have an account <a class="makeBold">Sign In Here</a> ?</p>
                    
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
    <script src="./static/m/sign-up/docs/scripts.js" type="text/javascript"></script>
</body>

</html>