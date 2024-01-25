<?php
require_once("Model/user.php");
class Inicio_con
{
    private $model;
    public function Incio()
    {
        $this->model = new User();
        require_once("Views/v_inicio.php");
    }
}
