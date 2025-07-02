<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/my-orders/docs/styles.css">
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
       <div class="deviceFrameLimitations wider">
            <div class="container">
                <div class="orders">
                    <div class="headingArea">
                        <h2 class="pageHeading">We hold your ordered car reports for 90 days,</h2>
                        <h1 class="pageHeading">Let see your orders</h1>
                    </div>
                    <div class="order">
                        <p class="infoText">Order id: <span class="orderId">12379345703587</span></p>
                        <hr>
                        <p class="infoText">Order time: <span class="orderTime">12-Jan-2025  23:44 UTC</span></p>
                        <hr>
                        <p class="infoText">Plan: <span class="orderPlan">Basic</span></p>
                        <hr>
                        <p class="infoText">Amount: <span class="orderAmount">$23 USD</span></p>
                        <hr>
                        <p class="infoText">Payment method: <span class="orderMethod">Card / Not paid</span></p>
                        <hr>
                        <p class="infoText clickable">Payment status: <button class="orderStatus btn">Pay Now</button></p>
                        <hr>
                        <p class="infoText">Status:  <span class="orderStatus">Pending / Delivered / Waiting for payment</span></p>
                        <hr>
                        <p class="infoText">Report:  <span class="orderReport">Pending (≈15mins) / Download / Waiting for payment</span></p>
                        
                    </div>
                    <div class="order">
                        <p class="infoText">Order id: <span class="orderId">12379345703587</span></p>
                        <hr>
                        <p class="infoText">Order time: <span class="orderTime">12-Jan-2025  23:44 UTC</span></p>
                        <hr>
                        <p class="infoText">Plan: <span class="orderPlan">Basic</span></p>
                        <hr>
                        <p class="infoText">Amount: <span class="orderAmount">$23 USD</span></p>
                        <hr>
                        <p class="infoText">Payment method: <span class="orderMethod">Card / Not paid</span></p>
                        <hr>
                        <p class="infoText clickable">Payment status: <button class="orderReport btn secondary">
                            <span>Paid</span>
                        </button></p>
                        <hr>
                        <p class="infoText">Status:  <span class="orderStatus">Delivered via (Email + Web download below)</span></p>
                        <hr>
                        <p class="infoText clickable">
                            <span>Report: </span>
                            <button class="orderReport btn">
                                <span>Download</span>
                                <span class="material-symbols-outlined">&#xf090;</span>
                            </button>
                        </p>
                        
                    </div>
                    <p class="generalInfo infoText">On this page, you can track all your orders and download your ordered reports. Please note that we only keep reports for 90 days, so be sure to save them to your device or cloud storage to keep a record with you. This way, you'll always have our piece of trust with you.</p>
                    <button class="btn">Goto my account</button>
                </div>
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
    <script src="./static/d/my-orders/docs/scripts.js" type="text/javascript"></script>
</body>

</html>