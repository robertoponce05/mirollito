<?php include("includes/db.php");
$in = 2;
header("Refresh:30");
include("includes/header.php");  ?>
<div class="col-8 col-md-10 lateral bg_contenido position-relative overflow-auto" style="scrollbar-width: none;">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } ?>
    <div class="container salto ">



        <div class="">
            <?php

            $query = "SELECT DISTINCT pedidos.id_pedido, pedidos.estatus,pedidos.notas,pedidos.id_dir,pedidos.fecha_pedido FROM pedidos INNER JOIN productos_vendidos ON productos_vendidos.id_pedido = pedidos.id_pedido AND pedidos.estatus=1";
            $result = mysqli_query($conn, $query);
            $filas = mysqli_num_rows($result);
            ?>

            <h4 class="">Pedidos entrantes: <?php echo $filas; ?></h4>
            <div class="col salto overflow-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha y hora</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Productos</th>
                            <th scope="col">Notas</th>
                            <th scope="col">Domicilio</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <form action="includes/procesar_pedido.php" method="post">
                                <?php
                                while ($p = mysqli_fetch_array($result)) {
                                    $estatus = $p['estatus'];
                                    $dir = $p['id_dir'];
                                    echo '<td>' . $p['id_pedido'] . '</td>';
                                    echo '<td>' . $p['fecha_pedido'] . '</td>';
                                    $idp = $p['id_pedido'];

                                    $query2 = "SELECT productos_vendidos.id_producto, productos.id_item, productos_vendidos.cantidad, productos.titulo, pedidos.id_pedido,pedidos.notas,pedidos.id_dir FROM productos_vendidos INNER JOIN productos ON productos_vendidos.id_producto=productos.id_item INNER JOIN pedidos ON pedidos.id_pedido = productos_vendidos.id_pedido AND pedidos.estatus =1 AND pedidos.id_pedido = $idp";
                                    $res = mysqli_query($conn, $query2);
                                    echo '<td class="text-center">';
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
                                    <td>
                                        <input type="hidden" name="estatus" value="<?php echo $estatus; ?>">

                                        <button type="submit" class="btn-sm btn-success" name="pedido" value="<?php echo $idp; ?>">Aceptar</button>

                                    </td>
                        </tr>



                    <?php } ?>
                    </form>
                    </tbody>
                </table>

            </div>
            <h4 class="salto">Pedidos en curso</h4>
            <div class="overflow-auto salto">
                <table class="table table-hover" style="background-color: #aad1a0; min-height: 200px">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 14rem;">Aceptados</th>
                            <th scope="col">En preparación</th>
                            <th scope="col">Por enviar</th>
                            <th scope="col">Enviado/Puesto en ventanilla</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            for ($i = 2; $i < 7; $i++) {
                                $query = "SELECT DISTINCT id_pedido FROM pedidos WHERE estatus=$i" . "<br>";
                                //echo $query;

                            ?>

                                <?php
                                $query1 = "SELECT DISTINCT pedidos.estatus, pedidos.id_cliente, pedidos.id_pedido,  
                                    clientes.nombre, clientes.p_apellido 
                                    FROM pedidos INNER JOIN productos_vendidos ON pedidos.id_pedido = productos_vendidos.id_pedido 
                                    INNER JOIN clientes ON clientes.idusuario = pedidos.id_cliente 
                                    INNER JOIN productos ON productos.id_item = productos_vendidos.id_producto AND pedidos.estatus = $i";
                                $res = mysqli_query($conn, $query1);
                                $filas = mysqli_num_rows($res);

                                if ($i == 2 && $filas > 0) {
                                    echo '<th>';
                                    while ($res1 = mysqli_fetch_array($res)) {
                                        $estatus = $res1['estatus'];
                                        $idp = $res1['id_pedido'];
                                        include('includes/card_pedido.php');
                                    }
                                } elseif ($i == 2 && $filas == 0) {
                                    echo '<th>';
                                    echo '</th>';
                                }

                                ?>


                            <?php
                                if ($i == 3 && $filas > 0) {
                                    echo '</th>';
                                    echo '<th>';

                                    while ($res1 = mysqli_fetch_array($res)) {
                                        $estatus = $res1['estatus'];
                                        $idp = $res1['id_pedido'];
                                        include('includes/card_pedido.php');
                                    }
                                } elseif ($i == 3 && $filas == 0) {
                                    echo '<th>';
                                    echo '</th>';
                                }
                                if ($i == 4 && $filas > 0) {
                                    echo '</th>';
                                    echo '<th>';
                                    while ($res1 = mysqli_fetch_array($res)) {
                                        $estatus = $res1['estatus'];
                                        $idp = $res1['id_pedido'];
                                        include('includes/card_pedido.php');
                                    }
                                } elseif ($i == 4 && $filas == 0) {
                                    echo '<th>';
                                    echo '</th>';
                                }
                                if ($i == 5 && $filas > 0) {
                                    echo '</th>';
                                    echo '<th>';
                                    while ($res1 = mysqli_fetch_array($res)) {
                                        $estatus = $res1['estatus'];
                                        $idp = $res1['id_pedido'];
                                        include('includes/card_pedido.php');
                                    }
                                } elseif ($i == 5 && $filas == 0) {
                                    echo '<th>';
                                    echo '</th>';
                                }
                            }
                            echo '</th>'; ?>
                        </tr>
                    </tbody>
                </table>
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