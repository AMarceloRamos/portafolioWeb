<?php

function conectarDB(): PDO {
     $db_url = getenv('DATABASE_URL');  // Render asigna esta variable automáticamente

    if (!$db_url) {
        die("Error: No se encontró la variable de entorno DATABASE_URL.");
    }

    // Reemplazar 'postgresql' por 'pgsql' para PDO si es necesario
    $db_url = str_replace("postgresql://", "pgsql://", $db_url);

    // Extraer las credenciales y el host desde la URL
    $url_parts = parse_url($db_url);

    if (!$url_parts || !isset($url_parts['host'], $url_parts['user'], $url_parts['pass'], $url_parts['path'])) {
        die("Error: No se pudo parsear correctamente DATABASE_URL.");
    }

    $host = $url_parts['host'];
    $port = isset($url_parts['port']) ? $url_parts['port'] : '5432';  // Asignar 5432 si no está definido
    $dbname = ltrim($url_parts['path'], '/');  // Quitar la barra inicial
    $user = $url_parts['user'];
    $password = $url_parts['pass'];

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

    try {
        $db = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $db;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
