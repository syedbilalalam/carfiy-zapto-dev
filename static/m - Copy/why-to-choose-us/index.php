<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Global css file -->
    <link rel="stylesheet" href="./static/global_files/docs/global.css">
    <!-- Mobile navigation -->
    <link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
    <!-- Pricing css -->
    <link rel="stylesheet" href="./static/global_files/docs/pricing.css">
    <!-- Why to choose us -->
    <link rel="stylesheet" href="./static/global_files/docs/whyus.css">
    <!-- Page layout -->
    <link rel="stylesheet" href="./static/global_files/docs/layout.css">
    <!-- Local Css file -->
    <link rel="stylesheet" href="./static/m/why-to-choose-us/docs/styles.css">
    <!-- Google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Favicon -->
    <!-- Not present here -->

    <!-- Document title -->
    <title>Carfiy | Know your vehicle better</title>
</head>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/why-to-choose-us/docs/styles.css">
<!-- Pricing css -->
<link rel="stylesheet" href="./static/global_files/docs/pricing.css">
<!-- Why to choose us -->
<link rel="stylesheet" href="./static/global_files/docs/whyus.css">
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
                    <h2 class="pageHeading">What sets us apart and makes us the best choice for our customers?</h2>
                    <h1 class="pageHeading">Why choose us?</h1>
                </div>
                <section class="sectionH">
                    <p class="infoText">At Carfiy, we go beyond just providing vehicle history reports—we ensure accuracy, affordability, and trust. Here's what sets us apart:</p>
                    <p class="infoText">Direct Reports from Trusted Sources - We obtain vehicle history reports directly from our reliable partners, ensuring the information is authentic and up-to-date.</p>
                    <img src="./static/global_files/media/discounts-ai.png" alt="Broken image">
                    <p class="infoText">Lower Prices, Same Quality - Unlike others, we resell these reports at lower prices, giving you the best value without compromising on accuracy.</p>
                    <img src="./static/global_files/media/makesusbetter.png" alt="Broken image">
                    <p class="infoText">Manual Validity Checks - Every report undergoes a manual review by our team to verify its accuracy before it reaches you. This extra layer of validation ensures you get a report you can trust.</p>
                    <p class="infoText">With our commitment to reliability and affordability, we make it easier for you to make informed vehicle purchases with confidence. </p>
                </section>
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
    <script src="./static/m/why-to-choose-us/docs/scripts.js" type="text/javascript"></script>
</body>

</html>