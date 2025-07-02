<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Page layout -->
<link rel="stylesheet" href="static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="static/d/verification-pending/docs/styles.css">
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
                    <div class="iconHolder">
                        <span class="material-symbols-outlined orderSuccessIcon">&#xe163;</span>
                    </div>
                    <h1 class="pageHeading">We have sent an email click the link on the email to verify its you!</h1>
                </div>
                <a href="workers/isverified.php">
                    <button class="btn">I verified my email now take me to the account</button>
                </a>
            </div>
        </div>
    </main>
    <footer>
    <?php
        include MAIN_ROOT.'/pages/desktop/commons/footer.php';
    ?>
    </footer>

    <!-- Sweetaleart 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Layout js file -->
    <script src="./static/global_files/docs/layout.js" type="text/javascript"></script>
    <!-- Local js file -->
    <script src="./static/d/order-success/docs/scripts.js" type="text/javascript"></script>
</body>

</html>