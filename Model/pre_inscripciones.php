<?php

require_once("conectionDB.php");
session_start();
class preInscripcion
{

    private $pri_connect;
    private $id;
    private $date;
    private $us_id;
    private $fk_id_pro;
    private $fk_id_tec;

    public function __construct()
    {
        $this->pri_connect = ConectionDB::connect();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getUserId()
    {
        return $this->us_id;
    }

    public function getProfesoradoId()
    {
        return $this->fk_id_pro;
    }

    public function getTecnicaturaId()
    {
        return $this->fk_id_tec;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setUserId($us_id)
    {
        $this->us_id = $us_id;
    }

    public function setProfesoradoId($fk_id_pro)
    {
        $this->fk_id_pro = $fk_id_pro;
    }

    public function setTecnicaturaId($fk_id_tec)
    {
        $this->fk_id_tec = $fk_id_tec;
    }

    public function list_pre_ins()
    {

        $queryPre_ins = "select pr.fecha ,(SELECT
      CASE
        WHEN fk_id_tecnicatura IS NOT NULL THEN (select t.tec_nombre from tecnicatura t inner join pre_inscripcion pr on t.tec_id = pr.fk_id_tecnicatura ) 
        WHEN fk_id_profesorado IS NOT NULL THEN (select p.pro_nombre from profesorado p   inner join pre_inscripcion pr on p.pro_id = pr.fk_id_profesorado)
      END AS tipo
    FROM pre_inscripcion) as carrera, u.us_nombre as nombre, u.us_email as correo from pre_inscripcion pr inner join usuario u on u.us_id = pr.fk_id_usuario;";

        $dbPre_ins = mysqli_query($this->pri_connect, $queryPre_ins);


        return $dbPre_ins;
    }

    //realiza preincripcion de un usuario en una tecnicatura
    public function tec_inscription(int $us_id, int  $fk_id_tec)
    {

        echo "Estas en insert pre inscrip";

        try {
            $insertPre_ins = "INSERT INTO pre_inscripcion (fk_id_usuario, fk_id_tecnicatura)
            VALUES ($us_id, $fk_id_tec);";

            $queryInsertPreIns = mysqli_query($this->pri_connect, $insertPre_ins);

            if ($queryInsertPreIns) {

                header("location:../Views/v_registro_concluido.php");
            }
        } catch (Exception $e) {
            return "No se pudo inscribir el usuario en la Tecnicatura" . $e->getMessage();
        }
    }

    //realiza preincripcion de un usuario en un profesorado
    public function pro_inscription(int $us_id, int  $fk_id_pro)
    {

        echo "inscripcion profesorado";

        try {
            $insertPre_ins = "INSERT INTO pre_inscripcion (fk_id_usuario, fk_id_profesorado)
            VALUES ($us_id, $fk_id_pro);";

            $queryInsertPreIns = mysqli_query($this->pri_connect, $insertPre_ins);

            if ($queryInsertPreIns) {

                header("location:../Views/v_registro_concluido.php");
            }
        } catch (Exception $e) {
            return "No se pudo inscribir el usuario en el Profesorado" . $e->getMessage();
        }
    }
}
