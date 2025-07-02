<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Account page handling
require MAIN_ROOT.'/libraries/isloggedin.php';

if(!$GLOBALS['loggedIn'] || empty($_POST['o_id'])){
    http_response_code(400);
    die('bad_request');
}

// Fetching order amount
$orderId = intval($_POST['o_id']);
$stmt=$database->prepare('SELECT `amount` FROM `orders` WHERE `order_id` = ? AND `payment_status` = 0;');
$stmt->bind_param('i', $orderId);
$stmt->execute();
$result = $stmt->get_result();
$record = null;
if($result->num_rows)
    $record = $result->fetch_assoc();
if(!$record)
    die('Invalid request');

// Uplaoding the user proof to the server
$targetDir = MAIN_ROOT.'/libraries/fs/proofs/p'.$orderId.'/';

if(!is_dir($targetDir))
    mkdir($targetDir, 0777, true);

// $targetFile = $targetDir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetDir.basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
$targetFile = $targetDir . 'proof.'.$fileType;
$fileSize = $_FILES["file"]["size"];


// Allowed file types
$allowedTypes = ["jpg", "png", "gif", "pdf", "bmp"];
if (!in_array($fileType, $allowedTypes)) {
    echo "Invalid file type.";
    exit;
}

// Limit file size to 5MB
if ($fileSize > 5 * 1024 * 1024) { // 5MB in bytes
    echo "File size exceeds 5MB limit.";
    exit;
}

// Upload file if all conditions are met
if (!move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    http_response_code(500);
    echo "Error uploading file.";
}

// Updating database
$paymentMethod = 'Bank Transfer';
$stmt=$database->prepare('UPDATE `orders` SET `payment_status`= 1, `payment_method` = ? WHERE `order_id` = ?;');
$stmt->bind_param('si', $paymentMethod , $orderId);
$stmt->execute();
$stmt->close();
$database->close();

// Sending success response
echo 'success';