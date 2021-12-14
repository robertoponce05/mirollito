<div class="col-md-6 row_espacio">
    <div class="card">
        <div class="card-body">

            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['alias']; ?></h6>
            <p class="card-text"><?php echo $row['calle'] . ' ' . $row['exterior'] . ' ' . $row['interior'] . ', ' . $row['colonia'] . ', ' . $row['municipio'] . ', CP: ' . $row['cp']; ?></p>
            <a class="card-link" data-bs-toggle="modal" data-bs-target="#EditaDireccion<?php echo $row['id_dir']; ?>">Editar</a>

        </div>
    </div>
</div>