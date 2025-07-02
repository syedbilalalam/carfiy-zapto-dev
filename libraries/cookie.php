<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
function setHeaderCookie($name, $value, $path=SUB_ROOT, $maxAge= false, $secure=true, $httpOnly=true, $sameSite='Strict'){
    // Checking path validity
    if(empty($path))
        $path = '/';
    // header("Set-Cookie: user=JohnDoe; Path=/; Secure; HttpOnly; SameSite=Lax");
    header('Set-Cookie: '.$name.'='.$value.'; Path='.$path.';'.(($maxAge!==false)?' Max-Age='.$maxAge.';':'').($secure?' Secure;':'').($httpOnly?' HttpOnly;':'').' SameSite='.$sameSite.';', false);
}