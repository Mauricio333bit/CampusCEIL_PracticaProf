<?php
session_start();
require_once("../Model/user.php");
$user = new User();

if (empty($_SESSION["userName"]) || $_SESSION['tipoDeCuenta'] != 1) {

    echo "ERROR: usuario no autorizado,debes iniciar sesion.";

    die();
}



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
                    <a class="navbar-brand" href="/ProyectoFinalPraPro/">
                        <img src="./assets/imagenes/iesLogo.png" class="" width="75" alt="" />
                    </a>
                    <span class="text-light fw-normal">IES 9-024</span>
                </div>
                <button class="navbar-toggler col-12 col-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./v_admin_oferta_educativa.php">Oferta educativa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inscripciones</a>
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

    <main>
        <form method="POST" class="input-group mb-3 gap-2 w-75 needs-validation my-3 mx-auto" action="../Controller/c_admin.php?action=register" method="POST" novalidate>
            <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" name="nombre" aria-describedby="button-addon2">
            <input type="text" class="form-control" placeholder="Apellido" aria-label="apellido" name="apellido" aria-describedby="button-addon2">
            <input type="text" class="form-control" placeholder="Email" aria-label="email" name="email" aria-describedby="button-addon2">
            <input type="text" class="form-control" placeholder="Contraseña" aria-label="contraseña" name="contraseña" aria-describedby="button-addon2">

            <select class="form-select" id="inputGroupSelect01" name="tipo">

                <option value="1" selected>Administrador</option>
                <option value="2">Ususario estandar</option>

            </select>

            <button class="btn btn-success" type="submit" id="button-addon2">Agregar</button>
        </form>
        <table class="table w-75 mx-auto justify-content-center my-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Tipo de Cuenta</th>
                    <th scope="col">Fecha de inicio</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
                foreach ($user->list_usr() as $usuario) {
                ?>
                    <tr>
                        <th scope="row"><?= $usuario['us_id'] ?></th>
                        <td><?= $usuario['us_nombre'] ?></td>
                        <td><?= $usuario['us_apellido'] ?></td>
                        <td><?= $usuario['us_email'] ?></td>
                        <td><?= $usuario['us_password'] ?></td>
                        <td><?= $usuario['tipo'] ?></td>
                        <td><?= $usuario['fecha_inicio'] ?></td>
                        <td>
                            <div class="d-flex gap-2 row">
                                <!--mediante parametros en la url envio datos que determinan que hacer en el controller-->
                                <a href="v_edit_usr.php?id=<?= $usuario['us_id'] ?>">
                                    <button type="button" class="btn btn-info col-10">Editar</button>
                                </a>
                                <a href="../Controller/c_admin.php?action=delete&id=<?= $usuario['us_id'] ?>">
                                    <button type="button" class="btn btn-danger col-10">Eliminar</button>
                                </a>

                            </div>
                        </td>

                    </tr>
                <?php }; ?>


            </tbody>
        </table>




    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>