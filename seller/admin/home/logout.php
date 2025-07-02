<?php
session_start();
session_destroy();

require $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
header('Location: '.SUB_ROOT.'/seller/admin/home/login-admin.php');
