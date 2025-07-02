<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
require_once MAIN_ROOT.'/libraries/cookie.php';

setHeaderCookie('sid', '', SUB_ROOT, 0);
setHeaderCookie('marketing_id', '', SUB_ROOT, 0);
header('Location: '.SUB_ROOT.'/');
