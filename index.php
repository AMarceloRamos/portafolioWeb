<?php  

require 'include/config/database.php';

$db = conectarDB();


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$query = "INSERT INTO form_contacto(nombre, email, telefono, mensaje) VALUES('$nombre','$email', '$telefono', '$mensaje' )";

$resultado = mysqli_query($db, $query);

mysqli_close($db);


include 'template/header.php';

?>


<!-- Slider -->
<section id="slider">

    <div class="carousel-caption wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="intro-text">
                    <?php
                        include 'header_muestra.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Video de fondo -->
    <video class="video-background" autoplay loop muted>
        <source src="1x/Recursos.mp4" type="video/mp4">
        Tu navegador no soporta el video.
    </video>


</section>




<!-- Services Section -->
<?php 
        include 'services.php';
    ?>
<!-- Team About -->

<?php 
        include 'about.php';
    ?>
<!-- Portfolio Section -->

<?php 
        include 'portafolio.php';
     ?>


<!-- Pricing Section -->
<?php
        // include 'precio.php';
    ?>
<!-- Client Section -->
<?php 
        // include 'clientes.php';
    ?>
<!-- Testimonials Section-->
<?php 
    // include 'testimoniales.php';
   ?>
<!-- Contact Section -->
<?php 
     include 'contacto.php';
     ?>
<!-- Footer -->

<?php 
    
    include 'template/footer.php';
    ?>