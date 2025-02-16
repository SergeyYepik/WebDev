<?php
    
    class DbMySql{
        private static mixed $_db = null;
        private static mixed $logger = null;
        
        public static function getInstance() : PDO{
            if (self::$_db == null) {
                include './autoload.php';
                self::$logger = new CommonLogError(new EchoLogError());
                                

                include './lib/scrts_lib.php';
                try{
                     self::$_db = new PDO("mysql:host=localhost;dbname=phplsns;port=3306", 'root', MYSQL_PWD);
                     self::$_db->exec("SET NAMES utf8");
                }
                catch (PDOException $e){
                    self::$logger->logError($e->getMessage());
                }
            }
            return self::$_db;
        }
        
        private function __construct() {}
        private function __clone() {}
        private function __wakeup() {}
    }

class DbMySqlForSaferCare{
    private static mixed $_db = null;
    private static mixed $logger = null;

    public static function getInstance() : PDO{
        if (self::$_db == null) {
            include './autoload.php';
            self::$logger = new CommonLogError(new EchoLogError());


            include './lib/scrts_lib.php';
            try{
                self::$_db = new PDO("mysql:host=localhost;dbname=safercare;port=3306", 'root', MYSQL_PWD);
                self::$_db->exec("SET NAMES utf8");
            }
            catch (PDOException $e){
                self::$logger->logError($e->getMessage());
            }
        }
        return self::$_db;
    }

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
}