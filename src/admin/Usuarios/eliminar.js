function eliminar(id){
    
}


function alertarEliminacion(id){
    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '¡Sí, borralo!',
        cancelButtonText: '¡No, cancela!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            if ($resultado) {
                swalWithBootstrapButtons.fire(
                    '¡Eliminado!',
                    'El usuario ha sido eliminado.',
                    'success'
                )
            }
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Operación cancelada',
                'El registro no se ha borrado :)',
                'error'
            )
        }
    })
        
}