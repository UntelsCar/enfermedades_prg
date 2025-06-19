<?php
session_start();

include_once(__DIR__ . "/../../modelo/medicoModel.php");

if (!isset($_SESSION['param_idmedico'])) {
    die("Acceso no autorizado.");
}

$modelo = new medicoModel();

$busqueda = $_GET['busqueda'] ?? '';
$pacientes = $modelo->listarPacientesPorMedico($_SESSION['param_idmedico'], $busqueda);

header('Content-Type: application/json');
echo json_encode($pacientes);
?>
