<?php
include("../Model/conectionDB.php");
session_start();
//objeto conexion a base a datos
$conection = new ConectionDB;
//variable id que viene en la url
$id_carrera = $_GET["id"];
$tipo_carrera = $_GET['tipo'];

$carrera;

// CONSULTASSQL

//seleccionar el profesorado en base al id que recibo de la url

$sqlGetProfesoradoById = "SELECT pro_nombre as nombre, pro_descripcion as descripcion, 
pro_link as link from profesorado where profesorado.pro_id=$id_carrera";


$queryProfesorado = mysqli_query($conection->connect(), $sqlGetProfesoradoById);


//seleccionar la tecnicatura en base al id que recibo de la url

$sqlGetTecnicaturaById = "SELECT  tec_nombre as nombre, tec_descripcion as descripcion, tec_link as link from tecnicatura where tecnicatura.tec_id=$id_carrera ";
$queryTecnicatura = mysqli_query($conection->connect(), $sqlGetTecnicaturaById);




//discriminar el tipo de carrera
//si el tipo es igual a tec ejecuta la consulta tecnicatura sino el de profesorado
$carrera = $tipo_carrera == "tec" ? mysqli_fetch_array($queryTecnicatura) : mysqli_fetch_array($queryProfesorado);

//funciones para actualizar datos
function updateTec(int $id_carrera, string $nombre, string $descripcion, string $link, $conection)
{
    $sqlUpdateTecnicatura = "UPDATE tecnicatura SET tec_nombre= '$nombre',tec_descripcion= '$descripcion' ,tec_link='$link' WHERE tecnicatura.tec_id=$id_carrera;";
    if (mysqli_query($conection->connect(), $sqlUpdateTecnicatura)) {
        header("location:./v_admin_oferta_educativa.php");
    }
}
function updateProf(int $id_carrera, string $nombre, string $descripcion, string $link, $conection)
{
    $sqlUpdateProfesorado = "UPDATE profesorado SET pro_nombre='$nombre',pro_descripcion= '$descripcion' ,pro_link='$link' WHERE profesorado.pro_id=$id_carrera;";
    if (mysqli_query($conection->connect(), $sqlUpdateProfesorado)) {
        header("location:./v_admin_oferta_educativa.php");
    }
}

//actualizar datos de la carrera
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $link = $_POST['link'];

    $tipo_carrera == "pro" ? updateTec($id_carrera, $nombre, $descripcion, $link, $conection) : updateProf($id_carrera, $nombre, $descripcion, $link, $conection);
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
                    <a class="navbar-brand" href="#">
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
        <form class="mx-auto my-4 col-8 text-dark " method="POST">
            <!--formulario que ejecuta metodo post tomando los datos de input, direcciona a el controller de user y envia el parametro action register-->



            <div class="d-flex flex-row align-items-center mb-2">

                <div class="form-outline flex-fill mb-0">
                    <label class="form-label text-dark fs-3" for="form3Example3c">Nombre de la carrera</label>
                    <input require type="text" name="nombre" class="form-control" value="<?= $carrera['nombre'] ?>" />

                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-2">

                <div class="form-outline flex-fill mb-0">
                    <label class="form-label text-dark fs-3" for="form3Example3c">Descripción de la carrera</label>


                    <textarea class="w-100" name="descripcion" rows="5"><?= $carrera['descripcion'] ?></textarea>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-2">

                <div class="form-outline flex-fill mb-0">
                    <label class="form-label text-dark fs-3" for="form3Example3c">Link de la carrera</label>
                    <input require type="text" name="link" class="form-control" value="<?= $carrera['link'] ?>" />

                </div>
            </div>




            <div class="d-flex justify-content-center mx-4 my-4">
                <button type="submit" name="actualizar" class="btn btn-primary col-12">Actualizar</button>
            </div>


        </form>




    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>