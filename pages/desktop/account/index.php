<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
    // Account page handling
    require MAIN_ROOT.'/libraries/isloggedin.php';
    // var_dump($GLOBALS['loggedIn']);
    // die();
    if(!$GLOBALS['loggedIn']){
        // session_start();
        $_SESSION['loginRedirect'] = '/account';
        header('Location: '.SUB_ROOT.'/login');
        exit();
    }
    // // Closing database
    // $database->close();
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/account/docs/styles.css">
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
                    <h1 class="pageHeading">Hi <?php echo htmlspecialchars($clientAccountRecord['name']); ?>,</h1>
                    <h2 class="pageHeading">How we can help you today</h2>
                    <p class="infoText">Here you have full control of your account and mange and edit your personal information even with logout controls.</p>
                </div>
                <div class="optionsContainer">
                    <a href="./edit-name">
                        <button class="btn option">
                            <span>Edit Name</span>
                            <span class="material-symbols-outlined">&#xe3c9;</span>
                        </button>
                    </a>
                    <a href="./edit-password">
                        <button class="btn option">
                            <span>Edit/Create Password</span>
                            <span class="material-symbols-outlined">&#xe3c9;</span>
                        </button>
                    </a>
                    <a href="./my-orders">
                        <button class="btn option">
                            <span>I want to view my ordered reports</span>
                            <span class="material-symbols-outlined">&#xef6e;</span>
                        </button>
                    </a>
                    <a href="workers/logout.php">
                        <button class="btn option">
                            <span>Log out from this device</span>
                            <span class="material-symbols-outlined">&#xe9ba;</span>
                        </button>
                    </a>
                    <a href="workers/logoutall.php">
                        <button class="btn option">
                            <span>Log out from all devices</span>
                            <span class="material-symbols-outlined">&#xe9ba;</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <footer>
    <?php
        include MAIN_ROOT.'/pages/desktop/commons/footer.php';
        // // Closing database
        $database->close();
    ?>
    </footer>

    <!-- Sweetaleart 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Local js file -->
    <script src="./static/d/account/docs/scripts.js" type="text/javascript"></script>
</body>

</html>