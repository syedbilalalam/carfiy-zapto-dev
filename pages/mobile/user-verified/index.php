<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="static/d/user-verified/docs/styles.css">
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
                    <div class="iconHolder">
                        <span class="material-symbols-outlined orderSuccessIcon">&#xe86c;</span>
                    </div>
                    <h1 class="pageHeading">Account successfully verified now you can login to your account !</h1>
                </div>
                <a href="workers/isverified.php">
                    <button class="btn">Log in </button>
                </a>
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
    <script src="./static/d/order-success/docs/scripts.js" type="text/javascript"></script>
</body>

</html>