<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IES 9024</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/v_inicio.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/v_login.css">


</html>


</head>

<body class="vh-100 ">

  <!-- Section: Design Block -->
  <section class="background-radial-gradient  h-100">

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
            <span class="text-white opacity-75">Centro de Educación e Investigación Lavalle (CEIL) </span>
          </h1>
          <p class="mb-4 opacity-50 text-white">
            El campus virtual, es un entorno digital que permite la continuidad de los procesos de enseñanza y el acompañamiento de la labor diaria de docentes, estudiantes y toda la comunidad educativa.
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