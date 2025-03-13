<?php  
include 'template/header.php';
?>
<!-- Slider -->
<section id="slider">

    <div class="carousel-caption wrapper">
                                <div class="intro-text">
                                    <h1 class="intro-lead-in animated bounceInLeft">Adrian Ramos</h1>
                                    <h2 class="intro-heading animated bounceInRight">Developer</h2>
                                    <p class="intro-paragraph animated bounceInRight">Bienvenido a mi sitio web dedicado al desarrollo web y al diseño</p>
                                </div>
                                <a href="#services" class="page-scroll btn btn-xl slider-button animated bounceInUp">Acerca de mi</a>  
    </div>
    <!-- Video de fondo -->
    <video class="video-background" autoplay loop muted>
        <source src="1x/Recursos.mp4" type="video/mp4">
        Tu navegador no soporta el video.
    </video>
</section>
<!-- Services Section -->

<!-- Team About -->

<?php 
        include 'about.php';
    ?>
<!-- Portfolio Section -->

<?php 
        include 'portafolioProyectos.php';
?>
<!-- Pricing Section -->
<?php
         include 'conocimiento.php';
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
