<?php
    
    class Vocabular{
        private $_db = null;

        public function __construct()
        {
            include './data/db.php';
            $this->_db = DbMySqlForSaferCare::getInstance();
        }

        public function getAllDescription(){
            $result = $this->_db->query('SELECT `ServiceDescription` FROM `todoservices`;');
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }