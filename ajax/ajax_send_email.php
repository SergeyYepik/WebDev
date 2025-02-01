<?php
    require_once '../lib/global_lib.php';

    $username =         trim(filter_var($_POST['username'],         FILTER_SANITIZE_SPECIAL_CHARS));
    $email =            trim(filter_var($_POST['email'],            FILTER_SANITIZE_EMAIL));
    $fulltext =         trim(filter_var($_POST['fulltext'],         FILTER_SANITIZE_SPECIAL_CHARS));

    $error_msg = "";
    if (mb_strlen($username)            < 2)    { $error_msg .= "User's name is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($email)               < 5)    { $error_msg .= "Email is required.<br>"; echo $error_msg; exit(); }
    if (mb_strlen($fulltext)            < 5)    { $error_msg .= "Message is required.<br>"; echo $error_msg; exit(); }
 
    $to = 'safer.care.sup@gmail.com';
    $subject = '=?utf-8?B?'.base64_encode('New message from user '.$username).'?=';
    $headers =  'From: '.$email."\r\n".'Reply-to: '.$email."\r\n".'Content-type: text/html; charset=utf-8'."\r\n";

    mail($to, $subject, $fulltext, $headers);

    echo    "Done";

