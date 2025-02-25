<?php  
require 'include/config/database.php';

$db = conectarDB();

$nombre = '';
$email = '';
$telefono = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limpieza de datos de entrada
    $nombre = pg_escape_string($db, trim($_POST['nombre'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $telefono = pg_escape_string($db, trim($_POST['telefono'] ?? ''));
    $mensaje = pg_escape_string($db, trim($_POST['mensaje'] ?? ''));

    // Validaciones
    $errores = [];

    if (strlen($nombre) > 50) {
        $errores[] = "El nombre no puede contener más de 50 caracteres";
    }

    if (strlen($email) > 250) {
        $errores[] = "El correo no puede tener más de 250 caracteres";
    }

    if (strlen($telefono) > 11) {
        $errores[] = "El teléfono no puede tener más de 11 números";
    }

    if (strlen($mensaje) > 150) {
        $errores[] = "El mensaje no puede tener más de 150 caracteres";
    }

    if (empty($nombre)) {
        $errores[] = "El campo nombre no puede estar vacío";
    }

    if (empty($email)) {
        $errores[] = "El campo email no puede estar vacío";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no tiene formato válido";
    }

    if (empty($telefono)) {
        $errores[] = "El campo teléfono no puede estar vacío";
    }

    if (empty($mensaje)) {
        $errores[] = "El campo mensaje no puede estar vacío";
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        $query = "INSERT INTO contactoPortafolio (nombre, email, telefono, mensaje) 
                  VALUES ('$nombre', '$email', '$telefono', '$mensaje')";

        $resultado = pg_query($db, $query);

        if ($resultado) {
            // Redirigir usando PRG para evitar reenvíos
            header("Location: " . $_SERVER['PHP_SELF'] . "#contact");
            exit;
        } else {
            $errores[] = "Error al guardar el mensaje en la base de datos.";
        }
    }
}

pg_close($db);
include 'template/header.php';


?>


<!-- Slider -->
<section id="slider">

    <div class="carousel-caption wrapper">
                                <div class="intro-text">
                                    <h1 class="intro-lead-in animated bounceInLeft">Adrian Ramos</h1>
                                    <h2 class="intro-heading animated bounceInRight">Developer</h2>
                                    <p class="intro-paragraph animated bounceInRight">Bievenido a  mi sitio web dedicado al desarrollo web y al diseño</p>
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
