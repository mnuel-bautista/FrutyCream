/***
 * 
 * This is the file that contains all the validations for the form.
 */

/**
 * This is a reference to the entire form within the HTML document.
 */
const formulario = document.getElementById("formulario-usuario");

/**
 * This code inside the brackets is executed every time the 'Save' button is pressed.
 */

const inputs = document.querySelectorAll("input")


inputs.forEach(input => {
    input.addEventListener('change', ev => {
        /**Every time any value of the fields changes, this code is executed to remove the error class */
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
        /**Every time the save button is pressed, the error class must be removed from the fields
          * so that the error does not appear and revalidate the new values.
         */
        input.parentElement.classList.remove("error")
    })

    let error;

    if (formulario.nombre.value.length === 0) {
        /***
         * We validate the name, in case it is not valid, we add the error class to the field
          * so that the corresponding css styles are applied.
         */
        error = formulario.nombre.parentElement.querySelector("small")
        error.innerHTML = "El nombre no debe estar vacio";

        formulario.nombre.parentElement.classList.add("error")
    }

    if (formulario.apellido.value.length === 0) {
        /***
         * We validate the surname, in case it is not valid, we add the error class to the field
          * so that the corresponding css styles are applied.
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
     * The direct parent of the element (input) that was stored in the constant 'password', is the div.
         To access the direct parent, they use parentElement.
         This div is the one to which they have to add the class 'error'. 
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
        * The same as the previous field
        * 
        */
    const campoConfirmarcontraseña = confirmarContraseña.parentElement


    if (contraseña.value !== confirmarContraseña.value) {

        /***
         * We validate the password, in case it is not valid, we add the error class to the field
          * so that the corresponding css styles are applied.
          *
          * In this if, it is validated that both passwords are the same
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
         * Validation to check that the password fields are not empty.
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

   // const opcionUsuario = formulario.opcion_usuario;
   // const opcionAdministrador = formulario.opcion_administrador;

   // if ((!opcionUsuario.checked) && (!opcionAdministrador.checked)) {
   //     opcionUsuario.parentElement.parentElement.classList.add("error")
   //     formularioValido = false;
   // }

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
        return true;
    } else {
        //The focus returns to the first field that has an error.
        const campoError = document.querySelector(".error");

        if (campoError.tagName === "select") {
            campoError.children[0].focus();
        } else {
            campoError.children[1].focus();
            console.log(document.querySelector(".error"));
        }

        return false;
    }
}