<?php 
//Logica para usar la barra de busqueda.

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if(!$conexion){
    header ('Location: error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda']))    //Si se ingreso algo en la barra de busqueda:
{
    $busqueda = limpiarDatos($_GET['busqueda']);    //Limpiamos asi no nos inyectan codigo.

    //Consulta donde traeremos los articulos donde se encuentre contenido en el titulo o en el texto la palabra que se ingreso.
    $statement = $conexion->prepare('SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto LIKE :busqueda');
    $statement->execute(array(':busqueda'=> "%$busqueda%"));    //Los % % nos permiten encontrar la palabra en cualquier contexto, mientras aparezca.
    $resultados = $statement->fetchAll();

    if(empty($resultados))
    {
        $titulo = 'No se encontraron articulos con el resultado: ' . $busqueda;
    }
    else
    {
        $titulo = 'Resultados de la busqueda: ' . $busqueda;
    }

}
else
{
    header('Location: ' . RUTA . '/index.php'); //Si hubo un error en la busqueda redirigimos.
}

require 'views/buscar.view.php';
?>