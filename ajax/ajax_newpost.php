<?php
    require_once '../lib/global_lib.php';
    
    $title =            trim(filter_var($_POST['title'],        FILTER_SANITIZE_SPECIAL_CHARS));
    $subtitle =         trim(filter_var($_POST['subtitle'],     FILTER_SANITIZE_SPECIAL_CHARS));
    $fulltext =         trim(filter_var($_POST['fulltext'],     FILTER_SANITIZE_SPECIAL_CHARS));

    $error_msg = "";
    if (mb_strlen($title)                   < 5 )    { $error_msg .= "Title is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($subtitle)                < 10)    { $error_msg .= "Subtitle is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($fulltext)                < 10)    { $error_msg .= "Post is required.<br>"; echo $error_msg; exit(); }

    require '../data/mysql.php';

    $sql    = "INSERT INTO `posts`(`title`, `subtitle`, `fulltext`, `username`, `publishdate`) VALUES (?, ?, ?, ?, ?);";
    $query  = $pdo->prepare($sql);

    $query  -> execute([$title, $subtitle, $fulltext, $_COOKIE['signedUserName'], time()]);

    echo    "Done";

