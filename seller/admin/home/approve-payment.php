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

// Connecting to the database parameters after successful upload
// Contacting database
require_once MAIN_ROOT.'/libraries/database.php';
$newDeliveryStatus = 3;
$stmt=$database->prepare('SELECT `payment_status` FROM `orders` WHERE `order_id` = ? AND (`payment_status` = 1 OR `payment_status` = 5);');
$stmt->bind_param('i',$_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
if(!$result->num_rows){
    http_response_code(400);
    die('Bad request, If this error continues to show contact developers');
}
$record = $result->fetch_assoc();
$stmt->close();
$database->close();
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
        button.cancel{
            background-color:rgb(187, 220, 255);
            color:rgb(0, 62, 129);
        }
        button.action{
            background-color:rgb(241, 125, 48);
        }
        button.action:hover{
            background-color:rgb(206, 82, 0);
        }
        button.cancel:hover{
            background-color:rgb(137, 194, 255);
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>At this admin can approve or disapprove the payment request!</h2>
        <a href="./get-proof-pay.php?o_id=<?php echo $_GET['id']; ?>" target="_blank">
            <button type="button" class="action">Download / View proof of payment </button>
        </a>
        <form action="./approveap.php" method="POST">
            <input type="hidden" name="o_id" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="action" value="<?php echo ($record['payment_status']==1)?'5':'1'; ?>">
            <br>
            <button type="submit"><?php echo ($record['payment_status']==1)?'Approve':'Disapprove'; ?> this payment</button>
            <button id="backHome" type="button" class="cancel">Back to seller dashboard</button>
        </form>
    </div>
    <script>
        document.getElementById('backHome').onclick = ()=>{
            window.location.replace('./');
        }
    </script>
</body>
</html>