<div class="container-sm">
    <div class="row">
        <div class="col-9">
            <h3 class="titulo_cuenta row_espacio">Direcciones</h3>
        </div>
        <div class="col-3 row_espacio d-flex"><a type="button" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#NuevaDireccion"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg></a>
        </div>
        <div class="row">


            <?php
            $queryDir = "SELECT DISTINCT * FROM direcciones WHERE idusuario = $iduser and habilitar = 1 ORDER BY id_dir DESC;";
            $resDir = mysqli_query($conn, $queryDir);
            $filasDir = mysqli_num_rows($resDir);
            if ($filasDir > 0) {
                while ($row = mysqli_fetch_array($resDir)) {
                    include('includes/showDir.php');
                    include('includes/edit_dir.php');
                }
            } else {
            ?>
                <div class="col-9">
                    <h3 class="titulo_cuenta row_espacio">No hay direcciones para mostrar</h3>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row row_espacio">




    </div>


</div>