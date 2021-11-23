<div class="container-sm">
    <h3 class="titulo_cuenta row_espacio">Editar perfil</h3>


    <div class="container-sm row_espacio">
        <form action="">
            <fieldset>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <h5 class="subtitulo_cuenta">Nombre(s):</h5>
                        <input type="text" id="" class="form-control" value="<?php echo $result1['nombre'] ?>">
                    </div>
                    <div class="mb-3 col-md-4">
                        <h5 class="subtitulo_cuenta">Primer apellido</h5>
                        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $result1['p_apellido'] ?>">
                    </div>
                    <div class="mb-3 col-md-4">
                        <h5 class="subtitulo_cuenta">Segundo apellido</h5>
                        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $result1['s_apellido'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Correo electrónico:</h5>

                        <input type="email" id="disabledTextInput" class="form-control" value="<?php echo $result1['correo'] ?>">
                    </div>
                    <div class="mb-3 col-md-6">

                        <h5 class="subtitulo_cuenta">Número celular:</h5>
                        <input type="text" id="disabledTextInput" class="form-control" value="+52<?php echo ' ' . $result1['telefono'] ?>">

                    </div>
                </div>
                <div class="row  row_espacio">
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Contraseña:</h5>
                        <input type="password" id="disabledTextInput" class="form-control" placeholder="*********">
                    </div>
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Confirmar contraseña:</h5>
                        <input type="password" id="disabledTextInput" class="form-control" placeholder="">
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-dark mb-3">Enviar</button>
            </fieldset>
        </form>
    </div>
</div>