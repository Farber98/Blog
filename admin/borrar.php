<?php //Archivo para borrar posts.

session_start();

require 'config.php';
require '../funciones.php';

comprobarSesion();

$conexion = conexion($bd_config);

if(!$conexion)
{
    header('Location: ../error.php');
}

$id = limpiarDatos($_GET['id']);

if(!$id){
    header('Location: ' . RUTA . '/admin');
}

$statement = $conexion->prepare('DELETE FROM articulos WHERE id = :id');    //Borramos desde la BD.
$statement->execute(array(':id'=> $id));

header('Location: ' . RUTA . '/admin');
?>