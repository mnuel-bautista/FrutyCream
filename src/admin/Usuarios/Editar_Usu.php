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
    <title>Editar usuarios</title>
    <?php include("../conexion/conexion.php"); ?>
</head>

<body>
    <!-- Este div contiene toda la página-->
    <div class="contenedor">
        <!-- El menu principal de toda la página-->
        <div class="header">
            <ul class="menu">
                <li><a href="#">Productos</a></li>
                <li><a href="#">Ventas</a></li>
                <li><a href="#">Promociones</a></li>
                <li class="seleccionado"><a href="#">Usuarios</a></li>
            </ul>
        </div>
        <!-- Formulario para ingresar los datos de los nuevos usuarios -->
        <!-- Cada input representa algún tipo de información que se puede ingresar, como nombre, apellidos, etc..-->
        <form action="" id="formulario-usuario" method="post" onsubmit="return validarCampos();">
            <h4>Editar usuario</h4>
            <div class="nombre-completo">
                <div class="campo-formulario">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre_Usu" id="nombre" onkeyup="javascript:this.value = this.value.toUpperCase(); ">
                    <small>El nombre no debe de estar vacío</small>
                </div>
                <div class="campo-formulario apellidos">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido_Usu"id="apellido" onkeyup="javascript:this.value = this.value.toUpperCase();">
                    <small>Los apellidos no deben de estar vacíos</small>
                </div>
            </div>
            <div class="campo-formulario">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contra_Usu" id="contraseña">
                <small>Las contraseñas deben de ser iguales</small>
            </div>
            <div class="campo-formulario">
                <label for="confirmar-contraseña">Confirmar contraseña</label>
                <input type="password" name="confirm_Usu" id="confirmar_contraseña">
                <small>Las contraseñas deben de ser iguales</small>
            </div>
            <div class="campo-formulario">
                <label for="telefono">Número de teléfono</label>
                <input type="tel" name="tel_Usu" id="telefono">
                <small>El teléfono no debe contener letras</small>
            </div>
            <div class="campo-formulario">
                <label for="sexo">Selecciona el género</label>
                <select name="lst_sexo" id="sexo">
                    <option>Seleccionar...</option>
                    <option>Mujer</option>
                    <option>Hombre</option>
                </select>
                <small>Elige una opción</small>
            </div>
            <input type="submit" name="btn_guardar" id="submit" value="Guardar">
            <?php
               
               if(isset($_POST["nombre_Usu"]) && isset($_POST["apellido_Usu"]) && isset($_POST["contra_Usu"]) && isset($_POST["tel_Usu"]) && isset($_POST["lst_sexo"])){
                    //obtener las variables
                        $id = $_POST['txt_id'];
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
                        <script>swal("¡Todo listo!", "¡Se han editado correctamente los datos!", "success");</script>
                    <?php
                } else {
                    ?>
                        <script>swal("Oops...", "No se pudieron efectuar los cambios.", "error");</script>
              <?php }
                   
            }
            ?>
        </form>
        
        <div class="footer">
            <h5>Página Web para una paleteria</h5>
            <h5>Integrantes</h5>
            <ul>
                <li>Juan Carlos Zendejas Martinez</li>
                <li>Alondra Méndez Carmona</li>
                <li>Juan Manuel Bautista Garcia</li>
            </ul>
        </div>
    </div>
    <script src="../../js/validaciones.js"></script>
    <!--JS para ventanas de alerta-->
    
</body>

</html>