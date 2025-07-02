<?php
// Checking if admin is logged in or not
require $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

if(empty($_POST['o_id']) || empty($_POST['action']) || ($_POST['action'] != '1' && $_POST['action']!='5')){
    http_response_code(400);
    die('Bad request, If this error is persistant so contact developers!');
}

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

// Main process

// Updating the new action provided by the admin

// Connecting to the database parameters after successful upload
// Contacting database
require_once MAIN_ROOT.'/libraries/database.php';
$deliveryStatus = ($_POST['action']=='5')?2:1;
$stmt=$database->prepare('UPDATE `orders` SET `payment_status`=?,`delivery_status`=? WHERE `order_id` = ?;');
$stmt->bind_param('iii',$_POST['action'], $deliveryStatus, $_POST['o_id']);
$stmt->execute();
$stmt->close();
$database->close();
// Redirecting back to the home page
header('Location: '.SUB_ROOT.'/seller/admin/home/action-success.php');
?>
