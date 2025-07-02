<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include_once MAIN_ROOT.'/libraries/pricing.php';
    include MAIN_ROOT.'/libraries/uhead.php';
    // Account page handling
    require MAIN_ROOT.'/libraries/isloggedin.php';
    // var_dump($GLOBALS['loggedIn']);
    // die();
    if(!$GLOBALS['loggedIn']){
        // session_start();
        $_SESSION['loginRedirect'] = '/my-orders';
        header('Location: '.SUB_ROOT.'/login');
        exit();
    }
    // // Closing database
    // $database->close();

    // Fetching records form database
    $myOrders = [];
    $planText = ['basic'=>'Basic', 'silver' => 'Silver', 'gold' =>'Gold'];
    $stmt = $database->prepare('SELECT * FROM `orders` WHERE `uid` = ? ORDER BY `time` DESC;');
    $stmt->bind_param('i', $clientAccountRecord['uid']);
    $stmt->execute();
    $result = $stmt->get_result();
    while($record = $result->fetch_assoc())
        array_push($myOrders, $record);
    $stmt->close();
    // print_r($myOrders);
    // die();
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/my-orders/docs/styles.css">
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
       <div class="deviceFrameLimitations wider">
            <div class="container">
                <div class="orders">
                    <div class="headingArea">
                        <h2 class="pageHeading">We hold your ordered car reports for 90 days,</h2>
                        <h1 class="pageHeading">Let see your orders</h1>
                    </div>
                    <?php
                    require_once MAIN_ROOT.'/libraries/nowpayment.php';
                    foreach($myOrders as $order){
                        $paymentState = 'unpaid'; // Possible states is (unpaid, processing, partial, paid)
                        $orderStatus = 'Pending'; // Possible states is (Pending, Pending ≈ (15 mins to delivery), Delivered)
                        require_once MAIN_ROOT.'/libraries/getpaymentstate.php';
                        $paymentState= getPaymentState($database, $order);

                        switch($order['delivery_status']){
                            case 1:
                                $orderStatus = ($paymentState=='pending' || $paymentState=='unpaid')?'Payment Required':'Payment processing...';
                                break;
                            case 2:
                                $orderStatus = 'Pending ≈ (15 mins to delivery)';
                                break;
                            case 3:
                                $orderStatus = 'Delivered';
                                break;
                        }
                    ?>
                    <div class="order">
                        <p class="infoText"><span class="makeBold">Order id:</span> <span class="orderId makeWordCrash makeWordSelect"><?php echo hash('md5', $order['order_id']); ?></span></p>
                        <p class="infoText"><span class="makeBold">Order VIN:</span> <span class="orderId makeWordCrash makeWordSelect"><?php echo $order['vin']; ?></span></p>
                        <hr>
                        <p class="infoText"><span class="makeBold">Order time:</span> <span class="orderTime printTime" data-time="<?php echo $order['time']; ?>">~</span></p>
                        <hr>
                        <p class="infoText"><span class="makeBold">Plan:</span> <span class="orderPlan"><?php echo $planText[$order['plan']]; ?></span></p>
                        <hr>
                        <p class="infoText"><span class="makeBold">Amount:</span> <span class="orderAmount">$<?php echo PRICING[$order['plan']]; ?> USD</span></p>
                        <hr>
                        <p class="infoText"><span class="makeBold">Payment method:</span> <span class="orderMethod"><?php echo htmlspecialchars($order['payment_method']); ?></span></p>
                        <hr>
                        <?php
                        if($paymentState == 'paid'){
                        ?>
                        <p class="infoText clickable"><span class="makeBold">Payment status:</span> <button id="payStatusButton" class="orderReport btn secondary">Paid</button></p>
                        <?php
                        }
                        else if($paymentState == 'processing'){
                        ?>
                        <p class="infoText clickable"><span class="makeBold">Payment status:</span> <button id="payStatusButton" class="orderReport btn secondary">Processing</button></p>
                        <?php
                        }
                        else if($paymentState == 'partial'){
                            // Allowing to accpet the crypto
                            // session_start();
                            $_SESSION['requestPartialPayment'] = 'allowed';
                        ?>
                        <p class="infoText clickable"><span class="makeBold">Payment status:</span> <a href="./crypto-partial-payment?o_id=<?php echo $order['order_id']; ?>"> <button id="payStatusButton" class="orderReport btn secondary" >Partially Paid ⚠ | Pay Now</button></a></p>
                        <?php
                        }
                        else{
                        ?>
                        <p class="infoText clickable"><span class="makeBold">Payment status:</span> <a href="./payment-method?o_id=<?php echo $order['order_id']; ?>">  <button id="payStatusButton" class="orderReport btn secondary">Not Paid | Pay Now</button></a></p>
                        <?php
                        }
                        ?>
                        <!-- <hr> -->
                        <!-- <p class="infoText"><span class="makeBold">Status:</span> <span class="orderStatus"><?php echo $orderStatus; ?> </span></p> -->
                        <hr>
                        <div class="infoText clickable">
                            <span class="makeBold">Report: </span>
                            <?php
                            if($orderStatus == 'Delivered'){
                            ?>
                            <form action="./workers/purchased-report.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $order['order_id']; ?>">
                                <button type="submit" class="orderReport btn">
                                    <span>Download</span>
                                    <span class="material-symbols-outlined">&#xf090;</span>
                                </button>
                            </form>
                            <?php
                            }else{
                                echo $orderStatus;
                            }
                            ?>
                        </div>
                        
                    </div>
                    
                    <?php 
                    }
                    ?>
                    <!-- <div class="order">
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
                        
                    </div> -->
                    <p class="generalInfo infoText">On this page, you can track all your orders and download your ordered reports. Please note that we only keep reports for 90 days, so be sure to save them to your device or cloud storage to keep a record with you. This way, you'll always have our piece of trust with you.</p>
                    <a class="button" href="./account">
                        <button class="btn">Goto my account</button>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <footer>
    <?php
        include MAIN_ROOT.'/pages/mobile/commons/footer.php';
        $database->close();
    ?>
    </footer>


    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Local js file -->
    <script src="./static/d/my-orders/docs/scripts.js" type="text/javascript"></script>
</body>

</html>