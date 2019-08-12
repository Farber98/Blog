<?php 

function conexion($bdconfig)    //$bdconfig es un array global creado en config.php
{                               //Funcion para conectar con la BD.
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=' . $bdconfig['basedatos'], $bdconfig['usuario'],$bdconfig['pass']);
        return $conexion;
    } catch (PDOException $e) 
    {
        return false;
    }
}

function limpiarDatos($datos)   //Saneamos nuestras variables.
{
    $datos = trim($datos);  //Borra espacios en blanco al principio y al final del texto.
    $datos = stripslashes($datos);  //Quitamos las barras para no inyectar codigo.
    $datos = htmlspecialchars($datos);  //Hace que el codigo html no sea ejecutable en el texto.
    return $datos;
}

function obtener_post($post_por_pagina, $conexion)  //Traemos dinamicamente de la base de datos los posts.
{
    $inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina - $post_por_pagina) : 0;
    $statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");
    $statement->execute();
    return $statement->fetchAll();
}

function pagina_actual(){
    return isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
}

?>