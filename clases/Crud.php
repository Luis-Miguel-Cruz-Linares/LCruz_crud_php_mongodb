<?php 


    class Crud extends Conexion {
        public function mostrarDatos() {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->personas;
                $datos = $coleccion->find();
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function obtenerDocumento($id) {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $datos = $coleccion->findOne(
                                        array(
                                            ['_id' => new MongoDB\BSON\ObjectId($id)]
                                        )
                                        );
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }

        }

        public function insertarDatos($datos) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->personas;
                $respuesta = $coleccion->insertOne($datos);
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        public function eliminar() {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->personas;
                $respuesta = $coleccion->deleteOne(
                                            array(
                                                ['_id' => new MongoDB\BSON\ObjectId($id)]
                                            )
                                        );
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function actualizar($id, $datos) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->personas;
                $respuesta = $coleccion->updateOne(
                                            ['_id' => new MongoDB\BSON\ObjectId($id)],
                                            [
                                                '$set'=>$datos 
                                            ]
                                        );
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }

        }

        public function mensajesCrud($mensaje) {
            $msg = '';

            if($mensaje = 'insert') {
                $msg = 'swal("Excelente!", "Agregado con éxito", "Success")';
            } else if ($mensaje = 'update') {
                $msg = 'swal("Excelente!", "Actualizado con éxito", "Info")';
            }  else if ($mensaje = 'delete') {
                $msg = 'swal("Excelente!", "Eliminado con éxito", "Warning")';
            }

            return $msg;
        }
    }

?>
