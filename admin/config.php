<?php 
//Contiene configuracion de nuestro sitio web:
//Cantidad de articulos a cargar, usuario y contraseña...

define('RUTA', 'http://localhost/cursoPHP/Practicas/Blog'); //Definimos la ruta

//Guardamos toda la informacion relacionada con la bd
$bd_config = array(
    'basedatos' => 'blog_practica',
    'usuario' => 'root',
    'pass' => ''
);

$blog_config = array(
    'post_por_pagina' => '2',
    'carpeta_imagenes' => 'imagenes/'
);

$blog_admin = array(
    'usuario' => 'Carlos',
    'password' => '123'
);
?>