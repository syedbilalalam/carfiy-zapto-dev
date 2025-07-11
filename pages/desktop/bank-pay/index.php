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

    // Identifying supported coins
    require_once MAIN_ROOT.'/libraries/nowpayment.php';
    $supportedCurrencies = getAvailableCurrencies()['currencies'];
    $supportedCoins = [];
    $requiredCoins = ['etharb', 'ethbase', 'usdtton', 'usdtmatic', 'usdtop', 'usdttrc20', 'usdtsol', 'usdtarb', 'usdcbase', 'usdcop', 'usdcmatic', 'usdcsol', 'usdcarb'];
    foreach ($supportedCurrencies as $coin) {
        # code...
        if(in_array($coin['currency'], $requiredCoins)){
            array_push($supportedCoins, $coin['currency']);
        }
    }

    // Allowing to accpet the crypto
    // session_start();
    $_SESSION['requestNewPayment'] = 'allowed';
?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/bank-pay/docs/styles.css">
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
            <form id="bankForm" class="container itemsGap">
                <input type="hidden" id="o_id" value="<?php echo $_GET['o_id']; ?>">
                <div class="headingArea">
                    <h1 class="pageHeading">Complete your purchase with bank transfer.</h1>
                    <br>
                    <p class="infoText makeBold">Send the mentioned amount to the mentioned bank account and upload the receipt or any proof of payment. e.g (emails receipt, account receipt, screen short of receipt)</p>
                    <br>
                    <p class="infoText">Don't worry about your payment we will verify your payment and delivery you report with manual checking's with in 15 minutes for more details checkout our <a href="./refund-policy" target="_blank" class="makeBold dark">refund policies</a>.</p>
                </div>
                <div class="displayAmount paymentBorder">
                    <div class="amountContainer bigBubble contrast">
                        <span>Amount</span>
                    </div>
                    <div class="amountValue bigBubble">
                        <span>$<?php echo $record['amount']; ?> USD</span>
                    </div>
                </div>
                <div class="paymentMethod paymentBorder payoneerBanner">
                    <div class="bankTitle">
                        <span class="material-symbols-outlined ico">&#xe84f;</span>
                        <span>Bank Transfer</span>
                    </div>
                    <div class="payoneerContent">
                        <div class="payoneerContent">
                            <p class="infoText">Receiving account (beneficiary account) :</p>
                            <pre id="accountDataContent" class="bankAccountDetails infoText">
Bank Name: Citibank
Transfer type: Local transfer
Bank address: 111 Wall Street New York, NY 10043 USA
Routing (ABA): 031100209
SWIFT code: CITIUS33
Account number: 70589370001680007
Account type: CHECKING
Beneficiary name: Abdul Basit</pre>
                        </div>
                        <button id="copyAccountDetails" type="button" class="btn" data-copy-item="ab2088567@gmail.com">
                            <span class="btnText">Copy Account Details</span>
                            <span class="material-symbols-outlined ico">&#xe14d;</span>
                        </button>
                        
                    </div>
                </div>
                <div id="uploadButton" class="paymentMethod paymentBorder payoneerBanner uploadSection notUploaded">
                    <input id="fileInput" type="file" style="display:none;" accept=".jpg,.png,.gif,.bmp,.jpeg,.pdf">
                    <span class="material-symbols-outlined uploadIcon">&#xf09b;</span>
                    <span class="material-symbols-outlined uploadIcon uploaded">&#xe873;</span>
                    <p id="fileName" class="font-small"></p>
                    <div class="payoneerContent">
                        <div class="payoneerAccountDetails">
                            <p class="font-normal">Upload the proof of payment</p>
                            <p class="font-small">Supported formats: pdf jpg png bmp (5MB Max)</p>
                        </div>
                    </div>
                </div>
                <button class="btn" type="submit">Proceed, I have paid</button>
            </form>
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
    <script src="./static/d/bank-pay/docs/scripts.js" type="text/javascript"></script>
</body>

</htmt>    