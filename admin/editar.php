<?php session_start();
require 'config.php';
require '../funciones.php';

comprobarSesion();

$conexion = conexion($bd_config);
if(!$conexion)
{
    header('Location: ../error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST')        //Datos que recibimos por post despues de llenar los campos. Los saneamos.
{
    $titulo = limpiarDatos($_POST['titulo']);
    $intro = limpiarDatos($_POST['intro']);
    $texto = $_POST['texto'];
    $id = limpiarDatos($_POST['id']);
    $thumb_guardada = $_POST['thumb-guardada']; //En caso de conservar la thumb.
    $thumb = $_FILES['thumb'];  //En caso de subir una nueva thumb.

    if(empty($thumb['name']))
    {
        $thumb = $thumb_guardada;   //Si no se envio una imagen para subirla, conservamos la anterior.
    }
    else{
        $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];  // Agarramos la nueva imagen y le indicamos donde guardarla.
        move_uploaded_file($_FILES['thumb']['tmp_name'],$archivo_subido);
        $thumb = $_FILES['thumb']['name'];
    }

    $statement = $conexion->prepare('UPDATE articulos SET titulo = :titulo, intro = :intro, texto = :texto, thumb = :thumb WHERE id = :id');  //Actualizamos los archivos en caso de que se hayan editado mediante los placeholders.
    $statement->execute(array(':titulo'=>$titulo, ':intro'=>$intro, ':texto'=>$texto, ':thumb'=>$thumb,':id'=>$id)); //Reemplazamos los plaecholders.
    
    header('Location: ' . RUTA . '/admin');
}
else {
    $id_articulo = id_articulos($_GET['id']);    //Saneamos el id que se introduce por get.
    if(empty($id_articulo)) //Si no se introdujo nada:
    {
        header('Location: ' . RUTA . '/admin'); //Redirigimos al panel de control.
    }
    $post = obtener_post_por_id($conexion,$id_articulo);

    if(!$post)
    {
        header('Location: ' . RUTA . '/admin');
    }
    //print_r($post) para entender porque hacemos $post[0]. Es un array dentro de otro array.
    $post = $post[0];
}


require '../views/editar.view.php';
?>