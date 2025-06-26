<?php


function conectarDB() : Mysqli{

    // cargando las credenciales desde las varaibles del entorno

    $host =getenv('DB_HOST') ?: 'dpg-ctq6ofqj1k6c739pn1ng-a';
    $user = getenv('DB_USER') ?: 'dbcontacto_user';
    $password = getenv('DB_PASSWORD') ?: 'NmmS5wypyPKhdSZPkQCnPk4hb6toH1SJ';
    $database = getenv('DB_NAME') ?: 'dbcontacto';

    $db= new mysqli( $host, $user , $password ,  $database);

    if(!$db){
        die( "Error no se puede conectar". $db->connect_error);
     
    }

    return $db;


}