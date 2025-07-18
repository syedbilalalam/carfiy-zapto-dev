<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/home/docs/styles.css">
<!-- Pricing css -->
<link rel="stylesheet" href="./static/global_files/docs/pricing.css">
<!-- FAQs css -->
<link rel="stylesheet" href="./static/global_files/docs/faq.css">
<!-- Why to choose us -->
<link rel="stylesheet" href="./static/global_files/docs/whyus.css">
<!-- Vin number tutorial -->
<link rel="stylesheet" href="./static/global_files/docs/vin-number.css">
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

        <section class="sectionA">
            <img class="carImage" src="./static/m/home/media/asset1.png" alt="Thumbnail broken">
            <h2 class="heroLine">Instant Car History Check Secure Your Purchase Today</h2>
            <form class="form">
                <input class="inp" type="text" maxlength="17" placeholder="Enter your 17-digits vin number here...">
                <button class="btn" type="submit">Get Report</button>
            </form>
        </section>
        <div class="deviceFrameLimitations">
            <div class="container">
                <section class="sectionB sectionBlockSystem">
                    <div class="sectionHeading">
                        <h3>Always review a car's history before making a purchase</h3>
                        <p class="infoText">Check for any past accidents, repairs, or outstanding loans.</p>
                    </div>
                    <div id="carHistorySlider" class="carConditionCheck">
                        <img class="conditionA" src="./static/m/home/media/slideable1.png">
                        <div id="carHistoryClipper" class="conditionBCover">
                            <img class="conditionB" src="./static/m/home/media/slideable2.png">
                        </div>
                        <div id="carHistoryDivider" class="divider">
                            <div class="verticalLine"></div>
                            <div class="centeredCircle">
                                <span class="material-symbols-outlined">&#xe5de;</span>
                                <span class="material-symbols-outlined right">&#xe5df;</span>
                            </div>
                            <div class="verticalLine"></div>
                        </div>
                    </div>
                </section>

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
                        <p class="infoText">Every car and truck manufactured after 1980 comes with a unique Vehicle Identification Number (VIN) assigned by the manufacturer. Much like a fingerprint, this VIN is exclusive to each vehicle, allowing us to provide essential, vehicle-specific details in the Carfiy vehicle history report.</p>
                        <p class="infoText">Need to locate your VIN? You can find it in these places:</p>
                        <ul>
                            <li class="infoText">On the driver's side dashboard near the windshield</li>
                            <li class="infoText">Inside the driver's side door near the latch</li>
                            <li class="infoText">On the owner's insurance card</p>
                            </li>
                        </ul>
                    </div>
                    <div class="imgContainer">
                        <img class="tutorialA" src="./static/global_files/media/tutorial-a.png" alt="Broken image">
                        <img class="tutorialB" src="./static/global_files/media/tutorial-b.png" alt="Broken image">
                    </div>
                </section>

                <section class="sectionE sectionBlockSystem">
                    <div class="sectionHeading">
                        <h3>Dedicated customer support</h3>
                    </div>
                    <div class="features">
                        <div class="feature">
                            <img src="./static/global_files/media/vectors/customer-reviews.svg" alt="Broken image">
                            <p class="infoText">98% Satisfaction ratio.</p>
                        </div>
                        <div class="feature">
                            <img src="./static/global_files/media/vectors/twenty-for-seven.svg" alt="Broken image">
                            <p class="infoText">24/7 Customer support.</p>
                        </div>
                        <div class="feature">
                            <img src="./static/global_files/media/vectors/response-time.svg" alt="Broken image">
                            <p class="infoText">15min max response time.</p>
                        </div>
                    </div>
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

                <section class="sectionG sectionBlockSystem">
                    <div class="sectionHeading">
                        <h3>Explore our pricing options</h3>
                    </div>
                    <div class="offers">
                        <div class="plan">
                            <div class="planHead">
                                <p class="heading">Basic</p>
                                <p class="headingType">Standard report</p>
                            </div>
                            <div class="priceInformation">
                                <p class="standardCurrency">$34.99 USD</p>
                                <p class="nthReports">/ Report</p>
                                <div class="userlessInfo">
                                    <p>In our currency ≈ 10,000 PKR</p>
                                    <p>No hidden charges</p>
                                </div>
                            </div>
                            <div class="planFeatures">
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Vehicle Overview</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Vehicle Specifications</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Sales Listing</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Accident Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Active/Expire Warranty</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined notValid">&#xe5cd;</span>
                                    <p>HQ Car Image</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined notValid">&#xe5cd;</span>
                                    <p>Theft Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined notValid">&#xe5cd;</span>
                                    <p>Title Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined notValid">&#xe5cd;</span>
                                    <p>Impounds</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined notValid">&#xe5cd;</span>
                                    <p>Exports</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined notValid">&#xe5cd;</span>
                                    <p>Open Recalls</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined notValid">&#xe5cd;</span>
                                    <p>Installed Options and Packages</p>
                                </div>
                                <hr>

                            </div>
                            <div class="centeredBtn">
                                <button class="applyPlan btn">Get Report</button>
                            </div>
                        </div>
                        <div class="plan">
                            <div class="planHead silver">
                                <p class="heading">Silver</p>
                                <p class="headingType">Extended report</p>
                            </div>
                            <div class="priceInformation">
                                <p class="standardCurrency">$34.99 USD</p>
                                <p class="nthReports">/ Report</p>
                                <div class="userlessInfo">
                                    <p>In our currency ≈ 10,000 PKR</p>
                                    <p>No hidden charges</p>
                                </div>
                            </div>
                            <div class="planFeatures">
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Vehicle Overview</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Vehicle Specifications</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Sales Listing</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Accident Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Active/Expire Warranty</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>HQ Car Image</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Theft Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Title Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Impounds</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Exports</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Open Recalls</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Installed Options and Packages</p>
                                </div>
                                <hr>

                            </div>
                            <div class="centeredBtn">
                                <button class="applyPlan btn">Get Report</button>
                            </div>
                        </div>
                        <div class="plan">
                            <div class="planHead gold">
                                <p class="heading">Gold</p>
                                <p class="headingType">1 + 4 Reports any time with extra parameters of information.</p>
                            </div>
                            <div class="priceInformation">
                                <p class="standardCurrency">$34.99 USD</p>
                                <p class="nthReports">/ 5 Report</p>
                                <div class="userlessInfo">
                                    <p>In our currency ≈ 10,000 PKR</p>
                                    <p>No hidden charges</p>
                                </div>
                            </div>
                            <div class="planFeatures">
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>5 Vehicle Reports</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>DMV Title History</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Safety Recall History</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Online Listing History</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Junk & Salvage Information</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Vehicle Overview</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Vehicle Specifications</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Sales Listing</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Accident Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe86c;</span>
                                    <p>Active/Expire Warranty</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>HQ Car Image</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Theft Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Title Record</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Impounds</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Exports</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Open Recalls</p>
                                </div>
                                <hr>
                                <div class="planFeature">
                                    <span class="material-symbols-outlined">&#xe5ca;</span>
                                    <p>Installed Options and Packages</p>
                                </div>
                                <hr>

                            </div>
                            <div class="centeredBtn">
                                <button class="applyPlan btn">Get Report</button>
                            </div>
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
    <script src="./static/m/home/docs/scripts.js" type="text/javascript"></script>
</body>

</html>