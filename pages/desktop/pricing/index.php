<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Pricing css -->
<link rel="stylesheet" href="./static/global_files/docs/pricing.css">
    <!-- Why to choose us -->
    <link rel="stylesheet" href="./static/global_files/docs/whyus.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/pricing/docs/styles.css">
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
        <div class="deviceFrameLimitations widerxd">
            <div class="container">
                <div class="headingArea">
                    <h2 class="pageHeading">We guarantee the best prices on reliable vehicle history reports,</h2>
                    <h1 class="pageHeading">Explore our pricing options</h1>
                </div>
                <section class="sectionG sectionBlockSystem">
                    <!-- <div class="sectionHeading">
                        <h3>Explore our pricing options</h3>
                    </div> -->
                    <?php
                        require MAIN_ROOT.'/pages/desktop/commons/offers.php';
                    ?>
                </section>
                <section class="sectionH deviceFrameLimitations wider">
                    <div class="sectionHeading">
                        <h3>What sets us apart and makes us the best choice for our customers?</h3>
                        <h3>Why choose us?</h3>
                    </div>
                    <div class="alignRow">
                        <div class="para">
                            <p class="infoText">At Carfiy, we go beyond just providing vehicle history reports—we ensure accuracy,  affordability, and trust. Here's what sets us apart:</p>
                            <br>
                            <p class="infoText">Direct Reports from Trusted Sources - We obtain vehicle history reports directly from our   reliable partners, ensuring the information is authentic and up-to-date.</p>
                            <br>
                            <p class="infoText">Lower Prices, Same Quality - Unlike others, we resell these reports at lower prices, giving you the best value without compromising on accuracy.</p>
                            <br>
                            <p class="infoText">Manual Validity Checks - Every report undergoes a manual review by our team to verify its   accuracy before it reaches you. This extra layer of validation ensures you get a report you can trust.</p>
                            <br>
                            <p class="infoText">With our commitment to reliability and affordability, we make it easier for you to make     informed vehicle purchases with confidence. </p>
                        </div>
                        <div class="imgRefrence">
                            <img src="./static/global_files/media/discounts-ai.png" alt="Broken image">
                            <img src="./static/global_files/media/makesusbetter.png" alt="Broken image">
                        </div>
                    </div>
                </section>
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
    <script src="./static/d/pricing/docs/scripts.js" type="text/javascript"></script>
</body>

</html>