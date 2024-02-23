<?php
class ConectionDB
{
    public static function connect()
    {
        try {
            $conection = mysqli_connect("localhost", "root", "", "bd_practicaprof");
            //sql105.infinityfree.com   if0_35860685  Zxyo4kbmZ1 if0_35860685_bd_practicaprof
            return $conection;
        } catch (Exception $e) {
            return "falló la conexion" . $e->getMessage();
        }
    }
}
//Electromecanica3.