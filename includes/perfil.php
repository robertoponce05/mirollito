<div class="container-sm">
    <h3 class="titulo_cuenta row_espacio">Editar perfil</h3>


    <div class="container-sm row_espacio">
        <form action="/includes/actualizar.php" method="POST">
            <fieldset>
                <div class="row">
                    <div class="mb-3 col-md-4" >
                        <h5 class="subtitulo_cuenta">Nombre(s):</h5>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombres" required value="<?php echo $result1['nombre'] ?>">
                    </div>
                    <div class="mb-3 col-md-4">
                        <h5 class="subtitulo_cuenta">Primer apellido</h5>
                        <input type="text" name="pape" class="form-control" placeholder="Apellido Paterno" required value="<?php echo $result1['p_apellido'] ?>">
                    </div>
                    <div class="mb-3 col-md-4">
                        <h5 class="subtitulo_cuenta">Segundo apellido</h5>
                        <input type="text" name="sape" class="form-control" placeholder="Apellido Materno (opcional)" value="<?php echo $result1['s_apellido'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Correo electrónico:</h5>
                        <input type="email" name="mail" class="form-control" placeholder="correo electrónico" required value="<?php echo $result1['correo'] ?>">
                    </div>
                    <div class="mb-3 col-md-6">

                        <h5 class="subtitulo_cuenta">Número celular:</h5>
                        <input type="text" name="numero" class="form-control" placeholder="número celular" value="<?php echo $result1['telefono'] ?>">
                <input type="hidden" name="id" value="<?php echo $iduser;?>">
                    </div>
                </div>
                <div class="row  row_espacio">
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Contraseña:</h5>
                        
                    </div>
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Confirmar contraseña:</h5>
                        
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-dark mb-3">Enviar</button>
            </fieldset>
        </form>
    </div>
</div>