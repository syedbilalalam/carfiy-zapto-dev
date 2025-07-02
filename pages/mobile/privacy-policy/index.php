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
                    <h2 class="pageHeading">Lets understand how we collect data, Cause we respect our customer's privacy and they should know everything! </h2>
                    <h1 class="pageHeading">Privacy Policy</h1>
                </div>
                <div class="termsAndConditions">
                    <p class="termsHead">1. Data We Collect</p>
                    <p class="aboutTerms">When you create an account with us, we collect and store your account name and email address in our database. Additionally, any passwords and sensitive information are encrypted in our servers to ensure security.</p>
                    <br>
                    <p class="termsHead">2. How We Protect Your Data</p>
                    <p class="aboutTerms">We do not share your personal information with anyone, in accordance with this privacy policy. We take strict security measures to protect our database, including regular updates and security enhancements to safeguard your data.</p>
                    <br>
                    <p class="termsHead">3. Payment Information & Financial Data</p>
                    <!-- <p class="aboutTerms">We do not collect or store card details or banking information directly. All financial transactions are securely processed by our trusted payment partner, PayFast (accessible at GoPayFast.com). You can review PayFast’s privacy policy to understand how they handle your financial data here:</p> -->
                    <p class="aboutTerms">We do not collect or store card details or banking information directly. All financial transactions are securely processed by our trusted payment partner.</p>
                    <!-- <p class="aboutTerms">🔗 PayFast Privacy Policy https://gopayfast.com/security/</p> -->
                    <br>
                    <p class="termsHead">4. Data Collection & Usage</p>
                    <p class="aboutTerms">When you create an account with us, we collect and store your account name and email address in our database. Additionally, any passwords and sensitive information are encrypted in our servers to ensure security.</p>
                    <br>
                    <p class="termsHead">5. Cookies Policy</p>
                    <p class="aboutTerms">We use cookies to enhance your browsing experience. Specifically, we store a cookie that keeps you logged in on your device for seamless access. This cookie is essential for maintaining your session and improving convenience. You can manage or disable cookies through your browser settings, but doing so may affect certain functionalities.</p>
                    <br>
                    <p class="termsHead">6. Data Retention</p>
                    <p class="aboutTerms">We retain your order reports for 90 days, after which they are automatically removed from our database. We recommend saving reports to your device or cloud storage for future reference.</p>
                    <br>
                    <p class="termsHead">7. Your Rights & Contact</p>
                    <p class="aboutTerms">You have the right to access, modify, or request the deletion of your personal data. If you have any privacy-related concerns, feel free to reach out to our support team.</p>
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