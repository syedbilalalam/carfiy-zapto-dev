<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
include_once MAIN_ROOT.'/libraries/cookie.php';
function remove_url_params(string $url): string {
    $parsed_url = parse_url($url);

    // Reconstruct the URL without the query parameters
    $clean_url = (isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '') .
                 (isset($parsed_url['host']) ? $parsed_url['host'] : '') .
                 (isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '') .
                 (isset($parsed_url['path']) ? $parsed_url['path'] : '') .
                 (isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '');

    return $clean_url;
}
// function extract_url_params(string $url): string {
//     $parsed_url = parse_url($url);

//     // Check if query parameters exist
//     if (!isset($parsed_url['query'])) {
//         return ''; // No query parameters, return an empty string
//     }

//     return '?' . $parsed_url['query']; // Return only the query string with '?'
// }
// Set the correct Content-Type
$mime_types = [
    "css" => "text/css",
    "js" => "application/javascript",
    "jpg" => "image/jpeg",
    "jpeg" => "image/jpeg",
    "png" => "image/png",
    "gif" => "image/gif",
    "svg" => "image/svg+xml",
    "webp" => "image/webp",
    "woff" => "font/woff",
    "woff2" => "font/woff2",
    "ttf" => "font/ttf",
    "eot" => "application/vnd.ms-fontobject",
    "otf" => "font/otf",
    "ico" => "image/x-icon",
    "json" => "application/json",
    "xml" => "application/xml",
    "pdf" => "application/pdf",
    "txt" => "text/plain",
    "html"=>"text/html",
    "php"=>"application/x-httpd-php"
];
$userAgents = [
    'd'=>'desktop',
    'm'=>'mobile'
];
$routes = [
    SUB_ROOT.'/home' => '/home/index.php',
    SUB_ROOT.'/about-us' => '/about-us/index.php',
    SUB_ROOT.'/account' => '/account/index.php',
    SUB_ROOT.'/edit-name' => '/edit-name/index.php',
    SUB_ROOT.'/edit-password' => '/edit-password/index.php',
    SUB_ROOT.'/faq' => '/faq/index.php',
    SUB_ROOT.'/forget-password' => '/forget-password/index.php',
    SUB_ROOT.'/get-report' => '/get-report/index.php',
    SUB_ROOT.'/login' => '/login/index.php',
    SUB_ROOT.'/my-orders' => '/my-orders/index.php',
    SUB_ROOT.'/order-failed' => '/order-failed/index.php',
    SUB_ROOT.'/order-pending' => '/order-pending/index.php',
    SUB_ROOT.'/order-success' => '/order-success/index.php',
    SUB_ROOT.'/pricing' => '/pricing/index.php',
    SUB_ROOT.'/privacy-policy' => '/privacy-policy/index.php',
    SUB_ROOT.'/sign-up' => '/sign-up/index.php',
    SUB_ROOT.'/terms-of-use' => '/terms-of-use/index.php',
    SUB_ROOT.'/why-to-choose-us' => '/why-to-choose-us/index.php',
    SUB_ROOT.'/' => '/home/index.php',
    SUB_ROOT.'/verification-pending' => '/verification-pending/index.php',
    SUB_ROOT.'/user-verified' => '/user-verified/index.php',
    SUB_ROOT.'/payment-method' => '/payment-method/index.php',
    SUB_ROOT.'/crypto-payment' => '/crypto-payment/index.php',
    SUB_ROOT.'/release-crypto' => '/release-crypto/index.php',
    SUB_ROOT.'/crypto-partial-payment' => '/crypto-partial-payment/index.php',
    SUB_ROOT.'/refund-policy' => '/refund-policy/index.php',
    SUB_ROOT.'/payoneer-pay' => '/payoneer-pay/index.php',
    SUB_ROOT.'/bank-pay' => '/bank-pay/index.php',
    SUB_ROOT.'/fiverr-link' => '/fiverr-link/index.php',
    
];

$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = (strlen($request_uri) >( strlen(SUB_ROOT)+1))?rtrim($request_uri, '/'):$request_uri;
$uri_id = remove_url_params($request_uri);
// $uri_params = extract_url_params($request_uri);

// Checking for static urls
if (str_starts_with($request_uri, SUB_ROOT."/static")){
    $file_path = MAIN_ROOT . $uri_id;
    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
    $content_type = $mime_types[$extension] ?? "application/octet-stream";
    // Setting content type
    header('Content-Type: '.$content_type);
    if(!file_exists($uri_id)){
        http_response_code(404);
        die();
    }
    include $uri_id;
}
else if (str_starts_with($request_uri, SUB_ROOT."/worker")){
    $file_path = MAIN_ROOT . $uri_id;
    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
    $content_type = $mime_types[$extension] ?? "application/octet-stream";
    // Setting content type
    header('Content-Type: '.$content_type);
    include $uri_id;
}
else if (str_starts_with($request_uri, SUB_ROOT."/seller")){
    $file_path = MAIN_ROOT . $uri_id;
    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
    $content_type = $mime_types[$extension] ?? "application/octet-stream";
    // Setting content type
    header('Content-Type: '.$content_type);
    include $uri_id;
}
else if($uri_id == '/robots.txt' || $uri_id=='/sitemap.xml'){
    $file_path = MAIN_ROOT . $uri_id;
    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
    $content_type = $mime_types[$extension] ?? "application/octet-stream";
    // Setting content type
    header('Content-Type: '.$content_type);
    include $uri_id;
}
else if (isset($routes[$uri_id])) {
    // Getting device information
    $deviceInformation;
    if(!empty($_GET['user-agent'])){
        $deviceInformation = $userAgents[$_GET['user-agent']];
        // Setting up for future
        setHeaderCookie('user-agent', $_GET['user-agent'], SUB_ROOT, false,false,false);
    }else if(!empty($_COOKIE['user-agent'])){
        $deviceInformation = $userAgents[$_COOKIE['user-agent']];
    }else{
        $deviceInformation = $userAgents['d'];
    }
    include MAIN_ROOT .'/pages/'.$deviceInformation.$routes[$uri_id];
    
} else {
    // $uriExtension = pathinfo($uri_id, PATHINFO_EXTENSION);
    // if(isset($mime_types[$uriExtension])){
    //     $content_type = $mime_types[$uriExtension];
    //     // Setting content type
    //     header('Content-Type: '.$content_type);
    //     include $uri_id;
    // }else{
        http_response_code(404);
        echo "Page not found!";
    // }
}