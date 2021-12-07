<?php
include('../includes/db.php');
include("../includes/header.php");
if (isset($_SESSION['list'])) {
    $lista = array();
    $lista = $_SESSION['list'];
} else {
    header("location:/");
}
?>
<div class="container-sm div_tama row_espacio">
    <?php include('includes/resumen.php'); ?>
    <div class="container row_espacio carrito_div">
    <form action="includes/generate.php" method="POST">
        <div class="row">

            
                <div class="col-sm-12 col-md-6">
                    <h4>Agrega notas al pedido</h4>
                    <textarea name="notas" id="notas" cols="30" rows="3"></textarea>
                </div>
                <div class="col-sm-12 col-md-6">
                    <h4>Selecciona tu método de pago</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="check-metodo" id="efectivo1" value="efectivo">
                        <label class="form-check-label" for="efectivo1">
                            Efectivo
                        </label>
                    </div>
                    
                        <?php include('includes/listar_tarjetas.php')?>
                    

                </div>
                <?php include('includes/listar_direcciones.php'); ?>
        </div>
        <div class="row row_espacio justify-content-center">
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-secundary" href="/carrito.php">Regresar</a>

                </div>
            </div>
            <div class="col-4">
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-outline-success" value="Continuar">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>