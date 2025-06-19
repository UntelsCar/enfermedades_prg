<?php
session_start();
include_once(__DIR__ . "/../../modelo/sintomaModel.php");

$modelo = new sintomaModel();

$busqueda = $_GET['busqueda'] ?? '';
$sintomas = $modelo->listarSintomas($busqueda);

header('Content-Type: application/json');
echo json_encode($sintomas);
?>
