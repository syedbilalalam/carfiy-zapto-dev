<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/about-us/docs/styles.css">
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
        <div class="deviceFrameLimitations wider">
            <div class="container">
                <div class="headingArea">
                    <h2 class="pageHeading">Let's see how we've organized this setup for you,</h2>
                    <h1 class="pageHeading">About us</h1>
                </div>
                <div class="aboutUsInfo">
                    <p class="infoText">At Carfiy, we are committed to providing reliable and transparent vehicle history reports. Whether you're buying a car, motorcycle, or any other vehicle, our service helps you uncover its past with accurate and up-to-date VIN data.</p>
                    <br>
                    <p class="infoText">We believe in trust, efficiency, and convenience. That's why we make it easy for you to track all your orders and download reports within 90 days. We encourage you to save these reports for future reference, ensuring you always have a record of your trusted transactions.</p>
                    <p class="infoText">Our goal is to empower buyers and sellers with the information they need to make confident decisions. With our dedicated support and seamless experience, you can rely on us to help you uncover the truth behind every vehicle.</p>
                </div>
                <img class="aboutusIMG" src="./static/d/about-us/media/vectors/about-us.svg" alt="Image broken">
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
    <script src="./static/d/about-us/docs/scripts.js" type="text/javascript"></script>
</body>

</html>