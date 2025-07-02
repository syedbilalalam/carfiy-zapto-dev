<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/order-failed/docs/styles.css">
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
                    <div class="iconHolder">
                        <span class="material-symbols-outlined orderSuccessIcon">&#xe5cd;</span>
                    </div>
                    <h1 class="pageHeading">Payment failed to complete! Please try again.</h1>
                </div>
                
                <div class="buttonHolder">
                    <button class="btn">View my orders</button>
                    <button class="btn">Goto home</button>
                </div>
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
    <script src="./static/d/order-failed/docs/scripts.js" type="text/javascript"></script>
</body>

</html>