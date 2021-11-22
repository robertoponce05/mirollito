<?php include("includes/db.php");$in=2; include("includes/header.php");  ?>
            <div class="col-8 col-md-10 lateral bg_contenido position-relative overflow-auto" style="scrollbar-width: none;">
                <div class="container salto ">



                    <div class="">
                        <h4 class="">Pedidos entrantes</h4>
                        <div class="col salto overflow-auto">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Pedido</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Notas</th>
                                        <th scope="col">Domicilio</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1506</th>
                                        <td>5</td>
                                        <td>Sushi picoso</td>
                                        <td>Salsa aparte</td>
                                        <td>Av de las Flores 45, San Francisco, Cuautitlán. CP 54800</td>
                                        <td>
                                            <button type="button" class="btn-sm btn-success toast_Aceptar" id="toastAceptar">Aceptar</button>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1507</th>
                                        <td>
                                            <p>1</p>
                                            <p>3</p>
                                            <p>2</p>
                                        </td>
                                        <td>
                                            <p>Refresco manzana</p>
                                            <p>Arroz</p>
                                            <p>Charola de sushi</p>
                                        </td>
                                        <td>Chiles toreados y tenedores extras</td>
                                        <td>Cda De la Trinidad, Santa Elena, Cuautitlán. CP 54815</td>
                                        <td>
                                            <button type="button" class="btn-sm btn-success" id="toastAceptar">Aceptar</button>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1508</th>
                                        <td>
                                            <p>1</p>
                                            <p>1</p>

                                        </td>
                                        <td>
                                            <p>Sushi Kawai</p>
                                            <p>Refresco</p>

                                        </td>
                                        <td>Null</td>
                                        <td>Pirules 38, Paseos de Cuautitlan, Cuautitlán. CP 54807</td>
                                        <td>
                                            <button type="button" class="btn-sm btn-success" id="toastAceptar">Aceptar</button>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="salto">Pedidos en curso</h4>
                        <div class="overflow-auto salto">
                            <table class="table table-hover" style="background-color: #aad1a0;">
                                <thead>
                                    <tr>
                                        <th scope="col">Aceptados</th>
                                        <th scope="col">En preparación</th>
                                        <th scope="col">Listos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <div class="card" style="width: 18rem; background-color: #fff3cd">
                                                <div class="card-body">
                                                    <h5 class="card-title">Pedido 1503</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Pedido de Roberto P.</h6>
                                                    <p class="card-text">2 Sushi básico, 2 refrescos, 1 postre especial</p>
                                                    <button type="button" class="btn btn-outline-success btn-sm">Iniciar pedido</button>

                                                </div>
                                            </div>

                                            <div class="card" style="width: 18rem; margin-top: 5px; background-color: #fff3cd">
                                                <div class="card-body">
                                                    <h5 class="card-title">Pedido 1502</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Pedido de Lara S. Peralta</h6>
                                                    <p class="card-text">3 Sushi básico, 2 sushis fuego, 1 arroz, 1 refrescos manzada, 2 pepsi</p>
                                                    <button type="button" class="btn btn-outline-success btn-sm">Iniciar pedido</button>
                                                </div>
                                            </div>

                                        </th>
                                        <th>
                                            <div class="card" style="width: 18rem; background-color: #d1e7dd;">
                                                <div class="card-body">
                                                    <h5 class="card-title">Pedido 1504</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Pedido de Andrea P.</h6>
                                                    <p class="card-text">3 Sushi básico, 1 refrescos</p>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm">Orden lista</button>
                                                </div>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="card" style="width: 18rem; background-color: #a3cfbb;">
                                                <div class="card-body">
                                                    <h5 class="card-title">Pedido 1505</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted" style="color: #adb5bd;">Pedido de Carina O.</h6>
                                                    <p class="card-text">3 Sushi básico, 2 sushis fuego, 1 arroz, 1 refrescos manzada, 2 pepsi</p>
                                                    <button type="button" class="btn btn-success btn-sm">Enviar</button>
                                                </div>
                                            </div>
                                        </th>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementsByClassName("toast_Aceptar").onclick = function() {
            var myAlert = document.getElementsById('toastPedidoAceptado'); //select id of toast
            var bsAlert = new bootstrap.Toast(myAlert); //inizialize it
            bsAlert.show(); //show it
        };
    </script>
    <script>
        document.getElementById("toastRechazado").onclick = function() {
            var myAlert = document.getElementById('toastPedidoRechazado'); //select id of toast
            var bsAlert = new bootstrap.Toast(myAlert); //inizialize it
            bsAlert.show(); //show it
        };
    </script>

</body>



</html>