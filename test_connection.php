<<<<<<< HEAD
<?php
$host = getenv('DB_HOST') ?: 'dpg-ctq6ofqj1k6c739pn1ng-a';
$user = getenv('DB_USER') ?: 'dbcontacto_user';
$password = getenv('DB_PASSWORD') ?: 'NmmS5wypyPKhdSZPkQCnPk4hb6toH1SJ';
$database = getenv('DB_NAME') ?: 'dbcontacto';

$db = new mysqli($host, $user, $password, $database);

if ($db->connect_error) {
    die('Error no se puede conectar: ' . $db->connect_error);
} else {
    echo 'Conexión exitosa a la base de datos.';
}
?>
=======
<?php
$host = getenv('DB_HOST') ?: 'dpg-ctq6ofqj1k6c739pn1ng-a';
$user = getenv('DB_USER') ?: 'dbcontacto_user';
$password = getenv('DB_PASSWORD') ?: 'NmmS5wypyPKhdSZPkQCnPk4hb6toH1SJ';
$database = getenv('DB_NAME') ?: 'dbcontacto';

$db = new mysqli($host, $user, $password, $database);

if ($db->connect_error) {
    die('Error no se puede conectar: ' . $db->connect_error);
} else {
    echo 'Conexión exitosa a la base de datos.';
}
?>
>>>>>>> b6ee8be (subiendo archivos a mi portafolio v1.00)
