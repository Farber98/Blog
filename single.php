<?php 
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
$id_articulo = id_articulos($_GET['id']);    //Toma el id del $_GET 

if(!$conexion)
{
    header('Location: error.php');
}

if(empty($id_articulo)) //Si se pone cualquier cosa que no sea un numero:
{
    header('Location: index.php');
}

$post = obtener_post_por_id($conexion,$id_articulo);
if(!$post)
{
    header('Location: index.php');
}

$post = $post[0];   //Ya que es un arreglo dentro de otro arreglo.

require 'views/single.view.php'; 
?>
