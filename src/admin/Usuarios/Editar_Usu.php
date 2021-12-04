<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Usuarios.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="shortcut icon" href="../../img/icon1.ico"/>
   <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Edit users</title>
    <?php include("../conexion/conexion.php"); ?>
</head>

<body>
    <!-- This div contains all the web page-->
    <div class="contenedor">
        <!-- Form to edit an user -->
        <!-- Each input represents a type of information that can be entered, such as name, lastname, etc...-->
        <form action="" id="formulario-usuario" method="post" onsubmit="return validarCampos();">
            <h4>Edit user</h4>
            <input name="id" type="hidden" value="<?= $_GET['id']?>">
            <div class="nombre-completo">
                <div class="campo-formulario">
                    <label for="nombre">Name</label>
                    <input type="text" name="nombre_Usu" id="nombre" onkeyup="javascript:this.value = this.value.toUpperCase(); ">
                    <small>The name must not be empty.</small>
                </div>
                <div class="campo-formulario apellidos">
                    <label for="apellido">Last Name</label>
                    <input type="text" name="apellido_Usu"id="apellido" onkeyup="javascript:this.value = this.value.toUpperCase();">
                    <small>The lastname must not be empty.</small>
                </div>
            </div>
            <div class="campo-formulario">
                <label for="contraseña">Password</label>
                <input type="password" name="contra_Usu" id="contraseña">
                <small>Passwords must be the same.</small>
            </div>
            <div class="campo-formulario">
                <label for="confirmar-contraseña">Confirmar contraseña</label>
                <input type="password" name="confirm_Usu" id="confirmar_contraseña">
                <small>Passwords must be the same.</small>
            </div>
            <div class="campo-formulario">
                <label for="telefono">Phone number</label>
                <input type="tel" name="tel_Usu" id="telefono">
                <small>The phone must not contain letters.</small>
            </div>
            <div class="campo-formulario">
                <label for="sexo">Select your gender</label>
                <select name="lst_sexo" id="sexo">
                    <option>Select...</option>
                    <option>Woman</option>
                    <option>Man</option>
                </select>
                <small>Choose an option.</small>
            </div>
            <input type="submit" name="btn_guardar" id="submit" value="Guardar">
            <?php
               
               if(isset($_POST["nombre_Usu"]) && isset($_POST["apellido_Usu"]) && isset($_POST["contra_Usu"]) && isset($_POST["tel_Usu"]) && isset($_POST["lst_sexo"])){
                    //obtener las variables
                        $id = $_POST['id'];
                        $nombre = $_POST['nombre_Usu'];
                        $apellidos = $_POST['apellido_Usu'];
                        $pass = $_POST['contra_Usu'];
                        $telefono = $_POST['tel_Usu'];
                        $genero = $_POST['lst_sexo'];

                        $campos = "nombre_Usu = '$nombre'";
                        $campos .= ", apellido_Usu = '$apellidos'";
                        $campos .= ", contra_Usu = '$pass'";
                        $campos .= ", tel_Usu = $telefono";
                        $campos .= ", lst_sexo = '$genero'";

                        $where = "id = $id";

                        $cons = update('usuarios', $campos, $where);

                      if ($cons) {
                          ?>
                        <script>swal("All set up!", "The data has been edited correctly!", "success");</script>
                    <?php
                } else {
                    ?>
                        <script>swal("Oops...", "Changes could not be made.", "error");</script>
              <?php }
                   
            }
            ?>
        </form>
    </div>
    <script src="../../js/validaciones.js"></script>
    <!--JS para ventanas de alerta-->
    
</body>

</html>