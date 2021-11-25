<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Usuarios.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="shortcut icon" href="../../img/icon1.ico"/>
    <title>Registrar usuarios</title>
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
        <form action="" id="formulario-usuario" method="post">
            <h4>Registrar Usuario</h4>
            <div class="nombre-completo">
                <div class="campo-formulario">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" onkeyup="javascript:this.value = this.value.toUpperCase(); ">
                    <small>El nombre no debe de estar vacío</small>
                </div>
                <div class="campo-formulario apellidos">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" onkeyup="javascript:this.value = this.value.toUpperCase();">
                    <small>Los apellidos no deben de estar vacíos</small>
                </div>
            </div>
            <div class="campo-formulario">
                <label for="contraseña">Contraseña</label>
                <input type="password" id="contraseña">
                <small>Las contraseñas deben de ser iguales</small>
            </div>
            <div class="campo-formulario">
                <label for="confirmar-contraseña">Confirmar contraseña</label>
                <input type="password" id="confirmar_contraseña">
                <small>Las contraseñas deben de ser iguales</small>
            </div>
            <div class="campo-formulario">
                <label for="telefono">Número de teléfono</label>
                <input type="tel" id="telefono">
                <small>El teléfono no debe contener letras</small>
            </div>
            <div class="campo-formulario">
                <label for="sexo">Selecciona el género</label>
                <select name="sexo" id="sexo">
                    <option>Seleccionar...</option>
                    <option>Mujer</option>
                    <option>Hombre</option>
                </select>
                <small>Elige una opción</small>
            </div>
            <div class="campo-formulario">
                <div class="tipo-usuario">
                    <input type="radio" id="opcion_administrador" name="tipo_usuario" value="Admnistrador">
                    <div>
                        <label for="opcion-admnistrador">Admnistrador</label>
                        <p>Puede acceder a todas las opciones del sistema.</p>
                    </div>
                </div>
                <div class="tipo-usuario">
                    <input type="radio" id="opcion_usuario" name="tipo_usuario" value="Usuario">
                    <div>
                        <label for="opcion-usuarios">Usuario</label>
                        <p>El acceso a algunas de las operaciones esta restringido.</p>
                    </div>
                </div>
                <small id="tipo-usuario-error">Selecciona el tipo de usuario</small>
            </div>
            <input type="submit" id="submit" value="Guardar">
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
</body>

</html>