<?php


function conectarDB() : Mysqli{

    // cargando las credenciales desde las varaibles del entorno

    $host =getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: 'admin1234';
    $database = getenv('DB_NAME') ?: 'mi_portafolio1';

    $db= new mysqli( $host, $user , $password ,  $database);

    if(!$db){
        die( "Error no se puede conectar". $db->connect_error);
     
    }

    return $db;


}
