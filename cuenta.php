<?php include('includes/db.php') ?>
<?php include("includes/header.php") ?>
<?php $ini = 3;
$page = 0;
include("includes/navbar.php");
echo $ini; ?>

<body>
    <div id="wrapper">




        <div class="container-fluid">

            <div class="row">

                <div class="d-flex align-items-start ">
                    <div class="nav flex-column nav-pills me-3 col-md-2 align-items-center border-2 border-end" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <div class="row_espacio">
                            <img class="border border-dark rounded-circle " style="width: 80px; margin: 5px; align-self: center;" src="img/user.png" alt="User">
                            <p style="font-size: 11px; font-style: italic;">correo@dominio.mx</p>
                        </div>
                        <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Perfil</button>
                        <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#tarjetas" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Formas de pago</button>
                        <button class="nav-link show active" id="carrito-tab" data-bs-toggle="pill" data-bs-target="#carrito" type="button" role="tab" aria-controls="carrito" aria-selected="true">Carrito</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Pedidos</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Direcciones</button>

                        <a class="btn btn-outline-primary d-grid " href="index.html" role="button">Cerrar sesión</a>




                    </div>

                    <div class="tab-content container-fluid" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


                            <div class="container-sm">
                                <h3 class="titulo_cuenta row_espacio">Editar perfil</h3>

                                <div class="container-sm row_espacio">
                                    <form action="">
                                        <fieldset disabled="disabled">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <h5 class="subtitulo_cuenta">Nombre(s):</h5>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Roberto" disabled>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <h5 class="subtitulo_cuenta">Primer apellido</h5>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Ponce" disabled>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <h5 class="subtitulo_cuenta">Segundo apellido</h5>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Cano" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <h5 class="subtitulo_cuenta">Correo electrónico:</h5>

                                                    <input type="email" id="disabledTextInput" class="form-control" placeholder="roberto@dominio.mx" disabled>
                                                </div>
                                                <div class="mb-3 col-md-6">

                                                    <h5 class="subtitulo_cuenta">Número celular:</h5>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="+525530825580" disabled>

                                                </div>
                                            </div>
                                            <div class="row  row_espacio">
                                                <div class="mb-3 col-md-6">
                                                    <h5 class="subtitulo_cuenta">Contraseña:</h5>
                                                    <input type="password" id="disabledTextInput" class="form-control" placeholder="*********" disabled>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <h5 class="subtitulo_cuenta">Confirmar contraseña:</h5>
                                                    <input type="password" id="disabledTextInput" class="form-control" placeholder="" disabled>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary mb-3">Enviar</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>



                        </div>

                        <div class="tab-pane fade" id="tarjetas" role="tabpanel" aria-labelledby="v-pills-home-tab">


                            <div class="container-sm">
                                <h3 class="titulo_cuenta row_espacio">Formas de pago</h3>

                                <div class="container-sm row_espacio">
                                    <div class="row position-relative">
                                        <div class="col-6 position-absolute start-0">
                                            <h4 class="row_espacio">Preferida</h4>
                                        </div>
                                        <div class="col-6 position-absolute  end-0">
                                            <a class="btn row_espacio text-end" data-bs-toggle="modal" data-bs-target="#agregar_tarjeta">
                                                <h5 style="padding: 2px; color: #681212">Agregar <img src="/sysadmin/img/add.png" alt="Agregar" style="width: 30px; height: 30px;"></h5>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card w-50">
                                        <div class="card-body">
                                            <h5 class="card-title">5478********7811</h5>
                                            <div class="card-text">
                                                <div class="col">
                                                <p >Vencimiento: 05/23</p>
                                                
                                                    <p >Roberto Ponce</p>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary">Editar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>





                        <div class="tab-pane fade show active" id="carrito" role="tabpanel" aria-labelledby="carrito-tab">
                            <h3 class="titulo_cuenta">Elementos en el carrito: 3</h3>

                            <div class=" row">
                                <table class="table table-borderless table-responsive align-items-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Producto</th>
                                            <th scope="col">Costo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="d-flex"><input class="form-control" type="number" name="" id="" value="2" style="width: 100px;"><img src="img/delete.png" alt="eliminar elemento" width="32px" style="margin-left: 6px;"></td>
                                            <td>
                                                <p>Sushi normal</p>
                                            </td>

                                            <td>$190</td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex"><input class="form-control" type="number" name="" id="" value="2" style="width: 100px;"><img src="img/delete.png" alt="eliminar elemento" width="32px" style="margin-left: 6px;"></td>
                                            <td>
                                                <p>Refresco</p>
                                            </td>

                                            <td>$40</td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex"><input class="form-control" type="number" name="" id="" value="1" style="width: 100px;"><img src="img/delete.png" alt="eliminar elemento" width="32px" style="margin-left: 6px;"></td>
                                            <td>
                                                <p>Sushi salmón</p>
                                            </td>

                                            <td>$55</td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex"><input class="form-control" type="number" name="" id="" value="2" style="width: 100px;"><img src="img/delete.png" alt="eliminar elemento" width="32px" style="margin-left: 6px;"></td>
                                            <td>
                                                <p>Sushi picante</p>
                                            </td>

                                            <td>$250</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Total</h5>
                                            </td>
                                            <td></td>
                                            <td>$480</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button type="button" class="btn btn-outline-success justify-content-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Continuar</button>

                            </div>



                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">







                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h4 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="btn col-12 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            Pedido en curso
                                        </button>
                                    </h4>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            <!--Seguimiento-->
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="col">
                                                    <div class="row" style="padding: 15px;">
                                                        <div class="col-12">
                                                            <h4 class="">
                                                                Pedido #217: Envío a domicilio
                                                            </h4>
                                                        </div>
                                                        <div class="col-8 text-center">
                                                            2 Sushi takishi
                                                        </div>
                                                        <div class="col-4">
                                                            $110
                                                        </div>
                                                        <div class="col-8 text-center">
                                                            1 Sushi dragon
                                                        </div>
                                                        <div class="col-4">
                                                            $60
                                                        </div>
                                                        <div class="col-8 text-center">
                                                            Total
                                                        </div>
                                                        <div class="col-4">
                                                            $170
                                                        </div>
                                                    </div>
                                                    <div class="row row_espacio">
                                                        <div class="col-sm-12 col-md-6 d-inline-flex text-end">
                                                            <h5 class="">Estado: </h5>
                                                            <p style="margin-left: 5px;">
                                                                Aceptado
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 d-inline-flex">
                                                            <h5>Detalle: </h5>
                                                            <p style="margin-left: 5px;">
                                                                Envío a domicilio a Edi 10 - 105A, El Huerto, Cuautitlán.
                                                            </p>



                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="margin-bottom: 5px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <circle cx="12" cy="12" r="9" />
                                                            <path d="M9 12l2 2l4 -4" />
                                                        </svg>Estamos preparando tu pedido
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar w-25 bg-success bg-gradient" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="btn col-12 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            Pedidos anteriores
                                        </button>
                                    </h4>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">

                                            <!--Historico-->
                                            <h3 class="titulo_cuenta row_espacio">Histórico de pedidos: 3</h3>

                                            <div class="contenedor_tabla">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Número de pedido</th>
                                                            <th scope="col">Fecha de pedido</th>
                                                            <th scope="col">Detalles</th>
                                                            <th scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">10010</th>
                                                            <td>10-05-2021</td>
                                                            <td>
                                                                <p>2 x Sushi normal</p>
                                                                <p>2 x jugos</p>
                                                            </td>
                                                            <td>$190</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">10010</th>
                                                            <td>10-05-2021</td>
                                                            <td>
                                                                <p>2 x Sushi normal</p>
                                                                <p>3 x postres</p>
                                                                <p>3 x jugos</p>
                                                            </td>
                                                            <td>$190</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">10010</th>
                                                            <td>10-05-2021</td>
                                                            <td>
                                                                <p>2 x Sushi picante</p>
                                                            </td>
                                                            <td>$190</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                            <div class="container-sm">
                                <div class="row">
                                    <div class="col-9">
                                        <h3 class="titulo_cuenta row_espacio">Direcciones</h3>
                                    </div>
                                    <div class="col-3 row_espacio d-flex"><a type="button" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#NuevaDireccion"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                            </svg></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Predeterminada</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Casa</h6>
                                            <p class="card-text">Edi 10 - 105-A, El Huerco, Cuautitlán</p>
                                            <a class="card-link" data-bs-toggle="modal" data-bs-target="#EditaDireccion">Editar</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="row row_espacio">
                                    <h5>Otras direcciones</h5>
                                    <div class="card col-md-6">
                                        <div class="card-body card_direccion">

                                            <h6 class="card-subtitle mb-2 text-muted">Alfredo</h6>
                                            <p class="card-text">Edi 10 - 105-A, El Huerco, Cuautitlán</p>
                                            <a class="card-link" data-bs-toggle="modal" data-bs-target="#EditaDireccion">Editar</a>

                                        </div>
                                    </div>

                                    <div class="card col-md-6">
                                        <div class="card-body card_direccion">

                                            <h6 class="card-subtitle mb-2 text-muted">Mamá</h6>
                                            <p class="card-text">Edi 10 - 105-A, El Huerco, Cuautitlán</p>
                                            <a class="card-link" data-bs-toggle="modal" data-bs-target="#EditaDireccion">Editar</a>

                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>



                    </div>
                </div>


            </div>

            <!--ModalSeleccionDireccion-->
            <div class="modal fade" id="DireccionEnvio" tabindex="-1" aria-labelledby="DireccionEnvio" aria-hidden="true">
                <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="DireccionEnvio">Selecciona tu tipo de envío</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Predeterminada" value="1">
                                        <div class="card form-check-label">
                                            <div class="card-body">
                                                <h5 class="card-title">Predeterminada</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Casa</h6>
                                                <p class="card-text">Edi 10, 105-A, El Huerto, Cuautitlán</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Dirección</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Alfredo</h6>
                                                <p class="card-text">Av Del Rosal, 58, Santa Maria, Cuautitlan</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Dirección</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Mamá</h6>
                                                <p class="card-text">Pirules 38, Paseos de Cuautitlán, Cuautitlán</p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Continuar</button>
                        </div>
                    </div>
                </div>
            </div>




            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Selecciona tu tipo de envío</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="off">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Envío a domicilio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="off">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Recoger en sucursal
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#DireccionEnvio">Continuar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="agregar_tarjeta" tabindex="-1" aria-labelledby="agregarTarjeta" aria-hidden="true">
                <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="agregar_tarjeta">Agrega tarjeta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="container-sm">
                                        <h5 class="titulo_cuenta row_espacio">Ingresa la información de la tarjeta</h5>


                                        <form action="">
                                            <fieldset>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-8">
                                                            <h5 class="subtitulo_cuenta">Numero </h5>
                                                            <input type="text" class="form-control" placeholder="Ingresa los 16 dígitos de la tarjeta">
                                                        </div>
                                                    </div>
                                                    <div class="row row_espacio">
                                                        <div class="col-sm-12 col-md-8">
                                                            <h5 class="subtitulo_cuenta">Nombre</h5>
                                                            <input type="text" class="form-control" placeholder="Como aparece en la tarjeta">
                                                        </div>
                                                    </div>
                                                    <div class="row row_espacio">
                                                        <div class="col-md-4">
                                                            <h5 class="subtitulo_cuenta">Fecha de vencimiento:</h5>
                                                            <input type="text" class="form-control" placeholder="MM/AA">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5 class="subtitulo_cuenta">CVV</h5>
                                                            <input type="text" class="form-control" placeholder="000">
                                                        </div>

                                                    </div>
                                                </div>

                                            </fieldset>
                                        </form>



                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="NuevaDireccion" tabindex="-1" aria-labelledby="NuevaDireccion" aria-hidden="true">
                <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="NuevaDireccion">Agrega nueva dirección</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="container-sm">
                                        <h5 class="titulo_cuenta row_espacio">Ingresa tu nueva dirección</h5>


                                        <form action="">
                                            <fieldset>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <h5 class="subtitulo_cuenta">Alias: </h5>
                                                            <input type="text" class="form-control" placeholder="Casa">
                                                        </div>
                                                    </div>
                                                    <div class="row row_espacio">
                                                        <div class="col-4">
                                                            <h5 class="subtitulo_cuenta">Código postal:</h5>
                                                            <input type="text" class="form-control" placeholder="">
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="subtitulo_cuenta">Colonia:</h5>
                                                            <input type="text" class="form-control" placeholder="">
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="subtitulo_cuenta">Municipio:</h5>
                                                            <input type="text" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row_espacio">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h5 class="subtitulo_cuenta">Exterior:</h5>
                                                            <input type="text" class="form-control" placeholder="">
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="subtitulo_cuenta">Interior:</h5>
                                                            <input type="text" class="form-control" placeholder="">
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="subtitulo_cuenta">Referencias:</h5>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>
                                        </form>



                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Agregar dirección</button>
                        </div>
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
                                <div class="row">

                                    <div class="d-flex col-12  text-center align-self-center"><img src="img/done.png" alt="Confirmación" style="width: 100px;">Solicitud realizada</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Continuar</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="EditaDireccion" tabindex="-1" aria-labelledby="EditaDireccion" aria-hidden="true">
                <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditaDireccion">Editar dirección</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="container-sm">
                                <h5 class="titulo_cuenta row_espacio">Edita los campos:</h5>


                                <form action="">
                                    <fieldset>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Alias: </h5>
                                                    <input type="text" class="form-control" placeholder="Casa">
                                                </div>
                                            </div>
                                            <div class="row row_espacio">
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Código postal:</h5>
                                                    <input type="text" class="form-control" placeholder="54807">
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Colonia:</h5>
                                                    <input type="text" class="form-control" placeholder="El Huerco">
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Municipio:</h5>
                                                    <input type="text" class="form-control" placeholder="Cuautitlán">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row_espacio">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Exterior:</h5>
                                                    <input type="text" class="form-control" placeholder="Edi 10">
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Interior:</h5>
                                                    <input type="text" class="form-control" placeholder="105-A">
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Referencias:</h5>
                                                    <input type="text" class="form-control" placeholder="Entre Calle 1 y Calle 2">
                                                </div>
                                            </div>
                                        </div>


                                    </fieldset>
                                </form>



                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Confirmar</button>
                        </div>

                    </div>


                </div>

            </div>

        </div>
    </div>

    <?php include("includes/footer.php") ?>



    </html>