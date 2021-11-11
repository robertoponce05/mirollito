<?php include('includes/db.php'); $page = 3; ?>
<?php include("includes/header.php") ?>
<?php
$ini = 0;

?>
<?php include("includes/navbar.php") ?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php unset($_SESSION['message']); unset($_SESSION['message_type']);
} ?>
<div class="container-fluid nopadding">
    <img class="portada_img" src="img/wallpaper_sushi.jpg" alt="">
</div>
<div class="container">

    <h2 class="text-center row_espacio">Nosotros</h2>
    <p class="text-center">Somos un pequeño restaurante dedicado a la venta de sushi. Buscamos dar una experiencia de la cocina oriental hasta la puerta de tu hogar.</p>
    <div class="row row_espacio">
        <div class="col-6">
            <h3>Misión</h3>
            Nos dedicamos a ofrecer el mejor sushi, utilizando ingredientes de calidad dando los mejores precios, conservando la tradición japonesa y la esencia mexicana hasta tu hogar.
        </div>
        <div class="col-6">
            <h3>Visión</h3>Liderar en la gastronomía japonesa a nivel zona, adaptándonos a las necesidades para lograr expandirnos a nuevos nichos de mercado.
        </div>
        <div class="col-12 row_espacio">
            <h3 class="text-center">Valores</h3>
        </div>
        <h5 class="text-center">Nos regimos por los siguientes valores</h5>
        <ul class="text-center nolist">
            <li>Compromiso: Con el comensal, sabor, imagen y teniendo en mente la mejora continua.</li>
            <li>Calidad: Cuidar los procesos, revisar y esmerarnos en cada uno de los platillos.</li>
            <li>Puntualidad: Entregar nuestros pedidos en tiempo y forma.</li>
        </ul>
        




    </div>


</div>


<?php
include("includes/footer.php")
?>