<?php  

require '../include/config/database.php';


$db = conectarDB();

$nombre = '';
$email = '';
$telefono = '';
$mensaje = '';



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //trim(limpia los espacio vacios al inicio y la final de los datos ingresados).

    $nombre = filter_var(trim($_POST['nombre'] ?? ''), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $telefono = filter_var(trim($_POST['telefono'] ?? ''), FILTER_SANITIZE_STRING);
    $mensaje = filter_var(trim($_POST['mensaje'] ?? ''), FILTER_SANITIZE_STRING);

    // un arreglo de errores

    $errores = [];

    // Validamos maximo de carácteres

    if(strlen($nombre)> 50){
        $errores[]="El nombre no puede contener mas de 100 caracteres";
    }

    if(strlen($email) > 50){
        $errores[]= "El correo no puede tener mas de 250 caracteres";
    }
    if(strlen($telefono)> 11){
        $errores[] = "El teléfono no puede tener mas de 11 números";
    }

    if(strlen($mensaje) > 150){
        $errores[] ="El mensaje no puede tener mas de 49 carácteres";
    }
    //Validamos cada campo

     if(empty($nombre)){
        $errores[] = "El campo nombre no puede estar vacio";
     }

     if(empty($email)){
        $errores[] = "El campo email no puede estar vacio ";
     }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores[] ="El email no tiene formato válido";
     }

     if(empty($telefono)){
        $errores[] = "El campo telefono no puede estar vacio";
     }

     if(empty($mensaje)){
        $errores[] = "El campo mensaje no puede estar vacio";
     }

     if(empty($errores)){

        $query = "INSERT INTO form_contacto(nombre, email, telefono, mensaje) VALUES('$nombre','$email', '$telefono', '$mensaje' )";

       $resultado = mysqli_query($db, $query);
       
   
   // Redirigir usando PRG para evitar reenvíos
   header("Location: " . $_SERVER['PHP_SELF'] . "#contact");
   exit; 
   } 
 
}
mysqli_close($db);
include '../template/header.php';

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
        include '../about.php';
    ?>
<!-- Portfolio Section -->

<?php 
        include '../portafolioProyectos.php';
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
     include '../contacto.php';
?>
<!-- Footer -->


<?php 
    
    include '../template/footer.php';
?>