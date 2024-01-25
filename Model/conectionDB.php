<?php
class ConectionDB
{
    public static function connect()
    {
        try {
            $conection = mysqli_connect("localhost", "root", "", "bd_practicaprof");
            return $conection;
        } catch (Exception $e) {
            return "falló la conexion" . $e->getMessage();
        }
    }
}
