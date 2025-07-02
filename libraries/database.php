<?php

// Main database
$database = mysqli_connect(getenv('DB_SERVER'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));

// Testing database
// $database = mysqli_connect('localhost', 'root', '', 'ms-client-carfiy');

if(!$database){
    die('Invalid request');
}