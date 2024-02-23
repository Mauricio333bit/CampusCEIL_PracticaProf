<?php
require_once("../Model/user.php");
echo "llegaste a admin";
$admin = new Admin_con();

// parametro que se recibe mediante la irl en la accion del form
$action = $_GET['action'];
$id = $_GET["id"];


if ($action == 'register') {
    $admin->register_usr();
};
if ($action == 'update') {
    $admin->edit_usr($id);
};
if ($action == 'delete') {
    $admin->delete_usr($id);
    header("location:../Views/v_admin.php");
};



class Admin_con
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function register_usr()
    {

        $usr = new User();

        $usr->setUsrName($_POST['nombre']);
        $usr->setUsrLastname($_POST['apellido']);
        $usr->setUsrEmail($_POST['email']);
        $usr->setUsrPswd($_POST['contraseña']);
        $usr->setUsrIdType($_POST['tipo']);

        try {
            require_once("./c_email.php");
            sendMail($correoBienvenida, $usr->getUsrEmail());

            if ($this->model->insert_usrDB($usr)) {

                header("location:../Views/v_admin.php");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function edit_usr(int $id)
    {
        $usr = $this->model->get_usrByIdDB($id);

        $usr->setUsrName($_POST['nameUPDATEUser']);
        $usr->setUsrLastname($_POST['lastNameUPDATEUser']);
        $usr->setUsrEmail($_POST['emailUPDATEUser']);
        $usr->setUsrPswd($_POST['passUPDATEUser']);
        $usr->setUsrIdType($_POST['typeUPDATEUser']);


        $usr->update_usr($usr);
        header("location:../Views/v_admin.php");
    }
    public function delete_usr(int $id)
    {
        $this->model->delete_usrDB($id);
    }
}
