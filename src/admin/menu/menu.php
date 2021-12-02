<div class="header">
    <nav class="nav-bar">
        <h6>FrutyCream</h6>
        <ul>
            <li><a href="http://localhost/proyecto-pw/src/admin/Inicio.php" class="mdc-icon-button material-icons-outlined <?= $pagina == 'inicio' ? 'elemento-seleccionado' : ''; ?>">
                    <span>home</span>
                    <p class="s1">Inicio</p>
                </a></li>
            <li><a href="http://localhost/proyecto-pw/src/admin/ventas.php" class="mdc-icon-button material-icons-outlined <?= $pagina == 'ventas' ? 'elemento-seleccionado' : ''; ?>">
                    <span>shopping_bag</span>
                    <p class="s1">Ventas</p>
                </a></li>
            <li><a href="http://localhost/proyecto-pw/src/admin/productos/productos.php" class="mdc-icon-button material-icons-outlined <?= $pagina == 'productos' ? 'elemento-seleccionado' : ''; ?>">
                    <span>inventory_2</span>
                    <p class="s1">Productos</p>
                </a></li>
            <li><a href="http://localhost/proyecto-pw/src/admin/mensajes.php" class="mdc-icon-button material-icons-outlined <?= $pagina == 'mensajes' ? 'elemento-seleccionado' : ''; ?>">
                    <span>chat_bubble_outline</span>
                    <p class="s1">Mensajes</p>
                </a></li>
            <li><a href="Usuarios.php" class="mdc-icon-button material-icons-outlined <?= $pagina == 'usuarioss' ? 'elemento-seleccionado' : ''; ?>">
                    <span>person</span>
                    <p class="s1">Usuarios</p>
                </a></li>
        </ul>
    </nav>
</div>