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

    // Fetching order payment information
    $orderId = intval($_GET['o_id']);
    $stmt=$database->prepare('SELECT `payment_id`, `purchase_id` FROM `orders` WHERE `order_id` = ?;');
    $stmt->bind_param('i', $orderId);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = null;
    if($result->num_rows)
        $record = $result->fetch_assoc();
    if(!$record || !$record['payment_id'])
        die('Invalid request');

    // Including now payment apis
    require_once MAIN_ROOT.'/libraries/nowpayment.php';
    
    $response = paymentInquery($record['payment_id']);
    if($response['payment_status'] != 'partially_paid')
        die('Invalid request');

    $amountRemaining = $response['price_amount']-$response['actually_paid'];

    // Identifying supported coins
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
<link rel="stylesheet" href="./static/d/crypto-payment/docs/styles.css">
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
            <form action="./release-crypto" method="POST" class="container itemsGap">
                <input type="hidden" name="o_id" value="<?php echo $_GET['o_id']; ?>">
                <input type="hidden" name="purchase_id" value="<?php echo $record['purchase_id']; ?>">
                <div class="headingArea">
                    <h2 class="pageHeading">Thank you for choosing this option and trusting our services.</h2>
                    <h1 class="pageHeading">Please select your preferred cryptocurrency with the correct network.</h1>
                </div>
                <div class="displayAmount paymentBorder">
                    <div class="amountContainer bigBubble contrast">
                        <span>Remaining Amount</span>
                    </div>
                    <div class="amountValue bigBubble">
                        <span>$<?php echo $amountRemaining; ?> USD</span>
                    </div>
                </div>
                <div class="paymentMethod paymentBorder cp">
                    <img src="static/global_files/media/crypto.png" alt="Broken image">
                    <select id="coinsSelector" required data-available-coins="<?php echo htmlspecialchars(json_encode($supportedCoins)); ?>">
                        <option value="">Select a coin</option>
                        <option value="eth">Ethereum</option>
                        <option value="usdt">USDT (USD Tether)</option>
                        <option value="usdc">USDC (USD Coin)</option>
                    </select>
                </div>
                <div class="paymentMethod paymentBorder cpn">
                    <img src="static/global_files/media/crypto-network.png" alt="Broken image">
                    <select required id="networkSelection" name="coin">
                        <option value="">Select network</option>
                        <option class="supportedNetwork" value="">Select a coin first</option>
                    </select>
                </div>
                <button class="btn" type="submit">I have entered correct Info, proceed</button>
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
    <script src="./static/d/crypto-payment/docs/scripts.js" type="text/javascript"></script>
</body>

</html>