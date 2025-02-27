<?php

function conectarDB(): PDO {
    $db_url = getenv('DATABASE_URL');  // Render asigna esta variable automáticamente

    if (!$db_url) {
        die("Error: No se encontró la variable de entorno DATABASE_URL.");
    }

    // Parsear la URL de la base de datos
    $db = parse_url($db_url);

    $host = $db['host'];
    $port = $db['port'];
    $dbname = ltrim($db['path'], '/');
    $user = $db['user'];
    $password = $db['pass'];

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
