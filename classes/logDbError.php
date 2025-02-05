<?php
    interface ILog{
        public function logError($msg); 
    }
    
    class EchoLogError implements ILog{
        public function logError($msg){
            echo "<p style='color:var(--bg-face-error);'>".$msg."</p><br>";
        }
    }

    class ConsoleLogError implements ILog{
        public function logError($msg){
            echo '<script>console.log("'.$msg.'");</script>';
        }
    }

    class CommonLogError implements ILog{
        private $dependency;
        public function logError($msg){
            $this->dependency->logError($msg);
            //echo '<script>console.log("'.$msg.'");</script>';
        }
        public function __construct(ILog $dependency)
        {
            $this->dependency = $dependency;
        }
    }


    class EchoLogErrorAndAlert extends EchoLogError implements Ilog{
        public function logError($msg){
            echo '<script>alert("'.$msg.'");</script>';
            parent::logError($msg);
        }
    }

    interface ILogAlert{
        public function logAlert($msg); 
    }

    class LogErrorAlert implements IlogAlert{
        public function logAlert($msg){
            echo '<script>alert("'.$msg.'");</script>';
        }
    }
