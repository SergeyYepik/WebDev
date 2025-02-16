<?php
    class EchoLogErrorAndAlert extends EchoLogError implements Ilog{
        public function logError($msg){
            echo '<script>alert("'.$msg.'");</script>';
            parent::logError($msg);
        }
    }

