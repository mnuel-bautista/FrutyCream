function editarProducto(idProducto) {
    location.href = `productos/editar.php?id=${idProducto}`
}

function eliminarProducto(idProducto) {
    location.href = `productos/eliminar.php?id=${idProducto}`
}

function confirmarEliminacion() {
    return confirm('¿Esta seguro de eliminar el producto?');
}