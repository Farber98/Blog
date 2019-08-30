<?php //Cerramos la sesion.
session_start();
session_destroy();
$_SESSION = array();
header('Location: ../');
?>