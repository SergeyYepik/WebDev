<?php
    include '../lib/global_lib.php';

    $username =         trim(filter_var($_POST['username'],         FILTER_SANITIZE_SPECIAL_CHARS));
    $password =         trim(filter_var($_POST['password'],         FILTER_SANITIZE_SPECIAL_CHARS));

    $error_msg = "";
    if (mb_strlen($username)            < 2)    { $error_msg .= "User's name is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($password)            < 5)    { $error_msg .= "Password is required.<br>"; echo $error_msg; exit(); }

    include '../lib/scrts_lib.php';
    include '../data/mysql.php';

    //$sql    = "SELECT `id` FROM `users` WHERE BINARY `username` = ? AND BINARY `password` = ?;";
    $sql    = "SELECT `id`, `password` FROM `users` WHERE BINARY `username` = ?;";
    $query  = $pdo->prepare($sql);
    
    //$salt   = "@#$)({}()&*^";

    //$query  -> execute([$username, md5($salt.$password)]);
    $query  -> execute([$username]);

    if ($query -> rowCount() == 0){
        echo   "Invalid login attempt.";
    } else {
        $user = $query->fetch(PDO::FETCH_OBJ);

        if (password_verify($password, $user->password)) {
            setcookie('isSignedIn', true, time() + 3600 * 24, '/');
            setcookie('signedUserName', $username, time() + 3600 * 24, '/');
            setcookie('signedUserId', $user->id, time() + 3600 * 24, '/');
            echo "Done";
        } else {
            echo   "Invalid login attempt.";
        }
    }
