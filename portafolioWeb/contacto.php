<?php
require_once 'include/config/database.php'; // Asegúrate de que este archivo no tenga espacios en blanco antes de <?php
ob_start(); // Iniciar el buffer de salida

$nombre = '';
$email = '';
$telefono = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $telefono = trim($_POST['telefono'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

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
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no tiene formato válido";
    }
    if (empty($telefono)) {
        $errores[] = "El campo teléfono no puede estar vacío";
    }
    if (empty($mensaje)) {
        $errores[] = "El campo mensaje no puede estar vacío";
    }

    if (empty($errores)) {
        $query = "INSERT INTO contactoPortafolio (nombre, email, telefono, mensaje) 
                  VALUES (:nombre, :email, :telefono, :mensaje)";

        $stmt = $db->prepare($query);
        $resultado = $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':telefono' => $telefono,
            ':mensaje' => $mensaje
        ]);

        if ($resultado) {
            header("Location: " . basename(__FILE__) . "?success=1#contact");
            exit();
        } else {
            $errores[] = "Error al guardar el mensaje en la base de datos.";
        }
    }
}

    ob_end_flush();
?>

<section id="contact">
    <div class="container-fluid wrapper">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2 class="section-heading">Contáctame</h2>
                <h3 class="section-subheading">Llenar el formulario con todos los campos requeridos.</h3>
            </div>          
            <div class="col-md-6">
                <div class="company-address col-sm-6 col-md-6">
                    <address>
                        AR - Developer <br>
                        <span id="map-input">José Miguel Carrera 679,<br>La Florida, Santiago</span><br>
                    </address>
                </div>
                <div class="company-contact col-sm-6 col-md-6">
                    <address>
                        Correos <br>
                        <a href="mailto:adrianramosv@gmail.com">adrianramosv@gmail.com</a><br>
                        <a href="mailto:support@example.com">support@example.com</a>
                    </address>
                </div>
            </div>
        </div>
        
        <div>
            <?php   
                if(isset($_GET['success']) && $_GET['success'] == 1){
                    echo "<p style='color:green;font-size:24px;'>¡Mensaje enviado con éxito!</p>";
                    $nombre = $email = $telefono = $mensaje = ''; // Limpiar valores
                }
                if(!empty($errores)){
                    foreach($errores as $error){
                        echo "<p style='color:red;font-size:24px;'>{$error}</p>";
                    }
                }
            ?>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="" method="POST" novalidate>
                    <div class="row">
                        <div class="col-md-6 contact-form-box">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nombre" placeholder="Tu nombre*" id="name" maxlength="100" required value="<?php echo htmlspecialchars($nombre); ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Tu Email*" maxlength="50" id="email" required value="<?php echo htmlspecialchars($email); ?>">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="telefono" placeholder="Tu Teléfono*" id="phone" required maxlength="11" value="<?php echo htmlspecialchars($telefono); ?>">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje" placeholder="Tu Mensaje*" id="message" maxlength="150" required><?php echo htmlspecialchars($mensaje); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-xl">Enviar Mensaje</button>
                        </div>
                        <div class="col-md-6">
                            <div class="map-canvas">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5592.021959230152!2d-70.59071221930043!3d-33.55243705803135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1735004277962!5m2!1ses-419!2scl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
