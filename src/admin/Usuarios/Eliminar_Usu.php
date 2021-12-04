<?php include("../conexion/conexion.php"); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<title>Eliminar usuarios</title>

<?php
$id = $_GET['id'];
$eliminar = "DELETE FROM usuarios WHERE id = $id"; ?>
<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

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
            <?php $resultado = mysqli_query($conexion, $eliminar); ?>
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
</script>