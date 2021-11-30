<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu-inicio.css">
    <link rel="stylesheet" href="css/contacto.css">

    <title>Document</title>
</head>

<body>
    <nav>
        <div class="logo">
            <p>La michoacana</p>
        </div>
        <span class="material-icons-outlined nav-toggle">
            menu
        </span>
        <ul class="menu-navegacion">
            <li><a href="index.php" class="active">Inicio</a></li>
            <li><a href="Nosotros.html">Nosotros</a></li>
            <li><a href="Contacto.html">Contacto</a></li>
            <li class="boton-cerrar"><a href="">Cerrar</a></li>
        </ul>
    </nav>
    <section class="contenedor">
        <div class="titulo">
            <h2>Contactanos</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia aperiam veritatis impedit enim! Expedita neque temporibus dolorum sunt minima. Ex unde dignissimos architecto aspernatur obcaecati vero eveniet autem labore neque?/p>
        </div>
        <div class="contenido">
            <div class="contacto">
                <div class="contacto-info">
                    <span class="material-icons-outlined icono">
                        location_on
                    </span>
                    <div class="info">
                        <h3>Dirección</h3>
                        <p>Morelos #10, Maravatio</p>
                    </div>
                </div>
                <div class="contacto-info">
                    <span class="material-icons-outlined icono">
                        email
                    </span>
                    <div class="info">
                        <h3>Correo electrónico</h3>
                        <p>garcia.manuel.b7@gmail.com</p>
                    </div>
                </div>
                <div class="contacto-info">
                    <span class="material-icons-outlined icono">
                        call
                    </span>
                    <div class="info">
                        <h3>Teléfono</h3>
                        <p>447 100 0072</p>
                    </div>
                </div>


            </div>
            <div class="formulario-de-contacto">
                <form action="" class="modal-content">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="text" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <input type="text" id="mensaje" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>


    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>