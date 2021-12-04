<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu-inicio.css">
    <link rel="stylesheet" href="css/contacto.css">

    <title>Contacto</title>
</head>

<body>
    <?php include('php/menu.php') ?>
    <section class="contenedor">
        <div class="titulo">
            <h2>Contactanos</h2>
            <p>¿Tienes alguna pregunta? Nos encantaría ayudarte.</p>
        </div>
        <div class="contacto">
            <div class="contacto-info">
                <span class="material-icons-outlined icono">
                    location_on
                </span>
                <h4>Dirección</h4>
                <p>Morelos #10, Maravatio</p>
            </div>
            <div class="contacto-info">
                <span class="material-icons-outlined icono">
                    email
                </span>
                <h4>Correo electrónico</h4>
                <p>garcia.manuel.b7@gmail.com</p>
            </div>
            <div class="contacto-info">
                <span class="material-icons-outlined icono">
                    call
                </span>
                <h4>Teléfono</h4>
                <p>447 100 0072</p>
            </div>

        </div>
        <div class="formulario-de-contacto">
            <form action="php/enviar_mensaje.php" class="modal-content" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input name="nombre" type="text" id="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input name="email" type="text" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>
    <?php include("footer.php")?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="js/menu.js"></script>
</html>