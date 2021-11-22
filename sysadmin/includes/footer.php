</div>
</div>

</div>

<!--modales-->

<div class="modal fade" id="edicionItem" tabindex="-1" aria-labelledby="Editar" aria-hidden="true">
    <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Editar">Edición de producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4 form-group">
                            <img class="img-fluid border rounded border-2" src="../img/item.jpg" alt="item">
                            <div class="mb-3 salto">
                                <label for="formFileSm" class="form-label">Modificar imagen</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="container">
                                <form action="" method="post">
                                    <div class="row">

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">Título: </span>
                                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group">
                                            <span class="input-group-text">Descripción</span>
                                            <textarea class="form-control" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group" style="width: 50%;">
                                            <span class="input-group-text">Costo: $</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        <div class="input-group" style="width: 50%;">
                                            <span class="input-group-text" id="basic-addon3">Inventario: </span>
                                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            Estado:
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Activo
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Inactivo
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Categoría</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#success" data-bs-toggle="modal" data-bs-dismiss="modal">Confirmar</button>
                <!--<button type="button" class="btn btn-primary">Agregar al carrito</button>-->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="agregarItem" tabindex="-1" aria-labelledby="agregar" aria-hidden="true">
    <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="includes/agregar_productos.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="Editar">Nuevo producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <div class="row">
                            <div class="col-12 col-md-4 form-group">
                                <!--<img class="img-fluid border rounded border-2" src="../img/item.jpg" alt="item">-->
                                <div class="mb-3 salto">
                                    <label for="formFileSm" class="form-label">Agregar Img</label>
                                    <input class="form-control form-control-sm" name="item_img" id="formFileSm" type="file">
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="container">

                                    <div class="row">

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">Título: </span>
                                            <input type="text" class="form-control" id="basic-url" name="titulo" aria-describedby="basic-addon3" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group">
                                            <span class="input-group-text">Descripción</span>
                                            <textarea class="form-control" aria-label="With textarea" name="descripcion" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group" style="width: 50%;">
                                            <span class="input-group-text">Costo: $</span>
                                            <input type="number" name="precio" class="form-control" aria-label="Amount (to the nearest dollar)" required>

                                        </div>
                                        <div class="input-group" style="width: 50%;">
                                            <span class="input-group-text" id="basic-addon3">Inventario: </span>
                                            <input type="number" class="form-control" id="basic-url" name="stock" aria-describedby="basic-addon3" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <br>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked name="habilitar">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Mostrar en el listado</label>
                                            </div>
                                        </div>
                                        <div class="col-6"><br>
                                            <label for="exampleDataList" class="form-label">Categoría</label>
                                                <input type="text" name="categoria" class="form-control" list="Cat" placeholder="Selecciona una categoría" required>
                                                <datalist id="Cat">
                                                    <option value="Sushi">
                                                    <option value="Bebidas">
                                                    <option value="Postres">
                                                    
                                                </datalist>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="enviar_item">Confirmar</button>
                    <!--<button type="button" class="btn btn-primary">Agregar al carrito</button>-->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="success" tabindex="-1" aria-labelledby="success" aria-hidden="true">
    <div class="modal modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Operación éxitosa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="position-relative" style="height: 80px;">

                        <div class="position-absolute top-50 start-50 translate-middle">
                            <img src="/sushi/img/done.png" alt="Confirmación" style="width: 80px; padding: 5px">
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Continuar</button>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>




</body>

</html>