<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    // Fetching logged in detector
    require_once MAIN_ROOT.'/libraries/isloggedin.php';
    // Preventing logged in users to access this page
    if($GLOBALS['loggedIn']){
        header('Location: '.SUB_ROOT.'/account');
    }
    include MAIN_ROOT.'/libraries/uhead.php';

?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/sign-up/docs/styles.css">
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
                    <h2 class="pageHeading">We hope you get the best experience from us,</h2>
                    <h1 class="pageHeading">Lets sign you up</h1>
                </div>
                <form class="loginForm" action="workers/signup.php" method="POST">
                    <div class="inpHolder">
                        <div class="inputGroup">
                            <label for="user" class="infoText">Name</label>
                            <input required id="user" name="uname" class="inp" maxlength="28" type="text" placeholder="e.g Jhon">
                        </div>
                        <div class="inputGroup">
                            <label for="email" class="infoText">Email</label>
                            <input required id="email" name="email" class="inp" type="email" placeholder="Enter your email here e.g jhon@example.com">
                        </div>
                        <div class="inputGroup">
                            <label for="password" class="infoText">Password</label>
                            <div class="showPassword">
                                <input required id="password" name="password"  class="inp showPasswordInp" maxlength="300" type="password" placeholder="Enter your password" minlength="8">
                                <span class="showPasswordTarget" data-status="password">SHOW</span>
                            </div>
                        </div>
                        <div class="inputGroup">
                            <label for="cpassword" class="infoText">Re-Enter Password</label>
                            <div class="showPassword">
                                <input required id="cpassword" name="cpassword" class="inp showPasswordInp" maxlength="300" type="password" placeholder="Re-Enter your password" minlength="8">
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
                    </div>
                    <p class="letSignUp">Already have an account <a class="makeBold" href="./login">Sign In Here</a> ?</p>
                    <p class="letSignUp">By signing up with us you accept our <a class="makeBold" href="./terms-of-use">Terms of use</a> and <a class="makeBold" href="./privacy-policy">Privacy policy</a>.</p>
                    
                </form>
            </div>
        </div>
    </main>
    <footer>
    <?php
        include MAIN_ROOT.'/pages/desktop/commons/footer.php';
            // Closing database
    // $database->close();
    ?>
    </footer>
    <!-- Sweetaleart 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FireBase mail handling -->
    <script src="static/d/sign-up/docs/firebase-mail-handling.js" type="module"></script>
    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Sign in with social -->
    <script src="./static/global_files/docs/s-in-google.js" type="module"></script>
    <!-- Local js file -->
    <script src="./static/d/sign-up/docs/scripts.js" type="text/javascript"></script>
</body>

</html>