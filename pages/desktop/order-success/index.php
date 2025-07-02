<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/order-success/docs/styles.css">
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
        <div class="deviceFrameLimitations wide">
            <div class="container">
                <div class="headingArea">
                    <div class="iconHolder">
                        <span class="material-symbols-outlined orderSuccessIcon">&#xe86c;</span>
                    </div>
                    <h1 class="pageHeading">Woohoo! Your order has been successfully placed! 🎉</h1>
                </div>
                <div class="extraInfos">
                    <p class="infoText">Thank you for trusting our services. We are now manually    verifying the report's reliability, and it will be ready in approximately 15   minutes.</p>
                    <br>
                    <p class="infoText">📩 Order Receipt Sent: We've emailed your receipt for order     tracking.</p>
                    <br>
                    <p class="infoText">📝 Track & Download: You can also view your orders in your  account and download the report from the My Orders page once it's released. The  report will also be sent over to the provided email address.</p>
                    <br>
                    <p class="infoText">We appreciate your trust and look forward to serving you! </p>
                </div>
                <a class="button" href="./my-orders">
                    <button class="btn">View my orders</button>
                </a>
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
    <!-- Local js file -->
    <script src="./static/d/order-success/docs/scripts.js" type="text/javascript"></script>
</body>

</html>