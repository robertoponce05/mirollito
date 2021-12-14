<?php
$idususario = $_SESSION['idusuario'];
$query = "SELECT * FROM pedidos WHERE id_cliente=$idususario";
$query2 = "SELECT productos_vendidos.id_producto, productos_vendidos.cantidad, productos_vendidos.id_pedido, productos.titulo, productos.precio FROM productos_vendidos INNER JOIN productos ON productos_vendidos.id_producto=productos.id_item";
$result_pedidos = mysqli_query($conn, $query);
//header("Refresh:30");
//echo $query;

?>

<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h4 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="btn col-12 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                <h2>Pedidos en curso</h2>
            </button>
        </h4>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne" style="background-color: #E3E3E3;">
            <div class="accordion-body">
                <!--Seguimiento-->
                <?php
                if ($nfilas = mysqli_num_rows($result_pedidos) > 0) {


                    while ($row = mysqli_fetch_array($result_pedidos)) {
                        if ((int)$row['estatus'] > 0 and (int)$row['estatus'] < 6) {
                ?>
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col">
                                    <div class="row" style="padding: 15px;">
                                        <div class="col-8">
                                            <h4 class="">
                                                Pedido #<?php echo $row['id_pedido']; ?>: <?php if (isset($row['id_dir'])) {
                                                                                                echo 'Pedido a domicilio';
                                                                                                $recolectar=0;
                                                                                            } else {
                                                                                                echo 'Pedido para recoger en sucursal';
                                                                                                $recolectar=1;
                                                                                            } ?>
                                            </h4>
                                        </div>
                                        <div class="col-8">
                                            <p><?php echo ' ' . substr($row['fecha_pedido'], 8, 2) . '/' . substr($row['fecha_pedido'], 5, 2) . '/' . substr($row['fecha_pedido'], 2, 2) . ' a las ' . substr($row['fecha_pedido'], 11, 5) . ' horas'; ?></p>
                                        </div>
                                        <?php
                                        $lista_pedido = mysqli_query($conn, $query2);
                                        while ($row2 = mysqli_fetch_array($lista_pedido)) {
                                            if ($row2['id_pedido'] == $row['id_pedido']) {
                                        ?>
                                                <div class="col-8 text-center">
                                                    <?php echo $row2['cantidad'] . ' ' . $row2['titulo'];
                                                    $pedido = $row2['id_pedido']; ?>
                                                </div>
                                                <div class="col-4">
                                                    <?php echo '$' . $row2['precio'] ?>
                                                </div>


                                        <?php }
                                        } ?>
                                        <div class="col-8 text-center">
                                            Total
                                        </div>
                                        <div class="col-4">
                                            <?php echo '$' . $row['total']; ?>
                                        </div>
                                    </div>
                                    <div class="row row_espacio">
                                        <div class="col-sm-12 col-md-6 d-inline-flex text-end">
                                            <h5 class="">Estado: </h5>
                                            <p style="margin-left: 5px;">
                                                <?php
                                                $querys = "SELECT status_ventas.status, status_ventas.id_status FROM pedidos INNER JOIN status_ventas ON pedidos.estatus = status_ventas.id_status AND pedidos.id_pedido = $pedido";
                                                $result_estado = mysqli_query($conn, $querys);
                                                $row4 = mysqli_fetch_array($result_estado);
                                                echo $row4['status'];
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-sm-12 col-md-6 d-inline-flex">
                                            <h5>Detalle: </h5>
                                            <p style="margin-left: 5px;">
                                                <?php
                                                if (isset($row['notas'])) {
                                                    echo  $row['notas'];
                                                } else {
                                                    echo 'No hay notas para el pedido';
                                                }
                                                if ($row['id_dir'] != "" and isset($row['id_dir'])) {
                                                    $querys = "SELECT * FROM direcciones INNER JOIN pedidos ON pedidos.id_dir = direcciones.id_dir AND pedidos.id_pedido = $pedido";
                                                    $result_estado = mysqli_query($conn, $querys);
                                                    $row5 = mysqli_fetch_array($result_estado); ?>
                                                    <br>
                                                    <?php echo 'Dirección de envío: ' . $row5['calle'] . ' ' . $row5['exterior'] . ' ' . $row5['interior'] . ', ' . $row5['colonia'] . ', CP: ' . $row5['cp'] . ' '; ?>

                                                <?php } else {
                                                }
                                                echo '</p>'; ?>
                                        </div>
                                        <?php 
                                        if($row4['id_status']==1){
                                            $progre=10;
                                            $text='Pedido generado';
                                        }elseif($row4['id_status']==2){
                                            $progre=25;
                                            $text='Hemos aceptado tu pedido';
                                        }elseif($row4['id_status']==3){
                                            $progre=60;
                                            $text='Comenzamos a preparar tu pedido';
                                        }elseif($row4['id_status']==4 and $recolectar==1){
                                            $progre=80;
                                            $text='Listo. Te esperamos en sucursal para entregarte tu pedido.';
                                        }elseif($row4['id_status']==4){
                                            $progre=80;
                                            $text='Terminamos de preparar tu pedido';
                                        }elseif($row4['id_status']==5){
                                            $progre=90;
                                            $text='Hemos enviado tu pedido';
                                        }
                                        
                                        ?>
                                        <div class="col-12" >
                                            <!--svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="9" />
                                                <path d="M9 12l2 2l4 -4" />
                                            </svg--><h5><?php echo $text;?></h5>
                                        </div>
                                        
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-info progress-bar-animated " role="progressbar" style="width: <?php echo $progre;?>%" aria-valuenow="<?php echo $progre;?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                <?php

                        }
                    }
                }else{
                    echo '<h4>No hay pedidos en curso</h4>';
                }
                ?>

            </div>
        </div>
        <div class="accordion-item">
            <h4 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="btn col-12 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <h2>Pedidos anteriores</h2>
                </button>
            </h4>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo" style="background-color: #E3E3E3;">
                <div class="accordion-body">

                    <!--Historico-->
                    <?php

                    $query2 = "SELECT * FROM pedidos WHERE id_cliente=$idususario AND (estatus>5 && estatus<8)";
                    $result_pedidos1 = mysqli_query($conn, $query2);
                    $filas = mysqli_num_rows($result_pedidos1);
                    ?>
                    <h3 class="titulo_cuenta row_espacio">Histórico de pedidos: <?php echo $filas ?></h3>

                    <div class="contenedor_tabla">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha de pedido</th>
                                    <th scope="col">Detalles</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result_pedidos1)) { 
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id_pedido'];  ?></th>
                                        <?php if($row['estatus']==6){
                                            $edo = 'Finalizado';
                                        }elseif($row['estatus']==7){
                                            $edo = 'Cancelado';
                                        } ?>
                                        <th scope="row"><?php echo $edo; ?></th>
                                        <td>
                                            <p>
                                                <?php
                                                
                                                echo ' ' . substr($row['fecha_finalizado'], 8, 2) . '/' . substr($row['fecha_finalizado'], 5, 2) . '/' . substr($row['fecha_finalizado'], 2, 2) . ' a las ' . substr($row['fecha_finalizado'], 11, 5) . ' horas';
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <?php
                                            $querypedidos="SELECT pedidos.total, productos_vendidos.id_producto, productos.id_item, productos_vendidos.cantidad, productos.titulo, pedidos.id_pedido,pedidos.notas,pedidos.id_dir FROM productos_vendidos INNER JOIN productos ON productos_vendidos.id_producto=productos.id_item INNER JOIN pedidos ON pedidos.id_pedido = productos_vendidos.id_pedido AND pedidos.id_cliente =$idususario AND pedidos.estatus>5 ";
                                            // $querypedidos = "SELECT pedidos.estatus, pedidos.id_pedido, pedidos.notas, pedidos.tipo_pedido, pedidos.total, 
                                            // productos_vendidos.cantidad, productos.titulo FROM pedidos INNER JOIN productos_vendidos INNER JOIN 
                                            // productos ON pedidos.id_cliente=$idususario AND (pedidos.estatus>5 && pedidos.estatus<8) AND 
                                            // productos_vendidos.id_pedido = pedidos.id_pedido AND productos.id_item=productos_vendidos.id_pedido";
                                            $resw = mysqli_query($conn, $querypedidos);
                                            while ($roww = mysqli_fetch_array($resw)) {
                                                if ($roww['id_pedido'] == $row['id_pedido']) {
                                            ?>
                                                    <p>
                                                        <?php echo $roww['cantidad'] . ' ' . $roww['titulo'];
                                                        $tventa = $roww['total']; ?>
                                                    </p>
                                            <?php }
                                            }
                                            ?>
                                        </td>


                                        <td><?php echo '$' . $tventa; ?></td>
                                    <?php } ?>
                                    </tr>
                                    <?php ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>