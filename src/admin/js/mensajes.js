const botones = Array.from(document.querySelectorAll('#form-eliminar'));
botones.forEach(btn => {
    btn.addEventListener('submit', e => {
        e.preventDefault();
        confirmarEliminacion();
    });
})

function confirmarEliminacion() {
    console.log('fasdfa');
    swal({
            title: "Are you sure you want to delete this message?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.querySelector('#form-eliminar').submit();
                return true;
            } else {
                return false;
            }
        });
}