<?php 

require 'include/config/databaseProyectos.php';

$dbpr = conectarProyectos();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT titulo, intro, imgPortda, descripcion, url, fecha, cliente, categoria FROM proyectos WHERE id = ?";
    $stmt = $dbpr->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($proyecto = $resultado->fetch_assoc()) {
        echo json_encode($proyecto);
    } else {
        echo json_encode(["Error" => "Proyecto no encontrado"]);
    }
}
?>
