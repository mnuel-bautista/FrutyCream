/***
 * 
 * Este es el archivo que contiene todas las validaciones del formulario. 
 */

/**
 * Esta es una referencia a todo el formulario que se encuentra dentro del documento HTML. 
 */
const formulario = document.getElementById("formulario-usuario");

/**
 * Este código dentro de los corchetes, se ejecuta cada de que se presiona el botón de 'Guardar'.
 */
formulario.addEventListener('submit', e => {
    e.preventDefault();
    validarCampos();
    console.log("faskfañjs")
})

const inputs = document.querySelectorAll("input")


inputs.forEach(input => {
    input.addEventListener('change', ev => {
        /**Cada de que algun valor de los campos cambia se ejecuta este código para remover la clase de error */
        if (input.type === "radio") {
            input.parentElement.parentElement.classList.remove("error")
        } else {
            input.parentElement.classList.remove("error")
        }
    })
});

const select = document.querySelector("select")
select.addEventListener('change', e => {
    e.target.parentElement.classList.remove("error")
})

function validarCampos() {
    inputs.forEach(input => {
        /**Cada de que se presiona el botón de guardar, hay que remover la clase de error de los campos
         * para que no se presente el error y volver a validar los nuevos valores. 
         */
        input.parentElement.classList.remove("error")
    })

    let error;

    if (formulario.nombre.value.length === 0) {
        /***
         * Validamos el nombre, en caso de que no sea válido, le añadimos la clase de error al campo 
         * para que se apliquen los estilos correspondientes de css. 
         */
        error = formulario.nombre.parentElement.querySelector("small")
        error.innerHTML = "El nombre no debe estar vacio";

        formulario.nombre.parentElement.classList.add("error")
    }

    if (formulario.apellido.value.length === 0) {
        /***
         * Validamos el apellido, en caso de que no sea válido, le añadimos la clase de error al campo 
         * para que se apliquen los estilos correspondientes de css. 
         */
        error = formulario.apellido.parentElement.querySelector("small")

        error.innerHTML = "Los apellidos no deben estar vacios";

        formulario.apellido.parentElement.classList.add("error")
    }



    let formularioValido = true;

    /**
     * <input type="password" id="confirmar_contraseña">
     */
    const contraseña = formulario.contraseña;
    /***
     * <input type="password" id="confirmar_contraseña">
     */
    const confirmarContraseña = formulario.confirmar_contraseña;
    /**
     * 
     * <div class="campo-formulario">
                <label for="confirmar-contraseña">Confirmar contraseña</label>
                <input type="password" id="confirmar_contraseña">
                <small>Las contraseñas deben de ser iguales</small>
        </div>
     * El padre directo del elemento(input) que se guardo en la constante 'contraseña', es el div. 
        Para acceder al padre directo, usan parentElement. 
        A este div es al que le tienen que agregar la clase 'error'. 
     * 
     */
    const campoContraseña = contraseña.parentElement
        /**
        * 
        * <div class="campo-formulario">
                    <label for="confirmar-contraseña">Confirmar contraseña</label>
                    <input type="password" id="confirmar_contraseña">
                    <small>Las contraseñas deben de ser iguales</small>
            </div>
        * Lo mismo que el campo anterior
        * 
        */
    const campoConfirmarcontraseña = confirmarContraseña.parentElement


    if (contraseña.value !== confirmarContraseña.value) {

        /***
         * Validamos la contraseña, en caso de que no sea válida, le añadimos la clase de error al campo 
         * para que se apliquen los estilos correspondientes de css. 
         * 
         * En esta if, se valida que ambas contraseñas sean iguales 
         */

        error = campoContraseña.querySelector("small")
        error.innerHTML = "Las contraseñas deben ser iguales";
        error = campoConfirmarcontraseña.querySelector("small")
        error.innerHTML = "Las contraseñas deben ser iguales";

        campoContraseña.classList.add("error");
        campoConfirmarcontraseña.classList.add("error");
        formularioValido = false;
    } else {

        /***
         * Validación para comprobar que los campos de las contraseñas no estan vacíos. 
         */

        if (contraseña.value.length == 0) {
            error = campoContraseña.querySelector("small")
            error.innerHTML = "Ingresa una contraseña";

            campoContraseña.classList.add("error");
            formularioValido = false;
        }

        if (confirmarContraseña.value.length == 0) {

            error = campoConfirmarcontraseña.querySelector("small")
            error.innerHTML = "Ingresa una contraseña";

            campoConfirmarcontraseña.classList.add("error");
            formularioValido = false;
        }
    }

    const opcionUsuario = formulario.opcion_usuario;
    const opcionAdministrador = formulario.opcion_administrador;

    if ((!opcionUsuario.checked) && (!opcionAdministrador.checked)) {
        opcionUsuario.parentElement.parentElement.classList.add("error")
        formularioValido = false;
    }

    const telefono = formulario.telefono;
    const campoTelefono = telefono.parentElement;
    error = campoTelefono.querySelector("small");

    if (formulario.telefono.value.length == 0) {
        campoTelefono.classList.add("error");
        error.innerHTML = 'Debes de ingresar un número de télefono.';
        formularioValido = false;
    } else if (!(/^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{4})$/.test(formulario.telefono.value))) {
        error.innerHTML = 'Debes de ingresar un número de teléfono válido.';
        campoTelefono.classList.add("error");
        formularioValido = false;
    }

    if (formulario.sexo.value === "Seleccionar...") {
        formulario.sexo.parentElement.classList.add("error")
        formularioValido = false;
    }

    if (formularioValido) {
        alert("Usuario registrado");
    } else {
        //El focus regresa al primer campo que tenga un error. 
        const campoError = document.querySelector(".error");

        if (campoError.tagName === "select") {
            campoError.children[0].focus();
        } else {
            campoError.children[1].focus();
            console.log(document.querySelector(".error"));
        }
    }
}