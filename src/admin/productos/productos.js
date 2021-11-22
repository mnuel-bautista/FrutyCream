
function editarProducto(idProducto) {
    location.href = `http://localhost/proyecto-pw/src/admin/productos/editar.php?id=${idProducto}`
}

function eliminarProducto(idProducto) {
    location.href = `http://localhost/proyecto-pw/src/admin/productos/eliminar.php?id=${idProducto}`
}