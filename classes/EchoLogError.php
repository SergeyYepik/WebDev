<?php
    class EchoLogError implements ILog{
        public function logError($msg){
            echo "<p style='color:var(--bg-face-error);'>".$msg."</p><br>";
        }
    }
