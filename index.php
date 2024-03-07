<?php
/*
echo "bienvenidi";
//en el index generalmente es donde se manejan las rutas, pseudo front controller

var_dump($_GET);
//Con el get se toma la info de la url .../nameProject/?variable=valor
if (isset($_GET['controller'])) {
    echo "si existe";
} //si existe una variable llamada controller en $_GET
*/


require_once("Model/conectionDB.php"); //Si lo llamamos aca se puede usar en cualquier elemento que llamemos en este php

if (isset($_GET)) {
    require_once("Controller/c_inicio.php");
    $controller = new Inicio_con(); //con este patron de escritura hago todas las clases %%%%
    call_user_func(array($controller, "Incio")); // funcion que llama al metodo incio del objeto controller
}
