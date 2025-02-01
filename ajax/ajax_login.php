<?php
    require_once '../lib/global_lib.php';

    $username =         trim(filter_var($_POST['username'],         FILTER_SANITIZE_SPECIAL_CHARS));
    $password =         trim(filter_var($_POST['password'],         FILTER_SANITIZE_SPECIAL_CHARS));

    $error_msg = "";
    if (mb_strlen($username)            < 2)    { $error_msg .= "User's name is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($password)            < 5)    { $error_msg .= "Password is required.<br>"; echo $error_msg; exit(); }

    require '../data/mysql.php';

    $sql    = "SELECT `id` FROM `users` WHERE BINARY `username` = ? AND BINARY `password` = ?;";
    $query  = $pdo->prepare($sql);
    
    $salt   = "@#$)({}()&*^";

    $query  -> execute([$username, md5($salt.$password)]);

    if ($query -> rowCount() == 0){   
        echo   "Invalid login atttempt.";
    }
    else{
        $user = $query->fetch(PDO::FETCH_OBJ);

        setcookie('isSignedIn',     true,       time() + 3600 * 24, '/');
        setcookie('signedUserName', $username,  time() + 3600 * 24, '/');
        setcookie('signedUserId', $user -> id,  time() + 3600 * 24, '/');
        echo    "Done";
    }
