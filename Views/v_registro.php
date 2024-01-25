<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IES 9024</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</html>


</head>

<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient 
     vh-100">
        <style>
            .background-radial-gradient {
                background-color: #212529;
                background-image: radial-gradient(650px circle at 0% 0%,
                        #e69800 10%,
                        #e69800 35%,
                        #212529 75%,
                        #212529 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        #6eb222 15%,
                        #212529 35%,
                        #212529 75%,
                        #212529 80%,
                        transparent 100%);
            }

            #radius-shape-1 {
                border-radius: 44% 23% 63% 32% / 70% 33% 67% 30%;
                height: 220px;
                width: 220px;
                top: 378px;
                left: 179px;
                background: radial-gradient(#1776BA, #1776AA);
                overflow: hidden;
                animation-name: floatAnimation;
                animation-duration: 14s;
                animation-timing-function: ease-in-out;
                animation-fill-mode: forwards;
                animation-iteration-count: infinite;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: 306px;
                right: 7px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#B1450F, #B1450F);
                overflow: hidden;
                animation-name: floatAnimation2;
                animation-duration: 14s;
                animation-timing-function: ease-in-out;
                animation-fill-mode: forwards;
                animation-iteration-count: infinite;
            }

            .bg-glass {
                background: transparent;
                backdrop-filter: blur(57px);
                border: solid 1px white;
                border-radius: 43px;
            }


            @keyframes floatAnimation {
                0% {
                    transform: translateX(0);
                }

                50% {
                    transform: translateX(-2rem);
                }

                100% {
                    transform: translateX(0);
                }
            }

            @keyframes floatAnimation2 {
                0% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-3rem);
                }

                100% {
                    transform: translateY(0);
                }
            }
        </style>

        <div class="container px-4 mb-4  text-lg-start align-items-center ">
            <div class=" vh-100 row gx-lg-5 align-items-center justify-content-center mb-5 ">
                <div id="radius-shape-1" class="position-absolute  shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="col-lg-6  mb-lg-0 position-relative">


                    <div class="card bg-glass ">
                        <div class="card-body px-4 py-5 px-md-5 ">
                            <div class="d-flex justify-content-center mb-2">

                                <img src="./imagenes/iesLogo.png" class="brand_logo" alt="Logo" height="60" />

                            </div>
                            <form class="mx-1 mx-md-4" action="../Controller/c_user.php?action=register" method="POST">
                                <!--formulario que ejecuta metodo post tomando los datos de input, direcciona a el controller de user y envia el parametro action register-->

                                <div class="d-flex flex-row align-items-center mb-2">

                                    <div class="form-outline flex-fill text-white">
                                        <label class="form-label" for="form3Example1c">Nombre</label>
                                        <input require type="text" name="nameNewUser" class="form-control" />
                                        <label class="form-label" for="form3Example1c">Apellido</label>
                                        <input require type="text" name="lastNameNewUser" class="form-control" />

                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-2">

                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label text-white" for="form3Example3c">Email</label>
                                        <input require type="email" name="emailNewUser" class="form-control" />

                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-2">

                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label text-white" for="form3Example4c">Contraseña</label>
                                        <input require type="password" name="passNewUser" class="form-control" />

                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">

                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label text-white" for="form3Example4cd">Repite tu contraseña</label>
                                        <input require type="password" id="form3Example4cd" class="form-control" />

                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary col-12">Crear cuenta</button>
                                </div>
                                <!--input que me ayuda a determinar la funcion en el contrroler-->
                                <input type="hidden" name="action" value="login">

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>