<?php
$query_pedido = "SELECT productos.titulo, productos_vendidos.cantidad FROM productos_vendidos INNER JOIN productos ON productos.id_item = productos_vendidos.id_producto AND productos_vendidos.id_pedido = $idp";
$listado_productos = mysqli_query($conn, $query_pedido);

$escribe = "";
?>

<div class="card" style="width: 14rem; margin-top:10px; background-color: #fff3cd">
    <div class="card-body">
        <h5 class="card-title">Pedido <?php echo $idp; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Pedido de <?php echo $res1['nombre'] . ' ' . $res1['p_apellido'] ?></h6>
        <p class="card-text">
            <?php while ($row_pedido = mysqli_fetch_array($listado_productos)) {
                $escribe = $escribe . $row_pedido['cantidad'] . ' ' . $row_pedido['titulo'] . ', ';
            }
            $escribe = substr($escribe, 0, -2);
            echo $escribe;

            ?>

        </p>
        <form action="includes/procesar_pedido.php" method="post">
            <input type="hidden" name="estatus" value="<?php echo $estatus ?>">
            <button type="submit" name="cancelar" value="<?php echo $idp ?>" class="btn btn-outline-secondary btn-sm">Cancelar</button>
            <?php if ($estatus == 5) {
                echo '<button type="submit" name="pedido" value="'.$idp.'" class="btn btn-outline-success btn-sm">Finalizar!</button>';
            } elseif ($estatus == 4) {
                echo '<button type="submit" name="pedido" value="'.$idp.'" class="btn btn-outline-success btn-sm">Enviar!</button>';
            } elseif ($estatus == 3) {
                echo '<button type="submit" name="pedido" value="'.$idp.'" class="btn btn-outline-success btn-sm">Preparado!</button>';
            } else { ?>
                <button type="submit" name="pedido" value="<?php echo $idp ?>" class="btn btn-outline-success btn-sm">Preparar!</button>
            <?php } ?>
        </form>
    </div>
</div>