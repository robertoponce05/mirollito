<div class="nav-item dropdown d-flex">
    <?php
    if (isset($_SESSION['car'])) {
        (int)$car = $_SESSION['car'];
    } else {
        (int)$car = 0;
        /*echo 'car='.$car;*/
    }
    if (isset($_SESSION['nombre'])) {

        if ($page != 7) { ?>
            <a href="/carrito.php" class="nav-link nav-item" style="margin-right: 10px;" id="shoppingItem">
                <div class="position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="6" cy="19" r="2" />
                        <circle cx="17" cy="19" r="2" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $car; ?></span>
                </div>
                
            </a><?php } ?>
        <a class="nav-item align-items-start" href="cuenta.php?pill=0">
            <img class="border border-dark rounded-circle" style="width: 45px; margin: 5px;" src="/img/user.png" alt="User">
        </a>
        <a class="nav-link dropdown-toggle" href="#" id="username" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        $nombre = $_SESSION['nombre'];
        echo $nombre;
    } else {
        echo '<span class="navbar-text"><a role="button" class="btn btn-outline-secondary" href="/login.php">Iniciar sesión</a></span>';
    } ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="Dropdown">
            <li><a class="dropdown-item" href="/cuenta.php?pill=0">Mi cuenta</a></li>
            <li><a class="dropdown-item" href="/cuenta.php?pill=1">Mis direcciones</a></li>
            <li><a class="dropdown-item" href="/cuenta.php?pill=2">Pedidos</a></li>
            <li><a class="dropdown-item" href="/cuenta.php?pill=3">Formas de pago</a></li>

            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/includes/logout.php">Cerrar sesión</a></li>
        </ul>

</div>