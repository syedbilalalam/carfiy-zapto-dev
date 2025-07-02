<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    // Fetching logged in detector
    require_once MAIN_ROOT.'/libraries/isloggedin.php';
    // Preventing logged in users to access this page
    if($GLOBALS['loggedIn']){
        header('Location: '.SUB_ROOT.'/account');
    }
    include MAIN_ROOT.'/libraries/uhead.php';
    // Closing database
    $database->close();
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/forget-password/docs/styles.css">
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
        <?php
            require MAIN_ROOT.'/pages/mobile/commons/mobilenav.php';
        ?>
        
        <div class="deviceFrameLimitations">
            <div class="container">
                <div class="headingArea">
                    <h2 class="pageHeading">Leave everything to us we will restore your password instantly,</h2>
                    <h1 class="pageHeading">Lets verify its your email</h1>
                </div>
                <form class="loginForm" action="workers/forgetpassword.php" method="POST">
                    <div class="inpHolder">
                        <div class="inputGroup">
                            <label for="email" class="infoText">Email</label>
                            <input required id="email" name="email" class="inp" type="email" placeholder="Enter your email here e.g jhon@example.com">
                        </div>
                    </div>

                    <div class="buttonGroup">
                        <div class="buttonRow">
                            <button class="btn takeWidth" type="submit">Verify & Proceed</button>
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
    <!-- Sweetaleart 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Local js file -->
    <script src="./static/d/forget-password/docs/scripts.js" type="text/javascript"></script>
</body>

</html>