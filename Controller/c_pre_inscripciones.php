<?php
require_once("../Model/pre_inscripciones.php");
session_start();

$PreIn = new PreInscripcion();

// parametro que se recibe mediante la irl en la accion del form
$action = $_GET['action'];
$id_usr = $_GET['id'];
$fk_id_carrera;

if ($action == 'iTec') {
    $fk_id_carrera = $_GET['fk_id-tec'];
    if ($PreIn->tec_inscription($id_usr, $fk_id_carrera)) {

        header("location:../Views/v_oferta_educativa.php");
    }
};
if ($action == 'iPro') {
    $fk_id_carrera = $_GET['fk_id-pro'];


    if ($PreIn->pro_inscription($id_usr, $fk_id_carrera)) {
        echo "<script>alert('Preinscripcion realizada con exito!');</script>";
        header("location:../Views/v_oferta_educativa.php");
    };
};
