<?php
    require_once '../lib/global_lib.php';

    $id =         trim(filter_var($_POST['id'],         FILTER_SANITIZE_SPECIAL_CHARS));

    // if (mb_strlen($username)            < 2)    { $error_msg .= "User's name is required.<br>"; echo $error_msg; exit(); }
    // if (mb_strlen($password)            < 5)    { $error_msg .= "Password is required.<br>"; echo $error_msg; exit(); }

    include '../lib/scrts_lib.php';
    include '../data/mysql.php';

    $sql    = "DELETE FROM `users` WHERE `id` = ?;";
    $query  = $pdo->prepare($sql);
    $query  -> execute([$id]);
    
    echo    "Done";
    