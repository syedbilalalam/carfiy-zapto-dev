<?php
// Checking if admin is logged in or not
require $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Importing LDB
require_once MAIN_ROOT.'/libraries/ad-dsaltb.php';

session_start();
if(isset($_SESSION['adminEmail']) && isset($_SESSION['adminPassword'])){
    if(!isset(LDB[$_SESSION['adminEmail']]) || LDB[$_SESSION['adminEmail']] != $_SESSION['adminPassword']){
        header('Location: '.SUB_ROOT.'/seller/admin/home/login-admin.php');
        exit();
    }

}else{
    header('Location: '.SUB_ROOT.'/seller/admin/home/login-admin.php');
    exit();
}
if(!isset($_GET['id']))
    die('Invalid request');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        input[type="file"] {
            margin: 20px 0;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload a File</h2>
        <form action="./uploadap.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" required>
            <input type="hidden" name="oid" value="<?php echo $_GET['id']; ?>">
            <br>
            <button type="submit">Submit</button>
            <button id="backHome" type="button">Back to seller dashboard</button>
        </form>
    </div>
    <script>
        document.getElementById('backHome').onclick = ()=>{
            window.location.replace('./');
        }
    </script>
</body>
</html>