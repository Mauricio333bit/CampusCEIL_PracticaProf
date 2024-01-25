<?php
require_once("../Model/user.php");
$user = new User();
$id_user = $_GET["id"];

$userEdit = $user->get_usrByIdDB($id_user);

error_reporting(0);

session_start();
$li_Acceder_UserName;
if (empty($_SESSION["userName"])) {
    $li_Acceder_UserName = " <a class='nav-link active' href='Views/v_login.php'>ACCEDER</a>";
} else {
    $nameUser = $_SESSION["userName"];
    $li_Acceder_UserName = "<div class='dropdown dropstart'>
  <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
     $nameUser
  </button>
  <ul class='dropdown-menu dropdown-menu-dark'>
    <li><a class='dropdown-item ' href='#'>PERFIL && CERTIFICADOS</a></li>
    <li><a class='dropdown-item' href='#'>EDITAR PERFIL</a></li>
    <li><a class='dropdown-item' href='#'>PAGOS</a></li>
    <li>
      <hr class='dropdown-divider'>
    </li>
    <li><a class='dropdown-item btn_salir text-light' href='/ProyectoFinalPraPro/Controller/c_user.php?action=logout' style='background-color: #b1450f;'>SALIR</a></li>
  </ul>
</div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>IES 9-024</title>
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-80 shadow">
            <div class="container-fluid mx-5 justify-content-center justify-content-sm-between">
                <div class="justify-content-center align-items-center">
                    <a class="navbar-brand" href="#">
                        <img src="./imagenes/iesLogo.png" class="" width="75" alt="" />
                    </a>
                    <span class="text-light fw-normal">IES 9-024</span>
                </div>
                <button class="navbar-toggler col-12 col-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./v_oferta_educativa.php">Oferta educativa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Institucion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#formularios">Extension</a>
                        </li>
                        <li>
                            <?php echo $li_Acceder_UserName; ?>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main class="vh-100 d-flex align-items-center">
        <form class="mx-auto my-4 col-8 text-dark " action="../Controller/c_admin.php?action=update&id=<?= $id_user ?>" method="POST">
            <!--formulario que ejecuta metodo post tomando los datos de input, direcciona a el controller de user y envia el parametro action register-->

            <div class="d-flex flex-row align-items-center mb-2">

                <div class="form-outline flex-fill text-dark">
                    <label class="form-label" for="form3Example1c">Nombre</label>
                    <input require type="text" name="nameUPDATEUser" class="form-control" value="<?= $userEdit->getUsrName() ?>" />
                    <label class="form-label" for="form3Example1c">Apellido</label>
                    <input require type="text" name="lastNameUPDATEUser" class="form-control" value="<?= $userEdit->getUsrLastname() ?>" />

                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">

                <div class="form-outline flex-fill mb-0">
                    <label class="form-label text-dark" for="form3Example3c">Email</label>
                    <input require type="email" name="emailUPDATEUser" class="form-control" value="<?= $userEdit->getUsrEmail() ?>" />

                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">

                <div class="form-outline flex-fill mb-0">
                    <label class="form-label text-dark" for="form3Example4c">Contraseña</label>
                    <input require type="text" name="passUPDATEUser" class="form-control" value="<?= $userEdit->getUsrPswd() ?>" />

                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">

                <div class="form-outline flex-fill mb-0">
                    <label class="form-label text-dark" for="form3Example4c">Tipo de cuenta</label>
                    <input require type="number" name="typeUPDATEUser" class="form-control" value="<?= $userEdit->getUsrIdType() ?>" />

                </div>
            </div>


            <div class="d-flex justify-content-center mx-4 my-4">
                <button type="submit" class="btn btn-primary col-12">Actualizar</button>
            </div>


        </form>




    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>