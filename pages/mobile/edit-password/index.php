<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
    include MAIN_ROOT.'/libraries/uhead.php';
?>
<!-- Mobile navigation -->
<link rel="stylesheet" href="./static/global_files/docs/mobile-navigation.css">
<!-- Page layout -->
<link rel="stylesheet" href="./static/global_files/docs/layout.css">
<!-- Local Css file -->
<link rel="stylesheet" href="./static/d/edit-password/docs/styles.css">
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
        <?php
            require MAIN_ROOT.'/pages/mobile/commons/mobilenav.php';
        ?>
        
        <div class="deviceFrameLimitations">
            <div class="container">
                <div class="headingArea">
                    <h2 class="pageHeading">Want some changes in your account password lets do it,</h2>
                    <h1 class="pageHeading">Create / Edit password</h1>
                </div>
                <form class="loginForm" action="workers/editpassword.php" method="POST">
                    <div class="inpHolder">
                        <div class="inputGroup">
                            <label for="password" class="infoText">Password</label>
                            <div class="showPassword">
                                <input required id="password" minlength="6" name="password" class="inp showPasswordInp" type="password" placeholder="Enter your password">
                                <span class="showPasswordTarget" data-status="password">SHOW</span>
                            </div>
                        </div>
                        <div class="inputGroup">
                            <label for="cpassword" class="infoText">Re-Enter Password</label>
                            <div class="showPassword">
                                <input required id="cpassword" minlength="6" name="cpassword" class="inp showPasswordInp" type="password" placeholder="Re-Enter your password">
                                <span class="showPasswordTarget" data-status="password">SHOW</span>
                            </div>
                        </div>
                    </div>

                    <div class="buttonGroup">
                        <div class="buttonRow">
                            <button class="btn takeWidth" type="submit">Update</button>
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
    <script src="./static/d/edit-password/docs/scripts.js" type="text/javascript"></script>
</body>

</html>