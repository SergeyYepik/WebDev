<?php
    require_once '../lib/global_lib.php';

    $username =         trim(filter_var($_POST['username'],         FILTER_SANITIZE_SPECIAL_CHARS));
    $email =            trim(filter_var($_POST['email'],            FILTER_SANITIZE_EMAIL));
    $password =         trim(filter_var($_POST['password'],         FILTER_SANITIZE_SPECIAL_CHARS));
    $confirm_password = trim(filter_var($_POST['confirm_password'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error_msg = "";
    if (mb_strlen($username)            < 2)    { $error_msg .= "User's name is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($email)               < 5)    { $error_msg .= "Email is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($password)            < 5)    { $error_msg .= "Password is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($confirm_password)    < 5)    { $error_msg .= "Password confirmation is required.<br>"; echo $error_msg; exit(); }
    if ($password !== $confirm_password)        { $error_msg .= "Passwords don't match.<br>"; echo $error_msg; exit(); }

    include '../lib/scrts_lib.php';
    include '../data/mysql.php';

    $sql    = "INSERT INTO `users`(`username`, `login`, `email`, `password`) VALUES (?, ?, ?, ?);";
    $query  = $pdo->prepare($sql);
    
    $salt   = "@#$)({}()&*^";

    $query  -> execute([$username, $username, $email, md5($salt.$password)]);

    echo    "Done";

