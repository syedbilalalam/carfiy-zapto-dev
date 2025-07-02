<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include_once MAIN_ROOT.'/libraries/pricing.php';
    include MAIN_ROOT.'/libraries/uhead.php';
    // Account page handling
    require MAIN_ROOT.'/libraries/isloggedin.php';

    if(!$GLOBALS['loggedIn'] || empty($_POST['o_id']) || empty($_POST['coin'])){
        header('Location: '.SUB_ROOT.'/get-report');
        exit;
    }

    // Check are we allowed to accept the payment
    // session_start();
    if(empty($_SESSION['requestNewPayment']) || $_SESSION['requestNewPayment'] != 'allowed'){
        header('Location: '.SUB_ROOT.'/my-orders?warn-msg='.urlencode("Payment page can't be reloaded you need to start payment for your order here!"));
        exit();
    }else{
        unset($_SESSION['requestNewPayment']);
    }

    // Fetching order amount
    $orderId = intval($_POST['o_id']);
    $stmt=$database->prepare('SELECT `amount`, `paid`, `payment_id` FROM `orders` WHERE `order_id` = ?;');
    $stmt->bind_param('i', $orderId);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = null;
    if($result->num_rows)
        $record = $result->fetch_assoc();
    if(!$record)
        die('Invalid request');

    // Checking for previous payments
    require_once MAIN_ROOT.'/libraries/getpaymentstate.php';
    $paymentState = getPaymentState($database, $record);
    if($paymentState =='paid')
        die('Payment already completed!');
    // $requestANewPayment = false;
    // if($record['payment_id'] && $record['payment_exp_time'] && $record['payment_exp_time'] > time()){
    //     $response = paymentInquery($record['payment_id']);
    //     if(!$response)
    //         die('Server error occured!');
    //     $paymentState = 'unpaid';

    //     if($paymentState == 'unpaid')
    // }
    // Generating new payment request
    $response = null;
    if(empty($_POST['purchase_id']))
    $response = requestNewPayment($record['amount'], $_POST['coin'], $orderId);
    else
    $response = requestPartialPayment($_POST['coin'], $_POST['purchase_id']);
    // var_dump($response);
    // die();
    // Storing new params to the database
    $stmt=$database->prepare('UPDATE `orders` SET `payment_id`=?,`purchase_id`=? WHERE `order_id` = ?;');
    $stmt->bind_param('ssi', $response['payment_id'], $response['purchase_id'], $orderId);
    $stmt->execute();

    // Currency naming
    $currencyNaming = [
        'etharb'=> 'Eth',
        'ethbase'=> 'Eth',
        'usdtton'=> 'USDT',
        'usdtmatic'=> 'USDT',
        'usdtop'=> 'USDT',
        'usdttrc20'=> 'USDT',
        'usdtsol'=> 'USDT',
        'usdtarb'=> 'USDT',
        'usdcbase'=> 'USDC',
        'usdcop'=> 'USDC',
        'usdcmatic'=> 'USDC',
        'usdcsol'=> 'USDC',
        'usdcarb'=> 'USDC'
    ];
    // Coin naming
    $coinNaming = [
        'etharb'=> 'Ethereum',
        'ethbase'=> 'Ethereum',
        'usdtton'=> 'USDT (USD Tether)',
        'usdtmatic'=> 'USDT (USD Tether)',
        'usdtop'=> 'USDT (USD Tether)',
        'usdttrc20'=> 'USDT (USD Tether)',
        'usdtsol'=> 'USDT (USD Tether)',
        'usdtarb'=> 'USDT (USD Tether)',
        'usdcbase'=> 'USDC (USD Coin)',
        'usdcop'=> 'USDC (USD Coin)',
        'usdcmatic'=> 'USDC (USD Coin)',
        'usdcsol'=> 'USDC (USD Coin)',
        'usdcarb'=> 'USDC (USD Coin)'
    ];

    // Network naming
    $coinNetworking = [
        'etharb'=> 'Arbitrum One (ETH on Arbitrum)',
        'ethbase'=> 'Base Network (ETH on Base)',
        'usdtton'=> 'TON Blockchain (USDT on TON)',
        'usdtmatic'=> 'MATIC Polygon POS (USDT on Polygon)',
        'usdtop'=> 'Optimism (USDT on Optimism)',
        'usdttrc20'=> 'TRON Network (TRC-20) (USDT on TRON)',
        'usdtsol'=> 'Solana Blockchain (USDT on Solana)',
        'usdtarb'=> 'Arbitrum One (USDT on Arbitrum)',
        'usdcbase'=> 'Base Network (USDC on Base)',
        'usdcop'=> 'Optimism (USDC on Optimism)',
        'usdcmatic'=> 'MATIC Polygon PoS (USDC on Polygon)',
        'usdcsol'=> 'Solana Blockchain (USDC on Solana)',
        'usdcarb'=> 'Arbitrum One (USDC on Arbitrum)'
    ];

?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/release-crypto/docs/styles.css">
<title>Carfiy | Know your vehicle better</title>
<script src="static/global_files/docs/qrcode.min.js" type="text/javascript"></script>
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
            <form action="./my-orders" class="container itemsGap">
                <input type="hidden" name="info-msg" value="If you've initiated the payment from your wallet, the status will be shown as Processing. Once the payment is completed and marked as Paid, the report will be delivered within approximately 15 minutes.">
                <div class="headingArea">
                    <h2 class="pageHeading">Thank you for choosing this option and trusting our services.</h2>
                    <h1 class="pageHeading">We have set a deposit address for you.</h1>
                </div>
                <div class="displayAmount paymentBorder">
                    <div class="amountContainer bigBubble contrast">
                        <span>Amount</span>
                    </div>
                    <div class="amountValue bigBubble">
                        <span>$<?php echo $response['price_amount']; ?> USD</span>
                    </div>
                </div>
                <div class="displayAmount paymentBorder">
                    <div class="amountContainer bigBubble contrast">
                        <span>Cryptocurrency to pay</span>
                    </div>
                    <div class="amountValue bigBubble">
                        <span><?php echo $response['pay_amount'].' '.$currencyNaming[$response['pay_currency']]; ?></span>
                    </div>
                </div>
                <div class="paymentMethod paymentBorder cp">
                    <img src="static/global_files/media/crypto.png" alt="Broken image">
                    <p>Coin: <?php echo $coinNaming[$response['pay_currency']]; ?></p>
                </div>
                <div class="paymentMethod paymentBorder cpn">
                    <img src="static/global_files/media/crypto-network.png" alt="Broken image">
                    <p>Network: <?php echo $coinNetworking[$response['pay_currency']]; ?></p>
                </div>
                <div class="paymentMethod paymentBorder cpd">
                    <div class="firstLine">
                        <div class="heading">
                            <img src="static/global_files/media/deposit.png" alt="Broken image">
                            <p>Deposit Address</p>
                        </div>
                        <p class="expTime font-small">Expires in (<span id="countdown">18:00</span>)</p>
                    </div>
                    <div class="mainContent">
                        <!-- <img src="static/global_files/media/crypto_scan.svg" alt="Broken image"> -->
                        <div id="qrcode" style="width:162px; height:162px;">

                        </div>
                        <p id="dpa" class="depositAddress font-standard" data-dpqr="<?php echo $response['pay_address']; ?>"><?php echo $response['pay_address']; ?></p>
                    </div>
                    <button id="copyDeposit" type="button" class="btn">
                        <span>Copy Deposit Address</span>
                        <span class="material-symbols-outlined ico">&#xe14d;</span>
                    </button>
                </div>
                <p class="infoText">
                    <span><span class="makeBold">Warning: </span>This deposit address is only valid for 18 Minutes after that user must restart the order</span>
                    <br><br>
                    <span><span class="makeBold">Note: </span>Please enter an amount slightly higher than the mentioned value in your wallet to cover transaction fees and ensure a successful payment.</span>
                    <br><br>
                    <span><span class="makeBold">Note: (Optional) </span>Enter your VIN number and email in the additional notes section of your crypto wallet.</span>

                </p>
                <button class="btn" type="submit">I've sent the amount to the deposit address, proceed</button>
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
    <script src="./static/d/release-crypto/docs/scripts.js" type="text/javascript"></script>
</body>

</html>