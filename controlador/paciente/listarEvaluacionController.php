<?php
session_start();

include_once(__DIR__ . "/../../modelo/evaluacionModel.php");
include_once(__DIR__ . "/../../vista/paciente/listarEvaluacionView.php");

// FUNCIONALIDAD EXTRA PARA VALIDAR SOLO ENFERMEDADES ACTIVAS DEL PL
function obtenerEnfermedadesValidasPL() {
    $rutaProlog = __DIR__ . "/../../modelo/seic.pl";
    if (!file_exists($rutaProlog)) return [];

    $contenido = file_get_contents($rutaProlog);
    preg_match_all("/enfermedad\('(.+?)'\)/", $contenido, $matches);
    return array_unique($matches[1]);
}

$modelo = new evaluacionModel();
$vista = new listarEvaluacionView();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'ver_detalle') {
    $idatencion = intval($_GET['idatencion']);
    $sintomas = $modelo->obtenerSintomasPorEvaluacion($idatencion);
    echo $vista->renderizarModalSintomas($sintomas);
} else {
    $evaluaciones = $modelo->listarEvaluacionesPorPaciente($_SESSION['param_idpaciente']);
    $validas = obtenerEnfermedadesValidasPL();

    // FILTRAR RESULTADOS
    $filtradas = array_filter($evaluaciones, function ($ev) use ($validas) {
        return $ev['resultado'] !== 'La informacion no es suficiente' && in_array($ev['resultado'], $validas);
    });

    $vista->listarEvaluacion(array_values($filtradas)); // reindexar
}
?>
