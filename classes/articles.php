<?php
    
    class Articles{
        private $_db = null;

        public function __construct()
        {
            include './data/db.php';
            $this->_db = DbMySql::getInstance();
        }

        public function getAll(){
            $result = $this->_db->query('SELECT * FROM `chatmessages`;');
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }