<?php
    class CommonLogError implements ILog{
        private $dependency;
        public function logError($msg){
            $this->dependency->logError($msg);
        }
        public function __construct(ILog $dependency)
        {
            $this->dependency = $dependency;
        }
    }