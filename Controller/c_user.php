<?php
require_once("../Model/user.php");
echo "llegaste";
$usuario = new User_con();

// parametro que se recibe mediante la irl en la accion del form
$action = $_GET['action'];

if ($action == 'login') {
    $usuario->login_usr();
};
if ($action == 'register') {
    $usuario->register_usr();
};
if ($action == 'logout') {
    $usuario->log_out();
};


class User_con
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }
    // metodo para realizar el registro de un nuevo usuario 
    public function register_usr()
    {

        $usr = new User();

        $usr->setUsrName($_POST['nameNewUser']);
        $usr->setUsrLastname($_POST['lastNameNewUser']);
        $usr->setUsrEmail($_POST['emailNewUser']);
        $usr->setUsrPswd($_POST['passNewUser']);
        $usr->setUsrIdType(2);

        try {
            require_once("./c_email.php");
            sendMail($correoBienvenida, $usr->getUsrEmail());

            if ($this->model->insert_usrDB($usr)) {

                header("location:../Views/v_registro_concluido.php");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //iniciar sesion y direccionar a la pagina correcta segun el tipo de cuenta
    public function login_usr()
    {
        $usrEmail = $_POST['emailUserLog'];
        $usrPasswd = $_POST['passUserLog'];

        try {

            $userObtenido =  $this->model->get_usrDB($usrEmail, $usrPasswd);
            if (!empty($userObtenido)) {

                $_SESSION["user"] = $usrEmail;
                $_SESSION["pass"] = $usrPasswd;

                switch ($userObtenido['fk_id_cargo']) {
                    case 1:
                        $_SESSION["userName"] = $userObtenido['us_nombre'];
                        $_SESSION['tipoDeCuenta'] = $userObtenido['fk_id_cargo'];
                        header("location:../Views/v_admin.php");
                        break;
                    case 2:
                        header("location:../");
                        $_SESSION["userName"] = $userObtenido['us_nombre'];

                        $_SESSION['tipoDeCuenta'] = $userObtenido['fk_id_cargo'];

                        break;
                }
            } else {
                if (!empty($userObtenido['us_nombre']) && !empty($passwordUsr)) {
                    echo "<div  ><p class='txt_msg-error mx-auto' >Usuario y contraseña invalidos</p></div>";
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



    //cerrar sesion

    public function log_out()
    {
        session_start();
        session_destroy();
        header("location:../");
    }
}
