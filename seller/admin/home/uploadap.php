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

// Main process
// Define the upload directory
$uploadDir = MAIN_ROOT.'/libraries/fs/client/reports/';

// Ensure the directory exists
if (!is_dir($uploadDir)) {
    die('Invalid request');
    mkdir($uploadDir, 0777, true);
}
$uploadDir.='o'.$_POST['oid'].'/';

// Ensure the directory exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
// Check if a file is uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $fileName = basename($_FILES["file"]["name"]); 
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $fileName = 'report.'.$fileType; 
    $targetFilePath = $uploadDir . $fileName; 

    // Allowed file types
    // $allowedTypes = ["jpg", "png", "gif", "pdf", "docx", "txt"];
    $allowedTypes = ["pdf"];

    // Check file type
    if (in_array($fileType, $allowedTypes)) {
        // Move uploaded file to target location
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // echo "File uploaded successfully: " . htmlspecialchars($fileName);

            // Updating database parameters after successful upload
            // Contacting database
            require_once MAIN_ROOT.'/libraries/database.php';
            $newDeliveryStatus = 3;
            $stmt=$database->prepare('UPDATE `orders` SET `delivery_status`=? WHERE `order_id` = ?;');
            $stmt->bind_param('ii',$newDeliveryStatus , $_POST['oid']);
            $stmt->execute();

            $database->close();

            // Redirecting back to the home page
            header('Location: '.SUB_ROOT.'/seller/admin/home/upload-success.php');
            exit();
            
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Allowed types: " . implode(", ", $allowedTypes);
    }
} else {
    echo "No file uploaded.";
}
?>
