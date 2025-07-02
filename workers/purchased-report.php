<?php
// Including sub roots
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Checking weather logged in or not
require MAIN_ROOT.'/libraries/isloggedin.php';

if(!$GLOBALS['loggedIn'] || empty($_POST['id'])){
    http_response_code(404);
    die('Error: File not found.');
}

// Path to the PDF file
$filePath = MAIN_ROOT.'/libraries/fs/client/reports/o'.$_POST['id'].'/report.pdf'; // Change this to the correct file path

// Check if file exists
if (!file_exists($filePath)) {
    http_response_code(404);
    die('Error: File not found.');
}

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
?>
