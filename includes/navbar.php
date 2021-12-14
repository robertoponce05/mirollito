<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #681212;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index.php"><img src="/img/logo.png" class="img-fluit logo_sushi" alt="Logo">Mi rollito
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if ($page == 1) {
                    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/index.php">Inicio</a></li>';
                } else {
                    echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="/index.php">Inicio</a></li>';
                }
                ?>
                <?php
                if ($page == 2) {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link active" href="/menu.php?pill=0">Menú</a>
                    </li>';
                } else {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="/menu.php?pill=0">Menú</a>
                    </li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php#ubi">Ubicación</a>
                </li>
                <?php
                if ($page == 3) {
                    echo '
                <li class="nav-item">
                    <a class="nav-link active" href="/nosotros.php">Nosotros</a>
                </li>';
                } else {
                    echo '
                <li class="nav-item">
                    <a class="nav-link" href="/nosotros.php">Nosotros</a>
                </li>';
                } ?>

            </ul>

            <?php
            if (isset($_SESSION['nombre'])) {
                $nombre = $_SESSION['nombre'];
                include('navbar_ini.php');
            } else {
                echo '<span class="navbar-text"><a role="button" class="btn btn-outline-secondary" href="login.php">Iniciar sesión</a></span>';
            }




            ?>
        </div>
    </div>
</nav>