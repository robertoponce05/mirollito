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
<?php if (isset($_SESSION['messag'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_typ'] ?> d-flex alert-dismissible fade show" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div style="margin-left: 14px;"><?= $_SESSION['messag']; ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message_typ']);
    unset($_SESSION['messag']);
} ?>

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
                        <?php /* Listado del carrito*/
                        $total=0;
                        $query = "SELECT * FROM productos";
                        $result_clientes = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result_clientes)) {
                            if ((array_key_exists((int)$row['id_item'], $lista))) {
                        ?>
                                <tr>
                                    <td class="d-flex"><input class="form-control" type="number" name="cantidad" id="" min="1" step="1" value="<?php echo $lista[(int)$row['id_item']]; ?>" style="width: 100px;"><a href="includes/eliminar.php?del=<?php echo $row['id_item']; ?>&num=<?php echo $lista[(int)$row['id_item']]; ?>"> <img src="img/delete.png" alt="eliminar elemento" width="32px" style="margin-left: 6px;"></a></td>
                                    <td>
                                        <p><?php echo $row['titulo'] ?></p>
                                    </td>
                                <input type="hidden" name="id" value="<?php echo $row['id_item'];?>">
                                    <td>
                                        <p> $<?php echo $row['precio']; $total= $total+(int)$row['precio']*$lista[(int)$row['id_item']]; ?></p>
                                    </td>
                                </tr>
                        <?php }
                        }

                        ?>
                        <tr>
                            <td></td>
                            <td><h5>Total</h5> </td>
                            <td><h5>$<?php echo $total; $_SESSION['total']=$total;?></h5></td><!--Se guarda el total en variable de sesión-->
                        </tr>
                    </tbody>
                </table>
                        
                <button type="button" class="btn btn-outline-success justify-content-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Continuar</button>

        </div>
    <?php  } ?>
    </div>
</div>
</div>
<?php include('includes/footer.php'); ?>