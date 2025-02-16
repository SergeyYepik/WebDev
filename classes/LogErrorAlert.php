<?php
    class LogErrorAlert implements IlogAlert{
        public function logAlert($msg){
            echo '<script>alert("'.$msg.'");</script>';
        }
    }
