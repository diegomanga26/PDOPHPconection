<?php
    trait getInstance{
        static $getinstance;
        static function getInstance(){
            $arg = (array) func_get_args()[0];
            if (!self::$getinstance instanceof self){
                try {
                    self::$getinstance = new self(...$arg);
                    return self::$getinstance;
                } catch (\Throwable $e) {
                    return $e ->getMenssage();
                }

            }
            return self::$getinstance;
        }
    }
    function autoload(){
        $carpeta = (array) [
            dirname(__DIR__)."/scripts/clients",
            dirname(__DIR__)."/scripts/compra"
        ];

        foreach($carpeta as $ruta) {
            if ($handler = opendir($ruta)) {
                while ($file = readdir($handler)) {
                    if ($file!= "." & $file!="..") {
                        require_once $ruta."/".$file;
                    }
                }
            }
        }
    }
    spl_autoload_register('autoload');

    print_r(\app\details\detalle::getInstance([
        "nombre" => "Diego", 
        "edad" => 23
    ]));
?>