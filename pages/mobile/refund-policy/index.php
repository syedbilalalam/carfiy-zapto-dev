<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/privacy-policy/docs/styles.css">
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
                    <?php if(CRYPTO_SUPPORT){  ?><p class="termsHead">Cryptocurrency payments</p>
                    <p class="aboutTerms">Cryptocurrency payments on our website are processed exclusively through NOWPayments and are not linked to our traditional payment gateway. Fiat transactions and crypto transactions are handled independently, and we do not convert or mix funds between these payment methods. If a user chooses to pay via cryptocurrency for an order, that order cannot later be paid using a fiat payment gateway. In such cases, the user must place a new order to pay via fiat.</p>
                    <br>
                    <p class="aboutTerms">In cases where a user makes a partial cryptocurrency payment, they can still complete the remaining amount in multiple transactions. However, due to system limitations, each additional payment must be at least $15. This requirement ensures that the transaction is processed successfully. To avoid complications, we recommend completing the full payment in as few transactions as possible. If a partial payment occurs by mistake, the user will need to make additional payments while adhering to the minimum transaction amount until the total is covered.</p><?php } ?>
                    <br>
                    <p class="termsHead">Need Help?</p>
                    <p class="aboutTerms">If you experience any issues with your order, please reach out to us at <a class="makeBold dark" href="mailto:<?php echo SERVICE_EMAIL; ?>"><?php echo SERVICE_EMAIL; ?></a>, and we will work to ensure you receive the service you paid for.</p>
                    <br>
                    
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
    <script src="./static/d/privacy-policy/docs/scripts.js" type="text/javascript"></script>
</body>

</html>