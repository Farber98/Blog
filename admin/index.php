<?php //Logica del panel de administrador. Index del admin.
session_start();

require 'config.php';
require '../funciones.php';

$conexion = conexion($bd_config);

comprobarSesion();

if(!$conexion)
{
    header('Location: ../error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);



require '../views/admin.index.view.php';
?>