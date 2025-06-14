<?php
session_start();

include_once(__DIR__ . "/../../modelo/evaluacionModel.php");
include_once(__DIR__ . "/../../vista/paciente/listarEvaluacionView.php");

$modelo = new evaluacionModel();
$vista = new listarEvaluacionView();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'ver_detalle') {
    $idatencion = intval($_GET['idatencion']);
    $sintomas = $modelo->obtenerSintomasPorEvaluacion($idatencion);
    echo $vista->renderizarModalSintomas($sintomas);
} else {
    $evaluaciones = $modelo->listarEvaluacionesPorPaciente($_SESSION['param_idpaciente']);
    $vista->listarEvaluacion($evaluaciones);
}