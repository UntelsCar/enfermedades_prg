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

    $modelo = new evaluacionModel();
    $resultado = $modelo->evaluarProlog($pares); // Retorna el resultado como string

    echo $resultado; // Importante: solo imprime
}
else {
    // Método GET o sin botón: mostrar el formulario de evaluación
    $sintomas = $modelo->obtenerSintomas();
    $evaluacionView->realizarEvaluacion($sintomas);
}
?>