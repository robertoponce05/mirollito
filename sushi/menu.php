<?php include('includes/db.php') ?>
<?php include("includes/header.php") ?>
<?php 
    $ini=3;
?>
<?php include("includes/navbar.php") ?>

    <div class="container-sm bg-light" style="height: 100%;">
        <div class="row">
            <div class="col-2">
                <h2>Menú</h2>
                <p>Rollos</p>
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="card" style="width: 14rem; margin: 5px;">
                        <div class="card-body">
                            <h5 class="card-title">sushi item</h5>
                            <img class="img-fluid img_item" src="img/item.jpg" alt="item">
                            <p class="card-text">A little caption for sushi item</p>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ver más
                              </button>
                        </div>
                    </div>
                    <div class="card" style="width: 14rem; margin: 5px;">
                        <div class="card-body">
                            <h5 class="card-title">sushi item</h5>
                            <img class="img-fluid img_item" src="img/item.jpg" alt="item">
                            <p class="card-text">A little caption for sushi item</p>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ver más
                              </button>
                        </div>
                    </div>
                    <div class="card" style="width: 14rem; margin: 5px;">
                        <div class="card-body">
                            <h5 class="card-title">sushi item</h5>
                            <img class="img-fluid img_item" src="img/item.jpg" alt="item">
                            <p class="card-text">A little caption for sushi item</p>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ver más
                              </button>
                        </div>
                    </div>
                    <div class="card" style="width: 14rem; margin: 5px;">
                        <div class="card-body">
                            <h5 class="card-title">sushi item</h5>
                            <img class="img-fluid img_item" src="img/item.jpg" alt="item">
                            <p class="card-text">A little caption for sushi item</p>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ver más
                              </button>
                        </div>
                    </div>
                    <div class="card" style="width: 14rem; margin: 5px;">
                        <div class="card-body">
                            <h5 class="card-title">sushi item</h5>
                            <img class="img-fluid img_item" src="img/item.jpg" alt="item">
                            <p class="card-text">A little caption for sushi item</p>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ver más
                              </button>
                        </div>
                    </div>
                    <div class="card" style="width: 14rem; margin: 5px;">
                        <div class="card-body">
                            <h5 class="card-title">sushi item</h5>
                            <img class="img-fluid img_item" src="img/item.jpg" alt="item">
                            <p class="card-text">A little caption for sushi item</p>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ver más
                              </button>
                        </div>
                    </div>
                    <div class="card" style="width: 14rem; margin: 5px;">
                        <div class="card-body">
                            <h5 class="card-title">sushi item</h5>
                            <img class="img-fluid img_item" src="img/item.jpg" alt="item">
                            <p class="card-text">A little caption for sushi item</p>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ver más
                              </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sushi item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6 form-group"><img class="img-fluid" src="img/item.jpg" alt="item"></div>
                                <div class="col col-lg-6">
                                    <div class="row row_espacio">

                                        <div class="col-6 col-md-8">
                                            <h4>Costo</h4>
                                        </div>
                                        <div class="col-6 col-md-4 text-center">$50</div>
                                    </div>
                                    <div class="row row_espacio">

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h4>Detalle</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil sit consequuntur, nobis molestiae minima autem officiis adipisci distinctio, at, expedita quaerat. Doloremque, eligendi voluptate? Voluptas facilis
                                                vel doloribus incidunt possimus?</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-lg-8">
                                            <h5>Cantidad</h5>
                                        </div>
                                        <div class="col-5 col-sm-3 col-lg-3">
                                            <input class="form-control " type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php');?>


