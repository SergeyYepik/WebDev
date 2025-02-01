<?php
    require_once '../lib/global_lib.php';

    setcookie('isSignedIn',     '',     time() - 3600 * 24, '/');
    setcookie('signedUserName', '',     time() - 3600 * 24, '/');
    setcookie('signedUserId',   '',     time() - 3600 * 24, '/');
    
    unset($_COOKIE['isSignedIn']);
    unset($_COOKIE['signedUserName']);
    unset($_COOKIE['signedUserId']);
