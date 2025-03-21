<?php


function conectarDB() : Mysqli{

    // cargando las credenciales desde las varaibles del entorno

    $host =getenv('DB_HOST') ?: 'dpg-cves1qfnoe9s73b9ullg-a';
    $user = getenv('DB_USER') ?: 'portafoliodb_hb96_user';
    $password = getenv('DB_PASSWORD') ?: 'LUd1w30XSO8bNfXvwb5TwFrflfRnka8K';
    $database = getenv('DB_NAME') ?: 'portafolioDB';

    $db= new mysqli( $host, $user , $password ,  $database);

    if(!$db){
        die( "Error no se puede conectar". $db->connect_error);
     
    }

    return $db;


}
