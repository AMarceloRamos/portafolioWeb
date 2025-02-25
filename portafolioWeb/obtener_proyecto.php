<?php 

require 'include/config/database.php';

$db = conectarDB();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Preparar la consulta
    $sql = "SELECT titulo, intro, imgPortda, descripcion, url, fecha, cliente, categoria FROM proyectos WHERE id = $1";
    $stmt = pg_prepare($db, "buscar_proyecto", $sql);
    
    if (!$stmt) {
        echo json_encode(["Error" => "Error en la preparación de la consulta"]);
        exit;
    }

    // Ejecutar la consulta con el parámetro
    $resultado = pg_execute($db, "buscar_proyecto", [$id]);

    if ($proyecto = pg_fetch_assoc($resultado)) {
        echo json_encode($proyecto);
    } else {
        echo json_encode(["Error" => "Proyecto no encontrado"]);
    }
}

?>
