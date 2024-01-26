<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IES 9024</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./assets/css/v_reg.css">

</html>


</head>

<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient 
     vh-100">


        <div class="container px-4 mb-4  text-lg-start align-items-center ">
            <div class=" vh-100 row gx-lg-5 align-items-center justify-content-center mb-5 ">
                <div id="radius-shape-1" class="position-absolute  shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="col-lg-6  mb-lg-0 position-relative">


                    <div class="card bg-glass ">
                        <div class="card-body px-4 py-3 px-md-5 ">
                            <div class="d-flex justify-content-center mb-2">

                                <img src="./assets/imagenes/iesLogo.png" class="brand_logo" alt="Logo" height="60" />
                                <h1 class=" display-5 fw-bold ls-tight text-white">
                                    IES 9-024

                                </h1>
                            </div>
                            <form class="mx-1 mx-md-4 needs-validation" action="../Controller/c_user.php?action=register" method="POST" novalidate>
                                <!--formulario que ejecuta metodo post tomando los datos de input, direcciona a el controller de user y envia el parametro action register-->

                                <!-- Nombre input -->
                                <label class="form-label text-white" for="formName">Nombre</label>
                                <input type="text" id="formName" class="form-control mb-2" placeholder="Emila" name="nameNewUser" id="validationDefault01" required />
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-warning">
                                    Tienes que ingresar un nombre.
                                </div>
                                <!-- Apellido input -->
                                <label class="form-label text-white" for="formLastName">Apellido</label>
                                <input type="text" id="formLastName" class="form-control mb-2" placeholder="Perez" name="lastNameNewUser" id="validationDefault01" required />
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-warning">
                                    Debes ingresar tu apellido.
                                </div>

                                <!-- Email input -->
                                <label class="form-label text-white" for="formName">Email</label>
                                <input type="email" id="formName" class="form-control mb-2" placeholder="usuario@gmail.com" name="emailNewUser" id="validationDefault01" required />
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-warning">
                                    Tienes que ingresar un correo valido.
                                </div>


                                <!-- Password input -->
                                <label class="form-label text-white" for="formPwd">Contraseña</label>
                                <input type="password" required name="passNewUser" class="form-control input_pass " id="formPwd" placeholder="contraseña" />
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-warning">
                                    Por favor,ingresa una contraseña.
                                </div>

                                <div class="d-flex justify-content-center pt-3 mx-4 mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary col-12">Crear cuenta</button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
</body>

</html>