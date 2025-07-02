<?php
// Checking if admin is logged in or not
require $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

if(empty($_GET['o_id'])){
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
// Fetching the prooof file from the database
$targetDir = MAIN_ROOT.'/libraries/fs/proofs/p'.$_GET['o_id'].'/';
$filename_without_ext = "proof";

// Checking file availibiliy
if(!is_dir($targetDir)){
    http_response_code(500);
    die('Server error occured kindly contact developer to resolve this issue');
}

$files = scandir($targetDir);
foreach ($files as $file) {
    if (strpos($file, $filename_without_ext . '.') === 0) { 
        // Found the file that starts with "filename."
        $file_path = $targetDir . $file;
        $content = file_get_contents($file_path);
        break; // Exit loop after finding the file
    }
}
$filePath = $file_path;

// Set headers to force download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
header('Content-Length: ' . filesize($filePath));
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Read the file and output it
readfile($filePath);
exit;