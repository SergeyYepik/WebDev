<?php
    
    class DbMySql{
        private static $_db = null;
        private static $logger = null;
        
        public static function getInstance(){
            if (self::$_db == null) {
                include './autoload.php';
                self::$logger = new CommonLogError(new EchoLogError());
                //self::$logger = new LogErrorAlert();
                

                include './lib/scrts_lib.php';
                try{
                     self::$_db = new PDO("mysql:host=localhost;dbname=phplsns;port=3306", 'root', MYSQL_PWD);
                }
                catch (PDOException $e){
                    self::$logger->logError($e->getMessage());
                    //self::$logger->logAlert($e->getMessage());
                }
            }
            return self::$_db;
        }
        
        private function __construct() {}
        private function __clone() {}
        private function __wakeup() {}
    }