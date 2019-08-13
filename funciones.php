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

function id_articulos($id)  //Saneamos y casteamos el id de un articulo.
{
    return (int)limpiarDatos($id);
}

function obtener_post_por_id($conexion, $id)
{
    $statement = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");    //Query simple.
    $statement = $statement->fetchAll();    //Procesamos.
    return ($statement) ? $statement : false;   //Si hay un resultado, lo devuelve. Sino devuelve false.
}

function fecha($fecha)    //Estetizamos la fecha.
{
    $timestamp = strtotime($fecha); //strtotime() convierte de una cadena de texto a tiempo.
    //Array para transformar los meses a spanish.
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto','Septiembre','Octubre','Noviembre', 'Diciembre'];
    
    $dia = date('d',$timestamp);    //d: Día del mes, 2 dígitos con ceros iniciales
    $mes = date('m', $timestamp) -1 ;   //m: Representación numérica de una mes, con ceros iniciales. -1 Xq array empieza desde el cero.
    $year = date('Y', $timestamp);  //Y: Una representación numérica completa de un año, 4 dígitos

    $fecha = "$dia de " . $meses[$mes] . " del $year";
    return $fecha;
}
?>