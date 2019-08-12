<?php 
require 'admin/config.php'; //Cargamos el archivo con las configuraciones.
require 'funciones.php';    //Cargamos el archivo con las funciones.

$conexion = conexion($bd_config);

if (!$conexion) 
{
    header('Location: error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);  //Obtenemos los posts dinamicamente
if (!$posts) 
{
    header('Location: error.php');
}


require 'views/index.view.php'; //Cargamos las vistas.
?>