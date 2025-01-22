<?php
function conectarDB() {
    $dsn = "pgsql:host=dpg-ctq6ofqj1k6c739pn1ng-a;port=5432;dbname=dbcontacto;";
    $user = "dbcontacto_user";
    $password = "NmmS5wypyPKhdSZPkQCnPk4hb6toH1SJ";

    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Error al conectar a la base de datos: " . $e->getMessage());
    }
}
