<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IES 9024</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</html>


</head>

<body class="vh-100 overflow-x-hidden">
  <!--
  <div class="container h-100">
    <div class="d-flex justify-content-center align-items-center mt-4">
      <div class="user_card p-2">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="./imagenes/iesLogo.png" class="brand_logo" alt="Logo" />
          </div>
        </div>
        <div class="d-flex justify-content-center ">
          <form method="post" class="px-5 login_form">
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="usuario" class="form-control input_user" value="<?php if (isset($_POST["usuario"])) echo $_POST["usuario"] ?>" placeholder="usuario" />
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="contraseña" class="form-control input_pass" value="<?php if (isset($_POST["contraseña"])) echo $_POST["contraseña"] ?>" placeholder="contraseña" />
            </div>
            <?php
            include("control.php");
            ?>

            <div class="d-flex justify-content-center mt-3 login_container">
              <button type="submit" name="button" id="liveToastBtn" class="btn login_btn">
                Ingresar
              </button>
            </div>
            <div class="mt-2">
              <div class="d-flex justify-content-center flex-column text-light links">
                <a href="#" class="mx-auto">Olvidé mi contraseña</a>
                <span class="mx-auto">Primera vez que nos visitas?</span>
                <a href="registro.php" class="mx-auto">Registrate</a>

              </div>

            </div>
          </form>
        </div>



      </div>
    </div>
  </div>-->
  <!-- Section: Design Block -->
  <section class="background-radial-gradient  h-100">
    <style>
      .background-radial-gradient {
        overflow-x: hidden;
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
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
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
        bottom: -60px;
        right: -110px;
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

    <div class="d-flex align-items-center px-4 py-5 px-md-5">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative text-center" style="z-index: 10">
          <div class="justify-content-center align-items-center">
            <a class="navbar-brand" href="#">
              <img src="imagenes/iesLogo.png" class="" width="75" alt="" />
            </a>

          </div>
          <h1 class=" display-5 fw-bold ls-tight text-white">
            IES 9-024 <br />
            <span class="text-white opacity-75">for your business</span>
          </h1>
          <p class="mb-4 opacity-50 text-white">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Temporibus, expedita iusto veniam atque, magni tempora mollitia
            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
            ab ipsum nisi dolorem modi. Quos?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <form action="../Controller/c_user.php?action=login" method="POST" class="needs-validation" novalidate>
                <!-- Email input -->
                <label class="form-label text-white" for="formName">Email</label>
                <input type="email" id="formName" class="form-control mb-2" placeholder="usuario" name="emailUserLog" id="validationDefault01" required />
                <div id="validationServerUsernameFeedback" class="invalid-feedback text-warning">
                  Tienes que ingresar un correo.
                </div>


                <!-- Password input -->
                <label class="form-label text-white" for="formPwd">Contraseña</label>
                <input type="password" required name="passUserLog" class="form-control input_pass " id="formPwd" placeholder="contraseña" />
                <div id="validationServerUsernameFeedback" class="invalid-feedback text-warning">
                  Por favor,ingresa tu contraseña.
                </div>

                <!-- Submit button -->
                <button type="submit" name="buttonLogin" class="btn btn-primary btn-block mb-4 mt-4">
                  Ingresar
                </button>

                <div class="mt-2">
                  <div class="d-flex justify-content-center flex-column text-light links">
                    <a href="#" class="mx-auto">Olvidé mi contraseña</a>
                    <span class="mx-auto text-white">Primera vez que nos visitas?</span>
                    <a href="v_registro.php" class="mx-auto">Crea tu cuenta</a>

                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

  <script>
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>