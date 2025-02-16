<?php
    class ConsoleLogError implements ILog{
        public function logError($msg){
            echo '<script>console.log("'.$msg.'");</script>';
        }
    }