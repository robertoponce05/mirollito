<?php
include('includes/db.php');
$page = 7;


include('includes/header.php');
if ($nombre == null || $nombre = '') {
    $_SESSION['message'] = 'Primero debes iniciar sesión';
    $_SESSION['message_type'] = 'warning';

    header('location:../');
    die();
}
include('includes/navbar.php');
if (isset($_SESSION['list'])) {
    $lista = array();
    $lista = $_SESSION['list'];
}
?>

<div class="container-sm div_tama">
    <div class="container row_espacio carrito_div">

        <h3 class="titulo_cuenta">Elementos en el carrito: <?php echo $car ?></h3>

        <div class=" row">
            <?php if ($car > 0) { ?>
                <table class="table table-borderless table-responsive align-items-center">
                    <thead>
                        <tr>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM productos";
                        $result_clientes = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result_clientes)) {
                            if ((array_key_exists((int)$row['id_item'], $lista))) {
                        ?>
                                <tr>
                                    <td class="d-flex"><input class="form-control" type="number" name="" id="" value="<?php echo $lista[(int)$row['id_item']]; ?>" style="width: 100px;"><a href="includes/eliminar.php?del=<?php echo $row['id_item'];?>&num=<?php echo $lista[(int)$row['id_item']]; ?>"> <img src="img/delete.png" alt="eliminar elemento" width="32px" style="margin-left: 6px;"></a></td>
                                    <td>
                                        <p><?php echo $row['titulo'] ?></p>
                                    </td>

                                    <td>
                                        <p> $<?php echo $row['precio'] ?></p>
                                    </td>
                                </tr>
                        <?php }
                        }

                        ?>
                    </tbody>
                </table>

                <button type="button" class="btn btn-outline-success justify-content-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Continuar</button>

        </div>
    <?php  } ?>
    </div>
</div>
</div>
<?php include('includes/footer.php'); ?>