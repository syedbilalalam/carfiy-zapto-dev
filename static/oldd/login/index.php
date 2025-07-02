<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/login/docs/styles.css">
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
                    <h2 class="pageHeading">Welcome back,</h2>
                    <h1 class="pageHeading">Lets log you in</h1>
                </div>
                <form class="loginForm">
                    <div class="inpHolder">
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
                    </div>

                    <div class="buttonGroup">
                        <div class="buttonRow">
                            <button class="btn takeWidth" type="submit">Log in</button>
                            <button class="btn"  type="button">Forget password ?</button>
                        </div>
                        <div class="buttonRow">
                            <button id="googleSignIn" class="btn takeWidth" type="button">Continue with Google</button>
                        </div>
                        <div class="buttonRow">
                            <button id="fbButton" class="btn takeWidth" type="button">Continue with Facebook</button>
                        </div>
                    </div>

                    <p class="letSignUp">Don't have an account <a>Sign Up Here</a> ?</p>
                    
                </form>
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
    <!-- Sign in with social -->
    <script src="./static/global_files/docs/s-in-google.js" type="module"></script>
    <!-- Local js file -->
    <script src="./static/d/login/docs/scripts.js" type="text/javascript"></script>
</body>

</html>