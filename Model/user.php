<?php
require_once("conectionDB.php");

class User
{

    private $usr_connect;
    //private para encapsular,  se deben hacer los get y set de cada uno
    private $usr_id;
    private $usr_name;
    private $usr_lastname;
    private $usr_email;
    private $usr_pswd;
    private $usr_id_type;

    public function __construct()
    {
        $this->usr_connect = ConectionDB::connect();
    }

    public function getUsrId(): ?int //con el signo ? indico que puede ser null, en la db no.
    {
        return $this->usr_id;
    }

    public function setUsrId(int $id)
    {
        $this->usr_id = $id;
    }

    public function getUsrName(): ?string
    {
        return $this->usr_name;
    }

    public function setUsrName(string $name)
    {
        $this->usr_name = $name;
    }

    public function getUsrLastname(): ?string
    {
        return $this->usr_lastname;
    }

    public function setUsrLastname(string $lastname)
    {
        $this->usr_lastname = $lastname;
    }

    public function getUsrEmail(): ?string
    {
        return $this->usr_email;
    }

    public function setUsrEmail(string $email)
    {
        $this->usr_email = $email;
    }

    public function getUsrPswd(): ?string
    {
        return $this->usr_pswd;
    }

    public function setUsrPswd(string $pswd)
    {
        $this->usr_pswd = $pswd;
    }

    public function getUsrIdType(): ?int
    {
        return $this->usr_id_type;
    }

    public function setUsrIdType(int $id_type)
    {
        $this->usr_id_type = $id_type;
    }

    //devuelve una array con los usuarios cargados en la db
    public function list_usr()
    {

        $queryUsers = "SELECT usuario.us_id, usuario.us_nombre, usuario.us_apellido, usuario.us_email, usuario.us_password, cargo.descripcion AS tipo, usuario.fecha_inicio
        FROM usuario
        JOIN cargo ON usuario.fk_id_cargo = cargo.id";
        $dbUsers = mysqli_query($this->usr_connect, $queryUsers);


        return $dbUsers;
    }


    //Metodo para realizar el insert de un nuevo usuario en la db
    public function insert_usrDB(User $usr): ?bool
    {

        echo "Estas en insert";



        try {
            $insertUsrSql = "INSERT INTO usuario VALUES(null,'" . $usr->getUsrName() . "','" . $usr->getUsrLastname() . "','" . $usr->getUsrEmail() . "','" . $usr->getUsrPswd() . "', " . $usr->getUsrIdType() . " , null)";

            $queryAddUsr = mysqli_query($this->usr_connect, $insertUsrSql);
            return $queryAddUsr;
        } catch (mysqli_sql_exception $e) {

            return false;
        }
    }
    //Metodo para tomar el usr si existe en la db en base a email y contraseña
    public function get_usrDB(string $emailUsr, string $passwordUsr)
    {
        echo "estas en model get;";


        $queryGetUsr = "SELECT * FROM usuario where us_email='$emailUsr' and us_password='$passwordUsr'"; //consulta sql para obtener el usuario si existe en la db

        $resultado = mysqli_query($this->usr_connect, $queryGetUsr);

        if (!$resultado || mysqli_num_rows($resultado) <= 0) {
            echo "usuario y contraseñas invalidas";
        }

        $userObtenido = mysqli_fetch_array($resultado);

        return $userObtenido;
    }

    // Tomar usuario por su id
    public function get_usrByIdDB(int $id)
    {
        $queryGetUsr = "SELECT * FROM usuario where us_id='$id'"; //consulta sql para obtener el usuario  si existe en la db
        $resultado = mysqli_query($this->usr_connect, $queryGetUsr);


        $userObtenido = mysqli_fetch_array($resultado);

        $userObj = new User();
        $userObj->setUsrId($userObtenido["us_id"]);
        $userObj->setUsrName($userObtenido["us_nombre"]);
        $userObj->setUsrLastname($userObtenido["us_apellido"]);
        $userObj->setUsrEmail($userObtenido["us_email"]);
        $userObj->setUsrPswd($userObtenido["us_password"]);
        $userObj->setUsrIdType($userObtenido["fk_id_cargo"]);
        return $userObj;
    }
    // actualizar usuario en la db
    public function update_usr(User $usr)
    {
        echo  'entraste al metodo de update';
        $sql = "UPDATE usuario 
        SET us_nombre='" . $usr->getUsrName() . "', 
        us_apellido='" . $usr->getUsrLastname() . "',
        us_email='" . $usr->getUsrEmail() . "', 
        us_password='" . $usr->getUsrPswd() . "',
        fk_id_cargo='" . $usr->getUsrIdType() . "'
        
        WHERE us_id='" . $usr->getUsrId() . "'
        ";


        // Ejecutar la sentencia SQL
        if (mysqli_query($this->usr_connect, $sql)) {
            return true;
        }
    }
    public function delete_usrDB(int $id)

    {
        $queryDeleteUsr = "
        DELETE FROM usuario WHERE us_id=$id";



        // Ejecutar la sentencia SQL
        if (mysqli_query($this->usr_connect, $queryDeleteUsr)) {
            return true;
        }
    }
}
