<?php 

function conectarProyectos() : mysqli{

    $host = 'localhost';
    $user = 'root';
    $password = 'admin1234';
    $database = 'proyectos';

    $dbpr = new mysqli( $host, $user , $password ,  $database);

    if(!$dbpr){
        die("Error no se puede conectar la base de datos de proyectos". $dbpr->connect_error);
    }

    return $dbpr;
}


?>