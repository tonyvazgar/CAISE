<?php
    $alert = "";
    session_start();
    if(!empty($_SESSION['active'])){
        header('Location: admin/'); 
    }else {
        if(!empty($_POST)){
            if(empty($_POST['usuario']) || empty($_POST['clave'])){
                $alert = "Ingresa correo y contraseña";
            }else{
                require_once "../include/conexion.php";
                
                $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
                $clave = mysqli_real_escape_string($con, $_POST['clave']);

                $statement = "SELECT * FROM `usuario` WHERE correo='$usuario' AND Password='$clave'";
                $query = mysqli_query($con, $statement);
                $result = mysqli_num_rows($query);
                
                if($result > 0){
                    $datos = mysqli_fetch_array($query);
                    $_SESSION['active'] = true;
                    $_SESSION['id_usuario'] = $datos['id_usuario'];
                    $_SESSION['correo'] = $datos['correo'];
                    $_SESSION['Password'] = $datos['Password'];
                    $_SESSION['rol'] = $datos['rol'];
                    header('Location: admin/'); 
                } else{
                    $alert = "Datos incorrectos";
                    session_destroy();
                }

            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CAISE - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="" method="post" class="login100-form validate-form">
                    <span class="login100-form-title p-b-26">
                        Iniciar sesión
                    </span>
                    <span class="login100-form-title p-b-48">
                        <img src="img/caise-logo.png" style="width:100px;height:100px;" alt="Login">
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="usuario">
                        <span class="focus-input100" data-placeholder="Usuario"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="clave">
                        <span class="focus-input100" data-placeholder="Contraseña"></span>
                    </div>
                    <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
                    <!-- <input type="submit" value="INGRESAR"> -->
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                INGRESAR
                            </button>
                        </div>
                    </div>
                </form>
                <?php

                ?>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>