<?php
// Main database
$pdo = new PDO("mysql:host=".getenv('DB_SERVER').";dbname=".getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));

// Testing database
// $pdo = new PDO("mysql:host=localhost;dbname=ms-client-carfiy", "root", "");
