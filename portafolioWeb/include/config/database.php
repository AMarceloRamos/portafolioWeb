<?php

function conectarDB(): PDO {
$host = 'dpg-cur1vpdds78s7384bkr0-a.render.com';  // Asegúrate de que Render usa este dominio
$port = '5432'; 
$dbname = 'contactodb_i7hi';
$user = 'contactodb_i7hi_user';
$password = '1BesM5VW4iwl5rdJP9IXqNwETiKW9hA0';

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
