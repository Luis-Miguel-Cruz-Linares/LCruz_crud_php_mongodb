<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/crud_mongo/vendor/autoload.php";
    class Conexion {
        public function conectar() {
            try {
                $servidor = "127.0.0.1";  // IP default
                $usuario = "mongoadmin";
                $password = "123456";
                $baseDatos = "crud";
                $puerto = "27017";  // es el puerto que mongo toma por defecto

                $cadenaConexion = "mongodb://" . 
                                    $usuario . ":" .
                                    $password . "@" . 
                                    $servidor . ":" . 
                                    $puerto . "/" . 
                                    $baseDatos;
                $cliente = new MongoDB\Client($cadenaConexion);
                return $cliente -> selectDatabase($baseDatos);
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
            
        }
    }

    $objeto = new Conexion();
    var_dump($objeto->conectar());
?>