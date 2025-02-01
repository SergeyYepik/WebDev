<?php

    require_once '../lib/global_lib.php';

    $username   =         trim(filter_var($_POST['username'],         FILTER_SANITIZE_SPECIAL_CHARS));
    $fulltext   =         trim(filter_var($_POST['fulltext'],         FILTER_SANITIZE_SPECIAL_CHARS));

    $error_msg = "";
    if (mb_strlen($username)                < 2 )    { $error_msg .= "Your name is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($fulltext)                < 1 )    { $error_msg .= "Comment is required.<br>"; echo $error_msg; exit(); }

    require '../data/mysql.php';

    $sql    = "INSERT INTO `chatmessages`(`username`, `fulltext`, `publishdate`) VALUES (?, ?, ?);";
    $query  = $pdo->prepare($sql);

    $publishdate = date('F j, Y \a\t g:i:sA', time());

    $query  -> execute([$username, $fulltext, time()]);

    echo    "Done";

