<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/order-pending/docs/styles.css">
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
                    <h1 class="pageHeading">Your order has been placed! But payment is still in processing!</h1>
                </div>
                <div class="extraInfos">
                    <p class="infoText">Once we receive your payment, the status will update to <span class="makeBold">"Paid"</span> on the <span class=makeBold">My Orders</span> page. If you encounter any issues, feel free to contact our customer support at the bottom right of your screen. As soon as the bank processes the transaction, we will send you the report.</p>
                    <br>
                    <p class="infoText">Thank you for trusting our services. We are now manually verifying the report's reliability, and it will be ready in approximately 15 minutes.</p>
                    <p class="infoText">📩 Order Receipt Sent: We've emailed your receipt for order     tracking.</p>
                    <br>
                    <p class="infoText">📝 Track & Download: You can also view your orders in your  account and download the report from the My Orders page once it's released. The  report will also be sent over to the provided email address.</p>
                    <br>
                    <p class="infoText">We appreciate your trust and look forward to serving you! </p>
                </div>
                <button class="btn">View my orders</button>
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
    <script src="./static/m/order-pending/docs/scripts.js" type="text/javascript"></script>
</body>

</html>