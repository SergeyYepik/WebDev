<?php
    $host = 'localhost';
    $port = '3306';

    $dbname = 'phplsns';

    $user = 'root';
    $pass = MYSQLPWD; // указать нужное

    $dsn = "mysql:host=$host;dbname=$dbname;port=$port";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->exec("SET NAMES utf8");        
