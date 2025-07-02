<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/terms-of-use/docs/styles.css">
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
                <div class="headingArea">
                    <h2 class="pageHeading">Lets understand how we work with our customers</h2>
                    <h1 class="pageHeading">Terms Of Use</h1>
                </div>
                <div class="termsAndConditions">
                    <p class="termsHead">1. Service Overview </p>
                    <p class="aboutTerms">Carfiy provides genuine car history reports based on the VIN (Vehicle Identification Number) submitted by users. Our service allows users to access detailed vehicle history information to make informed decisions before purchasing a car.</p>
                    <br>
                    <p class="termsHead">2. User Registration & Account</p>
                    <ul class="aboutTerms">
                        <li>To request a vehicle history report, users must create an account on our platform.</li>
                        <li>Users must provide accurate and up-to-date information during sign-up.</li>
                        <li>Users are responsible for maintaining the confidentiality of their login credentials.</li>
                    </ul>
                    <br>
                    <p class="termsHead">3. Requesting a Car History Report</p>
                    <ul class="aboutTerms">
                        <li>Users must enter a valid VIN number to request a report.</li>
                        <li>Reports are generated only after successful payment.</li>
                        <li>The information provided in the report is retrieved from trusted databases, but we do not guarantee completeness or absolute accuracy due to third-party data sources.</li>
                    </ul>
                    <br>
                    <p class="termsHead">4. Payments & Refund Policy</p>
                    <ul class="aboutTerms">
                        <li>All payments must be made in full before a report is generated.</li>
                        <li>Since the reports are digital and instantly delivered, all sales are final and non-refundable once the report is generated.</li>
                        <li>We are not responsible for incorrect reports caused by user input errors (e.g., entering the wrong VIN).</li>
                    </ul>
                    <br>
                    <p class="termsHead">5. Service Availability & Limitations</p>
                    <ul class="aboutTerms">
                        <li>We strive to provide accurate and up-to-date reports; however, we do not guarantee availability or completeness of historical data.</li>
                        <li>We may suspend or limit access to services for maintenance, security, or policy violations.</li>
                    </ul>
                    <br>
                    <p class="termsHead">6. User Responsibilities</p>
                    <ul class="aboutTerms">
                        <li>Users agree to use our services only for lawful purposes.</li>
                        <li>The reports are for personal use only and cannot be resold or redistributed.</li>
                        <li>Users must ensure that they have legal rights to request vehicle history reports for any VIN they enter.</li>
                    </ul>
                    <br>
                    <p class="termsHead">7. Liability & Disclaimer</p>
                    <ul class="aboutTerms">
                        <li>We are not liable for financial or legal decisions made based on our reports.</li>
                        <li>Vehicle history reports are sourced from third-party databases, and while we strive for accuracy, we do not guarantee that all data is up to date or error-free.</li>
                        <li>We do not own the data in the reports and are not responsible for missing or incorrect details.</li>
                    </ul>
                    <br>
                    <p class="termsHead">8. Cryptocurrency payments</p>
                    <p class="aboutTerms">In cases where a user makes a partial cryptocurrency payment, they can still complete the remaining amount in multiple transactions. However, due to system limitations, each additional payment must be at least $15. This requirement ensures that the transaction is processed successfully. To avoid complications, we recommend completing the full payment in as few transactions as possible. If a partial payment occurs by mistake, the user will need to make additional payments while adhering to the minimum transaction amount until the total is covered.</p>
                    <br>
                    <p class="termsHead">9. Changes to These Terms</p>
                    <ul class="aboutTerms">
                        <li>We reserve the right to modify these Terms and Conditions at any time.</li>
                        <li>Continued use of our service after changes means you accept the updated terms.</li>
                    </ul>
                    <br>
                    <p class="termsHead">9. Contact Information</p>
                    <p class="aboutTerms">For questions or support, please contact us at [Contact Email].</p>
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
    <script src="./static/d/terms-of-use/docs/scripts.js" type="text/javascript"></script>
</body>

</html>