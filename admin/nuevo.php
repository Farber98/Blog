<?php //Archivo de gestion del panel de control para agregar un nuevo post.

session_start();

require 'config.php';
require '../funciones.php';

comprobarSesion();

$conexion = conexion($bd_config);

if(!$conexion)
{
    header('Location: ../error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $titulo = limpiarDatos($_POST['titulo']);
    $intro = limpiarDatos($_POST['intro']);
    $texto = $_POST['texto'];
    $thumb = $_FILES['thumb']['tmp_name'];

    $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

    move_uploaded_file($thumb, $archivo_subido);    //Movemos desde la computadora del usuario al server.

    $statement = $conexion->prepare('INSERT INTO articulos (id, titulo, intro, texto, thumb) VALUES (null, :titulo, :intro, :texto, :thumb)');
    $statement->execute(array(':titulo'=>$titulo, ':intro'=> $intro, ':texto' => $texto, ':thumb' => $_FILES['thumb']['name']));

    header('Location: ' . RUTA . '/admin');
}


require '../views/nuevo.view.php';
?>