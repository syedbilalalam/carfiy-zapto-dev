<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/m/get-report/docs/styles.css">
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
        <section id="vinTutorial" class="popUpBox" data-name="vin-tutorial">
            <div class="cardHolder">
                <span class="material-symbols-outlined closeIco closePopUp">&#xe5cd;</span>
                <div class="mainCard">
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
                </div>
            </div>
        </section>
        <div class="deviceFrameLimitations">
            <div class="container">
                <div class="headingArea">
                    <h2 class="pageHeading">We're glad you're here! We hope for the best and look forward to uncovering a vehicle's history together,</h2>
                    <h1 class="pageHeading">Lets order a report</h1>
                </div>
                <form class="mainForm">
                    <div class="inpHolder">
                        <div class="inputGroup">
                            <label for="vin" class="infoText withIcon">
                                <span>VIN number</span>
                                <span id="vinTutorialCaller" class="material-symbols-outlined ico">&#xe88e;</span>
                            </label>
                            <input required id="vin" class="inp" type="text" placeholder="Enter your 17-digits vin number here..." maxlength="17">
                        </div>
                        <div class="inputGroup">
                            <label for="email" class="infoText">Email</label>
                            <input required id="email" class="inp" type="email" placeholder="Enter your email here e.g jhon@example.com" readonly value="helloword">
                            <button class="btn editEmail withIcon" type="button">
                                <span class="material-symbols-outlined ico">&#xe3c9;</span>
                                <span>Edit email</span>
                            </button>
                        </div>
                        <div class="inputGroup">
                            <label for="selectionOfPlan" class="infoText">Your selected plan</label>
                            <select required class="inp">
                                <option value="">Not selected yet !</option>
                                <option value="Basic">Basic</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                            </select>
                        </div>
                        <div class="inputGroup">
                            <label for="phone" class="infoText">Phone No.</label>
                            <input required id="phone" class="inp" type="number" placeholder="Enter your phone number">
                        </div>
                        <div class="amountRequired">
                            <p class="infoText">Amount to be paid: <span class="makeBold">$34 USD</span> ≈ 10,000PKR</p>
                        </div>
                    </div>

                    <div class="buttonGroup">
                        <div class="buttonRow">
                            <button class="btn takeWidth" type="submit">Get Report</button>
                        </div>
                    </div>
                </form>
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
    <script src="./static/m/get-report/docs/scripts.js" type="text/javascript"></script>
</body>

</html>