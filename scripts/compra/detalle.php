<?php
    namespace app\details;
    class detalle {
        static $getinstance;
        function __construct(public $nombre, public $edad, public $validacion){
        }
        static function getInstance(){

            $arg = (array) func_get_args()[0];
            if (!self::$getinstance instanceof self){
                self::$getinstance = new self(...$arg);
                return self::$getinstance;
            }
            return self::$getinstance;
        }
    }

    
?>