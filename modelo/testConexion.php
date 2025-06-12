<?php
// Ruta: testConexion.php
require_once 'conexion.php';

$conexion = new Conexion();
$conexion->conectar();
?>