<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include_once MAIN_ROOT.'/libraries/pricing.php';
    include MAIN_ROOT.'/libraries/uhead.php';
    // Account page handling
    require MAIN_ROOT.'/libraries/isloggedin.php';

    $formAction = 'workers/finalizeorder.php';
    $vinNumber = '';
    $plan = '';
    $phone = '';
    // var_dump($GLOBALS['loggedIn']);
    // die();
    if(!$GLOBALS['loggedIn']){
        $formAction = 'workers/getreport.php';
    }
    // Starting session
    // session_start();
    // Checking for session data information
    if(isset($_SESSION['getOrder'])){
        $vinNumber = $_SESSION['getOrder']['vin'];
        $plan = $_SESSION['getOrder']['plan'];
        $phone = $_SESSION['getOrder']['phone'];
    }
    if(isset($_POST['requestVIN'])){
        $vinNumber = $_POST['requestVIN'];
    }
    if(isset($_POST['requestPlan'])){
        $plan = $_POST['requestPlan'];
    }
?>
<!-- Vin number tutorial -->
<link rel="stylesheet" href="./static/global_files/docs/vin-number.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Pricing css -->
<link rel="stylesheet" href="./static/global_files/docs/pricing.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/get-report/docs/styles.css">
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
        <div class="deviceFrameLimitations">
            <div class="container">
                <div class="headingArea">
                    <h2 class="pageHeading">We're glad you're here! We hope for the best and look forward to uncovering a vehicle's history together,</h2>
                    <h1 class="pageHeading">Lets order a report</h1>
                </div>
                <form class="mainForm" action="<?php echo ($formAction); ?>" method="POST">
                    <div class="inpHolder">
                        <div class="inputGroup">
                            <label for="vin" class="infoText withIcon">
                                <span>VIN number</span>
                                <span id="vinTutorialCaller" class="material-symbols-outlined ico">&#xe88e;</span>
                            </label>
                            <input required id="vin" name="vin" class="inp" type="text" value="<?php echo htmlspecialchars($vinNumber); ?>" placeholder="Enter your 17-digits vin number here..." maxlength="17">
                        </div>
                        <?php
                        if($GLOBALS['loggedIn']){
                        ?>
                        <div class="inputGroup">
                            <label for="email" class="infoText">Email</label>
                            <input required id="emailInp" name="email" class="inp" type="email"  value="<?php echo htmlspecialchars($clientAccountRecord['email']); ?>" placeholder="Enter your email here e.g jhon@example.com" readonly value="helloword">
                            <button id="editEmail" class="btn editEmail withIcon" type="button">
                                <span class="material-symbols-outlined ico">&#xe3c9;</span>
                                <span>Edit email</span>
                            </button>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="inputGroup">
                            <label for="vin" class="infoText withIcon">
                                <span>Your selected plan</span>
                                <span id="pricingTutorialCaller" class="material-symbols-outlined ico">&#xe88e;</span>
                            </label>
                            <select id="selectPlan" required class="inp" name="plan">
                                <option value="">Not selected yet !</option>
                                <option <?php echo ($plan=='basic'?'selected':''); ?> value="basic">Basic</option>
                                <option <?php echo ($plan=='silver'?'selected':''); ?> value="silver">Silver</option>
                                <option <?php echo ($plan=='gold'?'selected':''); ?> value="gold">Gold</option>
                            </select>
                        </div>
                        <div class="inputGroup">
                            <label for="phone" class="infoText">Phone No.</label>
                            <input required id="phone" name="phone" class="inp" type="number" max="999999999999999" value="<?php echo htmlspecialchars($phone); ?>" placeholder="Enter your phone number">
                        </div>
                        <div id="amountToBePaid" class="amountRequired neutral">
                            <p class="infoText">Amount to be paid: <span class="makeBold">$<span id="reportFinalUSDPrice">34</span> USD</span> ≈ <span id="reportFinalPKRPrice">~</span> PKR</p>
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
        include MAIN_ROOT.'/pages/desktop/commons/footer.php';
    ?>
    </footer>

    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Local js file -->
    <script src="./static/d/get-report/docs/scripts.js" type="text/javascript"></script>
</body>

</html>