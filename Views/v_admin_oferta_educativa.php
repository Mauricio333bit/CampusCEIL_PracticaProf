<?php



include("../Model/conectionDB.php");
session_start();


if (empty($_SESSION["userName"]) || $_SESSION['tipoDeCuenta'] != 1) {

    echo "ERROR: usuario no autorizado, debes iniciar sesion.";

    die();
}
$li_Acceder_UserName;
if (empty($_SESSION["userName"])) {
    $li_Acceder_UserName = " <a class='nav-link active' href='v_login.php'>ACCEDER</a>";
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
//consultas para tomar carreras en db-------------------------------------
$sqlProfesorados = "SELECT pro_id as idProf, pro_nombre as nameProf, pro_descripcion as txtProf, pro_link as linkProf from profesorado ";
$sqlTecnicaturas = "SELECT tec_id as idTec, tec_nombre as nameTec, tec_descripcion as txtTec, tec_link as linkTec from tecnicatura ";

//objeto conexion a base a datos
$conection = new ConectionDB;

$queryProfesorados = mysqli_query($conection->connect(), $sqlProfesorados);
$queryTecnicaturas = mysqli_query($conection->connect(), $sqlTecnicaturas);

//funciones para añadir nuevas carreras------------------------------------------
//TECNICATURA
function agregarTecn(string $nombre, string $descripcion, string $link, ConectionDB  $conection)
{
    $sqlInsertTec = "INSERT INTO Tecnicatura VALUES(null, '$nombre', '$descripcion','$link');";
    echo "<script>alert('Tecnicatura añadida con exito!');</script>";
    if (!mysqli_query($conection->connect(), $sqlInsertTec)) {
        echo "algo falló";
    }
}
if (isset($_POST['addTec'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $link = $_POST['link'];
    agregarTecn($nombre, $descripcion, $link, $conection);
}

//PROFESORADO

function agregarPro(string $nombre, string $descripcion, string $link, ConectionDB  $conection)
{
    $sqlInsertPro = "INSERT INTO Profesorado VALUES(null, '$nombre', '$descripcion','$link');";

    if (!mysqli_query($conection->connect(), $sqlInsertPro)) {
        echo "algo falló";
    } else {
        echo "<script>alert('Profesorado añadido con exito!');</script>";
    }
}
if (isset($_POST['addPro'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $link = $_POST['link'];
    agregarPro($nombre, $descripcion, $link, $conection);
}

//funciones para eliminar carrera
function deleteTec(int $id, ConectionDB $conection)
{
    $sqlDeleteTec = "DELETE FROM tecnicatura WHERE tec_id=$id;";

    if (!mysqli_query($conection->connect(), $sqlDeleteTec)) {
        echo "algo falló";
    } else {
        echo "<script>alert('Eliminada con exito');</script>";
    }
}
if (isset($_POST['deleteTec'])) {
    deleteTec($_POST["tec_id"], $conection);
}

function deletePro(int $id, ConectionDB $conection)
{
    $sqlDeletePro = "DELETE FROM profesorado WHERE pro_id=$id;";

    if (!mysqli_query($conection->connect(), $sqlDeletePro)) {
        echo "algo falló";
    } else {
        echo "<script>alert('Eliminado con exito');</script>";
    }
}
if (isset($_POST['deletePro'])) {
    deletePro($_POST['pro_id'], $conection);
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/v_inicio.css">

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
                            <a class="nav-link" href="./v_admin_pre_inc.php">Inscripciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./v_admin.php">Ususarios</a>
                        </li>
                        <li>
                            <?php echo $li_Acceder_UserName; ?>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main class="d-flex justify-content-center aling-items-center">

        <section class="col-11 row text-center p-4">

            <!-- Seccion Popfesorados-->
            <h1 class=" bold my-2 mb-4">Profesorados</h1>
            <form method="POST" class="input-group mb-3 gap-2">
                <input type="text" class="form-control" placeholder="Profesorado" aria-label="Nombre" name="nombre" aria-describedby="button-addon2">
                <input type="text" class="form-control" placeholder="Descripción" aria-label="Descripcion" name="descripcion" aria-describedby="button-addon2">
                <input type="text" class="form-control" placeholder="Link" aria-label="Link" name="link" aria-describedby="button-addon2">
                <button class="btn btn-success" type="submit" name="addPro" id="button-addon2">Agregar</button>
            </form>
            <!-- Tabla con los profesorados registrados en la data base-->
            <table class="table w-100 mx-auto justify-content-center my-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Link</th>


                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    foreach (mysqli_query($conection->connect(), $sqlProfesorados) as $bdProf) {
                    ?>
                        <tr>
                            <th scope="row"><?= $bdProf['idProf'] ?></th>
                            <td><?= $bdProf['nameProf'] ?></td>
                            <td><?= $bdProf['txtProf'] ?></td>
                            <td><?= $bdProf['linkProf'] ?></td>

                            <td>
                                <div class="d-flex gap-2 row">
                                    <!--mediante parametros en la url envio datos que determinan que hacer en el controller-->
                                    <a href="v_edit_carrera.php?id=<?= $bdProf['idProf'] ?>&tipo=prof">
                                        <button type="button" class="btn btn-info col-10">Editar</button>
                                    </a>
                                    <form method="POST">

                                        <input type="hidden" name="pro_id" value="<?= $bdProf['idProf'] ?>">
                                        <button type="submit" class="btn btn-danger  col-10" name="deletePro">Eliminar</button>
                                    </form>


                                </div>
                            </td>

                        </tr>
                    <?php }; ?>


                </tbody>
            </table>

            <!-- Seccion Tecnicaturas-->
            <h1 class=" bold my-2 mb-4">Tecnicaturas</h1>
            <form method="POST" class="input-group mb-3 gap-2">

                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" name="nombre" aria-describedby="button-addon2">
                <input type="text" class="form-control" placeholder="Descripción" aria-label="Descripcion" name="descripcion" aria-describedby="button-addon2">
                <input type="text" class="form-control" placeholder="Link" aria-label="Link" name="link" aria-describedby="button-addon2">
                <button class="btn btn-success" type="submit" id="button-addon2" name="addTec">Agregar</button>

            </form>
            <!-- Tabla con las tecnicaturas registradas en la data base-->
            <table class="table w-100 mx-auto justify-content-center my-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Link</th>


                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    foreach (mysqli_query($conection->connect(), $sqlTecnicaturas) as $bdTec) {
                    ?>
                        <tr>
                            <th scope="row"><?= $bdTec['idTec'] ?></th>
                            <td><?= $bdTec['nameTec'] ?></td>
                            <td><?= $bdTec['txtTec'] ?></td>
                            <td><?= $bdTec['linkTec'] ?></td>

                            <td>
                                <div class="d-flex gap-2 row">
                                    <!--mediante parametros en la url envio datos que determinan que hacer en el controller-->
                                    <a href="v_edit_carrera.php?id=<?= $bdTec['idTec'] ?>&tipo=tec">
                                        <button type="button" class="btn btn-info col-10">Editar</button>
                                    </a>
                                    <form method="POST">

                                        <input type="hidden" name="tec_id" value="<?= $bdTec['idTec'] ?>">
                                        <button type="submit" class="btn btn-danger  col-10" name="deleteTec">Eliminar</button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    <?php }; ?>


                </tbody>
            </table>
        </section>







    </main>

    <footer class="footer">
        <div class="d-flex justify-content-center pt-3 footer_social-networks ">
            <ul class="list-unstyled d-flex gap-3 align-items-center">
                <li class="rounded-circle bg-white
                     p-2"><a href="https://www.facebook.com/p/IES-9-024-de-Lavalle-100042340345697/?locale=es_LA" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512" fill="currentColor"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                        </svg></a></li>
                <li class="rounded-circle bg-white
                     p-2"><a href="https://www.instagram.com/ies9_024lavalle/"><svg xmlns="http://www.w3.org/2000/svg" target="_blank" height="32" width="32" viewBox="0 0 448 512" fill="currentColor"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg></a></li>
                <li class="rounded-circle bg-white
                     p-2"><a href="https://www.youtube.com/@IES-LAVALLEMENDOZA" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 576 512" fill="currentColor"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                        </svg></a></li>
            </ul>

        </div>
        <div class="text-center py-3 by-me ">
            <a href="" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">By<span> Mauricio Quiroga</span></a>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>




</body>

</html>