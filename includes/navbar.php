<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #681212;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-fluit logo_sushi" alt="Logo">Mi rollito
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if($page==1){ 

                
                echo '<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>';
                }
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menú</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#ubi">Ubicación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>';
                ?>
            </ul>
            <?php
            if ($ini==2){
                echo '<span class="navbar-text"><a role="button" class="btn btn-outline-secondary" href="login.php">Iniciar sesión</a></span>';
            }else if ($ini==3){
                include('navbar_ini.php');
            }
            ?>
        </div>
    </div>
</nav>
