<?php include("includes/db.php");
$in = 0;
include("includes/header.php");  ?>
<div class="col-8 col-md-10 fullHeight bg_contenido position-relative">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } ?>
    <div class="container contenedor_cuadro tabla__clientes">


        <!-- <h3 class="position-absolute top-50 start-50 translate-middle">Bienvenido al sysadmin de Rollito</h3> -->

        <div class="row">

            <div class="card card_margin" style="width: 15rem;">
                <div class="position-relative">
                    <img src="img/send.svg" class="card-img-top" alt="...">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php
                        $query = "SELECT id_pedido FROM pedidos WHERE estatus<6";
                        $res = mysqli_query($conn, $query);
                        $n = mysqli_num_rows($res);
                        echo $n;
                        ?>

                    </span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Pedidos en curso</h6>
                    <p class="card-text"></p>
                </div>
                <div class="card-body">
                    <a href="pedidos.php" class="card-link">Ver pedidos</a>

                </div>
            </div>
            <div class="card card_margin" style="width: 15rem;">
                <div class="position-relative">
                    <img src="img/curso.svg" class="card-img-top" alt="...">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                        <?php
                        $query = "SELECT id_pedido FROM pedidos WHERE estatus>5";
                        $res = mysqli_query($conn, $query);
                        $n = mysqli_num_rows($res);
                        echo $n;
                        ?>

                    </span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Pedidos finalizados</h6>
                    <p class="card-text">
                    Total vendido: $<?php $querytotal = "SELECT total FROM pedidos WHERE estatus=6";
                                        $restotal = mysqli_query($conn, $querytotal);
                                        $ttotal=0;
                                        while($ntotal = mysqli_fetch_array($restotal)){
                                            $ttotal+=$ntotal['total'];
                                        }
                                        echo $ttotal; ?>
                    </p>
                </div>
                <div class="card-body">
                    <a href="finalizados.php" class="card-link">Ver pedidos</a>

                </div>
            </div>
            <div class="card card_margin" style="width: 15rem;">
                <div class="position-relative">
                    <img src="img/client.svg" class="card-img-top" alt="...">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                        <?php
                        $query = "SELECT idusuario FROM clientes WHERE activo=1";
                        $res = mysqli_query($conn, $query);
                        $n = mysqli_num_rows($res);
                        echo $n;
                        ?>

                    </span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Clientes activos</h6>
                    <p class="card-text"></p>
                </div>
                <div class="card-body">
                    <a href="clientes.php" class="card-link">Ver usuarios</a>

                </div>
            </div>
        </div>


    </div>
</div>

</div>
<?php include('includes/footer.php') ?>