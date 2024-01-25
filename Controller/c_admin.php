<?php
require_once("../Model/user.php");
echo "llegaste a admin";
$admin = new Admin_con();

// parametro que se recibe mediante la irl en la accion del form
$action = $_GET['action'];
$id = $_GET["id"];
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
    public function edit_usr(int $id)
    {
        $usr = $this->model->get_usrByIdDB($id);

        $usr->setUsrName($_POST['nameUPDATEUser']);
        $usr->setUsrLastname($_POST['lastNameUPDATEUser']);
        $usr->setUsrEmail($_POST['emailUPDATEUser']);
        $usr->setUsrPswd($_POST['passUPDATEUser']);
        $usr->setUsrIdType($_POST['typeUPDATEUser']);


        $usr->update_usr($usr);
    }
    public function delete_usr(int $id)
    {
        $this->model->delete_usrDB($id);
    }
}
