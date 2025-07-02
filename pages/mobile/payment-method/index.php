<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include_once MAIN_ROOT.'/libraries/pricing.php';
    include MAIN_ROOT.'/libraries/uhead.php';
    // Account page handling
    require MAIN_ROOT.'/libraries/isloggedin.php';

    if(!$GLOBALS['loggedIn'] || empty($_GET['o_id'])){
        header('Location: '.SUB_ROOT.'/get-report');
        exit;
    }

    // Fetching order amount
    $orderId = intval($_GET['o_id']);
    $stmt=$database->prepare('SELECT `amount` FROM `orders` WHERE `order_id` = ? AND `payment_status` = 0 ;');
    $stmt->bind_param('i', $orderId);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = null;
    if($result->num_rows)
        $record = $result->fetch_assoc();
    if(!$record)
        die('Invalid request');
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Refund css layout -->
<link rel="stylesheet" href="./static/d/privacy-policy/docs/styles.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/payment-method/docs/styles.css">
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
        <section class="popUpBox" data-name="refund-info">
            <div class="cardHolder">
                <span class="material-symbols-outlined closeIco closePopUp">&#xe5cd;</span>
                <div class="mainCard">
                        <div class="container" style="padding:10px !important;">
                            <div class="headingArea">
                                <h2 class="pageHeading">Let's Understand How We Handle Refunds - Transparency for Our Customers! </h2>
                                <h1 class="pageHeading">Refund Policy</h1>
                            </div>
                            <div class="termsAndConditions">
                                <p class="termsHead">Refund Policy</p>
                                <p class="aboutTerms">Carfiy offers a reliable, software-based service that provides genuine car history reports based on the VIN (Vehicle Identification Number) submitted by users. Our platform enables customers to access detailed vehicle history information, helping them make informed decisions before purchasing a car. In exchange for a secure payment, we deliver comprehensive vehicle history reports in PDF format, ensuring transparency and confidence in every transaction.</p>
                                <br>
                                <p class="termsHead">No Refund Policy</p>
                                <p class="aboutTerms">Due to the digital nature of our service, all sales are final, and we do not offer refunds once a report has been generated and delivered.</p>
                                <br>
                                <p class="termsHead">Service Ensurance</p>
                                <p class="aboutTerms">We strive for seamless and timely delivery of reports. However, in rare cases where we fail to deliver your requested report, you can contact us via the email provided in the footer of our website. We guarantee a response within 15 minutes to resolve your issue.</p>
                                <br>
                                <p class="termsHead">Cryptocurrency payments</p>
                                <p class="aboutTerms">Cryptocurrency payments on our website are processed exclusively through NOWPayments and are not linked to our traditional payment gateway. Fiat transactions and crypto transactions are handled independently, and we do not convert or mix funds between these payment methods. If a user chooses to pay via cryptocurrency for an order, that order cannot later be paid using a fiat payment gateway. In such cases, the user must place a new order to pay via fiat.</p>
                                <br>
                                <p class="aboutTerms">In cases where a user makes a partial cryptocurrency payment, they can still complete the remaining amount in multiple transactions. However, due to system limitations, each additional payment must be at least $15. This requirement ensures that the transaction is processed successfully. To avoid complications, we recommend completing the full payment in as few transactions as possible. If a partial payment occurs by mistake, the user will need to make additional payments while adhering to the minimum transaction amount until the total is covered.</p>
                                <br>
                                <p class="termsHead">Need Help?</p>
                                <p class="aboutTerms">If you experience any issues with your order, please reach out to us at <a class="makeBold dark" href="mailto:<?php echo SERVICE_EMAIL; ?>"><?php echo SERVICE_EMAIL; ?></a>, and we will work to ensure you receive the service you paid for.</p>
                                <br>
                                
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <div class="deviceFrameLimitations">
            <div class="container itemsGap">
                <div class="headingArea">
                    <h2 class="pageHeading">All payments are securely processed through our advanced systems.</h2>
                    <h1 class="pageHeading">Choose your preferred payment method with confidence and ease.</h1>
                </div>
                <div class="displayAmount paymentBorder">
                    <div class="amountContainer bigBubble contrast">
                        <span>Amount</span>
                    </div>
                    <div class="amountValue bigBubble">
                        <span>$<?php echo $record['amount']; ?> USD</span>
                    </div>
                </div>
                <!--<div id="payWithFiverr" class="paymentMethod paymentBorder fr"  data-oid="<?php echo $_GET['o_id']; ?>">
                    <img src="static/global_files/media/vectors/fiverr.svg" alt="Broken image">
                    <p>Continue with Fiverr</p>
                </div>-->
                <div class="paymentMethod paymentBorder mc cardPayment">
                    <img src="static/global_files/media/vectors/mc-logo.svg" alt="Broken image">
                    <p>Continue with Mastercard</p>
                </div>
                <div class="paymentMethod paymentBorder vs cardPayment">
                    <img src="static/global_files/media/visa-logo.png" alt="Broken image">
                    <p>Continue with Visa Card</p>
                </div>
                <div id="cpContinue" class="paymentMethod paymentBorder cp" data-oid="<?php echo $_GET['o_id']; ?>">
                    <img src="static/global_files/media/crypto.png" alt="Broken image">
                    <p>Continue with Cryptocurrency</p>
                </div>
                <div id="payWithPayoneer" class="paymentMethod paymentBorder po"  data-oid="<?php echo $_GET['o_id']; ?>">
                    <img src="static/global_files/media/vectors/payoneer-croped.svg" alt="Broken image">
                    <p>Continue with Payoneer</p>
                </div>
                
                <div id="payWithBank" class="paymentMethod paymentBorder bk"  data-oid="<?php echo $_GET['o_id']; ?>">
                    <span class="material-symbols-outlined ico">&#xe84f;</span>
                    <!-- <img src="static/global_files/media/vectors/bank-transfer.svg" alt="Broken image"> -->
                    <p>Continue with Bank transfer</p>
                </div>
                
                <p class="infoText">Please read our <a class="makeBold makePointer" id="refundInfo">Refund policy</a> before making your payment we will ensure your order wills safely reach to you and by any how we failed to delivery you the reports contact us via chat.</p>
                <!-- <button class="btn">&lt; Back | Edit My Order Information</button> -->
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
    <script src="./static/d/payment-method/docs/scripts.js" type="text/javascript"></script>
</body>

</html>