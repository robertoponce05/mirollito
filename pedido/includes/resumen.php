<div class="container row_espacio carrito_div">
    <h3>Resumen de la orden</h3>
    <table class="table table-borderless table-responsive align-items-center">
        <thead>
            <tr>
                <th scope="col">Cantidad</th>
                <th scope="col">Producto</th>
                <th scope="col">Costo</th>
            </tr>
        </thead>
        <tbody>
            <?php /* Listado del carrito*/
            $total = 0;
            $query = "SELECT * FROM productos";
            $result_clientes = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result_clientes)) {
                if ((array_key_exists((int)$row['id_item'], $lista))) {
            ?>
                    <tr>
                        <td class="d-flex">
                            <?php echo $lista[(int)$row['id_item']]; ?> </td>
                        <td>
                            <p><?php echo $row['titulo'] ?></p>
                        </td>
                        <td>
                            <p> $<?php echo $row['precio'];
                                    $total = $total + (int)$row['precio'] * $lista[(int)$row['id_item']]; ?></p>
                        </td>
                    </tr>
            <?php }
            }

            ?>
            <tr>
                <td></td>
                <td>
                    <h5>Total</h5>
                </td>
                <td>
                    <h5>$<?php echo $total;
                            $_SESSION['total'] = $total; ?></h5>                            
                </td>
            </tr>
        </tbody>
    </table>
</div>