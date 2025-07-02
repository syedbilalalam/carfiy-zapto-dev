<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/faq/docs/styles.css">
<!-- Pricing css -->
<link rel="stylesheet" href="./static/global_files/docs/pricing.css">
<!-- FAQs css -->
<link rel="stylesheet" href="./static/global_files/docs/faq.css">
<!-- Vin number tutorial -->
<link rel="stylesheet" href="./static/global_files/docs/vin-number.css">
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
                <section class="sectionC">
                    <div class="sectionHeading">
                        <h3>What you can do after purchasing a car's history report ?</h3>
                        <div class="sbsInfo">
                            <p class="infoText">You can verify a vehicle's condition, check for red flags, and make an
                                informed buying decision.</p>
                            <img src="./static/global_files/media/car-inspect.png" alt="Broken image">
                        </div>
                    </div>
                </section>

                <section class="sectionD sectionBlockSystem">
                    <div class="sectionHeading">
                        <h3>Where I will find the VIN number of my car ?</h3>
                        <p class="infoText">Every car and truck manufactured after 1980 comes with a unique Vehicle
                            Identification Number (VIN) assigned by the manufacturer. Much like a fingerprint, this VIN is
                            exclusive to each vehicle, allowing us to provide essential, vehicle-specific details in the
                            Carfiy vehicle history report.</p>
                        <p class="infoText">Need to locate your VIN? You can find it in these places:</p>
                        <ul>
                            <li class="infoText">On the driver's side dashboard near the windshield</li>
                            <li class="infoText">Inside the driver's side door near the latch</li>
                            <li class="infoText">On the owner's insurance card</p>
                            </li>
                        </ul>
                    </div>
                    <img class="tutorialA" src="./static/global_files/media/tutorial-a.png" alt="Broken image">
                    <img class="tutorialB" src="./static/global_files/media/tutorial-b.png" alt="Broken image">
                </section>
                <section class="sectionF sectionBlockSystem">
                    <div class="sectionHeading">
                        <h3>What will I get after making payment ?</h3>
                        <div class="replyPara">
                            <p class="infoText">After making the payment, your order will be placed, and you will instantly
                                receive an email confirming that your report is being processed. On the website, your order
                                status will appear as "Pending." We will then verify all details to ensure accuracy, and
                                within a maximum of 15 minutes, your report will be delivered to your provided email. Once
                                the report is sent, the status on the website will update to "Delivered."</p>
                            <div class="sbsInfo">
                                <div class="leftSideInfo">
                                    <p class="infoText">Additionally, you will be able to download your report from the
                                        website for up to 90 days after purchase.</p>
                                </div>
                                <img src="./static/global_files/media/tutorial-c.png" alt="Broken image">
                            </div>
                            <p class="infoText">If you encounter any issues during this process, simply tap the chat button
                                at the bottom right to contact us. We'll respond within 15 minutes.</p>
                        </div>
                    </div>
                </section>
                <section class="sectionH">
                    <div class="sectionHeading">
                        <h3>What sets us apart and makes us the best choice for our customers?</h3>
                        <h3>Why choose us?</h3>
                    </div>
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
    <script src="./static/m/faq/docs/scripts.js" type="text/javascript"></script>
</body>

</html>