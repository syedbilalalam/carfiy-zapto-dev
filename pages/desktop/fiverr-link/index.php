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
    $stmt=$database->prepare('SELECT `amount` FROM `orders` WHERE `order_id` = ? AND `payment_status` = 0;');
    $stmt->bind_param('i', $orderId);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = null;
    if($result->num_rows)
        $record = $result->fetch_assoc();
    if(!$record)
        die('Invalid request');

    // // Identifying supported coins
    // require_once MAIN_ROOT.'/libraries/nowpayment.php';
    // $supportedCurrencies = getAvailableCurrencies()['currencies'];
    // $supportedCoins = [];
    // $requiredCoins = ['etharb', 'ethbase', 'usdtton', 'usdtmatic', 'usdtop', 'usdttrc20', 'usdtsol', 'usdtarb', 'usdcbase', 'usdcop', 'usdcmatic', 'usdcsol', 'usdcarb'];
    // foreach ($supportedCurrencies as $coin) {
    //     # code...
    //     if(in_array($coin['currency'], $requiredCoins)){
    //         array_push($supportedCoins, $coin['currency']);
    //     }
    // }

    // Allowing to accpet the crypto
    // session_start();
    $_SESSION['requestNewPayment'] = 'allowed';
?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/fiverr-link/docs/styles.css">
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
                    <h1 class="pageHeading">Complete your purchase with Fiverr a way that is more trusted by many of our customers.</h1>
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
                    <img src="static/global_files/media/vectors/fiverr.svg" alt="Broken image">
                    <div class="payoneerContent">
                        <div class="payoneerAccountDetails">
                            <p class="infoText">Users need to place an order on Fiverr. Once they are satisfied and complete their order on Fiverr, they can return to this page via <a class="makeBold dark" href="./my-orders" target="_blank">My Orders</a> or by ordering the same plan again. Here, they can enter the Fiverr order ID to link their purchase with this site. While linking is optional, it provides extra benefits, such as the ability to download their purchased report directly from this site.</p>
                        </div>
                        <div class="userFiverrInformations">
                            <input id="fiverrOrderId" class="inp" type="text" placeHolder="Order id provided by fiverr.com" titile="Enter your order id here provided by fiverr.com">
                            <input id="fiverrOrderEmail" class="inp" type="email" placeHolder="Order email provided  to fiverr.com" title="Enter your order email which is provided  to fiverr.com">
                            <a href="https://www.fiverr.com/s/dDBwNz3" target="_blank">
                                <button type="button" class="btn secondary">
                                    <span class="btnText">Didn't ordered yet, Place order at fiverr</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="uploadButton" class="paymentMethod paymentBorder payoneerBanner uploadSection notUploaded">
                    <input id="fileInput" type="file" style="display:none;" accept=".jpg,.png,.gif,.bmp,.jpeg,.pdf">
                    <span class="material-symbols-outlined uploadIcon">&#xf09b;</span>
                    <span class="material-symbols-outlined uploadIcon uploaded">&#xe873;</span>
                    <p id="fileName" class="font-small"></p>
                    <div class="payoneerContent">
                        <div class="payoneerAccountDetails">
                            <p class="font-normal">Upload the proof of order</p>
                            <p class="font-small">Screen Short (Receipt Fiver Provided)</p>
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
    <script src="./static/d/fiverr-link/docs/scripts.js" type="text/javascript"></script>
</body>

</htmt>    