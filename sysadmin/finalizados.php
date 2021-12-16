<?php include("includes/db.php");
$in = 5;
$suma_ventas = 0;
header("Refresh:30");
include("includes/header.php");  ?>
<div class="col-8 col-md-10 fullHeight bg_contenido position-relative" style="scrollbar-width: 750px;">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } ?>
    <div class="container contenedor_cuadro tabla__clientes">



        <div class="">
            <?php

            $query = "SELECT DISTINCT pedidos.id_pedido, pedidos.estatus,pedidos.notas,pedidos.id_dir,pedidos.id_cliente,pedidos.total,pedidos.fecha_finalizado FROM pedidos INNER JOIN productos_vendidos ON productos_vendidos.id_pedido = pedidos.id_pedido AND pedidos.estatus>5 ORDER BY pedidos.id_pedido DESC ";
            $result = mysqli_query($conn, $query);
            $filas = mysqli_num_rows($result);
            ?>

            <h4 class="">Pedidos finalizados: <?php echo $filas; ?></h4>
            <div class="col salto overflow-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Productos</th>
                            <th scope="col">Notas</th>
                            <th scope="col">Domicilio</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Total</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Finalizado</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <form action="#" method="">
                                <?php
                                while ($p = mysqli_fetch_array($result)) {
                                    $estatus = $p['estatus'];
                                    $dir = $p['id_dir'];
                                    echo '<td class="text-center">' . $p['id_pedido'] . '</td>';
                                    $idp = $p['id_pedido'];
                                    $idCliente = $p['id_cliente'];
                                    if ($p['estatus'] == 6) {
                                        $estatus = $p['estatus'];
                                    }
                                    $total = $p['total'];
                                    $fecha_fin = $p['fecha_finalizado'];

                                    $query2 = "SELECT productos_vendidos.id_producto, productos.id_item, productos_vendidos.cantidad, productos.titulo, pedidos.id_pedido,pedidos.notas,pedidos.id_dir FROM productos_vendidos INNER JOIN productos ON productos_vendidos.id_producto=productos.id_item INNER JOIN pedidos ON pedidos.id_pedido = productos_vendidos.id_pedido AND pedidos.estatus >5 AND pedidos.id_pedido = $idp";
                                    $res = mysqli_query($conn, $query2);
                                    echo '<td class="text-end">';
                                    while ($cp = mysqli_fetch_array($res)) {
                                        echo '<p>' . $cp['cantidad'] . '</p>';
                                    }
                                    echo '</td>';
                                    echo '<td>';
                                    $res = mysqli_query($conn, $query2);
                                    while ($cp = mysqli_fetch_array($res)) {
                                        echo '<p>' . $cp['titulo'] . '</p>';
                                    }
                                    echo '</td>';
                                    if (isset($p['notas']) and $p['notas'] != "") {
                                        echo '<td>' . $p['notas'] . '</td>';
                                    } else {
                                        echo '<td> Sin notas en el pedido</td>';
                                    }

                                    if (isset($p['id_dir'])) {

                                        //$dir = $p['id_dir'];
                                        $query3 = "SELECT * FROM direcciones WHERE id_dir=$dir";
                                        $qdir = mysqli_query($conn, $query3);
                                        while ($d = mysqli_fetch_array($qdir)) {

                                            if (isset($d['interior']) and $d['interior'] != "") {
                                                $direccion[$idp] = '<td>' . $d['calle'] . ', ' . $d['exterior'] . ', Int ' . $d['interior'] . ', ' . $d['colonia'] . ', ' . $d['municipio'] . ', CP: ' . $d['cp'] . '</td>';
                                            } else {
                                                $direccion[$idp] = '<td>' . $d['calle'] . ', ' . $d['exterior'] . ', ' . $d['colonia'] . ', ' . $d['municipio'] . ', CP: ' . $d['cp'] . '</td>';
                                            }
                                            echo $direccion[$idp];
                                        }
                                    } else {
                                        echo '<td> Para recolectar en sucursal</td>';
                                    }

                                ?>
                                    <td><?php
                                        $cli = "SELECT nombre, p_apellido FROM clientes WHERE idusuario=$idCliente";
                                        $respuestaCliente = mysqli_query($conn, $cli);
                                        $nameCliente = mysqli_fetch_array($respuestaCliente);
                                        echo $nameCliente['nombre'] . ' ' . $nameCliente['p_apellido'];
                                        ?></td>
                                    <td><?php
                                        if ($estatus == 6) {
                                            echo '$' . $total;
                                        } else {
                                            echo '<p style="color: red;">$' . $total . '</p>';
                                        }



                                        ?></td>
                                    <td>
                                        <?php
                                        if ($estatus == 6) {
                                            echo 'Completado';
                                        } else {
                                            echo '<p style="color: red;">Cancelado</p>';
                                        }
                                        ?>
                                    </td>
                                    <td>

                                        <?php echo $fecha_fin; ?>
                                        <!-- <button type="submit" class="btn-sm btn-success" name="pedido" value="<?php //echo $idp; 
                                                                                                                    ?>"></button> -->

                                    </td>
                        </tr>




                    <?php } ?>

                    </form>
                    </tbody>
                </table>
                <tr>
                    <h5>Total vendido: $<?php $querytotal = "SELECT total FROM pedidos WHERE estatus=6";
                                        $restotal = mysqli_query($conn, $querytotal);
                                        $ttotal=0;
                                        while($ntotal = mysqli_fetch_array($restotal)){
                                            $ttotal+=$ntotal['total'];
                                        }
                                        echo $ttotal; ?></h5>
                </tr>
            </div>

        </div>
        <div class="salto"></div>

    </div>
</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

</body>



</html>