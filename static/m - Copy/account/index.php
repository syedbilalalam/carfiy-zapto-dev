<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/account/docs/styles.css">
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
                    <h1 class="pageHeading">Hi Jhon,</h1>
                    <h2 class="pageHeading">How we can help you today</h2>
                    <p class="infoText">Here you have full control of your account and mange and edit your personal information even with logout controls.</p>
                </div>
                <div class="optionsContainer">
                    <button class="btn option">
                        <span>Edit Name</span>
                        <span class="material-symbols-outlined">&#xe3c9;</span>
                    </button>
                    <button class="btn option">
                        <span>Edit/Create Password</span>
                        <span class="material-symbols-outlined">&#xe3c9;</span>
                    </button>
                    <button class="btn option">
                        <span>I want to view my ordered reports</span>
                        <span class="material-symbols-outlined">&#xef6e;</span>
                    </button>
                    <button class="btn option">
                        <span>Log out from this device</span>
                        <span class="material-symbols-outlined">&#xe9ba;</span>
                    </button>
                    <button class="btn option">
                        <span>Log out from all devices</span>
                        <span class="material-symbols-outlined">&#xe9ba;</span>
                    </button>
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
    <script src="./static/m/account/docs/scripts.js" type="text/javascript"></script>
</body>

</html>