<?php include('includes/db.php'); $page=1;?>
<?php include("includes/header.php") ?>
<?php 
    $ini=2;
    
    
?>
<?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['message']); unset($_SESSION['message_type']);
    } ?>
<?php include("includes/navbar.php") ?>
<div class="container-sm" id="contenido">
    <div class="contenedor_carrusel">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="img/sushi1.jpg" class="d-block w-100 img_carrusel" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/sushi2.jpg" class="d-block w-100 img_carrusel" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/sushi2.jpg" class="d-block w-100 img_carrusel" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="home_menu">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia rerum fuga aut voluptates quaerat nisi. Sit aspernatur soluta voluptatem accusamus, inventore totam architecto eum omnis, neque itaque tempore nihil ab?</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt illum sed quam obcaecati. Doloremque delectus rerum quae dolorem nihil, voluptatibus distinctio. Veritatis quae excepturi dolorem numquam necessitatibus vel soluta praesentium.</p>

        <h3 id="ubi">Ubicación</h3>

        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <iframe class="container-fluid mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17873.160873551453!2d-99.17938798394763!3d19.654246964108392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f59d8066df0d%3A0xcfae06acc9e6f99c!2sCuautitl%C3%A1n!5e0!3m2!1ses-419!2smx!4v1624336971304!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur maxime voluptatibus, numquam beatae, alias recusandae tempora nesciunt commodi rem totam soluta? Laudantium molestias, cum totam saepe repudiandae autem libero quasi.</p>

    </div>
</div>


<?php include("includes/footer.php") ?>