<?php
require_once 'include/config/database.php';

//$db = conectarDB();

$nombre = '';
$email = '';
$telefono = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limpieza de datos de entrada
    $nombre = $db->quote( trim($_POST['nombre'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $telefono =$db->quote( trim($_POST['telefono'] ?? ''));
    $mensaje =$db->quote( trim($_POST['mensaje'] ?? ''));

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
                  VALUES (:nombre, :email, :telefono, :mensaje)";

        $resultado = $db->prepare($query);
        $resultado->execute([
              ':nombre' =>$_POST['nombre'],   
              ':email' =>$_POST['email'],
              ':telefono' =>$_POST['telefono'],
              ':mensaje' =>$_POST['mensaje']    
        ]);

        if ($resultado) {
            // Redirigir usando PRG para evitar reenvíos
            header("Location: " . $_SERVER['PHP_SELF'] . "#contact");
            exit;
        } else {
            $errores[] = "Error al guardar el mensaje en la base de datos.";
        }
    }
}

//pg_close($db);
?>
<section id="contact">
    <div class="container-fluid wrapper">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2 class="section-heading">Contáctame </h2>
                <h3 class="section-subheading">llenar el formulario con todos los campos requeridos.</h3>
            </div>
            <div class="col-md-6">
                <div class="company-address col-sm-6 col-md-6">
                    <address>
                        AR - Developer
                        <br>
                        <span id="map-input">

                            José Miguel Carrera 679,<br>
                            La Florida, Santiago</span>
                        <br>
                    </address>
                </div>
                <div class="company-contact col-sm-6 col-md-6">
                    <address>correos
                        <br>
                        <a href="mailto:#">adrianramosv@gmail.com</a>
                        <br>
                        <a href="mailto:#">support@example.com</a>
                    </address>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="" method="POST" novalidate>
                    <div class="row">
                        <div class="col-md-6 contact-form-box">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nombre" placeholder="Tú nombre*" id="name"   maxlength="100" 
                                    required data-validation-required-message="Please enter your name." value="<?php echo htmlspecialchars($nombre ?? ''); ?>">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Tú Email *" maxlength="50" 
                                    id="email" required
                                    data-validation-required-message="Please enter your email address." value="<?php echo htmlspecialchars($email ?? ''); ?>">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="telefono" placeholder="Tú Teléfono *"
                                    id="phone" required maxlength="11" 
                                    data-validation-required-message="Please enter your phone number." value="<?php echo htmlspecialchars($telefono ?? ''); ?>">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje" placeholder="Tú Mensaje *" id="message" maxlength="150" 
                                    required data-validation-required-message="Please enter a message." value="<?php echo htmlspecialchars($mensaje ?? ''); ?>"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                                   <!-- <div id="success"></div> -->
                            <button type="submit" class="btn btn-xl">Enviar Mensaje</button>
                            <div>
                            <?php   
                                    // mostrar los resultados
                                    if(isset($_GET['success']) && $_GET['success'] == 1){
                                  
                                    // Limpiamos los valores

                                    $nombre = '';
                                    $email = '';
                                    $telefono = '';
                                    $mensaje = '';                               
                                    }
                                    if(!empty($errores)){
                                         foreach($errores as $error){
                                            echo "<p style='color:red;'>{$error}</p>";
                                             }
                                        }                                     
                                    ?>
                                    </div>
                        </div>
                        <div class="col-md-6">
                           <div class="map-canvas">
                              
                                <!-- <div class="clearfix"> -->
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5592.021959230152!2d-70.59071221930043!3d-33.55243705803135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1735004277962!5m2!1ses-419!2scl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <!-- </div> -->

                            </div>
                            
                </form>
            </div>
        </div>
       
    </div>
    <br>
  
</section>
