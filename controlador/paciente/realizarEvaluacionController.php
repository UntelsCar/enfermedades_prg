<?php
session_start();

include_once(__DIR__ . "/../../modelo/evaluacionModel.php");
include_once(__DIR__ . "/../../vista/paciente/realizarEvaluacionView.php");

$evaluacionView = new realizarEvaluacionView();
$modelo = new evaluacionModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['b_Evaluacion'])) {
    $param_lista = $_POST['param_lista'];
    $pares = [];

    foreach (explode("#", $param_lista) as $item) {
        list($id, $respuesta) = explode(";", $item);
        $pares[] = $id . ";" . $respuesta;
    }

    $resultado = trim($modelo->evaluarProlog($pares)); // ← aquí se hace el diagnóstico Prolog

    $idpaciente = $_SESSION['param_idpaciente'] ?? null;

    if ($idpaciente) {
        $modelo->guardarDiagnostico($idpaciente, $pares, $resultado);
        echo $resultado;
    } else {
        echo "Error: Sesión de paciente no encontrada.";
    }
} else {
    $sintomas = $modelo->obtenerSintomas();
    $evaluacionView->realizarEvaluacion($sintomas);
}
?>
