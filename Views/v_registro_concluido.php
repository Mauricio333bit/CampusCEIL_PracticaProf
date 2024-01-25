<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IES 9024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

</html>


</head>

<body style="overflow: hidden;">
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden vh-100 aling-items-center">
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
                right: 180px;
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

        <div class="container px-4 my-4 text-center text-lg-start  align-items-center">
            <div class="row vh-100 gx-lg-5 align-items-center justify-content-center mb-5 ">
                <div id="radius-shape-1" class="position-absolute  shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="col-lg-6  mb-lg-0 position-relative">


                    <div class="card bg-glass h-100">
                        <div class="card-body px-4 py-5 px-md-5 ">
                            <div class="d-flex justify-content-center text-center">

                                <img src="./imagenes/iesLogo.png" class="brand_logo" alt="Logo" height="80" />

                            </div>
                            <h1 class="text-white bold text-center">¡Registro completado!</h1>
                            <form class="d-flex justify-content-center mt-4">

                                <button type="submit" class="btn btn-primary col-12" formaction="v_login.php">Ingresar</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>